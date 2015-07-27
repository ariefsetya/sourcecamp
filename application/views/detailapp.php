<?php 

$id = $this->uri->segment(3);
$query = $this->db->where('id',$id);
$query = $this->db->get('sc_softwares');
$hasil = $query->row_array();

$querycomment = $this->db->where('id_software',$id);
$querycomment = $this->db->get('sc_comments');
$hasilcom = $querycomment->result_array();

$data['tgl'] = date("Y-m-d");
$data['jam'] = date("H:i:s");
$data['ip']=$_SERVER['REMOTE_ADDR'];
$data['id_software']=$id;
$this->db->insert('sc_stat',$data);

$query1 = $this->db->where('id_user',$hasil['id_user']);
$query1 = $this->db->get('sc_images');
$hasil1 = $query1->row_array();

$query3 = $this->db->where('id_software',$id);
$query3 = $this->db->get('sc_images');
$hasil3 = $query3->row_array();

$query2 = $this->db->where('id',$hasil['id_user']);
$query2 = $this->db->get('sc_users');
$hasil2 = $query2->row_array();

$qhis = $this->db->where('id_software',$id);
$qhis = $this->db->get('sc_updates');
$hhis = $qhis->result_array();

$qcur = $this->db->query('select*from sc_updates where id_software='.$id.' order by id desc limit 0,1');
$hcur = $qcur->row_array();

$link = $id;
?>
<div class="no-phone on-tablet on-tablet-potrait on-desktop on-large span8" style="">
	<h2><?php echo $hasil['judul'];?></h2>
	<div class="tab-control" data-role="tab-control">
	    <ul class="tabs">
	        <li class="active"><a href="#_page__1">Specification</a></li>
	        <li class="no-phone"><a href="#_page__2">Screenshot</a></li>
	        <li class="no-phone"><a href="#_page__3">Files</a></li>
	        <li class="no-phone"><a href="#_page__4">Change Log</a></li>
	        <li class="no-phone"><a href="#_page__5">Comments</a></li>
	        <li class=""><a href="#_page__6"><i class="icon-user"></i> Programmer</a></li>
	    </ul>

	    <div class="frames">
	        <div class="frame" id="_page__1" style="display: block;">
	            <table>
	            	<tr>
	            		<td><h4>Preview</h4><img style="height:200px;" src="<?php echo base_url()."coverapp/".$id.$hasil3['gambar'];?>"></td>
	            	</tr>
	            	<tr>
	            		<td><h4>Project ID</h4><?php echo $hasil['appname'];?></td>
	            	</tr>
	            	<tr>
	            		<td><h4>License</h4><?php echo $hasil['license'];?></td>
	            	</tr>
	            	<tr>
	            		<td><h4>Operating System</h4><?php echo $hasil['os'];?></td>
	            	</tr>
	            	<tr>
	            		<td><h4>Review</h4><?php echo $hasil['review'];?></td>
	            	</tr>
	            </table>
	        </div>
	        <div class="frame" id="_page__2" style="display: none;">
	            <p><img src="<?php echo base_url()."coverapp/".$id.$hasil3['gambar'];?>"></p>
	        </div>
			<div class="frame" id="_page__3" style="display: none;">
	            <h4>Newest Version</h4>
	            <a data-hint="Download|You can download <?php echo $hasil['packed_file'];?> here" href="<?php echo site_url();?>/download/software/<?php echo $hcur[id];?>/<?php echo $hcur['packed_file'];?>"><?php echo $hcur['versi']." ".$hcur['packed_file'];?></a>
	        	<br />
	        	<h4>Previous Versions</h4>
	        	<?php
	        	foreach ($hhis as $key) {

	        		?>
					<a data-hint="Download|You can download <?php echo $key['versi']." ".$key['packed_file'];?> here" href="<?php echo site_url();?>/download/software/<?php echo $key[id];?>/<?php echo $key['packed_file'];?>"><?php echo $key['versi']." ".$key['packed_file'];?></a><br />
	        		<?php
	        	}
	        	?>
	        	<br />
	        </div>
	        <div class="frame" id="_page__4" style="display: none;">
	            <?php
	            $qlog = $this->db->query("select*from sc_updates where id_software='".$id."' order by id asc");
	            $hlog = $qlog->result_array();
	            ?>
	            <pre><?php foreach ($hlog as $key) {
	            		echo "Change log ".$key['versi']."<br />";
	            		echo $key['change_log']."<br />";	
	            	}
	            	?></pre>
	        </div>
	        <div class="frame" id="_page__5" style="display: none;">
	            <div class="tab-control" data-role="tab-control">
                    <ul class="tabs">
                        <li class="active"><a href="#preview">All Comments</a></li>
                        <li class=""><a href="#write">Write</a></li>
                    </ul>

                    <div class="frames">
                        <div id="write" class="frame" style="display: block;">
                        	<form method="POST" action="<?php echo site_url();?>/application/simpan_komen">
                            <div class="input-control textarea">
                            	<input type="hidden" name="id" value="<?php echo $id;?>">
                            	<textarea data-transform="input-control" name="komen" placeholder="leave a comment"></textarea>
	                            <div class="place-right">
	                            	<br>
	                            	<button type="submit" class="large bg-blue fg-white">Post</button>
	                            </div>
                        	</div>
                        	</form>
                        </div>
                        <div id="preview" class="frame" style="display: none;">
                           	<div class="listview">
	                            <?php
	                            foreach ($hasilcom as $key) {
	                            	$quser = $this->db->where('id',$key['id_user']);
	                            	$quser = $this->db->get('sc_users');
	                            	$huser = $quser->row_array();

	                            	$quser1 = $this->db->where('id_user',$key['id_user']);
	                            	$quser1 = $this->db->get('sc_images');
	                            	$huser1 = $quser1->row_array();
	                            	?>
	                            	<a href="" class="list" style="width:100%">
					                    <div class="list-content">
					                        <img src="<?php echo base_url()."foto/".$huser1['gambar'];?>" class="icon">
					                        <div class="data">
					                            <span class="list-title"><?php echo $huser['nama_depan']." ".$huser['nama_belakang'];?></span>
					                            <span class="list-subtitle" style="spacing:no-spacing;line-height:1;"><?php echo $key['isi'];?></span>
					                            <span class="list-remark"><?php echo $key['tgl']." ".$key['jam'];?></span>
					                        </div>
					                    </div>
					                </a>

	                            	<?php
	                    		}
	                    		if(empty($hasilcom)){
	                            		echo "<h2>No comments yet</h2>";
	                            	}
	                            ?>
	                        </div>
                        </div>
                    </div>
                </div>
	        </div>
	        <div class="frame" id="_page__6" style="display: none;">
	        	<table class="table no-phone">
	        		<tr>
	        			<td style="width:120px;"><img style="width:100px;height:100px;" src="<?php echo base_url()."foto/".$hasil2[id].$hasil1[gambar];?>"></td>
	        			<td><?php echo $hasil2['nama_depan']." ".$hasil2['nama_belakang'];?></td>
	        		</tr>
	        	</table>
	            <div class="container on-phone no-tablet no-potrait-tablet no-desktop no-large">
		            <div class=""><img style="width:100px;height:100px;" src="<?php echo base_url()."foto/".$hasil2[id].$hasil1[gambar];?>"></div>
		            <h4><?php echo $hasil2['nama_depan']." ".$hasil2['nama_belakang'];?></h4>
	        	</div>
	        </div>
	    </div>

	</div>
