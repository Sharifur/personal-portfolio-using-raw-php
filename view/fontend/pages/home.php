    <header>
        <div class="container">
            <?php
                $weltext = $db->Edit('header','7');
                while($data = mysqli_fetch_object($weltext)):
            ?>
            <div class="intro-text">
                <div class="intro-lead-in"><?php echo $data->weltext?></div>
                <div class="intro-heading"><?php echo $data->heading?></div>
                <a href="#services" class="page-scroll btn btn-xl">Tell Me More</a>
            </div>
            <?php endwhile; ?>
        </div>
    </header>

    <!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Services</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row text-center">
                <?php

                $service = $db->View('service','*',array('title','asc'));
                    while($data = mysqli_fetch_object($service)):
                ?>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-bullhorn fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading"><?php echo $data->title;?></h4>
                    <p class="text-muted"><?php echo $data->descr;?></p>
                </div>
                <?php endwhile;?>
            </div>
        </div>
    </section>

    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Portfolio</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row">
                <?php
                $portfolio = $db->View('portfolios','*',array('id','asc'));
                    while($data = mysqli_fetch_object($portfolio)):
                ?>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal<?php echo $data->id;?>" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <?php if(file_exists("images/portfolio/port-pic-{$data->id}.{$data->picture}")):?>
                            <img src="images/portfolio/port-pic-<?php echo $data->id.'.'.$data->picture;?>" style="width:100%; height: 200px;" alt="Portfolio Images">
                        <?php else: ?>
                            <img src="images/no-thumb.jpg" style="width:100%; height: 400px;" alt="Portfolio Images">
                        <?php endif; ?>
                    </a>
                    <div class="portfolio-caption">
                        <h4><?php echo $data->title;?></h4>
                        <p class="text-muted"><?php echo $data->shortdesrc?></p>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">About</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <?php
                        $c=1;
                            $service = $db->View('about','*',array('id','asc'));
                            while($data = mysqli_fetch_object($service)):
                        ?>
                        <li <?php
                                if($c == 2){
                                    echo"class='timeline-inverted'";
                                    $c =1;
                                }else{
                                    $c++;
                                }
                        ?>>
                            <div class="timeline-image">
                                <?php if(file_exists("images/about/about-pic-{$data->id}.{$data->picture}")):?>
                                    <img class="img-responsive img-circle" src="images/about/about-pic-<?php echo $data->id.'.'.$data->picture;?>" width="200px" alt="Portfolio Images">
                                <?php else: ?>
                                    <img class="img-responsive img-circle" src="images/no-thumb.jpg" alt="Portfolio Images">
                                <?php endif; ?>

                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2009-2011</h4>
                                    <h4 class="subheading"><?php echo $data->title; ?></h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted"><?php echo $data->shortdesrc;?></p>
                                </div>
                            </div>
                        </li>

                        <?php endwhile; ?>


                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section id="team" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Our Amazing Team</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row">
                <?php
                    $team = $db->View('tmembers','*',array('id','asc'));
                    while($data = mysqli_fetch_object($team)):
                ?>
                <div class="col-sm-4">
                    <div class="team-member">
                        <?php if(file_exists("images/team-member/team-pic-{$data->id}.{$data->picture}")):?>
                            <img class="img-responsive img-circle" src="images/team-member/team-pic-<?php echo $data->id.'.'.$data->picture;?>" width="200px" alt="Portfolio Images">
                        <?php else: ?>
                            <img class="img-responsive img-circle" src="images/no-thumb.jpg" alt="Portfolio Images">
                        <?php endif; ?>
                        <h4><?php echo $data->name?></h4>
                        <p class="text-muted"><?php echo $data->prof?></p>
                        <ul class="list-inline social-buttons">
                            <li><a href="<?php echo $data->flink;?>"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="<?php echo $data->twlink;?>"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="<?php echo $data->lilink?>"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Clients Aside -->
    <aside class="clients">
        <div class="container">
            <div class="row">
                <?php
                    $logos = $db->View('mlogos','*',array('id','asc'));
                    while($data = mysqli_fetch_object($logos)):
                ?>
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                        <?php if(file_exists("images/market-logo/mlogo-pic-{$data->id}.{$data->picture}")):?>
                            <img class="img-responsive img-centered" src="images/market-logo/mlogo-pic-<?php echo $data->id.'.'.$data->picture;?>" width="200px" alt="Portfolio Images">
                        <?php else: ?>
                            <img class="img-responsive img-centered" src="images/no-thumb.jpg" alt="Portfolio Images">
                        <?php endif; ?>
                    </a>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </aside>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contact Us</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Your Phone *" id="phone" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>