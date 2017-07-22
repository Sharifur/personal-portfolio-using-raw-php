<div id="wrapper">

    <!-- Navigation -->
    <?php require("navbar.php");?>
    <div id="page-wrapper">
        <div class="row text-center">
            <div class="col-lg-12 ">
                <h1 class="page-header">Market Place Management</h1>
                <a href="index.php?a=market-place" class="btn btn-info text-center">View All</a>
                <a href="index.php?a=market-logo" class="btn btn-info text-center">Add New</a>
                <div style="height: 50px;"></div>
            </div>
        </div>
        <div class="row">
            <?php
            $portfolio = $db->View("mlogos", "*", array("id", "asc"));
            if(isset($_GET['del'])){
                $db->Delete("mlogos",$_GET['del']);
                Redirect('index.php?a=market-place');
            }
            ?>
            <?php while($data = mysqli_fetch_object($portfolio)): ?>
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <?php if (file_exists("../images/market-logo/mlogo-pic-{$data->id}.{$data->picture}")){ ?>
                            <img src="../images/market-logo/mlogo-pic-<?php echo $data->id;?>.<?php echo $data->picture;?>" style="height:200px;width: 100%" alt="Portfolio Picture">
                        <?php }else{?>
                            <img src="../images/no-thumb.jpg" alt="Market Logo Picture">
                        <?php } ?>
                        <div class="caption clearfix">
                            <div style="height: 30px;"></div>
                            <p>
                                <a href="index.php?a=market-place&del=<?php echo $data->id;?>" class="btn btn-danger pull-right" role="button">Delete</a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
