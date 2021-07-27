@extends('../admin_layout')
@section('admin_content')

	<div class="row">
		@if(Session::has('mes_diemdanh'))
			<A class="btn btn-success" href="{{URL::to('/diemdanhra')}}"> điểm danh ra</A>
		@else
			<A class="btn btn-success" href="{{URL::to('/diemdanh')}}">điểm danh</A>
		@endif
	</div>
    <h1> thông tin thống kê 2 </h1>
    <div class="market-updates">
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-2">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-eye"> </i>
					</div>
					 <div class="col-md-8 market-update-left">
					 <h4>Visitors</h4>
					<h3>13,500</h3>
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
					<h4>Users</h4>
						<h3>1,250</h3>
						<p>Other hand, we denounce</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-usd"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Sales</h4>
						<h3>1,500</h3>
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
						<h4>Orders</h4>
						<h3>1,500</h3>
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
