<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<section id="main-content">
	<section class="wrapper">
		<div class="wthree-font-awesome">
			<div class="grid_3 grid_4 w3_agileits_icons_page">
				<div class="icons">
					<h2 class="w3ls_head">Foto Biasa</h2>
					<!-- <h3 class="hdg">Headings</h3> -->
					<p>
						<button class="btn btn-default" id="upload_btn" data-toggle="modal" data-target="#upload_modal">Upload</button>
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
									<th>Judul</th>
									<th>Tampil di Gallery</th>
									<th>Upload at</th>
									<th>Action</th>
									<!-- <th>First Name</th> -->
									<!-- <th>Last Name</th> -->
									<!-- <th>Username</th> -->
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; foreach($media as $row):?>
								<tr>
									<td><?php echo $i;?></td>
									<td><img src="<?php echo base_url($row->image);?>" width='100px' height='100px' /></td>
									<td><?php echo $row->title;?></td>
									<td><?php echo $row->shown ? '<span class="label label-success">Tampil</span>' : '<span class="label label-danger">Tidak Tampil</span>'?></td>
									<td><?php echo date('l, N F Y ',$row->time);?></td>
									<td>
										<button class="btn btn-danger" id="delete_btn" data-photo-id="<?php echo $row->ID;?>" data-photo-name="<?php echo $row->title;?>">Delete</button>
										<button class="btn btn-info" id="edit_btn" data-photo-id="<?php echo $row->ID;?>" data-photo-name="<?php echo $row->title;?>" data-photo-shown="<?php echo ($row->shown) ? 'true' : 'false';?>" data-photo-caption="<?php echo base64_encode($row->caption) ?>">Edit</button>
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
<script>
</script>
<!-- Modal -->
<div id="upload_modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Upload Photo</h4>
			</div>
			<div class="modal-body">
				<form action="<?php echo base_url('photo_basic/upload');?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="namephoto">Judul Foto</label>
						<input type="text" class="form-control" id="namephoto" placeholder="Judul Foto" name="title" required="">
					</div>
					<div class="form-group">
						<label for="namephoto">Caption</label>
						<textarea name="caption" id="captionphoto" rows="5" placeholder="Caption Foto" required="" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label for="inputfile">File input</label>
						<input type="file" id="inputfile" accept="image/*" name="photo" required="">
					</div>
					<div class="form-group">
						<label>
							<input type="checkbox" id="shown" name="shown_in_gallery"> Tampilkan digallery
						</label>
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
				<h4 class="modal-title">Delete Photo</h4>
			</div>
			<div class="modal-body">
				<p>Apakah anda yakin ingin menghapus foto yang bernama <span class="label label-default" id="delete_name"></span> ?</p>
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

<div id="edit_modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Photo</h4>
			</div>
			<div class="modal-body">
				<form>
					<input type="hidden" name="ID" value="">
					<div class="form-group">
						<label>Judul</label>
						<input type="text" name="title" value="" placeholder="Type name of photo" class="form-control" />
					</div>
					<div class="form-group">
						<label>Caption</label>
						<textarea name="caption" rows="5" placeholder="Caption Foto" required="" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label><input type="checkbox" name="show_in_gallery" value="" checked="ok"> Tampil digalleri</label>
					</div>
					<div class="form-group">
						<button class="btn btn-info" type="button" id="edit_confirm">Ubah</button>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
	    $("button#delete_btn").click(function(){
	    	$('#delete_name').text($(this).attr('data-photo-name'));
	    	$('#delete_btn_confirm').attr('data-photo-id', $(this).attr('data-photo-id'));
    	    $("#delete_modal").modal("show");
    	});
    	
    	$('#delete_btn_confirm').click(function(){
 	   		$.ajax({
 	   			url: '<?php echo base_url('photo_basic/delete/');?>' + $(this).attr('data-photo-id'),
 	   			type: 'GET',
 	   			dataType: 'JSON',
 	   			data: {id: $(this).attr('data-photo-id')},
 	   			success: function(res) {
   					window.location.assign(window.location.href);
 	   			}
 	   		});
   			$("#delete_modal").modal("hide");
    	});
    	
    	$("#delete_modal").on('hidden.bs.modal', function () {
    		$('#delete_name').html('');
	    });
	    
	    $('button#edit_btn').click(function() {
	    	/* Act on the event */
	    	$('#edit_modal input[name=title]').val($(this).attr('data-photo-name'));
	    	$('#edit_modal input[name=ID]').val($(this).attr('data-photo-id'));
	    	$('#edit_modal textarea[name=caption]').val(window.atob($(this).attr('data-photo-caption')));
	    	if ($(this).attr('data-photo-shown') == 'true') {
	    		$('#edit_modal input[name=show_in_gallery]').attr('checked', 'on');
	    	} else {
	    		$('#edit_modal input[name=show_in_gallery]').removeAttr('checked');
	    	}
	    	$('#edit_modal').modal('show');
	    });
	    
	    $("#edit_confirm").click(function(event) {
	    	/* Act on the event */
	    	$.ajax({
	    		url: '<?php echo base_url('photo_basic/edit/');?>' + $('#edit_modal input[name=ID]').val(),
	    		type: 'POST',
	    		data: {
	    			name: $('#edit_modal input[name=name]').val(),
	    			shown: $('#edit_modal input[name=show_in_gallery]').attr('checked')
	    		},
	    		success: function(res) {
   					window.location.assign(window.location.href);
 	   			}
	    	});
	    });
    });
</script>
