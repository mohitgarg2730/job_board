<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobLevel;
class JobLevelController extends Controller
{
    public function index()
    {
         $c = JobLevel::orderby('name')->paginate(10);
         return view('admin.joblevel.list',['c'=>$c]);

    }
    public function add()
    {
     return view('admin.joblevel.form');
    }
    public function edit($id)
    {
        $c = JobLevel::find($id);

     return view('admin.joblevel.form',['c'=>$c]);
    }
    public function delete($id)
    {
        $c = JobLevel::find($id)->delete();

        return redirect('admin/joblevel');
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            ['name' => 'required']
        );

        $c = new JobLevel;
        $c->name = $data['name'];
        $c->save();
        return redirect('admin/joblevel')->with('s','Added successfully');;
    }
    public function update(Request $request,$id)
    {
        $data = $request->validate(
            ['name' => 'required']
        );

        $c = JobLevel::find($id);
        $c->name = $data['name'];
        $c->save();
        return redirect('admin/joblevel')->with('s','updated successfully');;
    }
}
