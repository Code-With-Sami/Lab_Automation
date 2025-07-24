@extends('admin.master')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-2"></div>
        <div class="col-md-8 mt-5">
            <h1>Add Product</h1>
            <form action="{{ url('update-product/'.$product->id) }}" enctype="multipart/form-data" method="POST">
                @csrf
                <input type="text" name="pname" value="{{$product->id}}" class="form-control mt-3" placeholder="Name">
                <input type="text" name="pdescription" value="{{$product->description}}" class="form-control mt-3" placeholder="Description">
                <input type="text" name="pprice" value="{{$product->price}}" class="form-control mt-3" placeholder="Price">
                <input type="text" name="pqty" value="{{$product->quantity}}" class="form-control mt-3" placeholder="Quantity">
                <img src="{{asset('productsImages/'.$product->image)}}" width="150px" alt="">
                <input type="file" name="pimage" class="form-control mt-3">
                <select name="pstatus" value="{{$product->status}}" class="form-control mt-3" required>
                    <option value="0" disabled selected>{{$product->status}}</option>
                    <option value="active">Active</option>
                    <option value="deactive">Deactive</option>
                </select>

                <input type="submit" class="btn btn-primary mt-3">
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection
