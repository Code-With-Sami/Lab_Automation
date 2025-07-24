@extends('tests.master')

@section('content')
<div class="container">
    <h2>Add New Test</h2>
    <form action="{{ url('store-tests') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="product_id" class="form-label">Select Product</label>
            <select name="product_id" class="form-control" required>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="test_type" class="form-label">Test Type</label>
            <input type="text" name="test_type" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="criteria" class="form-label">Test Criteria</label>
            <textarea name="criteria" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="tested_by" class="form-label">Tested By</label>
            <input type="text" name="tested_by" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Save Test</button>
    </form>
</div>
@endsection
