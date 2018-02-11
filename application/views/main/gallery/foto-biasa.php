<style type="text/css">
	.index_img {
		background: #fff;
		padding: 2em;
	}
	.index_img img {
		width: 100%;
		margin: 1em 0;
	}
	.index_img .title {
		font-size: 1.25em;
		font-weight: bold;
	}
	.index_img .p {
		text-align: justify;
	}
</style>
	<div class="content_middle">
		<div class="container">
			<div class="content_middle_box">
				<div class="middle_grid wow fadeInUp" data-wow-delay="0.4s">
					<?php if ( !empty($posts)):?>
					<?php $i=0; foreach ($posts as $row):?>
						<div class="col-md-6">
						<div class="grid1" style="margin-bottom: 5em;">
							<div class="index_img" id="index-<?php echo $i;?>">
								<div class="container-id" id="container-<?php echo $i;?>">
									<h4 class="title"><?php echo $row->title;?></h4>
									<img src="<?php echo base_url($row->image);?>" alt="<?php echo $row->title;?>">
									<p><?php echo $row->caption;?></p>
								</div>
							</div>
						</div>
						</div>t
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
