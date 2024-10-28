<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CompanyBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('added_by', Auth::id())->get();
        return view('company.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('company.blogs.create');
    }

    public function store(Request $request)
    {
        
        $data = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'meta_title' => 'nullable',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $data = $request->all();
        $data['added_by'] = Auth::id();
        $img = "";
        if ($request->hasFile('img')) {
            $profile_picture = time() . '_' . $data['img']->getClientOriginalName();
            $data['img']->move(public_path('blogs/img'), $profile_picture);
            $img  = 'blogs/img/' . $profile_picture;
        
            $data['image'] = $img;
        }
        Blog::create($data);

        return redirect()->route('company.blogs.index')->with('s', 'Blog created successfully.');
    }

    public function show(Blog $blog)
    {

        
        return view('frontend.pages.singleblog',['blog'=>$blog]);
   
    }

    public function edit(Blog $blog)
    {

        if ($blog->added_by != Auth::id()) {
            return redirect()->route('admin.blogs.index');

        }
        return view('company.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {

        if ($blog->added_by != Auth::id()) {
            return redirect()->route('admin.blogs.index');

        }
 
       $data = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'meta_title' => 'nullable',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $img = "";
        if ($request->hasFile('img')) {
            $profile_picture = time() . '_' . $data['img']->getClientOriginalName();
            $data['img']->move(public_path('blogs/img'), $profile_picture);
            $img  = 'blogs/img/' . $profile_picture;
        
            $data['image'] = $img;
        }
     
        $blog->update($data);

        return redirect()->route('company.blogs.index')->with('s', 'Blog updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('company.blogs.index')->with('s', 'Blog deleted successfully.');
    }
}
