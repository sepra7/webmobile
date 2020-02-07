 <p> <a href="<?php echo base_url('admin/user/tambah')?>" class="btn btn-primary"> 
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
                                             <th width="1%">NAMA</th>
                                            <th width="5%">USERNAME</th>
                                            <th width="5%">PASSWORD</th>
                                            <th width="5%">EMAIL</th>
                                            <th width="5%">ALAMAT</th>
                                            <th width="5%">JENIS KELAMIN</th>
                                            <th width="5%">LEVEL</th>
                                            <th width="5%">ACTION</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach ($user as $user ) {
                                     
                                     ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $user->nama ?> <br>
                                            <td><?php echo $user->username ?></td>
                                            <td><?php echo $user->password ?></td>
                                            <td><?php echo $user->email ?></td>
                                            <td><?php echo $user->alamat ?></td>
                                            <td><?php echo $user->jk ?></td>
                                            <td><?php echo $user->level ?></td>

                                        <td>
                                        <a href="<?php echo base_url('admin/user/edit/'.$user->id_user) ?>" 
                                        class="btn btn-warning btn-xs"> <i class="fa fa-edit"></i>Edit</a>

                                       <?php
                                       include ('delete.php');
                                       ?>

                                        </td>
                                        </tr>
                                       <?php $i++; } ?>
                                        </tbody>
                                        </table>
            





