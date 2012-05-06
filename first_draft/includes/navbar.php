
	<div id="menu">
		<div class="home">
			<img src="graphics/halo.png" width="180" height="60" alt="Home" />
			<p><a href="index.php">Home</a></p>
		</div>
		<div class="cupcakes"> 
			<img src="graphics/halo.png" width="180" height="60" alt="cupcakes" />
			<p><a href="cupcakes.php">Cupcakes</a></p>
		</div>
		<div class="About_Us">
			<img src="graphics/halo.png" width="180" height="60" alt="About Us" />
			<p><a href="about_us.php">About Us</a></p>
		</div>
		<div class="Place_An_Order">
			<img src="graphics/halo.png" width="180" height="60" alt="Place An Order" />
			<p><a href="place_an_order.php">Place An Order</a></p>
		</div>
		<div class="User_Login">
			<img src="graphics/halo.png" width="180" height="60" alt="User Login" />
			<p><a href="user_login.php">User Login</a></p>
		</div>
	</div>
	
	<script type="text/javascript">
		$(document).ready(function(){$("#menu div").hover(
				function() {
					$(this).find('img').stop().animate({"opacity" : "1"}, "slow");
				},
				function(){
					$(this).find('img').stop().animate({"opacity" : "0"}, "slow");
					});
				});
	</script>
	