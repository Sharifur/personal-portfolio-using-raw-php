<div id="wrapper">

    <!-- Navigation -->
    <?php require("navbar.php");?>
    <div id="page-wrapper">
        <div class="row text-center">
            <div class="col-lg-12 ">
                <h1 class="page-header">Team Member Management</h1>
                <a href="index.php?a=market-place" class="btn btn-info text-center">View All</a>
                <a href="index.php?a=market-logo" class="btn btn-info text-center">Add New</a>
                <div style="height: 50px;"></div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add new Market Logo
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php
                                if(isset($_POST['submit'])){
                                    if ($_FILES['pic']['name'] != ""){
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
                                            'picture' => $ext
                                        ];

                                        $d->Insert('mlogos',$data);
                                        if($ext != ""){
                                            $des = "../images/market-logo/mlogo-pic-{$d->Id}.{$ext}";
                                            copy($_FILES['pic']['tmp_name'],$des);
                                        }
                                    }else {
                                        echo "Please Fill The Valid Information";
                                    }

                                }
                                ?>
                                <form role="form" method="POST" action="index.php?a=market-logo" enctype="multipart/form-data" data-parsley-validate>
                                    <div class="form-group">
                                        <label for="pic">Market Logo</label>
                                        <input type="file" name="pic" >
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-default">Submit Button</button>
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