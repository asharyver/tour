<script type="text/javascript" src="<?php echo base_url('app-contents/video.js/dist/video.min.js');?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('app-contents/video.js/dist/video-js.min.css');?>">
	<div class="content_middle">
		<div class="container">
			<div class="content_middle_box">
				<div class="middle_grid wow fadeInUp" data-wow-delay="0.4s">
					<?php $i=0; foreach ($posts as $row):?>
						<div class="col-md-6">
						<div class="grid1" style="margin-bottom: 5em;">
							<div class="index_img">
								<video autobuffer autoloop controls="" style="width: 100%;height:auto;background:#000" poster="<?php echo base_url($row->thumbnail);?>">
									<source src="<?php echo base_url($row->source); ?>" type="<?php echo $row->type;?>" />
								</video>
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
				</div>
			</div>
		</div>
	</div>
