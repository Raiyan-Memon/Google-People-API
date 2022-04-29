@include('layouts.app')

<div class="container">
    <h1 class="text-left">Showing the selected data</h1>
<h5><b>Resource Name</b> : {{$contactgroup->resourceName}}</h5>
<h5><b>eTag</b> : {{$contactgroup->etag}}</h5>
<h5><b>Group Type</b> : {{$contactgroup->groupType}}</h5>
<h5><b>Name</b> : {{$contactgroup->name}}</h5>
<h5><b>formattedName</b> : {{$contactgroup->formattedName}}</h5>
<h5><b>Member Count</b> : {{$contactgroup->memberCount}}</h5>

</div>
