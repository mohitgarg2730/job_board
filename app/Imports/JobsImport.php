<?php

namespace App\Imports;

use App\Models\Job;
use App\Models\Categeory;
use App\Models\JobType;
use App\Models\Qualification;
use App\Models\JobLevel;
use App\Models\JobExperince;
use App\Models\Skills;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class JobsImport implements ToModel,WithStartRow
{

    protected $fillable = [
        'job_title',
        'job_description',
        'job_category_id',
        'job_type_id',
        'job_level_id',
        'experience_id',
        'qualification_id',
        'gender',
        'min_salary',
        'max_salary',
        'job_expiry_date',
        'job_fee_type_id',
        'skills',
        'address',
        'country_id',
        'city_id',
        'user_id',
        'approved_by_admin',
    ];
       protected $errors = [];

    public function startRow(): int
    {
        return 2; // Start importing from the second row
    }

    public function model(array $row)
    {
        // try {
        $formattedDate = $this->formatDate($row[10]);

        $c = Categeory::select('id')->where('cat_name', $row[2])->first();
        $jt = JobType::select('id')->where('name', $row[3])->first();
        $jl = JobLevel::select('id')->where('name', $row[4])->first();
        $e = JobExperince::select('id')->where('name', $row[5])->first();
        $q = Qualification::select('id')->where('name', $row[6])->first();
        $skills = "";
        if (!empty($row[12])) {

            $str = $row[12];


            foreach (explode(",", $str) as $key => $ski) {

                $s = Skills::where('name', $ski)->first();

                if (!empty($s)) {
                    $skills .= $s->id;

                    if ($key != 1) {


                        $skills .= ',';
                    }
                }
            }
        }

        return new Job([
            'job_title'        => $row[0],
            'job_description'  => $row[1],
            'job_category_id'  => $c->id,
            'job_type_id'      => $jt->id,
            'job_level_id'     => $jl->id,
            'experience_id'    => $e->id,
            'qualification_id' => $q->id,
            'gender'           => $row[7],
            'min_salary'       => (int)$row[8],
            'max_salary'       => (int)$row[9],
            'job_expiry_date'  => $formattedDate,
            'job_fee_type_id'  => $row[11],
            'skills'           => $skills,
            'address'          => $row[13],
            'country_id'       => $row[14],
            'city_id'          => $row[15],
            'user_id'          => Auth::id(),
            'approved_by_admin'          => 1,
        ]);
        // } catch (\Exception $e) {
        //     $this->errors[] = $e->getMessage() . ' at row ' . json_encode($row);
        //     return null;
        // }
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    private function formatDate($date)
    {
        try {
            return Carbon::parse($date)->format('Y-m-d');
        } catch (\Exception $e) {
            return null; // or handle the exception as needed
        }
    }
}
