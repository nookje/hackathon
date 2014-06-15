                <nav class="navbar navbar-inverse" role="navigation">
                  <div class="navbar-header">
                    <div class="navbar-brand" href="#">Orders<span class="navbar-new"><?= $count?></span></div>
                  </div>
                </nav>


                <div class="base-column inner-content">
                  <div class="item-listing clearfix">

                    <?php foreach ($requests as $val) { 
                      ?>


                      <!-- Past items -->
                      <div class="list-group">

                        <a href="/index.php/frontend/requests/view/<?= $val['id'] ?>" class="list-group-item list-group-item-<?php if ($val['status'] == 'request') { ?>info<?php } else { ?>warning<?php } ?> clearfix">
                          <span class="item-user"><?= substr($val['requester'], 0, strpos($val['requester'], '@')); ?></span>
                          <span class="item-location"><?= $val['location'] ?></span>

                          <h4 class="list-group-item-heading"><?= date_format(date_create($val['delivery_date']), 'j F Y') ?></h4>
                          <p class="list-group-item-text">
                            <?= $val['description'] ?>
                          </p>
                          <span class="item-status">
                            <span class="btn btn-<?php if ($val['status'] == 'delivered') { ?>success<?php } elseif ($val['status'] == 'canceled') { ?>danger<?php } else { ?>warning<?php } ?>"><?= $val['status'] ?></span>
                          </span>

                        </a>
                      </div>
                    <?php } ?>

                  </div>
                </div>
