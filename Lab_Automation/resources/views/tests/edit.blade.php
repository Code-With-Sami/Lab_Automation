@extends('tests.master')

@section('content')
<div class="container my-3 py-5">
    <h2>Edit Test</h2>
    <form action="{{ route('tests.update', $test->test_id) }}" method="POST">
        @csrf @method('PUT')
        <div class="my-3">
            <label for="test_type" class="form-label">Test Type</label>
            <input type="text" name="test_type" class="form-control" value="{{ $test->test_type }}" required>
        </div>
        <div class="mb-3">
            <label for="criteria" class="form-label">Test Criteria</label>
            <textarea name="criteria" class="form-control" required>{{ $test->criteria }}</textarea>
        </div>
        <div class="mb-3">
            <label for="result" class="form-label">Result</label>
            <select name="result" class="form-control">
                <option value="Pass" {{ $test->result == 'Pass' ? 'selected' : '' }}>Pass</option>
                <option value="Fail" {{ $test->result == 'Fail' ? 'selected' : '' }}>Fail</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="Pending" {{ $test->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="In Progress" {{ $test->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                <option value="Completed" {{ $test->status == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Test</button>
    </form>
</div>
@endsection
