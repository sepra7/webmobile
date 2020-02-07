 <p> <a href="<?php echo base_url('admin/category/tambah')?>" class="btn btn-primary"> 
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
                                            <th width="5%">Nama Kategori</th>
                                            <th width="5%">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach ($category as $kategori ) { 
                                
                                     ?>
                                        <tr class="odd gradeX">
                                             <td><?php echo $i ?></td>
                                             <td><?php echo $kategori->nama ?></td>
                                        <td>
                                        <a href="<?php echo base_url('admin/category/edit/'.$kategori->id_category) ?>" 
                                        class="btn btn-warning btn-xs"> <i class="fa fa-edit"></i>Edit</a>

                                       <?php
                                       include ('delete.php');
                                       ?>

                                        </td>
                                        </tr>
                                        <?php $i++; } ?> 
                                        </tbody>
                                        </table>
            





