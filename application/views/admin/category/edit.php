<?php
echo validation_errors ('<div class="alert alert-warning">','</div');
echo form_open(base_url('admin/category/edit/'.$category->id_category));
?>
<div class="col-md-6">
  

<div class="form-group form-group-lg">
<label> Nama Kategori Event</label>
<input type="text" name="nama" class="form-control" placeholder="nama kategori" value="<?php 
echo $category->nama ?>">
</div>



<div class="form-group form-group-lg">
<input type="submit" name="submit" class="btn btn-primary btn-lg" value="Simpan">
<!-- <input type="reset" nama="reset" class="btn btn- btn-lg" value="Reset"> -->
<a href="<?php echo base_url('admin/category')  ?>" class="btn btn-warning btn-lg" >Kembali</a>
</div>

</div>

<?php
echo form_close();
?>