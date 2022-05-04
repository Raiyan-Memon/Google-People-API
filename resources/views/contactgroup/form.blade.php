

<style>
    .form-control{
        width: 50%;
    }
    

</style>

@csrf


<div class="container">
<div class="form-group">
    Group Name: <input type="text" class="form-control" value="{{(isset($contactgroup->name)) ? $contactgroup->name : null}}" name="name">
</div>

{{-- <div class="form-group">
    Group Type: <input type="text" class="form-control" value="{{(isset($contact->email)) ? $contact->email : null}}" name="groupType">
</div> --}}

{{-- <div class="btn-group">
    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Action
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Action</a>
      <a class="dropdown-item" href="#">Another action</a>
      <a class="dropdown-item" href="#">Something else here</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Separated link</a>
    </div>
  </div> --}}
  
<br>
<select name="groupType" class="btn btn-primary">
    <option class="btn btn-success" value="SYSTEM_CONTACT_GROUP">SYSTEM_CONTACT_GROUP</option>
    <option class="btn btn-success" value="USER_CONTACT_GROUP">USER_CONTACT_GROUP</option>
</select>
<br>
{{-- <div class="form-group">
    Phone: <input type="number" class="form-control" value="{{(isset($contact->phone)) ? $contact->phone : null}}" name="phone">
</div> --}}
<br>

<button type="submit" class="btn btn-primary">Save</button>
{{-- <a href="{{route('contactgroup.index')}}"><button class="btn btn-primary">Back</button></a> --}}

</div>