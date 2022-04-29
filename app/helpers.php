<?php

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
            return "raiyan";

            // ContactGroup::create($arr);

            // $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            // if ($http_code != 200) {
            //     throw new Exception('Error : Failed to get people list');
            // }
        }
    }
}
