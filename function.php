<?php

	$server = "localhost";
	$user	= "root";
	$password = "";
	$database	= "azone";
	$connF = null;

	$connF = mysqli_connect($server,$user,$password,$database);



	function getProducts(){
		
		global $connF;
		$sql = "SELECT * FROM product ORDER BY 1 DESC LIMIT 0,6";
		$getProduct = mysqli_query($connF,$sql);
		
		while($rowProduct = mysqli_fetch_array($getProduct)){
			
			$productId = $rowProduct['productId'];
			$productName = $rowProduct['productName'];
			$productPrice = $rowProduct['productPrice'];
			$productImg1 = $rowProduct['image1'];
			
			echo"
			
			<!--	One Product Code Start-->
			<div class='col-sm-4 col-sm-6 single'>
				<div class='product' >
					<a href='details.php?productId=$productId'>
						<img src='admin/resources/img/product_img/$productImg1' class='img-responsive' alt=''>
					</a>
					<div class='text'>
						<h4><a href='details.php?productId=$productId'>$productName</a></h4>
						<p class='price'>Rs $productPrice</p>
						<p class='buttons'>
							<a href='details.php?productId=$productId' class='btn btn-warning'>More</a>
							<a href='details.php?productId=$productId' class='btn btn-info'>
								<i class='fa fa-shopping-cart'> Add to Cart</i>
							</a>
						</p>
					</div>
				</div>
			</div>
<!--	One Product Code End-->
			";
		}
	}


	function getManufactures(){
		
		global $connF;
		$sql = "SELECT * FROM manufacture ORDER BY 1 LIMIT 0,10";
		$getManufacture = mysqli_query($connF,$sql);
		
		while($rowManufacture = mysqli_fetch_array($getManufacture)){
			
			$manufactureId = $rowManufacture['manufactureId'];
			$manName = $rowManufacture['manName'];
			$manImage = $rowManufacture['manImage'];
				
			echo"
			
				<li><a href='store.php?manufacture=$manufactureId'>$manName</a></li>
			";
			
		}
		
		
	}

	function getCategory(){
		
		global $connF;
		$sql = "SELECT * FROM category";
		$getCategory = mysqli_query($connF,$sql);
		
		while($rowCategory = mysqli_fetch_array($getCategory)){
			
			$categoryId = $rowCategory['categoryId'];
			$categoryName = $rowCategory['catName'];
			$categoryImage = $rowCategory['catImage'];
				
			echo"
			
				<li><a href='store.php?category=$categoryId'>$categoryName</a></li>
			";
			
		}
		
		
	}

function sortManufacture(){
	
	global $connF;
	if(isset($_GET['manufacture'])){
		$manuId = $_GET['manufacture'];
		$sql = "SELECT * FROM product WHERE manufactureId='$manuId'";
		$sortManufacture = mysqli_query($connF,$sql);
		
		while($rowManufactureSort = mysqli_fetch_array($sortManufacture)){
			$productId = $rowManufactureSort['productId'];
			$productName = $rowManufactureSort['productName'];
			$productPrice = $rowManufactureSort['productPrice'];
			$productImg1 = $rowManufactureSort['image1'];
			
			echo"
			
			<!--	One Product Code Start-->
			<div class='col-sm-4 col-sm-6 single'>
				<div class='product' >
					<a href='details.php?productId=$productId'>
						<img src='admin/resources/img/product_img/$productImg1' class='img-responsive' alt=''>
					</a>
					<div class='text'>
						<h4><a href='details.php?productId=$productId'>$productName</a></h4>
						<p class='price'>Rs $productPrice</p>
						<p class='buttons'>
							<a href='details.php?productId=$productId' class='btn btn-warning'>More</a>
							<a href='details.php?productId=$productId' class='btn btn-info'>
								<i class='fa fa-shopping-cart'> Add to Cart</i>
							</a>
						</p>
					</div>
				</div>
			</div>
<!--	One Product Code End-->
			";
			
		}
	}
}

