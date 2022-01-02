<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="container">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
      
    <!-- Navbar items left -->
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/product">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/cart/index">Cart</a>
        </li>
      </ul>

    </div>
    <div class="mx-auto order-0">
      <a class="navbar-brand mx-auto" href="#"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    
    
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">

      <!-- Navbar items right -->
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">

          <!-- only clickable when logged in TO DO: -->
          <?php if (isset($_SESSION['logged_User']) && isset($_SESSION['role']) && $_SESSION['role'] == 'admin') { ?>
            <a class="nav-link" href="/admin">Admin</a>
          <?php } else { ?>
            <a class="nav-link disabled" href="#">Admin</a>
          <?php } ?>
        </li>
        <li class="nav-item">

          <!-- when logged in, show logout butten and reverse -->
          <?php if (!isset($_SESSION['logged_User'])) { ?>
            <a class="nav-link" href="/login">Login</a>
          <?php } else { ?>
            <a class="nav-link" href="/login/logout">Logout</a>
          <?php } ?>
        </li>
      </ul>
    </div>
  </div>
</nav>