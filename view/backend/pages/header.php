    <div id="wrapper">

        <!-- Navigation -->
<?php require("navbar.php");?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <h1 class="page-header">Change Header</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6 col-lg-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Header Info
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                <?php
                                    if(isset($_POST['submit'])){
                                        $data=[
                                         'weltext' => $_POST['weltext'],
                                          'heding'=> $_POST['headtext'],
                                        ];
                                        $db->update('header',$data,'7');
                                    }
                                ?>
                                    <?php
                                    $header  = $db->Edit('header','7');
                                    while ($data = mysqli_fetch_object($header)):
                                    ?>
                                    <form role="form" method="POST" data-parsley-validate>
                                        <div class="form-group">
                                            <label>Welcome Text</label>
                                            <input type="text" name="weltext" class="form-control"
                                                   required="" value="<?php echo $data->weltext?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Header Heading Text</label>
                                            <input required="" type="text" name="headtext" class="form-control" value="<?php echo $data->heding;?>">
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-success">Submit Button</button>
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
    <script>
        $(document).ready(function(){
        });
    </script>