<?php 
if ($this->session->flashdata('sukses')) {
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
    }
 ?>

  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th width="1%">NO</th>
                                            <th width="1%">Nama</th>
                                            <th width="5%">Nama Pelanggan</th>
                                            <th width="5%">Harga</th>
                                            <th width="5%">Tanggal Acara</th>
                                            <th width="5%">Struk</th>
                                            <th width="5%">Status Pesanan</th>
                                            <th width="5%">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach ($pemesanan as $pemesanan ) { 
                                
                                     ?>
                                        <tr class="odd gradeX">
                                             <td><?php echo $i ?></td>
                                             <td><?php echo $pemesanan->nama ?></td>
                                             <td><?php echo $pemesanan->namapel ?></td>
                                             <td><?php echo $pemesanan->harga ?></td>
                                             <td><?php echo $pemesanan->tanggal_mulai ?></td>
                                             <td><img src="<?php echo base_url('assets/upload/image/thumbs/'.$pemesanan->struk)  ?>" width="60"></td>
                                             <center><td><?php echo $pemesanan->status ?></td>
                                        <td>
                                        <!-- <a href="<?php echo base_url('pemesanan/detail/'.$pemesanan->id_pemesanan) ?>" 
                                        class="btn btn-success btn-xs"> <i class="fa fa-edit"></i>show</a> -->

                                        <a href="<?php echo base_url('users/pemesanan/edit/'.$pemesanan->id_pemesanan) ?>" 
                                        class="btn btn-warning btn-xs"> Unggah Bukti Pembayaran</a>
                                        <a href="<?php echo base_url('pemesanan/show/'.$pemesanan->id_pemesanan) ?>" 
                                        class="btn btn-primary btn-xs"> Detail</a>


                                    <!--    <?php
                                       include ('delete.php');
                                       ?>
 -->
                                        </td>
                                        </tr>
                                        <?php $i++; } ?> 
                                        </tbody>
                                        </table>
            





