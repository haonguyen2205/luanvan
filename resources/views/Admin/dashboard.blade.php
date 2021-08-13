@extends('../admin_layout')
@section('admin_content')

    <h1> thống kê tổng quát </h1>
    <div class="market-updates">
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-2">
					<div class="col-md-2 market-update-right">
						<i class="fa fa-total"> </i>
					</div>
					 <div class="col-md-10 market-update-left">
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

<!-- -----------thống kê khác -->

<h1> Thống kê người ở </h1>

	<div class="market-updates">
			<div class="col-md-3 market-update-gd" >
				<div class="market-update-block clr-block-2" style="background-color: goldenrod;">
					<div class="col-md-2 ">
						<i class="fa fa-user"> </i>
					</div>
					 <div class="col-md-10 ">
					 <h4>người ở tại ks</h4>
					<h3>{{$songuoi}}</h3>
					<p>số khách ở trong ngày</p>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			
		   <div class="clearfix"> </div>
	</div>
<!-- ---------------thống kê khác------------------ -->
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
