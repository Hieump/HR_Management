<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <title>Quản lý nhân sự</title>
      <base href="{{asset('')}}">
      <link href="source/dist/css/styles.css " rel="stylesheet" />
      <link href="source/dist/css/nhanvien.css " rel="stylesheet" />
      <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
   </head>
   <body class="sb-nav-fixed">
      <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
         <a class="navbar-brand" href="tongquan/trangchu">Quản lý nhân sự </a>
         <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
         <!-- Navbar Search-->
         <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
            </div>
         </form>
         <!-- Navbar-->
         <ul class="navbar-nav ml-auto ml-md-0">
            <div class="nav-item dropdown ">
             
               <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="source/anh/{{session()->get('avt')}}" alt="Avatar" style="width:40px; height:40px;  border-radius: 50%;"></a>
      
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="{{ route('chitet_NV', ['id'=>session()->get('id')]) }}">Thông tin</a>
                  
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
               </div>
            </div>
         </ul>
      </nav>
      <div id="layoutSidenav">
         <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
               <div class="sb-sidenav-menu">
                  <div class="nav">
                     <div class="sb-sidenav-menu-heading">Core</div>
                     <a class="nav-link" href="tongquan/trangchu">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Tổng quan
                     </a>
                     @if (session()->get('quyen') == 3 || session()->get('quyen')==0)
                     <a class="nav-link" href="nhanvien/nghiphep">
                        <div class="sb-nav-link-icon"><i class="fas fa-calendar-day"></i></div>
                        Xin nghỉ phép
                     </a>
                     @endif
                     @if (session()->get('quyen') == 0 || session()->get('quyen')==1 ||session()->get('quyen')==2)
                     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-search"></i></div>
                        Tuyển dụng
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                     </a>
                    
                     <div class="collapse" id="collapsePages1" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                              Phỏng vấn
                              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                           </a>
                           <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                              <nav class="sb-sidenav-menu-nested nav">
                                 <a class="nav-link" href="login.html">Lịch phỏng vấn</a>
                                 <a class="nav-link" href="register.html">Register</a>
                                 <a class="nav-link" href="password.html">Forgot Password</a>
                              </nav>
                           </div>
                           <a class="nav-link" href="nhanvien/nghiphep">
                              <div class="sb-nav-link-icon"></div>
                              Danh sách tuyển dụng
                           </a>
                        </nav>
                     </div>
                     @endif
                     @if (session()->get('quyen') == 0 || session()->get('quyen')==1 ||session()->get('quyen')==2)
                     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fab fa-buffer"></i></div>
                        Phòng ban
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                     </a>
                     <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                           <a class="nav-link" href="phongban/danhsachphongban">Danh sách phòng ban</a>
                           <a class="nav-link" href="phongban/themmoiphongban">Thêm mới phòng ban</a>
                        </nav>
                     </div>
                     @endif
                     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Nhân sự
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                     </a>
                     <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                           <a class="nav-link" href="nhanvien/danhsachnhanvien">Danh sách nhân viên</a>
                           <a class="nav-link" href="quantri/themTK">Thêm nhân viên </a>
                        </nav>
                     </div>
                     @if ( session()->get('quyen')==1 )
                     <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseLayouts4" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
                        Chấm công
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                     </a>
                     <div class="collapse" id="collapseLayouts4" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                           <a class="nav-link" href="quantri/chamcong">Danh sách</a>
                           <a class="nav-link" href="quantri/lichsuchamcong">Lịch sử chấm công</a>
                        </nav>
                     </div>
                     @endif
                     @if (session()->get('quyen') == 0 || session()->get('quyen')==1 ||session()->get('quyen')==2)
                     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-money-bill-wave"></i></div>
                        Tính lương
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                     </a>
                     <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                           <a class="nav-link" href="luong/danhsachluong">Danh sách lương </a>
                           <a class="nav-link" href="luong/themluong">Thêm mới bảng lương</a>
                        </nav>
                     </div>
                     @endif
                     @if (session()->get('quyen') == 0 || session()->get('quyen')==1 ||session()->get('quyen')==2)
                     <div class="sb-sidenav-menu-heading">System</div>
                     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts5" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-pie"></i></i></div>
                        Quản trị
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                     </a>
                     <div class="collapse" id="collapseLayouts5" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                           <a class="nav-link" href="quantri/danhsachtaikhoan">Danh sách tài khoản</a>
                           @if (session()->get('quyen') == 0 || session()->get('quyen')==1)
                           <a class="nav-link" href="quantri/themTK">Thêm tài khoản</a>
                           <a class="nav-link" href="quantri/themcongviec">Thêm chức vụ</a>
                           @endif
                        </nav>
                     </div>
                     @endif
                  </div>
               </div>
               <div class="sb-sidenav-footer">
                  <div class="small">Logged in as:</div>
                  {{session()->get('name')}}
               </div>
            </nav>
         </div>
         @yield('content')
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
      <script src="{{ asset('source/dist/js/scripts.js') }}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
      <script src="{{ asset('source/dist/assets/demo/chart-area-demo.js') }}"></script>
      <script src="{{ asset('source/dist/assets/demo/chart-bar-demo.js') }}"></script>
      <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
      <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
      <script src="{{ asset('source/dist/assets/demo/datatables-demo.js') }}"></script>
      @stack('scripts')
   </body>
</html>