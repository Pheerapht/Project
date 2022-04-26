<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>shop</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="Assets/styles/styles.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="cart.css">
    <script src="products.js"></script>
    <script src="cart.js"></script>
</head>

<body>
<div id="mainWrapper">
  <header>
       <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p><h1>Welcome <strong><?php echo $_SESSION['username']; ?></strong> </h1></p>
  <?php endif ?>
    <div id="headerLinks"><a href="login.php" title="Login/Register">Login/Register</a><a href="#" title="Cart">Cart</a><a href="index.php?logout='1'" style="color: red;">logout</a></div>
  </header>
  <section id="offer"> 
    <h2>OFFER 100%</h2>
    <p>NEW ARRIVAL</p>
  </section>

  <div id="content">
    <section class="sidebar"> 
      <input type="text"  id="search" value="search">
      <div id="menubar">
        <nav class="menu">
          <h2>MENU ITEM 1 </h2>
          <hr>
          <ul>
            <!-- List of links 1 -->
            <li><a href="#" title="Link">Link 1</a></li>
            <li><a href="#" title="Link">Link 2</a></li>
            <li><a href="#" title="Link">Link 3</a></li>
            <li class="notimp"><a href="#"  title="Link">Link 4</a></li>
            <li><a href="index.php?logout='1'" style="color: red;">logout</a></li>
          </ul>
        </nav>
      </div>
    </section>
    <section class="mainContent"> 
      <!-- (A) CART -->
    <div id="cart-wrap">
      <!-- (A1) PRODUCTS LIST -->
      <div id="cart-products"></div>
      <!-- (A2) CURRENT CART ITEMS -->
      <div id="cart-items"></div>
    </div>
    <!-- (B) TEMPLATES -->
    <!-- (B1) PRODUCT CELL -->
    <template id="template-product">
    <div class="p-item">
      <img class="p-img"/>
      <div class="p-name"></div>
      <div class="p-desc"></div>
      <div class="p-price"></div>
      <button class="cart p-add">Add To Cart</button>
    </div>
    </template>
    <!-- (B2) CART ITEMS -->
    <template id="template-cart">
    <div class="c-item">
      <div class="c-name"></div>
      <button class="c-del cart">X</button>
      <input class="c-qty" type="number" min="0"/>
    </div>
    </template>
    <template id="template-cart-checkout">
      <button class="c-empty cart" onclick="cart.nuke()">Empty</button>
      <button class="c-checkout cart" onclick="cart.checkout()">Checkout</button>
    </template>
    <p>&nbsp;</p>
    </section>
  </div>
  <footer> 
    <div>
      <p>.................................</p>
    </div>
    <div>
      <p>.................................</p>
    </div>
    <div class="footerlinks">
      <p><a href="index.html" title="Link">Home</a></p>
      <p><a href="#" title="Link">Cart</a></p>
      <p>&nbsp;</p>
    </div>
  </footer>
</div>
</div>
</body>
</html>