  <!-- Start Home Page Slider -->
    <section id="page-top">
        <!-- Carousel -->
        <div id="main-slide" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#main-slide" data-slide-to="0" class="active"></li>
                <li data-target="#main-slide" data-slide-to="1"></li>
                <li data-target="#main-slide" data-slide-to="2"></li>
            </ol>
            <!--/ Indicators end-->

            <!-- Carousel inner -->
            <div class="carousel-inner">
                        
                    
                <div class="item active">
                  
                    <img class="img-responsive" src="<?php echo base_url(); ?>assets/front/images/sliderdefault.jpg" alt="slider">
                   
                </div>
             
                 <?php foreach ($slider as $slider) { ?>

                <div class="item">
                    <img class="img-responsive" src="<?php echo base_url('assets/upload/image/'.$slider->image) ?>"" alt="slider">   
                                    </div>
                <?php } ?> 
                
                </div>
                <!--/ Carousel item end -->
            </div>
            <!-- Carousel inner end-->

            <!-- Controls -->
           
        </div>
        <!-- /carousel -->
    </section>
    <!-- End Home Page Slider -->

    
    
    <!-- Start Feature Section -->
        <section id="feature" class="feature-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="feature">
                   <center> <a href="<?php echo base_url('pernikahan') ?>"><img class="img-responsive" src="<?php echo base_url(); ?>assets/upload/image/logoplatinum.png" width="90"></a></center>
                            <div class="feature-content">
                                <h4>Paket Pernikahan</h4>
                                <p>Kami merupakan jasa pernikahan untuk meeyediakan baju, kebaya dll </p>
                            </div>
                        </div>
                    </div><!-- /.col-md-3 -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="feature">
                   <center> <a href="<?php echo base_url('undangan') ?>"><img class="img-responsive" src="<?php echo base_url(); ?>assets/upload/image/logoundangan.png" width="90"> </a></center>
                            <div class="feature-content">
                                <h4>Undangan Digital</h4>
                                <p>Romantic wedding dapat membuat sebuah undangan digital yang dapat di akses online untuk tamu</p>
                            </div>
                        </div>
                    </div>
                 
               
                </div><!-- /.row -->
            
            </div><!-- /.container -->
        </section>
        <!-- End Feature Section -->
    
    
    
    <!-- Start Portfolio Section -->
        <section id="portfolio" class="portfolio-section-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center">
                            <h3>GALERI</h3>

                            <br>
                        </div>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        
                        <!-- Start Portfolio items -->
                        <ul id="portfolio-list">

                            <?php foreach ($galeri as $galeri )  { ?>
                            
                            <li>
                                <div class="portfolio-item">
                                    <img src="<?php echo base_url('assets/upload/image/'.$galeri->image) ?>" class="img-responsive" alt="" />
                                    <div class="portfolio-caption">
                                        <!-- <h4>Portfolio </h4> -->
                                       <!--  <a href="#portfolio-modal" data-toggle="modal" class="link-1"><i class="fa fa-magic"></i></a>
                                        <a href="#" class="link-2"><i class="fa fa-link"></i></a> -->
                                    </div>
                                </div>
                            </li>
                            <?php } ?>
                          
                            
                            
                        </ul>
                        <!-- End Portfolio items -->
                    </div>

                </div>
             
                


            </div>
            <br><br>
           
          <!--    <center>
                    <button type="button" class="btn btn-primary btn-lg">Show All Gallery</button>
                    </center> -->
                
        </section>
        <!-- End Portfolio Section -->
    
    <!-- Start Portfolio Modal Section -->
      <!--   <div class="section-modal modal fade" id="portfolio-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                
                <div class="container">
                    <div class="row">
                        <div class="section-title text-center">
                            <h3>Portfolio Details</h3>
                            <p>Duis aute irure dolor in reprehenderit in voluptate</p>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-md-6">
                            <img src="images/portfolio/img1.jpg" class="img-responsive" alt="..">
                        </div>
                        
                    </div -->><!-- /.row -->
          <!--       </div>                
            </div>
        </div> -->
        <!-- End Portfolio Modal Section -->
    
    
    <!-- Start About Us Section -->
   <!--  <section id="about-us" class="about-us-section-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section-title text-center">
                            <h3>About Us</h3>
                            <p>Duis aute irure dolor in reprehenderit in voluptate</p>
                        </div>
                </div>
            </div>
            <div class="row">
                
                <div class="col-md-4">
                    <div class="welcome-section text-center">
                        <img src="images/about-01.jpg" class="img-responsive" alt="..">
                        <h4>Office Philosophy</h4>
                        <div class="border"></div>
                        <p>Duis aute irure dolor in reprehen derit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Lorem reprehenderit</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="welcome-section text-center">
                        <img src="images/about-02.jpg" class="img-responsive" alt="..">
                        <h4>Office Mission & Vission</h4>
                        <div class="border"></div>
                        <p>Duis aute irure dolor in reprehen derit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Lorem reprehenderit</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="welcome-section text-center">
                        <img src="images/about-03.jpg" class="img-responsive" alt="..">
                        <h4>Office Value & Rules</h4>
                        <div class="border"></div>
                        <p>Duis aute irure dolor in reprehen derit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Lorem reprehenderit</p>
                    </div>
                </div>
                
            </div -->><!-- /.row            
            
        </div>
        <!-- /.container -->
