<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    use HasFactory;
    protected $table="home_page_section";
      protected $fillable = [
        'heading_one',
        'heading_two',
        'section_2_heading_one',
        'conten_section_2',
        'heading_one_section_3',
        'content1_section_3',
        'content2_section_3',
        'content3_section_3',
        'banner',
        'left_img',
        'job_section_heading',
        'job_section_sub_heading',
        'cat_section_heading',
        'cat_section_sub_heading',
        'city_section_heading',
        'city_section_sub_heading',
        'company_section_heading',
        'company_section_sub_heading',
        'plans_section_heading',
        'plans_section_sub_heading',
        'steps_section_heading',
        'steps_section_sub_heading',
       

    
    ];

}
