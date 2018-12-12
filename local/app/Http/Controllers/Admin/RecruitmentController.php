<?php

namespace App\Http\Controllers\Admin;

use App\Model\Group_vn;
use App\Models\Account;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RecruitmentController extends Controller
{
    public function getList(Request $request)
    {

        /*
         *  lấy danh sách danh mục
         */

        // $from = strtotime(date('Y-m-1 0:0'));

        // $to = time();

//        $user = Auth::user();
//        $group_ids = explode(',',$user->group_id);
//        if(in_array(0, $group_ids)){
//            $list_group = DB::table($this->db->group)->where('status', 1)->orderBy('order', 'asc')->get()->toArray();
//
//        }else {
//            $list_group = DB::table($this->db->group)->where('status', 1)->where(function ($query) use ($group_ids){
//                $query->whereIn('id',$group_ids)
//                      ->orWhereIn('parentid',$group_ids);
//            })->get()->toArray();
//        }
        Session::get('lang','vn') == 'vn' ? $group_ids = ['1573'] : $group_ids = ['1410'] ;
        $list_group = DB::table($this->db->group)->where('status', 1)->where(function ($query) use ($group_ids){
            $query->whereIn('id',$group_ids)
                ->orWhereIn('parentid',$group_ids);
        })->get();

        if (count($list_group)) $this->recusiveGroup($list_group,0,"",$result);
        else $result = [];


        if (in_array(0 ,$group_ids)) {
            $group_ids = [];
        }
        else{

            foreach ($list_group as $group) {
                $group_ids[] = (int)$group->id;
            }

        }

        /*
         *  lấy danh sách bài viết
         */

        switch (Auth::user()->level) {
            case 1:
                $status = [0,1];
                break;
            case 2:
                $status = [0,1];
                break;
            case 3:
                $status = [0,1,2,3,5];
                break;
            case 4:
                $status = [0,1,2,3,4,5];
                break;

            default:
                # code...
                break;
        }
        $paramater = $request->all();

        if (isset($paramater['articel'])){
            $paramater = $paramater['articel'];
        }

        $paramater_return = $paramater;



        $group_id = isset($paramater['group_id']) ? $paramater['group_id'] : $group_ids;
        $status = isset($paramater['status']) ? $paramater['status'] : $status;
        $key_search = isset($paramater['key_search']) ? $paramater['key_search'] : [];
        $site = isset($paramater['site']) ? $paramater['site'] : [];
        $member = isset($paramater['member']) ? $paramater['member'] : [];
        // $group_id = [1455];
        if (Auth::user()->level < 3) {
            $list_articel = DB::table($this->db->news)->orderByDesc('approved_at');
        }
        else{
            $list_articel = DB::table($this->db->news)->orderByDesc('id');
        }

        if (isset($paramater['from']) && isset($paramater['to'])){
            $from = strtotime($paramater['from']."00:00");
            $to = strtotime($paramater['to']."23:59");

            $list_articel = $list_articel->where('created_at','>=',$from)->where('created_at','<=',$to);
            $fromto = true;
        }


        if(count($status)){
            // dd($list_articel->get());
            if (isset($paramater['status']) && Auth::user()->level == 4 && in_array(2, $status)) {
                $list_articel = $list_articel->where(function ($query) use ($key_search){
                    $query->where('status', 2)
                        ->orWhere('status', 3);
                });
            }
            else{
                $list_articel = $list_articel->whereIn('status',$status);
            }

        }

        if (Auth::user()->site == 1) {
            $list_member = Account::where('status', 1)->get();
        }
        else{
            $list_member = Account::where('status', 1)->where('site', Auth::user()->site)->get();
        }
        if (count($member)) {
            $list_articel = $list_articel->whereIn('userid',$member);
        }

        if(count($group_id)){
//            $list_articel_ids = DB::table($this->db->group_news)->whereIn('group_vn_id',$group_id)->get(['news_vn_id'])->toArray();
//            $list_articel_ids = array_column(json_decode(json_encode($list_articel_ids),true),'news_vn_id');
            $group_id_child = Group_vn::whereIn('parentid', $group_id)->get(['id'])->toArray();
            $group_id_child = array_column(json_decode(json_encode($group_id_child),true),'id');
            $list_articel =  $list_articel->whereIn('groupid',$group_id)->orWhereIn('groupid', $group_id_child);

        }

        if($key_search){
            $list_articel = $list_articel->where(function ($query) use ($key_search){
                $query->where('title','like',"%$key_search%")
                    ->orWhere('summary', 'like', "%$key_search%");
            });
            // dd($list_articel->get());
        }
        if (Auth::user()->level < 3 && Auth::user()->site == 1) {
            if(count($site)){

                $list_acc_ids = Account::whereIn('site', $site)->get(['id'])->toArray();

                $list_articel = $list_articel->whereIn('userid',$list_acc_ids);
            }
        }
        else{
            $site = [Auth::user()->site];
            $list_acc_ids = Account::whereIn('site', $site )->get(['id'])->toArray();
            $list_articel = $list_articel->whereIn('userid',$list_acc_ids);
        }

        if (Auth::user()->level > 2) {
            $list_articel =  $list_articel->where('userid', Auth::user()->id);
        }
        // dd($list_articel->get());
        $list_articel = $list_articel->paginate(10);

        // foreach ($list_articel as $item) {
        //     // dd($item->summary);

        //     $str = substr($item->summary,0,4);
        //     // dd($str);
        //     if ($str != 'VNHN') {

        //         $art = News::find($item->id);
        //         $art->summary = 'VNHNO - '.$item->summary;
        //         $art->save();
        //     }
        // }

        // dd($list_articel);
        if(isset($paramater_return['status'])){
            $list_articel->appends(['status' => $paramater_return['status']]);
        }
        if(isset($paramater_return['group_id'])){
            $list_articel->appends(['group_id' => $paramater_return['group_id']]);
        }
        if(isset($paramater_return['key_search'])){
            $list_articel->appends(['key_search' => $paramater_return['key_search']]);
        }
        if(isset($paramater_return['site'])){
            $list_articel->appends(['site' => $paramater_return['site']]);
        }
        if(isset($paramater_return['member'])){
            $list_articel->appends(['member' => $paramater_return['member']]);
        }
        if(isset($paramater_return['from'])){
            $list_articel->appends(['from' => $paramater_return['from']]);
        }
        if(isset($paramater_return['to'])){
            $list_articel->appends(['to' => $paramater_return['to']]);
        }

        foreach ($list_articel as $val) {
            $val->created_at = date('d/m/Y H:m', $val->created_at);
            $val->updated_at = date('d/m/Y H:m', $val->updated_at);
            if ($val->userid != null) {
                $val->author = Account::find($val->userid);
                if ($val->author != null) {
                    $val->author = $val->author->username;
                }
                $val->author_date = $val->created_at;
            }
            $date = $val->release_time;
            unset($val->release_time);
            // $val->release_time->day = date('Y-m-d',$date);
            // $val->release_time->h = date('h:i A',$date);
            $val->release_time = (object)[
                'day' => date('Y-m-d',$date),
                'h' => date('h:i A',$date)
            ];

            if ($val->approved_id != null) {
                $val->approved = Account::find($val->approved_id)->username;
                $val->approved_date = date('d/m/Y H:m', $val->approved_at);
            }
            else{
                $val->approved = null;
            }

            $group_id_new = explode(',',$val->groupid);
            foreach ($group_id_new as $id) {
                $group = DB::table($this->db->group)->where('id', $id)->first();
                if ($group!= null && $group->parentid != 0) {
                    $parent = DB::table($this->db->group)->where('id', $id)->first();
                }
            }

        }
        // dd($list_articel);
        if(!$paramater){
            $paramater = [
                'key_search' => '',
                'group_id' => [],
                'status' => []
            ];
        }
        // $from = strtotime($from);
        // $to = strtotime($to);
        $data = [
            'list_member' => $list_member,
            'list_group' => $result,
            'list_articel' => $list_articel,
            'paramater' => $paramater
        ];
        if (isset($fromto)) {

            $data['from'] = $from;
            $data['to'] = $to;
        }
        // dd($data);
        // dd($data);
        return view('admin.articel.index', $data);
    }
}
