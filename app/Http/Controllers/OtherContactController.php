<?php

namespace App\Http\Controllers;

use App\Models\OtherContact;
use Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OtherContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        $otherContact = OtherContact::paginate(10);
        return view('othercontacts.index', ['othercontact' => $otherContact]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OtherContact  $otherContact
     * @return \Illuminate\Http\Response
     */
    public function show(OtherContact $otherContact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OtherContact  $otherContact
     * @return \Illuminate\Http\Response
     */
    public function edit(OtherContact $otherContact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OtherContact  $otherContact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OtherContact $otherContact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OtherContact  $otherContact
     * @return \Illuminate\Http\Response
     */
    public function destroy(OtherContact $otherContact)
    {
        //
    }

    public function callhelper()
    {
        // $user = Socialite::driver('google')->user();

        // $user = DB::select('select * from users');
        // foreach ($user as $access_token) {
        //     $token = $access_token->access_token;
        // }
        // dd($token);
        $token = Auth::user()->access_token;

        // dd($token);

        $contactgrouplist = Helpers::othercontactlist($token);
        $refreshToken = Auth::user()->refresh_token;

        // dd($data);
        // dd($token);

        return redirect()->back()->with('message', $contactgrouplist);
    }
}
