@extends('index')
@section('content')
<div id="layoutSidenav_content">
   <main>
      <div class="container-fluid">
         <h1 class="mt-4">Nhân viên </h1>
         <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Chi tiết nhân viên</li>
         </ol>
        <div class="row">
            <div class="col-md-2">
                <img class="anh" src="source/anh/{{$chitiet->anh}}" class="img-thumbnail" alt="">
            </div>
            <div class="col-md-9">
                <div><h3 class="chu">{{$chitiet->tenNV}}</h3></div>
                <div><h5 class="chu">Mã nhân viên: {{$chitiet->maNV}}</h5></div>
                <div><h5 class="chu">Email: {{$chitiet->email}}</h5></div>
                <div><h5 class="chu">Số điện thoại: {{$chitiet->sdt}}</h5></div>
                <div>Tên phòng ban</div>
                <div>Tình trạng</div>
            </div>
        </div>
        <div style="margin-top: 30px;">
            <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'soyeulylich')" id="defaultOpen">Sơ yếu lý lịch</button>
                <button class="tablinks" onclick="openCity(event, 'taikhoan')">Tài khoản</button>
                <button class="tablinks" onclick="openCity(event, 'nghiphep')">Nghỉ phép </button>
                <button class="tablinks" onclick="openCity(event, 'khenthuongkhiluat')">Khen thưởng kỉ luật</button>
              </div>
              
              <div id="soyeulylich" class="tabcontent">
                
                <div style="margin-top: 10px;" class="row">
                    <div class="col-sm-2">
                        <label for="">Giới tính</label>
                    </div>
                    <div class="col-sm-7 " style=" font-size: 18px;">
                        <input style="height: 30px;" size="40" type="text" disabled value="{{$chitiet->gioitinh}}">
                    </div>
                </div>
                <div style="margin-top: 10px;" class="row">
                    <div class="col-sm-2">
                        <label for="">Ngày sinh</label>
                    </div>
                    <div class="col-sm-7" style=" font-size: 18px;">
                        <input size="40" style="height: 30px;" type="text" disabled  value="{{$chitiet->ngaysinh}}">
                    </div>
                </div>
                <div style="margin-top: 10px;" class="row">
                    <div class="col-sm-2">
                        <label for="">Số CMNN</label>
                    </div>
                    <div class="col-sm-7" style=" font-size: 18px;">
                        <input size="40" type="text" style="height: 30px;" disabled value="{{$chitiet->soCM}}">
                    </div>
                </div>
                <div style="margin-top: 10px;" class="row">
                    <div class="col-sm-2">
                        <label for="">Địa chỉ</label>
                    </div>
                    <div class="col-sm-7" style=" font-size: 18px;">
                        <input size="40" type="text" style="height: 30px;" disabled  value="{{$chitiet->diachi}}">
                    </div>
                </div>
                <div style="margin-top: 10px;" class="row">
                    <div class="col-sm-2">
                        <label for="">Dân tộc</label>
                    </div>
                    <div class="col-sm-7" style=" font-size: 18px;">
                        <input size="40" type="text" style="height: 30px;" disabled >
                    </div>
                </div>
                <div style="margin-top: 10px;" class="row">
                    <div class="col-sm-2">
                        <label for="">Tôn giáo</label>
                    </div>
                    <div class="col-sm-7" style=" font-size: 18px;">
                        <input size="40" type="text" style="height: 30px;" disabled value="Không">
                    </div>
                </div>
                <div style="margin-top: 10px;" class="row">
                    <div class="col-sm-2">
                        <label for="">Quê quán</label>
                    </div>
                    <div class="col-sm-7" style=" font-size: 18px;">
                        <input size="40" type="text" style="height: 30px;" disabled value="{{$chitiet->quequan}}">
                    </div>
                </div>
                
              </div>
              
              <div id="taikhoan" class="tabcontent">
                <div style="margin-top: 10px;" class="row">
                    <div class="col-sm-2">
                        <label for="">Tên đăng nhập</label>
                    </div>
                    <div class="col-sm-7">
                        <input size="40" type="text" value="{{$chitiet->email}}">
                    </div>
                </div>
                <div style="margin-top: 10px;" class="row">
                    <div class="col-sm-2">
                        <label for="">Mật khẩu</label>
                    </div>
                    <div class="col-sm-7">
                        <input size="40" type="text" value="{{$chitiet->matkhau}}">
                    </div>
                </div>
                <div style="margin-top: 10px;" class="row">
                    <div class="col-sm-2">
                        <label for="">Ngày tạo</label>
                    </div>
                    <div class="col-sm-7">
                        <input size="40" type="text" value="{{$chitiet->created_at}}">
                    </div>
                </div>
              </div>
              
              <div id="nghiphep" class="tabcontent">
                <div style="margin-top: 10px;" class="row">
                    <div class="col-sm-2">
                        <label for="">Số lần nghỉ</label>
                    </div>
                    <div class="col-sm-7">
                        <input size="40" type="text" value="">
                    </div>
                </div>
                <div style="margin-top: 10px;" class="row">
                    <div class="col-sm-2">
                        <label for="">Số giờ nghỉ</label>
                    </div>
                    <div class="col-sm-7">
                        <input size="40" type="text" value="">
                    </div>
                </div>
              </div>
              <div id="khenthuongkhiluat" class="tabcontent">
        
                <div style="margin-top: 10px;" class="row">
                    <div class="col-sm-2">
                        <label for="">Khen thưởng</label>
                    </div>
                    <div class="col-sm-7">
                        <input size="40" type="text" value="">
                    </div>
                </div>
                <div style="margin-top: 10px;" class="row">
                    <div class="col-sm-2">
                        <label for="">Khỉ luật</label>
                    </div>
                    <div class="col-sm-7">
                        <input size="40" type="text" value="">
                    </div>
                </div>
              </div>
              
              
              
        </div>

        
      </div>
   </main>
   
</div>
<script>
    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }
    
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
    </script>
@endsection