@extends('welfare.layout.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ config('app.name') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    {{-- <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol> --}}
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Ex Serviceman</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        @include('partials.esm.view',['esm'=>$d])
                        <?php if( $d->status=='2'){  ?>
                            Approved
                         <?php } ?>
                        <?php if( $d->status=='3'){  ?>
                            Rejected
                         <?php } ?>

                        <?php if( $d->status=='1'){  ?>
                        <div class="card p-2">
                            <h3>Remarks</h3>
                            <form class="p-2" action="{{ route('dept.esm.track',$d->id) }}" method="POST">
                                @csrf
                                <div class="form-check-inline mt-2">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status" value="2">Approve
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status" value="3">Reject
                                    </label>
                                </div>

                                <div class="form-group mt-2">
                                    <label for="pwd">Remarks:</label>
                                    <textarea class="form-control" rows="5" id="comment" name="remarks"></textarea>

                                </div>
                                <div class="form-group mt-2">

                                    <input type="submit" class="form-control btn btn-primary" value="submit">
                                </div>

                            </form>
                        </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
</div>

@endsection