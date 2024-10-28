<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterMenu;
use Illuminate\Http\Request;

class FooterMenuController extends Controller
{
    public function index()
    {
        $menus = FooterMenu::tree();

        return view('admin.footer.menus.index', compact('menus'));
    }

    public function create()
    {
        $menus = FooterMenu::all();
        return view('admin.footer.menus.create', compact('menus'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:footer_menus,id',
        ]);

        FooterMenu::create($request->all());

        return redirect('admin/footer/menus')->with('success', 'Menu created successfully.');
    }

    public function edit(FooterMenu $menu)
    {
        $menus = FooterMenu::all();
        return view('admin.footer.menus.edit', compact('menu', 'menus'));
    }

    public function update(Request $request, FooterMenu $menu)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:footer_menus,id',
        ]);

        $menu->update($request->all());

        return redirect()->route('admin.footer.menus.index')->with('s', 'Menu updated successfully.');
    }

    public function destroy(FooterMenu $menu)
    {
        $menu->delete();

        return redirect()->route('admin.footer.menus.index')->with('s', 'Menu deleted successfully.');
    }
}
