@extends('index')
@section('content')
<div id="layoutSidenav_content">
   <main>
      <div class="container-fluid">
         <h1 class="mt-4">Lương</h1>
         <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Thêm Bảng lương</li>
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


		<form action="{{ route('them_BL') }}" method="post">
			@csrf
			<div class="row">
				<div class="col-md-6">
					<label class="form-label">Tên bảng lương</label>
			<input type="text" class="form-control" name="salaryLogName">
				</div>
				<div class="col-md-6">
					<label class="form-label">Mã phiếu</label>
			<input type="text" class="form-control" name="salaryCodeName" value="{{$tenphieu}}">
				</div>
				<div class="col-md-6">
					<label for="" class="form-label">Ngày bắt đầu</label>
					<input type="date" class="form-control" name="dateStarted" id="dateStarted" min="{{$d1}}" onchange="checkDates()">
				</div>
				<div class="col-md-6">
					<label for="" class="form-label">Ngày bắt đầu</label>
					<input type="date" class="form-control" name="dateEnded" id="dateEnded" min="{{$d2}}" onchange="checkDates()">
				</div>
				<div class="col-md-12" style="margin-top: 20px">
					<button type="submit" class="btn btn-primary">Tạo bảng lương</button>
				</div>
			</div>
			
			
		
			
			
			
			
		</form>
         
      </div>
   </main>

</div>
@endsection

@push('scripts')

	<script>
		function checkDates(){
			var d1 = new Date($("#dateStarted").val());
			var d2 = new Date($("#dateEnded").val());
			if (d1.getTime() > d2.getTime()) {
				alert("Ngày bắt đầu không thể lớn hơn ngày kết thúc");
			}
	
			if (d1.getTime() === d2.getTime()){
				alert("Ngày bắt đầu không thể bằng ngày kết thúc");
			}
			
		}
	</script>
@endpush