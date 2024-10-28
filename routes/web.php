<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\candidate\CandidateDashbaord;
use App\Http\Controllers\company\CompanyDashboardController;
use App\Http\Controllers\company\CompanyProfileController;
use App\Http\Controllers\company\JobCompnayController;
use App\Http\Controllers\candidate\CandidateProfileController;
use App\Http\Controllers\ForgotPasswordController;
use App\Mail\TestEmail;
use App\Http\Controllers\CategeoryController;
use App\Http\Controllers\JobTypeController;
use App\Http\Controllers\QualificationController;
use App\Http\Controllers\JobLevelController;
use App\Http\Controllers\JobExperinceController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ApplyJobController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\FooterMenuController;
use App\Http\Controllers\Admin\CookieController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\Settingcontroller;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\HomePageCityController;
use App\Http\Controllers\HomePageCompanyLogoController;
use App\Http\Controllers\AdminProfileController;
use App\Models\Page;
use App\Http\Controllers\XMLController;
use App\Http\Controllers\company\CompanyBlogController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Session;


Route::post('email/check', [AuthController::class, 'email_check'])->name('email.check');



Route::get('set-locale/{locale}', function ($locale) {
    // Set the selected locale in the session
    Session::put('locale', $locale);

    // Redirect back to the previous page
    return redirect()->back();
})->name('set-locale');



Route::get('test/mail', [TestController::class, 'index']);
Route::get('email/verify/{token}', [AuthController::class, 'emailverify'])->name('email.verify');
Route::get('all/blogs', [HomeController::class, 'blogs'])->name('all.blogs');
Route::get('companies', [HomeController::class, 'companies'])->name('companies.list');
Route::get('blog/{slug}', [HomeController::class, 'singleblog'])->name('singleblog');

Route::get('/parse-xml', [XMLController::class, 'parseXML']);
Route::get('/import-xml-jobs', [XMLController::class, 'importXmlJobs']);

$b = Page::get()->toArray();
if (isset($b) && !empty($b)) {
    foreach ($b as $r) {
        Route::get('/' . $r['page_slug'], [Homecontroller::class, 'page']);
    }
}

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/send-test-email', function () {
//     Mail::to('davindersingh0833@gmail.com')->send(new TestEmail());
//     return 'Test email sent successfully!';
// });



Route::get('logout', [AuthController::class, 'logout']);
Route::get('admin/logout', [AuthController::class, 'adminLogout']);
Route::post('apply/job/store/{job_id}', [ApplyJobController::class, 'jobs_applied_form'])->name('apply.job.store');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/company-detail/{id}/{name}', [HomeController::class, 'company_detail'])->name('company-detail');
Route::get('/job-detail/{id}', [HomeController::class, 'job_detail'])->name('job-detail');
Route::get('/gust/job/add', [HomeController::class, 'gust_job_add'])->name('gust.job.add');
Route::post('/gust/job/store', [HomeController::class, 'gust_job_store'])->name('gust.job.store');




// Route::get('/', function () {
//     return view('frontend.pages.newhome');
// });
Route::get('/about-us', function () {
    return view('frontend.pages.aboutus');
});
Route::get('/contact-us', function () {
    return view('frontend.pages.contact');
});
Route::post('/contact', [DashboardController::class, 'contact_store'])->name('contact');
Route::get('/employers', function () {
    return view('frontend.pages.employers');
});
Route::get('/weblink', function () {
    return view('frontend.pages.weblink');
});
Route::get('/partners', function () {
    return view('frontend.pages.partners');
});
Route::get('/posting-vacancy', function () {
    return view('frontend.pages.posting_vacancy');
});

Route::get('/browse-job', [CompanyDashboardController::class, 'joblisting'])->name('browse-job');

// Route::get('/browse-job', function () {
//     return view('frontend.jobs.list');
// });

// candidate scrrens

