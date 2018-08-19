@extends('layout')

@section('content')

<div class="col-sm-12 padding-right">
	<section id="cart_items">
		<div class="container col-sm-12">
			<div class="table-responsive cart_info">
				<?php 

				$contents = Cart::content();
				// echo "<pre>";
				// print_r($contents);
				// echo "</pre>";

				?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="name">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
						@foreach($contents as $v_contents)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{ $v_contents->options->image }}" style="height: 50px; width: 100px;" alt=""></a>
							</td>
							<td class="cart_name">
								<h4>{{ $v_contents->name }}</h4>
							</td>
							<td class="cart_price">
								<p>{{ $v_contents->price }}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{ url('/update_to_cart') }}" method="post">
										{{ csrf_field() }}
										<input class="cart_quantity_input" type="text" name="quantity" value="{{ $v_contents->qty }}" autocomplete="off" size="2">&nbsp;
										<input class="cart_quantity_input" type="hidden" name="rowId" value="{{ $v_contents->rowId }}">
										<input type="submit" name="submit" value="Update" class="btn btn-info">
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{ $v_contents->total }}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{ URL::to('/delete_to_cart/'.$v_contents->rowId) }}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
	<section id="do_action">
		<div class="container col-sm-12">
			<div class="paymentCont">
				<div class="headingWrap">
					<h3 class="headingTop text-center">Select Your Payment Method</h3>		
				</div>
				<form action="{{ url('/order_place') }}" method="post">
					
					{{ csrf_field() }}
					<div class="paymentWrap">
						<div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
				            <label class="btn paymentMethod">
			            		<div class="method amex"></div>
				                <input type="radio" name="payment_method" value="handcash">
				            </label>
				            <label class="btn paymentMethod">
			            		<div class="method ez-cash"></div>
				                <input type="radio" name="payment_method" value="bkash"> 
				            </label>
				            <label class="btn paymentMethod">
			             		<div class="method vishwa"></div>
				                <input type="radio" name="payment_method" value="paypal"> 
				            </label>
				            <label class="btn paymentMethod">
				            	<div class="method master-card"></div>
				                <input type="radio" name="payment_method" value="payza"> 
				            </label>				         
				        </div>     
					</div>

					<div class="footerNavWrap clearfix text-center" style="margin-bottom: 20px;">
						<input class="btn btn-success pull-left btn-fyi col-sm-4 col-sm-offset-4" type="submit" value="Done Order">
					</div>

				</form>
			</div>	
		</div>
	</section><!--/#do_action-->
</div>

@endsection