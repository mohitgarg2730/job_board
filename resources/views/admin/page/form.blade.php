@extends('admin.layouts.app')
@section('content')
<main id="main" class="main">

    <div class="page-content">
        <!-- Breadcrumb Start-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Content Management</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add / Edit Page</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="<?= url('admin/pages/list') ?>" class="btn btn-primary text-white"><i
                            class="bx bx-copy-alt"></i> Manage Pages</a>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End-->
        <!-- Form Start -->
        <div class="card border-top border-0 border-4 border-info">
            <div class="card-body">
                <div class="border p-4 rounded">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bx-copy-alt me-1 font-22 text-info"></i>
                        </div>
                        <h5 class="mb-0 text-info">Add / Edit Page</h5>
                    </div>
                    <hr class="mb-5">
                    <?php if(!empty($page->id)){ ?>
                    <form class="row g-3" action="{{ route('admin.pages.update', $page->id) }}" method="post"
                        enctype="multipart/form-data">



                        <?php }else{ ?>
                        <form class="row g-3" action="{{ route('admin.pages.store') }}" method="post"
                            enctype="multipart/form-data">


                            <?php } ?>

                            @csrf
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-2 col-form-label">Page
                                    Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="companyname" placeholder="page Name"
                                        name="page_name" value="{{ !empty($page->page_name) ? $page->page_name : '' }}">
                                    @error('page_name')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-2 col-form-label">Page
                                    Slug</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="" placeholder="page Name"
                                        name="page_slug" value="{{ !empty($page->page_slug) ? $page->page_slug : '' }}">
                                    @error('page_slug')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputConfirmPassword2" class="col-sm-2 col-form-label">page
                                    Content</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control summernote" id="editor" name="content" id="inputAddress4"
                                        rows="10"
                                        placeholder="">{{ !empty($page->content) ? $page->content : '' }}</textarea>
                                    @error('content')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary px-5">Save Page <i
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
