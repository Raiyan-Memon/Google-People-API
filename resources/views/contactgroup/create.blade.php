
@include('layouts.app')


<div class="container">
    <a href="{{route('contactgroup.index')}}"><button class="btn btn-primary">Go to List</button></a>
<form action="{{route('contactgroup.store')}}" method="POST">

   @include('contactgroup.form')
    
</form>
</div>
