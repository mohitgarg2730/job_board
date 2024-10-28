@extends('layouts.app')

@section('content')
<?php
use App\Models\Skills;
use App\Models\Categeory;
use App\Models\JobType;
use App\Models\Qualification;
use App\Models\JobLevel;
use App\Models\JobExperince;

$job_level = JobLevel::get();
$exp = JobExperince::get();


// echo"<pre>";
// print_r($_GET);
// die;
?>
<!-- End Navigation -->
<div class="clearfix"></div>
<!-- ============================================================== -->
<!-- Top header  -->
<!-- ============================================================== -->


<!-- ============================ Page Title Start================================== -->
<div class="page-title primary-bg-dark" style="background:url(assets/img/bg2.png) no-repeat;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <h2 class="ipt-title">Browse Jobs</h2>
                <div class="breadcrumbs light">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="JavaScript:Void(0);">Home</a></li>
                            <li class="breadcrumb-item"><a href="JavaScript:Void(0);">Browse Jobs</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================ Page Title End ================================== -->

<!-- ============================ All List Wrap ================================== -->
<section>

    <form>
        <div class="container">
            <div class="row">

                <!-- Search Sidebar -->
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="side-widget-blocks">

                        <div
                            class="sidebar_header d-flex align-items-center justify-content-between px-4 py-3 br-bottom">
                            <h4 class="fs-bold fs-lg mb-0">Search filter</h4>
                            <div class="ssh-header">
                                <a href="javascript:void(0);" class="clear_all ft-medium text-muted">Clear All</a>
                                <a href="#search_open" data-bs-toggle="collapse" aria-expanded="false" role="button"
                                    class="collapsed _filter-ico ml-2"><i class="fa-solid fa-filter"></i></a>
                            </div>
                        </div>







                        <!-- Find New Property -->
                        <div class="sidebar-widgets collapse miz_show" id="search_open" data-bs-parent="#search_open">
                            <div class="search-inner">
                                <div class="side-widget-inner">

                                    <div class="form-group">
                                        <label>Search by keyword</label>
                                        <div class="form-group-inner">
                                            <input type="title" name="title" class="form-control"
                                                placeholder="Search by keywords..."
                                                value="{{ request('title')  ? request('title') : '' }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Categories</label>
                                        <div class="form-group-inner">
                                            <select name="cat">
                                                <option value="">--Please Select--</option>

                                                @foreach ($cat as $c)
                                                <option value="{{ $c->id }}" {{ request('cat')==$c->id ? 'selected' : ''
                                                    }}>{{ $c->cat_name }}</option>

                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Job Level</label>
                                        <div class="form-group-inner">
                                            <select name="job_level">
                                                <option value="">--Please Select--</option>

                                                @foreach ($job_level as $c)
                                                <option value="{{ $c->id }}" {{ request('job_level')==$c->id ?
                                                    'selected' : ''
                                                    }}>{{ $c->name }}</option>

                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Experince</label>
                                        <div class="form-group-inner">
                                            <select name="exp">
                                                <option value="">--Please Select--</option>

                                                @foreach ($exp as $c)
                                                <option value="{{ $c->id }}" {{ request('exp')==$c->id ? 'selected' : ''
                                                    }}>{{ $c->name }}</option>

                                                @endforeach


                                            </select>
                                        </div>
                                    </div>


                                    {{-- <div class="form-group">
                                        <label>Straal in mijlen</label>
                                        <div class="form-group-inner">
                                            <div class="rg-slider">
                                                <input type="text" class="js-range-slider" name="" value="">
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="form-group">
                                        <label>Skills</label>
                                        <div class="form-group-inner">
                                            <div class="inner_widget_link">
                                                <ul class="no-ul-list filter-list">
                                                    <?php $sss = Skills::get();
                                                      foreach ($sss as $key => $value) { ?>
                                                    <li>
                                                        <input id="d{{ $value->id }}" class="form-check-input"
                                                            name="skills[]" type="checkbox" value="{{ $value->id }}"
                                                            <?php if( !empty(request('skills')) && in_array($value->id,
                                                        request('skills'))) { echo"checked";} ?>>
                                                        <label for="d{{ $value->id }}" class="form-check-label">{{
                                                            $value->name }}</label>
                                                    </li>
                                                    <?php  }
                                                    ?>



                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Qualification</label>
                                        <div class="form-group-inner">
                                            <div class="inner_widget_link">
                                                <ul class="no-ul-list filter-list">
                                                    <?php $sss = Qualification::get();
                                                      foreach ($sss as $key => $value) { ?>
                                                    <li>
                                                        <input id="d{{ $value->id }}" class="form-check-input"
                                                            name="qual[]" type="checkbox" value="{{ $value->id }}" <?php
                                                            if( !empty(request('qual')) && in_array($value->id,
                                                        request('qual'))) { echo"checked";} ?> >
                                                        <label for="d{{ $value->id }}" class="form-check-label">{{
                                                            $value->name }}</label>
                                                    </li>
                                                    <?php  }
                                                    ?>



                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="form-group">
                                        <label>Soort baan</label>
                                        <div class="form-group-inner">
                                            <div class="inner_widget_link">
                                                <ul class="no-ul-list filter-list">
                                                    <li>
                                                        <input id="e2" class="form-check-input" name="" type="radio">
                                                        <label for="e2" class="form-check-label">Full time</label>
                                                    </li>
                                                    <li>
                                                        <input id="e3" class="form-check-input" name="" type="radio">
                                                        <label for="e3" class="form-check-label">Deeltijd</label>
                                                    </li>
                                                    <li>
                                                        <input id="e4" class="form-check-input" name="" type="radio"
                                                            checked="">
                                                        <label for="e4" class="form-check-label">Contractbasis</label>
                                                    </li>
                                                    <li>
                                                        <input id="e5" class="form-check-input" name="" type="radio">
                                                        <label for="e5" class="form-check-label">Stage</label>
                                                    </li>
                                                    <li>
                                                        <input id="e6" class="form-check-input" name="" type="radio">
                                                        <label for="e6" class="form-check-label">Normaal</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Werkniveau</label>
                                        <div class="form-group-inner">
                                            <div class="inner_widget_link">
                                                <ul class="no-ul-list filter-list">
                                                    <li>
                                                        <input id="f1" class="form-check-input" name="" type="checkbox"
                                                            checked="">
                                                        <label for="f1" class="form-check-label">Teamleider</label>
                                                    </li>
                                                    <li>
                                                        <input id="f2" class="form-check-input" name="" type="checkbox">
                                                        <label for="f2" class="form-check-label">Manager</label>
                                                    </li>
                                                    <li>
                                                        <input id="f3" class="form-check-input" name="" type="checkbox">
                                                        <label for="f3" class="form-check-label">Junior</label>
                                                    </li>
                                                    <li>
                                                        <input id="f4" class="form-check-input" name="" type="checkbox">
                                                        <label for="f4" class="form-check-label">Senior</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Datum geplaatst</label>
                                        <div class="form-group-inner">
                                            <div class="inner_widget_link">
                                                <ul class="no-ul-list filter-list">
                                                    <li>
                                                        <input id="l1" class="form-check-input" name="" type="checkbox"
                                                            checked="">
                                                        <label for="l1" class="form-check-label">Laatste uur</label>
                                                    </li>
                                                    <li>
                                                        <input id="l2" class="form-check-input" name="" type="checkbox">
                                                        <label for="l2" class="form-check-label">Afgelopen 24
                                                            uur</label>
                                                    </li>
                                                    <li>
                                                        <input id="l3" class="form-check-input" name="" type="checkbox">
                                                        <label for="l3" class="form-check-label">Vorige week</label>
                                                    </li>
                                                    <li>
                                                        <input id="l4" class="form-check-input" name="" type="checkbox">
                                                        <label for="l4" class="form-check-label">Laatste 30
                                                            dagen</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="form-group mb-1">
                                        <input type="submit" class="btn btn-lg btn-primary fs-6 fw-medium full-width"
                                            value="Search job">
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <!-- Sidebar End -->

                <!-- Job List Wrap -->
                <div class="col-lg-8 col-md-12 col-sm-12">

                    <!-- Shorting Box -->
                    <div class="row justify-content-center mb-4">
                        <div class="col-lg-12 col-md-12">
                            <div class="item-shorting-box">
                                <div class="item-shorting clearfix">
                                    <div class="left-column">
                                        <h4 class="m-0">Showing 1 - {{ request('total_number') ? request('total_number') : 10 }} of {{ $total_jobs }} Results</h4>
                                    </div>
                                </div>
                                <div class="item-shorting-box-right">
                                    {{-- <div class="shorting-by me-2 small">
                                        <select>
                                            <option value="0">Sorteer op (Standaard)</option>
                                            <option value="1">Sorteer op (Uitgelicht)</option>
                                            <option value="2">Sorteer op (Urgent)</option>
                                            <option value="3">Sorteer op (Plaatsingsdatum)</option>
                                        </select>
                                    </div> --}}
                                    <div class="shorting-by small">
                                        <select name="total_number">
                                            <option value="10" {{ request('total_number')=='10' ? 'selected' : '' }}>10
                                                Per Page</option>
                                            <option value="20" {{ request('total_number')=='20' ? 'selected' : '' }}>20
                                                Per Page</option>
                                            <option value="50">{{ request('total_number')=='50' ? 'selected' : ''}} 50
                                                Per Page</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Shorting Wrap End -->

                    <!-- Start All List -->
                    <div class="row justify-content-start gx-3 gy-4">

                        <?php if (count($jobs) > 0): ?>
                      


                        @includeIf('partials.jobs.browsejobswidgets',['jj'=>$jobs])

                        <?php else: ?>
                        <!-- No Data Found -->
                        <div class="col-12 text-center">
                            <p>No data found</p>
                        </div>
                        <?php endif; ?>

                    </div>

                    <!-- Job List Wrap End-->

                </div>
            </div>
    </form>

</section>
<!-- ============================ All List Wrap ================================== -->

<!-- ============================ Call To Action ================================== -->
<section class="bg-cover primary-bg-dark" style="background:url(assets/img/footer-bg-dark.png)no-repeat;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-10 col-md-12 col-sm-12">

                <div class="call-action-wrap">
                    <div class="sec-heading center">
                        <h2 class="lh-base mb-3 text-light">Vind de Perfecte Baant<br>op Job Stock Die Geweldig Voor Je
                            Is</h2>
                        <p class="fs-6 text-light">Bijvoorbeeld, wij bieden een uitstekende ervaring en juiste
                            behandeling voor iedereen die onze diensten gebruikt, met een focus op integriteit en
                            klanttevredenheid.</p>
                    </div>
                    <div class="call-action-buttons mt-3">
                        <a href="JavaScript:Void(0);" class="btn btn-lg btn-dark fw-medium px-xl-5 px-lg-4 me-2">Upload
                            cv</a>
                        <a href="JavaScript:Void(0);"
                            class="btn btn-lg btn-whites fw-medium px-xl-5 px-lg-4 text-primary">Word Deel Van Ons
                            Team</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- ============================ Call To Action End ================================== -->
@endsection
