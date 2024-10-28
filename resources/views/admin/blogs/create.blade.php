@extends('admin.layouts.app')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Blogs</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Blogs</li>
                    <li class="breadcrumb-item active">create</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-12 text-end">
                        {{-- <a href="{{ route('admin.blogs') }}" class="btn btn-primary">Add</a> --}}
                    </div>
                    <div class="card">

                        <div class="card-body">


                            <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @include('partials.blogs.create')
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection
