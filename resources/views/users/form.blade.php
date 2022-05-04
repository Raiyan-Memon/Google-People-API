<div class="form-group">
    <label for=""><b> Name </b></label>
    <input type="text" class="form-control"  name="name" value="{{$user->name ?? ""}}" >
    {{-- <span class="text-danger">  --}}
        @error('name')
        {{$message}}
        @enderror
    </span>
</div>

<div class="form-group">
    <label for=""><b>Email</b></label>
    <input type="text" class="form-control" name="email" value="{{$user->email ?? ""}}">
    
        @error('email')
        {{$message}}
        @enderror
    </span>
</div>

<div class="form-group">
    <label for=""><b>Password</b></label>
    <input type="password" class="form-control" name="password"  ><br> 
   
</div>


<button class="btn btn-primary">Submit</button>
</div>

</div>