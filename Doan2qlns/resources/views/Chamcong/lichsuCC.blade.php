@extends('index')
@section('content')
<div id="layoutSidenav_content">
   <main>
      </form>
      <div class="container-fluid">
         <h1 class="mt-4">Chấm công</h1>
         <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Lịch sử chấm công {{date("d-m-Y")}} </li>
         </ol>
         <div class="row">
            <div class="col-md-12">
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
                                 <th>Tên nhân viên</th>
                                 <th>Trạng thái</th>
                              </tr>
                           </thead>
                           <tbody>
                             
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
