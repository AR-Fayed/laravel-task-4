@extends('layouts.adminMain')
@section('content')

<h2>Show Category</h2>
    <form>
        <label>Name</label><br/>
        <h3>{{$category->name}}</h3><br/>
        <img style="width: 150px; height: 150px; margin-bottom:20px" src="{{asset('storage/'.$category->image)}}" /><br/>
        <a class="btn btn-secondary" href="{{url('admin/categories')}}">Back to Categories</a>
    </form>

@endsection