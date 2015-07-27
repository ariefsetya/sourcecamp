<?php
$id = $this->uri->segment(3);
$query = $this->db->where('id',$id);
$query = $this->db->get('sc_posts');
$hasil = $query->row_array();
?>
<div class="span8">
	<form method="POST" action="<?php echo site_url();?>/article/updatearticle" enctype="multipart/form-data">
		<fieldset>
			<legend>Update an Article</legend>
			<label>Title</label>
			<input type="hidden" value="<?php echo $id;?>" name="id">
			<input type="text" value="<?php echo $hasil['isi'];?>" name="judul" maxlength="100" required placeholder="Article title..." data-transform="input-control">
			<label>Article</label>
			<textarea type="text" style="height:500px;" required name="isi" placeholder="Article..." data-transform="input-control"><?php echo $hasil['isi'];?></textarea>
			<label>Tags</label>
			<input type="text" value="<?php echo $hasil['tags'];?>" name="tags" maxlength="100" required placeholder="Tags, example : C++, Computer, Software..." data-transform="input-control">
			<div class="place-right">
				<button type="submit" class="large bg-blue fg-white">Update</button>
			</div>
		</fieldset>
	</form>
</div>