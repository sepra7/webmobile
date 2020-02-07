<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>
	.register{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
    margin-top: 3%;
    padding: 3%;
}
.register-left{
    text-align: center;
    color: #fff;
    margin-top: 4%;
}
.register-left input{
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    width: 60%;
    background: #f8f9fa;
    font-weight: bold;
    color: #383d41;
    margin-top: 30%;
    margin-bottom: 3%;
    cursor: pointer;
}
.register-right{
    background: #f8f9fa;
    border-top-left-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
}
.register-left img{
    margin-top: 15%;
    margin-bottom: 5%;
    width: 25%;
    -webkit-animation: mover 2s infinite  alternate;
    animation: mover 1s infinite  alternate;
}
@-webkit-keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
.register-left p{
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}
.register .register-form{
    padding: 10%;
    margin-top: 10%;
}
.btnRegister{
    float: right;
    margin-top: 10%;
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    background: #0062cc;
    color: #fff;
    font-weight: 600;
    width: 50%;
    cursor: pointer;
}
.register .nav-tabs{
    margin-top: 3%;
    border: none;
    background: #0062cc;
    border-radius: 1.5rem;
    width: 28%;
    float: right;
}
.register .nav-tabs .nav-link{
    padding: 2%;
    height: 34px;
    font-weight: 600;
    color: #fff;
    border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
}
.register .nav-tabs .nav-link:hover{
    border: none;
}
.register .nav-tabs .nav-link.active{
    width: 100px;
    color: #0062cc;
    border: 2px solid #0062cc;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
}
.register-heading{
    text-align: center;
    margin-top: 8%;
    margin-bottom: -15%;
    color: #495057;
}
</style>
<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">

                        <h3>Welcome <?php  echo $detail->nama; ?></h3>
                    </div>
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                               
                            </li>
                       
                        </ul>
                        <?php
                                echo validation_errors ('<div class="alert alert-warning">','</div');
                                echo form_open_multipart(base_url('admin/pemesanan/detail/'.$detail->id_pemesanan));
                                ?>
                        <div class="tab-content" >
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Konfirmasi Pembayaran Romantic Wedding</h3>
                                
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                      	<label>Nama</label>
                                            <input type="text" class="form-control" placeholder="First Name *" value="<?php echo $detail->nama; ?>"   />
                                        </div>
                                        <div class="form-group">
                                        	<label>Nama Pesanan</label>
                                            <input type="text" class="form-control" placeholder="Last Name *" name="nama_pesanan" value="<?php echo $detail->nama_pesanan; ?>"   />
                                        </div>
                                        <div class="form-group">
                                        	<label>Harga</label>

                                            <input type="text" class="form-control" placeholder="Password *" value="<?php echo $detail->harga; ?>"   />
                                        </div>
    
                                    </div>
                                    <div class="col-md-6">
                                    <label>Tanggal Acara</label>

                                        <div class="form-group">
                                            <input type="date" class="form-control" placeholder="Your Email *" value="<?php echo $detail->tanggal_mulai;?>"   />
                                        </div>
                                        <div class="form-group">
                                      <label>No Hp</label>

                                            <input type="text" minlength="10" maxlength="10" name="txtEmpPhone" class="form-control" placeholder="Your Phone *" value="<?php echo $detail->no_hp;?>"  />
                                        </div>
                                    
                                        <div class="form-group">
                                         <label>Foto Struk </label>
                                            <input type="file" class="form-control" name="struk" />
                                        </div>
                                          <div class="form-group">
                                        
                                <textarea name="keterangan" class="form-control" style="margin-top: 0px; margin-bottom: 0px; height: 275px;"  > <?php echo $detail->keterangan; ?></textarea>                                        </div>
                                        <input type="submit"  name="submit" value="Konfirmasi"/>
                                    </div>
                                </div>
                      </div>
                       
                        </div>
                                                        <?php
echo form_close();
?>
      
                    </div>
                </div>

            </div>