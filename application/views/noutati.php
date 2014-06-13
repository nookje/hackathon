<div class="container" style="overflow: visible;">
	<div class="sixteen columns">
		<section class="slider">
			<div class="flexslider home">
				<ul class="slides">
					<li>
						<img src="/static/images/slider-noutati.jpg" alt="" />
					</li>
				</ul>
			</div>
			<div class="tp-bannershadow tp-shadow1" style="width: 940px; "></div>
		</section>
  	</div>
</div>
<br><br>



<?php $i = 0; ?>
<?php foreach ($noutati as $val) { ?>
	<div class="container noutati_block">
		<div class="sixteen custom-width float-right columns">
			<div class="left-bar"></div>
			<div class="headline no-margin section-block section-noutati"><h3><?php if ($i == 0) { ?><?= $translations[130]?><?php } $i++; ?></h3></div>
			
        	<?php if ($authorized) { ?>
                <p class="prod-desc">
                    <a style="float:right;" href="/admin_news/sterge_noutate/<?= $val['id'] ?>" target="_blank">Sterge</a>
                    <a href="/admin_news/editeaza_noutate/<?= $val['id'] ?>">Editeaza</a>
                </p>
            <?php } ?>

			<div class="content-block">

				<div class="news-header">
					<h1><?= $val["title_" . LANGUAGE] ?></h1>
					<span class="timestamp"><?= $val["period"] ?></span>
				</div>
				<?php if (isset($val['poster'])) { ?>
                    <img src="/static/images/noutati/<?= $val['id'] . '/poster/' . $val['poster']?>" alt="<?= $val['poster'] ?>">
                    <br />
                <?php } ?>
				<p><?= nl2br($val["description_" . LANGUAGE]) ?></p>
				<br>
				<?php if (isset($val['avatar'])) { ?>
					<h5><a href="/noutati/vezi/<?= $val["id"] ?>"><?= $translations[131]?></a></h5>
					<br />
                <?php } ?>

			</div>
		</div>
	</div>
<?php } ?>


<?php if ($numar_de_pagini > 1) { ?>
    <div style="font-size:15px; text-align:center; margin:20px 0px; ">
    <?php for ($i = 1; $i <= $numar_de_pagini; $i++) { ?>
    	<?php if ($page == $i) { ?>
        	<font style="background-color:#c62020; padding:3px 6px; color:#fff;"><?= $page ?></font>
        <?php } else { ?>
			<a class="categories" style="border: 1px solid; padding:3px 6px;" href="/noutati/lista/<?= $i ?>" title="Vezi pagina <?= $i ?>"><?= $i ?></a>                    
		<?php } ?>
    <?php } ?>
    </div>

<? } ?>