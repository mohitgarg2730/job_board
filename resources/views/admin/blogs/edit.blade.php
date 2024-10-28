@extends('admin.layouts.app')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data Tables</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-12 text-end">
                        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary mb-3">Create New Blog</a>

                    </div>
                    <div class="card">

                        <div class="card-body">




                            <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST"
                                enctype="multipart/form-data">

                                @csrf
                                @method('PUT')
                                @include('partials.blogs.edit')

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection
