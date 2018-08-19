@extends('admin_layout')
@section('admin_content')
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span>All Manufacture</h2>
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
					  <th>Manufacture ID</th>
					  <th>Manufacture Name</th>
					  <th>Manufacture Description</th>
					  <th>Publication Status</th>
					  <th>Actions</th>
				  </tr>
			  </thead>   
			  <tbody>

			  	@foreach($all_manufacture_info as $manufacture_info)

				<tr>
					<td>{{ $manufacture_info->manufacture_id }}</td>
					<td>{{ $manufacture_info->manufacture_name }}</td>
					<td>{{ $manufacture_info->manufacture_description }}</td>
					<td>

						@if( $manufacture_info->publication_status == 1 )
						<span class="label label-success"> Active </span>
						@else
						<span class="label label-danger"> Unactive </span>
						@endif

					</td>
					<td class="center">

						@if( $manufacture_info->publication_status == 1 )
						<a class="btn btn-danger" href="{{URL::to('/unactive_manufacture/'.$manufacture_info->manufacture_id)}}">
							<i class="halflings-icon white thumbs-down"></i>  
						</a>
						@else
						<a class="btn btn-success" href="{{URL::to('/active_manufacture/'.$manufacture_info->manufacture_id)}}">
							<i class="halflings-icon white thumbs-up"></i>  
						</a>
						@endif

						<a class="btn btn-info" href="{{URL::to('/edit_manufacture/'.$manufacture_info->manufacture_id)}}">
							<i class="halflings-icon white edit"></i>  
						</a>
						<a class="btn btn-danger" href="{{URL::to('/delete_manufacture/'.$manufacture_info->manufacture_id)}}" id="delete">
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