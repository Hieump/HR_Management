@extends('index')
@section('content')
<div id="layoutSidenav_content">
   <main>
      <div class="container-fluid">
         <h1 class="mt-4">Công việc </h1>
         <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Thêm công việc</li>
         </ol>
         
		 <form class="row g-3 container" enctype="multipart/form-data" method="post" >
			@csrf
			<input type="hidden" name="id_PB" value="{{$idPB}}">
			<div class="col-md-6">
				<label  class="form-label">Tên công việc</label>
				<input type="text" class="form-control" name="tenCV">
			</div>
			<div class="col-md-2">
				<label for=""  class="form-label">Mã công việc</label>
				<input type="text"  value="{{$id}}"  class="form-control" name="maCV">
			</div>
			
			<div class="col-12" style="margin-top: 20px;">
			  <button type="submit" class="btn btn-primary" >Thêm mới </button>
			</div>
		  </form>
         
      </div>
   </main>

</div>
@endsection