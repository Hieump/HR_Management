<?php

namespace App\Http\Controllers;

use App\Models\Nhanvien;
use \Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
class TongquanController extends Controller
{
  public function getTongquan(){
    $Phongban = DB::table('phongban')->get();
      return view('Layout.tongquan',compact('Phongban'));
  }
 
  public function postLogin(Request $res){

    $user = User::where('email', '=', $res->email )->where('matkhau' , '=' , $res->password)->first();
    if ($user == null){
      return redirect('login')->with('thongbao', 'Sai eamil hoặc mật khẩu');
    }
    else {

      session()->put('quyen', $user->quyenhan);
      session()->put('name', $user->tenNV);
      session()->put('id', $user->id);
      session()->put('avt', $user->anh);
      session()->put('id_PB', $user->id_PB);
      return redirect()->route('tong_quan');
      
    }
  }
  
}
