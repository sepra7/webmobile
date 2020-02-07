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
 update_address(<?=$lat;?>,<?=$lng;?>); //Set terlebih dahulu alamat lokasi pusat
function showmap()
{           
  var place = placesAutocomplete.getPlace(); //Inisialkan auto complete atau pencarian
  if (!place.geometry) //Jika hasil tidak ada
  {
    return; //Abaikan
  }
  var lat = place.geometry.location.lat(), // Ambil Posisi Latitude Auto Complete
  lng = place.geometry.location.lng(); // Ambil Posisi Longitude Auto Complete
  document.getElementById('lat').value=lat; //Set Latitude pada input lat
  document.getElementById('lng').value=lng; //Set Longitude pada input lng
  var map = new google.maps.Map(document.getElementById('map-canvas'), { //Refresh alamat
      center: {lat: lat, lng: lng},
      zoom: 17
    });
    placesAutocomplete.bindTo('bounds', map); //Render Map Auto Complete
    
    //Tambah penandaan pada alamat
    var marker = new google.maps.Marker({
      map: map,
      draggable: true,
    title: "Drag Untuk mencari posisi",
      anchorPoint: new google.maps.Point(0, -29)
    });
    
  if (place.geometry.viewport) {
        map.fitBounds(place.geometry.viewport);
      } else {
        map.setCenter(place.geometry.location);
        map.setZoom(17);
  }
    marker.setPosition(place.geometry.location);    
    marker_0 = createMarker_map(marker);
    
    var alamat=document.getElementById('cari');
      google.maps.event.addListener(marker_0, "dragend", function(event) {
        document.getElementById('lat').value = event.latLng.lat();
          document.getElementById('lng').value = event.latLng.lng();
          update_address(event.latLng.lat(),event.latLng.lng());          
      });
}

//Fungsi mendapatkan alamat disaat drag marker
function update_address(lat,lng)
{
  var geocoder = new google.maps.Geocoder;
  var latlng={lat: parseFloat(lat), lng: parseFloat(lng)};
  geocoder.geocode({'location': latlng}, function(results, status) {
    if (status === google.maps.GeocoderStatus.OK) {
      if (results[1]) {         
        document.getElementById('cari').value=results[0].formatted_address;
      } else {
        window.alert('Tidak ada hasil pencarian');
      }
    } else {
      window.alert('Geocoder error: ' + status);
    }
  });
}
  </script>

<?php
//validasi input
echo validation_errors ('<div class="alert alert-warning">','</div');
if (isset($error)) {
	echo '<div class="alert alert-warning">';
	echo $error;
	echo '</div>';
}

echo form_open_multipart(base_url('admin/event/tambah'));
?>

<div class="col-md-12">
	<div class="form-group form-group-lg">
		<label>Judul</label>
			<input type="text" name="judul" class="form-control" placeholder="Judul" value="<?php echo set_value('judul')?>" required>
	</div>
</div>

<div class="col-md-6">
	<div class="form-group ">
		<label>Kategori Event <sup><a href="<?php echo base_url('admin/kategori_event/tambah') ?> " > <i class="fa fa-plus"></i></a></sup></label>
			<select class="form-control" name="id_kategori_event">
				<?php foreach ($kategori as $kategori ) { ?>
				<option value="<?php echo $kategori->id_kategori_event ?>">
				<?php echo $kategori->nama_kategori ?>
				</option>
				<?php }?>	
				</select>
</div>
</div>
<div class="col-md-6">
	<div class="form-group ">
		<label>Gambar Event</label>
		<input type="file" name="gambar" class="form-control" >
	</div>
</div>
<div class="col-md-4">
  <div class="form-group ">
    <label>Tanggal Mulai</label>
   <input type="date" name="tanggal_mulai" class="form-control" placeholder="tanggal Mulai" value="<?php echo set_value('tanggal_mulai')?>" required>
  </div>
</div>
<div class="col-md-4">
  <div class="form-group ">
    <label>Tanggal Selesai</label>
   <input type="date" name="tanggal_selesai" class="form-control" placeholder="tanggal Selesai" value="<?php echo set_value('tanggal_selesai')?>" required>
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
  <div class="form-group ">
    <label>Keterangan</label>
 <textarea name="keterangan" class="form-control" placeholder="Keterangan"> <?php echo set_value('keterangan')?></textarea>
  </div>
</div>
<div class="col-md-12">
  <div class="form-group">
    <label>Nama Lokasi</label>
    <input type="text" name="lokasi" class="form-control" placeholder="Nama Lokasi" />
  </div>
</div>
<div class="col-md-12">
<div class="form-group">
  <label>Input Lokasi</label>
        <input type="text" id="cari"  class="form-control" placeholder="Cari Alamat atau Tempat"/>
      </div>
    </div>
<div class="col-md-12">
  <div class="form-group">
    <label>Maps</label>
    <?php echo $map['js'];?>
          <?php echo $map['html'];?>
    
  </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      
        <label>Latitude</label><br/>
        <input type="text" id="lat" name="latitude" class="form-control" placeholder="Latitude" value="<?=$lat;?>"/>
      </div>
    </div>
      <div class="form-group">
      <div class="col-md-6">
        <label>Longitude</label><br/>
        <input type="text" id="lng" name="longitude" class="form-control" placeholder="Longitude" value="<?=$lng;?>"/>
      </div>
    </div>  


<div class="col-md-12">
<div class="form-group" >
		<label>Isi Event</label>
			<textarea name="isi" id="isi" class="form-control" placeholder="Isi berita"> <?php echo set_value('isi')?></textarea>
	</div>
	<div class="form-group ">
		<input type="submit" name="submit" class="btn btn-primary btn-lg" value="save">
			<!-- <input type="reset" name="submit" class="btn btn-warning btn-lg" value="reset"> -->
    <a href="<?php echo base_url('admin/event')  ?>" class="btn btn-warning btn-lg" >Kembali</a> 
	</div>
</div>
<?php
echo form_close ();
?>