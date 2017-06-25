<!--//contain row after container//-->
  <div class="row">
		<!--//container main //-->
    <div class="large-12 columns">
			<div class="row">
				<div class="large-offset-3 medium-offset-3 medium-9 large-5 columns">
					<ul class="pricing-table">
						<form action="<?php echo base_url("admin/login"); ?>" method="post">
						<li class="title"><h3 style="color:#fff;" class="ttfos"></h3></li>
						<?php if(!empty($warn)){ ?>
						<li class="description" style="background-color:#ef0000; color:#fff;"><?php echo $warn; ?></li>
						<?php } ?>
						<li class="bullet-item">
							<input type="text" name="email" placeholder="email" required="required" />
						</li>
						<li class="bullet-item">
							<input type="password" name="password" placeholder="password" required="required" />
						</li>
						<li class="cta-button">
							<input type="submit" name="submit" value="Login" class="button primary ttfos expand" />
							<a href="<?php echo base_url(""); ?>" class="button info ttfos expand">Home</a>
						</li>
						</form>
					</ul>
				</div>
			</div>
  </div>
<!--//contain row after container//-->
