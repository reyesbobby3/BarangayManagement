			<!-- Add footer template above here -->
			<div class="clearfix"></div>
			<?php if(!$_REQUEST['Embedded']){ ?>
				<div style="height: 70px;" class="hidden-print"></div>
			<?php } ?>

		</div> <!-- /div class="container" -->
		<?php if(is_file(dirname(__FILE__) . '/hooks/footer-extras.php')){ include(dirname(__FILE__).'/hooks/footer-extras.php'); } ?>
		<script src="<?php echo PREPEND_PATH; ?>resources/lightbox/js/lightbox.min.js"></script>
		
		
		<!-- jQuery 2.2.3 -->
		<script src="<?php echo PREPEND_PATH; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
		<!-- jQuery UI 1.11.4 -->
		<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
		<script>
		$.widget.bridge('uibutton', $.ui.button);
		</script>
		<!-- Bootstrap 3.3.6 -->
		<script src="<?php echo PREPEND_PATH; ?>bootstrap/js/bootstrap.min.js"></script>

		<!-- AdminLTE App -->
		<script src="<?php echo PREPEND_PATH; ?>dist/js/app.min.js"></script>		
		
	</body>
</html>