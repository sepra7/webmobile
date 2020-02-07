<?php
echo validation_errors ('<div class="alert alert-warning">','</div');
echo form_open(base_url('admin/produk/tambah'));
?>
<div class="col-md-6">
	<div class="form-group form-group-lg">
		<label> Nama Paket</label>
			<input type="text" name="nama_paket" class="form-control" placeholder="Nama Paket" value="<?php echo set_value('nama_paket')?>">
	</div>
	<div class="form-group form-group-lg">
		<label>Attr1</label>
			<input type="text" name="attr1" class="form-control" placeholder="Atribut 1" value="<?php echo set_value('attr1')?>">
	</div>
	<div class="form-group form-group-lg">
		<label>Attr2</label>
			<input type="text" name="attr2" class="form-control" placeholder="Atribut 2" value="<?php echo set_value('attr2')?>">
	</div>	
	<div class="form-group form-group-lg">
		<label> Attr3</label>
			<input type="text" name="attr3" class="form-control" placeholder="Atribut 3" value="<?php echo set_value('attr3')?>">
	</div>
	<div class="form-group form-group-lg">
		<label> Harga</label>
			<input type="text" name="harga" class="form-control" placeholder="Harga" value="<?php echo set_value('harga')?>">
	</div>


	<div class="form-group ">
		<label>Kategori </label>
			<select class="form-control" name="id_category">
				<?php foreach ($kategori as $kategori ) { ?>
				<option value="<?php echo $kategori->id_category ?>">
				<?php echo $kategori->nama ?>
				</option>
				<?php }?>	
				</select>
</div>
	<div class="form-group form-group-lg">
		<input type="submit" name="submit" class="btn btn-primary btn-lg" value="Simpan">
<!-- 		<input type="reset" name="reset" class="btn btn- btn-lg" value="Reset"> -->
		<a href="<?php echo base_url('admin/produk')  ?>" class="btn btn-warning btn-lg" >Kembali</a>
	</div>
</div>

<?php
echo form_close();
?>