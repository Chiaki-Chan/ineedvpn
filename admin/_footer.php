
</div><!-- ./wrapper -->
<!-- jQuery 2.1.3 -->
<script src="/Public/asset/js/jQuery.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="/Public/asset/js/bootstrap.min.js" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="/Public/asset/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src='/Public/asset/plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE App -->
<script src="/Public/asset/js/app.min.js" type="text/javascript"></script>
<script src="/Public/asset/materialize/js/materialize.min.js"></script>
<script src="/Public/asset/materialize/js/init.js"></script>
	<script src="/Public/asset/js/jquery.colorbox-min.js"></script>
		<script type="text/javascript">
			jQuery(function($) {
				var colorbox_params = {
					reposition:true,
					scalePhotos:true,
					scrolling:false,
					close:'&times;',
					current:'{current} of {total}',
					maxWidth:'100%',
					maxHeight:'100%',
					onOpen:function(){
						document.body.style.overflow = 'hidden';
					},
					onClosed:function(){
						document.body.style.overflow = 'auto';
					},
					onComplete:function(){
						$.colorbox.resize();
					}
				};

				$('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
				$("#cboxLoadingGraphic").append("<i class='icon-spinner orange'></i>");//let's add a custom loading icon

				/**$(window).on('resize.colorbox', function() {
					try {
						//this function has been changed in recent versions of colorbox, so it won't work
						$.fn.colorbox.load();//to redraw the current frame
					} catch(e){}
				});*/
			})
		</script>
</body>
</html>
