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
                        <a href="{{ route('admin.qual.add') }}" class="btn btn-primary">Add</a>
                    </div>
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">Default Table</h5>

                            <!-- Default Table -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($c as $key => $value) { ?>
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $value->name }}</td>
                                        <td><a href="{{ route('admin.qual.edit', $value->id) }}"
                                                class="btn btn-primary">Edit</a>

                                                <a href="javascript:void(0);" class="btn btn-danger" onclick="confirmDeletion('{{ route('admin.qual.delete',$value->id) }}')">Delete</a>

                                        </td>

                                    </tr>
                                    <?php } ?>
   <!-- Pagination Links -->
   <div class="d-flex justify-content-center">
    {{ $c->links() }}
</div>
<!-- End Default Table Example -->
                                </tbody>
                            </table>
                            <!-- End Default Table Example -->
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection
