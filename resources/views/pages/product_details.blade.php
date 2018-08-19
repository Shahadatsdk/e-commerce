@extends('layout')

@section('sidebar')

<div class="left-sidebar">
    <h2>Category</h2>
    <div class="panel-group category-products" id="accordian"><!--category-productsr-->

        <?php 


        $all_category_info = DB::table('category_tbl')->where('publication_status',1)->get();

        foreach ($all_category_info as $category) {

        ?>
            
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a href="{{URL::to('/product_by_category/'.$category->category_id)}}"><?php echo $category->category_name ?></a></h4>
            </div>
        </div>

        <?php } ?>
    </div><!--/category-products-->

    <div class="brands_products"><!--brands_products-->
        <h2>Brands</h2>
        <div class="brands-name">
            <ul class="nav nav-pills nav-stacked">

                <?php 


                $all_manufacture_info = DB::table('manufacture_tbl')->where('publication_status',1)->get();

                foreach ($all_manufacture_info as $manufacture) {

                ?>

                <li><a href="{{URL::to('/product_by_manufacture/'.$manufacture->manufacture_id)}}"> <span class="pull-right">(50)</span><?php echo $manufacture->manufacture_name ?></a></li>

                <?php } ?>

            </ul>
        </div>
    </div><!--/brands_products-->
    
    <div class="price-range"><!--price-range-->
        <h2>Price Range</h2>
        <div class="well text-center">
             <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
             <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
        </div>
    </div><!--/price-range-->
    
</div>

@endsection

@section('content')
	<div class="col-sm-9 padding-right">
			<div class="product-details"><!--product-details-->
				<div class="col-sm-5">
					<div class="view-product">
						<img src="{{ URL::to($product_by_details->product_image) }}" alt="" />
						<h3>ZOOM</h3>
					</div>

				</div>
				<div class="col-sm-7">
					<div class="product-information"><!--/product-information-->
						<img src="images/product-details/new.jpg" class="newarrival" alt="" />
						<h2>{{ $product_by_details->product_name }}</h2>
						<p>Color: {{ $product_by_details->product_color }}</p>
						<img src="{{URL::to('frontend/images/product-details/rating.png')}}" alt="" />
						<span>
							<span>{{ $product_by_details->product_price }} Tk</span>

						<!-- add to cart system -->
						<form action="{{url('/add_to_cart')}}" method="post">
							{{ csrf_field() }}
							<label>Quantity:</label>
							<input type="text" name="qty" value="1" />
							<input type="hidden" name="product_id" value="{{ $product_by_details->product_id }}">
							<button type="submit" class="btn btn-fefault cart">
								<i class="fa fa-shopping-cart"></i>
								Add to cart
							</button>
						</form>


						</span>
						<p><b>Availability:</b> In Stock</p>
						<p><b>Condition:</b> New</p>
						<p><b>Brand:</b> {{ $product_by_details->manufacture_name }}</p>
						<p><b>Category:</b> {{ $product_by_details->category_name }}</p>
						<p><b>Size:</b> {{ $product_by_details->product_size }}</p>
						<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
					</div><!--/product-information-->
				</div>
			</div><!--/product-details-->
			
			<div class="category-tab shop-details-tab"><!--category-tab-->
				<div class="col-sm-12">
					<ul class="nav nav-tabs">
						<li><a href="#details" data-toggle="tab">Details</a></li>
						<li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
						<li><a href="#tag" data-toggle="tab">Tag</a></li>
						<li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
					</ul>
				</div>
				<div class="tab-content">
					<div class="tab-pane fade" id="details" >
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<p>{{ $product_by_details->product_long_description }}</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="tab-pane fade" id="companyprofile" >

						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="images/home/gallery1.jpg" alt="" />
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
									</div>
								</div>
							</div>
						</div>
					
					</div>
					
					<div class="tab-pane fade" id="tag" >
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="images/home/gallery1.jpg" alt="" />
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="tab-pane fade active in" id="reviews" >
						<div class="col-sm-12">
							<ul>
								<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
								<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
								<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
							</ul>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
							<p><b>Write Your Review</b></p>
							
							<form action="#">
								<span>
									<input type="text" placeholder="Your Name"/>
									<input type="email" placeholder="Email Address"/>
								</span>
								<textarea name="" ></textarea>
								<b>Rating: </b> <img src="{{URL::to('frontend/images/product-details/rating.png')}}" alt="" />
								<button type="button" class="btn btn-default pull-right">
									Submit
								</button>
							</form>
						</div>
					</div>
					
				</div>
			</div><!--/category-tab-->
			
			<div class="recommended_items"><!--recommended_items-->

			</div><!--/recommended_items-->
			
		</div>
@endsection				
