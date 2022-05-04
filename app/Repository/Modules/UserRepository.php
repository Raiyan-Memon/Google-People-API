<?php

namespace App\Repository\Modules;

use App\Interface\Modules\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserRepository implements UserRepositoryInterface
{
    public function all()
    {
        $user = User::all();
        return $user;
    }

    public function create($input)
    {

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            // 'user_type' => $input['user_type'],
            'password' => hash::make(Str::random(24)),

        ]);
        // dd($input);

    }

    public function find($user)
    {

        return user::findorfail($user);

    }

    public function update($request, $user)
    {
        $input = $request->all();
        $user = user::find($user);
        $user->fill($input)->save();
    }

    public function delete($user)
    {
        return user::findorfail($user)->delete();
    }
}
