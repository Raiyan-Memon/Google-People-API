@include('layouts.app')

<style>
.container1{
    position: relative;
    right: 400px;
    top: 150px;
    width: 700px;
    height: 400px;
}

.container{
    width: 100px;
    height: 700px;
}
</style>

<div class="container1">
    
    
    <h5><b>Name</b> : {{$user->name}}</h5>
    
    {{-- <h5><b>User_id</b> : {{$user->user_type}}</h5> --}}
    
    <h5><b>Email</b> : {{$user->email}}</h5>
    
    <a href="{{route('users.index')}}"> <button class="btn btn-primary">Back</button></a>

    <a href="{{route('users.edit', $user->id)}}"> <button class="btn btn-primary">Edit</button></a>



</div>