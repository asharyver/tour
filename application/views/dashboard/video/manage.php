<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<section id="main-content">
	<section class="wrapper">
		<div class="wthree-font-awesome">
			<div class="grid_3 grid_4 w3_agileits_icons_page">
				<div class="icons">
					<h2 class="w3ls_head">Manage Video</h2>
					<!-- <h3 class="hdg">Headings</h3> -->
					<p>
						<button class="btn btn-default" data-toggle="modal" data-target="#upload_modal">Upload</button>
					</p>
					<?php if ( ! empty($error)):?>
					<p>
						<div class="alert alert-danger"><?php echo $error;?></div>
					</p>
					<?php endif;?>
					<?php if ( ! empty($success)):?>
					<p>
						<div class="alert alert-success"><?php echo $success;?></div>
					</p>
					<?php endif;?>
					<?php if (empty($media)):?>
					<p>
						<div class="alert alert-info">Media is empty, upload now</div>
					</p>
					<?php else:?>
					<div class="bs-docs-example table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Thumbnail</th>
									<th>Title</th>
									<th>Action</th>
									<!-- <th>First Name</th> -->
									<!-- <th>Last Name</th> -->
									<!-- <th>Username</th> -->
								</tr>
							</thead>
							<tbody>
								<?php  $i =1; foreach($media as $row):?>
								<tr>
									<td><?php echo $i;?></td>
									<td><img src="<?php echo base_url($row->thumbnail);?>" width='100px' height='100px' /></td>
									<td><?php echo $row->name;?></td>
									<td>
										<button class="btn btn-danger" onclick="removeModal({id: '<?php echo $row->ID?>',name:'<?php echo $row->name;?>'});">Delete</button>
									</td>
									<!-- <td>Mark</td> -->
									<!-- <td>Otto</td> -->
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

<div id="upload_modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Upload Video</h4>
			</div>
			<div class="modal-body">
				<form action="<?php echo base_url('video/upload');?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label>Nama Video</label>
						<input type="text" class="form-control" placeholder="Nama Foto" name="name">
					</div>
					<div class="form-group">
						<label>Video</label>
						<input type="file" accept="video/*" name="video" required="">
					</div>
					<div class="form-group">
						<label>Thumbnail</label>
						<input type="file" accept="image/*" name="thumbnail" required="">
					</div>
					<button type="submit" name="upload" value="upload" class="btn btn-info">Upload</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div id="delete_modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Upload Video</h4>
			</div>
			<div class="modal-body">
				<p>Apakah anda yakin ingin menghapus Video yang bernama <span class="label label-default" id="delete_name"></span> ?</p>
				<br/>
				<button class="btn btn-danger pull-left" data-dismiss="modal">Tidak</button>
				<button class="btn btn-success pull-right" id="delete_btn_confirm">Ya</button>
				<div class="clearfix"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<script>
	function removeModal(info) {
		$("#delete_name").text(info.name);
		$('#delete_btn_confirm').attr({
			'data-video-id': info.id,
			'data-video-name': info.name
		});
		$('#delete_modal').modal('show');
	}
	$('#delete_btn_confirm').click(function(event) {
		$.ajax({
			url: '<?php echo base_url('video/delete/');?>' + $(this).attr('data-video-id'),
			success: function(res) {
				window.location.assign(window.location.href);
			}
		})
	});
</script>
