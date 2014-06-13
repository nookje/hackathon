<div class="container">
	<div class="sixteen columns">
		<section class="slider">
			<div class="flexslider home">
				<ul class="slides">
					<li>
                    	<?php if (@$breadcrumb[0] == 1) { ?>
							<img src="/static/images/banners/categorii-produse/<?= $breadcrumb[0] ?>.jpg" alt="" />                        
                        <?php } else { ?>
							<img src="/static/images/banners/produse.jpg" alt="" />
                        <?php } ?>
					</li>
				</ul>
			</div>
			<div class="tp-bannershadow tp-shadow1" style="width: 940px;"></div>
		</section>
  	</div>
</div>
<br><br>





<div class="container" style="margin-top: -25px">
	<div class="sixteen columns">

        <form action="/cauta/nume" method="get" id="cauta_nume">
            <div class="top-search name-search">
                    <input type="text" placeholder="<?= $translations[91] ?>" name="query">
                <a href="javascript:;" onclick="document.getElementById('cauta_nume').submit();"><?= $translations[93] ?></a>
            </div>
        </form>

        <form action="/cauta/cod" method="get" id="cauta_cod">
            <div class="top-search code-search">
                    <input type="text" placeholder="<?= $translations[92] ?>" name="query">
                <a href="javascript:;" onclick="document.getElementById('cauta_cod').submit();"><?= $translations[93] ?></a>
            </div>
        </form>
		<div class="tp-bannershadow tp-shadow1" style="width: 940px; position: relative; top: 40px"></div>
	</div>
</div>


<div class="container">
	<div class="four columns">
		<br>
		<ul class="left-prod">
        
        	<?php 
				$level = 0; 
				$changed = 0;
				$direction = '';
			?>
            
			<?php foreach ($categories as $key => $category) { ?>
                
                <?php 
					if ($level != $category['level']) {
						if ($level < $category['level']) {
							$direction = 'up';
						} else {
							$direction = 'down';
						}
						$changed = 1;
					} else {
						$changed = 0;
					}
				?>
                <?php if ($category['level'] == 1) { ?>
                	<?php if ($changed == 1 && $direction == 'down') { ?>
                    	<?php if ($level == 3) { ?>
                                </ul>
                            </li>
                        </ul>
                        <?php } elseif ($level == 2) { ?>
                            </li>
                        </ul>
                        <?php } ?>
                        </li>					
                    <?php } ?>
                
                    <li <?php if (@$breadcrumb[0] == $key) { ?>class="active" <?php } ?>><a class="dropdown icon down" href="<?php if ($category['clickable']) { ?>/<?= $category['link_' . LANGUAGE] ?><?php } else { ?>javascript:;<?php } ?>"><?= $category['title_' . LANGUAGE] ?></a>
				<?php } elseif ($category['level'] == 2) { ?>
                	<?php if ($changed == 1 && $direction == 'up') { ?>
	                    <ul class="second-level">
					<?php } elseif ($changed == 1 && $direction == 'down') { ?>
                            </ul>
                        </li>					
                    <?php } ?>
                    <li class="category"><a class="icon down" href="<?php if ($category['clickable']) { ?>/<?= $category['link_' . LANGUAGE] ?><?php } else { ?>javascript:;<?php } ?>"><?= $category['title_' . LANGUAGE] ?></a>
				<?php } elseif ($category['level'] == 3) { ?>
                	<?php if ($changed == 1 && $direction == 'up') { ?>
						<ul>
					<?php } ?>
                    <li><a href="<?php if ($category['clickable']) { ?>/<?= $category['link_' . LANGUAGE] ?><?php } else { ?>javascript:;<?php } ?>"><?= $category['title_' . LANGUAGE] ?></a></li>
                <?php } ?>
                
				<?php 
                    $level = $category['level']; 
                ?>
                
            <?php } ?>
        
        
            </li>
        </ul>
        </div>
        

	<div class="twelve columns">
		<br>
        <?php if ($product === false) { ?>
            <h3 style="color:red;">Codul de produs nu a fost gasit</h3>
        <?php } else { ?>
        
			<ul class="breadcrumb">
				<?php foreach ($breadcrumb as $val) { ?>
		            <li><a href="javascript:;"><?= $categories[$val]['title_' . LANGUAGE] ?></a></li>
		        <?php } ?>
			</ul>
			<br>        
        
	        <div class="content-block">
			<h1 class="single_prod_title"><?= $product['title_' . LANGUAGE] ?></h1>
			<div class="prod-list">
				<div class="prod-view">
					<?php if (isset($product['avatar'])) { ?>
						<a title="<?= $product['title_' . LANGUAGE] ?>" href="/static/images/produse/<?= $product['id'] . '/' . $product['avatar']?>" rel="image">
	                        <img class="prod-img" src="/static/images/produse/<?= $product['id'] . '/thumbnails/' . $product['avatar']?>" alt="<?= $product['avatar'] ?>" title="<?= $product['title_' . LANGUAGE] ?>">
                        </a>
                    <?php } else { ?>
                        <img class="prod-img" src="/static/images/produse/default.jpg" alt="">
                    <?php } ?>
                
					<p class="prod-code"><?= $translations[92] ?>: <?= $product['code'] ?></p>
					<p class="prod-desc">
						<?= nl2br($product['description_' . LANGUAGE]) ?>
					</p>
					<?php if (isset($product['pdf'])) { ?>
                        <p><?= $translations[95] ?>:</p>
                        <a class="download pdf" href="/static/images/produse/<?= $product['id'] ?>/pdf/<?= $product['pdf'] ?>" target="_blank"><?= $product['pdf'] ?></a>        
					<?php } ?>
					<div class="clear"></div>
				</div>
			</div>
			<div class="clear"></div>
			<br>
		</div>		
        <?php } ?>
        
	</div>
</div>
