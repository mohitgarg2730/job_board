@extends('frontend.layout.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ config('app.name') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    {{-- <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol> --}}
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center" style="min-height: 50vh;">

                <div class="col-4">
                    <div class="card card-primary card-outline card-tabs m-2">
                        <div class="card-body">
                            <a href="{{ route('esm') }}"><h4 class="text-center">Apply for Ex Serviceman</h4></a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card card-primary card-outline card-tabs m-2">
                        <div class="card-body">
                            <a href="#"> <h4 class="text-center">Apply for Eligible Sports Person</h4></a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card card-primary card-outline card-tabs m-2">
                        <div class="card-body">
                           <a href="{{ route('working.exp') }}"> <h4 class="text-center">Apply for Work Experience</h4></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- /.content -->
</div>

@endsection