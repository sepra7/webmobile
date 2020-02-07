2B
<?php
echo validation_errors ('<div class="alert alert-warning">','</div');
echo form_open_multipart(base_url('admin/berita/edit/'.$detail->id_news));
?>



	<div class="col-md-6">
	<div class="form-group form-group-lg">
	<label> Judulr</label>
	<input type="text" name="title" class="form-control" placeholder="Judul" value="<?php 
	echo $detail->title ?>">
	</div>


	<div class="form-group  ">
		<label>Gambar Slider</label>
		<input type="file" name="image" class="form-control" >
	</div>


<div class="form-group" >
		<label>Isi berita</label>
			<textarea name="content"  class="form-control" placeholder="Isi Berita"> <?php echo $detail->content ?></textarea>
	</div>

	<div class="form-group ">
		<input type="submit" name="submit" class="btn btn-primary btn-lg" value="save">
		<a href="<?php echo base_url('admin/slider')  ?>" class="btn btn-warning btn-lg" >Kembali</a>
	</div>
</div>



<?php
echo form_close();
?>