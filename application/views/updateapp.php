<?php
$id = $this->uri->segment(3);
$qdata = $this->db->where('id',$id);
$qdata = $this->db->get('sc_softwares');
$hdata = $qdata->row_array();

$qimg = $this->db->where('id_software',$id);
$qimg = $this->db->get('sc_images');
$himg = $qimg->row_array();
?>
<div class="span8">
	<form method="POST" action="<?php echo site_url();?>/application/updateapp" enctype="multipart/form-data">
		<fieldset>
			<legend>Update a Software</legend>
			<label>Name</label>
			<input type="hidden" name="id" value="<?php echo $id;?>">
			<input type="text" name="judul" maxlength="100" value="<?php echo $hdata['judul'];?>" required placeholder="Application name..." data-transform="input-control">
			<label>Cover Image</label>
			<img class="inline-block" style="height:100px;" src="<?php echo base_url()."coverapp/".$id.$himg['gambar'];?>">
			<input type="file" name="cover" data-transform="input-control">
			<label>Zipped File</label>
			<label>Old File : <?php echo $hdata['packed_file'];?></label>
			<input type="file" name="packed" data-transform="input-control">
			<label>License</label>
			<input type="text" name="license" maxlength="100" value="<?php echo $hdata['license'];?>" required placeholder="Application License..." data-transform="input-control">
			<label>Operating System</label>
			<select type="text" name="os" required placeholder="Operating System..." data-transform="input-control">
				<option value="">Operating System...</option>
				<option <?php if($hdata['os']=="allsystem"){echo "selected";}?> value="allsystem">All System</option>
				<option <?php if($hdata['os']=="windows"){echo "selected";}?> value="windows">Windows</option>
				<option <?php if($hdata['os']=="tux"){echo "selected";}?> value="tux">Linux</option>
				<option <?php if($hdata['os']=="apple"){echo "selected";}?> value="apple">Apple</option>
				<option <?php if($hdata['os']=="android"){echo "selected";}?> value="android">Android</option>
			</select>
			<label>Review</label>
			<textarea type="text" required name="review" placeholder="Review..." data-transform="input-control"><?php echo $hdata['review'];?></textarea>
			<input type="checkbox" <?php if($hdata['premium']=="1"){echo "checked";}?> name="pv" data-transform="input-control">Suggest as Premium Software
			<div class="place-right">
				<button type="submit" class="large bg-blue fg-white">Update</button>
			</div>
		</fieldset>
	</form>
</div>