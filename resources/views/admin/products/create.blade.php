@extends('layouts.adminMain');
@section('content')
    <h2>Add Product</h2>
    <form method="POST" action="{{ url('admin/products') }}" enctype="multipart/form-data">
        @csrf
        <label style="margin-top: 10px">Name</label>
        <input class="form-control" name="name" value="{{ old('name') }}" />
        @error('name')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <label style="margin-top: 10px">Description</label>
        <input class="form-control" name="description" value="{{ old('description') }}" />
       
        <label style="margin-top: 10px">Price</label>
        <input class="form-control" name="price" type="number" value="{{ old('price') }}" />
        
        <label style="margin-top: 10px">Discount</label>
        <input class="form-control" name="discount" type="float" value="{{ old('discount') }}" />
        
        <input style="margin-top: 10px" name="image" type="file" /><br />
        @error('image')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror

        <select style="margin-top: 10px" name="color_id">
            <option>Select Color</option>
            @foreach ($colors as $color)
            <option value="{{ $color->id }}">{{$color['name']}}</option>
            @endforeach
        </select><br />
        
        <select style="margin-top: 10px" name="size_id" >
            <option>Select Size</option>
            @foreach($sizes as $size)
            <option value="{{$size->id}}">{{$size['name']}}</option>
            @endforeach
        </select><br />
        
        <select style="margin-top: 10px" name="category_id">
            <option>Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category['id'] ? 'selected' : '' }}>
                    {{ $category['name'] }}</option>
            @endforeach
        </select><br />
        
        <label style="margin-top: 10px">Is Recent <input type="checkbox" name="is_recent" {{old('is_recent')?'checked':''}}/></label><br/>
        <label style="margin-top: 10px">Is Featured <input type="checkbox" name="is_featured" {{old('is_featured')?'checked':''}}/></label><br/>

        <button style="margin-top: 10px" class="btn btn-primary">Add</button>
        <a style="margin-top: 10px" class="btn btn-secondary" href="{{ url('admin/products') }}">Cancel</a>
    </form>
@endsection
