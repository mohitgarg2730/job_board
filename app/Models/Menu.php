<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['title', 'url', 'parent_id'];

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public static function tree()
    {
        $allMenus = Menu::all();
        $rootMenus = $allMenus->whereNull('parent_id');

        return self::buildTree($rootMenus, $allMenus);
    }

    private static function buildTree($menus, $allMenus)
    {
        foreach ($menus as $menu) {
            $menu->children = $allMenus->where('parent_id', $menu->id);
            if ($menu->children->isNotEmpty()) {
                self::buildTree($menu->children, $allMenus);
            }
        }
        return $menus;
    }
}
