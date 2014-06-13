
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
			<div class="tp-bannershadow tp-shadow1" style="width: 940px;"></div>
		</section>
  	</div>
</div>
<br><br>


<div class="container noutati_block">
	<div class="sixteen custom-width float-right columns">
		<div class="left-bar"></div>
		<div class="headline no-margin section-block section-noutati"><h3></h3></div>
		<div class="content-block">

			<div class="news-header">
				<h1><?= $noutate["title_" . LANGUAGE] ?></h1>
				<span class="timestamp"><?= $noutate["period"] ?></span>
			</div>
			<?php if (isset($noutate['poster'])) { ?>
                <img src="/static/images/noutati/<?= $noutate['id'] . '/poster/' . $noutate['poster']?>" alt="<?= $noutate['poster'] ?>">
                <br />
            <?php } ?>
			<p><?= nl2br($noutate["description_" . LANGUAGE]) ?></p>
			<br>
			<?php if (isset($noutate['gallery'])) { ?>
				<a name="galeria"></a>
				<?php foreach ($noutate['gallery'] as $val) { ?>
                    <a title="<?= str_replace("-", " ", $val) ?>" style="float: left; margin-right: 20px; margin-bottom: 20px; " href="/static/images/noutati/<?= $noutate['id'] . '/' . $val?>" rel="image"><img class="border_img"  src="/static/images/noutati/<?= $noutate['id'] . '/thumbnails/' . $val?>" alt="<?= $val ?>" title="<?= $val ?>"></a>
				<?php } ?>
				
				<div style="clear: both; "></div>
				<br />
            <?php } ?>

		</div>
	</div>
</div>

