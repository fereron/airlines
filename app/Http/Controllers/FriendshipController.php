<?php

namespace App\Http\Controllers;

use App\Friendship;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;

class FriendshipController extends Controller
{

    /**
     * @var UserRepository
     */
    private $user;

    /**
     * FriendshipController constructor.
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function checkStatus(Request $request)
    {
        $status = $this->user->find($request->user()->id)
            ->checkFriendshipStatus($request->input('id'));

        return response()->json(['status' => $status], 200);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function friends(Request $request)
    {
        $friends = $this->user->find($request->user()->id)
            ->getFriends();

        return response()->json(['friends' => $friends], 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function sendFriendship(Request $request)
    {
        $this->user->find($request->user()->id)
            ->sendFriendRequest($request->input('id'));

        return response('Friend added', 200);
    }

    public function acceptFriendRequest(Request $request)
    {
        $friendship = $this->user->find($request->user()->id)
            ->acceptFriendRequest($request->input('action_user_id'));

        if (!$friendship) {
            return response()->json(['error' => true], 200);
        }

        return response()->json(['success' => true], 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFriendRequests(Request $request)
    {
        $requests = $this->user->find($request->user()->id)
            ->getFriendRequests();

        return response()->json(['requests' => $requests], 200);
    }
}
