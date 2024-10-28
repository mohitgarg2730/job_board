    <div class="card-body">
        <div class="form-group">
            <label for="certificate_type">Certificate Type</label>
            <select class="form-control" id="certificate_type" name="certificate_type" disabled>
                <option value="">--Please Select--</option>
                <option value="ex_service_man" {{ old('certificate_type', isset($esm) ? $esm->certificate_type : '') == 'ex_service_man' ? 'selected' : '' }}>
                    Ex Service Man Certificate
                </option>
                <option value="eligibility_certificate" {{ old('certificate_type', isset($esm) ? $esm->certificate_type : '') == 'eligibility_certificate' ? 'selected' : '' }}>
                    Eligibility Certificate Dependents of ESM
                </option>
                <option value="neet_medical" {{ old('certificate_type', isset($esm) ? $esm->certificate_type
                    : '') == 'neet_medical' ? 'selected' : '' }}>
                    NEET/Medical
                </option>
            </select>
            @error('certificate_type')
            <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div id="forms">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"
                    value="{{ old('name', isset($esm) ? $esm->name : '') }}" disabled>
                @error('name')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="number_id">Number/ID</label>
                <input type="text" class="form-control" id="number_id" name="number_id"
                    placeholder="Enter Number"
                    value="{{ old('number_id', isset($esm) ? $esm->number_id : '') }}" disabled>
                @error('number_id')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="rank">Rank</label>
                <input type="text" class="form-control" id="rank" name="rank" placeholder="Enter Rank"
                    value="{{ old('rank', isset($esm) ? $esm->rank : '') }}" disabled>
                @error('rank')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="service_type">Service</label>
                <select class="form-control" id="service_type" name="service_type" disabled>
                    <option value="">--Please Select--</option>
                    <option value="army" {{ old('service_type', isset($esm) ? $esm->service_type : '') ==
                        'army' ? 'selected' : '' }}>Army</option>
                    <option value="navy" {{ old('service_type', isset($esm) ? $esm->service_type : '') ==
                        'navy' ? 'selected' : '' }}>Navy</option>
                    <option value="air_force" {{ old('service_type', isset($esm) ? $esm->service_type : '')
                        == 'air_force' ? 'selected' : '' }}>Air Force</option>
                </select>
                @error('service_type')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group" id="regiment_unit">
                <label for="regiment_unit_input">Regiment/Unit</label>
                <input type="text" class="form-control" id="regiment_unit_input"
                    placeholder="Enter Regiment/Unit" name="regiment_unit"
                    value="{{ old('regiment_unit', isset($esm) ? $esm->regiment_unit : '') }}" disabled>
                @error('regiment_unit')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" placeholder="Enter Address"
                    name="address" value="{{ old('address', isset($esm) ? $esm->address : '') }}" disabled>
                @error('address')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="district_of_associated_welfare_officer">District of Associated Welfare
                    Officer</label>
                <?php //  $esmistrict = District::find($esm->district_of_associated_welfare_officer);?>
                <input type="" class="form-control" value="{{ $esm->district->name }}" disabled>
                @error('district_of_associated_welfare_officer')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div id="dependent_details">
                <h3>Dependent Details</h3>
                <div class="form-group">
                    <label for="regd_no">Regd No. Parent/ID</label>
                    <input type="text" class="form-control" id="regd_no" placeholder="Enter Regd No"
                        name="regd_no" value="{{ old('regd_no', isset($esm) ? $esm->regd_no : '') }}"
                        disabled>
                    @error('regd_no')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="date_of_birth">Date of Birth</label>
                    <input type="date" class="form-control" id="date_of_birth"
                        placeholder="Enter Date of Birth" name="date_of_birth"
                        value="{{ old('date_of_birth', isset($esm) ? $esm->date_of_birth : '') }}" disabled>
                    @error('date_of_birth')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="qualification">Qualification</label>
                    <input type="text" class="form-control" id="qualification"
                        placeholder="Enter Qualification" name="qualification"
                        value="{{ old('qualification', isset($esm) ? $esm->qualification : '') }}" disabled>
                    @error('qualification')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="reference_of_advertisement">Reference of Advertisement</label>
                    <input type="text" class="form-control" id="reference_of_advertisement"
                        placeholder="Enter Reference of Advertisement" name="reference_of_advertisement"
                        value="{{ old('reference_of_advertisement', isset($esm) ? $esm->reference_of_advertisement : '') }}"
                        disabled>
                    @error('reference_of_advertisement')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="signature_of_applicant">Signature of Applicant</label>
                    <input type="text" class="form-control" id="signature_of_applicant"
                        placeholder="Enter Signature of Applicant" name="signature_of_applicant"
                        value="{{ old('signature_of_applicant', isset($esm) ? $esm->signature_of_applicant : '') }}"
                        disabled>
                    @error('signature_of_applicant')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <h3>View Uploaded Documents </h3>
            <div class="form-group">
                {{-- <label for="documents">Documents</label> --}}
                <a class="btn-primary btn" href="{{ route('documents.download', ['id' => $esm->id,'type'=>'service_book']) }}">
                    Scanned copy of Service Book
                </a>
            </div>
            <div class="form-group">
                {{-- <label for="documents_1">Document 1</label> --}}
                <a class="btn-primary btn"  href="{{ route('documents.download', ['id' => $esm->id,'type'=>'passbook_six_month']) }}">
                    Passbook Six Month 
                </a>
            </div>
            <div class="form-group">
                {{-- <label for="documents_2">Document 2</label> --}}
                <a class="btn-primary btn"  href="{{ route('documents.download', ['id' => $esm->id,'type'=>'ais']) }}">
                   AIS
                </a>
            </div>
            <div class="form-group">
                {{-- <label for="documents_3">Document 3</label> --}}
                <a class="btn-primary btn"  href="{{ route('documents.download', ['id' => $esm->id,'type'=>'affidavit']) }}">
                    Affidavit
                </a>
            </div>
        </div>
    </div>
