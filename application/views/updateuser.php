<?php
$id = $this->session->userdata('id');
$query = $this->db->where('id',$this->session->userdata('id'));
$query = $this->db->get('sc_users');
$hasil = $query->row_array();

$query1 = $this->db->where('id_user',$this->session->userdata('id'));
$query1 = $this->db->get('sc_images');
$hasil1 = $query1->row_array();
?>
<div class="span8">
<form method="POST" action="<?php echo site_url();?>/update/set_update" enctype="multipart/form-data">
	<fieldset>
		<legend>Update your profile</legend>
		<label>Display Picture</label>
		<img class="inline-block" style="height:100px;" src="<?php echo base_url()."foto/".$id.$hasil1['gambar'];?>">
		<input class="inline-block" data-transform="input-control" type="file" name="foto" value="">
		<label>Gender</label>
		<select data-transform="input-control" type="text" name="jenis_kelamin" required>
			<option value="">Gender</option>
			<option <?php if($hasil['jenis_kelamin']=="Male"){echo "selected";};?> value="Male">Male</option>
			<option <?php if($hasil['jenis_kelamin']=="Female"){echo "selected";};?> value="Female">Female</option>
			<option <?php if($hasil['jenis_kelamin']=="Unknown"){echo "selected";};?> value="Unknown">Unknown</option>
		</select>
		<label>Birth Place</label>
		<input data-transform="input-control" type="text" value="<?php echo $hasil['tempat_lahir'];?>" name="tempat_lahir" required>
		<label>Birth Date</label>
		<input class="input-control text" type="date" value="<?php echo $hasil['tanggal_lahir'];?>" name="tanggal_lahir" required>
		<label>Phone</label>
		<input data-transform="input-control" type="text" value="<?php echo $hasil['contact'];?>" name="contact" required>
		<label>E-Mail</label>
		<input data-transform="input-control" type="text" value="<?php echo $hasil['email'];?>" name="email" required>
		<label>Facebook</label>
		<input data-transform="input-control" type="text" value="<?php echo $hasil['facebook'];?>" name="facebook" >
		<label>Twitter</label>
		<input data-transform="input-control" type="text" value="<?php echo $hasil['twitter'];?>" name="twitter" >
		<label>Work</label>
		<input data-transform="input-control" type="text" value="<?php echo $hasil['pekerjaan'];?>" name="pekerjaan" required>
		<label>Company</label>
		<input data-transform="input-control" type="text" value="<?php echo $hasil['perusahaan'];?>" name="perusahaan" required>
		<label>About Me</label>
		<textarea data-transform="input-control" type="text" name="deskripsi" required><?php echo $hasil['deskripsi'];?></textarea>
		<label>Alamat</label>
		<textarea data-transform="input-control" type="text" name="alamat" required><?php echo $hasil['alamat'];?></textarea>
		<div class="place-right">
			<button type="submit" class="large bg-blue fg-white">Update</button>
		</div>
	</fieldset>
</form>
</div>