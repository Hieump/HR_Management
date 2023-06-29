@extends('index')
@section('content')
<div id="layoutSidenav_content">
   <main>
      <div class="container-fluid">
         <h1 class="mt-4">Tổng quan</h1>
         <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
         </ol>
         @if (session()->get('quyen') == 0)
         <div class="row">
            <div class="col-xl-3 col-md-6">
               <div class="card bg-primary text-white mb-4">
                <div class="card-body"><div><h3 style="font-weight: bold">{{$count = DB::table('users')->count()}}</h3></div>
                <div>Nhân viên</div>
                </div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                     <a class="small text-white stretched-link" href="nhanvien/danhsachnhanvien">Danh sách nhân viên</a>
                     <div class="small text-white"><i class="far fa-arrow-alt-circle-right"></i></div>
                  </div>
               </div>
            </div>
            <div class="col-xl-3 col-md-6">
               <div class="card bg-warning text-white mb-4">
                <div class="card-body"><div><h3 style="font-weight: bold">{{$count = DB::table('phongban')->count()}}</h3></div>
                <div>Phòng ban</div>
                </div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                     <a class="small text-white stretched-link" href="phongban/danhsachphongban">Danh sách phòng ban</a>
                     <div class="small text-white"><i class="far fa-arrow-alt-circle-right"></i></div>
                  </div>
               </div>
            </div>
            
            <div class="col-xl-3 col-md-6">
               <div class="card bg-info text-white mb-4">
                <div class="card-body"><div><h3 style="font-weight: bold">{{$count = DB::table('users')->count()}}</h3></div>
                <div>Tài khoản người dùng</div>
                </div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                     <a class="small text-white stretched-link" href="quantri/danhsachtaikhoan">Danh sách tài khoản</a>
                     <div class="small text-white"><i class="far fa-arrow-alt-circle-right"></i></div>
                  </div>
               </div>
            </div>
            

            <div class="col-xl-3 col-md-6">
               <div class="card bg-danger text-white mb-4">
                  <div class="card-body"><div><h3 style="font-weight: bold">2</h3></div>
                      <div>Nhân viên nghỉ việc</div>
                </div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                     <a class="small text-white stretched-link" href="#">Danh sách nghỉ việc</a>
                     <div class="small text-white"><i class="far fa-arrow-alt-circle-right"></i></div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xl-3 col-md-6">
               <div class="card bg-success text-white mb-4">
                <div class="card-body row">
                    <div class="col-xs-5"><h3 style="font-weight: bold">EXCEL</h3>
                    </div>
                    <div style="margin-left: 20px;margin-right: 100px" class="col-xs-5">
                     <i style="font-size: 50px;" class="fas fa-file-excel"></i>
                    </div>
                    <div class=" row ">
                         <div class="col-md-12">Xuất báo cáo</div>
                    </div>
                 </div>
                
                  <div class="card-footer d-flex align-items-center justify-content-between">
                     <a class="small text-white stretched-link" href="#">Danh sách nhân viên</a>
                     <div class="small text-white"><i class="far fa-arrow-alt-circle-right"></i></div>
                  </div>
               </div>
            </div>
            <div class="col-xl-3 col-md-6 ">
                <div class="card bg-success text-white mb-4">
                   <div class="card-body row">
                       <div class="col-xs-9"><h3 style="font-weight: bold">EXCEL</h3>
                       </div>
                       <div style="margin-left: 20px;margin-right: 100px" class="col-xs-3">
                        <i style="font-size: 50px;" class="fas fa-file-excel"></i>
                       </div>
                       <div class=" row ">
                            <div class="col-md-12">Xuất báo cáo</div>
                       </div>
                    </div>
                   
                   

                   <div class="card-footer d-flex align-items-center justify-content-between">
                      <a class="small text-white stretched-link" href="#">Danh sách nhân viên</a>
                      <div class="small text-white"><i class="far fa-arrow-alt-circle-right"></i></div>
                   </div>
                </div>
             </div>
           
         </div>
         @endif

         <div class="row">
            <div class="col-md-6">
               <div class="card md-4">
                  <div class="card-header">
                     <i class="fas fa-table mr-1"></i>
                     Danh sách phòng ban
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                           <thead>
                              <tr>
                                 <th>STT</th>
                                 <th>Mã phòng</th>
                                 <th>Tên phòng</th>
                                 <th>Ngày tạo</th>
                             
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($Phongban as $key=> $item)
                              <tr>
                                 <td>{{$key+1}}</td>
                                 <td>{{$item->ma_PB}} </td>
                                 <td>{{$item->ten_PB}} </td>
                                 <td>{{$item->created_at}}</td>
                                 
                              </tr>
                              @endforeach
                             
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
                <div class="card md-4">
                    <div class="card-header">
                       <i class="fas fa-table mr-1"></i>
                       Danh sách chức vụ
                    </div>
                    <div class="card-body">
                       <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                             <thead>
                                <tr>
                                   <th>STT</th>
                                   <th>Mã chức vụ</th>
                                   <th>Tên chức vụ</th>
                                   <th>Ngày tạo</th>
                                </tr>
                             </thead>
                             <tbody>
                                <tr>
                                   <td>1</td>
                                   <td>MCV0001</td>
                                   <td>Giám đốc</td>
                                   <td>41</td>
                                </tr>
                             </tbody>
                          </table>
                       </div>
                    </div>
                 </div>
            </div>
         </div>
      </div>
   </main>

</div>
@endsection