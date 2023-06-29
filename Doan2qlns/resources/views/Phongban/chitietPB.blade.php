@extends('index')
@section('content')
<div id="layoutSidenav_content">
   <main>
      <div class="container-fluid">
         <h1 class="mt-4">Phòng ban</h1>
         <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Chi tiết phòng ban</li>
         </ol>
         <div class="row">
            <div class="col-md-8">
               </div>
            <div style="margin-bottom: 20px" class="col-md-4">
               <a href="phongban/themmoiphongban" class="btn btn-outline-primary" ><i class="fas fa-plus"></i>Tạo mới</a>
               @if (session()->get('quyen') == 1 || session()->get('quyen') == 0  )
                <a href="{{ route('cham_cong')}}" class="btn btn-outline-success" ><i class="fas fa-plus"></i>Chấm công</a>
                <a href="{{ route('them_CV', ['id'=>$id_PB]) }}" class="btn btn-outline-primary" ><i class="fas fa-plus"></i>Công việc</a>
                @endif
             </div>
            <div class="col-md-6">
               <div class="card md-4">
                  <div class="card-header">
                     <i class="fas fa-table mr-1"></i>
                     Danh sách nhân viên
                  </div>
                  <div class="card-body row">
                     <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                           <thead>
                              <tr>
                                 <th>STT</th>
                                 <th>Mã nhân viên</th>
                                 <th>Tên nhân viên</th>
                                 
                              </tr>
                           </thead>
                           <tbody >
                              
                            @foreach ($nhanvien as $key=> $item)
                                <tr>
                                 <td>{{$key+1}}</td>
                                 <td>{{$item->maNV}}</td>
                                 <td>{{$item->tenNV}}</td>
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
                     Danh sách công việc
                  </div>
                  <div class="card-body row">
                     <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                           <thead>
                              <tr>
                                 <th>STT</th>
                                 <th>Mã công việc</th>
                                 <th>Tên công việc</th>
                                 
                                 <th>Xem</th>

                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($Congviec as $key=> $item)
                              @foreach ($chitiet as $chitet)
                              @if ($item->id_PB == $chitet->id_PB)
                              <tr>
                                 <td>{{$key+1}}</td>
                                 <td>{{$item->maCV}}</td>
                                 <td>{{$item->tenCV}}</td>
                                 <td><a href="" class="btn btn-primary"><i class="fas fa-eye"></i></a></td>
                              </tr>
                              @endif
                                
                              @endforeach
                                  
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