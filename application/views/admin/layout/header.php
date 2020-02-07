  <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('admin/user') ?> ">Administrator</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">  
<?php
date_default_timezone_set("Asia/Jakarta");
echo date ('d M Y');  ?> &nbsp;
<a href="#" class="btn btn-danger square-btn-adjust"> <i class="fa fa-user"></i> <?php echo $this->session->userdata('username');?> <?php echo $this->session->userdata('level');?></a>
 &nbsp; <a href="<?php echo base_url('admin/login/logout') ?>" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav> 