function sortCategory(){
	
	global $connF;
	if(isset($_GET['category'])){
		$categoryId = $_GET['category'];
		$sql = "SELECT * FROM product WHERE categoryId='$categoryId'";
		$sortCategory = mysqli_query($connF,$sql);
		
		while($rowCategory = mysqli_fetch_array($sortCategory)){
			$productId = $rowCategory['productId'];
			$productName = $rowCategory['productName'];
			$productPrice = $rowCategory['productPrice'];
			$productImg1 = $rowCategory['image1'];
			
			echo"
			
			<!--	One Product Code Start-->
			<div class='col-sm-4 col-sm-6 single'>
				<div class='product' >
					<a href='details.php?productId=$productId'>
						<img src='admin/resources/img/product_img/$productImg1' class='img-responsive' alt=''>
					</a>
					<div class='text'>
						<h4><a href='details.php?productId=$productId'>$productName</a></h4>
						<p class='price'>Rs $productPrice</p>
						<p class='buttons'>
							<a href='details.php?productId=$productId' class='btn btn-warning'>More</a>
							<a href='details.php?productId=$productId' class='btn btn-info'>
								<i class='fa fa-shopping-cart'> Add to Cart</i>
							</a>
						</p>
					</div>
				</div>
			</div>
<!--	One Product Code End-->
			";
			
		}
	}
}

function sortPrice(){
	if(isset($_POST['priceSort'])){
		global $connF;
		$minPrice = $_POST['minPrice'];
		$maxPrice = $_POST['maxPrice'];
		$sql = "SELECT * FROM product WHERE productPrice BETWEEN $minPrice AND $maxPrice ORDER BY productPrice ASC";
		$sortPrice = mysqli_query($connF,$sql);
		
		while($rowSortPrice = mysqli_fetch_array($sortPrice)){
			$productId = $rowSortPrice['productId'];
			$productName = $rowSortPrice['productName'];
			$productPrice = $rowSortPrice['productPrice'];
			$productImg1 = $rowSortPrice['image1'];
						
			echo"

			<!--	One Product Code Start-->
			<div class='col-sm-4 col-sm-6 single'>
				<div class='product' >
					<a href='details.php?productId=$productId'>
						<img src='admin/resources/img/product_img/$productImg1' class='img-responsive' alt=''>
					</a>
					<div class='text'>
						<h4><a href='details.php?productId=$productId'>$productName</a></h4>
						<p class='price'>Rs $productPrice</p>
						<p class='buttons'>
							<a href='details.php?productId=$productId' class='btn btn-warning'>More</a>
							<a href='details.php?productId=$productId' class='btn btn-info'>
								<i class='fa fa-shopping-cart'> Add to Cart</i>
							</a>
						</p>
					</div>
				</div>
			</div>
<!--	One Product Code End-->
			";
	}
	}
}

function generateConfimCode(){
	
	$combination = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM0123456789!@$%()*';
	$combination = str_shuffle($combination);
	$confirmCode = substr($combination,0,15);
	return $confirmCode;
}

function customerRegister(){
	
	global $connF;
	
	if(isset($_POST['register'])){
		
		$cusName = $_POST['cus_name'];
		$cusEmail = $_POST['cus_email'];
		$cusPass = $_POST['cus_pass'];
		$cusCPass = $_POST['cus_cpass'];
		$cusPNo = $_POST['cus_pno'];
		$cusAddress = $_POST['cus_address'];
		$cusCity = $_POST['cus_city'];
		$cusProfilePic = $_FILES['cus_dp']['name'];
		$cusProfilePicTemp = $_FILES['cus_dp']['tmp_name'];
		$cusConfimCode = generateConfimCode();
		$cusPassEncrpt = encNanoSec($cusPass);
		
		//Google Recaptcha
		$sKey = "6LdScHYUAAAAAL6_FSP4Jgmv_Vd4-2sYytWiBt0K";
		$gResponse = $_POST['g-recaptcha-response'];
		$remoteIP = $_SERVER['REMOTE_ADDR'];
		$guRL = "https://www.google.com/recaptcha/api/siteverify?secret=$sKey&response=$gResponse&remoteip=$remoteIP";
		$retuenResponse = file_get_contents($guRL);
		$jsonResponse = json_decode($retuenResponse);
		
		if($cusPass == $cusCPass && $jsonResponse->success){
			move_uploaded_file($cusProfilePicTemp,"customers/resources/img/userpics/$cusProfilePic");
			
			$registerCustomerSql = "INSERT INTO customer(cusName, cusEmail, cusPassword, cusAddress, cusCity, cusImage, cConfirmCode, cusPNum) VALUES ('$cusName','$cusEmail','$cusPassEncrpt','$cusAddress','$cusCity','$cusProfilePic','$cusConfimCode','$cusPNo')";
			
			$registerCustomer = mysqli_query($connF,$registerCustomerSql);
		
			//Check register customer have items on cart
			$registerCusCookie = setGetCookie();
			$checkCartSql = "SELECT * FROM cart WHERE cartCookie='$registerCusCookie'";
			$checkCart = mysqli_query($connF,$checkCartSql);
			$countCheckCart = mysqli_num_rows($checkCart);
		
			if($countCheckCart>0){
				$_SESSION['cusEmail'] = $cusEmail;
				echo "<script>alert('Registered Success')</script>";
				echo "<script>window.open('cart.php','_self')</script>";
			}else{
				echo "<script>alert('Registered Success')</script>";
				echo "<script>window.open('store.php','_self')</script>";
			}
		}else if($jsonResponse->success){
			echo "<script>alert('Password and Confirm Password are not matched')</script>";
		}else if($cusPass == $cusCPass){
			echo "<script>alert('Please complete recaptcha!')</script>";
		}else{
			echo "<script>alert('Please check your inputs')</script>";
		}
		
		
	}
}

