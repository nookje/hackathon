<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Wishly</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="/static/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="/static/css/wishly.css" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">

    <link rel="shortcut icon" href="/static/images/favicon.ico">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="/static/js/html5shiv.js"></script>
      <script src="/static/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="container">
      <div class="row">
        <div class="container main-content">
            <div class="row">

                <div class="col-md-4">
                    <div class="base-column sidebar">
                        <div class="branding clearfix">
                            <span class="glyphicon glyphicon-list-alt" style="float: left;"></span>
                            <h3>Wishly</h3>
                        </div>

                        <div class="sidebar-menu">
                            <a type="button" class="btn btn-primary btn-hg btn-block" href="/index.php/frontend/requests/add">Add Request</a>
                            <a type="button" class="btn btn-primary btn-hg btn-block" href="/index.php/frontend/requests">Requests</a>
                            <a type="button" class="btn btn-primary btn-hg btn-block" href="/index.php/frontend/charts/top_locations">Visual Breakdowns</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                  <?php
                    if (isset($pass_along)) {
                        $body_model->display($pass_along);
                    } else {
                        $body_model->display();
                    }
                  ?>
                </div>

            </div>
        </div>

      </div>
    </div>
    <!-- /.container -->


    <!-- Load JS here for greater good =============================-->
    <script src="/static/js/jquery-1.10.2.min.js"></script>
    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="/static/js/jquery.ui.touch-punch.min.js"></script>
    <script src="/static/js/bootstrap.min.js"></script>
    <script src="/static/js/bootstrap-select.js"></script>
    <script src="/static/js/bootstrap-switch.js"></script>
    <script src="/static/js/flatui-checkbox.js"></script>
    <script src="/static/js/flatui-radio.js"></script>
    <script src="/static/js/jquery.tagsinput.js"></script>
    <script src="/static/js/jquery.placeholder.js"></script>

    <script src="/static/js/application.js"></script>
    <script src="/static/js/wishly.js"></script>
  </body>
</html>