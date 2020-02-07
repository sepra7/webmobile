
<div class="col-md-12">

<div class="card" >
  <center>  <img src="
    <?php
if ($Pemesanan->struk == NULL) {
  echo 'https://www.w3schools.com/howto/img_avatar.png';
  }else{
    echo base_url('assets/upload/image/thumbs/'.$Pemesanan->struk);
  }
?>
" alt="Avatar" height="200" width="180"></center>
  <div class="card-body">
    <table class="table">
      <tr>
      	<td width="400px">Nama Lengkap</td>
      	<td><?php echo $Pemesanan->nama ?></td>
      </tr>
      <tr><td>Alamat</td>
      	<td><?php echo $Pemesanan->alamat ?></td>
      </tr>
      <tr><td>Harga</td>
      	<td><?php echo $Pemesanan->harga ?></td>
      </tr>
        <tr><td>No Hp</td>
      	<td><?php echo $Pemesanan->no_hp ?></td>
      </tr>
<!--        <tr><td>No Hp</td>
      	<td><?php echo $pemesanan->nama_pesanan ?></td>
      </tr> -->

      <tr>
      	<td>Tanggal Acara</td>
      	<td><?php echo $Pemesanan->tanggal_mulai ?></td>
      </tr>  



    </table>
  </div>
</div>


</div>

</div>