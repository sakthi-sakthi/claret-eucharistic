@extends('layouts.admin')

@section('title', 'Edit Users Details')

@section('content')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Edit Users Details</h5>
        @if ($message = Session::get('success'))
        <div class="alert alert-success" id="hideAfter3Seconds">
            <p>{{ $message }}</p>
        </div>
        <script>
            setTimeout(function() {
                document.getElementById("hideAfter3Seconds").style.display = "none";
            }, 3000);
        </script>
        @endif
        <!-- Multi Columns Form -->
        <form class="row g-3" method="POST" action="{{ route('users.update', $users->id) }}" autocomplete="off" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Row 1 -->
            <div class="col-md-4">
                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $users->name) }}" autofocus>
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="col-md-4">
                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $users->email) }}">
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="role" class="form-label">Role <span class="text-danger">*</span></label>
                <select class="form-control" id="role" name="role">
                    <option value="admin" {{ old('role', $users->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ old('role', $users->role) == 'user' ? 'selected' : '' }}>User</option>
                </select>
                @error('role')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Leave blank to keep current password">
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit and Reset -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="/users/list" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('assets/js/enrollment.js') }}"></script>
@endsection