@extends('index')
@section('content')
<div id="layoutSidenav_content">
   <main>
     
      <div class="container-fluid">
         <h1 class="mt-4">Phòng ban</h1>
         <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Danh sách phòng ban</li>
         </ol>
         <div>
            @if (count($errors)>0)
               @foreach ($errors->all() as $item)
                  <div class="alert alert-danger">
                     {{$item}}
                  </div>
               @endforeach
            @endif
            @if(Session::has('thongbao'))
            <div class="alert alert-danger">{{Session::get('thongbao')}}
            </div>
   
            @endif
         </div>
         <div class="row">
            <div class="col-md-10"></div>
            <div style="margin-bottom: 20px" class="col-md-2">
               <a href="phongban/themmoiphongban" class="btn btn-outline-primary" ><i class="fas fa-plus"></i>Tạo mới</a>
            </div>
            <div class="col-md-12">
               <div class="card md-4">
                  <div class="card-header">
                     <i class="fas fa-table mr-1"></i>
                     Danh sách phòng ban
                  </div>
                  <div class="card-body row">
                     <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                           <thead>
                              <tr>
                                 <th>STT</th>
                                 <th>Mã phòng ban</th>
                                 <th>Tên Phòng ban</th>
                                 <th>Xem</th>

                              </tr>
                           </thead>
                           <tbody >
                              @foreach ($Danhsach as $key => $danhsach)
                             
                              <tr>
                                 <td>{{$key+1}}</td>
                                 <td>{{$danhsach->ma_PB}}</td>
                                 <td>{{$danhsach->ten_PB}}</td>
                                 <td><a href="{{route('chitiet_PB', $danhsach->id_PB)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a></td>
                                
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