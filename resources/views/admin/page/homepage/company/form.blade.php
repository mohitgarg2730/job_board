@extends('admin.layouts.app')
@section('content')
<main id="main" class="main">

    <div class="page-content">
        <div class="card border-top border-0 border-4 border-info">
            <div class="card-body">
                <div class="border p-4 rounded">
                    <?php if(!empty($page->id)){ ?>
                    <form class="row g-3" action="{{ route('admin.hoempage.company.update', $page->id) }}" method="post"
                        enctype="multipart/form-data">



                        <?php }else{ ?>
                        <form class="row g-3" action="{{ route('admin.hoempage.company.store') }}" method="post"
                            enctype="multipart/form-data">


                            <?php } ?>

                            @csrf
                            <div class="row mb-3">
                                <label for="inputImage" class="col-sm-2 col-form-label">Upload Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="inputImage" name="img">
                                    @error('img')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                    <?php if(!empty($page->img))
                                    { ?>
                                    <img src="{{ asset($page->img) }}" style="width:100px; height:100px">
                                    <?php } ?>


                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName" placeholder="Name"
                                        name="name" value="{{ !empty($page->name) ? $page->name : '' }}">
                                    @error('name')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputURL" class="col-sm-2 col-form-label">URL</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputURL" placeholder="URL" name="url"
                                        value="{{ !empty($page->url) ? $page->url : '' }}">
                                    @error('url')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>




                            <div class="row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary px-5">Save <i
                                            class="bx bx-copy-alt"></i></button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
        <!-- Form End -->
    </div>





</main>






@endsection
