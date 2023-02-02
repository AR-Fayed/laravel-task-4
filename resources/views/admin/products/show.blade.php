@extends('layouts.adminMain')
@section('content')

<h2>Show Product</h2>
    <form>
        <label>Name</label>
        <h3>{{$product->name}}
        <img style="width: 150px; height: 150px" src="{{asset('storage/'.$product['image'])}}" />
        <a class="btn btn-secondary" href="{{url('admin/products')}}">Back to Products</a>
    </form>

@endsection