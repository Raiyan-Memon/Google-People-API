@extends('layouts.app')

@section('content')
<style>

  form{
    display: inline-block
  }

</style>
{{-- @dd($contactgroup['resourceName']); --}}

<div class="container">

    <h2 class="text-center">Contact Groups</h2>
    <hr>
   <a href="contactgroup/create"> <button class="btn btn-primary" >Create</button></a><a style="margin-left:80%;" href="{{route('contactgrouplist')}}" class="btn btn-primary">Click here to fetch API</a>
    <h4 class="text-center" ><u>List</u></h4>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Resource Name</th>
            {{-- <th scope="col">User_id</th> --}}
            <th scope="col">Action</th>
           
          </tr>
        </thead>
        <tbody>

          @foreach($contactgroup as $contactgroups)
          <tr>
            <td>{{$contactgroups->formattedName}}</td>
            <td>{{$contactgroups->resourceName}}</td>
            {{-- <td>{{$contactgroups->user_id}}</td> --}}

            <td>
              <a href="{{route('contactgroup.show', $contactgroups->id)}}"> <Button class="btn btn-success" onclick="myfunction()">Show</Button></a>
              <a href="{{route('contactgroup.edit', $contactgroups->id)}}"> <Button class="btn btn-primary" onclick="myfunction()">Edit</Button></a>
              <span>
              
                    <form action="{{route('contactgroup.destroy' ,$contactgroups->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a> <button class="btn btn-danger">Delete</button></a>
                </form>
              
            </span>
            </td>
          </tr>
          @endforeach
     
        </tbody>
      </table>







{{-- <script>

  function myfunction(){
    alert("Under development");
  }
  </script> --}}
</div>


      

</table>


@endsection