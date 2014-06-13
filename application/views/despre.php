<div class="container" style="overflow: visible;">


	<!-- Flexslider -->

	<div class="sixteen columns">
		<section class="slider">
			<div class="flexslider home">
				<ul class="slides">
					<li>
						<img src="/static/images/banners/despre_<?= LANGUAGE ?>.jpg" alt="" />
					</li>
				</ul>
			</div>
			<div class="tp-bannershadow tp-shadow1" style="width: 940px;"></div>
		</section>

  	</div>

	<!-- Flexslider / End -->



</div>
<br><br>



	<style>
		div.slider_container{border: 1px solid #ccc; width: 728px; height: 580px; float: left; }		
	</style>

	<script>

		var page_company 		= 1;
		var page_stocks 		= 1;
		var length 				= 728;
		var max_pages_company 	= <?= ceil($company_gallery_count / 4); ?>;
		var max_pages_stocks 	= <?= ceil($stocks_gallery_count / 4); ?>;
		
		
		function goto(section, direction)
		{
			if (section == 'company') {
				max_pages = max_pages_company;
				container = $("#super_container_company");
				
				
				if (direction == 'next') {
					if (page_company == max_pages) {
						container.animate({"left": "0px"}, "normal");
						page_company = 1;
					} else {
						container.animate({"left": "-=" + length + "px"}, "normal");
						page_company++;
					}
				} else {
					if (page_company > 1) {
						container.animate({"left": "+=" + length + "px"}, "normal");
						page_company--;
					}
				}				
				
				
			} else {
				max_pages = max_pages_stocks;
				container = $("#super_container_stocks");
				
				if (direction == 'next') {
					if (page_stocks == max_pages) {
						container.animate({"left": "0px"}, "normal");
						page_stocks = 1;
					} else {
						container.animate({"left": "-=" + length + "px"}, "normal");
						page_stocks++;
					}
				} else {
					if (page_stocks > 1) {
						container.animate({"left": "+=" + length + "px"}, "normal");
						page_stocks--;
					}
				}				
				
			}
			




		}	
	</script>	


<div class="container">
	<div class="sixteen columns">
		<div class="main-headline">
			<h2><?= $translations[60] ?></h2>
			<div style="background: #72b626" id="bolded-line"></div>
		</div>
	</div>
</div>



<div class="container">
	<div class="sixteen custom-width float-right columns">
		<div class="left-bar"></div>
		<div class="headline no-margin section-block section-compania"><h3><?= $translations[61] ?></h5></div>
		<div class="content-block">
			<?= $translations[62] ?>
            
            <div style="float:left">
            	<a class="next_prev" href="javascript:;" onClick="goto('company', 'previous');"><img src="/static/images/arrow_left.png"  border="0" /></a>
            </div>
			<div style=" float:left; margin-left:20px;" >
				<?php if (isset($company)) { ?>
                    <div class="mask" style="width: 728px; height: 182px; overflow: hidden;">
                        <div id="super_container_company" style="height:182px; width: <?= 182 * $company_gallery_count ?>px; position: relative;">
                            <?php foreach ($company as $val) { ?>
                                <a style="float: left; margin-right: 20px; margin-bottom: 20px; " title="<?= $translations[61] ?>" rel="image" href="/static/images/despre/company/<?= $val?>"><img class="border_img" alt="" src="/static/images/despre/company<?= '/thumbnails/' . $val?>" class="border_img">
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
			</div>
            <div style="float:left">
            	<a class="next_prev" href="javascript:;" onClick="goto('company', 'next');"><img src="/static/images/arrow_right.png" border="0"  /></a>
            </div>
            
			<div class="clear"></div>
		</div>
	</div>
</div>

<br><br>

<div class="container">
	<div class="sixteen custom-width float-right columns">
		<div class="left-bar"></div>
		<div class="headline no-margin section-block section-evolutie"><h3><?= $translations[63] ?></h3></div>
		<div class="content-block">
			<?= $translations[64] ?>
			<div id="portfolio-wrapper" class="">
				<div style="margin-left: 25px" class="thirteen columns portfolio-item interior-design architecture real-estate isotope-item">
					<a title="<?= $translations[63] ?>" rel="image" href="/static/images/despre/evolutie/<?= LANGUAGE ?>/1.jpg" style="float: left; margin-left: 0px;"><div style="width:230px; height:145px;"><img style="width:230px;" alt="" src="/static/images/despre/evolutie/<?= LANGUAGE ?>/1-small.jpg" class="border_img"></div></a>
					<a title="<?= $translations[63] ?>" rel="image" href="/static/images/despre/evolutie/<?= LANGUAGE ?>/2.jpg" style="float: left; margin-left: 35px;"><div style="width:230px; height:145px;"><img style="width:230px;" alt="" src="/static/images/despre/evolutie/<?= LANGUAGE ?>/2-small.jpg" class="border_img"></div></a>
					<a title="<?= $translations[63] ?>" rel="image" href="/static/images/despre/evolutie/<?= LANGUAGE ?>/3.jpg" style="float: left; margin-left: 35px;"><div style="width:230px; height:145px;"><img style="width:230px;" alt="" src="/static/images/despre/evolutie/<?= LANGUAGE ?>/3-small.jpg" class="border_img"></div></a>
			<div class="clear"></div>

				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>

<br><br>

<div class="container">
	<div class="sixteen custom-width float-right columns">
		<div class="left-bar"></div>
		<div class="headline no-margin section-block section-stocuri"><h3><?= $translations[65] ?></h3></div>
		<div class="content-block">
			<?= $translations[66] ?>
            <div style="float:left">
            	<a class="next_prev" href="javascript:;" onClick="goto('stocks', 'previous');"><img src="/static/images/arrow_left.png"  border="0" /></a>
            </div>
			<div style=" float:left; margin-left:20px;" >
				<?php if (isset($stocks)) { ?>
                    <div class="mask" style="width: 728px; height: 182px; overflow: hidden;">
                        <div id="super_container_stocks" style="height:182px; width: <?= 182 * $company_gallery_count ?>px; position: relative;">
							<?php foreach ($stocks as $val) { ?>
                                <a style="float: left; margin-right: 20px; margin-bottom: 20px; " title="<?= $translations[65] ?>" rel="image" href="/static/images/despre/stocks/<?= $val?>"><img class="border_img" alt="" src="/static/images/despre/stocks<?= '/thumbnails/' . $val?>" class="border_img">
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
			</div>
            <div style="float:left">
            	<a class="next_prev" href="javascript:;" onClick="goto('stocks', 'next');"><img src="/static/images/arrow_right.png" border="0"  /></a>
            </div>
			<div class="clear"></div>
		</div>
	</div>
</div>

<br><br>

<div class="container">
	<div class="sixteen custom-width float-right columns">
		<div class="left-bar"></div>
		<div class="headline no-margin section-block section-certificari"><h3><?= $translations[67] ?></h3></div>
		<div class="content-block">
			<?= $translations[68] ?>
			<div style="margin-left: 30px;" id="portfolio-wrapper" class="isotope">
				<div class="four columns portfolio-item interior-design architecture real-estate isotope-item" >
					<div class="">
						<a title="<?= $translations[67] ?>" rel="image" href="/static/images/despre/desfacere/desfacere_romania_<?= LANGUAGE ?>.jpg"><img alt="" src="/static/images/despre/desfacere/desfacere_romania_small_<?= LANGUAGE ?>.jpg" class="border_img">
						</a>
					</div>
				</div>
				<div class="four columns portfolio-item interior-design architecture real-estate isotope-item" >
					<div class="">
						<a title="<?= $translations[67] ?>" rel="image" href="/static/images/despre/desfacere/desfacere_europa_<?= LANGUAGE ?>.jpg"><img alt="" src="/static/images/despre/desfacere/desfacere_europa_small_<?= LANGUAGE ?>.jpg" class="border_img">
						</a>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>



