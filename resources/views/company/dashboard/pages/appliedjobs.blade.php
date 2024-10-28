@extends('company.layouts.afterlogin')

@section('content')

<?php
use App\Models\ApplyJobs;
use Illuminate\Support\Facades\Auth;

$user = Auth::user();
$apjob = ApplyJobs::where('company_id',$user['id'])->get();

?>
<div class="dashboard-content">
    <div class="dashboard-tlbar d-block mb-4">
        <div class="row">
            <div class="colxl-12 col-lg-12 col-md-12">
                <h1 class="mb-1 fs-3 fw-medium">Beheer aanvragers</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item text-muted"><a href="#">Werkgever</a></li>
                        <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" class="text-primary">Alle aanvragers</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="dashboard-widg-bar d-block">


        <!-- Header Wrap -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="_mp-inner-content elior">
                            <div class="_mp-inner-first">
                                <div class="search-inline">
                                    <input type="text" class="form-control"
                                        placeholder="Functietitel, trefwoorden enz.">
                                    <button type="button" class="btn btn-primary">Zoekopdracht</button>
                                </div>
                            </div>
                            <div class="_mp_inner-last">
                                <div class="item-shorting-box-right">
                                    <div class="shorting-by me-2 small">
                                        <select>
                                            <option value="0">Kort op (standaard)</option>
                                            <option value="1">Kort van (uitgelicht)</option>
                                            <option value="2">Kort door (dringend)</option>
                                            <option value="3">Kort op (postdatum)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <!-- Row -->
                        {{-- <div class="row mb-3">
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="duster-flex-row  align-items-center d-flex justify-content-between">
                                    <div class="duster-flex-first">
                                        <h6 class="mb-0">Sr. Magento Developer</h6>
                                    </div>
                                    <div class="duster-flex-end">
                                        <ul class="nav nav-pills nav-fill gap-2 p-1 small gray-simple rounded"
                                            id="pillNav2" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active rounded" id="alls" data-bs-toggle="tab"
                                                    type="button" role="tab" aria-selected="true">All: 194</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link rounded" id="approveds" data-bs-toggle="tab"
                                                    type="button" role="tab" aria-selected="false">Approved: 66</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link rounded" id="rejecteds" data-bs-toggle="tab"
                                                    type="button" role="tab" aria-selected="false">Rejected:
                                                    128</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <!-- End Row -->

                        <!-- Start All List -->
                        <div class="row justify-content-start gx-3 gy-4">
                            <table class="table table-hover">
                                <tr>
                                    <th>Naam</th>
                                    <th>E-mail</th>
                                    <th>Mobiel</th>
                                    <th>Cv</th>
                                    <th>Short list</th>
                                    <th>Profesional list


                                        <input type="checkbox" id="selectAll">
                                        check all
                                    </th>
                                </tr>
                                @if(count($apjob) > 0)

                                <?php foreach ($apjob as $key => $value) { ?>

                                <tr>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>{{ $value->mobile }}</td>
                                    <td><a href="{{ asset('/').$value->resume }}">Cv</a></td>

                                    <td>
                                        <a
                                            href="{{ route('company.short_list', [$value->id, $value->short_list == 1 ? 0 : 1]) }}">
                                            {{ $value->short_list == 1 ? 'UnShort List' : 'Short List' }}
                                        </a>
                                    </td>
                                    <td>
                                        <input type="checkbox" name="select[]" class="selectSingle"
                                            value="{{ $value->id }}" {{ $value->profesinal_list == 1 ? 'checked' : '' }}


                                        >
                                    </td>


                                </tr>
                                <?php } ?>
                                @else
                                <tr>
                                    <td colspan="4" class="text-center">No data available</td>
                                </tr>
                                @endif

                            </table>
                        </div>
                        <input type="button" id="save_value" value="Profesional List Save" />


                        <!-- End All Job List -->

                    </div>
                </div>
            </div>
        </div>
        <!-- Header Wrap -->

    </div>

    <!-- footer -->
    {{-- <div class="row">
        <div class="col-md-12">
            <div class="py-3 text-center">© 2015 - 2023 Job Stock® Themezhub.</div>
        </div>
    </div> --}}

</div>
<script>
    document.getElementById('selectAll').addEventListener('click', function() {
    let checkboxes = document.querySelectorAll('.selectSingle');
    for (let checkbox of checkboxes) {
        checkbox.checked = this.checked;
    }
});

$(document).ready(function() {

    var i = 0;
    $('#save_value').click(function () {
        var arr = [];

        
        $('.selectSingle:checked').each(function () {
            if($(this).val() != '')
        {
            arr[i++] = $(this).val();

        }
        });      
        // if (arr.length === 0) {
        //     Swal.fire({
        //         text: "Please select at least one candidate",
        //         icon: 'warning',
        //         showCancelButton: true,
              
        //     })       
        //     return;
        // }
        // console.log(arr);

        $.ajax({
            url: "{{ route('company.profesinal_list') }}",
            method: 'POST',
            data: {
                candidates: arr,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                Swal.fire({
                text: "updated successfully",
                icon: 'success',
                showCancelButton: true,
              
            })
            },
            error: function(xhr) {
                Swal.fire({
                text: "something went wrong",
                icon: 'warning',
                showCancelButton: true,
              
            })                // Handle error
            }
        });
    });
});

</script>

@endsection