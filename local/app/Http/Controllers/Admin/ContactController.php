<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdvertContact;
use App\Models\AdvertOrder;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;


class ContactController extends Controller
{
    public function getList(){
        $contacts = Contact::orderByDesc('id')->paginate(10);
        $data = [
            'contacts' => $contacts
        ];
        return view('admin.contact.index', $data);
    }

    public function getDelete($id){
        Contact::destroy($id);
        return back()->with('success','Xóa thành công');
    }
}
