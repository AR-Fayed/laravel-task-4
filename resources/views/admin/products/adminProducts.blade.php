@extends('layouts.adminMain')
@section('content')
{{-- {{Route::currentRouteName()}} --}}

@if ($message=Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{$message}}</strong>
</div>
@endif
<h1 class="m-0">Products</h1>

<a class="btn btn-success" href="{{url('admin/products/create')}}">Add</a>
<!-- Table start -->
<div class="container-fluid">
  <div class="row">
      <div class="col-12">
          <table class="table table-boarded">
              <thead>
                  <tr style="font-weight: bold; font-size: 20px; text-align:center">
                      <td>ID</td>
                      <td>Name</td>
                      <td>Category</td>
                      <td>Image</td>
                      <td colspan="3">Actions</td>
                  </tr>
              </thead>
              <tbody>
                  @foreach($products as $product)
                  <tr style="text-align:center">
                      <td>{{$product['id']}}</td>
                      <td>{{$product['name']}}</td>
                      <td>{{$product['category']['name']}}</td>
                      <td><img src="{{asset('storage/'.$product['image'])}}" width="100px" height="100px"/></td>
                      <td><a class="btn btn-success" href="{{url('admin/products/'.$product->id)}}"><h7 class="fa fa-eye text-white"></h7></a></td>
                      <td><a class="btn btn-success" href="{{url('admin/products/'.$product->id.'/edit')}}"><h7 class="fa fa-pen text-white"></h7></a></td>
                      <td>
                        <form action="{{url('admin/products/'.$product->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button onclick="return confirm('Are you sure?')" class="btn btn-danger"><h7 class="fa fa-trash text-white"></h7></button></td>
                        </form>
                  </tr>
                  @endforeach
              </tbody>
          </table>
          {!! $products->links() !!}
      </div> 
  </div>
</div>
<!-- Table end -->

@endsection