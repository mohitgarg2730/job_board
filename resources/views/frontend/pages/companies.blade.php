<?php

use App\Models\Blog;
use App\Models\User;

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
            <?php
            $company = User::where('role', 'company')->get()->toArray();
        
            ?>
            <?php foreach ($company as $key => $value) { ?>
                <div class="row">
        
                    <div class="col-md-12 mt-3 mb-3">
        
                        <div class="job_wraper">
        
        
                            <div class="job_inner">
                                <div class="job_img">
                                    <img src="{{ asset('/') }}{{ $value['profile_picture'] }}" class="img-fluid" alt="job">
        
                                </div>
                                <div class="job_content">
                                    <p>{{ $value['name'] }}</p>
        
                                </div>
                            </div>
                            <div class="job_btn_right">
                                <div class="time"><i class="fa-regular fa-clock"></i>2pm</div>
                                <div class="apply_btn">
        
                                    <a href="{{ url('company-detail') }}/{{ base64_encode($value['id']) }}/{{ $value['name'] }}"
                                        class="btn btn-md btn-primary px-4">View vacancies</a>
        
        
                                </div>
                            </div>
        
                        </div>
                    </div>
        
                </div>
        
            <?php } ?>
        </div>
    </section>
    
    <!-- ============================Blogs End ================================== -->


    <!-- ============================ Call To Action End ================================== -->
@endsection
