<div id="wrapper">

    <!-- Navigation -->
    <?php require("navbar.php");?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-9 col-lg-offset-1 text-center">
                <h2 style="margin: 20px;text-align: center">Service Area Management</h2>
                <a href="index.php?a=service-new" class="btn btn-info text-center">Add New</a>
                <div style="height: 50px;"></div>

            </div>

            <?php
            $services = $db->View("service", "*", array("title", "asc"));
                if(isset($_GET['del'])){
                    $db->Delete("service",$_GET['del']);
                    Redirect('index.php?a=service');
                }
            ?>
            <?php while($data = mysqli_fetch_object($services)): ?>
            <div class="col-sm-6 col-md-3">
                <div class="thumbnail" ">
                    <div class="caption">
                        <h3><?php echo $data->title?></h3>
                        <p style="min-height: 150px;"><?php echo $data->descr?></p>
                        <div style="height: 30px;"></div>

                        <p>
                            <a href="index.php?a=service-view&id=<?php echo $data->id?>" class="btn btn-primary" role="button">View</a>
                            <a href="index.php?a=service-edit&id=<?php echo $data->id?>" class="btn btn-info" role="button">Edit</a>
                            <a href="index.php?a=service&del=<?php echo $data->id?>" class="btn btn-danger" role="button">Delete</a>
                        </p>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
</div>
