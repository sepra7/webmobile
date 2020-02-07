</div>
                        </div>
                    </div>
                    <!--  end  Context Classes  -->
                </div>
            </div>
                <!-- /. ROW  -->
        </div>
               
    </div>
            
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo base_url () ?>assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo base_url () ?>assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?php echo base_url () ?>assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="<?php echo base_url () ?>assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url () ?>assets/js/dataTables/dataTables.bootstrap.js"></script>


   <script>
        $(function() {
            $("#id_category").change(function(){
                var id_category = $("#id_category").val();
 
                $.ajax({
                    url: "<?php echo base_url('admin/pemesanan/getauto')?>",
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        'id_category': id_category
                    },
                    success: function (obj) {
                        $("#harga").val(obj['harga']);   
                    }
                });
            });
        });
    </script>

   
</body>
</html>
