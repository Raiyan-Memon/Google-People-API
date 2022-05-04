<?php

use App\Models\People;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

// $end_point = 'https://accounts.google.com/o/oauth2/v2/auth';
// $client_id = '277229971270-vk7m3eb64mnjqpaqiqmgki9npj55viv9.apps.googleusercontent.com';
// $client_secret = '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';
// $redirect_uri = 'http://127.0.0.1:8000/google/callback';
// $scope = 'https://www.googleapis.com/auth/contacts';

class Helpers
{

//refresh token
    public static function refreshToken($refreshToken)
    {
        // Generate new Access Token using old Refresh Token
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL,"https://accounts.google.com/o/oauth2/token");
        // curl_setopt($ch, CURLOPT_POST, TRUE);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
        //     'client_id'     => config('services.google.client_id'),
        //     'client_secret' => config('services.google.client_secret'),
        //     'refresh_token'  => $refreshToken,
        //     'grant_type'    => 'refresh_token',
        // ]));
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // $response = curl_exec($ch);
        // curl_close ($ch);
        // $response = json_decode($response, true);

        $databases = DB::table('users')->get();
        $accessdata = $databases->toArray();
        foreach ($accessdata as $check) {
            $access_token = $check->access_token;
        }
        // $access_token =

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.googleapis.com/oauth2/v1/tokeninfo?access_token=' . $access_token);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $error_response = curl_exec($ch);
        $array = json_decode($error_response);

