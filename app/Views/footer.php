<!-- jQuery -->
<script src="<?= base_url("assets/jquery/jquery.min.js"); ?>"></script>

<!-- Bootstrap -->
<script src="<?= base_url("assets/bootstrap/js/bootstrap.min.js"); ?>"></script>

<!-- Feedback Modal -->
<?php if(session()->getFlashdata('modal_message')) { ?>
	<?= session()->getFlashdata('modal_message'); ?>
	<script>
		$(window).on('load',function(){
			$('#modalFeedback').modal('show');
		});
	</script>
<?php } ?>

</body>
</html>