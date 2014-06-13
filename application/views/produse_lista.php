
<div class="container">
	<div class="sixteen columns">
		<section class="slider">
			<div class="flexslider home">
				<ul class="slides">
					<li>
                    	<?php if (in_array($breadcrumb[0], array(1, 21, 31, 41, 51, 61, 71, 80, 91, 101, 111, 161, 121, 141, 150))) { ?>
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
                
                    <li <?php if ($breadcrumb[0] == $key) { ?>class="active" <?php } ?>><a class="dropdown icon down" href="<?php if ($category['clickable']) { ?>/<?= $category['link_' . LANGUAGE] ?><?php } else { ?>javascript:;<?php } ?>"><?= $category['title_' . LANGUAGE] ?></a>
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
        
		<ul class="breadcrumb">
			<?php foreach ($breadcrumb as $val) { ?>
                <li><a href="javascript:;"><?= $categories[$val]['title_' . LANGUAGE] ?></a></li>
            <?php } ?>
		</ul>
		<br>

		<?php 
			$description = ''; 
		
			if (in_array($breadcrumb[0], array(1, 21, 31, 41, 51, 61, 71))) { 
                switch ($breadcrumb[0]) { 
                    case 1:
                        $description = $translations[94];
                        break;
                    case 21:
                        $description = $translations[200];
                        break;
                    case 31:
                        $description = $translations[201];
                        break;
                    case 41:
                        $description = $translations[202];
                        break;
                    case 51:
                        $description = $translations[203];
                        break;
                    case 61:
                        $description = $translations[204];
                        break;
                    case 71:
                        $description = $translations[205];
                        break;
                        
                } 
        	} elseif (in_array($breadcrumb[1], array(81, 85, 89, 90, 92, 93, 102, 103, 104, 105, 106, 107, 112, 113, 114, 115, 123, 128, 162, 163, 164, 165, 166, 122, 142, 143, 144, 145, 146, 151, 152, 153))) {
        
                switch ($breadcrumb[1]) { 
                    case 81:
                    case 85:
                        $description = $translations[206];
                        break;
                    case 89:
                    case 90:
                        $description = $translations[207];
                        break;
                    case 92:
                        $description = $translations[208];
                        break;
                    case 93:
                        $description = $translations[209];
                        break;
                    case 102:
                        $description = $translations[212];
                        break;
                    case 103:
                        $description = $translations[213];
                        break;
                    case 104:
                        $description = $translations[214];
                        break;
                    case 105:
                        $description = $translations[215];
                        break;
                    case 106:
                        $description = $translations[250];
                        break;
                    case 107:
                        $description = $translations[251];
                        break;
                    case 112:
                        $description = $translations[216];
                        break;
                    case 113:
                        $description = $translations[217];
                        break;
                    case 114:
                        $description = $translations[218];
                        break;
                    case 115:
                        $description = $translations[219];
                        break;
                    case 123:
                    case 128:
                        $description = $translations[252];
                        break;
                    case 162:
                        $description = $translations[220];
                        break;
                    case 163:
                        $description = $translations[221];
                        break;
                    case 164:
                        $description = $translations[222];
                        break;
                    case 165:
                    case 166:
                        $description = $translations[223];
                        break;
                    case 122:
                        $description = $translations[224];
                        break;
                    case 142:
                        $description = $translations[225];
                        break;
                    case 143:
                        $description = $translations[226];
                        break;
                    case 144:
                        $description = $translations[227];
                        break;
                    case 145:
                        $description = $translations[228];
                        break;
                    case 146:
                        $description = $translations[229];
                        break;
                    case 151:
                        $description = $translations[230];
                        break;
                    case 152:
                        $description = $translations[231];
                        break;
                    case 153:
                        $description = $translations[232];
                        break;
                        
                } 
        	} elseif (isset($breadcrumb[2]) && in_array($breadcrumb[2], array(95, 96))) {
        
                switch ($breadcrumb[2]) { 
                    case 95:
                        $description = $translations[210];
                        break;
                    case 96:
                        $description = $translations[211];
                        break;
                        
                } 
            }
		?>
        
        <?php if ($description) { ?>
            <div class="container">
                <div class="sixteen columns" style="width: 680px;">
                    <div class="main-headline">
                        <h2 style="font-size:13px; letter-spacing:0.1px;">
                            <?= nl2br($description) ?>
                        </h2>
                    </div>
                </div>
            </div>
		<?php } ?>
                
		<div class="content-block">
			<div class="prod-list">
				
                <?php foreach ($products as $val) { ?>
                    <div class="prod-view">
                    	<?php if (isset($val['avatar'])) { ?>
	                        <img class="prod-img border_img" style="width:80px;" src="/static/images/produse/<?= $val['id'] . '/thumbnails/' . $val['avatar']?>" alt="<?= $val['avatar'] ?>">
                        <?php } else { ?>
	                        <img class="prod-img border_img" style="width:80px;" src="/static/images/produse/default.jpg" alt="">
                        <?php } ?>
                    	<?php if ($authorized) { ?>
                            <p class="prod-desc">
                                <a style="float:right;" href="/admin/sterge_produs/<?= $val['id'] ?>" target="_blank">Sterge</a>
                                <a href="/admin/editeaza_produs/<?= $val['id'] ?>">Editeaza</a>
                            </p>
                        <?php } ?>
                        
                        <h1 class="prod-title" style="font-size: 14px; line-height: 18px; font-weight:bold;"><a href="/<?= $val['id'] ?>-<?= $val['link'] ?>"><?= $val['title_' . LANGUAGE] ?></a></h1>

                        
                        <p class="prod-code" style="margin:0 0 5px 0;"><?= $translations[92] ?>: <?= $val['code'] ?></p>
                        <p class="prod-desc">
                            <?= nl2br($val['description_' . LANGUAGE]) ?>
                        </p>
		                <div style="clear:both; "></div>                        
                    </div>
                <? } ?>
				
                <div style="clear:both; "></div>
                
                <?php if ($numar_de_pagini > 1) { ?>
                    <div style="font-size:15px; text-align:center; margin:20px 0px; ">
                    <?php for ($i = 1; $i <= $numar_de_pagini; $i++) { ?>
                    	<?php if ($page == $i) { ?>
                        	<font style="background-color:#c62020; padding:3px 6px; color:#fff;"><?= $page ?></font>
                        <?php } else { ?>
							<a class="categories" style="border: 1px solid; padding:3px 6px;" href="/<?= $categories[$current_category]['link_' . LANGUAGE] ?>/<?= $i ?>" title="Vezi pagina <?= $i ?>"><?= $i ?></a>                    
						<?php } ?>
                    <?php } ?>
                    </div>
                
                <? } ?>

			</div>
		</div>
	</div>
</div>
