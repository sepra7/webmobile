<?php
//validasi input
echo validation_errors ('<div class="alert alert-warning">','</div');

echo form_open(base_url('admin/category/tambah'));
?>
<div class="col-md-6">
	<div class="form-group form-group-lg">
		<label>Nama Kategori</label>
			<input type="text" name="nama" class="form-control" placeholder="Nama Kategori" value="<?php echo set_value('nama')?>">
	</div>

	<div class="form-group ">
		<input type="submit" name="submit" class="btn btn-primary btn-lg" value="save">
		<!-- 	<input type="reset" nama="submit" class="btn btn-warning btn-lg" value="reset"> -->
		<a href="<?php echo base_url('admin/category')  ?>" class="btn btn-warning btn-lg" >Kembali</a>
	</div>
</div>
<?php
echo form_close ();
?>