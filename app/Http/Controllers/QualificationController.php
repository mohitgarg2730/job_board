<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qualification;
class QualificationController extends Controller
{
    public function index()
    {
         $c = Qualification::orderby('name')->paginate(10);
         return view('admin.qual.list',['c'=>$c]);

    }
    public function add()
    {
     return view('admin.qual.form');
    }
    public function edit($id)
    {
        $c = Qualification::find($id);

     return view('admin.qual.form',['c'=>$c]);
    }
    public function delete($id)
    {
        $c = Qualification::find($id)->delete();

        return redirect('admin/qual')->with('s','Deleted successfully');;
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            ['name' => 'required']
        );

        $c = new Qualification;
        $c->name = $data['name'];
        $c->save();
        return redirect('admin/qual')->with('s','Added successfully');;
    }
    public function update(Request $request,$id)
    {
        $data = $request->validate(
            ['name' => 'required']
        );

        $c = Qualification::find($id);
        $c->name = $data['name'];
        $c->save();
        return redirect('admin/qual')->with('s','updated successfully');;
    }
}
