@extends('company.layouts.afterlogin')

@section('content')
    <div class="dashboard-content">
        <div class="dashboard-tlbar d-block mb-4">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <h1 class="mb-1 fs-3 fw-medium">Billing</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-muted"><a href="#">Billing</a></li>
                            <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="dashboard-widg-bar d-block">
            <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <!-- Table with stripped rows -->
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th>
                                                sr
                                            </th>
                                            <th>Plan Name </th>
                                            <th>Price</th>
                                            <th>Start Date</th>
                                            <th>End Date </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($p as $key => $value) { ?>
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $value['plan']['plan_name'] }}</td>
                                            <td>{{ $value['amount'] }}</td>
                                            <td>{{ $value['plan_start_date'] }}</td>
                                            <td>{{ $value['plan_end_date'] }}</td>

                                        </tr>
                                        <?php  } ?>

                                    </tbody>
                                </table>
                                <!-- End Table with stripped rows -->

                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
