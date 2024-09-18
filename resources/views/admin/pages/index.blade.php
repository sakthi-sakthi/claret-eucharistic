@extends('layouts.admin')

@section('title', 'Index Enrollment Form')

@section('content')

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">All Enrolled Members</h5>
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
                    <form action="{{ route('admin.pages.index') }}" method="GET" class="mb-4" autocomplete="off">
                        <div class="row">
                            <div class="col-md-3">
                                <input type="number" class="form-control" name="year" placeholder="Year" value="{{ request('year') }}" min="1900" max="2100">
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" name="month">
                                    <option value="">Select Month</option>
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}" {{ request('month') == $i ? 'selected' : '' }}>{{ \Carbon\Carbon::create(2022, $i, 1)->format('F') }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input type="number" class="form-control" name="start_day" placeholder="Day" min="1" max="31" value="{{ request('start_day') }}">
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-filter"></i> Filter</button>
                                <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary btn-sm"><i class="fa fa-times"></i> Clear</a>
                            </div>
                        </div>
                    </form>
                    <a href="/enroll-form" class="btn btn-primary btn-sm mb-3"><i class="fa fa-plus"></i> Add New</a>
                    <table class="table datatable table-striped table-hover table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Date of Join</th>
                                <th>Door Number</th>
                                <th>District</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($enrollments as $enrollment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $enrollment->name }}</td>
                                <td>{{ $enrollment->email }}</td>
                                <td>{{ $enrollment->mobile_no }}</td>
                                <td>{{ \Carbon\Carbon::parse($enrollment->date_of_join)->format('d-m-Y') }}</td>
                                <td>{{ $enrollment->door_no }}</td>
                                <td>{{ $enrollment->district }}</td>
                                <td>
                                    <a href="" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                    <a href="" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></button>
                                   
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')

@endsection