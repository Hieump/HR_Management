<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckTruongPhong
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $phongban = DB::table('phongban')->where('id_PB' , $request->id_PB)->first();
        if ($phongban->id_TP == session()->get('id')){
            return $next($request);
        }
        else {
            return redirect()->back()->with('thongbao', 'Bạn khong có quyền vào phòng ban này');
        }
  
        
    }
}
