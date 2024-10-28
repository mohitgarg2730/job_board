<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterMenu extends Model
{
    protected $fillable = ['title', 'url', 'parent_id'];

    public function children()
    {
        return $this->hasMany(FooterMenu::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(FooterMenu::class, 'parent_id');
    }

    public static function tree()
    {
        $allMenus = FooterMenu::all();
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
