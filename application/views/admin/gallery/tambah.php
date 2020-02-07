
<?php
//validasi input
echo validation_errors ('<div class="alert alert-warning">','</div');
if (isset($error)) {
	echo '<div class="alert alert-warning">';
	echo $error;
	echo '</div>';
}

echo form_open_multipart(base_url('admin/gallery/tambah'));
?>

<div class="col-md-6">
	<div class="form-group form-group-lg">
		<label>Nama GALLERY</label>
			<input type="text" name="nama" class="form-control" placeholder="Nama gallery" value="<?php echo set_value('nama')?>" required>
	</div>

	<div class="form-group ">
		<label>Gambar </label>
		<input type="file" name="image" class="form-control" >
	</div>

<!-- 

<div class="form-group ">
		<label>Isi keterangan</label>
			<textarea name="content" class="form-control" placeholder="keterangan"> <?php echo set_value('content')?></textarea>
	</div> -->
	
	<div class="form-group ">
		<input type="submit" name="submit" class="btn btn-primary btn-lg" value="save">
			<!-- <input type="reset" name="submit" class="btn btn-warning btn-lg" value="reset"> -->
		<a href="<?php echo base_url('admin/gallery')  ?>" class="btn btn-warning btn-lg" >Kembali</a>
	</div>
</div>
<?php
echo form_close ();
?>