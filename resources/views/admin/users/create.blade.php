@extends('layouts.adminMain');
@section('content')
    <h2>Add Users</h2>
    <form method="POST" action="{{ url('admin/users') }}">
        @csrf
        <label style="margin-top: 10px">Name</label>
        <input class="form-control" name="name" value="{{ old('name') }}" />
        @error('name')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
       
        <label style="margin-top: 10px">E-mail</label>
        <input class="form-control" name="email" type="email" value="{{ old('email') }}" />

        <label style="margin-top: 10px">Password</label>
        <input class="form-control" name="password" type="password" value="{{ old('password') }}" />
        
        <label style="margin-top: 10px">Is Admin
        <input name="is_admin" type="checkbox" {{ old('is_admin')?'checked':'' }} /></label><br/>
        
        <button style="margin-top: 10px" class="btn btn-primary">Add</button>
        <a style="margin-top: 10px" class="btn btn-secondary" href="{{ url('admin/users') }}">Cancel</a>
    </form>
@endsection
