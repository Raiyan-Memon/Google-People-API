@include('layouts.app')

<style>

.container1{
    position: relative;
    right: 530px;
    top: 120px;
    width: 700px;
    height: 400px;
}
.back-button{
position: absolute;
top: 375px;
left: 500px;
}

.container{
    width: 500px;
    height: 100px;
}
</style>

{{-- @php
$query = 'select * from users where id = '.$user->id;
// dd($query);
$admin = DB::select($query);
foreach($admin as $user_type){
    $type = $user_type->user_type;
}
// dd($type);
@endphp --}}

{{-- @if($type == "admin") --}}

<div class="container1">
<form action="{{route('users.update', $user)}}" method="POST">
    @csrf
    @method('PATCH')
    <div class="container">
        {{-- <h5 class="text-center">User</h5> --}}
        <h1 class="text-center">Edit</h1>
        @include('users.form')
    </div>
</form>


</div>
<div class="back-button">
<a href="{{route('users.index')}}"> <button class="btn btn-primary">Back</button></a> <br><br>
</div>
{{-- 
{{"You are not an ADMIN, You cannot edit"}}
<a href="/users"><button class="btn btn-primary">Click here to go back</button></a> --}}