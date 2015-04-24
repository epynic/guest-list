

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="<?php echo site_url('bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo site_url('extra/datepicker/js/bootstrap-datepicker.js');?>"></script>

    <script type="text/javascript">
	    $('body').on('hidden.bs.modal', '.modal', function () {
		  $(this).removeData('bs.modal');
		});

        $('.datepicker').datepicker({
            format : 'yyyy-m-d'
        });

        function approve(id){
            $.ajax({
                url: "<?= site_url('admin/dashboard/approve');?>",
                type: "post",
                data: {id:id},
                success: function(){
                    $('.status_'+id).html('<span class="label label-success">Approved</span>');
                }
            });
        }

        function approveEvent(id ,status){
            $.ajax({
                url: "<?= site_url('admin/dashboard/approveEvent').'/';?>"+status,
                type: "post",
                data: {id:id},
                success: function(){
                    $('.eventstatus_'+id).html('<span class="label label-success">REFRESH !</span>');
                }
            });
        }
	</script>
  </body>
</html>