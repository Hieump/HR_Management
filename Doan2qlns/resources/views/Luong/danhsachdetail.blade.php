@extends('index')
@section('content')
<div id="layoutSidenav_content">
   <main>
      <div class="container-fluid">
         <h1 class="mt-4">Lương </h1>
         <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Danh sách bảng lương</li>
         </ol>
        
         <form>
             @csrf
             <input>
         </form>
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
                                 <th>Mã Nhân Viên</th>
                                 <th>Tên nhân viên</th>
                                 <th>Ngày công</th>
                                 <th>Lương</th>
                                 <th>Hành động</th>
                             

                                 {{-- <th>Xem</th>   
                                 @if (session()->get('quyen') == 0 || session()->get('quyen')==1 ||session()->get('quyen')==2)                                                      
                                 <th>Sửa</th>
                                 <th>Xóa</th>
                                 @endif --}}
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($collection as $index => $cong)
                                 <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$cong->get('code')}}</td>
                                    <td>{{$cong->get('name')}}</td>
                                    <td>{{$cong->get('ngaycong')}}</td>
                                    <td>{{$cong->get('salary')}}</td>
                                    <td>
                                        @if($cong->get('status') == 0) 
                                        <button class="btn btn-success" onclick="chamcong(this,{{$cong->get('id')}} , {{$cong->get('id_BL')}})">Trả lương</button>
                                        @else
                                        <button class="btn btn-danger" onclick="chamcong(this,{{$cong->get('id')}} , {{$cong->get('id_BL')}})">Đã trả lương</button>
                                        @endif
                                       
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

@push('scripts')
    <script>
           function chamcong(event,id,id_BL){
               console.log(id);
                // var id = $(event).attr('value');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('traluongajax') }}",
                    method:"POST",
                    data:{diemdanh: id, id_BL: id_BL, _token:_token},
                    success:function(data){ 
                        if ($(event).html() == "Trả lương"){
                            $(event).html('Đã trả lương');
                            $(event).attr("class","btn btn-danger");
                        }
                        else {
                            $(event).html('Trả lương');
                            $(event).attr("class","btn btn-success");
                        }
                    }
                });
            
            }
    </script>
@endpush