</div>

<div class="on-phone no-tablet no-potrait-tablet no-desktop no-large" style="width:100%;">
	<h2><?php echo $hasil['judul'];?></h2>
	<div class="tab-control" data-role="tab-control">
	    <ul class="tabs">
	        <li class="active"><a href="#_page_1">Specification</a></li>
	        <li class=""><a href="#_page_6"><i class="icon-user"></i> Programmer</a></li>
	    </ul>

	    <div class="frames">
	        <div class="frame" id="_page_1" style="display: block;">
	            <table>
	            	<tr>
	            		<td><h4>Preview</h4><img style="height:200px;" src="<?php echo base_url()."coverapp/".$id.$hasil3['gambar'];?>"></td>
	            	</tr>
	            	<tr>
	            		<td><h4>Project ID</h4><?php echo $hasil['appname'];?></td>
	            	</tr>
	            	<tr>
	            		<td><h4>License</h4><?php echo $hasil['license'];?></td>
	            	</tr>
	            	<tr>
	            		<td><h4>Operating System</h4><?php echo $hasil['os'];?></td>
	            	</tr>
	            	<tr>
	            		<td><h4>Review</h4><?php echo $hasil['review'];?></td>
	            	</tr>
	            </table>
	            <?php if($hasil['os']=="android"){
	            	?>
	            	<br>
	            	Download Latest Version<br>
	            	<a data-hint-position="top" data-hint="Download|You can download <?php echo $hasil['packed_file'];?> here" href="<?php echo site_url();?>/download/softwareandro/<?php echo $hcur[id];?>/<?php echo $hcur['packed_file'];?>"><?php echo $hcur['versi']." ".$hcur['packed_file'];?></a>
	            	<?php
	            }
	            ?>
	        </div>
	        <div class="frame" id="_page_6" style="display: none;">
	        	<table class="table no-phone">
	        		<tr>
	        			<td style="width:120px;"><img style="width:100px;height:100px;" src="<?php echo base_url()."foto/".$hasil2[id].$hasil1[gambar];?>"></td>
	        			<td><?php echo $hasil2['nama_depan']." ".$hasil2['nama_belakang'];?></td>
	        		</tr>
	        	</table>
	            <div class="container on-phone no-tablet no-potrait-tablet no-desktop no-large">
		            <div class=""><img style="width:100px;height:100px;" src="<?php echo base_url()."foto/".$hasil2[id].$hasil1[gambar];?>"></div>
		            <h4><?php echo $hasil2['nama_depan']." ".$hasil2['nama_belakang'];?></h4>
	        	</div>
	        </div>
	    </div>

	</div>
</div>