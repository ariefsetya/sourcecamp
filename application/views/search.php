<div class="span8">
<?php
$cari = $this->session->userdata('cari');
echo "<h2>Search result for ".'"'.$cari.'"'."</h2>";
echo "<h4>Softwares</h4>";
foreach ($hasil as $key) {
	$rev = str_replace($cari, "<span class='bg-lightTeal'>$cari</span>", $key['review']);
	$judul = str_replace($cari, "<span class='bg-lightTeal'>$cari</span>", $key['judul']);
	echo " <div class='listview-outlook'>
			    <a href='".site_url()."/application/detail/$key[id]' class='list'>
			        <div class='list-content'>
			        	<span class='list-title'>$judul</span>
			        	<span class='list-subtitle'>$rev</span>
			        </div>
			    </a>
			</div>";
	
	}
	if(empty($hasil)||empty($cari)){
		echo "Keyword not found";
	}

	
$search = htmlentities($this->input->post('cari'));
if(empty($search)){
	$hasil['hasil'] = "Keyword not found";
	goto lompat;
}
$query = $this->db->like('nama',$cari);
$query = $this->db->where('protected !=','1');
$query = $this->db->or_like('deskripsi',$cari);
$query = $this->db->get('sc_project');
$hasil = $query->result_array(); 
lompat:
echo "<h4>Projects</h4>";
foreach ($hasil as $key) {
	$rev = str_replace($cari, "<span class='bg-lightTeal'>$cari</span>", $key['deskripsi']);
	$app = str_replace($cari, "<span class='bg-lightTeal'>$cari</span>", $key['appname']);
	$judul = str_replace($cari, "<span class='bg-lightTeal'>$cari</span>", $key['nama']);
	echo " <div class='listview-outlook'>
			    <a href='".site_url()."/project/detail/$key[id]' class='list'>
			        <div class='list-content'>
			        	<span class='list-title'>$judul</span>
			        	<span class='remark'>$app</span>
			        	<span class='list-subtitle'>$rev</span>
			        </div>
			    </a>
			</div>";
	
	}
	if(empty($hasil)||empty($cari)){
		echo "Keyword not found";
	}


$search = htmlentities($this->input->post('cari'));
if(empty($search)){
	$hasil['hasil'] = "Keyword not found";
	goto loncat;
}
$query = $this->db->like('judul',$cari);
$query = $this->db->or_like('isi',$cari);
$query = $this->db->get('sc_posts');
$hasil = $query->result_array(); 
loncat:
echo "<h4>Articles</h4>";
foreach ($hasil as $key) {
	$rev = str_replace($cari, "<span class='bg-lightTeal'>$cari</span>", $key['isi']);
	$judul = str_replace($cari, "<span class='bg-lightTeal'>$cari</span>", $key['judul']);
	echo " <div class='listview-outlook'>
			    <a href='".site_url()."/article/detail/$key[id]' class='list'>
			        <div class='list-content'>
			        	<span class='list-title'>$judul</span>
			        	<span class='list-subtitle'>$rev</span>
			        </div>
			    </a>
			</div>";
	
	}
	if(empty($hasil)||empty($cari)){
		echo "Keyword not found";
	}


$this->session->set_userdata('cari','');
?>
</div>