@extends('layout.dashbordlayout')
@section('content')
<div class="container">
    <div class="head btn btn-primary offset-3 mt-5" style="width:33rem;">
        <h6 class="text-center"> Product Category Insert</h6>
    </div>
    <div class="row">
        <div class=" offset-md-3 col-md-6 mt-5">
            <form action="{{url('/dashbord/update-product-category')}}/{{$data[0]->catid}}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="">Enter Category Name</label>
                <input type="text" name="title" value="{{$data[0]->catname}}" placeholder="Category Name" class="form-control">
                @error('title')
               <p class="text-denger">{{$message}}</p>
                @enderror
                <br>
            <label for="">Enter Category Image</label>
                <input type="file" name="catimg" value="{{$data[0]->catimg}}" placeholder="Category Image" class="form-control">
                <input type="hidden" class="form-control" name="oldimg" value="{{$data[0]->catimg}}">
                <img src="{{url('/')}}/{{$data[0]->catimg}}" style=" width: 80px; height:50px;" alt="">
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

