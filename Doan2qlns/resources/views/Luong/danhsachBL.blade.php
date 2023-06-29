@extends('index')
@section('content')
<div id="layoutSidenav_content">
   <main>
      <div class="container-fluid">
         <h1 class="mt-4">Lương </h1>
         <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Danh sách bảng lương</li>
         </ol>
        
         <div class="row">
            <div class="col-md-12">
               <div class="card md-4">
                  <div class="card-header">
                     <i class="fas fa-table mr-1"></i>
                     Phiếu lương
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                           <thead>
                              <tr>
                                 <th>STT</th>
                                 <th>Tiêu đề phiếu</th>
                                 <th>Mã phiếu</th>
                                 <th>Ngày bắt đầu</th>
                                 <th>Ngày kết thúc</th>
                                 <th>Tình trạng</th>
                                 <th>Hành động</th>
                             

                                 {{-- <th>Xem</th>   
                                 @if (session()->get('quyen') == 0 || session()->get('quyen')==1 ||session()->get('quyen')==2)                                                      
                                 <th>Sửa</th>
                                 <th>Xóa</th>
                                 @endif --}}
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($DSLuong as $index => $bangluong)
                                 <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$bangluong->tenbangluong}}</td>
                                    <td>{{$bangluong->mabangluong}}</td>
                                    <td>{{$bangluong->ngaybatdau}}</td>
                                    <td>{{$bangluong->ngayketthuc}}</td>
                                    <td>{{$bangluong->tinhtrang}}</td>
                                    <td>
                                       <a href="{{ route('getbangluong', ['id'=>$bangluong->id]) }}"><button class="btn btn-success">Xem</button></a>
                                    </td>
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