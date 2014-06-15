
<?php if (isset($top)) { ?>

		<nav role="navigation" class="navbar navbar-inverse navbar-embossed">
          <div class="navbar-header">
            <div class="navbar-brand">Visuals by</div>
          </div>
          <ul class="nav navbar-nav">
            <li<?= ($type == 'location') ? ' class="active"' : ''; ?>><a href="/index.php/frontend/charts/top_locations">Location</a></li>
            <li<?= ($type == 'user') ? ' class="active"' : ''; ?>><a href="/index.php/frontend/charts/top">User</a></li>
            <li<?= ($type == 'month') ? ' class="active"' : ''; ?>><a href="/index.php/frontend/charts/total_per_month">Month</a></li>
           </ul>
        </nav>
        <div class="inner-content base-column">
          <div class="row">
            <div class="col-md-10 col-md-offset-1">

    <?php


        foreach ($top as $val) { ?>

			<div>
				<div style="float: left; width: 300px;"><?= ($type == 'month') ? date_format(date_create($val['name']), 'F Y') : ($val['name']); ?></div>
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
