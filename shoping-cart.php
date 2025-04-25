<?php
include("php/query.php");
	include('components/header.php');
	?>

	<?php
	if(isset($_POST['addToCart'])){
		if(isset($_SESSION['cart'])){

			$count = count($_SESSION['cart']);
			$productIdsArray = array_column($_SESSION['cart'],'productId');
			if(in_array($_POST['pId'],$productIdsArray)){
				echo "<script>alert('product is already added to the cart ');location.assign('index.php')</script>";
			}
			else{



			$_SESSION['cart'][$count] =  array("productId"=>$_POST['pId'],"productName"=>$_POST['pName'],"productPrice"=>$_POST['pPrice'],"productQty"=>$_POST['num-product'],"productImage"=>$_POST['pImage']);
			echo "<script>alert('product added to the cart');location.assign('index.php')</script>";
		}
		}
		else{
			$_SESSION['cart'][0] = array("productId"=>$_POST['pId'],"productName"=>$_POST['pName'],"productPrice"=>$_POST['pPrice'],"productQty"=>$_POST['num-product'],"productImage"=>$_POST['pImage']);
			echo "<script>alert('product added to the cart')</script>";
		}
	}

    //   update qty 

	if(isset($_POST['incDec'])){
		$productId =$_POST['prId'];
		$productQty =$_POST['prQty'];
		foreach($_SESSION['cart'] as $key => $value){
			if($value['productId'] == $productId){
				$_SESSION['cart'][$key]['productQty'] = $productQty ;
			}
		}

	}
 

// checkout 
	if(isset($_POST['checkout'])){
		$userId =$_SESSION['userId'];
		$userName =$_SESSION['userName'];
		$userEmail =$_SESSION['userEmail'];
		foreach($_SESSION['cart'] as $key => $value){
			$productId =$value['productId'];
			$productName =$value['productName'];
			$productPrice =$value['productPrice'];
			$productQty =$value['productQty'];
			$query= $pdo->prepare("insert into orders (u_id, u_name ,u_email, p_id ,p_name ,p_price ,p_qty) values ( :u_id, :u_name , :u_email, :p_id , :p_name , :p_price , :p_qty)");
			$query->bindParam('u_id',$userId);
			$query->bindParam('u_name',$userName);
			$query->bindParam('u_email',$userEmail);
			$query->bindParam('p_id',$productId);
			$query->bindParam('p_name',$productName);
			$query->bindParam('p_price',$productPrice);
			$query->bindParam('p_qty',$productQty);
			$query->execute();


		}

		$totalAmount = 0;
		$totalQty = 0;


		foreach ($_SESSION['cart'] as $key => $value) {
			$totalAmount += $value['productPrice'] * $value['productQty'];
			$totalQty += $value['productQty'];
		}
		

		// foreach($_SESSION['cart'] as $key => $value ){
		// 	$totalAmount += $value['productPrice'] *$value{'productQty'};
		// 	$totalQty += $value['productQty'];

		// }


		$invoiceQuery = $pdo->prepare("insert into invoices (u_id,u_name,u_email,totalqty,totalAmount) values (:u_id,:u_name,:u_email,:totalqty,:totalAmount)");
		$invoiceQuery->bindParam('u_id',$userId);
		$invoiceQuery->bindParam('u_name',$userName);
		$invoiceQuery->bindParam('u_email',$userEmail);
		$invoiceQuery->bindParam('totalAmount',$totalAmount);
		$invoiceQuery->bindParam('totalqty',$totalQty);
		$invoiceQuery->execute();
		echo "<script>alert('order added suceesdully');location.assign('index.php')</script>";
       unset($_SESSION['cart']);

	}




    //  validation 

	$country = $state = $zip = "";
	$countryErr = $stateErr = $zipErr = "";

	if(isset($_POST['checkout'])){

		$country = $_POST['time'];
		$state = $_POST['state'];
		$zip = $_POST['postcode'];

		if(empty($country)){
			$countryErr = "Country is Required" ;
		}
		
		if(empty($state)){
			$stateErr = "state is Required" ;
		}
		
		if(empty($zip)){
			$zipErr = "state is Required" ;
		}
	}

	 


	?>

	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>
		

	<?php
	if(isset($_SESSION['cart'])){

	
	?>

	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85" method="POST">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
								</tr>

								<?php 
								if(isset($_SESSION['cart'])){
									foreach($_SESSION['cart'] as $key => $value){
										
								
								?>
								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="AdminPanel/images/<?php echo $value['productImage'] ?>" alt="IMG">
										</div>
									</td>
									<td class="column-2"><?php echo $value['productName'] ?></td>
									<td class="column-3">$ <?php echo $value['productPrice'] ?></td>
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0 qtyBox">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m dec">
												<input type="hidden" class="pId" value="<?php echo $value['productId']?>">
												<i class="fs-16 zmdi zmdi-minus "></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="<?php echo $value['productQty'] ?>">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m inc">
												
												<i class="fs-16 zmdi zmdi-plus "></i>
											</div>
										</div>
									</td>
									<td class="column-5">$ <?php echo $value['productPrice']*$value['productQty'] ?></td>
									<td class="column-6"><a href="?prId=<?php echo $value['productId']  ?>" class="btn btn-danger">Remove</a>
									</td>

								</tr>

								<?php
									}
								}
								?>
								<!-- <tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="images/item-cart-05.jpg" alt="IMG">
										</div>
									</td>
									<td class="column-2">Lightweight Jacket</td>
									<td class="column-3">$ 16.00</td>
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product2" value="1">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>
									<td class="column-5">$ 16.00</td>
								</tr> -->
							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">
									
								<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Apply coupon
								</div>
							</div>

							<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								Update Cart
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									$79.65
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Shipping:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									There are no shipping methods available. Please double check your address, or contact us if you need any help.
								</p>
								
								<div class="p-t-15">
									<span class="stext-112 cl8">
										Calculate Shipping
									</span>


                            





									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="time" value="<?php echo $country ?>">
										<option value="">Select a country...</option>
                                        <option value="USA">USA</option>
                                        <option value="UK">UK</option>
                                        </select>
										

										<div class="dropDownSelect2"></div>
										<small id="helpId" class="text-danger"><?php echo $countryErr?></small>
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" value="<?php echo $state ?>" placeholder="State /  country">
										<small id="helpId" class="text-danger"><?php echo $stateErr?></small>

									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" value="<?php echo $zip ?>" placeholder="Postcode / Zip">
										<small id="helpId" class="text-danger"><?php echo $zipErr?></small>

									</div>
									
									<div class="flex-w">
										<div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
											Update Totals
										</div>
									</div>
										
								</div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									$79.65
								</span>
							</div>
						</div>

						<?php
						
						if(isset($_SESSION['userEmail'])){
							
							?>
						<button name="checkout" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Proceed to Checkout
						</button>
						<?php
						
						}
						else{
							?>
							<a href="login.php" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">Proceed to Checkout</a>
							<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</form>
		
	<?php
	}
	else{
	?>
      
	  <div class="container p-5">

	  <h1 class="text-center p-5">your cart is empty</h1>
	  </div>



<?php
}
?>
	
		

	<!-- Footer -->
	<?php
	include('components/footer.php');
	?>