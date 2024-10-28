<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomePage;
class HomePageController extends Controller
{
    //
    public function index()
    {
        $hh = HomePage::where('id', 1)->first();

        return view('admin.page.homepage.form',['h'=>$hh]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'banner' => 'nullable',
            'heading_one' => 'required|string|max:255',
            'heading_two' => 'nullable|string|max:255',
            'left_img' => 'nullable',
            'conten_section_2' => 'nullable|string',
            'content1_section_3' => 'nullable|string',
            'content2_section_3' => 'nullable|string',
            'content3_section_3' => 'nullable|string',
            'section_2_heading_one' => 'nullable|string',
            'heading_one_section_3' => 'nullable|string',
            // =============================
          
            'job_section_heading' => 'nullable|string',
            'job_section_sub_heading' => 'nullable|string',
            'cat_section_heading' => 'nullable|string',
            'cat_section_sub_heading' => 'nullable|string',
            'city_section_heading' => 'nullable|string',
            'city_section_sub_heading' => 'nullable|string',
            'company_section_heading' => 'nullable|string',
            'company_section_sub_heading' => 'nullable|string',
            'plans_section_heading' => 'nullable|string',
            'plans_section_sub_heading' => 'nullable|string',
            'steps_section_heading' => 'nullable|string',
            'steps_section_sub_heading' => 'nullable|string',
            
        ]);

        $data = $request->all();
        if ($request->hasFile('banner')) {

            $resume = time() . '_' . $data['banner']->getClientOriginalName();
            $data['banner']->move(public_path('banner'), $resume);
            $data['banner']= 'banner/'.$resume;
        }
        if ($request->hasFile('left_img')) {
            $resume = time() . '_' . $data['left_img']->getClientOriginalName();
            $data['left_img']->move(public_path('banner'), $resume);
            $data['left_img']= 'banner/'.$resume;
        }
      
        $hh = HomePage::where('id', 1)->first();
    
        if(!empty($hh))
        {
            unset($data['_token']);

            HomePage::where('id',1)->update($data);
    
        }
        else
        {
            HomePage::create($data);
       
        }
        
        
       

        return redirect('admin/hoempage/sections')->with('e', 'updated');

    }
}
