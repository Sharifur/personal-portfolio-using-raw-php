<div id="wrapper">

    <!-- Navigation -->
    <?php require("navbar.php");?>
    <div id="page-wrapper">
        <div class="row text-center">
            <div class="col-lg-12 ">
                <h1 class="page-header">About Management</h1>
                <a href="index.php?a=about" class="btn btn-info text-center">View All</a>

                <div style="height: 50px;"></div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add new
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php
                                if(isset($_POST['submit'])){
                                    if ($_POST['title'] != "" && $_POST['shortdesrc'] != ""  ){
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
                                            'title' => $_POST['title'],
                                            'shortdesrc'=> $_POST['shortdesrc'],
                                            'picture' => $ext
                                        ];

                                        $d->Insert('about',$data);
                                        if($ext != ""){
                                            $des = "../images/about/about-pic-{$d->Id}.{$ext}";
                                            copy($_FILES['pic']['tmp_name'],$des);
                                        }
                                    }else {
                                        echo "Please Fill The Valid Information";
                                    }

                                }
                                ?>
                                <form role="form" method="POST" action="index.php?a=about-new" enctype="multipart/form-data" data-parsley-validate>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control"
                                               maxlength="100" required="" placeholder="Enter Title">

                                    </div>
                                    <div class="form-group">
                                        <label>Short Description</label>
                                        <textarea name="shortdesrc" required=""  class="form-control" cols="30" rows="5" placeholder="Write Something About Your Self"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="pic">Picture</label>
                                        <input type="file" name="pic" >
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