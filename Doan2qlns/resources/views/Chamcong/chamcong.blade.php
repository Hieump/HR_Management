@extends('index')
@section('content')
<div id="layoutSidenav_content">
   <main>
      <form hidden>
         @csrf
         <input>
      </form>
      <div class="container-fluid">
         <h1 class="mt-4">Chấm công</h1>
         <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Danh sách chấm công ngày {{date("d-m-Y")}} </li>
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
                              @foreach ($nhanvien as $index => $item)
                              @php
                              $htmlButton = '';
                              @endphp
                              <tr>
                                 <td>{{$index+1}}</td>
                                 <td>{{$item->tenNV}}</td>
                                 <td>
                                    @php
                                    $htmlButton = '<button class="btn btn-success" value="'.$item->id.'" onclick="chamcong(this)">Điểm danh</button>';
                                    foreach ($getStatus as $status) {
                                    if ($status->id_NV == $item->id) {
                                    $htmlButton = '<button class="btn btn-danger" value="'.$item->id.'" onclick="chamcong(this)">Hủy điểm danh</button>';
                                    }
                                    }
                                    @endphp
                                    {!!$htmlButton!!}
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
</div>
@endsection
@push('scripts')
<script>
   function chamcong(event){
      var id = $(event).attr('value');
      var _token = $('input[name="_token"]').val();
      $.ajax({
         url:"{{ route('cham_cong') }}",
         method:"POST",
         data:{diemdanh: id, _token:_token},
         success:function(data){ 
            if ($(event).html() == "Điểm danh"){
               $(event).html('Hủy diểm danh');
               $(event).attr("class","btn btn-danger");
            }
            else {
               $(event).html('Điểm danh');
               $(event).attr("class","btn btn-success");
            }
         }
      });
   
   }
</script>
@endpush