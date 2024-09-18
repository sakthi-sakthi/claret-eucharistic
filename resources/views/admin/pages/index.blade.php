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
                    <a href="javascript:void(0)" class="btn btn-success btn-sm mb-3" onclick="generatePDF()"><i class="fa fa-file-pdf"></i> Export PDF</a>
                    <a href="javascript:void(0)" class="btn btn-secondary btn-sm mb-3" onclick="generateExcel()"><i class="fa fa-file-excel"></i> Export CSV</a>
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
                                    <a href="/enroll/view/{{ $enrollment->id }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('enrollment.edit', $enrollment->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>

                                    <form id="delete-form-{{ $enrollment->id }}" action="{{ route('delete', $enrollment->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $enrollment->id }})"><i class="fa fa-trash"></i></button>
                                    <script>
                                        function confirmDelete(id) {
                                            if (confirm('Are you sure you want to delete this item?')) {
                                                document.getElementById('delete-form-' + id).submit();
                                            }
                                        }
                                    </script>
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
<script>
   async function generateExcel() {
        const response = await fetch('http://127.0.0.1:8000/api/enroll/list');
        const data = await response.json();
        const flattenData = data.enrollment.map(item => {
            return {
                ...item,
                death_anniversary: item.death_anniversary.map(death => 
                    `${death.name} (${death.relation}), ${death.day} ${death.month}`
                ).join('; '),
                family_details: item.family_details.map(family => 
                    `${family.name} (${family.relation}), DOB: ${family.dob_day} ${family.dob_month} ${family.dob_year}, DOM: ${family.dom_day} ${family.dom_month} ${family.dom_year}, Mobile: ${family.mobile}`
                ).join('; ')
            };
        });
        const ws_data = [
            Object.keys(flattenData[0]).map(key => key.replace(/_/g, ' ').toUpperCase()),
            ...flattenData.map(item => Object.values(item))
        ];

        const ws = XLSX.utils.aoa_to_sheet(ws_data);
        const wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, "Enrollments");

        XLSX.writeFile(wb, "enrollments.xlsx");
    }
</script>

@endsection