<?php
echo validation_errors ('<div class="alert alert-warning">','</div');
echo form_open(base_url('admin/user/tambah'));
?>
<div class="col-md-6">
	<div class="form-group form-group-lg">
		<label> Nama</label>
			<input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo set_value('nama')?>">
	</div>
	<div class="form-group form-group-lg">
		<label> Username</label>
			<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username')?>">
	</div>
	<div class="form-group form-group-lg">
		<label> Password</label>
			<input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password')?>">
	</div>	
	<div class="form-group form-group-lg">
		<label> Email</label>
			<input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email')?>">
	</div>
<div class="form-group form-group-lg">
		<label> Alamat</label>
			<input type="text" name="alamat" class="form-control" placeholder="Email" value="<?php echo set_value('alamat')?>">
	</div>
	<div class="form-group form-group-lg">
		<label> Jenis Kelamin </label>
		<select class="form-control" name="jk">
				<option value="laki-laki" name="laki-laki">Laki- Laki</option>
				<option value="perempuan" name="perempuan">Perempuan</option>
				</select>
	</div>
		<div class="form-group form-group-lg">
		<label> Level </label>
		<select class="form-control" name="level">
				<option value="admin" name="admin">Admin</option>
				<option value="pelanggan" name="pelanggan">Pelanggan</option>
				</select>
	</div>
	
	<div class="form-group form-group-lg">
		<input type="submit" name="submit" class="btn btn-primary btn-lg" value="Simpan">
<!-- 		<input type="reset" name="reset" class="btn btn- btn-lg" value="Reset"> -->
		<a href="<?php echo base_url('admin/user')  ?>" class="btn btn-warning btn-lg" >Kembali</a>
	</div>
</div>

<?php
echo form_close();
?>