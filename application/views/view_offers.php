                  <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                      <h4>Available Offers</h4>
                      <table class="table table-condensed">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Supplier</th>
                            <th>Price</th>
                            <th>Delivery Date</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>

                          <?php $i = 0; foreach ($offers as $val) { $i++;?>

                            <tr>
                              <td><?= $i ?></td>
                              <td><a href="#"><?= $val['supplier'] ?></a></td>
                              <td><?= $val['price'] ?></td>
                              <td>
                                <?php if ($val['status'] == 'accepted') { ?>
                                  <?= date_format(date_create($val['delivery']), 'jS F Y') ?>
                                <?php } ?>
                              </td>
                              <td>
                                <?php if ($val['status'] == 'accepted') { ?>
                                <div class="action-wrapper">
                                  <a href="#" class="btn btn-sm btn-success offer-btn"  data-loading-text="Loading..." data-status="accept" data-hash="<?=$val['hash']?>">Accept</a>
                                  <a href="#" class="btn btn-sm btn-danger offer-btn"  data-loading-text="Loading..." data-status="reject" data-hash="<?=$val['hash']?>">Reject</a>
                                </div>
                                <button class="btn btn-sm new-status"></button>
                                <?php } elseif ($val['status'] == 'unopened') { ?>
                                  <button class="btn btn-sm btn-default"><?= ucfirst($val['status']) ?></button>
                                <?php } else { ?>
                                  <button class="btn btn-sm btn-info"><?= ucfirst($val['status']) ?></button>
                                <?php } ?>
                              </td>
                            </tr>
                          <?php } ?>

                        </tbody>
                      </table>
                    </div>
                  </div>
