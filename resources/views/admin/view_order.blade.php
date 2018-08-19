@extends('admin_layout')
@section('admin_content')
	<div class="box span6">
		<div class="box-header">
			<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Customer Details</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<table class="table">
				  <thead>
					  <tr>
						  <th>Username</th>
						  <th>Mobile Number</th>                                          
					  </tr>
				  </thead>   
				  <tbody>

				  	@foreach($order_by_id as $v_order)
				  	@endforeach

					<tr>
						<td>{{ $v_order->customer_name }}</td>
						<td class="center">{{ $v_order->mobile_number }}</td>                                      
					</tr>                                   
				  </tbody>
			 </table>   
		</div>
	</div><!--/span-->

	<div class="box span6">
		<div class="box-header">
			<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shipping Details</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<table class="table">
				  <thead>
					  <tr>
						  <th>Username</th>
						  <th>Address</th>                                          
						  <th>Mobile Number</th>                                          
						  <th>Email</th>                                          
					  </tr>
				  </thead>   
				  <tbody>

				  	@foreach($order_by_id as $v_order)
				  	@endforeach

					<tr>
						<td>{{ $v_order->shipping_first_name }}</td>
						<td class="center">{{ $v_order->shipping_address }}</td>                                      
						<td class="center">{{ $v_order->shipping_mobile_number }}</td>                                      
						<td class="center">{{ $v_order->shipping_email }}</td>                                      
					</tr>                                   
				  </tbody>
			 </table>   
		</div>
	</div><!--/span-->

	<div class="box span11">
		<div class="box-header">
			<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Order Details</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<table class="table">
				  <thead>
					  <tr>
						  <th>ID</th>
						  <th>Product Name</th>                                          
						  <th>Product Price</th>                                          
						  <th>Product Sales Quantity</th>                                          
						  <th>Product Sub Total</th>                                          
					  </tr>
				  </thead>   
				  <tbody>

				  	@foreach($order_by_id as $v_order)
				  	
					<tr>
						<td>{{ $v_order->order_id }}</td>
						<td class="center">{{ $v_order->product_name }}</td>                                      
						<td class="center">{{ $v_order->product_price }}</td>                                      
						<td class="center">{{ $v_order->product_sales_quantity }}</td>                                      
						<td class="center">{{ $v_order->product_price*$v_order->product_sales_quantity }}</td>                                       
					</tr>  

					@endforeach

				  </tbody>
				  <tfoot>
				  	<tr>
				  		<td colspan="4">Total With Vat :</td>
				  		<td><strong>={{ $v_order->order_total }} Tk</strong></td>
				  	</tr>
				  </tfoot>
			 </table>   
		</div>
	</div><!--/span-->
@endsection