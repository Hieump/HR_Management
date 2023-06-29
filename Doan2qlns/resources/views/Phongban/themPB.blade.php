@extends('index')
@section('content')
<div id="layoutSidenav_content">
   <main>
      <div class="container-fluid">
         <h1 class="mt-4">Phòng ban</h1>
         <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Thêm mới phòng ban</li>
         </ol>
         <div class="row">
            <form class="row g-3 container"  enctype="multipart/form-data" method="post" action="{{route('them_PB')}}">
               @csrf
               <div class="col-md-6">
                  <label  class="form-label">Tên phòng ban</label>
                  <input type="text" class="form-control" name="tenPB">
               </div>
               <div class="col-md-2">
                  <label for="" class="form-label">Mã phòng ban</label>
                  <input type="text" value="{{$id}}" class="form-control"  name="maPB">
               </div>  
               <div class="col-12" style="margin-top: 20px;">
                  <button type="submit" class="btn btn-primary">Thêm mới </button>
                </div>
               
              </form>
         </div>
      </div>
   </main>
</div>
@endsection