function customerLogin(){
	
	global $connF;
	global $wrongpass;
	
	if(isset($_POST['login'])){
		
		$cusEmail = $_POST['cus_email'];
		$cusPass = $_POST['cus_pass'];
		$cusPassEncrypt = encNanoSec($cusPass);
		
		//Google Recaptcha
		$sKey = "6LdScHYUAAAAAL6_FSP4Jgmv_Vd4-2sYytWiBt0K";
		$gResponse = $_POST['g-recaptcha-response'];
		$remoteIP = $_SERVER['REMOTE_ADDR'];
		$guRL = "https://www.google.com/recaptcha/api/siteverify?secret=$sKey&response=$gResponse&remoteip=$remoteIP";
		$retuenResponse = file_get_contents($guRL);
		$jsonResponse = json_decode($retuenResponse);
		
		if($jsonResponse->success){
			
			$loginCustomerSql = "SELECT * FROM customer WHERE cusEmail='$cusEmail' AND cusPassword='$cusPassEncrypt'";
			$loginCustomer = mysqli_query($connF,$loginCustomerSql);
			$checklogin = mysqli_num_rows($loginCustomer);
			
			$registerCusCookie = setGetCookie();
			$checkCartSql = "SELECT * FROM cart WHERE cartCookie='$registerCusCookie'";
			$checkCart = mysqli_query($connF,$checkCartSql);
			$countCheckCart = mysqli_num_rows($checkCart);
			
			if($checklogin>0 && $countCheckCart > 0){
				
				$_SESSION['cusEmail'] = $cusEmail;
				echo "<script>window.open('cart.php','_self')</script>";
				
			}else if($checklogin > 0 && $countCheckCart == 0){
				$_SESSION['cusEmail'] = $cusEmail;
				echo "<script>window.open('customers/myaccount.php?myorders','_self')</script>";
			}else{
				$wrongpass = "Invalid Email/Password";
			}
		}else{
			$wrongpass = "Please complete the Recaptcha";
		}
		
		
		
		
	}
}

function setGetCookie(){
	
	global $random; 
	$random= rand(0, 9999999); 
	if(!isset($_COOKIE['user_cookie'])) {
    	setcookie('user_cookie',$random, time() + (86400), "/");//86400 = 1 day
	}
	else {
    	return $_COOKIE['user_cookie']; 
	}
	
}

