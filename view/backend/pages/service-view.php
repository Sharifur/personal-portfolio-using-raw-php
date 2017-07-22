<div id="wrapper">

    <!-- Navigation -->
    <?php require("navbar.php");?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Single Service Item</h2>
                <a href="index.php?a=service-new" class="btn btn-info text-center">Add New</a>
                <a href="index.php?a=service" class="btn btn-info text-center">View All</a>
                <div style="height: 50px;"></div>
            </div>
            <?php
            $services = $db->Edit("service",$_GET['id']);
            if(isset($_GET['del'])){
                $db->Delete("service",$_GET['del']);
                Redirect('index.php?a=service');
            }
            ?>
            <?php while($data = mysqli_fetch_object($services)): ?>
            <div class="col-sm-10 col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2>Title:  <h4><?php echo $data->title?></h4></h2>
                        <div style="height: 10px;"></div>
                        <h2>Description:  <h4><?php echo $data->descr?></h4></h2>
                    </div>
                    <div class="panel-footer">
                        <p>
                            <a href="index.php?a=service-view&id=<?php echo $data->id?>" class="btn btn-primary btn-xs" role="button">View</a>
                            <a href="index.php?a=service-edit&id=<?php echo $data->id?>" class="btn btn-info btn-xs" role="button">Edit</a>
                            <a href="index.php?a=service-delete&id=<?php echo $data->id?>" class="btn btn-danger btn-xs" role="button">Delete</a>
                        </p>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
</div>
