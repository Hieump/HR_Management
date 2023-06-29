@extends('index')
@section('content')
<div id="layoutSidenav_content">
   <main>
      <div class="container-fluid">
         <h1 class="mt-4">Nhân viên</h1>
         <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Thêm nhân viên</li>
         </ol>
         
         <form class="row g-3 container">
			<div class="col-md-6">
				<label  class="form-label">Họ tên</label>
				<input type="text" class="form-control" name="hoten">
			</div>
			<div class="col-md-2">
				<label for="" class="form-label">Mã nhân viên</label>
				<input type="text" class="form-control" name="manv">
			</div>
			<div class="col-md-4">
				<fieldset class="row mb-3">
					<legend class="col-form-label col-sm-3 pt-0">Giới tính</legend>
					<div class="col-sm-9">
						<div class="row">
							<div class="form-check col-md-3">
								<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
								<label class="form-check-label" for="gridRadios1">
								  Nam 
								</label>
							  </div>
							  <div class="form-check col-md-2">
								<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
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
				
				<input type="file" class="form-control" id="inputGroupFile02">
			  </div>
			<div class="col-md-6">
			  <label for="inputEmail4" class="form-label">Email</label>
			  <input type="email" class="form-control" id="inputEmail4">
			</div>
			<div class="col-md-6">
			  <label for="inputPassword4" class="form-label">Password</label>
			  <input type="password" class="form-control" id="inputPassword4">
			</div>
			<div class="col-md-6">
				<label for="" class="form-label">Số điện thoại</label>
				<input type="text" class="form-control" name="sdt">
			</div>
			<div class="col-md-6">
				<label for="" class="form-label">Số CMND</label>
				<input type="text" class="form-control" name="soCMND">
			</div>
			<div class="col-md-6">
				<label for="" class="form-label">Địa chỉ</label>
				<input type="text" class="form-control" name="diachi">
			</div>
			<div class="col-md-6">
				<label for="" class="form-label">Quê quán</label>
				<input type="text" class="form-control" name="quequan">
			</div>
			
			<div style="margin-top: 20px;" class="col-md-4">
			  <label for="inputState" class="form-label">Chức vụ</label>
			  <select id="inputState" class="form-select">
				<option> Giám đốc</option>
				<option>Trưởng phòng</option>
				<option>Phó phòng</option>
				<option>Nhân viên</option>
			  </select>
            </div>
            <div style="margin-top: 20px;" class="col-md-4">
                <label for="inputState" class="form-label">Phòng ban</label>
                <select id="inputState" class="form-select">
                  <option> Phòng nhân sự</option>
                  <option>Phòng tài chính</option>
                  <option>Phó phòng</option>
                  <option>Nhân viên</option>
                </select>
              </div>

			<div class="col-12">
			  <button type="submit" class="btn btn-primary">Thêm mới</button>
			</div>
		  </form>
         
      </div>
   </main>

</div>
@endsection