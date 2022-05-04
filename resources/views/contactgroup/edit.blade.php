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
      top: 397px;
      left: 230px;
  }
    </style>


<div class="container">
<form action="{{route('contactgroup.update', $contactgroup)}}" method="POST">
    {{-- {!!Form::open ([
        'url' => route('accounts.update', $account),
        'method' => 'POST'
    ])!!} --}}
    @csrf
    @method('PATCH')
   
    <h1 class="text-center">Edit</h1><br><br><br><br>

    @include('contactgroup.form')
    
    </form>
    {{-- {!!Form::close()!!} --}}
    
</div>
<div class="back-button-div">
<a href="{{route('contactgroup.index')}}"><button class="btn btn-primary"><span class="back-button">Back</span></button></a>
</div>