 <p> <a href="<?php echo base_url('admin/event/tambah')?>" class="btn btn-primary"> 
 <i class="fa fa-plus"></i> Tambah </a></p>

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
                                            <th width="5%">Gambar</th>
                                            <th width="5%">Judul</th>
                                            <th width="5%">Kategori</th>
                                            <th width="5%">Tanggal Mulai</th>
                                            <th width="5%">Tanggal Selesai</th>
                                            <th width="5%">Status Event</th>
                                            <th width="5%">User</th>
                                             <th width="5%">ACTION</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach ($event as $event ) { 
                                     
                                     ?>
                                        <tr class="odd gradeX">
                                             <td><?php echo $i ?></td>
                                             <td><img src="<?php echo base_url('assets/upload/image/thumbs/'.$event->gambar)  ?>" width="60"></td>
                                            <td><?php echo $event->judul ?></td>
                                             <td><?php echo $event->nama_kategori ?></td>
                                             <td><?php echo $event->tanggal_mulai ?></td>
                                             <td><?php echo $event->tanggal_selesai ?></td>
                                             <td><?php echo $event->status_event ?></td>
                                             <td><?php echo $event->nama ?></td>
                                     
                                        <td>
                                        <a href="<?php echo base_url('admin/event/edit/'.$event->id_event) ?>" 
                                        class="btn btn-warning btn-xs"> <i class="fa fa-edit"></i>Edit</a>

                                       <?php
                                       include ('delete.php');
                                       ?>

                                        </td>
                                        </tr>
                                        <?php $i++; } ?> 
                                        </tbody>
                                        </table>
            





