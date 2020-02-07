 <p> <a href="<?php echo base_url('admin/berita/tambah')?>" class="btn btn-primary"> 
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
                                            <th width="5%">JUDUL</th>
                                            <th width="5%">SLUG</th>
                                            <th width="5%">GAMBAR</th>
                                            <th width="5%">TANGGAL PUBLISH</th>
                                             <th width="5%">ACTION</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach ($berita as $berita ) { 
                                     
                                     ?>
                                        <tr class="odd gradeX">
                                             <td><?php echo $i ?></td>
                                             <td><?php echo $berita->judul ?></td>
                                             <td><?php echo $berita->slug ?></td>
                                             <td><img src="<?php echo base_url('assets/upload/image/thumbs/'.$berita->image)  ?>" width="60"></td>
                                             <td><?php echo $berita->datetime ?></td>
                                     
                                        <td>
                                        <a href="<?php echo base_url('admin/berita/edit/'.$berita->id_news) ?>" 
                                        class="btn btn-warning btn-xs"> <i class="fa fa-edit"></i>Edit</a>

                                       <?php
                                       include ('delete.php');
                                       ?>

                                        </td>
                                        </tr>
                                        <?php $i++; } ?> 
                                        </tbody>
                                        </table>
            