<!-- </section>  -->    <!-- End About Us Section -->
        
    <!-- Start Fun Facts Section -->
<!--     <section class="fun-facts">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4">
                      <div class="counter-item">
                        <i class="fa fa-cloud-upload"></i>
                        <div class="timer" id="item1" data-to="991" data-speed="5000"></div>
                        <h5>Paket Pernikahan</h5>                               
                      </div>
                    </div>  
                    <div class="col-xs-12 col-sm-6 col-md-4">
                      <div class="counter-item">
                        <i class="fa fa-male"></i>
                        <div class="timer" id="item4" data-to="8423" data-speed="5000"></div>
                        <h5>Total clients</h5>                               
                      </div>
                    </div>
                     <div class="col-xs-12 col-sm-6 col-md-4">
                      <div class="counter-item">
                        <i class="fa fa-male"></i>
                        <div class="timer" id="item4" data-to="8423" data-speed="5000"></div>
                        <h5>Undangan Digital</h5>                               
                      </div>
                    </div>
            </div>
        </div>
    </section> -->
    <!-- End Fun Facts Section -->


    <!-- Start Pricing Table Section -->
   <!--  <div id="pricing" class="portfolio-section-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="section-title text-center">
                            <h3>Our Pricing Plan</h3>
                        </div>
                    </div>
                </div>
            </div>
                    
            <div class="row">
                        
                <div class="pricing">
                    <?php foreach ($produk as $produk ) { ?>
                        
                    
                        
                        <div class="col-md-12">
                            <div class="pricing-table">
                                <div class="plan-name">
                                    <h4 style="color: white;"><?php echo $produk->nama_paket ?></h4>
                                </div>
                                <div class="plan-price">
                                    <div class="price-value"><?php echo $produk->harga ;?></div>
                                    
                                </div>
                                <div class="plan-list">
                                    <ul>
                                        <li><?php echo $produk->attr1 ?></li>
                                        <li><?php echo $produk->attr2 ?></li>
                                        <li><?php echo $produk->attr3 ?></li>
                                    </ul>
                                </div>
                                <div class="plan-signup">
                                    <a href="https://api.whatsapp.com/send?phone=6281315061513" class="btn-system btn-small">Order Now</a>
                                </div>
                            </div>
                        </div>
                        
                    <?php } ?>  
                        
                
                        
                    
                        
                    </div>
                        
                        
            </div>
        </div>
    </div> -->
    <!-- End Pricing Table Section -->
    
    
    
    <!-- Start Latest News Section -->
    <!-- <section id="latest-news" class="latest-news-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3>Latest News</h3>
                        <p>Duis aute irure dolor in reprehenderit in voluptate</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="latest-news">
                    <div class="col-md-12">
                        <div class="latest-post">
                            <img src="images/about-01.jpg" class="img-responsive" alt="">
                            <h4><a href="#">Standard Post with Image</a></h4>
                            <div class="post-details">
                                <span class="date"><strong>31</strong> <br>Dec , 2014</span>
                                
                            </div>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="latest-post">
                            <img src="images/about-02.jpg" class="img-responsive" alt="">
                            <h4><a href="#">Standard Post with Image</a></h4>
                            <div class="post-details">
                                <span class="date"><strong>17</strong> <br>Feb , 2014</span>
                                
                            </div>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="latest-post">
                            <img src="images/about-03.jpg" class="img-responsive" alt="">
                            <h4><a href="#">Standard Post with Image</a></h4>
                            <div class="post-details">
                                <span class="date"><strong>08</strong> <br>Aug , 2014</span>
                                
                            </div>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="latest-post">
                            <img src="images/about-01.jpg" class="img-responsive" alt="">
                            <h4><a href="#">Standard Post with Image</a></h4>
                            <div class="post-details">
                                <span class="date"><strong>08</strong> <br>Aug , 2014</span>
                                
                            </div>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="latest-post">
                            <img src="images/about-02.jpg" class="img-responsive" alt="">
                            <h4><a href="#">Standard Post with Image</a></h4>
                            <div class="post-details">
                                <span class="date"><strong>08</strong> <br>Aug , 2014</span>
                                
                            </div>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="latest-post">
                            <img src="images/about-03.jpg" class="img-responsive" alt="">
                            <h4><a href="#">Standard Post with Image</a></h4>
                            <div class="post-details">
                                <span class="date"><strong>08</strong> <br>Aug , 2014</span>
                                
                            </div>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- End Latest News Section -->



    
    
    
    <!-- Start Testimonial Section -->
    <div id="testimonial" class="testimonial-section">
        <div class="container">
            <!-- Start Testimonials Carousel -->
            <div id="testimonial-carousel" class="testimonials-carousel">
                <!-- Testimonial 1 -->
               <?php foreach ($testimonial as $testimonial) { ?>
                  
                           
                <div class="testimonials item">
                    <div class="testimonial-content">
                        <img src="https://www.w3schools.com/howto/img_avatar.png" alt="" >
                        <div class="testimonial-author">
                            <div class="author"><?php echo $testimonial->namapel; ?></div>
                        </div>
                        <p><?php echo $testimonial->komentar; ?></p>
                    </div>
                </div>

            <?php  } ?>
            </div>
            <!-- End Testimonials Carousel -->
        </div>
    </div>
    <!-- End Testimonial Section -->
    
    

    <!-- Clients Aside -->
<!--     <section id="partner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3>Our Partner</h3>
                        <br><br>
                       
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="clients">
                    
                    <?php foreach ($partner as $partner) { ?>
                    
                    
                    <div class="col-md-12">
                        <img src="<?php echo base_url('assets/upload/image/'.$partner->image) ?>" class="img-responsive" alt="...">
                    </div>
                    
                   <?php } ?>
                    
                </div>
            </div>
        </div>
    </section> -->
    
    
    
    

    <section id="contact" class="contact">
        <div class="container">
            <div class="row">
          
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-contact-info">
                        <h4>Informasi Kontak</h4>
                        <ul>
                            <li><strong>E-mail :</strong> romanticweddingorganizer@gmail.com</li>
                            <li><strong>Handphone :</strong> 081296921851</li>
                            <li><strong>Whatsapp :</strong> 081296921851</li>
                                                    </ul>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-4">
                    <div class="footer-contact-info">
                        <h4>Working Hours</h4>
                        <ul>
                            <li><strong>Kantor :</strong> Jl.Kopral Sayom Ngentak Mojoyan Klaten</li>
                            <li><strong>Senin - Sabtu :</strong> 08:00 - 16:00</li>
                            <li><strong>Minggu :</strong> Tutup</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
