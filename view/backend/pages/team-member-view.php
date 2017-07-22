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
            $team = $db->Edit("tmembers",$_GET['id']);
            if(isset($_GET['del'])){
                $db->Delete("tmembers",$_GET['del']);
                Redirect('index.php?a=team-member');
            }
            ?>
            <?php while($data = mysqli_fetch_object($team)): ?>
                <div class="col-sm-10 col-md-6 col-md-offset-3">
                    <h2>Portfolio Single View</h2>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <?php if(file_exists("../images/team-member/team-pic-{$data->id}.{$data->picture}")):?>
                                <img src="../images/team-member/team-pic-<?php echo $data->id.'.'.$data->picture;?>" style="width:100%; height: 200px;" alt="Portfolio Images">
                            <?php else: ?>
                                <img src="../images/no-thumb.jpg" style="width:100%; height: 400px;" alt="Portfolio Images">
                            <?php endif; ?>
                            <h3>Name:  <h4><?php echo $data->name?></h4></h3>
                            <div style="height: 10px;"></div>
                            <h3>Profession:  <h4><?php echo $data->prof?></h4></h3>
                            <div style="height: 10px;"></div>
                            <h3>Facebook:  <h4><?php echo $data->flink?></h4></h3>
                            <div style="height: 10px;"></div>
                            <h3>Twitter:  <h4><?php echo $data->twlink?></h4></h3>
                            <div style="height: 10px;"></div>
                            <h3>LinkedIn:  <h4><?php echo $data->lilink?></h4></h3>
                        </div>
                        <div class="panel-footer clearfix">
                            <p class="pull-right ">
                                <a href="index.php?a=team-member-edit&id=<?php echo $data->id?>" class="btn btn-info btn-xs" role="button">Edit</a>
                                <a href="index.php?a=team-member-delete&id=<?php echo $data->id?>" class="btn btn-danger btn-xs" role="button">Delete</a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
