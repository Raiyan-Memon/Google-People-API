
@include('layouts.app')

<style>

    .container{
            position: absolute; 
            top: 30%;
            left: 20%;
            width: 50%;
            display: inline-block;
        }
        .back-button-div{
      position: relative;
      top: 3px;
      left: 230px;
  }
        </style>

<div class="container">
    <h1 class="text-center">Create</h1><br><br><br><br><br><br><br>
    {{-- <a href="{{route('contactgroup.index')}}"><button class="btn btn-primary">Back</button></a> --}}
<form action="{{route('contactgroup.store')}}" method="POST">

   @include('contactgroup.form')
    
</form>
<div class="back-button-div">
    <a href="{{route('contactgroup.index')}}"><button class="btn btn-primary"><span class="back-button">Back</span></button></a>
    </div>
</div>
