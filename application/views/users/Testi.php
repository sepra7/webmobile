<p> <a href="<?php echo base_url('users/testimonial/tambah')?>" class="btn btn-primary"> 
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
                                            <th width="5%">Nama Pelanggan</th>
                                            <th width="5%">Tanggal</th>
                                            <th width="5%">Komentar</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach ($testimonial as $testimonial ) { 
                                
                                     ?>
                                        <tr class="odd gradeX">
                                             <td><?php echo $i ?></td>
                                             <td><?php echo $testimonial->namapel ?></td>
                                             <td><?php echo $testimonial->datetime ?></td>
                                             <td><?php echo $testimonial->komentar ?></td>
                                 
                                        </tr>
                                        <?php $i++; } ?> 
                                        </tbody>
                                        </table>