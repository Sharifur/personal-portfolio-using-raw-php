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
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add new Member
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php
                                if(isset($_POST['submit'])){
                                    if ($_POST['name'] != "" && $_POST['profession'] != ""){
                                        $d = new Database();
                                        if($_FILES['pic']['name'] != ""){
                                            $ext = pathinfo($_FILES['pic']['name']);
                                            $ext = strtolower($ext['extension']);
                                            if($ext != 'jpg' && $ext != 'jpeg' && $ext != 'gif' && $ext !='png' && $ext != 'bmp'){
                                                $ext = "";
                                            }
                                        }else{
                                            $ext = "";
                                        }
                                        $data=[
                                            'name' => $_POST['name'],
                                            'prof'=> $_POST['profession'],
                                            'twlink'=> $_POST['twitter'],
                                            'lilink'=> $_POST['linkedin'],
                                            'flink'=> $_POST['facebook'],
                                            'picture' => $ext
                                        ];

                                        $d->Insert('tmembers',$data);
                                        if($ext != ""){
                                            $des = "../images/team-member/team-pic-{$d->Id}.{$ext}";
                                            copy($_FILES['pic']['tmp_name'],$des);
                                        }
                                    }else {
                                        echo "Please Fill The Valid Information";
                                    }

                                }
                                ?>
                                <form role="form" method="POST" action="index.php?a=team-member-new" enctype="multipart/form-data" data-parsley-validate>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control"
                                               maxlength="100" required="" placeholder="Enter Member Name">

                                    </div>
                                    <div class="form-group">
                                        <label>Profession</label>
                                        <input type="text" name="profession" class="form-control"
                                               maxlength="100" required="" placeholder="Enter Your Profession">

                                    </div>
                                    <div class="form-group">
                                        <label>Facebook Link</label>
                                        <input type="url" name="facebook" class="form-control"
                                               maxlength="100"  placeholder="Enter Facebook Link">

                                    </div>
                                    <div class="form-group">
                                        <label>LinkedIn Link</label>
                                        <input type="url" name="linkedin" class="form-control"
                                               maxlength="100"  placeholder="Enter Linkedin Link">

                                    </div>
                                    <div class="form-group">
                                        <label>Twitter Link</label>
                                        <input type="url" name="twitter" class="form-control"
                                               maxlength="100"  placeholder="Enter Twitter Link">

                                    </div>

                                    <div class="form-group">
                                        <label for="pic">Profile Picture</label>
                                        <input type="file" name="pic" required="">
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-default">Submit Button</button>
                                    <button type="reset" class="btn btn-default">Reset Button</button>
                                </form>
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