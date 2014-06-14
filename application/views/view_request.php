<!-- <h3><?= $request['description'] ?></h3> -->

                <nav class="navbar navbar-inverse" role="navigation">
                  <div class="navbar-header">
                    <div class="navbar-brand" href="#">Edit Request</div>
                  </div>
                </nav>


                <div class="inner-content base-column">

                  <div class="row">
                    <div class="col-md-10 col-md-offset-1">

                      <form role="form">
                        <div class="form-group">
                          <label for="status">Supplier</label>
                          <select name='info' class="select-block">
                            <option>emag.ro</option>
                            <option>Stas Computer</option>
                            <option>Flanco</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="status">Status</label>
                          <select name='info' class="select-block">
                            <option>Ordered</option>
                            <option>Delivered</option>
                            <option>Undelivered</option>
                            <option>Canceled</option>
                            <option>Request</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="location">Location</label>
                          <select name='info' class="select-block">
                            <option>Timisoara</option>
                            <option>Oradea</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="providerTypes">Provider Type</label>
                          <select name='info' class="select-block mbl">
                            <option>IT&amp;C</option>
                            <option>Food</option>
                            <option>Service</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="description">Description</label>
                          <textarea class="form-control" rows="3" id="description"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="deliveryDate">Delivery Date</label>
                          <input type="text" class="form-control" id="deliveryDate" placeholder="Delivery Date">
                        </div>
                        <div class="form-group">
                          <label for="link">Link</label>
                          <input type="text" class="form-control" id="link" placeholder="link">
                        </div>

                        <div class="form-group">
                          <button class="btn btn-primary btn-wide">
                            Edit Request
                          </button>

                          <button class="btn btn-primary btn-wide">
                            Send Offer Request
                          </button>
                        </div>
                      </form>

                    </div>
                  </div>

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
                          <tr>
                            <td>1</td>
                            <td><a href="#">emag.ro</a></td>
                            <td>250ron</td>
                            <td>30 Jul 2014</td>
                            <td>
                              <a href="#" class="btn btn-sm btn-success">Accept</a>
                              <a href="#" class="btn btn-sm btn-danger">Reject</a>
                            </td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td><a href="#">Stas Computer</a></td>
                            <td>260ron</td>
                            <td>10 Jul 2014</td>
                            <td>
                              <a href="#" class="btn btn-sm btn-success">Accept</a>
                              <a href="#" class="btn btn-sm btn-danger">Reject</a>
                            </td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td><a href="#">Flanco</a></td>
                            <td>20ron</td>
                            <td>5 Aug 2014</td>
                            <td>
                              <a href="#" class="btn btn-sm btn-success">Accept</a>
                              <a href="#" class="btn btn-sm btn-danger">Reject</a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>

                </div>
