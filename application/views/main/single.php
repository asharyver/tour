<script type="text/javascript" src="<?php echo base_url('app-contents/video.js/dist/video.min.js');?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('app-contents/video.js/dist/video-js.min.css');?>">
	<div class="content_middle">
		<div class="container">
			<div class="content_middle_box">
				<div class="middle_grid wow fadeInUp" data-wow-delay="0.4s">
					<div class="col-md-12">
							<?php $i=0; foreach ($posts as $row):?>
						<div class="grid1" style="margin-bottom: 5em;">
							<div class="index_img"><!-- <img src="<?php echo base_url("app-contents/main/");?>images/pic4.jpg" class="img-responsive" alt="" style="width: 100%;" /> -->
								<video style="width: 100%;height: auto;background: #000" autobuffer autoloop controls="" poster="<?php echo $row['thumbnail'];?>">
									<source src="<?php echo $row['video'] ?>" type="<?php echo $row['type'];?>" />
										<!-- <source src="//vjs.zencdn.net/v/oceans.mp4" type="video/mp4"> -->
									 	<!-- <source src="//vjs.zencdn.net/v/oceans.webm" type="video/webm"> -->
								</video>
							</div>
							<!-- <i class="m_home"> </i> -->
							<!-- <ul class="vision"> -->
								<!-- <li>Vision Agency</li> -->
								<!-- <li class="desc"><a href="#"> <img src="<?php echo base_url("app-contents/main/");?>images/star1.png" alt="">(236)</a></li> -->
							<!-- </ul> -->
							<div class="inner_wrap1">
								<h2><?php echo $row['title'];?></h2>
								<ul class="item_module">
									<li class="module_left"><img src="<?php echo $row['pict'];?>" class="img-responsive" alt=""/></li>
									<li class="module_right">
										<!-- <img src="<?php echo base_url("app-contents/main/");?>images/m_star.png" class="img-responsive" alt=""/> -->
										<h5><?php echo $row['fullname'];?></h5>
										<p>"<?php echo $row['caption'];?>"</p>
										<!-- <a href="post/view/post-permalink" class="content_btn">....read more</a> -->
									</li>
									<div class="clearfix"> </div>
								</ul>
							</div>
							</script>
						</div>
							<?php $i++; endforeach;?>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div>