function addCart(){
	
	global $connF;
	if(isset($_GET['addCart'])){
		$userCookie = setGetCookie();
		$productIdCart = $_GET['addCart'];
		$productQty = $_POST['qty'];
		$productColor = $_POST['color'];
		$productWarrenty = $_POST['warrenty'];
		
		$cartProductsSql = "SELECT * FROM cart WHERE cartCookie='$userCookie' AND productId ='$productIdCart' AND cartColour='$productColor' AND cartWarranty='$productWarrenty'";
		
		$checkCart = mysqli_query($connF,$cartProductsSql);
		
		if(mysqli_num_rows($checkCart)>0){
			echo"<script>alert('Product already added to cart')</script>";
			echo "<script>window.open('details.php?productId=$productIdCart','_self')</script>";
				
		}else{
			$addCartSql = "INSERT INTO cart(productId,cartQty,cartColour,cartWarranty, cartCookie) VALUES ('$productIdCart','$productQty','$productColor','$productWarrenty','$userCookie')";
			
			$addProdutCart = mysqli_query($connF,$addCartSql);
			echo "<script>window.open('details.php?productId=$productIdCart','_self')</script>";
			
		}
	}
	 
}

function countCart(){
	global $connF;
	$userCookie = setGetCookie();
	$countItemsSql = "SELECT * FROM cart WHERE cartCookie='$userCookie'";
	$countItems = mysqli_query($connF,$countItemsSql);
	$count = mysqli_num_rows($countItems);
	
	echo $count;
}

function priceCart(){
	
	global $connF;
	
	$totalPrice = 0;
	$userCookie = setGetCookie();
	$cartItemsSql = "SELECT * FROM cart WHERE cartCookie='$userCookie'";
	$cartItems = mysqli_query($connF,$cartItemsSql);
	
	while($row = mysqli_fetch_array($cartItems)){
		$productId = $row['productId'];
		$productQty = $row['cartQty'];
		$productWarrenty = $row['cartWarranty'];
		
		$productPriceSql = "SELECT * FROM product WHERE productId='$productId'";
		$getProductPrice = mysqli_query($connF,$productPriceSql);
		
		while($rowPrice = mysqli_fetch_array($getProductPrice)){
			$Price = $rowPrice['productPrice'] * $productQty;
			if($productWarrenty != "Software"){
				$Price += 3800; 
			}
			$totalPrice += $Price;
		}
		
	}
	
	echo " " . $totalPrice . " ";
}

function returnPriceCart(){
	
	global $connF;
	
	$totalPrice = 0;
	$userCookie = setGetCookie();
	$cartItemsSql = "SELECT * FROM cart WHERE cartCookie='$userCookie'";
	$cartItems = mysqli_query($connF,$cartItemsSql);
	
	while($row = mysqli_fetch_array($cartItems)){
		$productId = $row['productId'];
		$productQty = $row['cartQty'];
		$productWarrenty = $row['cartWarranty'];
		
		$productPriceSql = "SELECT * FROM product WHERE productId='$productId'";
		$getProductPrice = mysqli_query($connF,$productPriceSql);
		
		while($rowPrice = mysqli_fetch_array($getProductPrice)){
			$Price = $rowPrice['productPrice'] * $productQty;
			if($productWarrenty != "Software"){
				$Price += 3800; 
			}
			$totalPrice += $Price;
		}
		
	}
	
	return round($totalPrice,2);
}

function cartUpdate(){
	global $connF;
	if(isset($_POST['update'])){
		foreach($_POST['remove'] as $removeItemId){
			
			$removeItemSql = "DELETE FROM cart WHERE productId='$removeItemId'";
			$removeItem = mysqli_query($connF,$removeItemSql);
			if($removeItem){
				echo "<script>window.open('cart.php','_self')</script>";
			}
		}
	}
}

function suggestProducts(){
	
				global $connF;
				$getRandomProductsSql = "SELECT * FROM product ORDER BY RAND() LIMIT 0,3";
				$getRandomProducts = mysqli_query($connF,$getRandomProductsSql);
				while($rowGetRandomProducts = mysqli_fetch_array($getRandomProducts)){
					$productId = $rowGetRandomProducts['productId'];
					$productName = $rowGetRandomProducts['productName'];
					$productPrice = $rowGetRandomProducts['productPrice'];
					$productImg1Mini = $rowGetRandomProducts['image1'];
							
					echo "
<!-- 				One Sub Product Start-->
						<div class='center-responsive col-md-3 col-sm-6'>
							<div class='product same-height'>
								<a href='details.php?productId=$productId'>
									<img src='admin/resources/img/product_img/$productImg1Mini' alt='' class='img-responsive'>
								</a>
							<div class='text'>
								<h4>
									<a href='details.php?productId=$productId'>$productName</a>
								</h4>
								<p class='price'> Rs $productPrice</p>
							</div>
							</div>
						</div>
<!--						One Sub Product Start-->
							
							
							
					";
				}
					
}

