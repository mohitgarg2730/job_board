<?php

// app/Models/Job.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Job extends Model
{
    use HasFactory;
    protected $table = 'jobs'; // Set your table name here

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
        'zip_code',
        'company_logo',
        'user_id',
        'approved_by_admin',
        'pin_to_top',
        'mark_a_featured',
        'stripe_id',
        'location',
        'link',
        'is_scrapper_job',
        'candidate_applied_by',
        'job_apply_email',
        'job_apply_link',


    ];


    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function cat()
    {
        return $this->hasOne(Categeory::class, 'id', 'job_category_id');
    }
    public function types()
    {
        return $this->hasOne(JobType::class, 'id', 'job_type_id');
    }
    public function levels()
    {
        return $this->hasOne(JobLevel::class, 'id', 'job_level_id');
    }
    public function qual()
    {
        return $this->hasOne(Qualification::class, 'id', 'qualification_id');
    }

}
