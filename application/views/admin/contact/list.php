 <p> <a href="<?php echo base_url('admin/contact/tambah')?>" class="btn btn-primary"> 
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
                                             <th width="1%">No Hp</th>
                                            <th width="5%">Email</th>

                                        <th width="5%">ACTION</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach ($contact as $contact ) {
                                     
                                     ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $contact->no_hp ?> <br>
                                            <td><?php echo $contact->email ?></td>
                                       
                                        
                                             
                                            

                                        <td>
                                        <a href="<?php echo base_url('admin/contact/edit/'.$contact->id_contact) ?>" 
                                        class="btn btn-warning btn-xs"> <i class="fa fa-edit"></i>Edit</a>

                                      <?php
                                       include ('delete.php');
                                       ?> 

                                        </td>
                                        </tr>
                                       <?php $i++; } ?>
                                        </tbody>
                                        </table>
            





