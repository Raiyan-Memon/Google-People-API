@extends('layouts.app')

@section('content')
@if(session()->has('message'))
<div class="alert alert-success" id="success-alert">
  {{session('message')}}
 
 
</div>
{{-- <script>alert("API Fetched Successfully");</script> --}}

@endif
<style>

  form{
    display: inline-block
  }
.container{
  position: relative;
  top: 35px;
  height: 700px;
  width: 1000px;
}



</style>
{{-- @dd($contactgroup['resourceName']); --}}

{{-- 
@dd($people); --}}

<div class="container">

    <h2 class="text-center">Contacts</h2>
    <hr>
   {{-- <a href="contactgroup/create" > <button class="btn btn-primary" >Create</button></a> --}}
   <a style="margin-left:80%;" href="{{route('peoplelist')}}" class="btn btn-primary">Sync Data</a>
    {{-- <h4 class="text-center" ><u>List</u></h4> --}}

    <table class="table">
        <thead>
          <tr>
            
            <th scope="col">Resource Name</th>
            <th scope="col">Etag</th>
            {{-- <th scope="col">User_id</th> --}}
            <th scope="col">Action</th>
           
          </tr>
        </thead>
        <tbody>
        
          {{-- @php
            
           $data = $contactgroup['0'] ?? null;
          //  dd($data);
          @endphp --}}

{{-- 
@if(empty($data))
<td><td>
  <div class="alert alert-danger">{{"List is empty"}}</div></td></td>
@endif --}}

          @foreach($people as $contactgroups)
          <tr>
            <td >  <a  href="{{route('contactgroup.show', $contactgroups->id)}}"> {{$contactgroups->name}}</a></td>
            <td >{{$contactgroups->etag}}</td>
            {{-- <td>{{$contactgroups->user_id}}</td> --}}

            <td>
              {{-- <a  href="{{route('contactgroup.show', $contactgroups->id)}}"> <Button class="btn btn-success" onclick="myfunction()">Show</Button></a>
              <a  href="{{route('contactgroup.edit', $contactgroups->id)}}"> <Button class="btn btn-primary" onclick="myfunction()">Edit</Button></a> --}}
              <span>
              
                    <form action="{{route('contactgroup.destroy' ,$contactgroups->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a > <button class="" style="border: none;background-color:white;"> <a ><img src="{{asset('icons8-delete-24.png')}}" alt=""></a></button></a>
                </form>
              
            </span>
            </td>
          </tr>
          @endforeach
     
        </tbody>
      </table>

      <span>
        {{$people->links()}}
       </span>

       <style>
   
  


        .text-sm.text-gray-700.leading-5{
       
          display: inline-block;
        }
      
      .font-medium{
        display: inline;
      }
        .w-5{
          display: none;
        }
   
        </style>

      







<script>

  
  </script>
</div>


      

</table>


@endsection





{{-- <a style="margin-left:80%;" href="{{route('othercontactlist')}}" class="btn btn-primary">Sync Data</a> --}}


{{-- <a style="margin-left:80%;" href="{{route('peoplelist')}}" class="btn btn-primary">Sync Data</a> --}}
{{-- @dd($people); --}}