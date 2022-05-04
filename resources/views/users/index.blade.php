
   
@include('layouts.app')
<style>
form{
    display: inline-block;
}
.container1{
    position: absolute;
    right: 500px; 
     top: 100px;
    width: 600px;
    height: 400px;
}
.container{
    width: 1000px;
    height: 700px;
}
</style>
{{-- @section('content') --}}

{{-- @dd('user index'); --}}
<div class="container1">

    <h1 style="text-align:center"><I>Users</h1>

<a href="{{route('users.create')}}"><button class="btn btn-primary">CREATE</button></a> <br> <br> <br>


<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            {{-- <th scope="col">User Type</th> --}}
            <th scope="col">Email</th>
           
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody> 

        @foreach ($user as $data )
        <tr>
            <td><a href="{{route('users.show', $data->id)}}">{{$data->name}}</a></td>
            {{-- <td>{{$data->user_type}}</td> --}}
            <td>{{$data->email}}</td>
            
        </td>
        
          <td>
            
            {{-- <a href="{{route('users.show', $data->id)}}"> <button class="btn btn-primary">Show</button></a>

          

            <a href="{{route('users.edit', $data->id)}}"> <button class="btn btn-success">Edit</button></a> --}}


                <form action="{{route('users.destroy', $data->id)}}" method="POST"> 
                   {{-- {!!Form::open([
                    'url'=> route('users.destroy', $data->id),
                    'method' => 'POST'
                  ])!!} --}}
                     @csrf
                    @method('DELETE')
                    <a > <button class="" style="border: none;background-color:white;"> <a ><img src="{{asset('icons8-delete-24.png')}}" alt=""></a></button></a>                </form>
                {{-- {!!form::close()!!}    --}}
        </td>
    </tr>
    @endforeach

</tbody>
</table>
{{-- @endsection --}}
{{-- <span>
    {{$user->links()}}
</span>
</div>
<style>
    .w-5{
        display: none;
    }
</style>
             --}}



