
<div class="col-md-12">

<div class="card" >
  <center>  <img src="
    <?php
if ($pemesanan->struk == NULL) {
  echo 'https://www.w3schools.com/howto/img_avatar.png';
  }else{
    echo base_url('assets/upload/image/thumbs/'.$pemesanan->struk);
  }
?>
" alt="Avatar" height="200" width="180"></center>
  <div class="card-body">
    <table class="table">
      <tr>
      	<td width="400px">Nama Lengkap</td>
      	<td><?php echo $pemesanan->nama ?></td>
      </tr>
      <tr><td>Alamat</td>
      	<td><?php echo $pemesanan->alamat ?></td>
      </tr>
      <tr><td>Harga</td>
      	<td><?php echo $pemesanan->harga ?></td>
      </tr>
        <tr><td>No Hp</td>
      	<td><?php echo $pemesanan->no_hp ?></td>
      </tr>
       
<!--        <tr><td>No Hp</td>
      	<td><?php echo $pemesanan->nama_pesanan ?></td>
      </tr> -->

      <tr>
      	<td>Tanggal Acara</td>
      	<td><?php echo $pemesanan->tanggal_mulai ?></td>
      </tr>  
      <tr><td>Pesanan</td>
        <td><?php echo $pemesanan->keterangan ?></td>
      </tr>



    </table>
  </div>
</div>

</div>