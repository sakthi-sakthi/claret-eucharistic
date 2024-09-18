@extends('layouts.admin')

@section('title', 'Enrollment Registration Form')

@section('content')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Enrollment Registration Form</h5>
        <a href="{{ route('admin.pages.index') }}" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
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
        <form class="row g-3 mt-3" action="" method="POST" enctype="multipart/form-data" autocomplete="off">
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
                <label for="date_of_join" class="form-label">Date of Join <span class="text-danger">*</span></label>
                <input type="date" class="form-control" id="date_of_join" name="date_of_join">
                @error('date_of_join')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="door_no" class="form-label">Door No <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="door_no" name="door_no">
                @error('door_no')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Row 2 -->
            <div class="col-md-4">
                <label for="district" class="form-label">District <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="district" name="district">
                @error('district')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="street_nagar" class="form-label">Street/Nagar <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="street_nagar" name="street_nagar">
                @error('street_nagar')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="pin" class="form-label">Pin <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="pin" name="pin" maxlength="6" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g, '')" oninput="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g, '')" onkeypress="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g, '')" onpaste="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g, '')" onchange="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g, '')" onblur="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g, '')" onfocus="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g, '')" onkeydown="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g, '')">
                @error('pin')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Row 3 -->
            <div class="col-md-4">
                <label for="village" class="form-label">Village <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="village" name="village">
                @error('village')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="post_office" class="form-label">Post Office <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="post_office" name="post_office">
                @error('post_office')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="state" class="form-label">State <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="state" name="state">
                @error('state')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Row 4 -->
            <div class="col-md-4">
                <label for="country" class="form-label">Country <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="country" name="country">
                @error('country')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="diocese" class="form-label">Diocese <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="diocese" name="diocese">
                @error('diocese')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="mobile_no" class="form-label">Mobile No <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="mobile_no" name="mobile_no" maxlength="10" minlength="10">
                @error('mobile_no')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Row 5 -->
            <div class="col-md-4">
                <label for="whatsapp_no" class="form-label">Whatsapp No <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="whatsapp_no" name="whatsapp_no" maxlength="10" minlength="10">
                @error('whatsapp_no')
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
                <label for="signature" class="form-label">Signature <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="signature" name="signature">
                @error('signature')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Row 6 -->
            <div class="col-md-12">
                <label for="any_other_intention" class="form-label">Any Other Intention (If Any)</label>
                <textarea class="form-control" id="any_other_intention" name="any_other_intention" rows="3"></textarea>
            </div>

            <!-- Dynamic Table Form -->
            <div class="form-container">
                <h5>Marriage & Birthday Details</h5>
                <button type="button" class="add-button btn btn-success btn-sm" onclick="addRow()" style="float: right;"><i class="fas fa-plus"></i></button>
                <br />
                <table id="dynamicTable" class="table table-bordered table-striped table-hover table-responsive mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Relation</th>
                            <th>Date of Birth (D/M/Y)</th>
                            <th>Date of Marriage (D/M/Y)</th>
                            <th>Mobile</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><input type="text" name="dynamic_name[]" placeholder="Enter name" class="form-control"></td>
                            <td><input type="text" name="dynamic_relation[]" placeholder="Enter relation" class="form-control"></td>
                            <td>
                                <input type="number" name="dynamic_dob_day[]" placeholder="Day" class="form-control" min="1" max="31">
                                <input type="number" name="dynamic_dob_month[]" placeholder="Month" class="form-control" min="1" max="12" id="date-field">
                                <input type="number" name="dynamic_dob_year[]" placeholder="Year" class="form-control" min="1900" max="2100" id="date-field">
                            </td>
                            <td>
                                <input type="number" name="dynamic_dom_day[]" placeholder="Day" class="form-control" min="1" max="31">
                                <input type="number" name="dynamic_dom_month[]" placeholder="Month" class="form-control" min="1" max="12" id="date-field">
                                <input type="number" name="dynamic_dom_year[]" placeholder="Year" class="form-control" min="1900" max="2100" id="date-field">
                            </td>
                            <td><input type="text" minlength="10" maxlength="10" name="dynamic_mobile[]" placeholder="Enter mobile" class="form-control"></td>
                            <td>
                                <button type="button" class="remove-button btn btn-danger btn-sm" onclick="removeRow(this)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Death Anniversary Table Form -->
            <div class="form-container">
                <h5>Death Anniversary of Family Members</h5>
                <button type="button" class="add-button btn btn-success btn-sm" onclick="addDeathRow()" style="float: right;"><i class="fas fa-plus"></i></button>
                <br />
                <table id="dynamicDeathTable" class="table table-bordered table-striped table-hover table-responsive mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Relation</th>
                            <th>Date</th>
                            <th>Month</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><input type="text" name="death_name[]" placeholder="Enter name" class="form-control"></td>
                            <td><input type="text" name="death_relation[]" placeholder="Enter relation" class="form-control"></td>
                            <td><input type="number" name="death_day[]" placeholder="Day" class="form-control" min="1" max="31"></td>
                            <td><input type="number" name="death_month[]" placeholder="Month" class="form-control" min="1" max="12"></td>
                            <td>
                                <button type="button" class="remove-button btn btn-danger btn-sm" onclick="removeDeathRow(this)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Submit and Reset -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Submit</button>
                <button type="reset" class="btn btn-secondary btn-sm"><i class="fas fa-redo"></i> Reset</button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('assets/js/enrollment.js') }}"></script>
@endsection