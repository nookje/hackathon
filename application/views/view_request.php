                <nav class="navbar navbar-inverse" role="navigation">
                  <div class="navbar-header">
                    <div class="navbar-brand" href="#">Edit Request</div>
                  </div>
                </nav>


                <div class="inner-content base-column">

                  <div class="row">
                    <div class="col-md-10 col-md-offset-1">

                      <div class="alert alert-success request-success" tabindex="-1"><b>Well done!</b> Request updated</div>

                      <form role="form" method="post" action="/requests/edit/" id="editForm" data-request-id="<?= $request['id'] ?>">
                        <div class="form-group">
                          <label for="status">Supplier</label>
                          <select name='supplier' data-select-type='info' class="select-block">
                            <option value="emag"<? echo $request['supplier'] == 'emag' ? ' selected' : ''?>>emag.ro</option>
                            <option value="stasonline"<? echo $request['supplier'] == 'stasonline' ? ' selected' : ''?>>Stas Computer</option>
                            <option value="flanco"<? echo $request['supplier'] == 'flanco' ? ' selected' : ''?>>Flanco</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="status">Status</label>
                          <select name='status' data-select-type='info' class="select-block">
                            <option value="ordered"<? echo $request['status'] == 'ordered' ? ' selected' : ''?>>Ordered</option>
                            <option value="delivered"<? echo $request['status'] == 'delivered' ? ' selected' : ''?>>Delivered</option>
                            <option value="undelivered"<? echo $request['status'] == 'undelivered' ? ' selected' : ''?>>Undelivered</option>
                            <option value="canceled"<? echo $request['status'] == 'canceled' ? ' selected' : ''?>>Canceled</option>
                            <option value="request"<? echo $request['status'] == 'request' ? ' selected' : ''?>>Request</option>
                            <option value="pending"<? echo $request['status'] == 'pending' ? ' selected' : ''?>>Pending</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="location">Location</label>
                          <select name='location' data-select-type='info' class="select-block">
                            <option>[e-spres-oh]</option>
                            <option>ctrl-d</option>
                            <option>x3</option>
                            <option>MyGov</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="providerTypes">Supplier Type</label>
                          <select name='supplier_type' data-select-type='info' class="select-block mbl">
                            <option value="it&amp;c"<? echo $request['supplier_type'] == 'it&c' ? ' selected' : ''?>>IT&amp;C</option>
                            <option value="food"<? echo $request['supplier_type'] == 'food' ? ' selected' : ''?>>Food</option>
                            <option value="service"<? echo $request['supplier_type'] == 'service' ? ' selected' : ''?>>Service</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="description">Description</label>
                          <textarea class="form-control" name="description" rows="3" id="description"><?= $request['description'] ?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="deliveryDate">Delivery Date</label>
                          <!-- <input type="text" class="form-control" id="deliveryDate" name="deliveryDate" placeholder="Delivery Date" value="<?= $request['delivery_date'] ?>"> -->
                          <div class="controls">
                              <div class="input-group">
                                  <label for="deliveryDate" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span></label>
                                  <input type="text" class="date-picker form-control" id="deliveryDate" name="delivery_date" placeholder="Delivery Date" value="<?= $request['delivery_date'] ?>"/>
                              </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="link">Link</label>
                          <input type="text" class="form-control" id="link" placeholder="link" name="link" value="<?= $request['link'] ?>">
                        </div>

                        <div class="form-group">
                          <button id="edit-request-btn" data-loading-text="Loading..." class="btn btn-primary btn-wide">
                            Edit Request
                          </button>

                          <button class="btn btn-primary btn-wide send-offer">
                            Send Offer Request
                          </button>
                        </div>
                      </form>

                    </div>
                  </div>

                  <div id="newOffersContainer"></div>
                  <?php if ($offers) {?>
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
                                  <span class="btn btn-sm new-status"></span>
                                </div>
                                <?php } elseif ($val['status'] == 'unopened') { ?>
                                  <span class="btn btn-sm btn-default"><?= ucfirst($val['status']) ?></span>
                                <?php } elseif ($val['status'] == 'opened') { ?>
                                  <span class="btn btn-sm btn-info"><?= ucfirst($val['status']) ?></span>
                                <?php } else { ?>
                                  <span class="btn btn-sm btn-success"><?= ucfirst($val['status']) ?></span>
                                <?php } ?>
                              </td>
                            </tr>
                          <?php } ?>

                        </tbody>
                      </table>
                    </div>
                  </div>
                  <?php } ?>

                </div>
