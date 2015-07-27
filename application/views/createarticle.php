<div class="span8">
	<form method="POST" action="<?php echo site_url();?>/create/simpanarticle" enctype="multipart/form-data">
		<fieldset>
			<legend>Write your own Article</legend>
			<label>Title</label>
			<input type="text" name="judul" maxlength="100" required placeholder="Article title..." data-transform="input-control">
			<label>Article</label>
			<textarea type="text" style="height:500px;" required name="isi" placeholder="Article..." data-transform="input-control"></textarea>
			<label>Tags</label>
			<input type="text" name="tags" maxlength="100" required placeholder="Tags, example : C++, Computer, Software..." data-transform="input-control">
			<div class="place-right">
				<button type="submit" class="large bg-blue fg-white">Save</button>
			</div>
		</fieldset>
	</form>
</div>