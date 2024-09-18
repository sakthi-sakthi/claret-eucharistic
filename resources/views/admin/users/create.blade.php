@extends('layouts.admin')

@section('title', 'Add Users Details')

@section('content')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Add Users Details</h5>
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
        <form class="row g-3" method="POST" action="{{ route('admin.users.store') }}" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <!-- Row 1 -->
            <div class="col-md-4">
                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="name" name="name" autofocus>
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email" name="email">
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="role" class="form-label">Role <span class="text-danger">*</span></label>
                <select class="form-select" id="role" name="role">
                    <option selected>Choose...</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
                @error('role')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="password" name="password">
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit and Reset -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/users/list" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('assets/js/enrollment.js') }}"></script>
@endsection