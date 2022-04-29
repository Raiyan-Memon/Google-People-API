
@csrf

<div class="form-group">
    Group Name: <input type="text" class="form-control" value="{{(isset($contactgroup->name)) ? $contactgroup->name : null}}" name="name">
</div>

{{-- <div class="form-group">
    Group Type: <input type="text" class="form-control" value="{{(isset($contact->email)) ? $contact->email : null}}" name="groupType">
</div> --}}

<select name="groupType">
    <option value="SYSTEM_CONTACT_GROUP">SYSTEM_CONTACT_GROUP</option>
    <option value="USER_CONTACT_GROUP">USER_CONTACT_GROUP</option>
</select>

{{-- <div class="form-group">
    Phone: <input type="number" class="form-control" value="{{(isset($contact->phone)) ? $contact->phone : null}}" name="phone">
</div> --}}


<button type="submit" class="btn btn-primary">Submit</button>