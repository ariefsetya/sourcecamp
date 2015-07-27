<?php
if($this->session->userdata('errno')=="username"){
?>
<br />
<div class="balloon top bg-red fg-white">
    <div class="padding10">
        <i class="icon-cancel"></i> Username was already registered. Please try again with different username.
    </div>
</div>
<form method="POST" action="<?php echo site_url();?>/join/simpan_user">
	<fieldset>
		<legend>Stay connected with us</legend>
		<table class="table">
			<tr>
				<td><label>First Name</label></td>
				<td><label>Last Name</label></td>
			</tr>
			<tr>
				<td><input type="text" name="firstname" value="<?php echo $this->session->userdata('firstname');?>" data-transform="input-control"></td>
				<td><input type="text" name="lastname" value="<?php echo $this->session->userdata('lastname');?>" data-transform="input-control"></td>
			</tr>
			<tr>
				<td><label>Username</label></td>
				<td><label>Password</label></td>
			</tr>
			<tr>
				<td><input type="text" name="username" data-state="error" value="<?php echo $this->session->userdata('username');?>" data-transform="input-control"></td>
				<td><input type="password" name="password" data-transform="input-control"></td>
			</tr>
			<tr>
				<td colspan=2>
					<div class="place-right"><button type="submit" class="bg-blue fg-white large">Register</button></div>
				</td>
			</tr>
		</table>
		

	</fieldset>
</form>
<?php
$this->session->set_userdata('username','');
$this->session->set_userdata('password','');
$this->session->set_userdata('firstname','');
$this->session->set_userdata('lastname','');
$this->session->set_userdata('errno','');
}
else{
?>
<form method="POST" action="<?php echo site_url();?>/join/simpan_user">
	<fieldset>
		<legend>Stay connected with us</legend>
		<table class="table">
			<tr>
				<td><label>First Name</label></td>
				<td><label>Last Name</label></td>
			</tr>
			<tr>
				<td><input type="text" name="firstname" data-transform="input-control"></td>
				<td><input type="text" name="lastname" data-transform="input-control"></td>
			</tr>
			<tr>
				<td><label>Username</label></td>
				<td><label>Password</label></td>
			</tr>
			<tr>
				<td><input type="text" name="username" data-transform="input-control"></td>
				<td><input type="password" name="password" data-transform="input-control"></td>
			</tr>
			<tr>
				<td colspan=2>
					<div class="place-right"><button type="submit" class="bg-blue fg-white large">Register</button></div>
				</td>
			</tr>
		</table>
		

	</fieldset>
</form>
<?php
}
?>