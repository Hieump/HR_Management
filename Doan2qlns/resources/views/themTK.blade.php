@extends('index')
@section('content')
<div id="layoutSidenav_content">
   <main>
      <div class="container-fluid">
         <h1 class="mt-4">Tài khoản</h1>
         <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Thêm tài khoản</li>
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
			 <div class="alert alert-succes">{{Session::get('thongbao')}}
			 </div>

			 @endif
		 </div>
		 <form class="row g-3 container" enctype="multipart/form-data" method="post" action="{{route('them_TK')}}">
			@csrf
			<div class="col-md-6">
				<label  class="form-label">Họ tên</label>
				<input type="text" class="form-control" name="hoten">
			</div>
			<div class="col-md-2">
				<label for="" class="form-label">Mã nhân viên</label>
				<input type="text" value="{{$id}}"  class="form-control" name="manv">
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
				<label for="" class="form-label">Hình ảnh</label>
				<input type="file" class="form-control" name="hinh">
			  </div>
			<div class="col-md-6">
			  <label for="inputEmail4" class="form-label">Email</label>
			  <input type="email" class="form-control" name = "email" id="inputEmail4">
			</div>
			<div class="col-md-6">
			  <label for="inputPassword4" class="form-label">Password</label>
			  <input type="text" name="password" class="form-control" id="inputPassword4">
			</div>
			<div class="col-md-6">
				<label for="" class="form-label">Số điện thoại</label>
				<input type="text" class="form-control" name="sdt">
			</div>
			<div class="col-md-6">
				<label for="" class="form-label">Số CMND</label>
				<input type="text" class="form-control" name="soCMND">
			</div>
			<div class="col-md-4">
				<label for="" class="form-label">Địa chỉ</label>
				<input type="text" class="form-control" name="diachi">
			</div>
			<div class="col-md-4">
				<label for="" class="form-label">Quê quán</label>
				<input type="text" class="form-control" name="quequan">
			</div>
			<div  class="col-md-4">
				<label for="birthday">Ngày sinh</label>
				<input type="date" id="birthday" name="birthday" class="form-control">
			</div>
			
			<div  class="col-md-4">
			  <label for="inputState" class="form-label">Quyền hạn</label>
			  <select id="inputState" name="quyenhan" class="form-control" class="form-select">
				<option value="0"> Giám đốc</option>
				<option value="1">Trưởng phòng</option>
				<option value="2">Phó phòng</option>
				<option value="3">Nhân viên</option>
			  </select>
			</div>
			<div  class="col-md-4">
				<label for="hsluong">Hệ số lương</label>
				<input type="text" id="hsluong" name="hsluong" class="form-control">
			</div>

			<div class="col-12" style="margin-top: 20px;">
			  <button type="submit" class="btn btn-primary">Thêm mới </button>
			</div>
		  </form>
         
      </div>
   </main>

</div>
@endsection