<?php

namespace App\Repositories;


use App\User;
use File;
use Illuminate\Http\Request;

class UserRepository extends Repository
{

    /**
     * @return mixed
     */
    function model()
    {
        return User::class;
    }

    /**
     * @return mixed
     */
    public function whenQuery()
    {
        return $this->model
            ->with('profile')
            ->when(request('q'), function ($query) {
                $query->where('first_name', 'like', '%' . request('q') . '%')
                    ->orWhere('last_name', 'like', '%' . request('q') . '%');
            })->get();
    }

    /**
     * @param Request $request
     * @return bool|\Illuminate\Http\JsonResponse
     */
    public function uploadImage(Request $request)
    {
        $user = $this->model->find($request->user()->id);

        $doc = explode(',', $request->get('image'));
        $format = str_replace(
            [
                'data:image/',
                ';',
                'base64',
            ],
            [
                '', '', '',
            ],
            $doc[0]
        );

        $fileName = time() . md5($user->email) . '.' . $format;
        $uploadPath = public_path() . "/images/users/" . $fileName;
        $doc = base64_decode($doc[1]);

        $bytes_written = File::put($uploadPath, $doc);
        if ($bytes_written === false) {
            return response()->json(['error' => TRUE]);
        }

        if ($user->avatar) {
            File::delete(public_path() . "/images/users/" . $user->avatar);
        }

        $user->avatar = $fileName;
        $user->save();

        return true;
    }


    /**
     * @param Request $request
     * @return bool
     */
    public function updateProfile(Request $request)
    {
        $user = $this->model->find($request->user()->id);

        $user->fill($request->except('token'));
        $user->profile->fill($request->except('token'));
        $user->last_name = $request->has('last_name') ? $request->input('last_name') : $user->last_name;

        $user->save();
        $user->profile->save();

        return true;
    }
}