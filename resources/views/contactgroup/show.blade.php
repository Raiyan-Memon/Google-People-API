@include('layouts.app')

<style>
 .container{
        position: absolute; 
        top: 15%;
        left: 30%;
        width: 50%;
        display: inline-block;
    }
  
</style>

<div class="container">
    <h1 class="text-left">Showing the selected data</h1><br>
<h5><b>Resource Name</b> : {{$contactgroup->resourceName}}</h5>
<h5><b>eTag</b> : {{$contactgroup->etag}}</h5>
<h5><b>Group Type</b> : {{$contactgroup->groupType}}</h5>
<h5><b>Name</b> : {{$contactgroup->name}}</h5>
<h5><b>formattedName</b> : {{$contactgroup->formattedName}}</h5>
<h5><b>Member Count</b> : {{$contactgroup->memberCount}}</h5>

<a href="{{route('contactgroup.index')}}"><button class="btn btn-primary">Back</button></a>
<a  href="{{route('contactgroup.edit', $contactgroup->id)}}"> <Button class="btn btn-primary" onclick="myfunction()">Edit</Button></a>

</div>
