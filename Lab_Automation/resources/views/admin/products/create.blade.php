@extends('admin.master')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-2"></div>
        <div class="col-md-8 mt-5">
            <h1>Add Product</h1>
            <form action="{{ url('store-product') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <input type="text" name="pname" class="form-control mt-3" placeholder="Name">
                <input type="text" name="pdescription" class="form-control mt-3" placeholder="Description">
                <input type="text" name="pprice" class="form-control mt-3" placeholder="Price">
                <input type="text" name="pqty" class="form-control mt-3" placeholder="Quantity">
                <input type="file" name="pimage" class="form-control mt-3">
                <select name="pstatus" class="form-control mt-3" required>
                    <option value="0">Select Status</option>
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
