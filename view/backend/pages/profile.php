<div id="wrapper">

    <!-- Navigation -->
    <?php require("navbar.php");?>
<div style="height: 50px;"></div>
        <div class="row">

            <div class="col-lg-6 col-lg-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h2>Admin Profile Page</h2>
                        <?php
                        if(isset($_POST['submit'])){
                            $profile = $db->Edit('users',$_SESSION['myid']);
                            while ($data =mysqli_fetch_object($profile)){
                                $old_ext = $data->picture;
                            }
                            if ($_FILES['pic']['name'] != "") {
                                $ext = pathinfo($_FILES['pic']['name']);
                                $ext = strtolower($ext['extension']);
                                if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'gif' && $ext != 'png' && $ext != 'bmp') {
                                    $ext = $old_ext;
                                } else {
                                    if ($old_ext != "") {
                                        if (file_exists("../images/admin/admin-pic-{$_SESSION['myid']}.{$old_ext}")) {
                                            unlink("../images/admin/admin-pic-{$_SESSION['myid']}.{$old_ext}");
                                            $des = "../images/admin/admin-pic-{$_SESSION['myid']}.{$ext}";
                                            copy($_FILES['pic']['tmp_name'], $des);
                                        } else {
                                            $des = "../images/admin/admin-pic-{$_SESSION['myid']}.{$ext}";
                                            copy($_FILES['pic']['tmp_name'], $des);
                                        }

                                    }
                                }
                            } else {
                                $ext = $old_ext;
                            }
                            $data = [
                                'picture' => $ext
                            ];

                            $db->Update('users', $data, $_SESSION['myid']);
                            $des = "../images/admin/admin-pic-{$_SESSION['myid']}.{$ext}";
                            copy($_FILES['pic']['tmp_name'], $des);
                        }
                        ?>
                    </div>
                    <?php
                     $profile = $db->Edit('users',$_SESSION['myid']);
                     while ($data =mysqli_fetch_object($profile)):
                    ?>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <?php if (file_exists("../images/admin/admin-pic-{$data->id}.{$data->picture}")):?>
                                    <img src="../images/admin/admin-pic-<?php echo "{$data->id}.{$data->picture}";?>" style="width:200px; alt="Profile Picture">
                                <?php else:?>
                                <img src="../images/no-thumb.jpg" alt="Profile Picture" ">
                                <?php endif;?>
                                <div style="height: 20px;"></div>
                                <form method="post" enctype="multipart/form-data" data-parsley-validate>
                                    <input type="file" name="pic" required="">
                                    <div style="height: 20px;"></div>
                                    <input class="btn btn-success" type="submit" name="submit" value="Change Profile Pic">
                                    <div style="height: 20px;"></div>
                                </form>
                            </div>
                            <div class="col-lg-6">
                                <h2><strong>Name: </strong><?php echo $data->name?> </h2>
                                <h2><strong>Email: </strong><?php echo $data->email?> </h2>
                                <h2><strong>User Type: </strong> Admin</h2>
                            </div>
                        </div>
                    </div>
                    <?php endwhile;?>
                </div>
            </div>
        </div>
</div>