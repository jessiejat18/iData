<?php
require_once("../PHPconnect/phpC.php");
if(!isset($_SESSION['idataregistrar'])){
    header('Location: ../sign-in.php');
}else{
    $telpt = 0;
    $tetyt = 0;
    $tngaprilt = 0;
    $tngsummert = 0;
    $tngoctobert = 0;
    $tngt = 0;
    $wngt = 0;
    $ggrt = 0;
    $telpgt = 0;
    $tetygt = 0;
    $tngaprilgt = 0;
    $tngsummergt = 0;
    $tngoctobergt = 0;
    $tnggt = 0;
    $wnggt = 0;
    $ggrgt = 0;
}
if(isset($_GET['logout'])){
    session_unset();
    header('Location: ../sign-in.php');
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>iData :: CSPC Databanking System</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="../extra/css/icon.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../extra/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../extra/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../extra/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="../extra/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="../extra/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../extra/css/themes/all-themes.css" rel="stylesheet" />

    <script language="JavaScript">

        document.onkeypress = function (event) {
            event = (event || window.event);
            if (event.keyCode == 123) {
            return false;
            }
        }
         document.onmousedown = function (event) {
            event = (event || window.event);
            if (event.keyCode == 123) {
            return false;
            }
        }
        document.onkeydown = function (event) {
            event = (event || window.event);
            if (event.keyCode == 123) {
                //alert('No F-keys');
                return false;
            }
        }
    </script>
</head>

<body class="theme-blue">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <?php require_once('header.php'); ?>

    <?php require_once('sidebar.php'); ?>
    <section class="content">
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                UNDERGRADUATE PROGRAMS
                            </h2>
                            <?php 
                                $pid = $_GET['period']; 
                                $sql = mysqli_query($link, "SELECT * FROM dyear WHERE id ='$pid'");
                                $res = mysqli_fetch_assoc($sql);
                                $period = $res['year']; ?>
                            <small>Data on Graduates in Undergraduate Programs for <?php echo $period; ?></small>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable jquery-datatable dt-responsive display nowrap" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>PROGRAM NAME</th>
                                        <th>Priority (1-Yes; 2-No)</th>
                                        <th>Mandated (1-Yes; 2-No)</th>
                                        <th>Total Enrolment in the Ladderized Program</th>
                                        <th>Total Enrolment in the Terminal Year</th>
                                        <th>Total No. of Graduates in April <?php echo $period; ?></th>
                                        <th>Total No. of Graduates in Summer <?php echo $period; ?></th>
                                        <th>Total No. of Graduates in October <?php echo $period; ?></th>
                                        <th>Total No. of Graduates</th>
                                        <th>Weighted No. of Graduates</th>
                                        <th>Gross Graduation Rate</th>
                                    </tr>
                                </thead>
                               
                                <tbody>
                                    <?php
                                        $q = mysqli_query($link, "SELECT * FROM delivery_units");
                                        while($r = mysqli_fetch_array($q)){
                                    ?>
                                    <tr>
                                        <th><?php echo $r['name']; ?> (<?php echo $r['acronym']; ?>)</th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                    </tr>
                                    <?php
                                            $did = $r['id'];
                                            $qu = mysqli_query($link, "SELECT * FROM graduates WHERE delivery_unit = '$did' AND prog_sort ='Undergraduate' AND year ='$period'");
                                            while($re = mysqli_fetch_array($qu)){
                                            ?>
                                            <tr>
                                                <td><?php echo $re['pn']; ?></td>
                                                <td><?php echo $re['priority']; ?></td>
                                                <td><?php echo $re['mandated']; ?></td>
                                                <td><?php echo $re['telp']; $telpt = $telpt + $re['telp']; ?></td>
                                                <td><?php echo $re['tety']; $tetyt = $tetyt + $re['tety']; ?></td>
                                                <td><?php echo $re['tngapril']; $tngaprilt = $tngaprilt + $re['tngapril']; ?></td>
                                                <td><?php echo $re['tngsummer']; $tngsummert = $tngsummert + $re['tngsummer']; ?></td>
                                                <td><?php echo $re['tngoctober']; $tngoctobert = $tngoctobert + $re['tngsummer']; ?></td>
                                                <td><?php echo $tng = $re['tngapril'] + $re['tngsummer'] + $re['tngoctober']; $tngt = $tngt + $tng; ?></td>
                                                <td><?php echo $weu = $tng * $re['weights']; $wngt = $wngt + $weu; ?></td>
                                                <td><?php $ggr = $re['telp'] + $re['tety']; $ggr = $tng / $ggr * 100; echo round($ggr, 2, PHP_ROUND_HALF_UP); $ggrt = $ggrt + $ggr; ?></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                            <tr>
                                                <th style="text-align: right;">TOTAL (<?php echo $r['acronym']; ?>)</th>
                                                <th> </th>
                                                <th> </th>
                                                <th><?php echo $telpt; ?></th>
                                                <th><?php echo $tetyt; ?></th>
                                                <th><?php echo $tngaprilt; ?></th>
                                                <th><?php echo $tngsummert; ?></th>
                                                <th><?php echo $tngoctobert; ?></th>
                                                <th><?php echo $tngt; ?></th>
                                                <th><?php echo $wngt; ?></th>
                                                <th><?php echo round($ggrt, 2, PHP_ROUND_HALF_UP); 
                                                    $telpgt = $telpgt + $telpt;
                                                    $tetygt = $tetygt + $tetyt;
                                                    $tngaprilgt = $tngaprilgt + $tngaprilt;
                                                    $tngsummergt = $tngsummergt + $tngsummert;
                                                    $tngoctobergt = $tngoctobergt + $tngoctobert;
                                                    $tnggt = $tnggt + $tngt;
                                                    $wnggt = $wnggt + $wngt;
                                                    $ggrgt = $ggrgt + $ggrt; 
                                                    $telpt = 0;
                                                    $tetyt = 0;
                                                    $tngaprilt = 0;
                                                    $tngsummert = 0;
                                                    $tngoctobert = 0;
                                                    $tngt = 0;
                                                    $wngt = 0;
                                                    $ggrt = 0;
                                                    
                                                ?>
                                                </th>
                                            </tr>
                                        <?php
                                        }
                                    ?>
                                    <tr>
                                        <th style="text-align: right;">GRAND TOTAL</th>
                                        <th> </th>
                                        <th> </th>
                                        <th><?php echo $telpgt; ?></th>
                                        <th><?php echo $tetygt; ?></th>
                                        <th><?php echo $tngaprilgt; ?></th>
                                        <th><?php echo $tngsummergt; ?></th>
                                        <th><?php echo $tngoctobergt; ?></th>
                                        <th><?php echo $tnggt; ?></th>
                                        <th><?php echo $wnggt; ?></th>
                                        <th><?php echo round($ggrgt, 2, PHP_ROUND_HALF_UP); ?></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
            
        </div>

    </section>

    <!-- Jquery Core Js -->
    <script src="../extra/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../extra/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../extra/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../extra/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../extra/plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="../extra/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../extra/plugins/jquery-datatable/responsive.datatables.js"></script>
    <script src="../extra/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../extra/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../extra/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../extra/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../extra/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../extra/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../extra/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../extra/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="../extra/js/admin.js"></script>
    <script src="../extra/js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="../extra/js/demo.js"></script>
    <script>
    $(document).ready(function()
{ 
       $(document).bind("contextmenu",function(e){
              return false;
       }); 
       
        
});
    $(".delete").click(function() {
        var data = $(this).val();
            if (confirm("Do you really want to delete this program data?"))
            {
                var row = $(this).parents('tr');

                $.post("querygraddelup.php", {
                data: data,
                }, function(data) {
                $.notify({
                    // options
                    message: 'Successfully Deleted!' 
                    },{
                        // settings
                        type: 'success'
                    });
                });
                row.slideUp('slow', function() {$(row).remove();});
            }
            return false;
        });
</script>
</body>

</html>
