<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<section id="main-content">
	<section class="wrapper">
		<div class="wthree-font-awesome">
			<div class="grid_3 grid_4 w3_agileits_icons_page">
				<div class="icons">
					<h2 class="w3ls_head">Write Post</h2>
					<form class="form-horizontal" method="post" action="">
						 <div class="position-center">
	                    <div class="form-group">
	                        <label class="">Judul</label>
                            <input class="form-control" type="text" name="title" placeholder="Judul">
	                    </div>
	                    <div class="form-group">
	                    	<label>Caption</label>
	                    	<textarea class="form-control" name="caption"></textarea>
	                    </div>
	                    <div class="form-group">
	                    	<p><button type="button" class="btn btn-info" data-toggle="collapse" data-target="#video">Add Video</button></p>
							<div id="video" class="collapse">
								<div class="table-responsive">
									<table class="table table-bordered table-striped">
										<tbody>
											<?php foreach ($media as $vid):?>
											<tr>
												<td><input type="checkbox" name="select[]" value="<?php echo $vid->ID;?>"></td>
												<td><img src="<?php echo base_url($vid->thumbnail);?>" width='100px' height='100px'></td>
												<td><?php echo $vid->name;?></td>
											</tr>
											<?php endforeach;?>
										</tbody>
									</table>
								</div>
							</div>
	                    </div>
	                    <div class="form-group">
	                    	<button class="btn btn-success" type="submit" name="save" value="save">Publish</button>
	                    </div>
	                </div>
	                </form>
				</div>
			</div>
		</div>
	</section>
	<div class="clearfix"></div>
<!-- </section> -->
<div class="clearfix"></div>
