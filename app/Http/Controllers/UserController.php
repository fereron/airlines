<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository as User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @var User
     */
    private $user;

    /**
     * UserController constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUser(Request $request)
    {
        return response()->json($this->user
            ->with(['profile'])
            ->find($request->input('user') ?? $request->user()->id), 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateProfile(Request $request)
    {
        $this->user->updateProfile($request);

        return response()->json('ok', 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadImage(Request $request)
    {
        $this->user->uploadImage($request);

        return response()->json(['success' => TRUE]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function search()
    {
        return response()->json([
            'users' => $this->user->whenQuery()
        ]);
    }

}
