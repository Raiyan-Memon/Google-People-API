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

<div class="container1">
<form action="{{route('users.store')}}" method="POST">
@csrf

<div class="container">
    <h1 class="text-center">Registration Form</h1>
    @include('users.form')
</form>
</div
</div>