Route::get('candidate/register', function () {
    return view('frontend.auth.register');
})->name('candidate.register');
Route::get('candidate/login', function () {
    return view('frontend.auth.login');
});
Route::post('register/store', [RegisterController::class, 'store'])->name('register.store');
Route::post('candidate/login', [AuthController::class, 'LoginCandidate'])->name('candidate.login');
// CandidateDashbaord
// Route::middleware('Candidate')->prefix('candidate')->name('candidate.')->group(function () {
Route::prefix('candidate')->name('candidate.')->group(function () {
    Route::get('dashboard', [CandidateDashbaord::class, 'index'])->name('dashboard');
    Route::get('profile', [CandidateProfileController::class, 'profile'])->name('profile');
    Route::post('update', [CandidateProfileController::class, 'update'])->name('update');
    Route::post('changepassword', [CandidateProfileController::class, 'changePassword'])->name('changepassword');
    //=========================================================
    Route::get('applyied_jobs', [CandidateDashbaord::class, 'applied_jobs'])->name('applyied_jobs');
    Route::get('alert_jobs', [CandidateDashbaord::class, 'alert_jobs'])->name('alert_jobs');
    Route::get('short_list_candidate', [CandidateDashbaord::class, 'short_list_candidate'])->name('short_list_candidate');
    Route::get('package', [CandidateDashbaord::class, 'package'])->name('package');
    Route::get('delete_account', [CandidateDashbaord::class, 'delete_account'])->name('delete_account');
});

// Reset Password Routes
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendOtp'])->name('password.email');

