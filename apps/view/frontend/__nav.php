<div class="fixed contain-to-grid">
  <nav class="top-bar" data-topbar role="navigation" data-options="sticky_on: large">
    <ul class="title-area">
      <li class="name">
        <?php $logo = "logo.png"; ?>
        <a href="<?php echo base_url("home"); ?>"><img style="height:40px;margin:2px;" src="<?php echo base_url("assets/img/").$logo ?>" alt="Fujitsu Guide to Japanese" /></a>
      </li>
      <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
    </ul>
    <section class="top-bar-section">
      <!-- Right Nav Section -->
      <ul class="right">
				<?php //if(isset($logged)) { ?>
        <!-- <li class="divider hide-for-small"></li> -->
        <!-- <li class="has-dropdown not-click"> -->
          <!-- <ul class="dropdown"> -->
            <!-- <li class="divider hide-for-small"></li> -->
            <li><a href="<?php echo base_url("home"); ?>" class="ttfos"><i class="fi-home"></i> Beranda</a></li>
            <li class=""><a href="#">Profile</a></li>
            <!-- <li class="divider hide-for-small"></li> -->
            <li class=""><a href="#">Kuis</a></li>
            <li><a href="<?php echo base_url(); ?>" class="ttfos"><i class="fi-power"></i> Keluar</a></li>
          <!-- </ul> -->
        <!-- </li> -->
				<?php //}else{ ?>
				<!-- <li><a href="<?php echo base_url("login"); ?>" class="ttfos">Masuk</a></li> -->
				<?php //} ?>
      </ul>
    </section>
  </nav>
</div>

<!--//start of container//-->
<div class="container" style="margin-top:3em;">
