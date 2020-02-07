<?php
echo validation_errors ('<div class="alert alert-warning">','</div');
echo form_open_multipart(base_url('admin/user/edit/'.$user->id_user));
?>
<div class="col-md-6">
  

<div class="form-group form-group-lg">
<label> Nama</label>
<input type="text" name="nama" class="form-control" placeholder="nama" value="<?php 
echo $user->nama ?>">
</div>

<div class="form-group form-group-lg">
<label> Username</label>
<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $user->username ?>">
</div>

<div class="form-group form-group-lg">
<label> Password</label>
<input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo $user->password ?>">
</div>

<div class="form-group form-group-lg">
<label> Email</label>
<input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $user->email ?>">
</div>

<div class="form-group form-group-lg">
<label> Alamat</label>
<input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $user->alamat ?>">
</div>

<div class="form-group form-group-lg">
<label> Jenis Kelamin </label>
<select name="jk" class="form-control">
	<option value="laki-laki" name="laki-laki"> Laki-Laki </option>
	<option value="perempuan" name="perempuan">Perempuan</option>

</select>
</div>

<div class="form-group form-group-lg">
<label> Level </label>
<select name="jk" class="form-control">
	<option value="admin" name="admin"> Admin </option>
	<option value="pelanggan" name="pelanggan">Pelanggan</option>

</select>
</div>



<div class="form-group form-group-lg">
<input type="submit" name="submit" class="btn btn-primary btn-lg" value="Simpan">
<!-- <input type="reset" name="reset" class="btn btn- btn-lg" value="Reset"> -->
<a href="<?php echo base_url('admin/user')  ?>" class="btn btn-warning btn-lg" >Kembali</a>
</div>

</div>

<?php
echo form_close();
?>