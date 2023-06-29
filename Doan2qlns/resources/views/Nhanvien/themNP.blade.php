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
               <li class="breadcrumb-item active">Thêm mới nghỉ phép</li>
            </ol>
         </div>
         <div class="row">
            <div class="col-md-3">
               <h4 >Thông tin xin nghỉ phép</h4>
               <h6>Thông tin chi tiết lý do, thời gian nghỉ phép</h6>
            </div>
            <div class="col-md-9">
               <form class="row g-3 container" enctype="multipart/form-data" method="post" action="{{route('them_nghiphep')}}">
                  @csrf
                  <div class="col-md-4">
                    <label for="inputPassword4" class="form-label">Ngày bắt đầu</label>
                    <input type="date" class="form-control" id="datePicker" name="ngaybatdau">
                  </div>
                  <div class="col-md-4">
                     <label for="inputPassword4" class="form-label">Ngày kết thúc</label>
                     <input type="date" class="form-control" id="datePicker1" name="ngayketthuc">
                   </div>
                   <div class="col-md-4">
                     <label for="inputPassword4" class="form-label">Số điện thoại liên hệ</label>
                     <input type="text" class="form-control" name="sdt" >
                   </div>
                   <div class="col-md-12">
                     <label for="inputPassword4" class="form-label">Lý do</label>
                     <input type="text" class="form-control" name="lydo" >
                   </div>
                   <div class="col-md-12">
                     <label for="inputPassword4" class="form-label">Ghi chú</label>
                     <input type="text" class="form-control" name="ghichu" >
                   </div>
               
                 
                  <div class="col-12" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-primary">Tạo mới </button>
                  </div>
                 </form>
            </div>
         </div>
      
       
      </div>
   </main>
</div>
@endsection

@push('scripts')
    <script>
       window.onload = function(){
         document.getElementById('datePicker').valueAsDate = new Date();
       }
   </script>
    
@endpush