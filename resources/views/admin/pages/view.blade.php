@extends('layouts.admin')

@section('title', 'View Enrollment Details')

@section('content')

<div class="col-sm-12 col-lg-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">{{ $enrollment->name }} - Enrollment Details</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <label class="form-label"><strong>Name:</strong></label>
                    <p>{{ $enrollment->name }}</p>
                </div>
                <div class="col-md-3">
                    <label class="form-label"><strong>Date of Join:</strong></label>
                    <p>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $enrollment->date_of_join)->format('d-m-Y') }}</p>
                </div>
                <div class="col-md-3">
                    <label class="form-label"><strong>Door No:</strong></label>
                    <p>{{ $enrollment->door_no }}</p>
                </div>
                <div class="col-md-3">
                    <label class="form-label"><strong>District:</strong></label>
                    <p>{{ $enrollment->district }}</p>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label class="form-label"><strong>District:</strong></label>
                    <p>{{ $enrollment->district }}</p>
                </div>
                <div class="col-md-3">
                    <label class="form-label"><strong>Street/Nagar:</strong></label>
                    <p>{{ $enrollment->street_nagar }}</p>
                </div>
                <div class="col-md-3">
                    <label class="form-label"><strong>Pincode:</strong></label>
                    <p>{{ $enrollment->pin }}</p>
                </div>
                <div class="col-md-3">
                    <label class="form-label"><strong>Village:</strong></label>
                    <p>{{ $enrollment->village }}</p>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label class="form-label"><strong>Post Office:</strong></label>
                    <p>{{ $enrollment->post_office }}</p>
                </div>
                <div class="col-md-3">
                    <label class="form-label"><strong>State:</strong></label>
                    <p>{{ $enrollment->state }}</p>
                </div>
                <div class="col-md-3">
                    <label class="form-label"><strong>Country:</strong></label>
                    <p>{{ $enrollment->country }}</p>
                </div>
                <div class="col-md-3">
                    <label class="form-label"><strong>Diocese:</strong></label>
                    <p>{{ $enrollment->diocese }}</p>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label class="form-label"><strong>Mobile No:</strong></label>
                    <p>{{ $enrollment->mobile_no }}</p>
                </div>
                <div class="col-md-3">
                    <label class="form-label"><strong>Whatsapp No:</strong></label>
                    <p>{{ $enrollment->whatsapp_no }}</p>
                </div>
                <div class="col-md-3">
                    <label class="form-label"><strong>Email:</strong></label>
                    <p>{{ $enrollment->email }}</p>
                </div>
                <div class="col-md-3">
                    <label class="form-label"><strong>Signature:</strong></label>
                    <p>{{ $enrollment->signature }}</p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <label class="form-label"><strong>Any Other Intention:</strong></label>
                    <p>{{ $enrollment->any_other_intention }}</p>
                </div>
            </div>
            <!-- Marriage & Birthday Details -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <h5>Marriage & Birthday Details</h5>
                    <table class="table table-bordered table-striped table-hover mb-0 mt-3">
                        <thead class="table-dark">
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Relation</th>
                                <th>Date of Birth</th>
                                <th>Date of Marriage</th>
                                <th>Mobile</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($enrollment->family_details as $index => $detail)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $detail['name'] }}</td>
                                <td>{{ $detail['relation'] }}</td>
                                <td>{{ $detail['dob_day'] }}-{{ $detail['dob_month'] }}-{{ $detail['dob_year'] }}</td>
                                <td>{{ $detail['dom_day'] }}-{{ $detail['dom_month'] }}-{{ $detail['dom_year'] }}</td>
                                <td>{{ $detail['mobile'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Death Anniversary Details -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <h5>Death Anniversary of Family Members</h5>
                    <table class="table table-bordered table-striped table-hover mb-0 mt-3">
                        <thead class="table-dark">
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Relation</th>
                                <th>Death Date</th>
                                <th>Death Month</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($enrollment->death_anniversary as $index => $detail)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $detail['name'] }}</td>
                                <td>{{ $detail['relation'] }}</td>
                                <td>{{ $detail['day'] }}</td>
                                <td>{{ $detail['month'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <a href="{{ route('admin.pages.index') }}" class="btn btn-danger btn-sm mt-3">Go Back</a>
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endSection
