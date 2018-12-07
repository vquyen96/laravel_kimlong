<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use App\Models\Groupvn;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BannerController extends Controller
{
    public function getList(){
        Session::get('lang','vn') == 'vn' ? $lang = 'vn' : $lang = 'en' ;
        $banners = Banner::where('lang', $lang)->get();
        $list_group = DB::table($this->db->group)->where('status', 1)->get()->toArray();
        if (count($list_group)) $this->recusiveGroup($list_group,0,"",$result);
        else $result = [];
        $data = [
            "banners" => $banners,
            "groups" => $result
        ];
        return view('admin.banner.index', $data);
    }
    public function postAdd(Request $request){
        $data = $request->all();
        $image = $request->file('img');
        if ($request->hasFile('img')) {
            $data['img'] = saveImage([$image], 1900, 'banner');
        }
        Session::get('lang','vn') == 'vn' ? $lang = 'vn' : $lang = 'en' ;
        $data['lang'] = $lang;
        if (Banner::create($data)){
            return back()->with('success', 'Thêm mới thành công');
        }
        else{
            return back()->with('error', 'Thêm mới bị lỗi');
        }
        dd($request->all());
    }
    public function postEdit(Request $request, $id){
        $banner = Banner::find($id);
        $data = $request->all();
        $image = $request->file('img');
        if ($request->hasFile('img')) {
            $data['img'] = saveImage([$image], 1900, 'banner');
        }
        $banner->update($data);
        return back()->with('success', 'Cập nhật thành công');

        dd($request->all());
    }

    public function getDelete($id){
        Banner::destroy($id);
        return back()->with('success', 'Xóa thành công');
    }
}
