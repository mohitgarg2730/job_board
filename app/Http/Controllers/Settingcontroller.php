<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SettingModel;
class Settingcontroller extends Controller
{
    //

    public function index()
    {
        $s = SettingModel::find(1);
        return view('admin.setting.form',['s'=>$s]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'fb_link' => 'required',
            'in_link' => 'required',
            'tw_link' => 'required',
            'li_link' => 'required',
        ]);

        $ss = SettingModel::find(1);

        if(empty($ss))
        {
            $ss = new SettingModel;

        }

        $ss->fb_link = $data['fb_link'];
        $ss->in_link = $data['in_link'];
        $ss->tw_link = $data['tw_link'];
        $ss->li_link = $data['li_link'];

        $ss->save();

                return redirect('admin/setting')->with('s', 'Profile updated successfully.');
    }

}
