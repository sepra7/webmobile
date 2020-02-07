 <p> <a href="<?php echo base_url('admin/partner/tambah')?>" class="btn btn-primary"> 
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
                                            <th width="5%">NAMA PARTNER</th>
                                            <th width="5%">GAMBAR</th>
                                             <th width="5%">ACTION</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach ($partner as $partner ) { 
                                     
                                     ?>
                                        <tr class="odd gradeX">
                                             <td><?php echo $i ?></td>
                                             <td><?php echo $partner->nama ?></td>
                                             <td><img src="<?php echo base_url('assets/upload/image/thumbs/'.$partner->image)  ?>" width="60"></td>
                                        <td>
                                        <a href="<?php echo base_url('admin/partner/edit/'.$partner->id_partner) ?>" 
                                        class="btn btn-warning btn-xs"> <i class="fa fa-edit"></i>Edit</a>

                                       <?php
                                       include ('delete.php');
                                       ?>

                                        </td>
                                        </tr>
                                        <?php $i++; } ?> 
                                        </tbody>
                                        </table>
            





