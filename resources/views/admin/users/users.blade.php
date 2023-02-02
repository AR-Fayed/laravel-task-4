@extends('layouts.adminMain')
@section('content')
{{-- {{Route::currentRouteName()}} --}}

@if ($message=Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{$message}}</strong>
</div>
@endif
<h1 class="m-0">Users</h1>

<a class="btn btn-success" href="{{url('admin/users/create')}}">Add</a>
<!-- Table start -->
<div class="container-fluid">
  <div class="row">
      <div class="col-12">
          <table class="table table-boarded">
              <thead>
                  <tr style="font-weight: bold; font-size: 20px; text-align: center">
                      <td>ID</td>
                      <td>Name</td>
                      <td>E-mail</td>
                      <td>Is Admin</td>
                      <td colspan="2">Actions</td>
                  </tr>
              </thead>
              <tbody>
                  @foreach($users as $user)
                  <tr style="text-align:center">
                      <td>{{$user['id']}}</td>
                      <td>{{$user['name']}}</td>
                      <td>{{$user['email']}}</td>
                      {{-- @if($user['is_admin'] == true)
                        <td>Yes</td>
                      @else
                        <td>No</td>
                      @endif --}}
                      <td>
                        <form action="{{url('admin/users/'.$user->id)}}" method="POST">
                            @method('PUT')
                            @csrf
                            <button class="btn btn-success">{{$user['is_admin']?'yes':'no'}}</button></td>
                        </form>
                        </td>
                        <td>
                        <form action="{{url('admin/users/'.$user->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button onclick="return confirm('Are you sure?')" class="btn btn-danger"><h7 class="fa fa-trash text-white"></h7></button>
                        </form>
                    </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
          {!! $users->links() !!}
      </div> 
  </div>
</div>
<!-- Table end -->

@endsection