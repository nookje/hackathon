                <nav class="navbar navbar-inverse" role="navigation">
                  <div class="navbar-header">
                    <div class="navbar-brand" href="#">Orders<span class="navbar-new">3</span></div>
                  </div>
                </nav>


                <div class="base-column inner-content">
                  <div class="item-listing clearfix">

                    <?php foreach ($requests as $val) { 
                      ?>


                      <!-- Past items -->
                      <div class="list-group">

                        <a href="/index.php/frontend/requests/view/<?= $val['id'] ?>" class="list-group-item list-group-item-warning clearfix">
                          <span class="item-user"><?= substr($val['requester'], 0, strpos($val['requester'], '@')); ?></span>
                          <span class="item-location"><?= $val['location'] ?></span>

                          <h4 class="list-group-item-heading"><?= substr($val['delivery_date'],0,10); ?></h4>
                          <p class="list-group-item-text">
                            <?= $val['description'] ?>
                          </p>
                          <span class="item-status">
                            <span class="btn btn-success"><?= $val['status'] ?></span>
                          </span>

                        </a>
                      </div>
                    <?php } ?>

                    <!-- Current items -->
                    <div class="list-group">
                      <a href="#" class="list-group-item list-group-item-info clearfix">
                        <span class="item-user">Razvan Smarandeanu</span>
                        <span class="item-location">Timisoara</span>

                        <h4 class="list-group-item-heading">15 Jun 2014</h4>
                        <p class="list-group-item-text">Notebook &amp; Pen</p>
                        <span class="item-status">
                          <span class="btn btn-primary">Incoming</span>
                        </span>
                      </a>
                    </div>

                    <!-- Future items -->
                    <div class="list-group">
                      <a href="#" class="list-group-item list-group-item-warning clearfix">
                        <span class="item-user">Marius Fanu</span>
                        <span class="item-location">Timisoara</span>

                        <h4 class="list-group-item-heading">30 Jun 2014</h4>
                        <p class="list-group-item-text">Dell UltraSharp Pro 24"</p>
                        <span class="item-status">
                          <span class="btn btn-warning">Ordered</span>
                        </span>

                      </a>

                      <a href="#" class="list-group-item list-group-item-warning clearfix">
                        <span class="item-user">Crisitian Sitov</span>
                        <span class="item-location">Timisoara</span>

                        <h4 class="list-group-item-heading">05 Iul 2014</h4>
                        <p class="list-group-item-text">Apple Thunderbolt to Gigabit Lan Adapter</p>
                        <span class="item-status">
                          <span class="btn btn-warning">Ordered</span>
                        </span>

                      </a>
                    </div>


                  </div>
                </div>
