<div class="container" style="overflow: visible;">
	<!-- Flexslider -->
	<div class="sixteen columns">
		<section class="slider">
			<div class="flexslider home">
				<ul class="slides">
					<li>
						<img src="/static/images/banners/download.jpg" alt="" />
					</li>
				</ul>
			</div>
			<div class="tp-bannershadow tp-shadow1" style="width: 940px;"></div>
		</section>
  	</div>
	<!-- Flexslider / End -->
</div>
<br><br>

<div class="container">
	<div class="sixteen custom-width float-right columns">
		<div class="left-bar"></div>
		<div class="headline no-margin section-block section-compania"><h3><?= $translations[150] ?></h3></div>
		<div class="content-block">
            <div style="float: left; margin-right: 22px; margin-bottom: 20px;">
                <a title="<?= $translations[156] ?>" rel="image" href="/static/images/download/brosuri/PREZENTARE GENERALA.jpg" ><div style="width:150px; height:178px;"><img style="width:150px;" alt="" src="/static/images/download/brosuri/PREZENTARE GENERALA-small.jpg"></div></a>
                <br />
                <a href="/download/brosura/156" target="_blank"><?= $translations[157] ?></a>                
            </div>
            <div style="float: left; margin-right: 22px; margin-bottom: 20px;">
                <a title="<?= $translations[155] ?>" rel="image" href="/static/images/download/brosuri/GAMA DE PRODUSE.jpg" ><div style="width:150px; height:178px;"><img style="width:150px;" alt="" src="/static/images/download/brosuri/GAMA DE PRODUSE-small.jpg"></div></a>
                <br />
                <a href="/download/brosura/155" target="_blank"><?= $translations[157] ?></a>                
            </div>
			<div class="clear"></div>
		</div>
	</div>
</div>

<br><br>

<div class="container">
	<div class="sixteen custom-width float-right columns">
		<div class="left-bar"></div>
		<div class="headline no-margin section-block section-evolutie"><h3><?= $translations[151] ?></h3></div>
		<div class="content-block">
            
            <?php foreach ($categories as $key => $val) { ?>
            	<?php if ($val['parent'] == 0) { ?>
                    <div style="float: left; margin-right: 22px; margin-bottom: 20px;">
                    	<a title="<?= $categories[$key]['title_' . LANGUAGE] ?>" rel="image" href="/static/images/download/cataloage/ro/<?= $categories[$key]['title_ro'] ?>.jpg" ><div style="width:150px; height:178px;"><img style="width:150px;" alt="" src="/static/images/download/cataloage/ro/small/<?= $categories[$key]['title_ro'] ?>.jpg"></div></a>
                        <br />
						<a href="/download/catalog/<?= $key ?>" target="_blank"><?= $translations[154] ?></a>
					</div>
				<?php } ?>
			<?php } ?>
			<div class="clear"></div>
		</div>
	</div>
</div>

<br><br>



