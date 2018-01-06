<section id="main-content">
    <section class="wrapper">
        <div class="wthree-font-awesome">
            <div class="grid_3 grid_4 w3_agileits_icons_page">
                <section class="panel">
                    <header class="panel-heading">
                        Edit Profile
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <?php if ( ! empty($error)): foreach ($error as $err):?>
                                <div class="alert alert-danger"><?php echo $err;?></div>
                            <?php endforeach; endif;?>
                            <form role="form" action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="fullname">Nama Lengkap</label>
                                <input type="text" name="fullname" class="form-control" placeholder="Enter fullname" id="fullname" value="<?php echo $user->fullname;?>">
                            </div>
                            <div class="form-group">
                                <label for="username">Nama Pengguna</label>
                                <input type="text" name="username" class="form-control" placeholder="Enter username" id="username" value="<?php echo $user->username;?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter password" id="password">
                                <p class="help-block">Isi jika ingin mengubah kata sandi</p>
                            </div>
                            <div class="form-group">
                                <label for="repassword">Repeat Password</label>
                                <input type="password" name="repassword" class="form-control" placeholder="Enter password again" id="repassword">
                                <p class="help-block">Isi jika ingin mengubah kata sandi</p>
                            </div>
                            <div class="form-group">
                                <label for="photo">Foto</label>
                                    <input type="file" id="photo" name="photo" accept="image/*">
                                    <p class="help-block">Isi jika ingin mengubah foto</p>
                            </div>
                            <button type="submit" class="btn btn-info" name="save" value="save">Save</button>
                        </form>
                        </div>

                    </div>
                </section>
            </div>
        </div>
</section>
    <div class="clearfix"></div>
<!-- </section> -->
<div class="clearfix"></div>
