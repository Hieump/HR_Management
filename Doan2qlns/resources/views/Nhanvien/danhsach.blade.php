@extends('index')
@section('content')
<div id="layoutSidenav_content">
   <main>
      <div class="container-fluid">
         <h1 class="mt-4">Nhân viên </h1>
         <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Danh sách nhân viên</li>
         </ol>
         @if (session()->get('quyen') == 0 || session()->get('quyen')==1 )    
         <div class="row">
            <div class="col-xl-3 col-md-6">
               <div class="card bg-primary text-white mb-4">
                <div class="card-body row">
                    <div class="col-xs-7"><h3 style="font-weight: bold">STA</h3>
                    </div>
                    <div style="margin-left: 50px;margin-right: 100px" class="col-xs-5">
                     <i style="font-size: 40px;" class="fas fa-user"></i>
                    </div>
                    <div class=" row ">
                         <div class="col-md-12">Thêm nhân viên</div>
                    </div>
                 </div>
                
                  <div class="card-footer d-flex align-items-center justify-content-between">
                     <a class="small text-white stretched-link" href="quantri/themTK">Thêm nhân viên</a>
                     <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                  </div>
               </div>
            </div>
            <div class="col-xl-3 col-md-6 ">
                <div class="card bg-success text-white mb-4">
                   <div class="card-body row">
                       <div class="col-xs-7"><h3 style="font-weight: bold">EXCEL</h3>
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
                      <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                   </div>
                </div>
             </div>
           
         </div>
         @endif
         

         <div class="row">
            <div class="col-md-12">
               <div class="card md-4">
                  <div class="card-header">
                     <i class="fas fa-table mr-1"></i>
                     Danh sách Nhân viên
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                           <thead>
                              <tr>
                                 <th>STT</th>
                                 <th>Mã nhân viên</th>
                                 <th>Tên nhân viên</th>
                                 <th>Ảnh</th>
                                 <th>Giới tính</th>
                                 <th>Ngày sinh</th>
                                 <th>Số điện thoại</th>
                                 <th>tình trạng</th>
                                 <th>Xem</th>   
                                 @if (session()->get('quyen') == 0 || session()->get('quyen')==1 ||session()->get('quyen')==2)                                                      
                                 <th>Sửa</th>
                                 <th>Xóa</th>
                                 @endif
                              </tr>
                           </thead>
                           <tbody>
                              <@foreach ($Nhanvien as $key => $nhanvien)
                              <tr>
                               <td>{{$key+1}}</td>
                               <td>{{$nhanvien->maNV}}</td>
                               <td>{{$nhanvien->tenNV}}</td>
                               <td><img style="max-width: 50px;max-height: 50px;" src="source/anh/{{$nhanvien->anh}}"></td>
                               <td>{{$nhanvien->gioitinh}}</td>
                               <td>{{$nhanvien->ngaysinh}}</td>
                               <td>{{$nhanvien->sdt}}</td>
                               <td>tinhtrang</td>
                               <td><a href="{{route('chitet_NV', $nhanvien->id)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a></td>
                               @if (session()->get('quyen') == 0 || session()->get('quyen')==1 ||session()->get('quyen')==2)
                               <td><a href="{{route('sua_TK', $nhanvien->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a></td>
                               <td><a href="{{route('xoa_TK',$nhanvien->id)}}"class="btn btn-danger"><i class="fas fa-trash-alt"></i> </a></td></td>    
                               @endif  
                            </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </main>
   <footer class="py-4 bg-light mt-auto">
      <div class="container-fluid">
         <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2020</div>
            <div>
               <a href="#">Privacy Policy</a>
               &middot;
               <a href="#">Terms &amp; Conditions</a>
            </div>
         </div>
      </div>
   </footer>
</div>
@endsection