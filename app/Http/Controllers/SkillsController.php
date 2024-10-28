<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skills;
class SkillsController extends Controller
{
    public function index()
    {
         $c = Skills::orderby('name')->paginate(10);
         return view('admin.skill.list',['c'=>$c]);

    }
    public function add()
    {
     return view('admin.skill.form');
    }
    public function edit($id)
    {
        $c = Skills::find($id);

     return view('admin.skill.form',['c'=>$c]);
    }
    public function delete($id)
    {
        $c = Skills::find($id)->delete();

        return redirect('admin/skill')->with('s','deleted successfully');;
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            ['name' => 'required']
        );

        $c = new Skills;
        $c->name = $data['name'];
        $c->save();
        return redirect('admin/skill')->with('s','Added successfully');;
    }
    public function update(Request $request,$id)
    {
        $data = $request->validate(
            ['name' => 'required']
        );

        $c = Skills::find($id);
        $c->name = $data['name'];
        $c->save();
        return redirect('admin/skill')->with('s','updated successfully');;
    }
}
