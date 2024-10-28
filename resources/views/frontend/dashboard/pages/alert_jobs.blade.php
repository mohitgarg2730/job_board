@extends('layouts.candidate')

@section('content')

<div class="dashboard-content">
    <div class="dashboard-tlbar d-block mb-4">
        <div class="row">
            <div class="colxl-12 col-lg-12 col-md-12">
                <h1 class="mb-1 fs-3 fw-medium">Alle waarschuwingstaken</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item text-muted"><a href="#">Kandidaat</a></li>
                        <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" class="text-primary">Waarschuw banen</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    <div class="dashboard-widg-bar d-block">
        
        
        <!-- Header Wrap -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                <div class="card-header">
                    <div class="_mp-inner-content elior">
                        <div class="_mp-inner-first">
                            <div class="search-inline">
                                <input type="text" class="form-control" placeholder="Vacaturetitel, Zoekwoorden, enz.">
                                <button type="button" class="btn btn-primary">Zoeken</button>
                            </div>
                        </div>
                        <div class="_mp_inner-last">
                            <div class="item-shorting-box-right">
                                <div class="shorting-by me-2 small">
                                    <select style="display: none;">
                                        <option value="0">Sorteren op (Standaard)</option>
                                        <option value="1">Sorteren op (Uitgelicht)</option>
                                        <option value="2">Sorteren op (Dringend)</option>
                                        <option value="3">Sorteren op (Plaatsingsdatum)</option>
                                    </select>
                                    <div class="nice-select" tabindex="0">
                                        <span class="current">Sorteren op (Standaard)</span>
                                        <ul class="list">
                                            <li data-value="0" class="option selected">Sorteren op (Standaard)</li>
                                            <li data-value="1" class="option">Sorteren op (Uitgelicht)</li>
                                            <li data-value="2" class="option">Sorteren op (Dringend)</li>
                                            <li data-value="3" class="option">Sorteren op (Plaatsingsdatum)</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Titel</th>
                                        <th scope="col">Categorie</th>
                                        <th scope="col">Gevonden vacatures</th>
                                        <th scope="col">Actie</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Jr. Web Designer</td>
                                        <td>Software</td>
                                        <td>06 vacatures</td>
                                        <td>
                                            <a href="JavaScript:Void(0);" class="btn btn-md btn-light-danger px-3 me-2"><i class="fa-solid fa-xmark"></i></a>
                                            <a href="JavaScript:Void(0);" class="btn btn-md btn-light-success px-3"><i class="fa-solid fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>IOS Ontwikkelaar</td>
                                        <td>Toepassing</td>
                                        <td>04 vacatures</td>
                                        <td>
                                            <a href="JavaScript:Void(0);" class="btn btn-md btn-light-danger px-3 me-2"><i class="fa-solid fa-xmark"></i></a>
                                            <a href="JavaScript:Void(0);" class="btn btn-md btn-light-success px-3"><i class="fa-solid fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>SEO Specialist</td>
                                        <td>SEO/SMO</td>
                                        <td>02 vacatures</td>
                                        <td>
                                            <a href="JavaScript:Void(0);" class="btn btn-md btn-light-danger px-3 me-2"><i class="fa-solid fa-xmark"></i></a>
                                            <a href="JavaScript:Void(0);" class="btn btn-md btn-light-success px-3"><i class="fa-solid fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Magento Ontwikkelaar</td>
                                        <td>Ontwikkelaar</td>
                                        <td>06 vacatures</td>
                                        <td>
                                            <a href="JavaScript:Void(0);" class="btn btn-md btn-light-danger px-3 me-2"><i class="fa-solid fa-xmark"></i></a>
                                            <a href="JavaScript:Void(0);" class="btn btn-md btn-light-success px-3"><i class="fa-solid fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Front-end Ontwerper</td>
                                        <td>Web Design</td>
                                        <td>03 vacatures</td>
                                        <td>
                                            <a href="JavaScript:Void(0);" class="btn btn-md btn-light-danger px-3 me-2"><i class="fa-solid fa-xmark"></i></a>
                                            <a href="JavaScript:Void(0);" class="btn btn-md btn-light-success px-3"><i class="fa-solid fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Shipify Ontwikkelaar</td>
                                        <td>Toepassing</td>
                                        <td>07 vacatures</td>
                                        <td>
                                            <a href="JavaScript:Void(0);" class="btn btn-md btn-light-danger px-3 me-2"><i class="fa-solid fa-xmark"></i></a>
                                            <a href="JavaScript:Void(0);" class="btn btn-md btn-light-success px-3"><i class="fa-solid fa-eye"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>	
        </div>
        <!-- Header Wrap -->

    </div>
    
    <!-- footer -->
    <div class="row">
        <div class="col-md-12">
            <div class="py-3 text-center">© 2015 - 2023 Job Stock® Themezhub.</div>
        </div>
    </div>

</div>


@endsection