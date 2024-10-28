@extends('layouts.app')

@section('content')

<?php 
use App\Models\Blog;

$blogs = Blog::where('added_by',$blog->added_by)->get();


?>
<!-- End Navigation -->
<div class="clearfix"></div>
<!-- ============================================================== -->
<!-- Top header  -->
<!-- ============================================================== -->


<style>
    .banner_bg {
        color: #fff;
        text-align: center;
        height: 60vh;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .gray-simple .card-body {

    font-family:'jost', sans-serif !important;
}
.card-body h2{
    margin-top: 28px;
}
    .gray-simple .sidebar.topbar {
        margin-bottom: 22px;
    }
    .gray-simple .sidebar {
        background-color: #fff;
        padding: 12px;
    }

    .banner_bg h5 {
        max-width: 700px;
        margin: 0 auto;
        font-size: 22px;
    }

    ul {
        padding: 0;
    }

    @media (min-width:768px) {
        .banner_bg {
            height: 50vh;

        }
    }

    @media (min-width:992px) {
        .banner_bg h5 {
            font-size: 34px;

        }
    }
</style>

<!-- ============================ Blogs  ================================== -->
<section class="banner_bg" style="background-image: url({{ asset('/') }}{{ $blog->image }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5 class="card-title"><?php echo $blog->title; ?></h5>
            </div>
        </div>
    </div>
</section>
<section class="gray-simple py-5">
    <div class="container">

        <div class="row gy-5">
            <div class=" col-md-9 ">
                <div class="card h-100">
                    <div class="card-img-top">
                        <a href="#">
                            <!-- <img src="{{ asset('/') }}{{ $blog->image }}" class="img-fluid rounded-circle" alt=""> -->
                            <!-- <img src="https://www.gstatic.com/webp/gallery/1.webp" alt="img-fluid"> -->
                        </a>
                    </div>
                    <div class="card-body text-center">
                        <!-- <h5 class="card-title"><?php echo $blog->title; ?></h5> -->
                        <p class="card-text"><?php  echo $blog->body; ?></p>
                    </div>

                </div>
            </div>
            <div class="col-md-3">
                <div class="sidebar topbar">
                    <ul>
                        <li>q</li>
                        <li>q</li>
                        <li>q</li>
                        <li>q</li>
                        <li>q</li>
                    </ul>
                </div>
                <div class="sidebar bottombar">
                    <ul>
                        <li>q</li>
                        <li>q</li>
                        <li>q</li>
                        <li>q</li>
                        <li>q</li>
                    </ul>
                </div>
            </div>

        </div>

    </div>
</section>

<section class="gray-simple py-5">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-xl-6 col-lg-7 col-md-10 text-center">
                <div class="sec-heading center">
                    <h2>Related Blogs</h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center gx-4 gy-4">
            @foreach ($blogs as $key => $value)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card h-100">
                        <div class="card-img-top">
                            <a href="candidate-detail.html">
                                <img src="{{ asset('/') }}{{ $value['image'] }}" class="img-fluid rounded-circle"
                                    alt="">
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">
                                <?php echo $value['title']; ?>
                            </h5>
                            <p class="card-text">
                                <?php echo \Illuminate\Support\Str::limit($value['body'], 150, '...'); ?>
                            </p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ url('blog/') }}/{{ $value['slug'] }}" class="btn btn-primary">View More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- 'See All Blogs' button should be outside of the blog grid -->
        {{-- <div class="row justify-content-center mt-4">
            <div class="col-12 text-center">
                <a href="{{ url('all/blogs') }}" class="btn btn-primary">See All Blogs</a>
            </div>
        </div> --}}
    </div>
</section>

<!-- ============================Blogs End ================================== -->


<!-- ============================ Call To Action End ================================== -->
@endsection