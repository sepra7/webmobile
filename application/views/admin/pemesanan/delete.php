<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal<?php echo $pemesanan->id_pemesanan  ?> " title="delete user" >
<i class="fa fa-trash-o"></i> Delete
                             
                            </button>
                            <div class="modal fade" id="myModal<?php echo $pemesanan->id_pemesanan  ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Hapus Data pemesanan : <?php echo $pemesanan->nama  ?></h4>
                                        </div>
                                        <div class="modal-body">
                                     <p class="alert alert-danger"><i class="fa fa-warning"></i> Yakin ingin menghapus pemesanan <?php echo $pemesanan->nama ?></p>
                                        </div>
                                        <div class="modal-footer">
                                        <a href="<?php echo base_url('admin/pemesanan/delete/'.$pemesanan->id_pemesanan) ?>" class="btn btn-danger">
                                        <i class="fa fa-trash-o"></i>Hapus</a>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
