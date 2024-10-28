@extends('admin.layouts.app')
@section('content')
<main id="main" class="main">

    <div class="page-content">

        <a href="<?= url('admin/hoempage/company/logo') ?>" class="btn btn-primary text-white"><i
            class="bx bx-copy-alt"></i> Add</a>
        <!-- Breadcrumb End-->
        <!-- Form Start -->
        <div class="card">
            <div class="card-body">
                <div class="border p-4 rounded">

                    <hr class="mb-5">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Link</th>
                                <th scope="col">Image</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($page as $key => $value) { ?>

                            <tr>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->url }}</td>
                                <td>
                                    <?php if(!empty($value->img))
                                    { ?>
                                    <img src="{{ asset($value->img) }}" style="width:100px; height:100px">
                                    <?php } ?>
                                </td>
                                <td>
                                    <div class="btn-group m-1" role="group" aria-label="Basic example">
                                        <a href="{{ route('admin.hoempage.company.edit',$value->id) }}"
                                            class="btn btn-outline-danger"><i class="bx bx-edit-alt"></i></a>


                                            <a href="javascript:void(0);" class="btn btn-danger" onclick="confirmDeletion('{{ route('admin.hoempage.company.delete',$value->id) }}')">Delete</a>
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
