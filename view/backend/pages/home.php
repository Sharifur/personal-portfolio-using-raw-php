

    <div id="wrapper">

        <!-- Navigation -->
<?php require("navbar.php");?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- admin panel main content -->
            <?php 
                if(isset($_GET['f'])){
                    if(file_exists($_GET['f'].php)){
                        require("{$_GET['f']}.php");
                    }
                }
            require("content.php"); ?>
            <!-- admin panel main content -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

