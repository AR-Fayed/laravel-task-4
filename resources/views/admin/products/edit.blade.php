@extends('layouts.adminMain')
@section('content')

<h2>Edit product</h2>
<form method="POST" action="{{ url('admin/products/'.$product->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label style="margin-top: 10px">Name</label>
    <input class="form-control" name="name" value="{{ old('name', $product->name) }}" />
    @error('name')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
    <label style="margin-top: 10px">Description</label>
    <input class="form-control" name="description" value="{{ old('description', $product->description) }}" />
    @error('description')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
   
    <label style="margin-top: 10px">Price</label>
    <input class="form-control" name="price" type="number" value="{{ old('price', $product->price) }}" />
    @error('price')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
    <label style="margin-top: 10px">Discount</label>
    <input class="form-control" name="discount" type="float" value="{{ old('discount', $product->discount) }}" />
    @error('discount')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
    <input style="margin-top: 10px" name="image" type="file" /><br />
    @error('image')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
    <select style="margin-top: 10px" name="color" value="{{old('color', $product->color)}}">
        <option>Select Color</option>
        @foreach ($colors as $color)
        <option>{{$color['name']}}</option>
        @endforeach
    </select><br />
    @error('color')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
    <select style="margin-top: 10px" name="size" value="{{old('size', $product->size)}}">
        <option>Select Size</option>
        @foreach($sizes as $size)
        <option>{{$size['name']}}</option>
        @endforeach
    </select><br />
    @error('size')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
    <select style="margin-top: 10px" name="category_id"  value="{{old('category_id', $product->category_id)}}">
        <option>Select Category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id') == $category['id'] ? 'selected' : '' }}>
                {{ $category['name'] }}</option>
        @endforeach
    </select><br />
    @error('category_id')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
    

    <label style="margin-top: 10px">Is Recent <input  type="checkbox" name="is_recent" {{old('is_recent')?'checked':''}}/></label><br/>
    <label style="margin-top: 10px">Is Featured <input  type="checkbox" name="is_featured" {{old('is_featured')?'checked':''}}/></label><br/>


    <button style="margin-top: 10px" class="btn btn-primary">Update</button>
    <a style="margin-top: 10px" class="btn btn-secondary" href="{{ url('admin/products') }}">Cancel</a>
</form>
@endsection