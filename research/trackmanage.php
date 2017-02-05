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

<body class="theme-red">
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
                                RESEARCHES WITH TRACK RECORDS
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table id="myT" class="table table-bordered table-striped table-hover dataTable jquery-datatable dt-responsive display nowrap js-exportable" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>Researcher</th> 
                                        <th>Completed Researches</th> 
                                        <th>On-Going Researches</th>        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $q = mysqli_query($link, "SELECT * FROM researcher");
                                        while($r = mysqli_fetch_array($q)){
                                    ?>
                                    <tr>
                                        <th><a href="rpedit.php?period=<?php echo $period; ?>&id=<?php echo $r['id']; ?>"><button type="button"  class="btn bg-teal btn-sm waves-effect"><i class="material-icons">create</i></button></a>&nbsp;<button type="button" value="<?php echo $r['id']; ?>"" class="delete btn bg-red btn-sm waves-effect"><i class="material-icons">delete</i></button> </th>
                                        <th><?php echo $r['researcher']; ?></th>
                                            <?php
                                            $researcher = $r['id'];
                                            $qu = mysqli_query($link, "SELECT * FROM cresearcher WHERE researcher = '$researcher'");
                                            while($re = mysqli_fetch_array($qu)){
                                            ?>
                                            <th><?php echo $re['research']; ?></th>
                                            <?php
                                                }
                                            ?>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
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
       $(".delete").click(function() {
        var data = $(".delete").val();
            if (confirm("Do you really want to delete this program data?"))
            {
                var row = $(this).parents('tr');

                $.post("queryresearcher.php", {
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
       
});

    
    
</script>
</body>

</html>