        if (isset($array->error)) {

            // Generate new Access Token using old Refresh Token
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://accounts.google.com/o/oauth2/token");
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
                'client_id' => config('services.google.client_id'),
                'client_secret' => config('services.google.client_secret'),
                'refresh_token' => $refreshToken,
                'grant_type' => 'refresh_token',
            ]));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);
            $response = json_decode($response, true);
        }

        // dd($response);
        // dd(['access_token'=>$response['access_token'],'refreshtoken'=>$refreshToken ,'updated_at'=>now()]);
        User::where('email', Auth::user()->email)->update(['access_token' => $response['access_token'], 'refreshtoken' => $refreshToken, 'updated_at' => now()]);
        return $response;
    }

    //contactgroup function
    public static function ContactGrouplist($access_token)
    {

        $auth_id = Auth::id();
        // dd($auth_id);

        // $group = DB::select('select * from contact_groups');
        // // dd($group)
        // foreach ($group as $resourceName) {
        //     $data = $resourceName->resourceName;

        // }

        $user_id = DB::select('select * from contact_groups');
        // dd($group)
        foreach ($user_id as $userid) {
            $data = $userid->user_id;

        }
        // dump($auth_id);
        // dd($data);
        // dd($data);

        // dd($data);

        if (isset($data)) {
            if ($auth_id == $data) {
            }
        } else {

            $url_people = 'https://people.googleapis.com/v1/contactGroups';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url_people);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $access_token));
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_close($ch);

            $data = json_decode(curl_exec($ch), true);
            $data1 = $data['contactGroups'];
            // dd($data1);

            $arr = [];
            foreach ($data1 as $key => $value) {

                $arr[$key] = array('id' => Str::uuid()->toString(), 'resourceName' => $value['resourceName'] ?? null, 'etag' => $value['etag'] ?? null, 'user_id' => Auth::id(), 'groupType' => $value['groupType'] ?? null, 'name' => $value['name'] ?? null, 'formattedName' => $value['formattedName'] ?? null, 'memberCount' => $value['memberCount'] ?? null, 'created_at' => now(), 'updated_at' => now());

                // $arr = array('resourceName' => $value['resourceName'], 'etag' => $value['etag'] ?? null, 'user_id' => Auth::id(), 'groupType' => $value['groupType'], 'name' => $value['name'], 'formattedName' => $value['formattedName']);
            }
            // dd('sdfsdfds');
            // dump($arr);
            DB::table('contact_groups')->insert($arr);

            // $datainf = 10;
            return "API Fetched Sucessfully";

            // ContactGroup::create($arr);

            // $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            // if ($http_code != 200) {
            //     throw new Exception('Error : Failed to get people list');
            // }
        }
    }

    //othercontact

    public static function othercontactlist($access_token)
    {

        $url = array();
        $url['readMask'] = 'names';
        // dd($access_token);
        $url_people = 'https://people.googleapis.com/v1/otherContacts?' . http_build_query($url);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url_people);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $access_token));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_close($ch);

        $data = json_decode(curl_exec($ch), true);
        // dd($data);
        // dd('sdf');

        $data1 = $data['otherContacts'];
        // dd($data1);

        $arr = [];
        foreach ($data1 as $key => $value) {

            // dd($value['resourceName']);

            $value1 = $value['names'] ?? null;

            $arr[$key] = array('id' => Str::uuid()->toString(), 'resourceName' => $value['resourceName'] ?? null, 'etag' => $value['etag'] ?? null, 'user_id' => Auth::id(), 'created_at' => now(), 'updated_at' => now());

            // $arr = array('resourceName' => $value['resourceName'], 'etag' => $value['etag'] ?? null, 'user_id' => Auth::id(), 'groupType' => $value['groupType'], 'name' => $value['name'], 'formattedName' => $value['formattedName']);
        }
        // dd('sdf');
        // dd($arr);
        // dump($arr);
        DB::table('other_contacts')->insert($arr);

        // ContactGroup::create($arr);

        // $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        // if ($http_code != 200) {
        //     throw new Exception('Error : Failed to get people list');
        // }
    }

    //people

    public static function GetPeopleConnectionList($access_token)
    {
        // dd('here it comes');

        $url = array();
        $url['pageSize'] = '400';
        $url['personFields'] = 'names,emailAddresses';
        $url['sortOrder'] = 'FIRST_NAME_ASCENDING';
        $url_people = 'https://people.googleapis.com/v1/people/me/connections?' . http_build_query($url);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url_people);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $access_token));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_close($ch);

        $data = json_decode(curl_exec($ch), true);

        // dd($data);

        // return $data;
        // $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        // if ($http_code != 200) {
        //     throw new Exception('Error : Failed to get people list');
        // }

        $userid = Auth::id();
        $inputData = [];
        foreach ($data as $list) {
            if (is_array($list)) {
                foreach ($list as $key => $connection) {
                    $checkexitsdata = People::where('resourceName', '=', $connection['resourceName'])->get()->toArray();
                    // dd($checkexitsdata);
                    if (count($checkexitsdata) == 0) {
                        $inputData[$key]['id'] = Str::uuid()->toString();
                        $inputData[$key]['user_id'] = $userid;
                        $inputData[$key]['resourceName'] = $connection['resourceName'] ?? "";
                        // call get people
                        // Helpers::GetPeople($token ,$connection['resourceName'] ?? "");
                        $inputData[$key]['eTag'] = $connection['etag'] ?? "";
                        if (isset($connection['names'])) {
                            foreach ($connection['names'] as $name) {
                                $inputData[$key]['name'] = $name['displayName'] ?? "";
                            }
                        } else {
                            $inputData[$key]['name'] = "";
                        }
                        if (isset($connection['phoneNumbers'])) {
                            foreach ($connection['phoneNumbers'] as $number) {
                                $inputData[$key]['phone_number'] = $number['value'] ?? "";
                            }
                        } else {
                            $inputData[$key]['phone_number'] = "";
                        }
                        if (isset($connection['emailAddresses'])) {
                            foreach ($connection['emailAddresses'] as $email) {
                                $inputData[$key]['email'] = $email['value'] ?? "";
                            }
                        } else {
                            $inputData[$key]['email'] = "";
                        }
                    }
                }
            }
        }
        // dd($inputData);
        DB::table('people')->insert($inputData);

    }

}
