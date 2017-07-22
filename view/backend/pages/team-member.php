
<div id="wrapper">

    <!-- Navigation -->
    <?php require("navbar.php");?>
    <div id="page-wrapper">
        <div class="row text-center">
            <div class="col-lg-12 ">
                <h1 class="page-header">Team Member Management</h1>
                <a href="index.php?a=team-member" class="btn btn-info text-center">View All</a>
                <a href="index.php?a=team-member-new" class="btn btn-info text-center">Add New</a>
                <div style="height: 50px;"></div>
            </div>
        </div>
        <div class="row">
            <?php
            $team = $db->View("tmembers", "*", array("name", "asc"));
            if(isset($_GET['del'])){
                $db->Delete("tmembers",$_GET['del']);
                Redirect('index.php?a=team-member');
            }
            ?>
            <?php while($data = mysqli_fetch_object($team)): ?>
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <?php if (file_exists("../images/team-member/team-pic-{$data->id}.{$data->picture}")){ ?>
                            <img src="../images/team-member/team-pic-<?php echo $data->id;?>.<?php echo $data->picture;?>" class="pimage" alt="Portfolio Picture">
                        <?php }else{?>
                            <img src="../images/no-thumb.jpg" alt="Portfolio Picture">
                        <?php } ?>
                        <div class="caption" >
                            <h3><?php echo $data->name;?></h3>
                            <p>
                                <a href="index.php?a=team-member-view&id=<?php echo $data->id;?>" class="btn btn-info" role="button">View</a>
                                <a href="index.php?a=team-member-edit&id=<?php echo $data->id;?>" class="btn btn-primary" role="button">Edit</a>
                                <a href="index.php?a=team-member&del=<?php echo $data->id;?>" class="btn btn-danger" role="button">Delete</a>
                            </p>
                        </div>
                        </div>
                    </div>

            <?php endwhile; ?>
                </div>
        </div>
    </div>
