<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categeory;

class CategeoryController extends Controller
{
    //

    public function index()
    {
        $c = Categeory::orderby('cat_name')->paginate(10);
        return view('admin.cat.list', ['c' => $c]);

    }
    public function add()
    {
        return view('admin.cat.form');
    }
    public function edit($id)
    {
        $c = Categeory::find($id);

        return view('admin.cat.form', ['c' => $c]);
    }
    public function delete($id)
    {
        $c = Categeory::find($id)->delete();

        return redirect('admin/cat');
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'cat_name' => 'required',
                'cat_img' => '',

            ]
        );

        $c = new Categeory;
        if ($request->hasFile('cat_img')) {

            $profile_picture = time() . '_' . $data['cat_img']->getClientOriginalName();
            $data['cat_img']->move(public_path('cat_img'), $profile_picture);
            $data['cat_img'] = 'cat_img/' . $profile_picture;



        }


        $c->cat_name = $data['cat_name'];
        $c->cat_img = $data['cat_img'];
        $c->save();
        return redirect('admin/cat')->with('s','Added successfully');
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'cat_name' => 'required',
                'cat_img' => '',

            ]
        );

        $c = Categeory::find($id);

        if ($request->hasFile('cat_img')) {

            $profile_picture = time() . '_' . $data['cat_img']->getClientOriginalName();
            $data['cat_img']->move(public_path('cat_img'), $profile_picture);
            $data['cat_img'] = 'cat_img/' . $profile_picture;
            $c->cat_img = $data['cat_img'];



        }
        $c->cat_name = $data['cat_name'];
        $c->save();

        
        return redirect('admin/cat')->with('s','Added successfully');
    }
}
