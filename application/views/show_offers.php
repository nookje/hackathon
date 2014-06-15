                <nav class="navbar navbar-inverse" role="navigation">
                  <div class="navbar-header">
                    <div class="navbar-brand" href="#">Input your offer</div>
                  </div>
                </nav>

                <div class="inner-content base-column">

                  <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                      <h4>Welcome <?= $offer['offer_supplier'] ?></h4>
                      <p>Please fill in bellow you offer for <br><b><?= $request['description'] ?></b><br>Thank You!</p>

                      <form role="form" method="post" action="/offers/respond/<?= $offer['hash'] ?>" id="sendOfferForm">
                        <div class="alert alert-success request-success" tabindex="-1"><b>Well done!</b> Offer sent.</div>

                        <div class="form-group">
                          <label for="price">Price</label>
                          <input type="text" class="form-control" id="price" name="price" placeholder="Offer Price" value=""/>
                          <input type="hidden" name="status"  value="accepted"/>
                        </div>
                        <div class="form-group">
                          <label for="deliveryDate">Delivery Date</label>
                          <div class="controls">
                              <div class="input-group">
                                  <label for="deliveryDate" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span></label>
                                  <input type="text" class="date-picker form-control" id="deliveryDate" name="delivery_date" placeholder="Delivery Date" value=""/>
                              </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="link">Link</label>
                          <input type="text" class="form-control" id="link" name="link" placeholder="Link to product" value=""/>
                        </div>
                        <div class="form-group">
                          <button id="send-offer-btn" data-loading-text="Loading..." class="btn btn-primary btn-wide">
                            Send Offer
                          </button>
                        </div>
                      </form>

                    </div>
                  </div>

                </div>
