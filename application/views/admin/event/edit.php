<script src="<?php echo base_url('assets/tinymce/js/tinymce/tinymce.min.js')?> " type="text/javascript"></script>
  <script>
 tinymce.init({
  selector : '#isi',
  height: 500,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor textcolor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code help wordcount','image code'
  ],
  toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help |link image | code',
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'],
 automatic_uploads: true,
  // add custom filepicker only to Image dialog
  file_picker_types: 'image',
  file_picker_callback: function(cb, value, meta) {
    var input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/*');

    input.onchange = function() {
      var file = this.files[0];
      var reader = new FileReader();
      
      reader.onload = function () {
        var id = 'blobid' + (new Date()).getTime();
        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
        var base64 = reader.result.split(',')[1];
        var blobInfo = blobCache.create(id, file, base64);
        blobCache.add(blobInfo);

        // call the callback and populate the Title field with the file name
        cb(blobInfo.blobUri(), { title: file.name });
      };
      reader.readAsDataURL(file);
    };
    
    input.click();
  }

});
  </script>
<?php
echo validation_errors ('<div class="alert alert-warning">','</div');
echo form_open(base_url('admin/event/edit/'.$detail->id_event));
?>
<div class="col-md-12">
<div class="form-group form-group-lg">
<label> Judul</label>
<input type="text" name="judul" class="form-control" placeholder="Judul" value="<?php 
echo $detail->judul ?>">
</div>
</div>

<div class="col-md-6">
<div class="form-group ">
<label>Kategori Event </label>
	<select class="form-control" name="id_kategori_event">
	<?php foreach ($kategori as $kategori ) { ?>
	<option value="<?php echo $kategori->id_kategori_event ?>"
	<?php if($kategori->id_kategori_event == $detail->id_kategori_event) { echo "selected";} ?>
			>
		<?php echo $kategori->nama_kategori ?>
		</option>
		<?php }?>	
	</select>
</div>
</div> 

<div class="col-md-6">
	<div class="form-group ">
		<label>Gambar event</label>
		<input type="file" name="gambar" class="form-control" >
	</div>
</div>

<div class="col-md-4">
		<div class="form-group ">
			<label>Tanggal Mulai</label>
			<input type="date" name="tanggal_mulai" class="form-control" placeholder="tanggal_mulai" value="<?php 
echo $detail->tanggal_mulai ?>">
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group ">
			<label>Tanggal selesai</label>
			<input type="date" name="tanggal_selesai" class="form-control" placeholder="tanggal selesai" value="<?php echo $detail->tanggal_selesai ?>">
		</div>
	</div>

<div class="col-md-4">
  <div class="form-group ">
    <label> status event </label>
    <select name="status_event" class="form-control">
      <option value="publish" > publish </option>
      <option value="draft">draft</option>
</select>
  </div>
</div>

<div class="col-md-12">
	<div class="form-group">
		<label>Keterangan</label>
 <textarea name="keterangan" class="form-control" placeholder="Keterangan"> <?php echo $detail->keterangan ?> </textarea>
	</div>
	</div>

<div class="col-md-6">
    <div class="form-group ">
      <label>Latitude</label>
      <input type="text" name="Latitude" class="form-control" placeholder="Latitude" value="<?php echo $detail->latitude ?>">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group ">
      <label>Latitude</label>
      <input type="text" name="Latitude" class="form-control" placeholder="Latitude" value="<?php echo $detail->longitude ?>">
    </div>
  </div>

	<div class="col-md-12">
<div class="form-group" >
		<label>Isi Event</label>
			<textarea name="isi" id="isi" class="form-control" placeholder="Isi berita"> <?php echo $detail->isi ?></textarea>
	</div>
	<div class="form-group ">
		<input type="submit" name="submit" class="btn btn-primary btn-lg" value="save">
			<!-- <input type="reset" name="submit" class="btn btn-warning btn-lg" value="reset"> -->
    <a href="<?php echo base_url('admin/event')  ?>" class="btn btn-warning btn-lg" >Kembali</a>
	</div>
</div>


<!-- <div class="form-group form-group-lg">
<input type="submit" name="submit" class="btn btn-primary btn-lg" value="Simpan">
<input type="reset" name="reset" class="btn btn- btn-lg" value="Reset">
</div>

</div> -->

<?php
echo form_close();
?>