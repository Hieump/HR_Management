@extends('index')
@section('content')
<div id="layoutSidenav_content">
   <main>
      <div class="container-fluid">
         <h1 class="mt-4">Tài khoản</h1>
         <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Sửa tài khoản</li>
         </ol>

		 <form class="row g-3 container" enctype="multipart/form-data" method="post" >
			@csrf
			<div class="col-md-6">
				<label  class="form-label">Họ tên</label>
				<input type="text" value="{{$users->tenNV}}" class="form-control" name="hoten">
			</div>
			<div class="col-md-2">
				<label for="" class="form-label">Mã nhân viên</label>
				<input type="text" value="{{$users->maNV}}"  class="form-control" name="manv">
			</div>
			<div class="col-md-4">
				<fieldset class="row mb-3">
					<legend class="col-form-label col-sm-3 pt-0">Giới tính</legend>
					<div class="col-sm-9">
						<div class="row">
							<div class="form-check col-md-3">
								<input class="form-check-input" type="radio" name="gioitinh"  value="nam" checked>
								<label class="form-check-label" for="gridRadios1">
								  Nam 
								</label>
							  </div>
							  <div class="form-check col-md-2">
								<input class="form-check-input" type="radio" name="gioitinh"  value="nữ">
								<label class="form-check-label" for="gridRadios2">
								  Nữ
								</label>
							  </div>
						</div>
					</div>
				  </fieldset>
			</div>
			<div class=" col-md-12">
				<img src="source/anh/{{$users->anh}}" style="height: 50px; width: 50px" id="uploadImg">
				<label for="" class="form-label" >Hình ảnh</label>
			
				<input type="file" class="form-control"  name="hinh" id="imgUpload" >
			
			</div>
			<div class="col-md-6">
			  <label for="inputEmail4" class="form-label">Email</label>
			  <input type="email" class="form-control" value="{{$users->email}}" name = "email" id="inputEmail4">
			</div>
			<div class="col-md-6">
			  <label for="inputPassword4" class="form-label">Password</label>
			  <input type="text" name="password" value="{{$users->matkhau}}" class="form-control" id="inputPassword4">
			</div>
			<div class="col-md-6">
				<label for="" class="form-label">Số điện thoại</label>
				<input type="text" class="form-control" value="{{$users->sdt}}" name="sdt">
			</div>
			<div class="col-md-6">
				<label for="" class="form-label">Số CMND</label>
				<input type="text" value="{{$users->soCM}}" class="form-control" name="soCMND">
			</div>
			<div class="col-md-4">
				<label for="" class="form-label">Địa chỉ</label>
				<input type="text" class="form-control" value="{{$users->diachi}}" name="diachi">
			</div>
			<div class="col-md-4">
				<label for="" class="form-label">Quê quán</label>
				<input type="text" class="form-control" value="{{$users->quequan}}" name="quequan">
			</div>
			<div  class="col-md-4">
				<label for="birthday">Ngày sinh</label>
				<input type="date" id="birthday" name="birthday" value="{{$users->ngaysinh}}" class="form-control">
			</div>
			
			<div  class="col-md-4">
			  <label for="inputState" class="form-label">Quyền hạn</label>
			  <select id="inputState" name="quyenhan" class="form-control"  class="form-select">
				<option value="0"> Giám đốc</option>
				<option value="1">Trưởng phòng</option>
				<option value="2">Phó phòng</option>
				<option value="3">Nhân viên</option>
			  </select>
			</div>

			<div class="col-12" style="margin-top: 20px;">
			  <button type="submit" class="btn btn-primary">Thêm mới </button>
			</div>
		  </form>
         
      </div>
   </main>

</div>
@endsection

@push('scripts')
<script>
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#uploadImg').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
  
}

$("#imgUpload").change(function() {

  readURL(this);
});


</script>

@endpush