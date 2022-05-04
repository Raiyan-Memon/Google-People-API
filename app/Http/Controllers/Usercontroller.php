<?php

namespace App\Http\Controllers;

use App\Interface\Modules\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct(UserRepositoryInterface $userRepoInterface)
    {
        $this->middleware('auth');
        $this->userRepoInterface = $userRepoInterface;
    }

    public function index()
    {

        return view('users.index', ['user' => $this->userRepoInterface->all()]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {

        $input = $request->validate([

            'name' => 'required',
            'email' => 'required',

            'password' => 'required',

        ], [

        ]);

        $this->userRepoInterface->create($input);
        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        return view('users.show', ['user' => $this->userRepoInterface->find($user->id)]);

    }

    public function edit(User $user)
    {
        return view('users.edit', ['user' => $this->userRepoInterface->find($user->id)]);
    }

    public function update(Request $request, User $user)
    {
        $input = $request->validate([
            'name' => 'required',
            'email' => 'required',

        ]);
        $this->userRepoInterface->update($request, $user->id);
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        user::findorFail($user->id)->delete();
        return redirect()->route('users.index');
    }
}