function welcomeUser(){
	if(!isset($_SESSION['cusEmail'])){
		echo "Welcome : Guest";
	}else{
		echo "Welcome : " . $_SESSION['cusEmail'];
	}
}

function switchLoginLogout(){
	if(!isset($_SESSION['cusEmail'])){
		echo "<li><a href='register.php'>Register</a></li>";
		echo "<li><a href='login.php'>Login</a></li>";
	}else{
		echo "<li><a href='customers/myaccount.php?myorders'>My Account</a></li>";
		echo "<li><a href='logout.php'>Logout</a></li>";
	}
}

function makeOrder(){
	global $connF;
	if(isset($_GET['customerId'])){
		
		$cusId = $_GET['customerId'];
		$userCookie = setGetCookie();
		
		$getCartItemSql = "SELECT * FROM cart WHERE cartCookie = '$userCookie'";
		$getCartItem = mysqli_query($connF,$getCartItemSql);
		
		$generateInvoice = mt_rand();

		while($rowGetCartItem = mysqli_fetch_array($getCartItem)){
			
			$productId = $rowGetCartItem['productId'];
			$productQty = $rowGetCartItem['cartQty'];
			$productWarrenty = $rowGetCartItem['cartWarranty'];
			$productColor = $rowGetCartItem['cartColour'];
			$productPriceSql = "SELECT * FROM product WHERE productId='$productId'";
			$getProductPrice = mysqli_query($connF,$productPriceSql);
		
			while($rowPrice = mysqli_fetch_array($getProductPrice)){
				$Price = $rowPrice['productPrice'] * $productQty;
				
				if($productWarrenty != "Software"){
					$Price += 3800; 
				}
				
				$createOrderSql = "INSERT INTO orders(cusId, orderAmount, invoiceNumber, qty, colour,warranty, date, status) VALUES ('$cusId','$Price','$generateInvoice','$productQty','$productColor','$productWarrenty',NOW(),'Unpaid')";
				$createOrder = mysqli_query($connF,$createOrderSql);
				
				$removeCartSql = "DELETE FROM cart WHERE cartCookie = '$userCookie' AND productId = '$productId'";
				$removeCart = mysqli_query($connF,$removeCartSql);
			}
			
		}
		echo "<script>alert('Order placed successfully! Please complete the payment')</script>";
		echo "<script>window.open('customers/myaccount.php?myorders','_self')</script>";
	}
}

function offlinePayment(){
	
	global $connF;

	if(isset($_POST['payconfirm'])){
		
		$orderId = $_GET['offlinePayment'];
		$offlineOrderId = $_GET['offlinePayment'];
		$invoiceNo = $_POST['invoiceno'];
		$payDate = $_POST['paydat'];
		$paymentMode = $_POST['paymode'];
		$paymentBranch = $_POST['paybank'];
		$transactionId = $_POST['payid'];
		$paidAmount = $_POST['payamount'];
		
		
		$getCustomerIdSql = "SELECT * FROM orders WHERE orderId=$orderId";
		$getCustomerId = mysqli_query($connF,$getCustomerIdSql);
		$getCustomerIdRow = mysqli_fetch_array($getCustomerId);
		
		$getPaymentStatus = $getCustomerIdRow['status'];
		
		if($getPaymentStatus == "unpaid" || $getPaymentStatus == "Unpaid"){
				
			//slip upload
			$paymentSlip = $_FILES['attachslip']['name'];
			$paymentSlipTemp = $_FILES['attachslip']['tmp_name'];
			move_uploaded_file($paymentSlipTemp,"resources/img/userpayslips/$paymentSlip");
		
			$getCustomerIdSql = "SELECT * FROM orders WHERE orderId=$orderId";
			$getCustomerId = mysqli_query($connF,$getCustomerIdSql);
			$getCustomerIdRow = mysqli_fetch_array($getCustomerId);
		
			$customerId = $getCustomerIdRow['cusId'];
		
			$makePaymentSql = "INSERT INTO payement(customerId, pInvoiceNum, amount, payMethod, date) VALUES ('$customerId','$invoiceNo','$paidAmount','$paymentMode','$payDate')";
			$makePayment = mysqli_query($connF,$makePaymentSql);
		
			$lastInsertId = mysqli_insert_id($connF);
		
			$saveOffliePaymentSql = "INSERT INTO offlinepayement(branch, depositImage, depositDate, amount, payId) VALUES ('$paymentBranch','$paymentSlip','$payDate','$paidAmount','$lastInsertId')"; 
			$saveOffliePayment = mysqli_query($connF,$saveOffliePaymentSql);
		
			$updateOrderStatusSql = "UPDATE orders SET status='Paid' WHERE invoiceNumber='$invoiceNo'";
			$updateOrderStatus = mysqli_query($connF,$updateOrderStatusSql);
		
			if($updateOrderStatus){
				echo "<script>alert('Payment Completed, You will receive confirmation soon!')</script>";
				echo "<script>window.open('myaccount.php?myorders','_self')</script>";
			}
			
		}else{
			echo "<script>alert('You already have paid for this item, You will receive confirmation soon!')</script>";
			echo "<script>window.open('myaccount.php?myorders','_self')</script>";
		}
			
	}
	
}

