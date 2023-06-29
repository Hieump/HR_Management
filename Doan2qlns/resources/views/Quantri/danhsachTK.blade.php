@extends('index')
@section('content')
<div id="layoutSidenav_content">
   <main>
      <div class="container-fluid">
         <h1 class="mt-4">Quản trị</h1>
         <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Danh sách tài khoản</li>
         </ol>
         
         

         <div class="row">
            <div class="col-md-10"></div>
            @if (session()->get('quyen') == 0 || session()->get('quyen')==1 )
            <div class="col-md-2" >
               <a style="margin-bottom: 20px" href="quantri/themTK" class="btn btn-outline-primary">Thêm +</a>
            </div>
               
            @endif
           
            <div class="col-md-12">
                <div class="card md-4">
                    <div class="card-header">
                       <i class="fas fa-table mr-1"></i>
                       Danh sách tài khoản
                    </div>
                    <div class="card-body">
                       <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0" >
                             <thead>
                                <tr>
                                   <th>STT</th>
                                   <th>Mã nhân viên</th>
                                   <th>Tên nhân viên</th>
                                   <th>Ảnh</th>
                                   <th>Email</th>
                                   <th>Số điện thoại</th>
                         
                                   <th>Quyền hạn</th>
                                   <th>ngày tạo</th>
                                   @if (session()->get('quyen') == 0 || session()->get('quyen')==1 )
                                   <th>Sửa</th>
                                   @endif
                                   @if (session()->get('quyen') == 0 )
                                   <th>Xóa</th>
                                   @endif
                                </tr>
                             </thead>
                             <tbody>
                                @foreach ($Taikhoan as $key => $taikhoan)
                                <tr>
                                 <td>{{$key+1}}</td>
                                 <td>{{$taikhoan->maNV}}</td>
                                 <td>{{$taikhoan->tenNV}}</td>
                                 <td><img style="max-width: 50px;max-height: 50px;" src="source/anh/{{$taikhoan->anh}}"></td>
                                 <td>{{$taikhoan->email}}</td>
                                 <td>0{{$taikhoan->sdt}}</td>
                     
                                    @if($taikhoan->quyenhan == 0)
                                       <td>Giám đốc</td>
                                    @endif
                                    @if($taikhoan->quyenhan == 1)
                                    <td>Trưởng phòng</td>
                                    @endif
                                    @if($taikhoan->quyenhan == 2)
                                    <td>Phó phòng</td>
                                    @endif
                                    @if($taikhoan->quyenhan == 3)
                                    <td>Nhân viên</td>
                                    @endif
                                 <td>{{$taikhoan->created_at}}</td>
                                 @if (session()->get('quyen') == 0 || session()->get('quyen')==1 )
                                 <td><a class="btn btn-warning" href="{{route('sua_TK', $taikhoan->id)}}">Sửa</a></td>
                                   @endif
                                   @if (session()->get('quyen') == 0 )
                                   <td><a class="btn btn-danger" href="{{route('xoa_TK',$taikhoan->id)}}"> Xóa</a></td></td>   
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

</div>
@endsection