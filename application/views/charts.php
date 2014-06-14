
<div style="width: 500px; background-color:#fff; padding: 20px; ">

<?php if (isset($top)) { ?>

		<nav role="navigation" class="navbar navbar-inverse navbar-embossed">
          <div class="navbar-header">
            <button data-target="#navbar-collapse-06" data-toggle="collapse" class="navbar-toggle" type="button">
            </button>
            <a href="javascript:;" class="navbar-brand">Top Breakdown</a>
          </div>
          <div id="navbar-collapse-06" class="collapse navbar-collapse">
            <p class="navbar-text"><?= $type ?></p>
          </div>
        </nav>
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



<?php } ?>

</div>