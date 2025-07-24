@extends('master')
@section('content')
<div class="container" style="margin: 100px 50px;">
    <h2>My Tests</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Status</th>
                <th>Result</th>
                <th>Requested At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tests as $test)
                <tr>
                    <td>{{ $test->product->name }}</td>
                    <td>{{ $test->status }}</td>
                    <td>{{ $test->result }}</td>
                    <td>{{ $test->created_at->format('d M Y, H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection