<div class="banner">
		<div class="container_wrap">
			<h1>Apa yang anda cari ?</h1>
			<form method="get">
				<input type="text" value="Judul, nama" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Judul, nama, ...';}" name="search">
				<div class="contact_btn">
					<label class="btn1 btn-2 btn-2g"><input type="submit" id="submit" value="Cari"></label>
				</div>
			</form>
			<div class="clearfix"></div>
		</div>
	</div>
	<?php if ($this->input->get('search')):?>
	<div class="content_top">
   	  <div class="container">
   		<div class="col-md-3 bottom_nav">
		</div>
		<div class="col-md-6 content_dropdown1 text-center">
			<h3 class="help-block">Mencari <strong><?php echo $this->input->get('search');?></strong></h3>
 		</div>
		<div class="col-md-3 filter_grid">
		</div>
   	</div>
   </div>
<?php endif;?>
<?php if (empty($posts)):?>
	<div class="content_top">
   	  <div class="container">
   		<div class="col-md-3 bottom_nav">
		</div>
		<div class="col-md-6 content_dropdown1 text-center">
			<h3 class="help-block">Tidak ditemukan apapun</h3>
 		</div>
		<div class="col-md-3 filter_grid">
		</div>
   	</div>
   </div>
<?php endif;?>
	<div class="content_middle">
		<div class="container">
			<div class="content_middle_box">
					<!-- <div class="top_grid">
						<div class="col-md-3">
							<div class="grid1">
								<div class="view view-first">
									<div class="index_img"><img src="<?php echo base_url("app-contents/main/");?>images/pic1.jpg" class="img-responsive" alt=""/></div>
									<div class="sale">$2.980</div>
									<div class="mask">
										<div class="info"><i class="search"> </i> Show More</div>
										<ul class="mask_img">
											<li class="star"><img src="<?php echo base_url("app-contents/main/");?>images/star.png" alt=""/></li>
											<li class="set"><img src="<?php echo base_url("app-contents/main/");?>images/set.png" alt=""/></li>
											<div class="clearfix"> </div>
										</ul>
									</div>
								</div>
								<i class="home"></i>
								<div class="inner_wrap">
									<h3>2 bedroom house for rent in Dubai</h3>
									<ul class="star1">
										<h4 class="green">Vision Agency</h4>
										<li><a href="#"> <img src="<?php echo base_url("app-contents/main/");?>images/star1.png" alt="">(236)</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="grid1">
								<div class="view view-first">
									<div class="index_img1"><img src="<?php echo base_url("app-contents/main/");?>images/pic6.jpg" class="img-responsive" alt=""/></div>
									<div class="mask">
										<div class="info"><i class="search"> </i> Show More</div>
										<ul class="mask_img">
											<li class="star"><img src="<?php echo base_url("app-contents/main/");?>images/star.png" alt=""/></li>
											<li class="set"><img src="<?php echo base_url("app-contents/main/");?>images/set.png" alt=""/></li>
											<div class="clearfix"> </div>
										</ul>
									</div>
								</div>
								<i class="home1"> </i>
								<div class="inner_wrap">
									<h3>2 bedroom house for rent in Dubai</h3>
									<ul class="star1">
										<h4 class="yellow">Vision Agency</h4>
										<li><a href="#"> <img src="<?php echo base_url("app-contents/main/");?>images/star2.png" alt="">(136)</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="grid1">
								<div class="view view-first">
									<div class="index_img2"><img src="<?php echo base_url("app-contents/main/");?>images/pic2.jpg" class="img-responsive" alt=""/></div>
									<div class="mask">
										<div class="info"><i class="search"> </i> Show More</div>
										<ul class="mask_img">
											<li class="star"><img src="<?php echo base_url("app-contents/main/");?>images/star.png" alt=""/></li>
											<li class="set"><img src="<?php echo base_url("app-contents/main/");?>images/set.png" alt=""/></li>
											<div class="clearfix"> </div>
										</ul>
									</div>
								</div>
								<i class="home2"> </i>
								<div class="inner_wrap">
									<h3>2 bedroom house for rent in Dubai</h3>
									<ul class="star1">
										<h4 class="blue">Vision Agency</h4>
										<li><a href="#"> <img src="<?php echo base_url("app-contents/main/");?>images/star2.png" alt="">(136)</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="grid1">
								<div class="view view-first">
									<div class="index_img"><img src="<?php echo base_url("app-contents/main/");?>images/pic3.jpg" class="img-responsive" alt=""/></div>
									<div class="sale">$2.980</div>
									<div class="mask">
										<div class="info"><i class="search"> </i> Show More</div>
										<ul class="mask_img">
											<li class="star"><img src="<?php echo base_url("app-contents/main/");?>images/star.png" alt=""/></li>
											<li class="set"><img src="<?php echo base_url("app-contents/main/");?>images/set.png" alt=""/></li>
											<div class="clearfix"> </div>
										</ul>
									</div>
								</div>
								<i class="home"></i>
								<div class="inner_wrap">
									<h3>2 bedroom house for rent in Dubai</h3>
									<ul class="star1">
										<h4 class="green">Vision Agency</h4>
										<li><a href="#"> <img src="<?php echo base_url("app-contents/main/");?>images/star1.png" alt="">(236)</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div> -->
				<div class="middle_grid wow fadeInUp" data-wow-delay="0.4s">
					<?php $i = 1; foreach ($posts as $pos):?>
					<div class="col-md-6" style="margin-bottom: 2em;">
						<div class="grid1">
							<div class="index_img"><img src="<?php echo base_url($pos['thumbnail']);?>" class="img-responsive" alt="" style="width: 100%;height:300px"/></div>
							<!-- <i class="m_home"> </i> -->
							<div class="inner_wrap1">
								<ul class="item_module">
									<li class="module_left"><img src="<?php echo base_url($pos['author']['pict']);?>" width="30px" height="30px" class="img-responsive" alt=""/></li>
									<li class="module_right">
										<!-- <img src="<?php echo base_url("app-contents/main/");?>images/m_star.png" class="img-responsive" alt=""/> -->
										<h5><?php echo $pos['title'];?></h5>
										<p>"<?php echo $pos['caption'];?>"</p>
										<a href="<?php echo base_url($pos['permalink']);?>" class="content_btn"> ...... Baca Selengkapnya</a>
									</li>
									<div class="clearfix"> </div>
								</ul>
							</div>
						</div>
					</div>
					<?php if ($i%2 == 0):?><div class="clearfix"></div><?php endif;?>
					<?php $i++; endforeach;?>
					<div class="clearfix"> </div>
					<div class="text-align">
						<ul class="pagination">
							<?php echo $pagination;?>
						</ul>
					</div>
				</div>
				<!-- <div class="top_grid wow fadeInRight" data-wow-delay="0.4s">
					<div class="col-md-3">
						<div class="grid1">
							<div class="view view-first">
								<div class="index_img"><img src="<?php echo base_url("app-contents/main/");?>images/pic1.jpg" class="img-responsive" alt=""/></div>
								<div class="sale">$2.980</div>
								<div class="mask">
									<div class="info"><i class="search"> </i> Show More</div>
									<ul class="mask_img">
										<li class="star"><img src="<?php echo base_url("app-contents/main/");?>images/star.png" alt=""/></li>
										<li class="set"><img src="<?php echo base_url("app-contents/main/");?>images/set.png" alt=""/></li>
										<div class="clearfix"> </div>
									</ul>
								</div>
							</div>
							<i class="home"></i>
							<div class="inner_wrap">
								<h3>2 bedroom house for rent in Dubai</h3>
								<ul class="star1">
									<h4 class="green">Vision Agency</h4>
									<li><a href="#"> <img src="<?php echo base_url("app-contents/main/");?>images/star1.png" alt="">(236)</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="grid1">
							<div class="view view-first">
								<div class="index_img1"><img src="<?php echo base_url("app-contents/main/");?>images/pic2.jpg" class="img-responsive" alt=""/></div>
								<div class="mask">
									<div class="info"><i class="search"> </i> Show More</div>
									<ul class="mask_img">
										<li class="star"><img src="<?php echo base_url("app-contents/main/");?>images/star.png" alt=""/></li>
										<li class="set"><img src="<?php echo base_url("app-contents/main/");?>images/set.png" alt=""/></li>
										<div class="clearfix"> </div>
									</ul>
								</div>
							</div>
							<i class="home1"> </i>
							<div class="inner_wrap">
								<h3>2 bedroom house for rent in Dubai</h3>
								<ul class="star1">
									<h4 class="yellow">Vision Agency</h4>
									<li><a href="#"> <img src="<?php echo base_url("app-contents/main/");?>images/star2.png" alt="">(136)</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="grid1">
							<div class="view view-first">
								<div class="index_img2"><img src="<?php echo base_url("app-contents/main/");?>images/pic6.jpg" class="img-responsive" alt=""/></div>
								<div class="mask">
									<div class="info"><i class="search"> </i> Show More</div>
									<ul class="mask_img">
										<li class="star"><img src="<?php echo base_url("app-contents/main/");?>images/star.png" alt=""/></li>
										<li class="set"><img src="<?php echo base_url("app-contents/main/");?>images/set.png" alt=""/></li>
										<div class="clearfix"> </div>
									</ul>
								</div>
							</div>
							<i class="home2"> </i>
							<div class="inner_wrap">
								<h3>2 bedroom house for rent in Dubai</h3>
								<ul class="star1">
									<h4 class="blue">Vision Agency</h4>
									<li><a href="#"> <img src="<?php echo base_url("app-contents/main/");?>images/star2.png" alt="">(136)</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="grid1">
							<div class="view view-first">
								<div class="index_img"><img src="<?php echo base_url("app-contents/main/");?>images/pic3.jpg" class="img-responsive" alt=""/></div>
								<div class="sale">$2.980</div>
								<div class="mask">
									<div class="info"><i class="search"> </i> Show More</div>
									<ul class="mask_img">
										<li class="star"><img src="<?php echo base_url("app-contents/main/");?>images/star.png" alt=""/></li>
										<li class="set"><img src="<?php echo base_url("app-contents/main/");?>images/set.png" alt=""/></li>
										<div class="clearfix"> </div>
									</ul>
								</div>
							</div>
							<i class="home"></i>
							<div class="inner_wrap">
								<h3>2 bedroom house for rent in Dubai</h3>
								<ul class="star1">
									<h4 class="green">Vision Agency</h4>
									<li><a href="#"> <img src="<?php echo base_url("app-contents/main/");?>images/star1.png" alt="">(236)</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div> -->
				<!-- <div class="bottom_grid wow bounce" data-wow-delay="0.4s">
					<div class="col-md-6">
						<div class="grid1">
							<div class="index_img1"><img src="<?php echo base_url("app-contents/main/");?>images/pic5.jpg" class="img-responsive" alt=""/></div>
							<i class="m_home1"> </i>
							<ul class="vision">
								<li>Vision Agency</li>
								<li class="desc"><a href="#"> <img src="<?php echo base_url("app-contents/main/");?>images/star2.png" alt="">(236)</a></li>
							</ul>
							<div class="inner_wrap1">
								<ul class="item_module">
									<li class="module_left"><img src="<?php echo base_url("app-contents/main/");?>images/m2.jpg" class="img-responsive" alt=""/></li>
									<li class="module_right">
										<img src="<?php echo base_url("app-contents/main/");?>images/m_star.png" class="img-responsive" alt=""/>
										<h5>Lucy-p</h5>
										<p>"Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat."</p>
										<a href="#" class="content_btn">....read more</a>
									</li>
									<div class="clearfix"> </div>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="grid1">
							<div class="view view-first">
								<div class="index_img"><img src="<?php echo base_url("app-contents/main/");?>images/pic3.jpg" class="img-responsive" alt=""/></div>
								<div class="sale">$2.980</div>
								<div class="mask">
									<div class="info"><i class="search"> </i> Show More</div>
									<ul class="mask_img">
										<li class="star"><img src="<?php echo base_url("app-contents/main/");?>images/star.png" alt=""/></li>
										<li class="set"><img src="<?php echo base_url("app-contents/main/");?>images/set.png" alt=""/></li>
										<div class="clearfix"> </div>
									</ul>
								</div>
							</div>
							<i class="b_home"></i>
							<div class="inner_wrap2">
								<h3>2 bedroom house for rent in Dubai</h3>
								<ul class="star1">
									<h4 class="green">Vision Agency</h4>
									<li><a href="#"> <img src="<?php echo base_url("app-contents/main/");?>images/star1.png" alt="">(236)</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="grid1">
							<div class="view view-first">
								<div class="index_img1"><img src="<?php echo base_url("app-contents/main/");?>images/pic2.jpg" class="img-responsive" alt=""/></div>
								<div class="mask">
									<div class="info"><i class="search"> </i> Show More</div>
									<ul class="mask_img">
										<li class="star"><img src="<?php echo base_url("app-contents/main/");?>images/star.png" alt=""/></li>
										<li class="set"><img src="<?php echo base_url("app-contents/main/");?>images/set.png" alt=""/></li>
										<div class="clearfix"> </div>
									</ul>
								</div>
							</div>
							<i class="b_home1"> </i>
							<div class="inner_wrap2">
								<h3>2 bedroom house for rent in Dubai</h3>
								<ul class="star1">
									<h4 class="yellow">Vision Agency</h4>
									<li><a href="#"> <img src="<?php echo base_url("app-contents/main/");?>images/star2.png" alt="">(136)</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div> -->
			</div>
			<!-- <div class="offering">
				<h2>What can DuHoot offer to you ?</h2>
				<h3>Ut wisi enim ad minim veniam, quis</h3>
				<ul class="icons wow fadeInUp" data-wow-delay="0.4s">
					<li><i class="icon1"> </i><span class="one"> </span></li>
					<li><i class="icon2"> </i><span class="two"> </span></li>
					<li><i class="icon3"> </i><span class="three"> </span></li>
					<li><i class="icon4"> </i><span class="four"> </span></li>
					<li><i class="icon5"> </i></li>
				</ul>
				<div class="real">
					<h4>Reality</h4>
					<div class="col-sm-6">
						<ul class="service_grid">
							<i class="s1"> </i>
							<li class="desc1 wow fadeInRight" data-wow-delay="0.4s">
								<p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum</p>
							</li>
							<div class="clearfix"> </div>
						</ul>
					</div>
					<div class="col-sm-6">
						<ul class="service_grid">
							<i class="s2"> </i>
							<li class="desc1 wow fadeInRight" data-wow-delay="0.4s">
								<p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum</p>
							</li>
							<div class="clearfix"> </div>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div> -->
		</div>
	</div>
