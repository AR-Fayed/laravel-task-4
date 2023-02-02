@extends('layouts.adminMain')
@section('content')

<h2>Edit Category</h2>
    <form method="POST" action="{{url('admin/categories/'.$category->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label>Name</label>
        <input class="form-control" name="name" value="{{old('name', $category->name)}}"/>
        @error ('name')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
        <input name="image" type="file"/><br/>
        @error ('image')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
        <button class="btn btn-primary">Update</button>
        <a class="btn btn-secondary" href="{{url('admin/categories')}}">Cancel</a>
    </form>

@endsection