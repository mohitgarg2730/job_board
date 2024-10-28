<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use App\Imports\JobsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Categeory;
use App\Models\JobType;
use App\Models\Qualification;
use App\Models\JobLevel;
use App\Models\JobExperince;
use App\Models\Skills;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Mail\JobAddedNotification;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobDeletedNotification;

class JobCompnayController extends Controller
{
    //

    public function list()
    {
        $user = Auth::user();
        $jobs = Job::where('user_id', $user->id)->orderBy('id', 'DESC')->paginate(10);


        return view('company.jobs.table', ['jobs' => $jobs]);
    }

    public function index()
    {
        return view('company.jobs.index');
    }
    public function edit($id)
    {
        $job = Job::where('id', $id)->first();

        return view('company.jobs.index', ['job' => $job]);
    }
    public function view($id)
    {
        $job = Job::where('id', $id)->first();

        return view('company.jobs.view', ['job' => $job]);
    }
    public function scrapper(Request $request)
    {
        // Initialize cURL session
        $curl = curl_init();

        // Set the cURL options
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://139.59.147.131:3000/scrape-jobs',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode([
                "url" => $request->input('url')
            ]),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Cookie: PHPSESSID=ec3f95k85e8q38p39liuogkf3c; mage-messages=%5B%7B%22type%22%3A%22error%22%2C%22text%22%3A%22Invalid%20Form%20Key.%20Please%20refresh%20the%20page.%22%7D%5D; private_content_version=7bf5fbd2e380da56a3d5baf26d88ee82; searchReport-log=0'
            ),
        ));

        // Execute the cURL request and capture the response
        $response = curl_exec($curl);

        // Handle any cURL errors
        if (curl_errno($curl)) {
            echo 'cURL error: ' . curl_error($curl);
        } else {
            $data = json_decode($response, true);
            // echo"<pre>";
            // print_r($data);

            // die;

            if (!empty($data)) {
                Session::put('scraper_jobs', (array) $data); // You don't need to store $attributes separately
                return redirect()->route('company.job.config');
            }
        }
        // return redirect()->route('company.job.list')->with('e', 'Something went wrong please try again later ');
    }

    public function scrapperConfig()
    {

        $j =  Session::get('scraper_jobs'); // You don't need to store $attributes separately

        return view('company.scrapper.configration', ['jobs' => $j]);
    }
    public function scrapperConfigSave(Request $request)
    {
        $formData = $request->validate([
            'filter_with_title' => 'nullable|string',
            'filter_with_cat' => 'nullable|string',
            'filter_with_location' => 'nullable|string',
            'filter_with_employmentType' => 'nullable|string',
        ]);

        // Retrieve scrapped jobs from session
        $jobs = Session::get('scraper_jobs', []);

        foreach ($jobs as $d) {
            $titleMatch = ($formData['filter_with_title'] === 'all' || $formData['filter_with_title'] === $d['title']);
            $catMatch = ($formData['filter_with_cat'] === 'all' || $formData['filter_with_cat'] === $d['discipline']);
            $filter_with_location = ($formData['filter_with_location'] === 'all' || $formData['filter_with_location'] === $d['location']);
            $filter_with_employmentType = ($formData['filter_with_employmentType'] === 'all' || $formData['filter_with_employmentType'] === $d['employmentType']);



            // Only save the job if it matches both filters
            if ($titleMatch && $catMatch) {
                $this->scrapperJobsSavee($d);
            } elseif ($filter_with_location) {
                $this->scrapperJobsSavee($d);
            } elseif ($filter_with_employmentType) {
                $this->scrapperJobsSavee($d);
            }
        }

        return redirect()->route('company.job.list')->with('s', 'Uploaded successfully');
    }

    private function scrapperJobsSavee($d)
    {
        $user = Auth::user();

        $validatedData = [
            'user_id' => $user->id,
            'approved_by_admin' => true,
            'job_title' => $d['title'],
            'job_description' => $d['title'],
            'location' => $d['location'],
            'address' => $d['location'],
            'job_category_id' => 0,
            'job_level_id' => 0,
            'experience_id' => 0,
            'qualification_id' => 0,
            'gender' => 0,
            'min_salary' => 0,
            'max_salary' => 0,
            'job_expiry_date' => date('Y-m-d'), // Better date format
            'job_fee_type_id' => 0,
            'skills' => 0,
            'link' => $d['link'],
            'is_scrapper_job' => 1,
            'job_type_id' => 0,
        ];

        // Fetch job type and category if available
        $type = JobType::where('name', 'LIKE', '%' . $d['employmentType'] . '%')->first();
        $cat = Categeory::where('cat_name', 'LIKE', '%' . $d['discipline'] . '%')->first();

        if ($type) {
            $validatedData['job_type_id'] = $type->id;
        }
        if ($cat) {
            $validatedData['job_category_id'] = $cat->id;
        }
        $j = Job::create($validatedData);
        Mail::to(Auth::user()->email)->send(new JobAddedNotification($j));

        return $j;
    }


    public function delete($id)
    {
        $job = Job::where('id', $id)->delete();




    Mail::to(Auth::user()->email)->send(new JobDeletedNotification());

        return redirect()->route('company.job.list')->with('s', 'Job Deleted Successfully.');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'job_title' => 'required|string|max:255',
            'job_description' => 'required|string',
            'job_category_id' => 'required|integer',
            'job_type_id' => 'required|integer',
            'job_level_id' => 'required|integer',
            'experience_id' => 'required|integer',
            'qualification_id' => 'required|integer',
            'gender' => 'required|string',
            'min_salary' => 'required|integer',
            'max_salary' => 'required|integer',
            'job_expiry_date' => 'required|date',
            'job_fee_type_id' => 'required',
            'skills' => 'required',
            'address' => 'required|string',
            'country_id' => 'required',
            'city_id' => 'required',
            'company_logo' => '',
            'mark_a_featured' => '',
            'pin_to_top' => '',
            'candidate_applied_by' => '',
            'job_apply_email' => '',
            'job_apply_link' => '',
        ]);



        if ($request->hasFile('company_logo')) {
            $profile_picture = time() . '_' . $validatedData['company_logo']->getClientOriginalName();
            $validatedData['company_logo']->move(public_path('company_logo'), $profile_picture);
            $validatedData['company_logo']  = 'company_logo/' . $profile_picture;
        }


        $user = Auth::user();

        $validatedData['user_id'] = $user->id;
        $validatedData['approved_by_admin'] = true;


        $skills = "";
        if (!empty($validatedData['skills'])) {
            foreach ($validatedData['skills'] as $key => $ski) {
                $skills .= $ski;

                if ($key != 1) {
                    $skills .= ',';
                }
            }

            $validatedData['skills'] = $skills;
        }
        $mark_a_featured = 0;
        if (isset($validatedData['mark_a_featured']) && !empty($validatedData['mark_a_featured'])) {
            $mark_a_featured = 1;
        }
        $validatedData['mark_a_featured'] = $mark_a_featured;

        $pin_to_top = 0;
        if (isset($validatedData['pin_to_top']) && !empty($validatedData['mark_a_featured'])) {
            $pin_to_top = 1;
        }
        $validatedData['pin_to_top'] = $pin_to_top;

       $j = Job::create($validatedData);
        Mail::to(Auth::user()->email)->send(new JobAddedNotification($j));

        return redirect()->route('company.job.list')->with('s', 'Job posted Successfully.');
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'job_title' => 'required|string|max:255',
            'job_description' => 'required|string',
            'job_category_id' => 'required|integer',
            'job_type_id' => 'required|integer',
            'job_level_id' => 'required|integer',
            'experience_id' => 'required|integer',
            'qualification_id' => 'required|integer',
            'gender' => 'required|string',
            'min_salary' => 'required|integer',
            'max_salary' => 'required|integer',
            'job_expiry_date' => 'required|date',
            'job_fee_type_id' => 'required',
            'skills' => 'required',
            'address' => 'required|string',
            'country_id' => 'required',
            'city_id' => 'required',
            'company_logo' => '',
            'mark_a_featured' => '',
            'pin_to_top' => '',
            'candidate_applied_by' => '',
            'job_apply_email' => '',
            'job_apply_link' => '',
        ]);
        if ($request->hasFile('company_logo')) {

            $profile_picture = time() . '_' . $validatedData['company_logo']->getClientOriginalName();
            $validatedData['company_logo']->move(public_path('company_logo'), $profile_picture);
            $validatedData['company_logo'] = 'company_logo/' . $profile_picture;
        }
        $user = Auth::user();

        $validatedData['user_id'] = $user->id;


        $skills = "";
        if (!empty($validatedData['skills'])) {
            foreach ($validatedData['skills'] as $key => $ski) {
                $skills .= $ski;

                if ($key != 1) {
                    $skills .= ',';
                }
            }

            $validatedData['skills'] = $skills;
        }
        $mark_a_featured = 0;
        if (isset($validatedData['mark_a_featured']) && !empty($validatedData['mark_a_featured'])) {
            $mark_a_featured = 1;
        }
        $validatedData['mark_a_featured'] = $mark_a_featured;

        $pin_to_top = 0;
        if (isset($validatedData['pin_to_top']) && !empty($validatedData['mark_a_featured'])) {
            $pin_to_top = 1;
        }
        $validatedData['pin_to_top'] = $pin_to_top;

        Job::where('id', $id)->update($validatedData);

        return redirect()->route('company.job.list')->with('s', 'Job posted Successfully.');
    }




    public function importJobscsv(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt',
        ]);


        Excel::import(new JobsImport, $request->file('file'));

        return back()->with('s', 'Jobs imported Successfully.');
    }



    public function importJobsXml(Request $request)
    {

        // Validate the XML file input
        $request->validate([
            'xml_file' => 'required',
        ]);

        // Load the XML file
        $xmlFilePath = $request->file('xml_file')->getRealPath();
        $xml = simplexml_load_file($xmlFilePath);

        // Check if XML is loaded successfully
        if ($xml === false) {
            return back()->withErrors('Error loading XML file.');
        }

        $jobss = [];
        $attributes = [];
        foreach ($xml->job as $key => $record) {

            if ($key != 0) {
                // $attributes = (array) $record->Row->attributes(); // 
                $jobss[$key][] =  (array) $record;
            }
        }
        foreach ($xml->job as $key => $record) {
            // $attributes = (array) $record->Row->attributes(); // 
            if ($key != 0) {
                $i = 0;
                foreach ((array)$xml->job as $keyy => $record) {
                    $attributes[$i] = $keyy;
                    $i++;
                }
                break;
            }
        }


        Session::put('jobss', (array) $jobss); // You don't need to store $attributes separately
        Session::put('attributes', (array) $attributes); // You don't need to store $attributes separately

        return redirect()->route('company.job.xml.xmllinking');
    }


    private function getCategoryId($categoryName)
    {

        $c = Categeory::where('cat_name', '%LIKE%', $categoryName)->first();
        if (!empty($c)) {
            return $c->id;
        }

        return 0;
    }

    private function getJobTypeId($jobType)
    {
        $c = JobType::where('name', '%LIKE%', $jobType)->first();
        if (!empty($c)) {
            return $c->id;
        }

        return 0;
    }

    private function getJobLevelId($jobLevel)
    {
        $c = JobLevel::where('name', '%LIKE%', $jobLevel)->first();
        if (!empty($c)) {
            return $c->id;
        }

        return 0;
    }

    private function getExperienceId($experience)
    {
        $c = JobExperince::where('name', '%LIKE%', $experience)->first();
        if (!empty($c)) {
            return $c->id;
        }

        return 0;
    }

    private function getQualificationId($qualification)
    {
        $c = Qualification::where('name', '%LIKE%', $qualification)->first();
        if (!empty($c)) {
            return $c->id;
        }

        return 0;
    }

    private function getFeeTypeId($feeType)
    {
        $c = JobType::where('name', '%LIKE%', $feeType)->first();
        if (!empty($c)) {
            return $c->id;
        }

        return 0;
    }

    private function getCountryId($countryName)
    {


        return 0;
    }

    private function getCityId($cityName)
    {
        // $c = JobType::where('name', '%LIKE%', $cityName)->first();
        // if (!empty($c)) {
        //     return $c->id;
        // }

        return 0;
    }


    public function xmllinking()
    {
        $columns = DB::getSchemaBuilder()->getColumnListing('jobs');

        $attributes = Session::get('attributes');

        $c = [
            ['name' => 'job_title', 'display_name' => 'Job Title'],
            ['name' => 'job_description', 'display_name' => 'Job Description'],
            ['name' => 'job_category_id', 'display_name' => 'Category'],
            ['name' => 'job_type_id', 'display_name' => 'Job Type'],
            ['name' => 'job_level_id', 'display_name' => 'Job Level'],
            ['name' => 'experience_id', 'display_name' => 'Experiences'],
            ['name' => 'qualification_id', 'display_name' => 'Qualification'],
            ['name' => 'gender', 'display_name' => 'Gender'],
            ['name' => 'job_fee_type_id', 'display_name' => 'Job Fee Type'],
            ['name' => 'skills', 'display_name' => 'Skills'],
            ['name' => 'address', 'display_name' => 'Address'],
            ['name' => 'country_id', 'display_name' => 'Country'],
            ['name' => 'city_id', 'display_name' => 'City'],
        ];
        return view('company.xml.xmllinkingform', ['c' => $c, 'attributes' => $attributes]);
    }




    public function importJobsXmlmaping(Request $request)
    {
        $data = $request->validate(['attributes' => '']);
        $jobs =  Session::get('jobss');
        foreach ($jobs['job'] as $key => $record) {
            if ($key != 0) {
                $insertData = [];
                foreach ($data['attributes'] as $kr) {
                    if ($kr['data_base_filed'] == 'job_category_id') {
                        $insertData[$kr['data_base_filed']] =  $this->getCategoryId($record[$kr['xml_atribute']]);
                    } elseif ($kr['data_base_filed'] == 'job_level_id') {
                        $insertData[$kr['data_base_filed']] =  $this->getJobLevelId($record[$kr['xml_atribute']]);
                    } elseif ($kr['data_base_filed'] == 'job_type_id') {
                        $insertData[$kr['data_base_filed']] =  $this->getJobTypeId($record[$kr['xml_atribute']]);
                    } elseif ($kr['data_base_filed'] == 'experience_id') {
                        $insertData[$kr['data_base_filed']] =  $this->getExperienceId($record[$kr['xml_atribute']]);
                    } elseif ($kr['data_base_filed'] == 'qualification_id') {
                        $insertData[$kr['data_base_filed']] =  $this->getQualificationId($record[$kr['xml_atribute']]);
                    } elseif ($kr['data_base_filed'] == 'job_fee_type_id') {
                        $insertData[$kr['data_base_filed']] =  $this->getFeeTypeId($record[$kr['xml_atribute']]);
                    } elseif ($kr['data_base_filed'] == 'country_id') {
                        $insertData[$kr['data_base_filed']] =  $this->getCountryId($record[$kr['xml_atribute']]);
                    } elseif ($kr['data_base_filed'] == 'city_id') {
                        $insertData[$kr['data_base_filed']] =  $this->getCityId($record[$kr['xml_atribute']]);
                    } else {
                        $date = $record['jobExpirationDate'];

                        $formattedDate = date('Y-m-d', strtotime($date));

                        $insertData['job_expiry_date'] = $formattedDate;

                        $insertData['max_salary'] = empty($record['maxSalary']) ? 0 : (int) $record['maxSalary'];
                        $insertData['min_salary'] = empty($record['minSalary']) ? 0 : (int) $record['minSalary'];




                        $insertData['user_id'] =   Auth::id();

                        $insertData[$kr['data_base_filed']] = isset($record[$kr['xml_atribute']]) && !empty($record[$kr['xml_atribute']]) ? $record[$kr['xml_atribute']] : null;
                    }
                }
                $j =  Job::create($insertData);


                Mail::to(Auth::user()->email)->send(new JobAddedNotification($j));
            }
        }
        return redirect()->route('company.job.list')->with('s', 'imported');
    }








    private function formatDate($date)
    {
        try {
            return \Carbon\Carbon::parse($date)->format('Y-m-d');
        } catch (\Exception $e) {
            return null;
        }
    }
}
