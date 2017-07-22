    <div id="wrapper">

        <!-- Navigation -->
<?php require("navbar.php");?>
        <div id="page-wrapper">
            <div class="row ">
                <div class="col-lg-12 text-center">
                    <h1 class="page-header">Service Edit Page</h1>
                    <a href="index.php?a=service" class="btn btn-info text-center">View All</a>
                    <a href="index.php?a=service-new" class="btn btn-info text-center">Add New</a>
                    <div style="height: 50px;"></div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Service Edit
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                <?php
                                    if(isset($_POST['submit'])){
                                        $data=[
                                         'title' => $_POST['title'],
                                          'descr'=> $_POST['desrc']
                                        ];

                                        $db->update('service',$data,$_GET['id']);
                                    }
                                ?>
                                    <?php
                                        $service = $db->Edit('service',$_GET['id']);
                                        while ($data = mysqli_fetch_object($service)):
                                    ?>
                                    <form role="form" method="POST" data-parsley-validate>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="title" class="form-control"
                                                   maxlength="100" required="" value="<?php echo $data->title;?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Short Description</label>
                                            <textarea name="desrc" required="" class="form-control" cols="30" rows="5" maxlength="250"><?php echo $data->descr;?></textarea>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-default">Submit Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                    </form>
                                    <?php endwhile; ?>
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
