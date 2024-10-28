@extends('company.layouts.afterlogin')

@section('content')

<?php
use App\Models\ApplyJobs;
use Illuminate\Support\Facades\Auth;

$user = Auth::user();
$apjob = ApplyJobs::where('company_id',$user['id'])->where('profesinal_list',1)->get();

?>
<div class="dashboard-content">
    <div class="dashboard-tlbar d-block mb-4">
        <div class="row">
            <div class="colxl-12 col-lg-12 col-md-12">
                <h1 class="mb-1 fs-3 fw-medium">Kandidaten op de shortlist
                </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item text-muted"><a href="#">Werkgever</a></li>
                        <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" class="text-primary">Sortlist Candidate
                        </a></li>
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
                                    <input type="text" class="form-control" placeholder="Functietitel, trefwoorden enz.">
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


                        <!-- End Row -->

                        <!-- Start All List -->
                        <div class="row justify-content-start gx-3 gy-4">
                            <table class="table table-hover">
                                <tr>
                                    <th>Naam</th>
                                    <th>E-mail</th>
                                    <th>Mobiel</th>
                                    <th>Cv</th>
                                </tr>
                                @if(count($apjob) > 0)
                                    @foreach ($apjob as $key => $value)
                                        <tr>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->mobile }}</td>
                                            <td><a href="{{ asset('/') . $value->resume }}">Cv</a></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center">No data available</td>
                                    </tr>
                                @endif
                            </table>
                        </div>

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


@endsection
