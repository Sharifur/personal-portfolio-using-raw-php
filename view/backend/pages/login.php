
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                    <?php 
                        if(isset($_POST['login'])){
                            $u = new Admin;
                            $data = $u->login($_POST['email'],$_POST['password']);

                            if($data->num_rows > 0){
                                while ($value = mysqli_fetch_object($data)) {
                                    $_SESSION['myid'] = $value->id;
                                    $_SESSION['mytype'] = $value->type;
                                    Redirect("index.php?a=home");
                                }
                            }else{
                                echo "<p class='alert alert-danger'>Invalid Email Or Password</p>";
                            }
                        }
                    ?>
                        <form role="form" action="index.php" method="POST" data-parsley-validate>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus required="1">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" required="1">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="login" value="Login" class="btn btn-lg btn-success btn-block"/>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