Route::get('/reset-password', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');








// =============================================Company
Route::get('company/login', function () {
    return view('frontend.auth.company.login');
});
Route::get('company/register', function () {
    return view('frontend.auth.company.register');
})->name('company.register');


// Route::post('company/register', [RegisterController::class, 'companyStore'])->name('company.register');
Route::post('company/login', [AuthController::class, 'CompanyCandidate'])->name('company.login');



Route::middleware('Company')->prefix('company')->name('company.')->group(function () {
    Route::resource('blogs', CompanyBlogController::class);


    Route::get('payment/{id}/{type}', [PaymentController::class, 'showPaymentForm'])->name('payment.form');
    Route::post('payment/{id}/{type}', [PaymentController::class, 'processPayment'])->name('payment.process');


    Route::get('priceing', [BillingController::class, 'index'])->name('priceing');
    Route::get('billing/list', [BillingController::class, 'list'])->name('billing.list');
    Route::middleware('Plans')->group(function () {
        // Route::prefix('company')->name('company.')->group(function () {
        Route::get('dashboard', [CompanyDashboardController::class, 'index'])->name('dashboard');

        // pages
        Route::get('applicant_applyied_jobs', [CompanyDashboardController::class, 'applied_jobs'])->name('applicant_applyied_jobs');
        Route::get('short_list/{apply_id}/{status}', [CompanyDashboardController::class, 'short_list_status_update'])->name('short_list');
        Route::get('profesional_list_candidate', [CompanyDashboardController::class, 'profesional_list_candidate'])->name('profesional_list_candidate');
        Route::get('short_list_candidate', [CompanyDashboardController::class, 'short_list_candidate'])->name('short_list_candidate');
        Route::post('profesional/list', [CompanyDashboardController::class, 'profesinal_list'])->name('profesinal_list');
        Route::get('package', [CompanyDashboardController::class, 'package'])->name('package');
        Route::get('delete_account', [CompanyDashboardController::class, 'delete_account'])->name('delete_account');




        Route::get('job', [JobCompnayController::class, 'index'])->name('job');
        Route::post('job/store', [JobCompnayController::class, 'store'])->name('jobs.store');
        Route::get('job/list', [JobCompnayController::class, 'list'])->name('job.list');
        // =====
        Route::get('job/view/{id}', [JobCompnayController::class, 'view'])->name('job.view');
        Route::get('job/edit/{id}', [JobCompnayController::class, 'edit'])->name('job.edit');
        Route::post('job/update/{id}', [JobCompnayController::class, 'update'])->name('jobs.update');
        Route::get('job/del/{id}', [JobCompnayController::class, 'delete'])->name('job.del');
        Route::post('job/csv/import', [JobCompnayController::class, 'importJobscsv'])->name('job.csv.import');

        Route::post('job/xml/import', [JobCompnayController::class, 'importJobsXml'])->name('job.xml.import');
        Route::post('job/xml/maping', [JobCompnayController::class, 'importJobsXmlmaping'])->name('job.xml.maping');
        Route::get('job/xml/xmllinking', [JobCompnayController::class, 'xmllinking'])->name('job.xml.xmllinking');


        Route::post('job/scrapper', [JobCompnayController::class, 'scrapper'])->name('job.scrapper');
        Route::get('job/scrapper/config', [JobCompnayController::class, 'scrapperConfig'])->name('job.config');
        Route::post('job/scrapper/save', [JobCompnayController::class, 'scrapperConfigSave'])->name('job.config.save');


        // Route::get('dashboard', [CompanyDashboardController::class, 'index'])->name('dashboard');
        Route::get('profile', [CompanyProfileController::class, 'profile'])->name('profile');
        Route::post('update', [CompanyProfileController::class, 'update'])->name('update');
        Route::post('changepassword', [CompanyProfileController::class, 'changePassword'])->name('changepassword');
        // Route::get('job', [JobCompnayController::class, 'index'])->name('job');
        // Route::get('job/list', [JobCompnayController::class, 'list'])->name('job.list');
        // Route::get('jobs/delete/{id}', [JobCompnayController::class, 'delete'])->name('jobs.delete');
        // Route::get('jobs/edit/{id}', [JobCompnayController::class, 'edit'])->name('jobs.edit');
        // Route::post('job/post', [JobCompnayController::class, 'posting'])->name('job.posting');
        // Route::post('job/update/{id}', [JobCompnayController::class, 'update'])->name('job.update');
        // billing_for_company


        // ====================
        Route::get('package', function () {
            return view('company.pages.package');
        });
        Route::get('applicants_jobs', function () {
            return view('company.pages.applicants-jobs');
        });
        Route::get('shortlisted', function () {
            return view('company.pages.shortlisted-candidate');
        });
        Route::get('message', function () {
            return view('company.pages.message');
        });
        Route::get('my_resume', function () {
            return view('company.pages.my-resume');
        });
        Route::get('save_resume', function () {
            return view('company.pages.save-resume');
        });
    });
});



// =============================
Route::get('admin/login', function () {
    return view('auth.login');
});
Route::post('login', [AuthController::class, 'LoginAdmin'])->name('login');

Route::middleware('isAdmin')->prefix('admin')->name('admin.')->group(function () {



    Route::get('/cookie-policy', [CookieController::class, 'index'])->name('cookie');
    Route::resource('blogs', AdminBlogController::class);




    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [AdminProfileController::class, 'index'])->name('profile');
    Route::post('profile/update', [AdminProfileController::class, 'update'])->name('profile.update');
    Route::post('profile/change/password', [AdminProfileController::class, 'changePassword'])->name('profile.change.password');
    // =======================================
    Route::get('cat', [CategeoryController::class, 'index'])->name('cat');
    Route::get('cat/add', [CategeoryController::class, 'add'])->name('cat.add');
    Route::get('cat/edit/{id}', [CategeoryController::class, 'edit'])->name('cat.edit');
    Route::post('cat/update/{id}', [CategeoryController::class, 'update'])->name('category.update');
    Route::post('cat/store', [CategeoryController::class, 'store'])->name('category.store');
    Route::get('cat/delete/{id}', [CategeoryController::class, 'delete'])->name('category.delete');
    //    ===============================
    Route::get('type', [JobTypeController::class, 'index'])->name('type');
    Route::get('type/add', [JobTypeController::class, 'add'])->name('type.add');
    Route::get('type/edit/{id}', [JobTypeController::class, 'edit'])->name('type.edit');
    Route::post('type/update/{id}', [JobTypeController::class, 'update'])->name('type.update');
    Route::post('type/store', [JobTypeController::class, 'store'])->name('type.store');
    Route::get('type/delete/{id}', [JobTypeController::class, 'delete'])->name('type.delete');

    //    ===============================
    Route::get('qual', [QualificationController::class, 'index'])->name('qual');
    Route::get('qual/add', [QualificationController::class, 'add'])->name('qual.add');
    Route::get('qual/edit/{id}', [QualificationController::class, 'edit'])->name('qual.edit');
    Route::post('qual/update/{id}', [QualificationController::class, 'update'])->name('qual.update');
    Route::post('qual/store', [QualificationController::class, 'store'])->name('qual.store');
    Route::get('qual/delete/{id}', [QualificationController::class, 'delete'])->name('qual.delete');


    //    ============job level===================
    Route::get('joblevel', [JobLevelController::class, 'index'])->name('joblevel');
    Route::get('joblevel/add', [JobLevelController::class, 'add'])->name('joblevel.add');
    Route::get('joblevel/edit/{id}', [JobLevelController::class, 'edit'])->name('joblevel.edit');
    Route::post('joblevel/update/{id}', [JobLevelController::class, 'update'])->name('joblevel.update');
    Route::post('joblevel/store', [JobLevelController::class, 'store'])->name('joblevel.store');
    Route::get('joblevel/delete/{id}', [JobLevelController::class, 'delete'])->name('joblevel.delete');


    //    ============job level===================
    Route::get('exp', [JobExperinceController::class, 'index'])->name('exp');
    Route::get('exp/add', [JobExperinceController::class, 'add'])->name('exp.add');
    Route::get('exp/edit/{id}', [JobExperinceController::class, 'edit'])->name('exp.edit');
    Route::post('exp/update/{id}', [JobExperinceController::class, 'update'])->name('exp.update');
    Route::post('exp/store', [JobExperinceController::class, 'store'])->name('exp.store');
    Route::get('exp/delete/{id}', [JobExperinceController::class, 'delete'])->name('exp.delete');

    //    ============job level===================
    Route::get('skill', [SkillsController::class, 'index'])->name('skill');
    Route::get('skill/add', [SkillsController::class, 'add'])->name('skill.add');
    Route::get('skill/edit/{id}', [SkillsController::class, 'edit'])->name('skill.edit');
    Route::post('skill/update/{id}', [SkillsController::class, 'update'])->name('skill.update');
    Route::post('skill/store', [SkillsController::class, 'store'])->name('skill.store');
    Route::get('skill/delete/{id}', [SkillsController::class, 'delete'])->name('skill.delete');

    //    ============plans===================
    Route::get('plan/add', [PlanController::class, 'index'])->name('plan.add');
    Route::get('plan/edit/{id}', [PlanController::class, 'edit'])->name('plan.edit');
    Route::get('plan/del/{id}', [PlanController::class, 'del'])->name('plan.del');
    Route::get('plan/list', [PlanController::class, 'list'])->name('plan.list');
    Route::post('plan/store', [PlanController::class, 'store'])->name('plan.store');
    Route::post('plan/update/{id}', [PlanController::class, 'update'])->name('plan.update');
    //    ============Company List===================
    Route::get('company/list', [DashboardController::class, 'companyList'])->name('company.list');
    Route::get('candidate/list', [DashboardController::class, 'candidate_list'])->name('candidate.list');
    Route::get('job/list', [DashboardController::class, 'JobList'])->name('job.list');
    //    ============gust job===================
    Route::get('gust/job/list', [DashboardController::class, 'gustJobList'])->name('gust.job.list');
    Route::get('gust/job/status/{id}/{status}', [DashboardController::class, 'jobstatus'])->name('gust.job.status');

    //pages
    Route::get('pages/add', [PageController::class, 'index'])->name('pages.add');
    Route::get('pages/edit/{id}', [PageController::class, 'edit'])->name('pages.edit');
    Route::get('pages/del/{id}', [PageController::class, 'del'])->name('pages.del');
    Route::post('pages/store', [PageController::class, 'store'])->name('pages.store');
    Route::post('pages/update/{id}', [PageController::class, 'update'])->name('pages.update');
    Route::get('pages/list', [PageController::class, 'list'])->name('pages.list');

    Route::resource('menus', MenuController::class);
    Route::resource('footer/menus', FooterMenuController::class)->names([
        'index' => 'footer.menus.index',
        'create' => 'footer.menus.create',
        'store' => 'footer.menus.store',
        'show' => 'footer.menus.show',
        'edit' => 'footer.menus.edit',
        'update' => 'footer.menus.update',
        'destroy' => 'footer.menus.destroy',
    ]);

    //pages
    Route::get('hoempage/sections', [HomePageController::class, 'index'])->name('homepages.sections');
    Route::post('hoempage/store', [HomePageController::class, 'store'])->name('homepages.store');
    //Home page City Section
    Route::get('hoempage/city/section/list', [HomePageCityController::class, 'list'])->name('hoempage.city.section.list');
    Route::get('hoempage/city/section', [HomePageCityController::class, 'index'])->name('hoempage.city.section');
    Route::post('hoempage/city/store', [HomePageCityController::class, 'store'])->name('hoempage.city.store');
    Route::get('hoempage/city/edit/{id}', [HomePageCityController::class, 'edit'])->name('hoempage.city.edit');
    Route::get('hoempage/city/delete/{id}', [HomePageCityController::class, 'delete'])->name('hoempage.city.delete');
    Route::post('hoempage/city/update/{id}', [HomePageCityController::class, 'update'])->name('hoempage.city.update');


    //Home page Company Logo
    Route::get('hoempage/company/logo/list', [HomePageCompanyLogoController::class, 'list'])->name('hoempage.company.logo.list');
    Route::get('hoempage/company/logo', [HomePageCompanyLogoController::class, 'index'])->name('hoempage.company.logo');
    Route::post('hoempage/company/store', [HomePageCompanyLogoController::class, 'store'])->name('hoempage.company.store');
    Route::get('hoempage/company/edit/{id}', [HomePageCompanyLogoController::class, 'edit'])->name('hoempage.company.edit');
    Route::get('hoempage/company/delete/{id}', [HomePageCompanyLogoController::class, 'delete'])->name('hoempage.company.delete');
    Route::post('hoempage/company/update/{id}', [HomePageCompanyLogoController::class, 'update'])->name('hoempage.company.update');






    // =================================================================
    Route::get('setting', [Settingcontroller::class, 'index'])->name('setting');
    Route::post('setting/store', [Settingcontroller::class, 'store'])->name('setting.store');
});
Route::get('job/apply/{job_id}', [ApplyJobController::class, 'apply_jobs'])->name('job.apply');
// Route::get('job/apply/{company_id}', [ApplyJobController::class, 'single_job'])->name('job.apply');




// by plan withour registeration 
Route::get('byplan/{id}/{type}', function ($id, $type) {
    return view('frontend.auth.plan.register', ['plan_id' => $id, 'type' => $type]);
})->name('byplan');

Route::post('byplan/store/{plan_id}/{type}', [RegisterController::class, 'byplanStore'])->name('byplan.store');

Route::get('byplanpayment/{userid}/{plan_id}/{type}', [RegisterController::class, 'byplanPayment'])->name('byplan.payment');
Route::post('payment/store/{user_id}/{plan_id}/{type}', [PaymentController::class, 'processPaymentwithoutLogin'])->name('payment.store');
