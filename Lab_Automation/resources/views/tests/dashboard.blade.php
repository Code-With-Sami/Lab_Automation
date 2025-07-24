@extends('tests.master')

@section('content')
<div class="container py-5">
    <h2>All Tests</h2>
    <a href="{{ url('create-tests') }}" class="btn btn-primary my-3">Add New Test</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Test ID</th>
                <th>Product</th>
                <th>Test Type</th>
                <th>Assigned By</th>
                <th>Status</th>
                <th>Result</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tests as $test)
                <tr>
                    <td>{{ $test->test_id }}</td>
                    <td>{{ $test->product->name ?? 'N/A' }}</td> <!-- Handle null product -->
                    <td>{{ $test->test_type }}</td>
                    <td>{{ $test->assignedBy->name ?? 'Admin' }}</td> <!-- Show Assigned By -->
                    <td>
                        @if($test->status == 'Pending')
                            <span class="badge bg-warning">Pending</span>
                        @elseif($test->status == 'In Progress')
                            <span class="badge bg-info">In Progress</span>
                        @elseif($test->status == 'Completed')
                            <span class="badge bg-success">Completed</span>
                        @else
                            <span class="badge bg-secondary">Unknown</span>
                        @endif
                    </td>
                    <td>{{ $test->result }}</td>
                    <td>
                    <a href="{{ route('tests.edit', $test->test_id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('tests.destroy', $test->test_id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this test?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
