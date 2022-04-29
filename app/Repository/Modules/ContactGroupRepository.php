<?php

namespace App\Repository\Modules;

use App\Interface\Modules\ContactGroupRepositoryInterface;
use App\Models\ContactGroup;

class ContactGroupRepository implements ContactGroupRepositoryInterface
{

    public function all()
    {

        $account = ContactGroup::all();
        return $account;
    }

    public function create($input)
    {

        $capitalword = ucwords($input['name']);

        $resource = $input['name'];
        $resource_name = "contactgroups/" . $resource;

        // dd(trim($resource_name));

        $input = ([
            'name' => $input['name'],
            'formattedName' => $capitalword,
            'groupType' => $input['groupType'],
            'resourceName' => str_replace(' ', '', $resource_name),

        ]);
        // dd($input);
        // dd($input);

        return ContactGroup::create($input);
        // dd($data);
    }

    public function find($contactgroup)
    {

        return ContactGroup::findorfail($contactgroup);
    }

    public function update($request, $contactgroup)
    {

        $input = $request->all();
        // dd($input);
        $capitalword = ucwords($input['name']);

        $resource = $input['name'];
        $resource_name = "contactgroups/" . $resource;

        // dd(trim($resource_name));

        $input = ([
            'name' => $input['name'],
            'formattedName' => $capitalword,
            'groupType' => $input['groupType'],
            'resourceName' => str_replace(' ', '', $resource_name),

        ]);
        // dd($input);
        $contactgroups = ContactGroup::find($contactgroup);
        // dd($contactgroups);
        $contactgroups->fill($input)->save();
    }

    public function delete($contactgroup)
    {

        return ContactGroup::findorfail($contactgroup)->delete();

        // account::findOrFail($account->id)->delete();
    }

    public function updateApi($request, $account)
    {
        $accounts = ContactGroup::find($request);
        $updated = $accounts->update($account);
    }
}