function editProfile(){
	
	global $connF;
	
	if(isset($_POST['editprofile'])){
		
		$currentUser = $_SESSION['cusEmail'];
		
		$cusName = $_POST['cus_name'];
		$cusEmail = $_POST['cus_email'];
		$cusPNo = $_POST['cus_pno'];
		$cusAddress = $_POST['cus_address'];
		$cusCity = $_POST['cus_city'];
		$cusProfilePic = $_FILES['cus_dp']['name'];
		$cusProfilePicTemp = $_FILES['cus_dp']['tmp_name'];
		
		if($cusProfilePic != ""){
			$editProfileSql = "UPDATE customer SET cusName='$cusName',cusEmail='$cusEmail',cusAddress='$cusAddress',cusCity='$cusCity',cusImage='$cusProfilePic',cusPNum='$cusPNo' WHERE cusEmail='$currentUser'";
		}
		else{
			$editProfileSql = "UPDATE customer SET cusName='$cusName',cusEmail='$cusEmail',cusAddress='$cusAddress',cusCity='$cusCity',cusPNum='$cusPNo' WHERE cusEmail='$currentUser'";
		}
		move_uploaded_file($cusProfilePicTemp,"customers/resources/img/userpics/$cusProfilePic");
		$editProfile = mysqli_query($connF,$editProfileSql);
		echo "<script>alert('Saved Successfully!')</script>";
	}
}

function changePassword(){
	
	global $connF;
	
	if(isset($_POST['changepassword'])){
		$currentUser = $_SESSION['cusEmail'];
		$getCustomerPasswordSql = "SELECT * FROM customer WHERE cusEmail='$currentUser'";
		$getCustomerPassword = mysqli_query($connF,$getCustomerPasswordSql);	
		$getCustomerPasswordRow = mysqli_fetch_array($getCustomerPassword);
		
		$currentPassword = $_POST['current_pass'];
		$newPassword = $_POST['new_pass'];
		$cNewPassword = $_POST['new_cpass'];
		
		$currentPasswordDB = $getCustomerPasswordRow['cusPassword'];
		$decryptCurrentPassword = decNanoSec($currentPasswordDB);
		
		if($currentPassword == $decryptCurrentPassword && $newPassword == $cNewPassword){
			$encryptNewPassword = encNanoSec($newPassword);
			$changePasswordSql = "UPDATE customer SET cusPassword='$encryptNewPassword' WHERE cusEmail = '$currentUser'";
			$changePassword = mysqli_query($connF,$changePasswordSql);
			echo "<script>alert('Password changed successfully!, Please login to contiune')</script>";
			session_destroy();
			echo "<script>window.open('../login.php','_self')</script>";
		}
		else if($currentPasswordDB != $currentPassword && $newPassword == $cNewPassword){
			
			echo "<script>alert('Your current password is wrong!')</script>";
		}
		else if($currentPasswordDB == $currentPassword && $newPassword != $cNewPassword){
			
			echo "<script>alert('Confirm password mismatch')</script>";
		}
		else{
			echo "<script>alert('Something wrong!')</script>";
		}
			
	}
}

