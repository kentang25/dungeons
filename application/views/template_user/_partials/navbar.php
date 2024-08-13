<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand text-main" href="<?= base_url('dashboard') ?>">Dungeons</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active secondary-col text-black" aria-current="page" href="<?= base_url('dashboard') ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link secondary-col text-black" href="<?= base_url('shop') ?>">Shop</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle secondary-col text-black" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Kategori
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= base_url('categories/pakaian-pria') ?>">T-shirt</a></li>
            <li><a class="dropdown-item" href="<?= base_url('categories/shoes') ?>">Shoes</a></li>
            <li><a class="dropdown-item" href="<?= base_url('categories/cassette') ?>">Cassette</a></li>
            <li><a class="dropdown-item" href="<?= base_url('categories/accessories') ?>">Accessories</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link secondary-col text-black" href="#footer">Contact</a>
        </li>
      </ul>

      
      <div class="navbar">
          <ul class="nav navbar-nav navbar-right">
            <li><?php $keranjang = '<div class="btn btn-warning"><i class="fa fa-shopping-cart"></i> '. $this->cart->total_items(). ' items </div>' ?>
                <?= anchor('keranjang/detail',  $keranjang); ?>
             </li>
           </ul>
      </div>
      
      <div class="d-flex">
        <?= form_open('dungeons/dashboard/search'); ?>
          <input type="" name="keyword" class="form-control d-flex" placeholder="Seacrh" value=''>
        <?= form_close() ?>
      </div>
      
    </div>
  </div>
</nav>