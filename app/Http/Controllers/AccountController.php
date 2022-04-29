<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Interface\Modules\AccountRepositoryInterface;
use App\Traits\mytrait;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

    // for repo
    private AccountRepositoryInterface $accountRepoInterface;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    // constructor for repo

    public function __construct(AccountRepositoryInterface $accountRepoInterface)
    {

        // $this->middleware('auth');
        $this->accountRepoInterface = $accountRepoInterface;
    }


    public function index()
    {
        // $account = account::all();
        // return view('accounts.index', compact('account'));ju
        // return response()->json([
        //     'account' => $this->accountRepoInterface->index(),
        // ]);


        //    use mytrait::calling();
        // $user = Auth::user();
        // dd($user);
        return view('accounts.index', ['account' => $this->accountRepoInterface->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->validate([
            'user_name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'dob' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'gender' => '',
            'hobby' => '',
            'country' => '',
            'state' => ''

        ]);
        // dd($request->toarray());

        //   $query = account::create($input);
        $this->accountRepoInterface->create($input);

        return redirect()->route('accounts.index')->with('insert-msg', 'successfully inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        return view('accounts.show', ['account' => $this->accountRepoInterface->find($account->id)]);
        // echo "this is show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {

        return view('accounts.edit', ['account' => $this->accountRepoInterface->find($account->id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        $request->validate([
            'user_name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'dob' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'hobby' => '',
            'gender' => '',
            'country' => '',
            'state' => ''
        ]);

        // dd($account->id, $request->all('user_name','first_name','last_name','dob','phone','email','address'));

        $this->accountRepoInterface->update($request, $account->id);
        // account::where('id',$account->id)->update($request->all('user_name','first_name','last_name','dob','phone','email','address','hobby','gender','country','state'));
        return redirect()->route('accounts.index')->with('update-msg', "Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //    $account->delete();
        // account::find($account->id)->delete();

        // account::findOrFail($account->id)->delete();

        $this->accountRepoInterface->delete($account->id);


        return redirect()->route('accounts.index')->with('message', 'Deleted');
    }
}