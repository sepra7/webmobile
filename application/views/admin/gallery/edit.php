
<?php
echo validation_errors ('<div class="alert alert-warning">','</div');
echo form_open_multipart(base_url('admin/gallery/edit/'.$detail->id_gallery));
?>



	<div class="col-md-6">
	<div class="form-group form-group-lg">
	<label> nama gallery</label>
	<input type="text" name="nama" class="form-control" placeholder="Nama gallery" value="<?php 
	echo $detail->nama ?>">
	</div>


	<div class="form-group  ">
		<label>Gambar gallery</label>
		<input type="file" name="image" class="form-control" >
	</div>

<!-- 

<div class="form-group" >
		<label>Kontent</label>
			<textarea name="content"  class="form-control" placeholder="kontent gallery"> <?php echo $detail->content ?></textarea>
	</div> -->

	<div class="form-group ">
		<input type="submit" name="submit" class="btn btn-primary btn-lg" value="save">
		<a href="<?php echo base_url('admin/gallery')  ?>" class="btn btn-warning btn-lg" >Kembali</a>
	</div>
</div>



<?php
echo form_close();
?>