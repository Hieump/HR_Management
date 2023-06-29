<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class LuongController extends Controller
{
    public function getdanhsachBL(){
        $DSLuong = DB::table('bangluong')->orderBy('id', 'DESC')->get();
        return view('Luong.danhsachBL' , compact('DSLuong'));
    }

    public  function getthem()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $bangluong = DB::table('bangluong')->orderBy('id', 'DESC')->first();
        if ($bangluong != null){
            $tenphieu = "TENPHIEU".(string)($bangluong->id + 1);
            $d1 = Carbon::parse(date_add(Carbon::parse($bangluong->ngayketthuc), date_interval_create_from_date_string('1 day')))->toDateString();
            $d2 = Carbon::parse(date_add(Carbon::parse($bangluong->ngayketthuc), date_interval_create_from_date_string('2 days')))->toDateString();
        }
        else {
            $tenphieu = "TENPHIEU".(string)1;
            $d1 = Carbon::parse(date_add(Carbon::parse(date("Y-m-d")), date_interval_create_from_date_string('1 day')))->toDateString();
            $d2 = Carbon::parse(date_add(Carbon::parse(date("Y-m-d")), date_interval_create_from_date_string('2 days')))->toDateString();
        }
        return view('Luong.themBL' , compact('d1','d2','tenphieu'));
    }


    public function testluong(){
        $DSCong = DB::table('cms_chamcong')->where('ngaycham' , '>=' , '2021-01-11')->where('ngaycham' , '<=' , '2021-01-14')->get();
        if ($DSCong != null){
            $tongcong = DB::table('chamcong_details')->where('id_CC' , $DSCong[0]->id_CC)->get();
            foreach ($DSCong as $index => $chamer){
                if ($index != 0){
                    $tongcong = $tongcong->merge(DB::table('chamcong_details')->where('id_CC' , $chamer->id_CC)->get());
                }
            }
            dd($tongcong);
     
        }
    }

    public function getbangluong($id){
        $bangluong = DB::table('bangluong')->where('id' , $id)->first();
        $nhanvien = DB::table('users')->get();
        $collection = collect();
        if ($bangluong != null){
            $luong = DB::table('luong')->where("id_BL" , $bangluong->id)->get();
            foreach ($luong as $item){
                foreach ($nhanvien as $us){
                    if ($item->id_NV == $us->id){
                        $collectiontemp = collect(["code" => $us->maNV , "name"=> $us->tenNV , "ngaycong" => $item->ngaycong , "salary" => number_format($item->luong, 0, '', ',')."VNĐ" , "id" => $item->id , "id_BL" => $item->id_BL , "status" => $item->trangthai]);
                        $collection->push($collectiontemp);
                        break;
                    }
                }
               
            }
   
            return view('Luong.danhsachdetail' , compact('collection'));
        }
        // $DSCong = DB::table('cms_chamcong')->where('ngaycham' , '>=' , $bangluong->ngaybatdau)->where('ngaycham' , '<=' ,  $bangluong->ngayketthuc)->get();
       
        // if ($DSCong != null){
        //     $tongcong = DB::table('chamcong_details')->where('id_CC' , $DSCong[0]->id_CC)->get();
        //     foreach ($DSCong as $index => $chamer){
        //         if ($index != 0){
        //             $tongcong = $tongcong->merge(DB::table('chamcong_details')->where('id_CC' , $chamer->id_CC)->get());
        //         }
        //     }
     

        //     $tongcongcount = $tongcong->unique('id_NV');
        //     $DSNhanVien =  DB::table('users')->get();
        //     $collection = collect();
        //     foreach ($tongcongcount as $cong){
        //         foreach ($DSNhanVien as $nhanvien){
        //             if ($cong->id_NV == $nhanvien->id){
        //                 $ngaycong = 0;
        //                 if (isset($tongcong->countBy('id_NV')[$nhanvien->id])){
        //                     $salaryCounted = $tongcong->countBy('id_NV')[$nhanvien->id] * 100000;
        //                     $ngaycong = $tongcong->countBy('id_NV')[$nhanvien->id];
        //                 }
        //                 else {
        //                     $salaryCounted = 0;
        //                 }
        //                 $collectiontemp = collect(["code" => $nhanvien->maNV , "name"=> $nhanvien->tenNV , "ngaycong" => $ngaycong , "salary" => number_format($salaryCounted, 0, '', ',')."VNĐ"]);
        //                 $collection->push($collectiontemp);
        //                 break;
        //             }
        //         }
        //     }
            // dd($collection[0]->get('code'));
          
        

    }

    public function postthem(Request $res){
        $checkName = DB::table('bangluong')->where('tenbangluong' , $res->salaryLogName)->get();
        if ($checkName != null){
            $query = DB::table('bangluong')->insert(['tenbangluong' => $res->salaryLogName , 'mabangluong' => $res->salaryCodeName ,  'ngaybatdau' => $res->dateStarted , 'ngayketthuc' => $res->dateEnded , 'tinhtrang' => "Chưa nhập"]);
            $queryID = DB::getPdo()->lastInsertId();

            $DSCong = DB::table('cms_chamcong')->where('ngaycham' , '>=' , $res->dateStarted )->where('ngaycham' , '<=' ,  $res->dateEnded)->get();
       
            if ($DSCong != null){
                $tongcong = DB::table('chamcong_details')->where('id_CC' , $DSCong[0]->id_CC)->get();
                foreach ($DSCong as $index => $chamer){
                    if ($index != 0){
                        $tongcong = $tongcong->merge(DB::table('chamcong_details')->where('id_CC' , $chamer->id_CC)->get());
                    }
                }
        
                $hesoluong = 100000;
                $tongcongcount = $tongcong->unique('id_NV');
                $DSNhanVien =  DB::table('users')->get();
                $collection = collect();
                foreach ($tongcongcount as $cong){
                    foreach ($DSNhanVien as $nhanvien){
                        if ($cong->id_NV == $nhanvien->id){
                            $ngaycong = 0;
                            if (isset($tongcong->countBy('id_NV')[$nhanvien->id])){
                                $salaryCounted = $tongcong->countBy('id_NV')[$nhanvien->id] * 100000;
                                $ngaycong = $tongcong->countBy('id_NV')[$nhanvien->id];
                            }
                            else {
                                $salaryCounted = 0;
                            }
                            DB::table('luong')->insert(["id_NV" => $nhanvien->id , "id_BL" => $queryID , "hesoluong" => $hesoluong , "ngaycong" => $ngaycong,  "luong" => $salaryCounted ,"trangthai" => 0 ]);
                            break;
                        }
                    }
                }
            }
        }
        else {
            echo "bảng lương đã tồn tại, vui lòng chọn tên khác";
        }
    }

    public function traluong(Request $res){
        $traluong = DB::table('luong')->where('id' , $res->diemdanh)->first();
        if ($traluong != null){
            if ($traluong->trangthai == 0) {

                DB::table('luong')->where('id' , $res->diemdanh)->update(['trangthai' => 1]);
            }
            if ($traluong->trangthai == 1) {
                DB::table('luong')->where('id' , $res->diemdanh)->update(['trangthai' => 0]);
            }
        }
        $luong = DB::table('luong')->where("id_BL" ,$res->id_BL)->get();
        $luongCount = count($luong);
        $luong = DB::table('luong')->where("id_BL" ,$res->id_BL)->where("trangthai" , 1)->get();
        $luongPaidCount = count($luong);
        DB::table('bangluong')->where('id' , $res->id_BL)->update(['tinhtrang' => $luongPaidCount . "/" . $luongCount]);
    }
}
