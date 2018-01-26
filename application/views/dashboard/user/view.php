<section id="main-content">
    <section class="wrapper">
        <div class="wthree-font-awesome">
            <div class="grid_3 grid_4 w3_agileits_icons_page">
                <section class="panel">
                    <header class="panel-heading">
                        Account
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form role="form">
                            <div class="form-group">
                                <label for="fullname">Nama Lengkap</label>
                                <input type="email" class="form-control" id="fullname" value="<?php echo $user->fullname;?>" readonly="">
                            </div>
                            <div class="form-group">
                                <label for="username">Nama Pengguna</label>
                                <input type="email" class="form-control" id="username" value="<?php echo $user->username;?>" readonly="">
                            </div>
                            <div class="form-group">
                                <label for="photo">Foto</label>
                                <div style="width: 100px;height: 100px;">
                                    <img style="width: 100px;height: 100px;" class="img-thumbnail img-responsive" src="<?php echo base_url('app-contents/dashboard/photo/'.$user->pict);?>">
                                </div>
                            </div>
                            <a href="<?php echo base_url('user/edit');?>" class="btn btn-info">Edit</a>
                        </form>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
