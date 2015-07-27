<?php
$id = $this->uri->segment(3);
$query=$this->db->where('id',$id);
$query=$this->db->get('sc_softwares');
$hasil = $query->row_array();

?>
<div class="span8">
	<form method="POST" action="<?php echo site_url();?>/application/upgradeapp" enctype="multipart/form-data">
		<fieldset>
			<legend>Upgrade a Software</legend>
			<label>Name</label>
			<input type="text" disabled name="nama" maxlength="100" value="<?php echo $hasil['judul'];?>" required placeholder="Project name..." data-transform="input-control">
			<input type="hidden" name="id" maxlength="100" value="<?php echo $hasil['id'];?>" required>
			<label>New Version</label>
			<input type="hidden" name="id" value="<?php echo $this->uri->segment(3);?>">
			<input type="text" name="versi" maxlength="32" value="" required placeholder="Software version..." data-transform="input-control">
			<label>New Zipped File</label>
			<input type="file" required name="packed" data-transform="input-control">
			<label>Change Log</label>
			<textarea type="text" required name="changelog" placeholder="Change Log..." data-transform="input-control"></textarea>
			<div class="place-right">
				<button type="submit" class="large bg-blue fg-white">Upgrade</button>
			</div>
		</fieldset>
	</form>
</div>