                <nav class="navbar navbar-inverse" role="navigation">
                  <div class="navbar-header">
                    <div class="navbar-brand" href="#">Add Request</div>
                  </div>
                </nav>


                <div class="inner-content base-column">

                  <div class="row">
                    <div class="col-md-10 col-md-offset-1">

                      <div class="alert alert-success request-success" tabindex="-1"><b>Well done!</b> Request updated</div>

                      <form role="form" method="post" action="/requests/edit/" id="editForm" >

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
                            <option value="it&c">IT&amp;C</option>
                            <option value="food">Food</option>
                            <option value="service">Service</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="description">Description</label>
                          <textarea class="form-control" name="description" rows="3" id="description"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="link">Link</label>
                          <input type="text" class="form-control" id="link" placeholder="link" name="link" >
                        </div>

                        <div class="form-group">
                          <button id="edit-request-btn" data-loading-text="Loading..." class="btn btn-primary btn-wide">
                            Send Request
                          </button>
                        </div>
                      </form>

                    </div>
                  </div>

                  
