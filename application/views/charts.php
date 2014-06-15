
<?php if (isset($top)) { ?>

		<nav role="navigation" class="navbar navbar-inverse navbar-embossed">
          <div class="navbar-header">
            <div class="navbar-brand">Visuals by</div>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="#">Messages</a></li>
            <li><a href="#">About Us</a></li>
           </ul>
          <div id="navbar-collapse-06" class="collapse navbar-collapse">
            <p class="navbar-text"><?= $type ?></p>
          </div>
        </nav>
        <div class="inner-content base-column">
          <div class="row">
            <div class="col-md-10 col-md-offset-1">

    <?php


        foreach ($top as $val) { ?>

			<div>
				<div style="float: left; width: 300px;"><?= ($type == 'per month') ? date_format(date_create($val['name']), 'F Y') : ($val['name']); ?></div>
				<div style="float: right; width: 100px; text-align: right;"><?= $val['cnt'] ?> requests</div>
				<div style="clear: both"></div>
				<div class="progress">
					<div class="progress-bar" style=" width: <?= $temp = ($val['total'] / $max) * 100 ?>% ; text-align: center; font-size:12px; color: #fff;

					<?php if ($temp > 70) { ?>  background-color: #e74c3c; <?php } elseif ($temp > 30 && $temp <= 70) { ?> background-color: #f1c40f; <?php } else { ?>background-color: #2ecc71; <?php } ?>">
						<?= $val['total']?>
					</div>
				</div>
				<br>
			</div>

	<?php } ?>

            </div>
            </div>
        </div>



<?php } ?>
