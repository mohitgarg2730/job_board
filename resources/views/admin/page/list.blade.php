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
                        <li class="breadcrumb-item active" aria-current="page">Manage Pages</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="<?= url('admin/pages/add') ?>" class="btn btn-primary text-white"><i
                            class="bx bx-copy-alt"></i> Add Pages</a>
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
                        <h5 class="mb-0 text-info">Manage Pages</h5>
                    </div>
                    <hr class="mb-5">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Page Name</th>
                                <th scope="col">Page Link</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($page as $key => $value) { ?>

                            <tr>
                                <td>{{ $value['page_name'] }}</td>
                                <td>{{ url('/') }}/{{ $value['page_slug'] }}</td>
                                <td>
                                    <div class="btn-group m-1" role="group" aria-label="Basic example">
                                        <a href=" {{ url('admin/pages/edit/') }}/{{ $value['id'] }}"
                                            class="btn btn-outline-danger"><i class="bx bx-edit-alt"></i></a>

                                            <a href="javascript:void(0);" class="btn btn-danger" onclick="confirmDeletion('{{ url('admin/pages/del/') }}/{{ $value['id'] }}')">Delete</a>

                              
                                    </div>
                                </td>
                            </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Form End -->
    </div>
</main>
@endsection
