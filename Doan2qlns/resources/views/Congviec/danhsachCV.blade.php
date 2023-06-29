@extends('index')
@section('content')
<div id="layoutSidenav_content">
   <main>
      <div class="container-fluid">
         <h1 class="mt-4">Công việc </h1>
         <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Danh sách công việc</li>
         </ol>
      

         <div class="row">
            
            <div class="col-md-12">
                <div class="card md-4">
                    <div class="card-header">
                        <div class="row"  >  
                        <div class="col-md-10"> <i class="fas fa-table mr-1"></i>
                            Danh sách công việc</div>
                        <div class="col-md-2"><a href="" class="btn btn-primary"> thêm</a></div>
                    </div>
                  
                    </div>
                    <div class="card-body">
                       <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                             <thead>
                                <tr>
                                   <th>STT</th>
                                   <th>Mã công việc</th>
                                   <th>Tên công việc</th>
                                   <th>Ngày tạo</th>
                                   <th>Sửa</th>
                                   <th>Xóa</th>
                                </tr>
                             </thead>
                             <tbody>
                                @foreach ($Congviec as $key=> $item)
                                <tr>
                                 <td>{{$key+1}}</td>
                                 <td>MCV0001</td>
                                 <td>Giám đốc</td>
                                 <td>41</td>
                                 <td><a href=""  class="btn btn-warning"><i class="fas fa-edit"></i></a></td>
                                 <td><a href="" class="btn btn-danger"><i class="fas fa-trash-alt"></i> </a></td>
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