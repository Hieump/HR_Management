<?php
namespace App\Http\Controllers;
use App\Models\Congviec;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CongviecController extends Controller
{
public function getdanhsachCV(){
    $Congviec = DB::table('congviec')->get();
return view('Congviec/danhsachCV',compact('Congviec'));
}
public function getthemCV($idPB){
  
    $congviecid = Congviec::latest('id_CV')->first();
    $id = $congviecid->id_CV + 1;  
    $id = "CV-" . $id;
return view('Congviec/themCV',compact('id','idPB'));
}
public function postthemCV(Request $request)
{
$congviec                   = new Congviec;
$congviec->maCV	            = $request->maCV;
$congviec->tenCV	        = $request->tenCV;
$congviec->id_PB             =   $request->id_PB;
$congviec->save();
return redirect('phongban/chitetphongban')->with('thongbao', 'Bạn đã thêm nhân viên thành công');
}
}