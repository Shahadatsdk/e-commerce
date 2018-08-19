@extends('layout')

@section('content')

<div class="col-sm-12 padding-right">
	<section id="cart_items">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<?php 

				$contents = Cart::content();

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
	</section> <!--/#cart_items-->


	<section id="do_action">
		<div class="row">
			<div class="col-sm-12">
				<div class="total_area">
					<ul>
						<li>Cart Sub Total <span>{{ Cart::subtotal() }}</span></li>
						<li>Eco Tax <span>{{ Cart::tax() }}</span></li>
						<li>Shipping Cost <span>Free</span></li>
						<li>Total <span>{{ Cart::total() }}</span></li>
					</ul>
						<!-- <a class="btn btn-default update" href="">Update</a>	 -->
					<?php 

                    $customer_id = Session::get('customer_id'); 
                    $shipping_id = Session::get('shipping_id');

                    ?>

                    <?php if($customer_id != NULL  && $shipping_id == NULL) { ?>
                        <a href="{{ URL::to('/checkout') }}" class="btn btn-default update"> Checkout</a>
                    <?php } if($customer_id != NULL  && $shipping_id != NULL) { ?>    
                        <a href="{{ URL::to('/payment') }}" class="btn btn-default update"> Checkout</a>   
                    <?php } else{ ?>
                       <a href="{{ URL::to('/login_check') }}" class="btn btn-default update"> Checkout</a>
                    <?php } ?> 	

				</div>
			</div>
		</div>
    </section><!--/#do_action-->
</div>

@endsection