<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
    </div>
    <strong>Admin Controller by <a href="http://matocreative.vn/" target="_blank">Mato Creative</a>.</strong> All rights reserved.
</footer>


</body>

<!-- fastClick -->
<script src="<?php echo site_url('assets/lib/') ?>fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo site_url('assets/lib/bootstrap/js/select2.full.min.js') ?>"></script>
<script src="<?php echo site_url('assets/lib/') ?>dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url('assets/js/');?>filereader.js" type="text/javascript" charset="utf-8" async defer></script>
<script src="<?php echo site_url('assets/js/admin/script.js') ?>"></script>
<script src="<?php echo site_url('assets/js/admin/image.js') ?>"></script>
<script src="<?php echo site_url('assets/js/admin/common.js') ?>"></script>
<script src="<?php echo site_url('assets/js/admin/workflow.js') ?>"></script>
<script src="<?php echo site_url('assets/lib/bootstrap/js/moment.min.js') ?>"></script>
<script src="<?php echo site_url('assets/lib/bootstrap/js/bootstrap-datepicker.min.js') ?>"></script>
<script src="<?php echo site_url('assets/lib/bootstrap/js/daterangepicker.js') ?>"></script>

<script type="text/javascript">
	$(function(){
		//Date range picker
    	$('#reservation').daterangepicker({
    		locale: {
    			format: 'DD-MM-YYYY'
    		}
    	});
	});
    function tog(v){return v?'addClass':'removeClass';}

    $(document).on('input', '.clearable', function(){
        $(this)[tog(this.value)]('x');
    }).on('mousemove', '.x', function( e ){
        $(this)[tog(this.offsetWidth-18 < e.clientX-this.getBoundingClientRect().left)]('onX');
    }).on('touchstart click', '.onX', function( ev ){
        ev.preventDefault();
        $(this).removeClass('x onX').val('').change();
    });
    $('.clearable').mousemove(function(){
        $(this)[tog(this.value)]('x');
    });
    $('.clearable').mouseout(function(){
        $(this).removeClass('x onX');
    });
    $(".clearable").each(function() {
        if($(this).val().length > 0){
            $(this)[tog(this.value)]('x');
        }
    });
</script>
</html>