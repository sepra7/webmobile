 <p> <a href="<?php echo base_url('admin/produk/tambah')?>" class="btn btn-primary"> 
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
                                             <th width="1%">NAMA PAKET</th>
                                            <th width="5%">ATRIBUT 1</th>
                                            <th width="5%">ATRIBUT 2</th>
                                            <th width="5%">ATRIBUT 3</th>
                                            <th width="5%">HARGA</th>
                                            <th width="5%">KATEGORI</th>
                                            <th width="5%">ACTION</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach ($produk as $produk ) {
                                     
                                     ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $produk->nama_paket ?> <br>
                                            <td><?php echo $produk->attr1 ?></td>
                                            <td><?php echo $produk->attr2 ?></td>
                                            <td><?php echo $produk->attr3 ?></td>
                                            <td><?php echo $produk->harga ?></td>
                                            <td><?php echo $produk->nama ?></td>

                                        <td>
                                        <a href="<?php echo base_url('admin/produk/edit/'.$produk->id_produk) ?>" 
                                        class="btn btn-warning btn-xs"> <i class="fa fa-edit"></i>Edit</a>

                                       <?php
                                       include ('delete.php');
                                       ?>

                                        </td>
                                        </tr>
                                       <?php $i++; } ?>
                                        </tbody>
                                        </table>
            





