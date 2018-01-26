<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<section id="main-content">
	<section class="wrapper">
		<div class="wthree-font-awesome">
			<div class="grid_3 grid_4 w3_agileits_icons_page">
				<div class="icons">
					<h2 class="w3ls_head">Manage Post</h2>
					<!-- <h3 class="hdg">Headings</h3> -->
					<p>
						<button class="btn btn-default" onclick="location.assign('<?php echo base_url('post/write_new');?>');">Write a post</button>
					</p>
					<?php if ( ! empty($success)):?>
					<p>
						<div class="alert alert-success"><?php echo $success;?></div>
					</p>
					<?php endif;?>
					<?php if ( ! empty($error)):?>
					<p>
						<div class="alert alert-danger"><?php echo $error;?></div>
					</p>
					<?php endif;?>
					<?php if (empty($posts)):?>
					<p>
						<div class="alert alert-info">Post is empty create a post now</div>
					</p>
					<?php else:?>
					<div class="bs-docs-example table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Title</th>
									<th>Publish</th>
									<th>Action</th>
									<!-- <th>First Name</th> -->
									<!-- <th>Last Name</th> -->
									<!-- <th>Username</th> -->
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; foreach($posts as $pos):?>
								<tr>
									<td><?php echo $i;?></td>
									<td><a href="<?php echo base_url('post/view/'.$pos->permalink);?>"><?php echo $pos->title;?></a></td>
									<td><?php echo date('Y-m-d', $pos->time);?></td>
									<td>
										<a href="<?php echo base_url('post/delete/'.$pos->ID);?>"><span class="label label-danger">Delete</span></a>
										<a href="<?php echo base_url('post/edit/'.$pos->ID);?>"><span class="label label-info">Edit</span></a>
									</td>
									<!-- <td>@mdo</td> -->
								</tr>
								<?php $i++; endforeach;?>
							</tbody>
						</table>
					</div>
					<nav>
						<ul class="pagination">
						<?php echo $pagination;?>
						</ul>
					</nav>
					<?php endif;?>
				</div>
			</div>
		</div>
	</section>
	<div class="clearfix"></div>
<!-- </section> -->
<div class="clearfix"></div>
