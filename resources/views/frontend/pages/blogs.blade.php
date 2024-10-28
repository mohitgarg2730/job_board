<?php

use App\Models\Blog;

$blogs = Blog::get();


?>



@extends('layouts.app')

@section('content')
    <!-- End Navigation -->
    <div class="clearfix"></div>
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->

<style>
    
</style>


    <!-- ============================ Blogs  ================================== -->
    <section class="gray-simple py-5">
        <div class="container">
            <div class="row justify-content-center mb-4">
                <div class="col-xl-6 col-lg-7 col-md-10 text-center">
                    <div class="sec-heading center">
                        <h2>Blogs</h2>
                    </div>
                </div>
            </div>
    
            <div class="row justify-content-center gx-4 gy-4">
                @foreach ($blogs as $key => $value)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card h-100 custom_card">
                            <div class="card-img-top">
                                <a href="candidate-detail.html">
                                    <img src="{{ asset('/') }}{{ $value['image'] }}" class="img-fluid" alt="">
                                </a>
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title"><?php echo$value['title'] ?></h5>
                                <p class="card-text"><?php  echo \Illuminate\Support\Str::limit($value['body'], 150, '...') ?></p>
                            </div>
                            <div class="card-footer text-center">
                                <a href="{{ url('blog/') }}/{{ $value['slug'] }}" class="btn btn-primary">View More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    
         
        </div>
    </section>
    
    <!-- ============================Blogs End ================================== -->


    <!-- ============================ Call To Action End ================================== -->
@endsection
