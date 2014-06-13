

<div class="container">
	<div class="sixteen columns">
		<section class="slider">
			<div class="flexslider home">
				<ul class="slides">
					<li>
						<img src="/static/images/banners/produse.jpg" alt="" />
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
                
                    <li><a class="dropdown icon down" href="<?php if ($category['clickable']) { ?>/<?= $category['link_' . LANGUAGE] ?><?php } else { ?>javascript:;<?php } ?>"><?= $category['title_' . LANGUAGE] ?></a>
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
		<div class="content-block" >
			<p class="prod-info">
				<?= nl2br($translations[90]) ?>
            </p>			
		</div>
	</div>
</div>
