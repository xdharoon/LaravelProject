@extends('layout.dashbordlayout')
@section('content')
    <div class="container mt-5">
        <div class="header offset-4">
            <h1>Add Product</h1>
        </div>
        <form action="/dashbord/store-product" method="post" enctype="multipart/form-data">
    @csrf
        <div class="row">
            <div class="col-md-4 offset-2" >
                @csrf

                <label for=""> Enter Name</label><br>
              <input type="text" name="pname" placeholder=" Enter Name" value="{{old('pname')}}" class="form-control">
              @error('pname')
              <p class="text-danger">{{$message}}</p>

              @enderror
            </div>
            <div class="col-md-4">
                <label for=""> Enter Price</label><br>
                <input type="text" name="pprice" placeholder=" Enter price" value="{{old('pname')}}" class="form-control">
                @error('pprice')
              <p class="text-danger">{{$message}}</p>

              @enderror
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4 offset-2" >
                <label for="">Enter Description</label><br>
                <textarea name="pdesc"  cols="36" row="10">{{old('pdesc')}}</textarea>
              @error('pdesc')
              <p class="text-danger">{{$message}}</p>

              @enderror
            </div>
            <div class="col-md-4">
                <label for="">Picture</label><br>
                <input type="file" name="pimg"  value="{{old('pname')}}" class="form-control">
                @error('pimg')
                <p class="text-danger">{{$message}}</p>

                @enderror
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4 offset-2" >
                <label for="">Status</label>
    <select name="status" class="form-control ">
        <option value="1">Stock</option>
        <option value="0">out stock</option>
    </select>

            </div>
            <div class="col-md-4">
                <Label>Select Category</Label>
                <select name="cat" class="form-control">
                    @foreach ($data as $item )
                    <option value="{{$item->catid}}">{{$item->catname}}</option>
                    @endforeach
                </select>
                @error('cat')
                <p class="text-danger">{{$message}}</p>


                @enderror

            </div>
        </div>
        <br>
        <button  type="submit" class="btn btn-primary offset-4" style="width:15rem;"> Submit</button>
    </form>
      </div>

@endsection