function forceMailConfirm(){
	global $connF;
	$currentUser = $_SESSION['cusEmail'];
	$getConfirmCodeSql = "SELECT * FROM customer WHERE cusEmail='$currentUser'";
	$getConfirmCode = mysqli_query($connF,$getConfirmCodeSql);
	$getConfirmCodeRow = mysqli_fetch_array($getConfirmCode);
	
	$confirmCode = $getConfirmCodeRow['cConfirmCode'];
	if($confirmCode != ''){
		echo "
			<li class='list-group-item-danger'>
				<a href='myaccount.php?emailconfirm' class='text-danger'><i class='fa fa-list-alt'></i> Confirm Email Address</a>
			</li>
		";
	}
}

function confirmEmail(){
	global $connF;
	if(isset($_POST['confirmEmail'])){
		$confirmCode = $_POST['confirmcode'];
		$currentUser = $_SESSION['cusEmail'];
		$getConfirmCodeSql = "SELECT * FROM customer WHERE cusEmail='$currentUser'";
		$getConfirmCode = mysqli_query($connF,$getConfirmCodeSql);
		$getConfirmCodeRow = mysqli_fetch_array($getConfirmCode);
	
		$confirmCodeSaved = $getConfirmCodeRow['cConfirmCode'];
		
		if($confirmCode == $confirmCodeSaved){
			$updateConfirmCodeSql ="UPDATE customer SET cConfirmCode='' WHERE cusEmail='$currentUser'";
			$updateConfirmCode = mysqli_query($connF,$updateConfirmCodeSql);
			if($updateConfirmCode){
				echo "<script>alert('Email Address Confirmed Successfully')</script>";
				echo "<script>window.open('myaccount.php?myorders','_self')</script>";
			}
		}else{
			echo "<script>alert('Confirmation Code Invalid')</script>";
			echo "<script>window.open('myaccount.php?emailconfirm','_self')</script>";
		}
	}
}

function showWishList(){
	global $connF;
	$currentUser = $_SESSION['cusEmail'];
	$getCustomerIdSql = "SELECT * FROM customer WHERE cusEmail='$currentUser'";
	$getCustomerId = mysqli_query($connF,$getCustomerIdSql);
	$getCustomerIdRow = mysqli_fetch_array($getCustomerId);
	
	$cusId = $getCustomerIdRow['cusId'];
	
	$getWishListSql = "SELECT * FROM wishlist WHERE custId='$cusId'";
	$getWishList = mysqli_query($connF,$getWishListSql);
	$count = 0;
	while($getWishListRow = mysqli_fetch_array($getWishList)){
		$count++;
		$productId = $getWishListRow['productId'];
		$wishlistId = $getWishListRow['wishListId'];
		$getProductNameSql = "SELECT * FROM product WHERE productId='$productId'";
		$getProductName = mysqli_query($connF,$getProductNameSql);
		$getProductNameRow = mysqli_fetch_array($getProductName);
		
		$productName = $getProductNameRow['productName'];
		echo "
			<tr>
				 	<td>$count</td>
				 	<td>$productName</td>
				 	<td><a href='../details.php?productId=$productId' class='btn btn-success btn-sm' target='_blank'>Buy Now</td>
				 	<td><a href='deletewishlist.php?wishlistId=$wishlistId' class='btn btn-danger btn-sm'>Delete</td>
			</tr>
		";
	}
	
}

function deleteWishlist(){
	global $connF;
	$wishListId = $_GET['wishlistId'];
	$deleteWishListSql = "DELETE FROM wishlist WHERE wishListId ='$wishListId'";
	$deleteWishList = mysqli_query($connF,$deleteWishListSql);

	if($deleteWishList){
		echo "<script>alert('Item Deleted Successfully')</script>";
		echo "<script>window.open('myaccount.php?wishlist','_self')</script>";
	}
	else{
		echo "<script>alert('Something Wrong! Please Contact Us')</script>";
		echo "<script>window.open('myaccount.php?wishlist','_self')</script>";
	}
}

?>