@extends('admin_layout')
@section('admin_content')
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span>All Product</h2>
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
					  <th>Product ID</th>
					  <th>Product Name</th>
					  <th>Product Image</th>
					  <th>Product Price</th>
					  <th>Category Name</th>
					  <th>Manufacture Name</th>
					  <th>Status</th>
					  <th>Actions</th>
				  </tr>
			  </thead>   
			  <tbody>

			  	@foreach($all_product_info as $product_info)

				<tr>
					<td>{{ $product_info->product_id }}</td>
					<td>{{ $product_info->product_name }}</td>
					<td><img src="{{ URL::to($product_info->product_image) }}" class="img img-responsive" width="80px" height="80px"></td>
					<td>{{ $product_info->product_price }} Tk</td>
					<td>{{ $product_info->category_name }}</td>
					<td>{{ $product_info->manufacture_name }}</td>
					<td>

						@if( $product_info->publication_status == 1 )
						<span class="label label-success"> Active </span>
						@else
						<span class="label label-danger"> Unactive </span>
						@endif

					</td>
					<td class="center">

						@if( $product_info->publication_status == 1 )
						<a class="product_info btn-danger" href="{{URL::to('/unactive_product/'.$product_info->product_id)}}">
							<i class="halflings-icon white thumbs-down"></i>  
						</a>
						@else
						<a class="btn btn-success" href="{{URL::to('/active_product/'.$product_info->product_id)}}">
							<i class="halflings-icon white thumbs-up"></i>  
						</a>
						@endif

						<a class="btn btn-info" href="{{URL::to('/edit_product/'.$product_info->product_id)}}">
							<i class="halflings-icon white edit"></i>  
						</a>
						<a class="btn btn-danger" href="{{URL::to('/delete_product/'.$product_info->product_id)}}" id="delete">
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