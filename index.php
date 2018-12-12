<?php
	include 'DB_functions.php';
	include 'function.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<!-- Custom Fonts -->
		<link rel="stylesheet" href="custom-font/fonts.css" />
		<!-- Bootstrap -->
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<!-- Font Awesome -->
		<link rel="stylesheet" href="css/font-awesome.min.css" />
		<!-- Bootsnav -->
		<link rel="stylesheet" href="css/bootsnav.css">
		<!-- Fancybox -->
		<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css?v=2.1.5" media="screen" />	
		<!-- Custom stylesheet -->
		<link rel="stylesheet" href="css/custom.css" />
		<!-- AngularJS -->
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
	</head>
	<body>

		<!-- Preloader -->

		<div id="loading">
			<div id="loading-center">
				<div id="loading-center-absolute">
					<div class="object"></div>
					<div class="object"></div>
					<div class="object"></div>
					<div class="object"></div>
					<div class="object"></div>
					<div class="object"></div>
					<div class="object"></div>
					<div class="object"></div>
					<div class="object"></div>
					<div class="object"></div>
				</div>
			</div>
		</div>

		<!--End off Preloader -->

		<!-- Header -->
		<header>
			<!-- Navbar -->
			<nav class="navbar bootsnav">
				<div class="container">
					<!-- Header Navigation -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
							<i class="fa fa-bars"></i>
						</button>
						<a class="navbar-brand" href=""><img class="logo" src="images/logo.png" alt=""></a>
					</div>
					<!-- Navigation -->
					<div class="collapse navbar-collapse" id="navbar-menu">
						<ul class="nav navbar-nav menu">
							<li><a href="">Trang chủ</a></li>                    
							<li><a href="#new">Mới</a></li>
							<li><a href="#popular">Phổ biến</a></li>
							<li><a href="login.html">Đăng nhập</a></li>
							<li><a href="register.html">Đăng ký</a></li>
						</ul>
					</div>
				</div>   
			</nav><!-- Navbar end -->
		</header><!-- Header end -->


		<section id="home" class="home">
			<!-- Carousel -->
			<div id="carousel" class="carousel slide" data-ride="carousel">
				<!-- Carousel-inner -->
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img src="images/food.jpg">
						<div class="overlay" ng-app="myApp" ng-controller="myCtrl" ng-init="show='false'">
							<form action="test.php" method="post">
								<div class="inner-form">
									<div class="input-field first-wrap">
										<input class="search_box" id="search" type="text" placeholder="Quán ăn / món ăn / địa chỉ" />
										<i class="fa fa-sliders" style="margin-top: 3px" ng-click="switchShow()"></i>
								  	</div>
								  	<div class="input-field third-wrap">
										<input id="ignored_element" class="btn know_btn" type="submit" name="search_info" value="Tìm"></input>
								 	</div>
								</div>
							</form>
							<!-- Advanced Search Bar -->
							<div class="advance-search unselectable" ng-init="type='area'" ng-hide="show!='true'">
								<div class="sf-left">
									<ul class="sf-cate">
										<li ng-click="changeType('area')">
											<i class="fa fa-location-arrow"></i>
											<label style="margin-bottom: 0px; margin-left: 3px;">Khu vực</label>
											<i class="fa fa-angle-right" style="float: right"></i>
										</li>
										<li ng-click="changeType('price')">
											<i class="fa fa-bars"></i>
											<label style="margin-bottom: 0px; margin-left: 3px;">Mức giá</label>
											<i class="fa fa-angle-right" style="float: right"></i>
										</li>
										<li ng-click="changeType('category')">
											<i class="fa fa-cutlery"></i>
											<label style="margin-bottom: 0px; margin-left: 3px;	">Phân loại</label>
											<i class="fa fa-angle-right" style="float: right"></i>
										</li>
									</ul>
								</div>
								<script>
									var app = angular.module('myApp', []);
									app.controller('myCtrl', function($scope, $http) {
										$scope.Districts = [{
											Name: "Quận Đống Đa"
											}, {
											Name: "Quận Hoàn Kiếm"
											}, {
											Name: "Quận Ba Đình"
											}, {
											Name: "Quận Tây Hồ"
											}, {
											Name: "Quận Thanh Xuân"
											}, {
											Name: "Quận Hai Bà Trưng"
											}, {
											Name: "Quận Cầu Giấy"
											}, {
											Name: "Quận Hoàng Mai"
											}, {
											Name: "Quận Long Biên"
											}, {
											Name: "Quận Hà Đông"
											}, {
											Name: "Quận Nam Từ Liêm"
											}, {
											Name: "Quận Bắc Từ Liêm" 
										}];
										$scope.Prices = [{
											Name: "< 10.000"
											}, {
											Name: "10.000 - 50.000"
											}, {
											Name: "50.000 - 100.000"
											}, {
											Name: "100.000 - 200.000"
											}, {
											Name: "200.000 - 500.000"
											}, {
											Name: "> 500.000" 
										}];
										$scope.Cates = [{
											Name: "Ăn vặt - Vỉa hè"
											}, {
											Name: "Café - Dessert"
											}, {
											Name: "Nhà hàng"
											}, {
											Name: "Bar - Pub" 
										}];
									    $scope.changeType = function($type) {
									        $scope.type = $type;
									    };
									    $scope.switchShow = function() {
									        if ($scope.show == 'true') {
									            $scope.show = 'false';
									        } else {
									            $scope.show = 'true';
									        }
									    };
									    $scope.clearFilter = function() {
									    	angular.forEach($scope.Districts, function(district) {
									        district.Selected = false;
									        });
									        angular.forEach($scope.Prices, function(price) {
									        price.Selected = false;
									        });
									        angular.forEach($scope.Cates, function(cate) {
									        cate.Selected = false;
									        });
									    };
									    $scope.selDistrict = 0;
									    $scope.selPrice = 0;
									    $scope.selCate = 0;
									    $scope.sel = {};
									    $scope.search = function() {
									    	$scope.selDistrictArray = [];
									    	angular.forEach($scope.Districts, function(district) {
									    		if(district.Selected == true) {
									    			$scope.selDistrict = $scope.selDistrict + 1;
									    			$scope.selDistrictArray.push(district.Name);
									    		}
									    	});
									    	$scope.selPriceArray = [];
									    	angular.forEach($scope.Prices, function(price) {
									    		if(price.Selected == true) {
									    			$scope.selPrice = $scope.selPrice + 1;
									    			$scope.selPriceArray.push(price.Name);
									    		}
									    	});
									    	$scope.selCateArray = [];
									    	angular.forEach($scope.Cates, function(cate) {
									    		if(cate.Selected == true) {
									    			$scope.selCate = $scope.selCate + 1;
									    			$scope.selCateArray.push(cate.Name);
									    		}
									    	});
									    	$scope.sel['no_districts'] = $scope.selDistrict;
									    	$scope.sel['no_prices'] = $scope.selPrice;
									    	$scope.sel['no_cates'] = $scope.selCate;
									    	$scope.sel['selected_dist'] = $scope.selDistrictArray;
									    	$scope.sel['selected_price'] = $scope.selPriceArray;
									    	$scope.sel['selected_cate'] = $scope.selCateArray;
									    	console.log($.param($scope.sel));
									    	// working //
									    	window.location.href=('filtertest.php' + '?' + $.param($scope.sel)); //swap filtertest.php with listing.php // 
									    	//TODO: //
									    };
									});
								</script>
								<div class="sf-right">
									<div class="sf-result" ng-hide="type!='area'">
										<ul>
											<li ng-repeat="district in Districts">
												<label class="checkbox-container" style="font-family: arial">{{district.Name}}
													<input type="checkbox" ng-model="district.Selected">
					  								<span class="checkmark"></span>
												</label>
											</li>	
										</ul>
									</div>
									<div class="sf-result" ng-hide="type!='price'">
										<ul>
											<li ng-repeat="price in Prices">
												<label class="checkbox-container" style="font-family: arial">{{price.Name}}
													<input type="checkbox" ng-model="price.Selected">
					  								<span class="checkmark"></span>
												</label>
											</li>
										</ul>
									</div>
									<div class="sf-result" ng-hide="type!='category'">
										<ul>
											<li ng-repeat="cate in Cates">
												<label class="checkbox-container" style="font-family: arial">{{cate.Name}}
													<input type="checkbox" ng-model="cate.Selected">
					  								<span class="checkmark"></span>
												</label>
											</li>
										</ul>
									</div>
								</div>
								<div class="sf-bottom">
									<div class="sf-btns">
										<a class="fd-btn" href="#" style="text-decoration:none;" ng-click="search()">Tìm kiếm</a>
										<a class="fd-btn" href="#" style="text-decoration:none;" ng-click="clearFilter()">Xóa bộ lọc</a>
									</div>
								</div>
							</div>
							<!-- Advanced Search Bar end -->
							<div class="carousel-caption">
								<h3>Hedspi Food Review</h3>
								<h1>Đánh giá đồ ăn</h1>
								<h1 class="second_heading">Creative & Professional</h1>
								<a href="#" class="btn know_btn">Viết review</a>
							</div>					
						</div>
					</div>        
				</div><!-- Carousel-inner end -->
			</div><!-- Carousel end-->
		</section>

		<!-- New review -->
		<section id="new">
			<div class="container">
				<div class="button__header">
					<h2 class="styled-heading">REVIEW GẦN ĐÂY</h2>
					<a class="btn-view__more" href="listing.html">Xem tất cả</a>
				</div>
				<div class="row">
				<?php
						$result = get_latest_review();
						$result2 = get_popular_reviews();
						$popular_review1 = $result2[0];
						$popular_review2 = $result2[1];
						$popular_review3 = $result2[2];
						$review1 = $result[0];
						$review2 = $result[1];
						$review3 = $result[2];
				?>
					<div class="col-md-4">
						<div class="service_item">
							<img src="<?php echo get_thumbnail($review1["anh"]);?>"/>
							<h3> <?php echo $review1["ten"]?> </h3>
							<p> <?php echo nl2br($review1["review"]). "<br>";?> </p>
							<a href="detail.php?review_id=<?php echo$review1["id"]?>" class="btn know_btn">xem thêm</a>
						</div>
					</div>
					<div class="col-md-4">
						<div class="service_item">
							<img src="<?php echo get_thumbnail($review2["anh"]);?>"/>
							<h3> <?php echo $review2["ten"]?> </h3>
							<p> <?php echo nl2br($review2["review"]). "<br>";?> </p>
							<a href="detail.php?review_id=<?php echo$review2["id"]?>" class="btn know_btn">xem thêm</a>
						</div>
					</div>
					<div class="col-md-4">
						<div class="service_item">
							<img src="<?php echo get_thumbnail($review3["anh"]);?>"/>
							<h3> <?php echo $review3["ten"]?> </h3>
							<p> <?php echo nl2br($review3["review"]). "<br>";?> </p>
							<a href="detail.php?review_id=<?php echo$review3["id"]?>" class="btn know_btn">xem thêm</a>
						</div>
					</div>
				</div>
			</div>
		</section><!-- New review end -->

		<!-- Popular review -->
		<section id="popular">
			<div class="container">
				<div class="button__header">
					<h2 class="styled-heading">REVIEW PHỔ BIẾN</h2>
					<a class="btn-view__more" href="listing.html">Xem tất cả</a>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="service_item">
							<img src="<?php echo get_thumbnail($popular_review1["anh"]);?>"/>
							<h3> <?php echo $popular_review1["ten"]?> </h3>
							<p> <?php echo nl2br($popular_review1["review"]). "<br>";?> </p>
							<a href="detail.php" class="btn know_btn">xem thêm</a>
						</div>
					</div>
					<div class="col-md-4">
						<div class="service_item">
							<img src="<?php echo get_thumbnail($popular_review2["anh"]);?>"/>
							<h3> <?php echo $popular_review2["ten"]?> </h3>
							<p> <?php echo nl2br($popular_review2["review"]). "<br>";?> </p>
							<a href="detail.php" class="btn know_btn">xem thêm</a>
						</div>
					</div>
					<div class="col-md-4">
						<div class="service_item">
							<img src="<?php echo get_thumbnail($popular_review3["anh"]);?>"/>
							<h3> <?php echo $popular_review3["ten"]?> </h3>
							<p> <?php echo nl2br($popular_review3["review"]). "<br>";?> </p>
							<a href="detail.php" class="btn know_btn">xem thêm</a>
						</div>
					</div>
				</div>
			</div>
		</section><!-- Popular review end -->

		<!-- start blog Area -->		
		<section id="quick">
			<div class="container">
				<h2 class="styled-heading">TÌM KIẾM NHANH</h2>
				<div class="row">
					<div class="col-md-3">
						<div class="service_item">
							<a href="listing.html">
								<div class ="container">
									<img class="img-fluid image" src="images/anvat.jpg"/>
									<div class="overlay">
										<div class="text">Ăn vặt / Vỉa hè</div>
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-md-3">
						<div class="service_item">
							<a href="listing.html">
								<div class ="container2">
									<img class="img-fluid image2" src="images/cake.jpg"/>
									<div class="overlay2">
										<div class="text">Café / Dessert</div>
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-md-3">
						<div class="service_item">
							<a href="listing.html">
								<div class ="container3">
									<img class="img-fluid image3" src="images/pub.jpg"/>
									<div class="overlay3">
										<div class="text">Bar / Pub</div>
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-md-3">
						<div class="service_item">
							<a href="listing.html">
								<div class ="container4">
									<img class="img-fluid image4" src="images/restaurant.jpg"/>
									<div class="overlay4">
										<div class="text">Nhà hàng</div>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- end blog Area -->	

		<!-- Footer -->
		<footer>
			<!-- Footer top -->
			<div class="container footer_top">
				<div class="row">
					<div class="col-lg-4 col-sm-7">
						<div class="footer_item">
							<h4>About Company</h4>
							<img class="logo" src="images/logo.png" alt="Construction" />
							<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem</p>

							<ul class="list-inline footer_social_icon">
								<li><a href=""><span class="fa fa-facebook"></span></a></li>
								<li><a href=""><span class="fa fa-twitter"></span></a></li>
								<li><a href=""><span class="fa fa-youtube"></span></a></li>
								<li><a href=""><span class="fa fa-google-plus"></span></a></li>
								<li><a href=""><span class="fa fa-linkedin"></span></a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-2 col-sm-5">
						<div class="footer_item">
							<h4>Explore link</h4>
							<ul class="list-unstyled footer_menu">
								<li><a href=""><span class="fa fa-play"></span> Our services</a>
								<li><a href=""><span class="fa fa-play"></span> Meet our team</a>
								<li><a href=""><span class="fa fa-play"></span> Forum</a>
								<li><a href=""><span class="fa fa-play"></span> Help center</a>
								<li><a href=""><span class="fa fa-play"></span> Contact Cekas</a>
								<li><a href=""><span class="fa fa-play"></span> Privacy Policy</a>
								<li><a href=""><span class="fa fa-play"></span> Cekas terms</a>
								<li><a href=""><span class="fa fa-play"></span> Site map</a>
							</ul>
						</div>
					</div>
					<div class="col-lg-3 col-sm-7">
						<div class="footer_item">
							<h4>Latest post</h4>
							<ul class="list-unstyled post">
								<li><a href=""><span class="date">20 <small>AUG</small></span>  Luptatum omittantur duo ne mpetus indoctum</a></li>
								<li><a href=""><span class="date">20 <small>AUG</small></span>  Luptatum omittantur duo ne mpetus indoctum</a></li>
								<li><a href=""><span class="date">20 <small>AUG</small></span>  Luptatum omittantur duo ne mpetus indoctum</a></li>
								<li><a href=""><span class="date">20 <small>AUG</small></span>  Luptatum omittantur duo ne mpetus indoctum</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-3 col-sm-5">
						<div class="footer_item">
							<h4>Contact us</h4>
							<ul class="list-unstyled footer_contact">
								<li><a href=""><span class="fa fa-map-marker"></span> 124 New Line, London UK</a></li>
								<li><a href=""><span class="fa fa-envelope"></span> hello@psdfreebies.com</a></li>
								<li><a href=""><span class="fa fa-mobile"></span><p>+44 00 00 1234 <br />+44 00 00 1234</p></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div><!-- Footer top end -->

			<!-- Footer bottom -->
			<div class="footer_bottom text-center">
				<p class="wow fadeInRight">
					Made with 
					<i class="fa fa-heart"></i>
					by 
					<a target="_blank" href="http://bootstrapthemes.co">Bootstrap Themes</a> 
					2016. All Rights Reserved
				</p>
			</div><!-- Footer bottom end -->
		</footer><!-- Footer end -->

		<!-- JavaScript -->
		<script src="js/jquery-1.12.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

		<!-- Bootsnav js -->
		<script src="js/bootsnav.js"></script>

		<!-- JS Implementing Plugins -->
		<script src="js/isotope.js"></script>
		<script src="js/isotope-active.js"></script>
		<script src="js/jquery.fancybox.js?v=2.1.5"></script>

		<script src="js/jquery.scrollUp.min.js"></script>

		<script src="js/main.js"></script>
	</body>	
</html>	