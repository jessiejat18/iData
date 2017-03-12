<?php
require_once("../PHPconnect/phpC.php");
if(!isset($_SESSION['idataextension'])){
    header('Location: ../sign-in.php');
}else{
    
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
    <link href="../extra/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

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
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>DATA ON EXTENSION</h2>
                            <small>Add new Data on Extension</small>
                        </div>
                        <div class="body">
                            <?php
                                $id = $_GET['id'];
                                $qu = mysqli_query($link, "SELECT * FROM extension WHERE id= '$id'");
                                $resul=mysqli_fetch_assoc($qu);
                            ?>
                            <form id="add" name="add">
                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="text" value="<?php echo $resul['title']; ?>" class="form-control" id="pn" required>
                                        <label class="form-label">Project/Activity Title</label>
                                    </div>
                                </div>
                                <div class="form-group  col-sm-12">
                                    <select class="form-control show-tick" id="du" required>
                                        <option value="">Please Select a Delivery Unit/Department</option>
                                        <?php
                                            $q = mysqli_query($link, "SELECT * FROM delivery_units");
                                            while($resu=mysqli_fetch_array($q)){
                                        ?>
                                        <option value="<?php echo $resu['id'] ?>"><?php echo $resu['acronym'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div><div class="clearfix"></div>
                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="date" value="<?php echo $resul['sdate']; ?>" class="form-control" id="sd" required>
                                        <label class="form-label">Start Date</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="date" value="<?php echo $resul['edate']; ?>" class="form-control" id="ed" required>
                                        <label class="form-label">End Date</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="number" step="any" min="0" value="<?php echo $resul['npt']; ?>" class="form-control" id="npt" required>
                                        <label class="form-label">No. of persons trained / served</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="number" value="<?php echo $resul['tnh']; ?>" step="any" min="0" class="form-control" id="tnh" required>
                                         <input type="hidden" value="<?php echo $_GET['id']; ?>"  id="did" required>
                                        <label class="form-label">Total No. of hours</label>
                                    </div>
                                </div>
                                <input type="hidden" id="period" value="<?php echo $period; ?>">
                                <button class="btn btn-primary waves-effect" type="button" id="submit">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Validation -->
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

    <!-- Custom Js -->
    <script src="../extra/js/admin.js"></script>

    <!-- Demo Js -->
    <script src="../extra/js/demo.js"></script>
    <script src="../extra/js/pages/forms/form-validation.js"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="../extra/plugins/jquery-validation/jquery.validate.js"></script>
    <!-- Bootstrap Notify Plugin Js -->
    <script src="../extra/plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <script>
    $(document).ready(function()
{ 
       $(document).bind("contextmenu",function(e){
              return false;
       }); 
       
});
    $(document).ready(function() {
        $("#submit").click(function() {
        var did = $("#did").val();
        var pn = $("#pn").val();
        var du = $("#du").val();
        var sd = $("#sd").val();
        var ed = $("#ed").val();
        var npt = $("#npt").val();
        var tnh = $("#tnh").val();
        if (pn == '' || du == '' || sd == '' || ed == '' || ed == '' || npt == '' || tnh == '' || did == '') {
         $.notify({
            // options
            message: 'Please fill in all the feilds!' 
            },{
                // settings
                type: 'warning'
            });
        } else {
        // Returns successful data submission message when the entered information is stored in database.
        $.post("queryextedit.php", {
        did: did,
        pn: pn,
        du: du,
        sd: sd,
        ed: ed,
        npt: npt,
        tnh: tnh,
        }, function(data) {
        $.notify({
            // options
            message: 'Successfully Edited!' 
            },{
                // settings
                type: 'success'
            });
        });
        }
        });
    });
</script>
</body>

</html>

