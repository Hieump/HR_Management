<?php

namespace App\Http\Controllers;

use App\Models\Nghiphep;
use App\Models\Nhanvien;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class NhanvienController extends Controller
{
    public function getdanhsach(){
        $Nhanvien = DB::table('users')->get();
    
        return view('Nhanvien.danhsach',compact('Nhanvien'));
    
    }

    public function getchitet($id){
        $chitiet = DB::table('users')->where('id', $id)->first();
        return view('Nhanvien.chitiet',compact('chitiet')); 
    }

    public function getnghiphep(){
        $danhsach = DB::table('nghiphep')->paginate(10);
        $nhanvien = DB::table('users')->get();
        return view('Nhanvien.nghiphep',compact('danhsach','nhanvien'));
    }

    public function getthemmoi(){
        $nghiphep = DB::table('nghiphep')->get();
        $nhanvien = DB::table('users')->get();
        return view('Nhanvien.themNP',compact('nghiphep','nhanvien'));
    }
    public function postthemmoi(Request $request){
       
                $nghiphep                   = new Nghiphep;
                $nghiphep->batdau           = $request ->ngaybatdau;
                $nghiphep->ketthuc        = $request ->ngayketthuc;
                $nghiphep->sdt           = $request ->sdt;
                $nghiphep->lydo           = $request ->lydo;
                $nghiphep->id_NV         = session()->get('id');
                $nghiphep->ghichu         = $request ->ghichu;
                $nghiphep->tinhtrang         =value('chưa duyệt');
                $nghiphep->save();

                return redirect('nhanvien/nghiphep')->with('thongbao','Thêm nghỉ phép thành công');
    }
    public function posttinhtrang($id)
{	

    DB::table('nghiphep')->where('id_NP', $id)->update(['tinhtrang' => 'đã duyệt']);

    return redirect('nhanvien/nghiphep')->with('chapthuan', 'Bạn đã chấp thuận nghỉ phép');
}
public function posttuchoi($id)
{	
    DB::table('nghiphep')->where('id_NP', $id)->update(['tinhtrang' => 'Không duyệt']);
   
    return redirect('nhanvien/nghiphep')->with('tuchoi', 'Bạn đã từ chối nghỉ phép');
}


    public function ajaxTable(Request $res){
        $nghiphep = DB::table('users')->where('tenNV' , 'like' , "%{$res->query('query') }%")->get();
        foreach ($nghiphep as $index => $item){
            echo '<tr>
                <th scope="row">' . ($index + 1) . '</th>
                <td>' . $item->tenNV  . '</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Mark</td>
                <td>Otto</td>
            </tr>';
        }
       
    }
}
