<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nhanvien;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class QuantriController extends Controller
{
    public function getDangki()
  {
      $userid = Nhanvien::latest('id')->first();
    $id = $userid->id + 1;  
    $id = "MV-" . $id;
    return view('themTK',compact('id'));
  }

  public function getdanhsachTK()
  {
    $Taikhoan = DB::table('users')->get();
    
    return view('Quantri.danhsachTK',compact('Taikhoan'));
  }


  public function postDangki(Request $request)
  {
    $this->validate($request,[
      'email'=> 'required|unique:users,email',
      'sdt'=> 'required',
      'hoten'=> 'required',
      'quequan'=> 'required',
      'soCMND'=> 'required',
      'diachi'=> 'required',
      'birthday'=> 'required',
      'password'=>'required|min:6'
    ],
    [
       'email.required'=>'email chưa nhập',
       'email.unique'=>'email đã tồn tại',
       'password.required'=>'password chưa nhập',
       'password.min'=>'Mật khẩu phải lớn hơn 6',
       'sdt.required'=>'Bạn chưa nhập số điện thoại',
       'hoten.required'=>'Bạn chưa nhập tên',
       'soCMND.required'=>'Bạn chưa nhập số chứng minh nhân dân',
       'diachi.required'=>'Bạn chưa nhập địa chỉ',
       'birthday.required'=>'Bạn chưa nhập ngày sinh',
    ]
    );
    
    $nhanvien                   = new Nhanvien;
    $nhanvien->maNV	            = $request->manv;

    $nhanvien->tenNV	           = $request->hoten;
    $nhanvien->email	        = $request->email;
    $nhanvien->matkhau           = $request->password;
    $nhanvien->gioitinh	           = $request->gioitinh;
    $nhanvien->sdt	             = $request->sdt;
    $nhanvien->soCM          = $request->soCMND;
    $nhanvien->quequan         = $request->quequan;
    $nhanvien->diachi         = $request->diachi;
    $nhanvien->ngaysinh         = $request->birthday;
    $nhanvien->quyenhan         = $request->quyenhan;

    if($request->hasFile('hinh'))
    {
      $file = $request ->file('hinh'); //lưu hình vào trong biến file
      $duoi = $file ->getClientOriginalExtension();
      if($duoi !='jpg' && $duoi !='png' && $duoi !='PNG')
      {
          return redirect('quantri/themTK')->with('thongbao','mời bạn chọn ảnh có đuôi png hoặc jpg');
      }

      $name = $file->getClientOriginalName();//lấy tên cái hình ra
       
      $file ->move("source/anh",$name); //lưu hình lại
      $nhanvien-> anh = $name;
  }
  else
  {
      $nhanvien-> anh =" ";
  }
    $nhanvien->save();
    return redirect('quantri/danhsachtaikhoan')->with('thongbao', 'Bạn đã thêm nhân viên thành công');
  }

  public function getSua($id){
        
    $users = DB::table('users')->where('id', $id)->first();
    return view('Quantri/suaTK',compact('users')); 
}

public function postSua(Request $request)
{	
  
  $nhanvien  = Nhanvien::find($request->id);
    $nhanvien->maNV	            = $request->manv;
    $nhanvien->tenNV	           = $request->hoten;
    $nhanvien->email	        = $request->email;
    $nhanvien->matkhau           = $request->password;
    $nhanvien->gioitinh	           = $request->gioitinh;
    $nhanvien->sdt	             = $request->sdt;
    $nhanvien->soCM          = $request->soCMND;
    $nhanvien->quequan         = $request->quequan;
    $nhanvien->diachi         = $request->diachi;
    $nhanvien->ngaysinh         = $request->birthday;
    $nhanvien->quyenhan         = $request->quyenhan;

    if($request->hasFile('hinh'))
    {
      $file = $request ->file('hinh'); //lưu hình vào trong biến file
      $duoi = $file ->getClientOriginalExtension();
      if($duoi !='jpg' && $duoi !='png' && $duoi !='PNG')
      {
          return redirect('quantri/themTK')->with('thongbao','mời bạn chọn ảnh có đuôi png hoặc jpg');
      }

      $name = $file->getClientOriginalName();//lấy tên cái hình ra
       
      $file ->move("source/anh",$name); //lưu hình lại
      $nhanvien-> anh = $name;
  }

    $nhanvien->save();
    return redirect('quantri/danhsachtaikhoan')->with('thongbao', 'Bạn đã thêm nhân viên thành công');
}

public function getXoa($id)
{ 
    $nhanvien = Nhanvien::find($id);
    $nhanvien ->delete();
    return redirect('quantri/danhsachtaikhoan')->with('thongbao','bạn đã xóa nhân viên thành công');   
}

function getChamCong(){
    date_default_timezone_set('Asia/Ho_Chi_Minh');
   
    $cms_chamcong = DB::table('cms_chamcong')->where('ngaycham',date("Y-m-d"))->first();
    // dd(Carbon::parse(date_sub(Carbon::parse($cms_chamcong->ngaycham), date_interval_create_from_date_string('30 days')))->toDateString() );
    if ($cms_chamcong == null){
      DB::table('cms_chamcong')->insert(['ngaycham' => date("Y-m-d")]);
    }
    $nhanvien = DB::table('users')->where('id_PB' ,session()->get('id_PB'))->get();
    $getStatus = DB::table('chamcong_details')->where('id_CC' , $cms_chamcong->id_CC )->get();
    return view('Chamcong.chamcong' , compact('nhanvien','getStatus')); 
}

function postChamCong(Request $res){
  date_default_timezone_set('Asia/Ho_Chi_Minh');
  $cms_chamcong = DB::table('cms_chamcong')->where('ngaycham',date("Y-m-d"))->first();
  $nhanvien = DB::table('users')->where('id' , $res->diemdanh)->first();
  DB::table('users')->where('id' , $res->diemdanh)->first();
  $getStatus = DB::table('chamcong_details')->where('id_CC' , $cms_chamcong->id_CC )->where('id_NV' , $nhanvien->id)->first();
  if ($getStatus == null){
    DB::table('chamcong_details')->insert(['id_CC' => $cms_chamcong->id_CC , 'id_NV' =>$nhanvien->id]);
  }
  else {
    DB::table('chamcong_details')->where(['id_CC' => $cms_chamcong->id_CC , 'id_NV' =>$nhanvien->id])->delete();
  }
}
public function getlichsu(){
  return view('Chamcong.lichsuCC');
}

}