@extends('admin_layout')
@section('admin_content')
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Manufacture</h2>
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
			<form class="form-horizontal" action="{{url('/save_manufacture')}}" method="post">
				{{ csrf_field() }}
			  <fieldset>
				<div class="control-group">
				  <label class="control-label" for="date01">Manufacture Name</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" name="manufacture_name" required="">
				  </div>
				</div>          
				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">Manufacture Description</label>
				  <div class="controls">
					<textarea type="text" class="cleditor" name="manufacture_description" rows="3" required=""></textarea>
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="date01">Publication Status</label>
				  <div class="controls">
					<input type="checkbox" name="publication_status" value="1">
				  </div>
				</div> 
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Add Manufacture</button>
				  <button type="reset" class="btn">Cancel</button>
				</div>
			  </fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->
@endsection