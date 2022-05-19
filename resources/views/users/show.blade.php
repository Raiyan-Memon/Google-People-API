@include('layouts.app')

<style>
.container1{
    position: relative;
    right: 400px;
    top: 150px;
    width: 700px;
    height: 400px;
    /* background: red; */
    /* transition: 3s; */
}

.container{
    width: 100px;
    height: 700px;
    /* transition: 3s; */
}

a{
    display: block;
}
</style>


@php
    
    $auth = Auth::id();
    // dd($auth);
    $data = Auth::user()->toArray();
    // dd($data['user_type']);

    $user_type = $data['user_type'];


    // if($user_type == 'admin')
    @endphp







<div class="container1">
    
    <div class="card text-center">
            <h5><b>Name</b> : {{$user->name}}</h5>
    <h5><b>Email</b> : {{$user->email}}</h5>
    <h5><b>User_type</b> : {{$user->user_type}}</h5>
    
    
    
    @if($user_type == 'admin')
    <a href="{{route('users.edit', $user->id)}}"> <button class="btn btn-primary">Edit</button></a>
    @endif
    
    <a href="{{route('users.index')}}"> <button class="btn btn-primary">Back</button></a>

</div>



</div>

{{-- 
    <div class="card-body">
      <h5 class="card-title">Special title treatment</h5>
      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div> --}}