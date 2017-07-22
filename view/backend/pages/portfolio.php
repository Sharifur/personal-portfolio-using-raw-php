<div id="wrapper">

    <!-- Navigation -->
    <?php require("navbar.php");?>
    <div id="page-wrapper">
        <div class="row text-center">
            <div class="col-lg-12 ">
                <h1 class="page-header">Portfolio Management</h1>
                <a href="index.php?a=portfolio" class="btn btn-info text-center">View All</a>
                <a href="index.php?a=portfolio-new" class="btn btn-info text-center">Add New</a>
                <div style="height: 50px;"></div>
            </div>
            <?php
            $portfolio = $db->View("portfolios", "*", array("title", "asc"));
            if(isset($_GET['del'])){
                $db->Delete("portfolios",$_GET['del']);
                Redirect('index.php?a=portfolio');
            }
            ?>
            <?php while($data = mysqli_fetch_object($portfolio)): ?>
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <?php if (file_exists("../images/portfolio/port-pic-{$data->id}.{$data->picture}")){ ?>
                            <img src="../images/portfolio/port-pic-<?php echo $data->id;?>.<?php echo $data->picture;?>" style="height:200px;width: 100%" alt="Portfolio Picture">
                        <?php }else{?>
                            <img src="../images/no-thumb.jpg" alt="Portfolio Picture">
                        <?php } ?>
                        <div class="caption">
                            <h3 style="min-height: 50px"><?php echo $data->title;?></h3>
                            <div style="height: 30px;"></div>
                            <p>
                                <a href="index.php?a=portfolio-view&id=<?php echo $data->id;?>" class="btn btn-primary" role="button">View</a>
                                <a href="index.php?a=portfolio-edit&id=<?php echo $data->id;?>" class="btn btn-info" role="button">Edit</a>
                                <a href="index.php?a=portfolio&del=<?php echo $data->id;?>" class="btn btn-danger" role="button">Delete</a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
