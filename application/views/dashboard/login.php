	<div class="log-w3">
		<div class="w3layouts-main">
			<h2>Sign In Now</h2>
			<form action="" method="post">
				<?php if (isset($errors)):?>
					<?php foreach ($errors as $row):?>
						<div class="alert alert-danger"><?php echo $row;?></div>
					<?php endforeach;?>
				<?php endif;?>
				<input type="text" class="ggg" name="username" placeholder="Username .." required="" />
				<input type="password" class="ggg" name="password" placeholder="Password .." required="" />
				<div class="clearfix"></div>
				<input type="submit" value="Sign In" name="login">
			</form>
		</div>
	</div>
