@include('layouts.app')

<div class="container">
<form action="{{route('contactgroup.update', $contactgroup)}}" method="POST">
    {{-- {!!Form::open ([
        'url' => route('accounts.update', $account),
        'method' => 'POST'
    ])!!} --}}
    @csrf
    @method('PATCH')
   
    <h1 class="text-center">Updation form</h1>

    @include('contactgroup.form')
    
    </form>
    {{-- {!!Form::close()!!} --}}
    


</div>