<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobType;

class JobTypeController extends Controller
{
    public function index()
    {
         $c = JobType::orderby('name')->paginate(10);
         return view('admin.type.list',['c'=>$c]);

    }
    public function add()
    {
     return view('admin.type.form');
    }
    public function edit($id)
    {
        $c = JobType::find($id);

     return view('admin.type.form',['c'=>$c]);
    }
    public function delete($id)
    {
        $c = JobType::find($id)->delete();

        return redirect('admin/type')->with('s','Deleted successfully');;
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            ['name' => 'required']
        );

        $c = new JobType;
        $c->name = $data['name'];
        $c->save();
        return redirect('admin/type')->with('s','Added successfully');;
    }
    public function update(Request $request,$id)
    {
        $data = $request->validate(
            ['name' => 'required']
        );

        $c = JobType::find($id);
        $c->name = $data['name'];
        $c->save();
        return redirect('admin/type')->with('s','updated successfully');;
    }


}
