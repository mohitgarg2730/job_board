@extends('layouts.app')
@section('content')

<?php
    use App\Models\Skills;
    use Illuminate\Support\Facades\Auth;
    use App\Models\ApplyJobs;
    use App\Models\Categeory;
    use App\Models\User;
    
    $skill = [];
    if(!empty($job->skills)) {
        $skillIds = explode(',', $job->skills);
        $skill = Skills::whereIn('id', $skillIds)->get();
    }

    $user_id = -1;
    if(Auth::check()) {
        $user = Auth::user();
        $userr = User::where('role', 'employee')->where('id', $user['id'])->first();
        if(!empty($userr)) {
            $user_id = $userr->id;
        }
    }

    $ap = ApplyJobs::where('job_id', $job->id)->where('applied_by', $user_id)->first();
?>

<section class="bg-cover bg-dark position-relative py-4">
    <div class="position-absolute end-0 top-0 bottom-0 d-lg-block d-none">
        @isset($job->company_logo)
        <img src="{{ asset($job->company_logo) }}" class="img-fluid rounded-start-pill h-100" alt="">
        @endisset
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-9 col-md-12">
                <div class="bread-wraps breadcrumbs light">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" contenteditable="false"
                                    style="cursor: pointer;">Thuis</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $job->job_title }}</li>
                        </ol>
                    </nav>
                </div>

                <div class="jbs-head-bodys-top my-5">
                    <div class="jbs-roots-y1 flex-column justify-content-start align-items-start">
                        <div class="jbs-roots-y1-last">
                            <div class="jbs-urt mb-2">
                                @isset($job->types['name'])
                                <span class="label text-light primary-2-bg">{{ $job->types['name'] }}</span>
                                @endisset
                            </div>
                            <div class="jbs-title-iop mb-1">
                                <h2 class="m-0 fs-2 text-light">{{ $job->job_title }}</h2>
                            </div>
                            <div class="jbs-locat-oiu text-sm-muted text-light d-flex align-items-center">
                                <span><i class="fa-solid fa-location-dot opacity-75 me-1"></i>
                                    @if (!empty($job->country_id) && $job->country_id == 1)
                                    india
                                    @endif
                                </span>
                                <div class="jbs-kioyer-groups ms-3">
                                    <span class="fa-solid fa-star active"></span>
                                    <span class="fa-solid fa-star active"></span>
                                    <span class="fa-solid fa-star active"></span>
                                    <span class="fa-solid fa-star active"></span>
                                    <span class="fa-solid fa-star"></span>
                                    <span class="aal-reveis text-light opacity-75">4.6</span>
                                </div>
                            </div>
                        </div>
                        <div class="jbs-roots-y6 py-3">
                            <p class="text-light">
                                @isset($job->job_description)
                                <?php echo $job->job_description ?>
                                @endisset
                            </p>
                        </div>
                        <?php if(Auth::check()) { ?>
                        <div class="jbs-roots-y6 py-3">

                            @if (!empty($job->candidate_applied_by))

                            @if ($job->candidate_applied_by == "applied_by_form")
                            @isset($ap)
                            <a class="btn btn-primary fw-medium px-lg-5 px-4 me-3" href="#">Applied</a>
                            @else



                            <?php if(isset($userr)&&!empty($userr)&& Auth::check()) { ?>
                            <a class="btn btn-primary fw-medium px-lg-5 px-4 me-3"
                                href="{{ url('job/apply', $job->id) }}">Apply</a>

                            <?php }else{ ?>
                            {{-- // guest user details only --}}
                            <span class="btn btn-primary fw-medium px-lg-5 px-4 me-3" data-bs-toggle="modal"
                                data-bs-target="#myModalGustForm">Apply</span>

                            <?php } ?>
                            @endisset

                            @elseif ($job->candidate_applied_by == "applied_by_email")
                            <a class="btn btn-primary fw-medium px-lg-5 px-4 me-3"
                                href="mailto:{{ $job->job_apply_email }}">Apply on company Email</a>

                            @elseif ($job->candidate_applied_by == "applied_by_link")
                            <a class="btn btn-primary fw-medium px-lg-5 px-4 me-3"
                                href="{{ $job->job_apply_link }}">Apply on company site</a>

                            @endif

                            @else
                            @isset($ap)
                            <a class="btn btn-primary fw-medium px-lg-5 px-4 me-3" href="#">Applied</a>
                            @else
                            <a class="btn btn-primary fw-medium px-lg-5 px-4 me-3"
                                href="{{ url('job/apply', $job->id) }}">Apply</a>
                            @endisset

                            @endif

                        </div>
                        <?php }else{?>
                            <span class="btn btn-primary fw-medium px-lg-5 px-4 me-3" data-bs-toggle="modal"
                            data-bs-target="#myModalGustForm">Apply</span>
    

                            <?php } ?>

                    </div>
                </div>

                <div class="explot-info-details d-inline-flex flex-wrap">
                    <div class="single-explot d-flex align-items-center me-md-5 me-3 my-2">
                        <div class="single-explot-first">
                            <i class="fa-solid fa-business-time text-primary fs-1"></i>
                        </div>
                        <div class="single-explot-last ps-2">
                            <span class="text-light opacity-75">Afdeling</span>
                            <p class="text-light fw-bold fs-6 m-0">
                                {{ isset($job->cat->cat_name) ? $job->cat->cat_name : '' }}
                            </p>
                        </div>
                    </div>
                    <div class="single-explot d-flex align-items-center me-md-5 me-3 my-2">
                        <div class="single-explot-first">
                            <i class="fa-solid fa-location-dot text-primary fs-1"></i>
                        </div>
                        <div class="single-explot-last ps-2">
                            <span class="text-light opacity-75">Plaats</span>
                            <p class="text-light fw-bold fs-6 m-0">
                                @if (!empty($job->country_id) && $job->country_id == 1)
                                india
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="single-explot d-flex align-items-center">
                        <div class="single-explot-first">
                            <i class="fa-solid fa-sack-dollar text-primary fs-1"></i>
                        </div>
                        <div class="single-explot-last ps-2">
                            <span class="text-light opacity-75">Salary</span>
                            <p class="text-light fw-bold fs-6 m-0">${{ $job->min_salary }}-{{ $job->max_salary }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="gray-simple">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="jbs-blocs style_03 b-0 mb-md-4 mb-sm-4">
                    <div class="jbs-blocs-body px-4 py-4">
                        <div class="jbs-content mb-4">
                            <h5>Functieomschrijving</h5>
                            {!! isset($job->job_description) ? $job->job_description : '' !!}

                            <div class="jbs-content">
                                <h6>Kwalificaties en vaardigheden</h6>
                                <ul class="colored-list">
                                    @foreach ($skill as $key)
                                    <li>{{ $key['name'] }}</li>
                                    @endforeach
                                    <li>{{ isset($job->qual['name']) ? $job->qual['name'] : '' }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="jbs-blox-footer">
                        <div class="blox-first-footer">
                            <div class="ftr-share-block">
                                <ul>
                                    <li><strong>Deel deze vacature:</strong></li>
                                    @isset($job->user->twitter_profile_link)
                                    <li><a href="{{ $job->user->twitter_profile_link }}" contenteditable="false"
                                            style="cursor: pointer;"><i class="fa-brands fa-twitter"></i></a></li>
                                    @endisset
                                    @isset($job->user->instagram_profile_link)
                                    <li><a href="{{ $job->user->instagram_profile_link }}" contenteditable="false"
                                            style="cursor: pointer;"><i class="fa-brands fa-instagram"></i></a></li>
                                    @endisset
                                    @isset($job->user->linkedin_profile_link)
                                    <li><a href="{{ $job->user->linkedin_profile_link }}" contenteditable="false"
                                            style="cursor: pointer;"><i class="fa-brands fa-linkedin"></i></a></li>
                                    @endisset
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="jbs-blocs style_03 b-0 mb-md-4 mb-sm-4">
                    <div class="jbs-blocs-body px-4 py-4">
                        <div class="jbs-content mb-4">
                            <div class="side-rtl-jbs-block">
                                <div class="side-rtl-jbs-head">
                                    <h5 class="side-jbs-titles">Gerelateerde banen</h5>
                                </div>
                                <div class="side-rtl-jbs-body">
                                    <div class="side-rtl-jbs-groups">
                                        @foreach ($jobsSim as $key => $result)
                                        @if($job->id != $result->id)
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                            <div class="emplors-list-box border">
                                                <div class="emplors-list-head mb-0">
                                                    <div class="emplors-list-head-thunner">
                                                        <div class="mplors-list-logos">
                                                            <img src="{{ asset($result->company_logo) }}"
                                                                class="img-fluid" alt="">
                                                        </div>
                                                        <div class="mplors-list-captions">
                                                            <h5 class="mplors-title">
                                                                <a href="{{ url('job-detail', $result->id) }}"
                                                                    class="theme-cl">{{ $result->job_title }}</a>
                                                            </h5>
                                                            <span>{{ isset($result->types['name']) ?
                                                                $result->types['name'] : '' }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="emplors-list-head-info">
                                                        <div class="emplors-list-btn">
                                                            <a href="{{ url('job-detail', $result->id) }}"
                                                                class="btn light text-dark rounded bg-light">Meer
                                                                weergeven</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="jb-side-bs-blocks">
                    <div class="jb-side-bs-blocks-title">
                        <h4 class="ft-medium">Opleiding & Ervaring</h4>
                    </div>
                    <div class="jb-side-bs-blocks-body">
                        <div class="jb-min-content-blocks">
                            <div class="icon-info">
                                <h6 class="text-muted">Ervaring</h6>
                                <h5>{{ $job->min_experience }}-{{ $job->max_experience }} Jaren</h5>
                            </div>
                            <div class="icon-info">
                                <h6 class="text-muted">Kwalificatie</h6>
                                <h5>{{ isset($job->qual['name']) ? $job->qual['name'] : '' }}</h5>
                            </div>
                            <div class="icon-info">
                                <h6 class="text-muted">Vacature</h6>
                                <h5>{{ $job->no_of_vacancy }}</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="jb-side-bs-blocks">
                    <div class="jb-side-bs-blocks-title">
                        <h4 class="ft-medium">Vacature Informatie</h4>
                    </div>
                    <div class="jb-side-bs-blocks-body">
                        <div class="jb-min-content-blocks">
                            <div class="icon-info">
                                <h6 class="text-muted">ID van vacature</h6>
                                <h5>#{{ $job->id }}</h5>
                            </div>
                            <div class="icon-info">
                                <h6 class="text-muted">Tijdschema</h6>
                                <h5>{{ isset($job->types['name']) ? $job->types['name'] : '' }}</h5>
                            </div>
                            <div class="icon-info">
                                <h6 class="text-muted">Locatie</h6>
                                <h5>
                                    @if (!empty($job->country_id) && $job->country_id == 1)
                                    india
                                    @endif
                                </h5>
                            </div>
                            <div class="icon-info">
                                <h6 class="text-muted">Salaris</h6>
                                <h5>${{ $job->min_salary }}-{{ $job->max_salary }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="jb-side-bs-blocks mb-4">
                    <div class="jb-side-bs-blocks-title">
                        <h4 class="ft-medium">Vacature Trefwoorden</h4>
                    </div>
                    <div class="jb-side-bs-blocks-body">
                        <div class="jbs-keyword pl-3">
                            <span class="mr-2 mb-2">{{ isset($job->job_title) ? $job->job_title : '' }}</span>
                            <span class="mr-2 mb-2">{{ isset($job->cat->cat_name) ? $job->cat->cat_name : '' }}</span>
                            <span class="mr-2 mb-2">{{ isset($job->qual['name']) ? $job->qual['name'] : '' }}</span>
                            <span class="mr-2 mb-2">{{ isset($job->types['name']) ? $job->types['name'] : '' }}</span>
                        </div>
                    </div>
                </div>
                <div class="jb-side-bs-blocks">
                    <div class="jb-side-bs-blocks-title">
                        <h4 class="ft-medium">Hulpmiddelen</h4>
                    </div>
                    <div class="jb-side-bs-blocks-body">
                        <div class="jb-min-content-blocks">
                            <a href="javascript:void(0);" onclick="window.print();"
                                class="btn full-width btn-light mb-2"><i class="fa fa-print mr-2"></i>Print</a>
                            <a href="#" class="btn full-width btn-light gray mb-2"><i
                                    class="fa fa-download mr-2"></i>Vacature downloaden</a>
                            <a href="#" class="btn full-width btn-light gray mb-2"><i
                                    class="fa fa-share mr-2"></i>Vacature delen</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- ================================================= --}}

<!-- The Modal -->
<div class="modal" id="myModalGustForm">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Job Apply</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="{{ route('apply.job.store',$job->id) }}" enctype="multipart/form-data">

            <!-- Modal body -->
            <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp" required>
                        <div id="nameHelp" class="form-text">We'll never share your name with anyone else.</div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="tel" name="mobile" class="form-control" id="mobile" aria-describedby="mobileHelp" required>
                        <div id="mobileHelp" class="form-text">We'll never share your mobile number with anyone else.</div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="resume" class="form-label">Resume</label>
                        <input type="file" name="resume" class="form-control" accept=".pdf" required>
                        <div id="resumeHelp" class="form-text">Please upload your resume here.</div>
                    </div>
                    

                


            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>

                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </form>

        </div>
    </div>
</div>

@endsection