@extends('layout.dashbordlayout')
@section('content')
<div class="container">
    <div class="head btn btn-primary offset-3 mt-5" style="width:33rem;">
        <h6 class="text-center"> Product Category Insert</h6>
    </div>
    <div class="row">
        <div class=" offset-md-3 col-md-6 mt-5">
            <form action="{{url('dashbord/store-product-category')}}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="">Enter Category Name</label>
                <input type="text" name="title" value{{old('title')}} placeholder="Category Name" class="form-control">
                @error('title')
               <p class="text-denger">{{$message}}</p>
                @enderror
                <br>
            <label for="">Enter Category Image</label>
                <input type="file" name="catimg" value{{old('catimg')}} placeholder="Category Image" class="form-control">
                @error('catimg')
                <p class="text-danger">{{$message}}</p>

                @enderror
                <br>
                <button class="btn btn-primary"> Insert</button>

            </form>
           </div>
        </div>
     </div>


@endsection

