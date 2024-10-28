@extends('company.layouts.afterlogin')

@section('content')
    <div class="dashboard-content">
        <div class="dashboard-tlbar d-block mb-4">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <h1 class="mb-1 fs-3 fw-medium">Edit Blog</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-muted"><a href="#">Create Blog</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="dashboard-widg-bar d-block">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">





                                <form action="{{ route('company.blogs.update', $blog->id) }}" method="POST"     enctype="multipart/form-data">

                                    @csrf
                                    @method('PUT')
                                    @include('partials.blogs.edit')
                                
                                </form>
                             
                                <!-- End Table with stripped rows -->

                            </div>
                        </div>

                    </div>
                </div>
        </div>
    </div>
@endsection







