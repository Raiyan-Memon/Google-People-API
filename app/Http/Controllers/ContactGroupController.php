<?php

namespace App\Http\Controllers;

use App\Interface\Modules\ContactGroupRepositoryInterface;
use Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactGroupController extends Controller
{
    public function __construct(ContactGroupRepositoryInterface $contactgroupRepoInterface)
    {

        // $this->middleware('auth');
        $this->contactgroupRepoInterface = $contactgroupRepoInterface;
    }

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        return view('contactgroup.index', ['contactgroup' => $this->contactgroupRepoInterface->all()]);
        // $contactgroup = ContactGroup::all();
        // return view('contactgroup.index', compact('contactgroup'));
    }

    public function create()
    {
        return view('contactgroup.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $input = $request->validate([
            'name' => 'required',
            'groupType' => 'required',

        ]);
        $this->contactgroupRepoInterface->create($input);
        // dd($input);

        return redirect()->route('contactgroup.index')->with('insert-msg', 'successfully inserted');

    }

    public function show($contactgroup)
    {
        // dd($contactgroup);
        return view('contactgroup.show', ['contactgroup' => $this->contactgroupRepoInterface->find($contactgroup)]);
    }

    public function edit($contactgroup)
    {
        return view('contactgroup.edit', ['contactgroup' => $this->contactgroupRepoInterface->find($contactgroup)]);
    }

    public function update(Request $request, $contactgroup)
    {
        $request->validate([
            'name' => 'required',
            'groupType' => 'required',
        ]);
        // dd($request);

        // dd($account->id, $request->all('user_name','first_name','last_name','dob','phone','email','address'));

        $this->contactgroupRepoInterface->update($request, $contactgroup);
        // account::where('id',$account->id)->update($request->all('user_name','first_name','last_name','dob','phone','email','address','hobby','gender','country','state'));
        return redirect()->route('contactgroup.index')->with('update-msg', "Updated Successfully");
    }

    public function destroy($contactgroup)
    {
        $this->contactgroupRepoInterface->delete($contactgroup);

        return redirect()->route('contactgroup.index')->with('message', 'Deleted');
    }

    public function callhelper()
    {
        // $user = Socialite::driver('google')->user();

        $user = DB::select('select * from users');
        foreach ($user as $access_token) {
            $token = $access_token->access_token;
        }
        // dd($token);
        $data = Helpers::ContactGrouplist($token);

        dd($data);

        return redirect()->back();
    }
}
