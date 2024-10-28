<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomePageCity;
use App\Models\HomePageCompanyLogo;

class HomePageCompanyLogoController extends Controller
{
    //
    public function index()
    {
        return view('admin.page.homepage.company.form');
    }
    public function edit($id)
    {
        $home = HomePageCompanyLogo::find($id);

        return view('admin.page.homepage.company.form', ['page' => $home]);
    }
    public function delete($id)
    {
        $home = HomePageCompanyLogo::find($id);
        $home->delete();

        return redirect()->route('admin.hoempage.company.logo.list')->with('s', 'Deleted successfully!');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image validation: required, image type, and size limit
            'name' => 'required|string|max:255', // Name validation: required, string, max length 255
            'url' => 'required|url|max:255', // URL validation: required, valid URL, max length 255
        ]);




        $home = new HomePageCompanyLogo();
        $home->name = $validatedData['name'];
        $home->url = $validatedData['url'];
        if ($request->hasFile('img')) {

            $profile_picture = time() . '_' . $validatedData['img']->getClientOriginalName();
            $validatedData['img']->move(public_path('img'), $profile_picture);
            $home->img = 'img/' . $profile_picture;



        }
        $home->save();

        // Redirect or return response
        return redirect()->route('admin.hoempage.company.logo.list')->with('s', 'Form submitted successfully!');

    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image validation: required, image type, and size limit
            'name' => 'required|string|max:255', // Name validation: required, string, max length 255
            'url' => 'required|url|max:255', // URL validation: required, valid URL, max length 255
        ]);




        $home = HomePageCompanyLogo::find($id);
        $home->name = $validatedData['name'];
        $home->url = $validatedData['url'];
        if ($request->hasFile('img')) {

            $profile_picture = time() . '_' . $validatedData['img']->getClientOriginalName();
            $validatedData['img']->move(public_path('img'), $profile_picture);
            $home->img = 'img/' . $profile_picture;



        }
        $home->save();

        // Redirect or return response
        return redirect()->back()->with('s', 'Form submitted successfully!');

    }

    public function list()
    {
        $h = HomePageCompanyLogo::get();
        return view('admin.page.homepage.company.list', ['page' => $h]);


    }
}
