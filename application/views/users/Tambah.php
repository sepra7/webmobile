<?php
//validasi input
echo validation_errors ('<div class="alert alert-warning">','</div');

echo form_open(base_url('users/testimonial/tambah'));
?>
<div class="col-md-6">
	<div class="form-group form-group-lg">
		<label>Komentar</label>
			<input type="text" name="komentar" class="form-control" placeholder="Komentar" value="<?php echo set_value('komentar')?>">
	</div>

	<div class="form-group ">
		<input type="submit" name="submit" class="btn btn-primary btn-lg" value="save">
		<!-- 	<input type="reset" nama="submit" class="btn btn-warning btn-lg" value="reset"> -->

	</div>
</div>
<?php
echo form_close ();
?>