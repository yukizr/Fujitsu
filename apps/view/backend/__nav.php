<div class="contain-to-grid">
  <nav class="top-bar" data-topbar>
    <ul class="title-area">
      <li class="name">
				<h1 class="h1titletopbar">Admin Panel | Fujitsu Guide Japanese</h1>
      </li>
      <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
    </ul>

    <section class="top-bar-section">
      <ul class="right">
				<?php if(isset($sess['admin'])) { ?>
				<li><a href="<?php echo base_url("admin/"); ?>" class="ttfos"><i class="fi-home"></i> Home</a></li>
				<!-- <li><a href="<?php echo base_url("kumpulkupon"); ?>" class="ttfos"><i class="fi-star"></i> Kumpul Kupon</a></li>
				<li class="has-dropdown">
					<a href="#" class="ttfos"><i class="fi-list"></i> Manage</a>
					<ul class="dropdown">
						<li><a href="<?php echo base_url("manage/warna"); ?>" class="ttfos"><i class=""></i> Warna</a></li>
						<li><a href="<?php echo base_url("manage/size"); ?>" class="ttfos"><i class=""></i> Size</a></li>
						<li><a href="<?php echo base_url("manage/grupjenis"); ?>" class="ttfos"><i class=""></i> Grup Jenis</a></li>
					</ul>
				</li>-->
				<li><a href="<?php echo base_url("admin/logout"); ?>" class="ttfos"><i class="fi-power"></i> Keluar</a></li>
				<?php }else{ ?>
				<!-- <li><a href="<?php echo base_url("login"); ?>" class="ttfos">Login</a></li> -->
				<?php } ?>

      </ul>

      <!-- Left Nav Section -->

    </section>
  </nav>
</div>

<!--//start of container//-->
<div class="container">
