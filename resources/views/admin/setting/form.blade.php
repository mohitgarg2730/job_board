@extends('admin.layouts.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Form Elements</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Forms</li>
                <li class="breadcrumb-item active">Elements</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">General Form Elements</h5>

                        <!-- General Form Elements -->
                        <form action="{{ route('admin.setting.store') }}" method="post">

                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Facebook link</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="fb_link"
                                        value="{{ !empty($s->fb_link)?$s->fb_link : '' }}">
                                    @error('fb_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Instagram link</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="in_link"
                                        value="{{ !empty($s->in_link)?$s->in_link : '' }}">
                                    @error('in_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Twitter link</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tw_link"
                                        value="{{ !empty($s->tw_link)?$s->tw_link : '' }}">
                                    @error('tw_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Linkdin link</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="li_link"
                                        value="{{ !empty($s->li_link)?$s->li_link : '' }}">
                                    @error('li_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>


        </div>
    </section>
</main><!-- End #main -->
@endsection