
<!DOCTYPE html>
<html lang="en">
    <head>
    <?php
    $data['title'] = "Dashboard";
    $this->load_view('template/header_files',$data);
    ?>
  </head>
  <body>
    <div class="container-fluid dash">
        <div class="row dash-top">
            <div class="col-md-3 navbar-inverse dash-view-menu">
            </div>
            <div class="col-md-9">
            </div>
        </div>
        <div class="row dash-view">
            <div class="col-md-3 dash-view-menu navbar-inverse">
                <ul class="nav navbar-nav">
                    <li class="menu-item"><a href="#">Menu Items</a></li>
                    <li class="menu-item"><a href="#">Menu Items</a></li>
                    <li class="menu-item"><a href="#">Menu Items</a></li>
                    <li class="menu-item"><a href="#">Menu Items</a></li>
                </ul>
            </div>
            <div class="col-md-9 dash-view-content">
                <div class="row">
                    <div class="col-md-6">
                        REFREOFKRKEOFEKRF
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->


    <?php $this->load_view('template/scripts'); ?>
  </body>
</html>