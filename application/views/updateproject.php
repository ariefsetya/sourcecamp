<?php
$id = $this->uri->segment(3);
$query=$this->db->where('id',$id);
$query=$this->db->get('sc_project');
$hasil = $query->row_array();


$qimg = $this->db->where('id_project',$id);
$qimg = $this->db->get('sc_images');
$himg = $qimg->row_array();
?>
<div class="span8">
	<form method="POST" action="<?php echo site_url();?>/project/updateproject" enctype="multipart/form-data">
		<fieldset>
			<legend>Update a Project</legend>
			<label>Name</label>
			<input type="text" name="nama" maxlength="100" value="<?php echo $hasil['nama'];?>" required placeholder="Project name..." data-transform="input-control">
			<input type="hidden" name="id" maxlength="100" value="<?php echo $hasil['id'];?>" required>
			<label>License</label>
			<input type="text" name="license" maxlength="100" required value="<?php echo $hasil['license'];?>" placeholder="Projcect License..." data-transform="input-control">
			<label>Cover Image</label>
			<img class="inline-block" style="height:100px;" src="<?php echo base_url()."cover/".$id.$himg['gambar'];?>">
			<input type="file" name="cover" data-transform="input-control">
			<label>Operating System</label>
			<select type="text" name="os" required placeholder="Operating System..." data-transform="input-control">
				<option value="">Operating System...</option>
				<option <?php if($hasil['os']=="allsystem"){echo "selected";}?> value="allsystem">All System</option>
				<option <?php if($hasil['os']=="windows"){echo "selected";}?> value="windows">Windows</option>
				<option <?php if($hasil['os']=="tux"){echo "selected";}?> value="tux">Linux</option>
				<option <?php if($hasil['os']=="apple"){echo "selected";}?> value="apple">Apple</option>
				<option <?php if($hasil['os']=="android"){echo "selected";}?> value="android">Android</option>
			</select>
			<label>Description</label>
			<textarea type="text" required name="deskripsi" placeholder="Description..." data-transform="input-control"><?php echo $hasil['deskripsi'];?></textarea>
			<div class="place-right">
				<button type="submit" class="large bg-blue fg-white">Update</button>
			</div>
		</fieldset>
	</form>
</div>