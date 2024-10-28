@extends('company.layouts.afterlogin')

@section('content')
    <div class="dashboard-content">
        <div class="dashboard-tlbar d-block mb-4">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <h1 class="mb-1 fs-3 fw-medium">XML</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="dashboard-widg-bar d-block">
            <div class="card">
                <div class="card-header">
                    <h4>XML</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('company.job.xml.maping') }}" method="POST">
                        @csrf
                        @foreach ($c as $key => $value)
                            <div class="row mt-3">
                                <!-- Display Name Field -->
                                <div class="col-sm-6">
                                    <label>{{ $value['display_name'] }}</label>
                                    <input type="hidden" name="attributes[{{ $key }}][data_base_filed]" value="{{ $value['name'] }}">
                                </div>
                                <!-- Select Dropdown -->
                                <div class="col-sm-6">
                                    <select name="attributes[{{ $key }}][xml_atribute]" class="form-control">
                                        @foreach ($attributes as $keyy => $r)
                                            <option value="{{ $r }}">{{  $r }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endforeach

                        <div class="mb-3 row">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-primary">Import</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="py-3 text-center">© 2015 - 2023 Job Stock® Themezhub.</div>
            </div>
        </div>

        <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
    </div>
@endsection
