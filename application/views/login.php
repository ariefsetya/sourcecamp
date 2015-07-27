<div style="margin-left:auto;margin-right:auto;margin-top:100px;" class="span5">
<form method="POST" action="<?php echo site_url();?>/login/cek">
	<fieldset>
		<legend>Find more directory inside</legend>
		<label>Username</label>
		<input type="text" required data-transform="input-control" name="username">
		<label>Password</label>
		<input type="password" required data-transform="input-control" name="password">
		<div class="place-right">
			<button type="submit" class="bg-blue fg-white large">Sign In</button>
		</div>
	</fieldset>
</form>
</div>