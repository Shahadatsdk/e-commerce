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
			<form class="form-horizontal" action="{{url('/save_product')}}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
			  <fieldset>
			  	<div class="control-group">
				  <label class="control-label" for="date01">Product Name</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" name="product_name" required="">
				  </div>
				</div>  
				<div class="control-group">
				  <label class="control-label" for="date01">Product Category</label>
				  <div class="controls">
					  <select id="selectError3" name="category_id">

	                    <option value="">--Select Category--</option>

					  	<?php 

	                    $all_category_info = DB::table('category_tbl')->where('publication_status',1)->get();

	                    foreach ($all_category_info as $category) {

	                    ?>

						<option value="<?php echo $category->category_id ?>"><?php echo $category->category_name ?></option>

						<?php } ?>

					  </select>
					</div>
				</div>      
				<div class="control-group">
				  <label class="control-label" for="date01">Manufacture Category</label>
				  <div class="controls">
					  <select id="selectError3" name="manufacture_id">

	                    <option value="">--Select Manufacture--</option>

						<?php 

	                    $all_manufacture_info = DB::table('manufacture_tbl')->where('publication_status',1)->get();

	                    foreach ($all_manufacture_info as $manufacture) {

	                    ?>

						<option value="<?php echo $manufacture->manufacture_id ?>"><?php echo $manufacture->manufacture_name ?></option>

						<?php } ?>

					  </select>
					</div>
				</div>          
				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">Product Short Description</label>
				  <div class="controls">
					<textarea type="text" class="cleditor" name="product_short_description" rows="3" required=""></textarea>
				  </div>
				</div>
				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">Product Long Description</label>
				  <div class="controls">
					<textarea type="text" class="cleditor" name="product_long_description" rows="3" required=""></textarea>
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="date01">Product Price</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" name="product_price" required="">
				  </div>
				</div> 
				<div class="control-group">
				  <label class="control-label" for="fileInput">Product Image</label>
					  <div class="controls">
						<input class="input-file uniform_on" name="product_image" id="fileInput" type="file" required="">
					  </div>
				</div> 
				<div class="control-group">
				  <label class="control-label" for="date01">Product Size</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" name="product_size" required="">
				  </div>
				</div> 
				<div class="control-group">
				  <label class="control-label" for="date01">Product Color</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" name="product_color" required="">
				  </div>
				</div> 
				<div class="control-group">
				  <label class="control-label" for="date01">Publication Status</label>
				  <div class="controls">
					<input type="checkbox" name="publication_status" value="1">
				  </div>
				</div> 
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Add Product</button>
				  <button type="reset" class="btn">Cancel</button>
				</div>
			  </fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->
@endsection