<div class="span8">
	<form method="POST" action="<?php echo site_url();?>/create/simpanproject" enctype="multipart/form-data">
		<fieldset>
			<legend>Create a Project</legend>
			<label>Name</label>
			<input type="text" name="nama" maxlength="100" required placeholder="Project name..." data-transform="input-control">
			<label>Version</label>
			<input type="text" name="versi" maxlength="32" required placeholder="Project version..." data-transform="input-control">
			<label>Cover Image</label>
			<input type="file" name="cover" required data-transform="input-control">
			<label>Zipped File</label>
			<input type="file" name="packed" required data-transform="input-control">
			<label>License</label>
			<input type="text" name="license" maxlength="100" required placeholder="Projcect License..." data-transform="input-control">
			<label>Operating System</label>
			<select type="text" name="os" required placeholder="Operating System..." data-transform="input-control">
				<option value="">Operating System...</option>
				<option value="allsystem">All System</option>
				<option value="windows">Windows</option>
				<option value="tux">Linux</option>
				<option value="apple">Apple</option>
				<option value="android">Android</option>
			</select>
			<label>Description</label>
			<textarea type="text" required name="deskripsi" placeholder="Description..." data-transform="input-control"></textarea>
			<input type="checkbox" name="ofe" data-transform="input-control">Open for Edit<br />
			<input type="checkbox" name="pv" data-transform="input-control">Protected View (Just Me)
			<div class="place-right">
				<button type="submit" class="large bg-blue fg-white">Save</button>
			</div>
		</fieldset>
	</form>
</div>