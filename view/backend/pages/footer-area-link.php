<div id="wrapper">

    <!-- Navigation -->
    <?php require("navbar.php");?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="page-header">Update Footer Social Link</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Update Social Link Of Footer Area
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php
                                if(isset($_POST['submit'])){

                                        $data=[
                                            'facebook' => $_POST['facebook'],
                                            'twitter' => $_POST['twitter'],
                                            'linkedin' => $_POST['linkedin']
                                        ];
                                        $db->update('footer',$data,1);
                                }
                                ?>
                                <?php
                                    $footer = $db->Edit('footer',1);
                                    while ($data = mysqli_fetch_object($footer)):
                                ?>
                                <form role="form" method="POST" action="index.php?a=footer-area-link&id=1" enctype="multipart/form-data" data-parsley-validate>
                                    <div class="form-group">
                                        <label>Facebook Link</label>
                                        <input type="text" name="facebook" class="form-control"
                                               maxlength="100" required="" value="<?php echo$data->facebook;?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Twitter Link</label>
                                        <input type="text" name="twitter" class="form-control"
                                               maxlength="100" required="" value="<?php echo$data->twitter;?>">
                                    </div>
                                    <div class="form-group">
                                        <label>LinkedIn Link</label>
                                        <input type="text" name="linkedin" class="form-control"
                                               maxlength="100" required=""value="<?php echo$data->linkedin;?>">
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success">Submit Button</button>

                                <?php endwhile;?>
                            </div>
                            <!-- /.col-lg-6 (nested) -->
                            <!-- /.col-lg-6 (nested) -->
                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>