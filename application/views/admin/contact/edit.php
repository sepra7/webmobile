<?php
echo validation_errors ('<div class="alert alert-warning">','</div');
echo form_open_multipart(base_url('admin/contact/edit/'.$contact->id_contact));
?>
<div class="col-md-6">
  

<div class="form-group form-group-lg">
<label> No Hp</label>
<input type="text" name="no_hp" class="form-control" placeholder="No Hp" value="<?php 
echo $contact->no_hp ?>">
</div>

<div class="form-group form-group-lg">
<label> Email</label>
<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $contact->email ?>">
</div>

<div class="form-group form-group-lg">
<input type="submit" name="submit" class="btn btn-primary btn-lg" value="Simpan">
<!-- <input type="reset" name="reset" class="btn btn- btn-lg" value="Reset"> -->
<a href="<?php echo base_url('admin/contact')  ?>" class="btn btn-warning btn-lg" >Kembali</a>
</div>

</div>

<?php
echo form_close();
?>