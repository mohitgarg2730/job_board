@extends('company.layouts.afterlogin')

@section('content')
<div class="dashboard-content">
    <div class="dashboard-tlbar d-block mb-4">
        <div class="row">
            <div class="colxl-12 col-lg-12 col-md-12">
                <h1 class="mb-1 fs-3 fw-medium">Werkgever Profiel verwijderen</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item text-muted"><a href="#">Werkgever</a></li>
                        <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" class="text-primary">Account verwijderen</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    <div class="dashboard-widg-bar d-block">
        
        <div class="card">
            <div class="card-header">
                <h4>Account verwijderen</h4>
            </div>
            <div class="card-body">
                <form>
                    <div class="row mb-3">
                        <label class="col-xl-12 col-md-12 col-form-label">Voer uw wachtwoord in om account te verwijderen</label>
                        <div class="col-xl-9 col-md-12">
                            <input type="text" class="form-control" placeholder="*******">
                        </div>
                    </div> 
                    <div class="row mb-3">
                        <div class="col-xl-12 col-md-12">
                            <button type="button" class="btn btn-danger">Account verwijderen</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    
    <!-- footer -->
    <div class="row">
        <div class="col-md-12">
            <div class="py-3 text-center">© 2015 - 2023 Job Stock® Themezhub.</div>
        </div>
    </div>

</div>	

@endsection