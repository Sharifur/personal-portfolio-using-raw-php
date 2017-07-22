<div id="wrapper">

    <!-- Navigation -->
    <?php require("navbar.php");?>
    <div id="page-wrapper">
        <div class="row text-center">
            <div class="col-lg-12">
                <h1 class="page-header">Portfolio Management</h1>
                <a href="index.php?a=portfolio" class="btn btn-info text-center">View All</a>

                <div style="height: 50px;"></div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add New Portfolio
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php
                                if(isset($_POST['submit'])){
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
                                        'shortdesrc'=> $_POST['type'],
                                        'description'=> $_POST['desrc'],
                                        'picture' => $ext
                                    ];

                                    $d->Insert('portfolios',$data);
                                    if($ext != ""){
                                        $des = "../images/portfolio/port-pic-{$d->Id}.{$ext}";
                                        copy($_FILES['pic']['tmp_name'],$des);
                                    }
                                }
                                ?>
                                <form role="form" method="POST" action="index.php?a=portfolio-new" enctype="multipart/form-data" data-parsley-validate>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control"
                                               maxlength="100" required="" placeholder="Enter Title">
                                    </div>
                                    <div class="form-group">
                                        <label>Project Type</label>
                                        <input type="text" name="type" class="form-control"
                                               maxlength="100" required="" placeholder="Enter Project Type">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="desrc" required="" class="form-control" cols="30" rows="5"  placeholder="Enter Description"></textarea>
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