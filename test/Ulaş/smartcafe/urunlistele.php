<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Üyeler Div</title>
		<script src="cafe1/js/jquery.min.js"></script>
        <script src="js/jquery.min.js"></script>
		<link rel="stylesheet" href="cafe1/css/bootstrap.min.css" />
		<script src="cafe1/js/bootstrap.min.js"></script>
		<style>
		.popover
		{
		    width: 100%;
		    max-width: 800px;
		}
		</style>
</head>

<body>
<h1>Üyeler</h1>

<div class="container">
	<nav class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Menu</span>
							<span class="glyphicon glyphicon-menu-hamburger"></span>
							</button>
							<a class="navbar-brand" href="/">Webslesson</a>
						</div>
						
						<div id="navbar-cart" class="navbar-collapse collapse">
							<ul class="nav navbar-nav">
								<li>
									<a id="cart-popover" class="btn" data-placement="bottom" title="Shopping Cart">
										<span class="glyphicon glyphicon-shopping-cart"></span>
										<span class="badge"></span>
										<span class="total_price">$ 0.00</span>
									</a>
								</li>
							</ul>
						</div>
						
					</div>
	</nav>
</div>


</body>
</html>
