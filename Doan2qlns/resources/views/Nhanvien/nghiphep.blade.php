@extends('index')
@section('content')
<div id="layoutSidenav_content">
   <main>
      <div class="container-fluid row">
         <div class="col-md-12">
            <h1 class="mt-4">Nhân viên </h1>
         </div>
         <div class="col-md-12">
            <ol class="breadcrumb mb-4">
               <li class="breadcrumb-item active">Danh sách nhân viên xin nghỉ phép</li>
            </ol>
            <div>
               @if (count($errors)>0)
                  @foreach ($errors->all() as $item)
                     <div class="alert alert-danger">
                        {{$item}}
                     </div>
                  @endforeach
               @endif
               @if(Session::has('chapthuan'))
               <div class="alert alert-success">{{Session::get('chapthuan')}}
               </div>
         
               @endif
            </div>
            <div>
               @if (count($errors)>0)
                  @foreach ($errors->all() as $item)
                     <div class="alert alert-danger">
                        {{$item}}
                     </div>
                  @endforeach
               @endif
               @if(Session::has('tuchoi'))
               <div class="alert alert-danger">{{Session::get('tuchoi')}}
               </div>
         
               @endif
            </div>
         </div>
         <div class="col-md-2">
            <div class="card">
               <div class="card-header">
                  Bộ lọc nghỉ phép
               </div>
               <div class="card-body">
                  <h5 class="card-title">Từ khóa</h5>
                  <div class="input-group md-form form-sm form-1 pl-0">
                     <div class="input-group-prepend">
                        <span class="input-group-text purple lighten-3" id="basic-text1"><i class="fas fa-user text-white"
                           aria-hidden="true"></i></span>
                     </div>
                     <input class="form-control my-0 py-1" type="text" placeholder="Search" aria-label="Search" id="employee_name">
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-10">
            @if ((session()->get('quyen') == 3 ))
               <div style="margin-bottom: 20px" class="col-md-2 float-right">
                  <a href="nhanvien/themmoinghiphep" class="btn btn-outline-primary " ><i class="fas fa-plus"></i>Tạo mới</a>
               </div>
            @endif
           
            <table class="table">
               <thead>
                  <tr>
                     <th scope="col">STT</th>
                     <th scope="col">Nhân viên</th>
                     <th scope="col">Lý do</th>
                     <th scope="col">Thời gian</th>
                     <th scope="col">Ngày tạo</th>
                     <th colspan="2" scope="col">Trạng thái</th>
                  </tr>
               </thead>
               <tbody id="employeeinfo">
                  @foreach ($danhsach as $key=> $item)
                  <tr>
                     <th scope="row">{{$key +1}}</th>
                     @foreach ($nhanvien as $user)
                     @if ($item->id_NV == $user->id)
                     <td>{{$user->tenNV}}</td>
                     @endif
                     @endforeach
                     <td>{{$item->lydo}}</td>
                     <td>{{$item->batdau}}-{{$item->ketthuc}}</td>
                     <td>{{$item->created_at}}</td>
                     @if (session()->get('quyen') == 0 || session()->get('quyen')==1)
                     <td>
                        <a href="{{ route('chapthuan', ['id'=>$item->id_NP]) }}" class="btn btn-primary">Chấp nhận</a>
                        <a href="{{ route('tuchoi', ['id'=>$item->id_NP]) }}" class="btn btn-danger">Từ chối</a>
                     </td>
                     @endif
                     @if (session()->get('quyen') == 2 || session()->get('quyen')==3)
                     <td>{{$item->tinhtrang}}</td>
                     @endif
                  </tr>
                  @endforeach
               </tbody>
            </table>
            <div class="row" style="text-align: center">{{$danhsach->links('pagination::bootstrap-4')}}</div>
         </div>
      </div>
   </main>
</div>
@endsection
@push('scripts')
<script>
   $(document).ready(function(){
       $('#employee_name').keyup(function(){ 
          $('#employeeinfo').html("");
          if ($(this).val().length > 2 && $(this).val() != ''){
   
             var query = $(this).val();
             var _token = $('input[name="_token"]').val();
             $.ajax({
                url: '{{route("getAjaxTable")}}',
                method:"GET", 
                data:{query:query, _token:_token},
                success:function(data){
                   $('#employeeinfo').fadeIn();  
                   $('#employeeinfo').html(data); 
                }
             });
          }
   
       });
    });
</script>
@endpush