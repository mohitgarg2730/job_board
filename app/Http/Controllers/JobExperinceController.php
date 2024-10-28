<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobExperince;

class JobExperinceController extends Controller
{
    public function index()
    {
         $c = JobExperince::orderby('name')->paginate(10);
         return view('admin.experince.list',['c'=>$c]);

    }
    public function add()
    {
     return view('admin.experince.form');
    }
    public function edit($id)
    {
        $c = JobExperince::find($id);

     return view('admin.experince.form',['c'=>$c]);
    }
    public function delete($id)
    {
        $c = JobExperince::find($id)->delete();

        return redirect('admin/exp');
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            ['name' => 'required']
        );

        $c = new JobExperince;
        $c->name = $data['name'];
        $c->save();
        return redirect('admin/exp')->with('s','Added successfully');;
    }
    public function update(Request $request,$id)
    {
        $data = $request->validate(
            ['name' => 'required']
        );

        $c = JobExperince::find($id);
        $c->name = $data['name'];
        $c->save();
        return redirect('admin/exp')->with('s','updated successfully');;
    }}
