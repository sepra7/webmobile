2B
<?php
echo validation_errors ('<div class="alert alert-warning">','</div');
echo form_open_multipart(base_url('admin/logo/edit/'.$detail->id_logo));
?>



	<div class="col-md-6">
	<div class="form-group form-group-lg">
	<label> nama Logo</label>
	<input type="text" name="nama" class="form-control" placeholder="Nama Logo" value="<?php 
	echo $detail->nama ?>">
	</div>


	<div class="form-group  ">
		<label>Gambar logo</label>
		<input type="file" name="image" class="form-control" >
	</div>

	<div class="form-group ">
		<input type="submit" name="submit" class="btn btn-primary btn-lg" value="save">
		<a href="<?php echo base_url('admin/logo')  ?>" class="btn btn-warning btn-lg" >Kembali</a>
	</div>
</div>



<?php
echo form_close();
?>