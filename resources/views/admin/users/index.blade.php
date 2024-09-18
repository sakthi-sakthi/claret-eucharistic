@extends('layouts.admin')

@section('title', 'All Users')

@section('content')

<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h5 class="card-title">All Users</h5>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success" id="hideAfter3Seconds">{{ session('success') }}</div>
            <script>
                setTimeout(function() {
                    document.getElementById("hideAfter3Seconds").style.display = "none";
                }, 3000);
            </script>
            @endif
            <a href="/users/create" class="btn btn-primary btn-sm mb-3"><i class="fa fa-plus"></i> Add User</a>
            <div class="table-responsive">
                <table class="table datatable table-striped table-hover table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d-m-Y') }}</td>
                            <td>
                                @if (auth()->user()->role == 'admin' || auth()->user()->id == $user->id)
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                @endif
                                @if (auth()->user()->role == 'admin')
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user? This action cannot be undone.')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endSection