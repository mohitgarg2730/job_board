@extends('admin.layouts.app')
@section('content')

<main id="main" class="main">

    <div class="page-content">
        <!-- Breadcrumb Start-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

            <div class="ms-auto">
                <div class="btn-group">
                </div>
            </div>
        </div>
        <!-- Breadcrumb End-->
        <!-- Form Start -->
        <div class="card border-top border-0 border-4 border-info">
            <div class="card-body">
                <div class="border p-4 rounded">
                    <div class="card-title d-flex align-items-center">
                        <div>
                        </div>
                    </div>
                    <hr class="mb-5">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif


                    <form class="row g-3" action="{{ route('admin.homepages.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <!-- Hero Banner Section -->
                        <h2>Hero Banner</h2>
                        <div class="row mb-3">
                            <label for="banner" class="col-sm-2 col-form-label">Banner</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="banner" name="banner">
                                @if(!empty($h->banner))
                                <img src="{{ asset('/') }}{{$h->banner}}" style="width: 400px; height: 200px">
                                @endif
                                @error('banner')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="heading_one" class="col-sm-2 col-form-label">Heading 1</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="heading_one" name="heading_one"
                                    value="{{ $h->heading_one ?? '' }}">
                                @error('heading_one')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="heading_two" class="col-sm-2 col-form-label">Heading 2</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="heading_two" name="heading_two"
                                    value="{{ $h->heading_two ?? '' }}">
                                @error('heading_two')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- About Us Section -->
                        <h2>About Us</h2>
                        <div class="row mb-3">
                            <label for="left_img" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="left_img" name="left_img">
                                @if(!empty($h->left_img))
                                <img src="{{ asset('/') }}{{$h->left_img}}" style="width: 400px; height: 200px">
                                @endif
                                @error('left_img')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="section_2_heading_one" class="col-sm-2 col-form-label">Heading 1</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="section_2_heading_one"
                                    name="section_2_heading_one" value="{{ $h->section_2_heading_one ?? '' }}">
                                @error('section_2_heading_one')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="conten_section_2" class="col-sm-2 col-form-label">Content</label>
                            <div class="col-sm-10">
                                <textarea class="form-control summernote" id="conten_section_2"
                                    name="conten_section_2">{{ $h->conten_section_2 ?? '' }}</textarea>
                                @error('conten_section_2')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Choose What You Need Section -->
                        <h2>Choose What You Need Section</h2>
                        {{-- <div class="row mb-3">
                            <label for="heading_one_section_3" class="col-sm-2 col-form-label">Heading 1</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="heading_one_section_3"
                                    name="heading_one_section_3" value="{{ $h->heading_one_section_3 ?? '' }}">
                                @error('heading_one_section_3')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="row mb-3">
                            <label for="content1_section_3" class="col-sm-2 col-form-label">Content 1</label>
                            <div class="col-sm-10">
                                <textarea class="form-control summernote" id="content1_section_3"
                                    name="content1_section_3">{{ $h->content1_section_3 ?? '' }}</textarea>
                                @error('content1_section_3')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="content2_section_3" class="col-sm-2 col-form-label">Content 2</label>
                            <div class="col-sm-10">
                                <textarea class="form-control summernote" id="content2_section_3"
                                    name="content2_section_3">{{ $h->content2_section_3 ?? '' }}</textarea>
                                @error('content2_section_3')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="content3_section_3" class="col-sm-2 col-form-label">Content 3</label>
                            <div class="col-sm-10">
                                <textarea class="form-control summernote" id="content3_section_3"
                                    name="content3_section_3">{{ $h->content3_section_3 ?? '' }}</textarea>
                                @error('content3_section_3')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Job Section Headings -->
                        <h2>Job Section Headings</h2>
                        <div class="row mb-3">
                            <label for="job_section_heading" class="col-sm-2 col-form-label">Heading</label>
                            <div class="col-sm-10">
                                <textarea class="form-control summernote" id="job_section_heading"
                                    name="job_section_heading">{{ $h->job_section_heading ?? '' }}</textarea>
                                @error('job_section_heading')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="job_section_sub_heading" class="col-sm-2 col-form-label">Sub Heading</label>
                            <div class="col-sm-10">
                                <textarea class="form-control summernote" id="job_section_sub_heading"
                                    name="job_section_sub_heading">{{ $h->job_section_sub_heading ?? '' }}</textarea>
                                @error('job_section_sub_heading')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Category Section Headings -->
                        <h2>Category Section Headings</h2>
                        <div class="row mb-3">
                            <label for="cat_section_heading" class="col-sm-2 col-form-label">Category Heading</label>
                            <div class="col-sm-10">
                                <textarea class="form-control summernote" id="cat_section_heading"
                                    name="cat_section_heading">{{ $h->cat_section_heading ?? '' }}</textarea>
                                @error('cat_section_heading')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cat_section_sub_heading" class="col-sm-2 col-form-label">Sub Heading</label>
                            <div class="col-sm-10">
                                <textarea class="form-control summernote" id="cat_section_sub_heading"
                                    name="cat_section_sub_heading">{{ $h->cat_section_sub_heading ?? '' }}</textarea>
                                @error('cat_section_sub_heading')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- City Section Headings -->
                        <h2>City Section Headings</h2>
                        <div class="row mb-3">
                            <label for="city_section_heading" class="col-sm-2 col-form-label">City Heading</label>
                            <div class="col-sm-10">
                                <textarea class="form-control summernote" id="city_section_heading"
                                    name="city_section_heading">{{ $h->city_section_heading ?? '' }}</textarea>
                                @error('city_section_heading')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="city_section_sub_heading" class="col-sm-2 col-form-label">Sub Heading</label>
                            <div class="col-sm-10">
                                <textarea class="form-control summernote" id="city_section_sub_heading"
                                    name="city_section_sub_heading">{{ $h->city_section_sub_heading ?? '' }}</textarea>
                                @error('city_section_sub_heading')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Company Section Headings -->
                        <h2>Company Section Headings</h2>
                        <div class="row mb-3">
                            <label for="company_section_heading" class="col-sm-2 col-form-label">Company Heading</label>
                            <div class="col-sm-10">
                                <textarea class="form-control summernote" id="company_section_heading"
                                    name="company_section_heading">{{ $h->company_section_heading ?? '' }}</textarea>
                                @error('company_section_heading')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="company_section_sub_heading" class="col-sm-2 col-form-label">Sub Heading</label>
                            <div class="col-sm-10">
                                <textarea class="form-control summernote" id="company_section_sub_heading"
                                    name="company_section_sub_heading">{{ $h->company_section_sub_heading ?? '' }}</textarea>
                                @error('company_section_sub_heading')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Plans Section Headings -->
                        <h2>Plans Section Headings</h2>
                        <div class="row mb-3">
                            <label for="plans_section_heading" class="col-sm-2 col-form-label">Plans Heading</label>
                            <div class="col-sm-10">
                                <textarea class="form-control summernote" id="plans_section_heading"
                                    name="plans_section_heading">{{ $h->plans_section_heading ?? '' }}</textarea>
                                @error('plans_section_heading')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="plans_section_sub_heading" class="col-sm-2 col-form-label">Sub Heading</label>
                            <div class="col-sm-10">
                                <textarea class="form-control summernote" id="plans_section_sub_heading"
                                    name="plans_section_sub_heading">{{ $h->plans_section_sub_heading ?? '' }}</textarea>
                                @error('plans_section_sub_heading')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Steps Section Headings -->
                        <h2>Steps Section Headings</h2>
                        <div class="row mb-3">
                            <label for="steps_section_heading" class="col-sm-2 col-form-label">Steps Heading</label>
                            <div class="col-sm-10">
                                <textarea class="form-control summernote" id="steps_section_heading"
                                    name="steps_section_heading">{{ $h->steps_section_heading ?? '' }}</textarea>
                                @error('steps_section_heading')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="steps_section_sub_heading" class="col-sm-2 col-form-label">Sub Heading</label>
                            <div class="col-sm-10">
                                <textarea class="form-control summernote" id="steps_section_sub_heading"
                                    name="steps_section_sub_heading">{{ $h->steps_section_sub_heading ?? '' }}</textarea>
                                @error('steps_section_sub_heading')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>







            </div>
        </div>
        <!-- Form End -->
    </div>




</main>




@endsection