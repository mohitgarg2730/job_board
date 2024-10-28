@extends('company.layouts.afterlogin')

@section('content')
<?php
use App\Models\ApplyJobs;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;

$user = Auth::user();
$apjobcount = ApplyJobs::where('company_id',$user['id'])->count();
$shortListcount = ApplyJobs::where('company_id',$user['id'])->where('short_list',1)->count();
$jobcount = Job::where('user_id',$user['id'])->count();
$apjob = ApplyJobs::where('company_id',$user['id'])->take(5)->orderBy('id','desc')->get();

?>

<div class="dashboard-content">
    <div class="dashboard-tlbar d-block mb-4">
        <div class="row">
            <div class="colxl-12 col-lg-12 col-md-12">
                <h1 class="mb-1 fs-3 fw-medium">Werkgeversdashboard</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item text-muted"><a href="#" contenteditable="false"
                                style="cursor: pointer;">Werkgever</a></li>
                        <li class="breadcrumb-item text-muted"><a href="#" contenteditable="false"
                                style="cursor: pointer;">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" class="text-primary" contenteditable="false"
                                style="cursor: pointer;">Werkgeversdashboard</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="dashboard-widg-bar d-block">

        <div class="dashboard-widg-bar d-block">

            <!-- Row Start -->
            <div class="row align-items-center gx-4 gy-4 mb-4">
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                    <div class="dash-wrap-bloud">
                        <div class="dash-wrap-bloud-icon">
                            <div class="bloud-icon text-success bg-light-success">
                                <i class="fa-solid fa-business-time"></i>
                            </div>
                        </div>
                        <div class="dash-wrap-bloud-caption">
                            <div class="dash-wrap-bloud-content">
                                <h5 class="ctr">{{ $jobcount }}</h5>
                                <p>Total Jobs Posted</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                    <div class="dash-wrap-bloud">
                        <div class="dash-wrap-bloud-icon">
                            <div class="bloud-icon text-warning bg-light-warning">
                                <i class="fa-solid fa-bookmark"></i>
                            </div>
                        </div>
                        <div class="dash-wrap-bloud-caption">
                            <div class="dash-wrap-bloud-content">
                                <h5 class="ctr">{{ $apjobcount }}</h5>
                                <p>Applyed by candidate</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                    <div class="dash-wrap-bloud">
                        <div class="dash-wrap-bloud-icon">
                            <div class="bloud-icon text-danger bg-light-danger">
                                <i class="fa-solid fa-user-clock"></i>
                            </div>
                        </div>
                        <div class="dash-wrap-bloud-caption">
                            <div class="dash-wrap-bloud-content">
                                <h5 class="ctr">{{ $shortListcount }}</h5>
                                <p>Short listed</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="dash-wrap-bloud">
                        <div class="dash-wrap-bloud-icon">
                            <div class="bloud-icon text-info bg-light-info">
                                <i class="fa-sharp fa-solid fa-comments"></i>
                            </div>
                        </div>
                        <div class="dash-wrap-bloud-caption">
                            <div class="dash-wrap-bloud-content">
                                <h5 class="ctr">215</h5>
                                <p>Lorem Loren </p>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <!-- Row End -->

            {{--
            <!-- Row Start -->
            <div class="row gx-4 gy-4 mb-4">
                <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12">
                    <div class="card d-none d-lg-block">
                        <div class="card-header">
                            <h4 class="mb-0">Extra gebiedsgrafiek</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-inline text-center m-t-40">
                                <li>
                                    <h5><i class="fa fa-circle me-1 text-warning"></i>Actieve banen</h5>
                                </li>
                                <li>
                                    <h5><i class="fa fa-circle me-1 text-danger"></i>Verlopen banen</h5>
                                </li>
                                <li>
                                    <h5><i class="fa fa-circle me-1 text-success"></i>Toegepaste aanvragers</h5>
                                </li>
                            </ul>
                            <div class="chart" id="line-chart"
                                style="height: 300px; position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                <svg height="300" version="1.1" width="1008.66" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    style="overflow: hidden; position: relative; top: -0.96875px;">
                                    <desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Gemaakt met Raphaël
                                        2.2.0</desc>
                                    <defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text
                                        x="32.84765625" y="261" text-anchor="end" font-family="sans-serif"
                                        font-size="12px" stroke="none" fill="#888888"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                        font-weight="normal">
                                        <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan>
                                    </text>
                                    <path fill="none" stroke="#e0e0e0" d="M45.34765625,261H983.66" stroke-width="0.5"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text
                                        x="32.84765625" y="202" text-anchor="end" font-family="sans-serif"
                                        font-size="12px" stroke="none" fill="#888888"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                        font-weight="normal">
                                        <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">75</tspan>
                                    </text>
                                    <path fill="none" stroke="#e0e0e0" d="M45.34765625,202H983.66" stroke-width="0.5"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text
                                        x="32.84765625" y="143" text-anchor="end" font-family="sans-serif"
                                        font-size="12px" stroke="none" fill="#888888"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                        font-weight="normal">
                                        <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">150</tspan>
                                    </text>
                                    <path fill="none" stroke="#e0e0e0" d="M45.34765625,143H983.66" stroke-width="0.5"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text
                                        x="32.84765625" y="84" text-anchor="end" font-family="sans-serif"
                                        font-size="12px" stroke="none" fill="#888888"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                        font-weight="normal">
                                        <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">225</tspan>
                                    </text>
                                    <path fill="none" stroke="#e0e0e0" d="M45.34765625,84H983.66" stroke-width="0.5"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text
                                        x="32.84765625" y="25" text-anchor="end" font-family="sans-serif"
                                        font-size="12px" stroke="none" fill="#888888"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                        font-weight="normal">
                                        <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">300</tspan>
                                    </text>
                                    <path fill="none" stroke="#e0e0e0" d="M45.34765625,25H983.66" stroke-width="0.5"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="983.66"
                                        y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px"
                                        stroke="none" fill="#888888"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                        font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                                        <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2016
                                        </tspan>
                                    </text><text x="827.345985637266" y="273.5" text-anchor="middle"
                                        font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                        font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                                        <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2015
                                        </tspan>
                                    </text><text x="671.0319712745321" y="273.5" text-anchor="middle"
                                        font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                        font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                                        <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2014
                                        </tspan>
                                    </text><text x="514.7179569117982" y="273.5" text-anchor="middle"
                                        font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                        font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                                        <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2013
                                        </tspan>
                                    </text><text x="357.9756849754678" y="273.5" text-anchor="middle"
                                        font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                        font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                                        <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012
                                        </tspan>
                                    </text><text x="201.6616706127339" y="273.5" text-anchor="middle"
                                        font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                        font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                                        <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2011
                                        </tspan>
                                    </text><text x="45.34765625" y="273.5" text-anchor="middle" font-family="sans-serif"
                                        font-size="12px" stroke="none" fill="#888888"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                        font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                                        <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2010
                                        </tspan>
                                    </text>
                                    <path fill="#2adc0c" stroke="none"
                                        d="M45.34765625,221.66666666666669C84.42615984068348,205.93333333333334,162.58316702205042,161.68333333333334,201.6616706127339,158.73333333333335C240.74017420341738,155.78333333333336,318.89718138478435,192.17473780209758,357.9756849754678,198.06666666666666C397.1612529595504,203.97473780209756,475.5323889277156,215.78011855905152,514.7179569117982,205.93333333333334C553.7964605024816,196.11345189238486,631.9534676838487,122.84166666666667,671.0319712745321,119.4C710.1104748652156,115.95833333333334,788.2674820465826,185.28333333333333,827.345985637266,178.4C866.4244892279495,171.51666666666668,944.5814964093165,92.85000000000001,983.66,64.33333333333334L983.66,261L45.34765625,261Z"
                                        fill-opacity="0"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 0;"></path>
                                    <path fill="none" stroke="#1cc100"
                                        d="M45.34765625,221.66666666666669C84.42615984068348,205.93333333333334,162.58316702205042,161.68333333333334,201.6616706127339,158.73333333333335C240.74017420341738,155.78333333333336,318.89718138478435,192.17473780209758,357.9756849754678,198.06666666666666C397.1612529595504,203.97473780209756,475.5323889277156,215.78011855905152,514.7179569117982,205.93333333333334C553.7964605024816,196.11345189238486,631.9534676838487,122.84166666666667,671.0319712745321,119.4C710.1104748652156,115.95833333333334,788.2674820465826,185.28333333333333,827.345985637266,178.4C866.4244892279495,171.51666666666668,944.5814964093165,92.85000000000001,983.66,64.33333333333334"
                                        stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                    <circle cx="45.34765625" cy="221.66666666666669" r="3" fill="#1cc100"
                                        stroke="#1cc100" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="201.6616706127339" cy="158.73333333333335" r="3" fill="#1cc100"
                                        stroke="#1cc100" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="357.9756849754678" cy="198.06666666666666" r="3" fill="#1cc100"
                                        stroke="#1cc100" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="514.7179569117982" cy="205.93333333333334" r="3" fill="#1cc100"
                                        stroke="#1cc100" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="671.0319712745321" cy="119.4" r="3" fill="#1cc100" stroke="#1cc100"
                                        stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                    </circle>
                                    <circle cx="827.345985637266" cy="178.4" r="3" fill="#1cc100" stroke="#1cc100"
                                        stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                    </circle>
                                    <circle cx="983.66" cy="64.33333333333334" r="3" fill="#1cc100" stroke="#1cc100"
                                        stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                    </circle>
                                    <path fill="#f4c843" stroke="none"
                                        d="M45.34765625,198.06666666666666C84.42615984068348,194.13333333333333,162.58316702205042,180.36666666666667,201.6616706127339,182.33333333333334C240.74017420341738,184.3,318.89718138478435,223.6198814409485,357.9756849754678,213.8C397.1612529595504,203.95321477428183,475.5323889277156,112.52877336981305,514.7179569117982,103.66666666666669C553.7964605024816,94.82877336981306,631.9534676838487,133.16666666666666,671.0319712745321,143C710.1104748652156,152.83333333333334,788.2674820465826,182.33333333333334,827.345985637266,182.33333333333334C866.4244892279495,182.33333333333334,944.5814964093165,152.83333333333334,983.66,143L983.66,261L45.34765625,261Z"
                                        fill-opacity="0"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 0;"></path>
                                    <path fill="none" stroke="#fdc006"
                                        d="M45.34765625,198.06666666666666C84.42615984068348,194.13333333333333,162.58316702205042,180.36666666666667,201.6616706127339,182.33333333333334C240.74017420341738,184.3,318.89718138478435,223.6198814409485,357.9756849754678,213.8C397.1612529595504,203.95321477428183,475.5323889277156,112.52877336981305,514.7179569117982,103.66666666666669C553.7964605024816,94.82877336981306,631.9534676838487,133.16666666666666,671.0319712745321,143C710.1104748652156,152.83333333333334,788.2674820465826,182.33333333333334,827.345985637266,182.33333333333334C866.4244892279495,182.33333333333334,944.5814964093165,152.83333333333334,983.66,143"
                                        stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                    <circle cx="45.34765625" cy="198.06666666666666" r="3" fill="#fdc006"
                                        stroke="#fdc006" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="201.6616706127339" cy="182.33333333333334" r="3" fill="#fdc006"
                                        stroke="#fdc006" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="357.9756849754678" cy="213.8" r="3" fill="#fdc006" stroke="#fdc006"
                                        stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                    </circle>
                                    <circle cx="514.7179569117982" cy="103.66666666666669" r="3" fill="#fdc006"
                                        stroke="#fdc006" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="671.0319712745321" cy="143" r="3" fill="#fdc006" stroke="#fdc006"
                                        stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                    </circle>
                                    <circle cx="827.345985637266" cy="182.33333333333334" r="3" fill="#fdc006"
                                        stroke="#fdc006" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="983.66" cy="143" r="3" fill="#fdc006" stroke="#fdc006" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <path fill="#31ccd5" stroke="none"
                                        d="M45.34765625,245.26666666666668C84.42615984068348,233.46666666666667,162.58316702205042,202.98333333333332,201.6616706127339,198.06666666666666C240.74017420341738,193.15,318.89718138478435,211.82526219790242,357.9756849754678,205.93333333333334C397.1612529595504,200.02526219790244,475.5323889277156,157.75941632466942,514.7179569117982,150.86666666666667C553.7964605024816,143.99274965800274,631.9534676838487,144.96666666666667,671.0319712745321,150.86666666666667C710.1104748652156,156.76666666666668,788.2674820465826,203.96666666666667,827.345985637266,198.06666666666666C866.4244892279495,192.16666666666666,944.5814964093165,127.26666666666668,983.66,103.66666666666669L983.66,261L45.34765625,261Z"
                                        fill-opacity="0"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 0;"></path>
                                    <path fill="none" stroke="#1db4bd"
                                        d="M45.34765625,245.26666666666668C84.42615984068348,233.46666666666667,162.58316702205042,202.98333333333332,201.6616706127339,198.06666666666666C240.74017420341738,193.15,318.89718138478435,211.82526219790242,357.9756849754678,205.93333333333334C397.1612529595504,200.02526219790244,475.5323889277156,157.75941632466942,514.7179569117982,150.86666666666667C553.7964605024816,143.99274965800274,631.9534676838487,144.96666666666667,671.0319712745321,150.86666666666667C710.1104748652156,156.76666666666668,788.2674820465826,203.96666666666667,827.345985637266,198.06666666666666C866.4244892279495,192.16666666666666,944.5814964093165,127.26666666666668,983.66,103.66666666666669"
                                        stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                    <circle cx="45.34765625" cy="245.26666666666668" r="3" fill="#1db4bd"
                                        stroke="#1db4bd" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="201.6616706127339" cy="198.06666666666666" r="3" fill="#1db4bd"
                                        stroke="#1db4bd" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="357.9756849754678" cy="205.93333333333334" r="3" fill="#1db4bd"
                                        stroke="#1db4bd" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="514.7179569117982" cy="150.86666666666667" r="3" fill="#1db4bd"
                                        stroke="#1db4bd" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="671.0319712745321" cy="150.86666666666667" r="3" fill="#1db4bd"
                                        stroke="#1db4bd" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="827.345985637266" cy="198.06666666666666" r="3" fill="#1db4bd"
                                        stroke="#1db4bd" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="983.66" cy="103.66666666666669" r="3" fill="#1db4bd" stroke="#1db4bd"
                                        stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                    </circle>
                                </svg>
                                <div class="morris-hover morris-default-style" style="display: none;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Meldingen</h4>
                        </div>
                        <div class="ground-list ground-list-hove">
                            <div class="ground ground-single-list">
                                <a href="JavaScript:Void(0);" contenteditable="false" style="cursor: pointer;">
                                    <div class="btn-circle-40 text-warning bg-light-warning"><i class="fas fa-home"></i>
                                    </div>
                                </a>

                                <div class="ground-content">
                                    <h6><a href="JavaScript:Void(0);" contenteditable="false"
                                            style="cursor: pointer;"><strong>Kr. Shaury Preet</strong> Heeft uw bericht
                                            beantwoord</a></h6>
                                    <span class="small">Net nu</span>
                                </div>
                            </div>

                            <div class="ground ground-single-list">
                                <a href="JavaScript:Void(0);" contenteditable="false" style="cursor: pointer;">
                                    <div class="btn-circle-40 text-danger bg-light-danger"><i
                                            class="fa-solid fa-comments"></i></div>
                                </a>

                                <div class="ground-content">
                                    <h6><a href="JavaScript:Void(0);" contenteditable="false"
                                            style="cursor: pointer;">Mortin Denver heeft uw cv geaccepteerd op
                                            <strong>Job Stock</strong></a></h6>
                                    <span class="small">20 minuten geleden</span>
                                </div>
                            </div>

                            <div class="ground ground-single-list">
                                <a href="JavaScript:Void(0);" contenteditable="false" style="cursor: pointer;">
                                    <div class="btn-circle-40 text-info bg-light-info"><i class="fa-solid fa-heart"></i>
                                    </div>
                                </a>

                                <div class="ground-content">
                                    <h6><a href="JavaScript:Void(0);" contenteditable="false"
                                            style="cursor: pointer;">Uw baan #456256 is gisteren verlopen <strong>Bekijk
                                                meer</strong></a></h6>
                                    <span class="small">1 dag geleden</span>
                                </div>
                            </div>

                            <div class="ground ground-single-list">
                                <a href="JavaScript:Void(0);" contenteditable="false" style="cursor: pointer;">
                                    <div class="btn-circle-40 text-danger bg-light-danger"><i
                                            class="fa-solid fa-thumbs-up"></i></div>
                                </a>

                                <div class="ground-content">
                                    <h6><a href="JavaScript:Void(0);" contenteditable="false"
                                            style="cursor: pointer;"><strong>Daniel Kurwa</strong> heeft je CV
                                            goedgekeurd!.</a></h6>
                                    <span class="small">10 dagen geleden</span>
                                </div>
                            </div>

                            <div class="ground ground-single-list">
                                <a href="JavaScript:Void(0);" contenteditable="false" style="cursor: pointer;">
                                    <div class="btn-circle-40 text-success bg-light-success"><i
                                            class="fa-solid fa-comment-dots"></i></div>
                                </a>

                                <div class="ground-content">
                                    <h6><a href="JavaScript:Void(0);" contenteditable="false"
                                            style="cursor: pointer;">Khushi Verma heeft een recensie achtergelaten op
                                            <strong>Uw bericht</strong></a></h6>
                                    <span class="small">Net nu</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- Row End -->

            <!-- Header Wrap -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0">Latest Apply</h6>
                        </div>
                        <div class="card-body">

                            <!-- Start All List -->
                            <div class="row justify-content-start gx-3 gy-4">

                                <table class="table table-hover">
                                    <tr>
                                        <th>Naam</th>
                                        <th>E-mail</th>
                                        <th>Mobiel</th>
                                        <th>Cv</th>
                                        <th>Short list</th>
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


                                    </tr>
                                    <?php } ?>
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

    </div>

    <!-- footer -->
    <div class="row">
        <div class="col-md-12">
            <div class="py-3 text-center">© 2015 - 2023 Job Stock® Themezhub.</div>
        </div>
    </div>

</div>


@endsection
