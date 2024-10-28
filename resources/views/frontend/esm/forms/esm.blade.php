<?php
use Illuminate\Support\Facades\DB;
$dept = DB::table('district')->get();
// $dep
?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Ex Serviceman</h3>
    </div>

    <form action="{{ url('esm/store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group ">
                <label for="certificate_type">Certificate Type</label>
                <select class="form-control" id="certificate_type" name="certificate_type">
                    <option value="">--Please Select--</option>
                    <option value="ex_service_man" {{ old('certificate_type')=='ex_service_man' ? 'selected' : '' }}>Ex
                        Service Man Certificate</option>
                    <option value="eligibility_certificate" {{ old('certificate_type')=='eligibility_certificate'
                        ? 'selected' : '' }}>Eligibility Certificate Dependents of ESM</option>
                    <option value="neet_medical" {{ old('certificate_type')=='neet_medical' ? 'selected' : '' }}>
                        NEET/Medical</option>
                </select>
                @error('certificate_type')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div id="forms">
                <div class="card p-3">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="name">Name as In Registration ID</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"
                                value="{{ old('name') }}">
                            @error('name')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="name_number_id">Registration No/ID</label>
                            <input type="text" class="form-control" id="number_id" name="number_id"
                                placeholder="Enter Number" value="{{ old('number_id') }}">
                            @error('number_id')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="rank">Rank</label>
                            <input type="text" class="form-control" id="rank" name="rank" placeholder="Enter Rank"
                                value="{{ old('rank') }}">
                            @error('rank')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="service_type">Service</label>
                            <select class="form-control" id="service_type" name="service_type">
                                <option value="">--Please Select--</option>
                                <option value="army" {{ old('service_type')=='army' ? 'selected' : '' }}>Army</option>
                                <option value="navy" {{ old('service_type')=='navy' ? 'selected' : '' }}>Navy</option>
                                <option value="air_force" {{ old('service_type')=='air_force' ? 'selected' : '' }}>Air
                                    Force
                                </option>
                            </select>
                            @error('service_type')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12" id="regiment_unit">
                            <label for="regiment_unit_input">Regiment/Unit</label>
                            <input type="text" class="form-control" id="regiment_unit_input"
                                placeholder="Enter Regiment/Unit" name="regiment_unit"
                                value="{{ old('regiment_unit') }}">
                            @error('regiment_unit')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- <div class="form-group col-sm-6">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="Enter Address"
                                name="address" value="{{ old('address') }}">
                            @error('address')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div> --}}

                        <div class="form-group col-sm-6">
                            <label for="district_of_associated_welfare_officer">District of Associated Welfare
                                Officer</label>
                            <select class="form-control" id="district_of_associated_welfare_officer"
                                name="district_of_associated_welfare_officer">
                                <option value="">--Please Select--</option>

                                @foreach ($dept as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>

                                @endforeach

                            </select>

                            @error('district_of_associated_welfare_officer')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>



                <div class="dependent_details">
                    <div class="card p-3">
                        <div class="row">

                            <h3>Dependent Details</h3>
                            <div class="form-group col-sm-6">
                                <label for="regd_no">Regd No. Parent/ID</label>
                                <input type="text" class="form-control" id="regd_no" placeholder="Regd No"
                                    name="regd_no" value="{{ old('regd_no') }}">
                                @error('regd_no')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="relationStatus">Relation</label>
                                <select id="relationStatus" name="relation" class="form-control">
                                    <option value="">Select Relation</option>
                                    <option value="spouse">Spouse</option>
                                    <option value="son">Son</option>
                                    <option value="daughter">Daughter</option>
                                </select>
                            </div>


                            <div class="form-group col-sm-6">
                                <label for="date_of_birth">Date of Birth</label>
                                <input type="date" class="form-control" id="date_of_birth"
                                    placeholder="Enter Date of Birth" name="date_of_birth"
                                    value="{{ old('date_of_birth') }}">
                                @error('date_of_birth')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">

                                <label for="employmentStatus">Employment Status</label>
                                <select id="employmentStatus" name="employment_status" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="employed">Employed</option>
                                    <option value="unemployed">Unemployed</option>

                                </select>
                            </div>
                            {{--
                            ===========================================================================================
                            --}}
                            <div class="card p-3" id="organization-details">
                                <div class="row">
                                    <!-- Monthly Income -->
                                    <div class="form-group col-sm-6">
                                        <label for="monthly_income">Monthly Income</label>
                                        <input type="text" class="form-control" id="monthly_income"
                                            placeholder="Enter Monthly Income" name="monthly_income"
                                            value="{{ old('monthly_income') }}">
                                        @error('monthly_income')
                                        <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Organization Name -->
                                    <div class="form-group col-sm-6">
                                        <label for="organization_name">Organization Name</label>
                                        <input type="text" class="form-control" id="organization_name"
                                            placeholder="Enter Organization Name" name="organization_name"
                                            value="{{ old('organization_name') }}">
                                        @error('organization_name')
                                        <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Designation -->
                                    <div class="form-group col-sm-6">
                                        <label for="designation">Designation</label>
                                        <input type="text" class="form-control" id="designation"
                                            placeholder="Enter Designation" name="designation"
                                            value="{{ old('designation') }}">
                                        @error('designation')
                                        <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>




                            {{--
                            ===========================================================================================
                            --}}
                            <div class="form-group col-sm-6">
                                <label for="qualification">Qualification</label>
                                <input type="text" class="form-control" id="qualification"
                                    placeholder="Enter Qualification" name="qualification"
                                    value="{{ old('qualification') }}">
                                @error('qualification')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6">
                                <label for="reference_of_advertisement">Reference of Advertisement</label>
                                <input type="text" class="form-control" id="reference_of_advertisement"
                                    placeholder="Enter Reference of Advertisement" name="reference_of_advertisement"
                                    value="{{ old('reference_of_advertisement') }}">
                                @error('reference_of_advertisement')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="signature_of_applicant">Signature of Applicant</label>
                                <input type="text" class="form-control" id="signature_of_applicant"
                                    placeholder="Enter Signature of Applicant" name="signature_of_applicant"
                                    value="{{ old('signature_of_applicant') }}">
                                @error('signature_of_applicant')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>




                {{-- ==================================================== --}}
                <h3>Upload Documents</h3>
                <div class="card p-3">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="documents">Photographs
                            </label>
                            <input type="file" class="form-control" id="" name="photograph">
                            @error('')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="documents">Discharge Book</label>
                            <input type="file" class="form-control" id="" name="discharge_book">
                            @error('')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="documents">Scanned Copy PPO </label>
                            <input type="file" class="form-control" id="" name="scanned_copy_ppo">
                            @error('')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="documents">Scanned Copy Adhar Card </label>
                            <input type="file" class="form-control" id="" name="scanned_copy_adhar_card">
                            @error('')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- ============================================ --}}
                        <div class="dependent_details row">
                            <div class="form-group col-sm-6">
                                <label for="documents">Tax Payer (TIS)</label>
                                <input type="file" class="form-control" id="" name="tax_payer">
                                @error('')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="documents">ESM Indenty Card</label>
                                <input type="file" class="form-control" id="" name="esm_indenty_card">
                                @error('')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
    
                        </div>
                        {{-- ============================================ --}}
                        <div class="form-group col-sm-6">
                            <label for="documents">Affidavit</label>
                            <input type="file" class="form-control" id="" name="affidavit">
                            @error('affidavit')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>






                    </div>

                </div>
                {{-- ==================================================== --}}



            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>


</div>