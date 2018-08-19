@extends('admin_layout')
@section('admin_content')
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span>All Order</h2>
		</div>


		<p class="alert-success" style="font-size:20px; color: green;">
				<?php 

				$message = Session::get('message');

				if($message){
					echo $message;
					Session::put('message',null);
				}

				?>
		</p>


		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>Order ID</th>
					  <th>Customer Name</th>
					  <th>Order Total</th>
					  <th>Status</th>
					  <th>Actions</th>
				  </tr>
			  </thead>   
			  <tbody>

			  	@foreach($all_order_info as $order_info)

				<tr>
					<td>{{ $order_info->order_id }}</td>
					<td>{{ $order_info->customer_name }}</td>
					<td>{{ $order_info->order_total }}</td>
					<td>{{ $order_info->order_status }}</td>
					<td class="center">

						<a class="btn btn-danger" href="{{URL::to('/unactive/'.$order_info->order_id)}}">
							<i class="halflings-icon white thumbs-down"></i>  
						</a>

					<!-- 	<a class="btn btn-success" href="{{URL::to('/active/'.$order_info->order_id)}}">
							<i class="halflings-icon white thumbs-up"></i>  
						</a> -->


						<a class="btn btn-info" href="{{URL::to('/view_order/'.$order_info->order_id)}}">
							<i class="halflings-icon white view"></i>  
						</a>
						<a class="btn btn-danger" href="{{URL::to('/delete/'.$order_info->order_id)}}" id="delete">
							<i class="halflings-icon white trash"></i> 
						</a>
					</td>
				</tr>

				@endforeach

			  </tbody>
		  </table>            
		</div>
	</div><!--/span-->

</div><!--/row-->
@endsection