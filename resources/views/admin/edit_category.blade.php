@extends('admin_layout')
@section('admin_content')
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Update Category</h2>
		</div>
		<div class="box-content">
			<p class="alert-success" style="font-size:20px; color: green;">
				<?php 

				$message = Session::get('message');

				if($message){
					echo $message;
					Session::put('message',null);
				}

				?>
			</p>


			<form class="form-horizontal" action="{{url('/update_category',$category_info->category_id)}}" method="post">
				{{ csrf_field() }}
			  <fieldset>
				<div class="control-group">
				  <label class="control-label" for="date01">Category Name</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" name="category_name" value="{{ $category_info->category_name }}">
				  </div>
				</div>          
				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">Category Description</label>
				  <div class="controls">
					<textarea type="text" class="input-xlarge" name="category_description">{{ $category_info->category_description }}</textarea> 
				  </div>
				</div>
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Update Category</button>
				</div>
			  </fieldset>
			</form> 
 

		</div>
	</div><!--/span-->

</div><!--/row-->
@endsection