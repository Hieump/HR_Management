<?php
namespace App\Http\Controllers;
use App\Models\Phongban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
class PhongbanController extends Controller
{

public function getdanhsach(){
$Danhsach = DB::table('phongban')->get();

return view('Phongban.danhsach',compact('Danhsach'));
}

public function getthem(){
$userid = Phongban::latest('id_PB')->first();
if ($userid == null){
$id = "PB-1";
}
else {
$id = $userid->id_PB + 1;  
$id = "PB-" . $id;
}
return view('Phongban.themPB',compact('id'));
}

public function postThem(Request $request)
{
  $this->validate($request,[
    'tenPB'=> 'required|unique:phongban,ten_PB', 
  ],
  [
     'tenPB.required'=>'Bạn chưa nhập tên phòng ban',
     'tenPB.unique'=>'Phòng ban đã tồn tại',
  ]
  );

$phongban                   = new Phongban;
$phongban->ma_PB	            = $request->maPB;
$phongban->ten_PB	           = $request->tenPB;
$phongban->save();
return redirect('phongban/danhsachphongban')->with('thongbao1', 'Bạn thêm phòng ban thành công');
}

public function getSua($id){
$phongban = DB::table('phongban')->where('id', $id)->first();
return view('Phongban/suaPB',compact('phongban')); 
}

public function getchitetPB($id_PB){
  $Congviec = DB::table('congviec')->get();
  $chitiet = DB::table('phongban')->where('id_PB',$id_PB)->get();
  $nhanvien = DB::table('users')->where('id_PB',$id_PB)->get();

  return view('Phongban.chitietPB',compact('chitiet','nhanvien','Congviec','id_PB')); 
}

}