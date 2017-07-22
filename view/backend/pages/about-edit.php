<div id="wrapper">

    <!-- Navigation -->
    <?php require("navbar.php");?>
    <div id="page-wrapper">
        <div class="row text-center">
            <div class="col-lg-12 ">
                <h1 class="page-header">About Management</h1>
                <a href="index.php?a=about" class="btn btn-info text-center">View All</a>
                <a href="index.php?a=about-new" class="btn btn-info text-center">Add New</a>
                <div style="height: 50px;"></div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit About Item
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php

                                    if (isset($_POST['submit'])) {
                                        $about = $db->Edit('about', $_GET['id']);
                                        While ($data = mysqli_fetch_object($about)) {
                                            $old_ext = $data->picture;
                                        }
                                        if ($_FILES['pic']['name'] != "") {
                                            $ext = pathinfo($_FILES['pic']['name']);
                                            $ext = strtolower($ext['extension']);
                                            if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'gif' && $ext != 'png' && $ext != 'bmp') {
                                                $ext = $old_ext;
                                            } else {
                                                if ($old_ext != "") {
                                                    if (file_exists("../images/about/about-pic-{$_GET['id']}.{$old_ext}")) {
                                                        unlink("../images/about/about-pic-{$_GET['id']}.{$old_ext}");
                                                        $des = "../images/about/about-pic-{$_GET['id']}.{$ext}";
                                                        copy($_FILES['pic']['tmp_name'], $des);
                                                    } else {
                                                        $des = "../images/about/port-pic-{$_GET['id']}.{$ext}";
                                                        copy($_FILES['pic']['tmp_name'], $des);
                                                    }

                                                }
                                            }
                                        } else {
                                            $ext = $old_ext;
                                        }
                                        $data = [
                                            'title' => $_POST['title'],
                                            'shortdesrc' => $_POST['type'],
                                            'picture' => $ext
                                        ];

                                        $db->Update('about', $data, $_GET['id']);
                                        if ($ext != "") {
                                            $des = "../images/about/port-pic-{$db->Id}.{$ext}";
                                            copy($_FILES['pic']['tmp_name'], $des);
                                            Redirect('index.php?a=about');
                                        }

                                    }

                                ?>
                                <?php
                                $about = $db->Edit('about',$_GET['id']);
                                    While($data = mysqli_fetch_object($about)):
                                ?>
                                <form role="form" method="POST" enctype="multipart/form-data" data-parsley-validate>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control"
                                               maxlength="100" required="" value="<?php echo $data->title?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Short Description</label>
                                        <input type="text" name="type" class="form-control"
                                               maxlength="100" required="" value="<?php echo $data->shortdesrc?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="pic">Picture</label>
                                        <input type="file" name="pic" >
                                        <div style="height:10px;"></div>
                                        <?php if(file_exists("../images/about/about-pic-{$data->id}.{$data->picture}")):?>
                                            <img src="../images/about/about-pic-<?php echo $data->id .'.'.$data->picture;?>"  style="width:50px;" alt="about Images">
                                            <?php else: ?>
                                            <img src="../images/no-thumb.jpg" style="width:50px;"  alt="about Images">
                                        <?php endif;?>
                                        <div style="height:10px;"></div>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success">Submit Button</button>
                                    <button type="reset" class="btn btn-default">Reset Button</button>
                                </form>
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