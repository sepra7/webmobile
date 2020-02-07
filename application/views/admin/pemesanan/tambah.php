<?php
//validasi input
echo validation_errors ('<div class="alert alert-warning">','</div');

echo form_open(base_url('admin/pemesanan/tambah'));
?>
<div class="col-md-6">

	<div class="form-group form-group-lg">
		<label>Nama</label>
			<input type="text" name="nama" class="form-control" placeholder="Nama " value="<?php echo set_value('nama')?>">
	</div>

	<div class="form-group ">
		<label>Nama Pelanggan </label>
			<select class="form-control" name="id_user">
				<?php foreach ($user as $user ) { ?>
				<option value="<?php echo $user->id_user ?>">
				<?php echo $user->nama ?>
				</option>
				<?php }?>	
				</select>
	</div>

	<div class="form-group form-group-lg">
		<label>Alamat</label>
			<input type="text" name="alamat" class="form-control" placeholder="Alamat " value="<?php echo set_value('alamat')?>">
	</div>

	<div class="form-group form-group-lg">
		<label>No HP</label>
			<input type="text" name="no_hp" class="form-control" placeholder="Nomor HP " value="<?php echo set_value('no_hp')?>">
	</div>

	<div class="form-group ">
		<label>Kategori </label>
			<select class="form-control" name="id_category" id="id_category" onkeyup="isi_otomatis()" >
				<?php foreach ($kategori as $kategori ) { ?>
				<option value="<?php echo $kategori->id_category ?>">
				<?php echo $kategori->nama ?>
				</option>
				<?php }?>	
				</select>
</div>


	<div class="form-group form-group-lg">
		<label>Harga</label>
			<input type="text" name="harga" class="form-control" id="harga" placeholder="Harga" value="<?php echo set_value('harga')?>">
	</div>
	<div class="form-group form-group-lg">
		<label>Tanggal acara</label>
		<input type="date" name="tanggal_mulai" class="form-control" placeholder="Tanggal mulai" value="<?php echo set_value('tanggal_mulai')?>">
	</div>
	<div class="form-group form-group-lg" >
		<label>Keterangan</label>
			
			<textarea name="keterangan" id="isi" class="form-control" placeholder="Keterangan" style="margin: 0px -33.5px 0px 0px; height: 142px; width: 493px;"> <?php echo set_value('keterangan')?></textarea>
	</div>

	<div class="form-group ">
		<input type="submit" name="submit" class="btn btn-primary btn-lg" value="save">
		<a href="<?php echo base_url('admin/pemesanan')  ?>" class="btn btn-warning btn-lg" >Kembali</a>
	</div>
</div>
<?php
echo form_close ();
?>