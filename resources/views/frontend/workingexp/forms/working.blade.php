<?php
use Illuminate\Support\Facades\DB;
$dept = DB::table('department_master')->get();
// $dep
?>


            <div class="form-group col-sm-6">
                <label for="certificate_type">Sector</label>
                <select class="form-control" name="sector">
                    <option value="">--Please Select--</option>
                    <option value="government" {{ old('sector')=='government' ? 'selected' : '' }}>Government</option>
                    <option value="private" {{ old('sector')=='private' ? 'selected' : '' }}>Private</option>
                </select>
                @error('sector')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-sm-6">
                <label for="name_number_id">Name</label>
                <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{ old('name') }}">
                @error('name')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-sm-6">
                <label for="rank">Designation</label>
                <input type="text" class="form-control" placeholder="Enter Designation" name="designation"
                    value="{{ old('designation') }}">
                @error('designation')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-sm-6">
                <label for="employee_id">Employee ID (If Any)</label>
                <input type="text" class="form-control" id="employee_id" placeholder="Enter Employee ID"
                    name="employ_id" value="{{ old('employ_id') }}">
                @error('employ_id')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-sm-6" id="department">
                <label for="department_input">Department</label>
                <select class="form-control" name="sector">
                    <option value="">--Please Select--</option>

                    @foreach ($dept as $item)
                    <option value="{{ $item->id }}">{{ $item->dept_name }}</option>

                    @endforeach
                </select>

                {{-- <input type="text" class="form-control" id="department_input" placeholder="Enter Department"
                    name="dept" value="{{ old('dept') }}"> --}}
                @error('dept')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-sm-6">
                <label for="division">Division</label>
                <input type="text" class="form-control" id="division" placeholder="Enter Division" name="division"
                    value="{{ old('division') }}">
                @error('division')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-sm-6">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" placeholder="Enter Location" name="location"
                    value="{{ old('location') }}">
                @error('location')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-sm-6">
                <label for="start_date">Start Date</label>
                <input type="date" class="form-control" id="start_date" placeholder="Enter Start Date" name="start_date"
                    value="{{ old('start_date') }}">
                @error('start_date')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-sm-6">
                <label for="end_date">End Date</label>
                <input type="date" class="form-control" id="end_date" placeholder="Enter End Date" name="end_date"
                    value="{{ old('end_date') }}">
                @error('end_date')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <h3>Upload Documents</h3>

            <div class="form-group col-sm-6">
                <label for="document_type">Documents</label>
                <select class="form-control" id="document_type" name="doc_type">
                    <option value="">--Please Select--</option>
                    <option value="offer_letter" {{ old('doc_type')=='offer_letter' ? 'selected' : '' }}>Offer Letter
                    </option>
                    <option value="agreement_copy" {{ old('doc_type')=='agreement_copy' ? 'selected' : '' }}>Copy of
                        Agreement</option>
                </select>
                @error('doc_type')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>




