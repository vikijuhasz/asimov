<?php
  use Core\Router;
  use Core\H;
  use App\Models\Users;
  $menu = Router::getMenu('menu_acl');
  $userMenu = Router::getMenu('user_menu');
  $cartActive = (H::currentPage() == PROOT. 'bookstore/cart') ? ' active' : '';
  
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-danger sticky-top mb-3">
  <!-- Brand and toggle get grouped for better mobile display -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_menu" aria-controls="main_menu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="main_menu">
    <ul class="navbar-nav mr-auto">
      <?= H::buildMenuListItems($menu); ?>
    </ul>
        <form method="POST" action="<?=PROOT?>bookstore" class="form-inline my-2 my-lg-0 mr-3">
            <input class="form-control mr-sm-2 shadow-none" type="search" placeholder="Search..." aria-label="Search" name="search">
           <button class="btn btn-outline-light my-2 my-sm-0 hover" type="submit">Search</button>
       </form>
    <ul class="navbar-nav mr-2">
      <?= H::buildMenuListItems($userMenu,"dropdown-menu-right"); ?>
        <li class="nav-cart nav-item my-auto">
           <a class="btn btn-secondary" href="<?=PROOT?>bookstore/cart" class="nav-link <?=$cartActive?>"><i class="fas fa-shopping-cart"></i> 1 item</a>
        </li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
