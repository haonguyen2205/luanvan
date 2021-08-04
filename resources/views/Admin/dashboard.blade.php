@extends('../admin_layout')
@section('admin_content')

	<div class="form-group">
		@if(Session::has('mes_diemdanh'))
			<A class="btn btn-success" href="{{URL::to('/diemdanhra')}}"> chấm công ra</A>
		@else
			<A class="btn btn-success" href="{{URL::to('/diemdanh')}}">chấm công vào</A>
		@endif
	</div>
    <h1> thông tin thống kê </h1>
    <div class="market-updates">
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-2">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-total"> </i>
					</div>
					 <div class="col-md-8 market-update-left">
					 <h4>Total</h4>
					<h3>{{number_format($tongtien)}}</h3>
					<p>Other hand, we denounce</p>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<h4>Customer</h4>
						<h3>{{$count_cus}}</h3>
						<p>Other hand, we denounce</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Employees</h4>
						<h3>{{number_format($countuser)}}</h3>
						<p>Other hand, we denounce</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-4">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Order</h4>
						<h3>{{$count_order}}</h3>
						<p>Other hand, we denounce</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>
<!-- @if(Session::has('mes_diemdanh'))
  <script type="text/javascript" >
    swal("thông báo!","{{Session::Get('mes_diemdanh')}}","success",{
      button:"OK",
    });
  </script> 
@endif -->

@if(Session::has('mes_fails'))
  <script type="text/javascript" >
    swal("thông báo!","{{Session::Get('mes_fails')}}","error",{
      button:"OK",
    });
  </script> 
  <?php
    session::put('mes_fails',null);
  ?>
@endif

@if(Session::has('mes_diemdanhra'))
  <script type="text/javascript" >
    swal("thông báo!","{{Session::Get('mes_diemdanhra')}}","success",{
      button:"OK",
    });
  </script> 
  <?php
    session::put('mes_diemdanhra',null);
  ?>
@endif
<style type="text/">
	.timekeep{
		padding-left:20px;
		width: 100%;
		margin-bottom: 20px;
	}
</style>
@endsection
