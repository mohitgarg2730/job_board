<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;


class PageController extends Controller
{
    //
    public function index()
    {
        return view('admin.page.form');
    }
    public function edit($id)
    {

        $page = Page::find($id);

        return view('admin.page.form', ['page' => $page]);
    }
    public function del($id)
    {

        $page = Page::find($id)->delete();

        return redirect('admin/pages/list')->with('s', 'Deleted');
    }
    public function list()
    {

        $b = Page::orderby('page_name')->get()->toArray();

        return view('admin.page.list', ['page' => $b]);

    }
    public function store(Request $request)
    {

        $data = $request->validate([
            'page_name' => 'required',
            'page_slug' => 'required',

            'content' => 'required',

        ]);
        $page = new page;
        $page->page_name = $data['page_name'];
        $page->page_slug = $data['page_slug'];
        $page->content = $data['content'];

        $page->save();

        return redirect('admin/pages/list')->with('s', 'Added');
    }
    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'page_name' => 'required',
            'page_slug' => 'required',
            'content' => 'required',

        ]);
        $page = Page::find($id);
        $page->page_name = $data['page_name'];
        $page->page_slug = $data['page_slug'];
        $page->content = $data['content'];
        $page->save();

        return redirect('admin/pages/list')->with('s', 'Added');
    }

}
