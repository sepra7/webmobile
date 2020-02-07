


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
                                            <th width="5%">Nama</th>
                                            <th width="5%">Email</th>
                                            <th width="5%">No Hp</th>
                                            <th width="5%">Isi Pesan</th>
                                            <th width="5%">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach ($inbox as $inbox ) { 
                                
                                     ?>
                                        <tr class="odd gradeX">
                                             <td><?php echo $i ?></td>
                                             <td><?php echo $inbox->nama ?></td>
                                             <td><?php echo $inbox->email ?></td>
                                             <td><?php echo $inbox->phone ?></td>
                                             <td><?php echo $inbox->pesan ?></td>
                                        <td>
                                        
                                       <?php
                                       include ('delete.php');
                                       ?>

                                        </td>
                                        </tr>
                                        <?php $i++; } ?> 
                                        </tbody>
                                        </table>
            





