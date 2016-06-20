<?php
    require_once('connection/conn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AMS</title>

    <link href="css/style.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/bootstrap.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>

<div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">AMS</a>
            </div>

            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>Brian Apolinario</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Brian Apolinario <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="row">
                <div class="col-sm-2">
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav side-nav">
                            <li class="active">
                                <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="charts.php"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
                            </li>
                            <li>
                                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-table"></i> Assets <i class="fa fa-fw fa-caret-down"></i></a>
                                <ul id="demo" class="collapse">
                                    <li>
                                        <a href="assets.php">Add Asset</a>
                                    </li>
                                    <li>
                                        <a href="#">Edit Asset</a>
                                    </li>
                                    <li>
                                        <a href="#">View Asset</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="forms.php"><i class="fa fa-fw fa-edit"></i> Forms</a>
                            </li>
                            <li>
                                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                                <ul id="demo" class="collapse">
                                    <li>
                                        <a href="#">Dropdown Item</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
        </nav>
    </div>
    <div class="col-sm-10">
        <div id="page-wrapper">
            <div class="container-fluid">
                <h1 class="page-header">
                    Assets
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-plus"></i><strong> Add Asset </strong>
                    </li>
                </ol>
                <form role="form" action="add.php" method="POST">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="serial_no">Serial number:</label>
                                <input type="number" class="form-control" name="serial_no" id="serial_no">
                            </div>
                            <div class="form-group">
                                <label for="asset_name">Name:</label>
                                <input type="text" class="form-control" name="asset_name" id="asset_name">
                            </div>
                            <div class="form-group">
                                <label for="asset_type">Type:</label>
                                <input type="text" class="form-control" name="asset_type" id="asset_type">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="remarks">Remarks:</label>
                                <textarea class="add-asset form-control" name="asset-remarks" id="asset-remarks"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="asset_img">Image:</label>
                                <input type="file" class="form-control" name="asset-img" id="asset-img">
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="add-asset" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

            <?php
                foreach($ams->fetchAllTodo($pdo) as $row)
                {
                    echo "
                    <div class='col-sm-10'>
                        <div id='page-wrapper'>
                            <div class='container-fluid'>
                                <form role='form' action='add.php' method='POST'>
                                <div class='row'>
                                    <div class='col-sm-6'>
                                        <div class='form-group'>
                                            <label for='serial-no'>Serial number:</label>
                                            <input type='number' class='form-control' value='$row[serial_no]'>
                                        </div>
                                        <div class='form-group'>
                                            <label for='asset_name'>Name:</label>
                                            <input type='text' class='form-control' value='$row[asset_name]'>
                                        </div>
                                        <div class='form-group'>
                                            <label for='asset_type'>Type:</label>
                                            <input type='text' class='form-control' value='$row[asset_type]'>
                                        </div>
                                    </div>
                                    <div class='col-sm-6'>
                                        <div class='form-group'>
                                            <label for='asset-no'>Remarks:</label>
                                            <textarea class='add-asset form-control' name='asset-remarks' id='asset-remarks'></textarea>
                                        </div>
                                        <div class='form-group'>
                                            <label for='asset-img'>Image:</label>
                                            <input type='file' class='form-control' name='asset-img' id='asset-img'>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>";
                }
            ?>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>
</html>