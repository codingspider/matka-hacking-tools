@extends('layouts')
@section('content')
<h2 class="mb-4">User List</h2>

    <!-- Responsive Table -->
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Balance</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                    
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->firstname }} {{ $item->lastname }}</td>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->mobile }}</td>
                    <td>{{ $item->balance }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection