
	<div id="menu">
		<div class="home">
			<img src="graphics/halo.png" width="180" height="60" alt="Home" />
			<p>Home</p>
		</div>
		<div class="cupcakes"> 
			<img src="graphics/halo.png" width="180" height="60" alt="cupcakes" />
			<p>Cupcakes</p>
		</div>
		<div class="About_Us">
			<img src="graphics/halo.png" width="180" height="60" alt="About Us" />
			<p>About Us</p>
		</div>
		<div class="Place_An_Order">
			<img src="graphics/halo.png" width="180" height="60" alt="Place An Order" />
			<p>Place An Order</p>
		</div>
		<div class="User_Login">
			<img src="graphics/halo.png" width="180" height="60" alt="User Login" />
			<p>User Login</p>
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
	