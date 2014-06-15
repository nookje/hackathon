                <nav class="navbar navbar-inverse" role="navigation">
                  <div class="navbar-header">
                    <div class="navbar-brand" href="#">Input your offer</div>
                  </div>
                </nav>


                <div class="inner-content base-column">

                  <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                      <div id="test"></div>

                      <form role="form" method="post" action="" id="editForm">
                        <div class="form-group">
                          <label for="price">Price</label>
                          <input type="text" class="form-control" id="price" name="price" placeholder="Offer Price" value="<?= $request['delivery_date'] ?>"/>
                        </div>
                        <div class="form-group">
                          <label for="deliveryDate">Delivery Date</label>
                          <div class="controls">
                              <div class="input-group">
                                  <label for="deliveryDate" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span></label>
                                  <input type="text" class="date-picker form-control" id="deliveryDate" name="deliveryDate" placeholder="Delivery Date" value="<?= $request['delivery_date'] ?>"/>
                              </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <button id="edit-request-btn" data-loading-text="Loading..." class="btn btn-primary btn-wide">
                            Send Offer
                          </button>
                        </div>
                      </form>

                    </div>
                  </div>

                </div>