<div class="container">
	<div class="sixteen custom-width float-right columns">
		<div class="left-bar"></div>
		<div class="headline no-margin section-block section-compania"><h3><?= $translations[152] ?></h5></div>
		<div class="content-block">
			<?= $translations[158] ?>
			<br /><br />
			<div class="clear"></div>

			<img src="/static/images/robmet_logo_web.png" style="width:150px;" /><br />

            <div style="float: left; margin-right: 22px; margin-bottom: 20px;">
                <a title="<?= $translations[300] ?>" rel="image" href="/static/images/download/certificari/1.ROBMET/ROMANA/CERTIFICAT ISO 9001 .jpg" ><div style="width:100px; height:141px;"><img style="width:100px;" alt="" src="/static/images/download/certificari/1.ROBMET/ROMANA/CERTIFICAT ISO 9001 .jpg"></div></a>
            </div>
            <div style="float: left; margin-right: 22px; margin-bottom: 20px;">
                <a title="<?= $translations[301] ?>" rel="image" href="/static/images/download/certificari/1.ROBMET/ROMANA/CERTIFICAT ISO 14001 .jpg" ><div style="width:100px; height:141px;"><img style="width:100px;" alt="" src="/static/images/download/certificari/1.ROBMET/ROMANA/CERTIFICAT ISO 14001 .jpg"></div></a>
            </div>
            <div style="float: left; margin-right: 22px; margin-bottom: 20px;">
                <a title="<?= $translations[302] ?>" rel="image" href="/static/images/download/certificari/1.ROBMET/ROMANA/CERTIFICATQEC ISO 9001.jpg" ><div style="width:100px; height:141px;"><img style="width:100px;" alt="" src="/static/images/download/certificari/1.ROBMET/ROMANA/CERTIFICATQEC ISO 9001.jpg"></div></a>
            </div>
            
			<div class="clear"></div>
			<div  style="border-bottom:1px solid #E1E1E1; height:5px;"></div>
            
			<img src="/static/images/furnizori/sigla1.png" style="width:150px;" />
            <div style="float: left; margin-right: 22px; margin-bottom: 20px;">
                <a title="<?= $translations[303] ?>" rel="image" href="/static/images/download/certificari/2.ROMINSERV/ROMANA/AUTORIZARE.jpg" ><div style="width:100px; height:141px;"><img style="width:100px;" alt="" src="/static/images/download/certificari/2.ROMINSERV/ROMANA/AUTORIZARE.jpg"></div></a>
            </div>
            <div style="float: left; margin-right: 22px; margin-bottom: 20px;">
                <a title="<?= $translations[304] ?>" rel="image" href="/static/images/download/certificari/2.ROMINSERV/ROMANA/CERTIFICAT API 6D.jpg" ><div style="width:100px; height:141px;"><img style="width:100px;" alt="" src="/static/images/download/certificari/2.ROMINSERV/ROMANA/CERTIFICAT API 6D.jpg"></div></a>
            </div>
            <div style="float: left; margin-right: 22px; margin-bottom: 20px;">
                <a title="<?= $translations[305] ?>" rel="image" href="/static/images/download/certificari/2.ROMINSERV/ROMANA/CERTIFICAT CE.jpg" ><div style="width:100px; height:141px;"><img style="width:100px;" alt="" src="/static/images/download/certificari/2.ROMINSERV/ROMANA/CERTIFICAT CE.jpg"></div></a>
            </div>
            <div style="float: left; margin-right: 22px; margin-bottom: 20px;">
                <a title="<?= $translations[300] ?>" rel="image" href="/static/images/download/certificari/2.ROMINSERV/ROMANA/CERTIFICAT ISO 9001.jpg" ><div style="width:100px; height:141px;"><img style="width:100px;" alt="" src="/static/images/download/certificari/2.ROMINSERV/ROMANA/CERTIFICAT ISO 9001.jpg"></div></a>
            </div>
            
            
			<div class="clear"></div>
			<div style="border-bottom:1px solid #E1E1E1; height:5px;"></div>
            
            <img src="/static/images/furnizori/sigla2.png" style="width:150px;" />
            <div style="float: left; margin-right: 22px; margin-bottom: 20px;">
                <a title="<?= $translations[303] ?>" rel="image" href="/static/images/download/certificari/3.ZETKAMA/ROMANA/AUTORIZARE.jpg" ><div style="width:100px; height:141px;"><img style="width:100px;" alt="" src="/static/images/download/certificari/3.ZETKAMA/ROMANA/AUTORIZARE.jpg"></div></a>
            </div>
            <div style="float: left; margin-right: 22px; margin-bottom: 20px;">
                <a title="<?= $translations[305] ?>" rel="image" href="/static/images/download/certificari/3.ZETKAMA/ROMANA/CERTIFICAT CE.jpg" ><div style="width:100px; height:141px;"><img style="width:100px;" alt="" src="/static/images/download/certificari/3.ZETKAMA/ROMANA/CERTIFICAT CE.jpg"></div></a>
            
            </div>
            <div style="float: left; margin-right: 22px; margin-bottom: 20px;">
                <a title="<?= $translations[306] ?>" rel="image" href="/static/images/download/certificari/3.ZETKAMA/ROMANA/CERTIFICAT LLOYD.jpg" ><div style="width:100px; height:141px;"><img style="width:100px;" alt="" src="/static/images/download/certificari/3.ZETKAMA/ROMANA/CERTIFICAT LLOYD.jpg"></div></a>
            </div>
            <div style="float: left; margin-right: 22px; margin-bottom: 20px;">
                <a title="<?= $translations[300] ?>" rel="image" href="/static/images/download/certificari/3.ZETKAMA/ROMANA/CERTIFICAT ISO 9001.jpg" ><div style="width:100px; height:141px;"><img style="width:100px;" alt="" src="/static/images/download/certificari/3.ZETKAMA/ROMANA/CERTIFICAT ISO 9001.jpg"></div></a>
            </div>
            
            
			<div class="clear"></div>
			<div style="border-bottom:1px solid #E1E1E1; height:5px;"></div>
            
            <img src="/static/images/furnizori/sigla6.jpg" style="width:150px;" />
            <div style="float: left; margin-right: 22px; margin-bottom: 20px;">
                <a title="<?= $translations[303] ?>" rel="image" href="/static/images/download/certificari/4.CENTORK/ROMANA/AUTORIZARE.jpg" ><div style="width:100px; height:141px;"><img style="width:100px;" alt="" src="/static/images/download/certificari/4.CENTORK/ROMANA/AUTORIZARE.jpg"></div></a>
            </div>
            <div style="float: left; margin-right: 22px; margin-bottom: 20px;">
                <a title="<?= $translations[300] ?>" rel="image" href="/static/images/download/certificari/4.CENTORK/ROMANA/CERTIFICAT ISO 9001.jpg" ><div style="width:100px; height:141px;"><img style="width:100px;" alt="" src="/static/images/download/certificari/4.CENTORK/ROMANA/CERTIFICAT ISO 9001.jpg"></div></a>
            
            </div>
            <div style="float: left; margin-right: 22px; margin-bottom: 20px;">
                <a title="<?= $translations[307] ?>" rel="image" href="/static/images/download/certificari/4.CENTORK/ROMANA/DECLARATIE DE CONFORMITATE.jpg" ><div style="width:100px; height:141px;"><img style="width:100px;" alt="" src="/static/images/download/certificari/4.CENTORK/ROMANA/DECLARATIE DE CONFORMITATE.jpg"></div></a>
            </div>
            
			<div class="clear"></div>
			<div style="border-bottom:1px solid #E1E1E1; height:5px;"></div>

            <img src="/static/images/furnizori/sigla4.png" style="width:150px;" />
            <div style="float: left; margin-right: 22px; margin-bottom: 20px;">
                <a title="<?= $translations[303] ?>" rel="image" href="/static/images/download/certificari/5.EVK/ROMANA/AUTORIZARE.jpg" ><div style="width:100px; height:141px;"><img style="width:100px;" alt="" src="/static/images/download/certificari/5.EVK/ROMANA/AUTORIZARE.jpg"></div></a>
            </div>
            <div style="float: left; margin-right: 22px; margin-bottom: 20px;">
                <a title="<?= $translations[305] ?>" rel="image" href="/static/images/download/certificari/5.EVK/ROMANA/CERTIFICAT CE.jpg" ><div style="width:100px; height:141px;"><img style="width:100px;" alt="" src="/static/images/download/certificari/5.EVK/ROMANA/CERTIFICAT CE.jpg"></div></a>
            
            </div>
            <div style="float: left; margin-right: 22px; margin-bottom: 20px;">
                <a title="<?= $translations[306] ?>" rel="image" href="/static/images/download/certificari/5.EVK/ROMANA/CERTIFICAT LLOYD.jpg" ><div style="width:100px; height:141px;"><img style="width:100px;" alt="" src="/static/images/download/certificari/5.EVK/ROMANA/CERTIFICAT LLOYD.jpg"></div></a>
            </div>
            <div style="float: left; margin-right: 22px; margin-bottom: 20px;">
                <a title="<?= $translations[300] ?>" rel="image" href="/static/images/download/certificari/5.EVK/ROMANA/CERTIFICAT ISO 9001.jpg" ><div style="width:100px; height:141px;"><img style="width:100px;" alt="" src="/static/images/download/certificari/5.EVK/ROMANA/CERTIFICAT ISO 9001.jpg"></div></a>
            </div>
            
            
			<div class="clear"></div>
            
		</div>
	</div>
</div>

<br><br>

