<link rel="stylesheet" href="<?php echo base_url('app-contents/main/');?>css/photo-sphere-viewer.min.css">

<script src="<?php echo base_url('app-contents/main/');?>js/three.min.js"></script>
<script src="<?php echo base_url('app-contents/main/');?>js/D.min.js"></script>
<script src="<?php echo base_url('app-contents/main/');?>js/uevent.min.js"></script>
<script src="<?php echo base_url('app-contents/main/');?>js/doT.min.js"></script>
<script src="<?php echo base_url('app-contents/main/');?>js/CanvasRenderer.js"></script>
<script src="<?php echo base_url('app-contents/main/');?>js/Projector.js"></script>
<script src="<?php echo base_url('app-contents/main/');?>js/DeviceOrientationControls.js"></script>
<script src="<?php echo base_url('app-contents/main/');?>js/photo-sphere-viewer.min.js"></script>

	<div class="content_middle">
		<div class="container">
			<div class="content_middle_box">
				<div class="middle_grid wow fadeInUp" data-wow-delay="0.4s">
					<?php if ( !empty($posts)):?>
					<?php $i=0; foreach ($posts as $row):?>
						<div class="col-md-6">
						<div class="grid1" style="margin-bottom: 5em;">
							<div class="index_img" id="index-<?php echo $i;?>">
								<div class="container-id" id="container-<?php echo $i;?>""></div>
								<script>
									var PSV = new PhotoSphereViewer({
									    panorama: 'http:<?php echo base_url($row->path)?>',
									    container: 'container-<?php echo $i;?>',
									    caption: '<?php echo $row->name;?>',
									    loading_img: 'http:<?php echo base_url('app-contents/main/images/photosphere-logo.gif');?>',
									    navbar: 'zoom caption fullscreen',
									    default_fov: 70,
									    size: {
									      height: 350
									    }
									  });
								</script>
							</div>
						</div>
						</div>
					<?php $i++; endforeach;?>
					<div class="clearfix"> </div>
					<div class="text-align">
						<ul class="pagination">
							<?php echo $pagination;?>
						</ul>
					</div>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
