<?php
echo validation_errors ('<div class="alert alert-warning">','</div');
echo form_open_multipart(base_url('users/pemesanan/edit/'.$detail->id_pemesanan));
?>
<div class="col-md-6">
  

<div class="form-group form-group-lg">
<label> Nama </label>
<input type="text" name="nama" class="form-control" placeholder="nama " value="<?php echo $detail->nama ?>" >
</div>


<div class="form-group form-group-lg">
<label> Alamat</label>
<input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $detail->alamat ?>" disabled>
</div>


<div class="form-group form-group-lg">
<label> No Hp</label>
<input type="text" name="no_hp" class="form-control" placeholder="nomor hp" value="<?php echo $detail->no_hp ?>" disabled>
</div>


<div class="form-group form-group-lg">
<label> Harga </label>
<input type="text" name="harga" class="form-control" placeholder="Harga" value="<?php echo $detail->harga ?>" disabled>
</div>


<div class="form-group form-group-lg">
<label> Tanggal Acara</label>
<input type="date" name="tanggal_mulai" class="form-control" placeholder="Tanggal Mulai" value="<?php echo $detail->tanggal_mulai ?>" disabled>
</div>


 <div class="form-group">
                                         <label>Foto Struk </label>
                                            <input type="file" class="form-control" name="struk" />
                                        </div>




<div class="form-group form-group-lg">
<input type="submit" name="submit" class="btn btn-primary btn-lg" value="Simpan">
<!-- <input type="reset" nama="reset" class="btn btn- btn-lg" value="Reset"> -->
<a href="<?php echo base_url('admin/detail')  ?>" class="btn btn-warning btn-lg" >Kembali</a>
</div>

</div>

<?php
echo form_close();
?>