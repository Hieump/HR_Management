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
                               
                                </tr>
                             </thead>
                             <tbody>
                               
                               
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