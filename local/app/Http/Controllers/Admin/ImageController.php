<?php

namespace App\Http\Controllers\Admin;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    public function getList(){
        $images = Image::where('status', 1)->get();
        $data = [
            'images' => $images
        ];
//        dd($images);
        return view('admin.image.index', $data);
    }
    public function postAdd(Request $request){
        $img = new Image;
//        dd($request->space_image)
        $img->img = saveImageArticle([$request->url],'images');
        $img->save();
        return back();
    }

    public function getDelete($id){
        $strImage = Image::find($id)->url;
        $arrImage = explode(',',$strImage);
        foreach($arrImage as $image){
            File::delete('local/storage/app/images/'.$image,'local/storage/app/images/resized200-'.$image,'local/storage/app/images/resized500-'.$image);
        }
        Image::destroy($id);
        return back();
    }
}
