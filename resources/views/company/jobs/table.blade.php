@extends('company.layouts.afterlogin')

@section('content')
    <div class="dashboard-content">
        <div class="dashboard-tlbar d-block mb-4">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <h1 class="mb-1 fs-3 fw-medium">Plaats vacatures</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-muted"><a href="#">Werkgever</a></li>
                            <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#" class="text-primary">Plaats vacatures</a></li>
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

                                {{-- Action buttons for uploading CSV, XML, and Scraping --}}
                                <div class="row mb-4">
                                    <div class="col-sm-12 text-end">
                                        <a href="JavaScript:void(0);" data-bs-toggle="modal" data-bs-target="#filter"
                                            class="btn btn-primary" style="cursor: pointer;">Upload CSV</a>
                                        <a href="JavaScript:void(0);" data-bs-toggle="modal"
                                            data-bs-target="#xml_upload_modal" class="btn btn-primary"
                                            style="cursor: pointer;">Upload XML</a>
                                        <a href="JavaScript:void(0);" data-bs-toggle="modal"
                                            data-bs-target="#scrapper_upload_modal" class="btn btn-primary"
                                            style="cursor: pointer;">Scrapper</a>
                                    </div>
                                </div>

                                {{-- Sample CSV download link --}}
                                <a href="{{ asset('/') }}jobs.csv" download="">Steekproef</a>

                                <!-- Table with stripped rows -->
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th>sr</th>
                                            <th>Titel</th>
                                            <th>Min Salaris</th>
                                            <th>MaX-salaris</th>
                                            <th>Actie</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jobs as $key => $value)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $value->job_title }}</td>
                                                <td>{{ $value->min_salary }}</td>
                                                <td>{{ $value->max_salary }}</td>
                                                <td>
                                                    @if ($value->is_scrapper_job == 1)
                                                        <a href="{{ $value->link }}" target="_blank"
                                                            class="btn btn-primary">View</a>
                                                    @else
                                                        <a href="{{ route('company.job.view', $value->id) }}"
                                                            class="btn btn-primary">Weergave</a>
                                                        <a href="{{ route('company.job.edit', $value->id) }}"
                                                            class="btn btn-primary">Bewerking</a>
                                                        <a href="javascript:void(0);" class="btn btn-primary"
                                                            onclick="confirmDeletion('{{ route('company.job.del', $value->id) }}')">Verwijderen</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- End Table with stripped rows -->
                                {{ $jobs->onEachSide(1)->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    {{-- =================================================== --}}
    <!-- Upload XML Modal -->
    <div class="modal fade" id="xml_upload_modal" tabindex="-1" role="dialog" aria-labelledby="xml_upload_modal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered filter-popup" role="document">
            <div class="modal-content">
                <span class="mod-close" data-bs-dismiss="modal" aria-hidden="true"><i class="fas fa-close"></i></span>
                <div class="modal-header">
                    <h4 class="modal-header-sub-title">Upload XML</h4>
                </div>
                <div class="modal-body p-0">
                    <div class="filter-content">
                        <div class="full-tabs-group">
                            <form action="{{ route('company.job.xml.import') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="xml_file">Upload XML</label>
                                    <input type="file" name="xml_file" class="form-control" required>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-12 text-end">
                                        <a href="{{ asset('/') }}sample1.xml" download=""
                                            class="btn btn-primary">Sample File</a>
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                        <span data-bs-dismiss="modal" aria-hidden="true"
                                            class="btn btn-primary">Close</span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- =================================================== --}}

    {{-- =================================================== --}}
    <!-- Upload CSV Modal -->
    <div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="filtermodal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered filter-popup" role="document">
            <div class="modal-content">
                <span class="mod-close" data-bs-dismiss="modal" aria-hidden="true"><i class="fas fa-close"></i></span>
                <div class="modal-header">
                    <h4 class="modal-header-sub-title">Upload CSV</h4>
                </div>
                <div class="modal-body p-0">
                    <div class="filter-content">
                        <div class="full-tabs-group">
                            <form action="{{ route('company.job.csv.import') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="csv_file">Upload CSV</label>
                                    <input type="file" name="file" class="form-control" required>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-12 text-end">
                                        <a href="{{ asset('/') }}jobs.csv" download=""
                                            class="btn btn-primary">Sample File</a>
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                        <span data-bs-dismiss="modal" aria-hidden="true"
                                            class="btn btn-primary">Close</span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- =================================================== --}}

    {{-- =================================================== --}}
    <!-- Scrapper Modal -->
    <div class="modal fade" id="scrapper_upload_modal" tabindex="-1" role="dialog"
        aria-labelledby="scrapper_upload_modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered filter-popup" role="document">
            <div class="modal-content">
                <span class="mod-close" data-bs-dismiss="modal" aria-hidden="true">
                    <i class="fas fa-close"></i>
                </span>
                <div class="modal-header">
                    <h4 class="modal-header-sub-title">Scrapper</h4>
                </div>
                <div class="modal-body p-0">
                    <div class="filter-content">
                        <div class="full-tabs-group">
                            <form action="{{ route('company.job.scrapper') }}" method="POST"
                                onsubmit="startLoader(event)">
                                @csrf
                                <div class="form-group">
                                    <label for="url">Voer een URL in</label>
                                    <input type="text" name="url" class="form-control" required>
                                </div>

                                <div class="text-end mt-3">
                                    <button type="submit" id="submitButton" class="btn btn-primary">Schrapen</button>
                                    <span data-bs-dismiss="modal" aria-hidden="true" class="btn btn-primary">Close</span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Loader Modal -->
        <div id="loaderModal" class="loader-modal" style="display: none;">
            <div class="loader-content">
                <h2>Now Building</h2>
                <p>Your Jobs will be ready soon</p>
                <div class="loader-circle">
                    <div class="progress-circle"></div>
                    <span id="progress-percentage">0%</span> <!-- Moved outside rotating element -->
                </div>
                {{-- <p>Click to Cancel</p> --}}
            </div>
        </div>
    </div>

    <!-- CSS for Loader -->
    <style>
        /* Loader Modal Styles */
        .loader-modal {
            position: fixed;
            z-index: 9999;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgba(0, 0, 0, 0.5);
        }

        .loader-content {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            max-width: 300px;
            width: 100%;
        }

        .loader-circle {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px 0;
            position: relative;
        }

        /* Circular progress */
        .progress-circle {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 10px solid #f3f3f3;
            border-top: 10px solid #3498db;
            animation: spin 2s linear infinite;
            position: relative;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Static percentage in the center */
        #progress-percentage {
            position: absolute;
            font-size: 18px;
            font-weight: bold;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 10;
            /* Ensure the percentage text is above the spinner */
        }
    </style>

    <!-- JavaScript for Loader -->
    <script>
        function startLoader(event) {
            // event.preventDefault(); // Prevent the form from submitting immediately

            // Show the loader modal
            document.getElementById('loaderModal').style.display = 'flex';

            // Hide the main modal
            var scrapperModal = new bootstrap.Modal(document.getElementById('scrapper_upload_modal'));
            scrapperModal.hide();

            // Disable the submit button to prevent multiple submissions
            document.getElementById('submitButton').disabled = true;

            // // Simulate progress (you can update this logic based on your actual progress handling)
            let progress = 0;
            let progressInterval = setInterval(function() {
                if (progress >= 100) {
                    clearInterval(progressInterval);
                    // You can submit the form after the loader completes here
                    // document.querySelector('form').submit();
                } else {
                    progress += 1;
                    document.getElementById('progress-percentage').innerText = progress + "%";
                }
            }, 3000); // 50ms for quick demonstration
            event.submit();
        }
    </script>

    {{-- =================================================== --}}
@endsection
