<?php
require_once("../PHPconnect/phpC.php");
if(!isset($_SESSION['idataresearch'])){
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
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                COMPLETED RESEARCH
                                <small>Edit Completed Research of <?php 
                                $researcher = $_GET['author'];
                                $query = mysqli_query($link, "SELECT * FROM researcher WHERE id = '$researcher'");
                                $res = mysqli_fetch_assoc($query);
                                echo $res['researcher'];
                                ?>
                                </small>
                            </h2>
                        </div>
                        <div class="body">
                            <form id="add" name="add">
                                <div class="row clearfix">
                                    <?php
                                        $reid = $_GET['id'];
                                        $query1 = mysqli_query($link, "SELECT * FROM cresearcher WHERE id = '$reid'");
                                        $res1=mysqli_fetch_assoc($query1);
                                    ?>
                                    <div class="col-sm-12">
                                        <div class="form-group form-float">
                                            <div class="form-line focused">
                                                <input value="<?php echo $res1['research']; ?>" type="text" id="cresearch" class="form-control" required>
                                                <input value="<?php echo $_GET['id']; ?>" type="hidden" id="rid" class="form-control" required>
                                                <label class="form-label">Completed Research</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                    <button type="button" class="btn bg-teal waves-effect" id="addu">SUBMIT</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
             </div>
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

    <!-- Demo Js -->
    <script src="../extra/js/demo.js"></script>
    <script>
    $(document).ready(function()
{ 
       $(document).bind("contextmenu",function(e){
              return false;
       }); 
       
       
});

    $(document).ready(function() {
        $("#addu").click(function() {
        var rid = $("#rid").val();
        var research = $("#cresearch").val();
        if (rid == '' || research == '') {
         $.notify({
            // options
            message: 'Please fill in all the feilds!' 
            },{
                // settings
                type: 'warning'
            });
        } else {
        // Returns successful data submission message when the entered information is stored in database.
        $.post("queryeditcresearch.php", {
        rid: rid,
        research: research,
        }, function(data) {
        $.notify({
            // options
            message: 'Successfully Edited!' 
            },{
                // settings
                type: 'success'
            });

        });
        $('#add')[0].reset(); // To reset form fields
        }
        });
    });
    
</script>
</body>

</html>