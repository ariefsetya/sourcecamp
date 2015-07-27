<div class="on-phone no-tablet no-potrait-tablet no-desktop no-large" style="min-width:100%;">
	<form method="POST" action="<?php echo site_url();?>/search">
		<div class="input-control text">
			<input type="text" name="cari" placeholder="Search for softwares, projects or articles" data-transform="input-control"><button class="btn-search"></button>
		</div>
	</form>
<?php
$tag = $this->uri->segment(2);
$query;
$hasil;
if($tag=='browse'){
	echo "<legend>Browse Softwares</legend>";
	$query = $this->db->query('select*from sc_softwares');
	$hasil = $query->result_array();
	$this->db->query('delete from sc_listing');
	foreach ($hasil as $key) {
		$co = $this->db->query("select count(*) from sc_stat where id_software='".$key['id']."'");
		$hco = $co->row_array();
		$data['tgl'] = date("Y-m-d");
		$data['jam'] = date("H:i:s");
		$data['sum'] = $hco['count(*)'];
		$data['id_software'] = $key['id'];
		$this->db->insert('sc_listing',$data);
	}
	$query = $this->db->query('select*from sc_listing order by id asc');
	$hasil = $query->result_array();
	foreach ($hasil as $key) {
$qimg = $this->db->where('id_software',$key['id_software']);
$qimg = $this->db->get('sc_images');
$himg = $qimg->row_array();

$qsoft = $this->db->where('id',$key['id_software']);
$qsoft = $this->db->get('sc_softwares');
$hsoft = $qsoft->row_array();
?>
			<div class="listview">
                <a href="<?php echo site_url();?>/application/detail/<?php echo $key['id_software'];?>" class="list" style="width:100%">
                    <div class="list-content">
                        <img src="<?php echo base_url().'coverapp/'.$key['id_software'].$himg['gambar'];?>" class="icon">
                        <div class="data" style="width:80%">
                            <span class="list-title"><?php echo $hsoft['judul'];?></span>
                            <span class="list-subtitle"><?php echo $hsoft['review'];?></span>
                            <span class="list-remark"><?php if($hsoft['premium']=='1'){echo "<i class='icon-thumbs-up'></i> Featured";}?></span>
                        </div>
                    </div>
                </a>
            </div>
<?php
}
	
}
else if($tag=='featured'){
	echo "<legend>Featured Softwares</legend>";
	$query = $this->db->query('select*from sc_softwares where premium="1" order by rand()');
	$hasil = $query->result_array();
	foreach ($hasil as $key) {
		$qimg = $this->db->where('id_software',$key['id']);
		$qimg = $this->db->get('sc_images');
		$himg = $qimg->row_array();

		$qsoft = $this->db->where('id',$key['id']);
		$qsoft = $this->db->get('sc_softwares');
		$hsoft = $qsoft->row_array();
		?>
			<div class="listview">
                <a href="<?php echo site_url();?>/application/detail/<?php echo $key['id'];?>" class="list" style="width:100%">
                    <div class="list-content">
                        <img src="<?php echo base_url().'coverapp/'.$key['id'].$himg['gambar'];?>" class="icon">
                        <div class="data">
                            <span class="list-title"><?php echo $hsoft['judul'];?></span>
                            <span class="list-subtitle"><?php echo $hsoft['review'];?></span>
                            <span class="list-remark"><?php if($hsoft['premium']=='1'){echo "<i class='icon-thumbs-up'></i> Featured";}?></span>
                        </div>
                    </div>
                </a>
            </div>
<?php
}
}
else {
	echo "<legend>$tag Softwares</legend>";
	$query = $this->db->query('select*from sc_softwares where os="'.$tag.'" order by id desc');
	$hasil = $query->result_array();
	foreach ($hasil as $key) {
		$qimg = $this->db->where('id_software',$key['id']);
		$qimg = $this->db->get('sc_images');
		$himg = $qimg->row_array();

		$qsoft = $this->db->where('id',$key['id']);
		$qsoft = $this->db->get('sc_softwares');
		$hsoft = $qsoft->row_array();
		?>
			<div class="listview">
                <a href="<?php echo site_url();?>/application/detail/<?php echo $key['id'];?>" class="list" style="width:100%">
                    <div class="list-content">
                        <img src="<?php echo base_url().'coverapp/'.$key['id'].$himg['gambar'];?>" class="icon">
                        <div class="data">
                            <span class="list-title"><?php echo $hsoft['judul'];?></span>
                            <span class="list-subtitle"><?php echo $hsoft['review'];?></span>
                            <span class="list-remark"><?php if($hsoft['premium']=='1'){echo "<i class='icon-thumbs-up'></i> Featured";}?></span>
                        </div>
                    </div>
                </a>
            </div>
<?php
}
}


?>
</div>


<div class="no-phone on-tablet on-potrait-tablet on-desktop on-large span8" style="">
<?php
$tag = $this->uri->segment(2);
$query;
$hasil;
if($tag=='browse'){
	echo "<legend>Browse Softwares</legend>";
	$query = $this->db->query('select*from sc_softwares');
	$hasil = $query->result_array();
	$this->db->query('delete from sc_listing');
	foreach ($hasil as $key) {
		$co = $this->db->query("select count(*) from sc_stat where id_software='".$key['id']."'");
		$hco = $co->row_array();
		$data['tgl'] = date("Y-m-d");
		$data['jam'] = date("H:i:s");
		$data['sum'] = $hco['count(*)'];
		$data['id_software'] = $key['id'];
		$this->db->insert('sc_listing',$data);
	}
	$query = $this->db->query('select*from sc_listing order by id asc');
	$hasil = $query->result_array();
	foreach ($hasil as $key) {
$qimg = $this->db->where('id_software',$key['id_software']);
$qimg = $this->db->get('sc_images');
$himg = $qimg->row_array();

$qsoft = $this->db->where('id',$key['id_software']);
$qsoft = $this->db->get('sc_softwares');
$hsoft = $qsoft->row_array();
?>
			<div class="listview">
                <a href="<?php echo site_url();?>/application/detail/<?php echo $key['id_software'];?>" class="list" style="width:100%">
                    <div class="list-content">
                        <img src="<?php echo base_url().'coverapp/'.$key['id_software'].$himg['gambar'];?>" class="icon">
                        <div class="data" style="width:80%">
                            <span class="list-title"><?php echo $hsoft['judul'];?></span>
                            <span class="list-subtitle"><?php echo $hsoft['review'];?></span>
                            <span class="list-remark"><?php if($hsoft['premium']=='1'){echo "<i class='icon-thumbs-up'></i> Featured";}?></span>
                        </div>
                    </div>
                </a>
            </div>
<?php
}
	
}
else if($tag=='featured'){
	echo "<legend>Featured Softwares</legend>";
	$query = $this->db->query('select*from sc_softwares where premium="1" order by rand()');
	$hasil = $query->result_array();
	foreach ($hasil as $key) {
		$qimg = $this->db->where('id_software',$key['id']);
		$qimg = $this->db->get('sc_images');
		$himg = $qimg->row_array();

		$qsoft = $this->db->where('id',$key['id']);
		$qsoft = $this->db->get('sc_softwares');
		$hsoft = $qsoft->row_array();
		?>
			<div class="listview">
                <a href="<?php echo site_url();?>/application/detail/<?php echo $key['id'];?>" class="list" style="width:100%">
                    <div class="list-content">
                        <img src="<?php echo base_url().'coverapp/'.$key['id'].$himg['gambar'];?>" class="icon">
                        <div class="data">
                            <span class="list-title"><?php echo $hsoft['judul'];?></span>
                            <span class="list-subtitle"><?php echo $hsoft['review'];?></span>
                            <span class="list-remark"><?php if($hsoft['premium']=='1'){echo "<i class='icon-thumbs-up'></i> Featured";}?></span>
                        </div>
                    </div>
                </a>
            </div>
<?php
}
}
else{
	echo "<legend>$tag Softwares</legend>";
	$query = $this->db->query('select*from sc_softwares where os="'.$tag.'" order by id desc');
	$hasil = $query->result_array();
	foreach ($hasil as $key) {
		$qimg = $this->db->where('id_software',$key['id']);
		$qimg = $this->db->get('sc_images');
		$himg = $qimg->row_array();

		$qsoft = $this->db->where('id',$key['id']);
		$qsoft = $this->db->get('sc_softwares');
		$hsoft = $qsoft->row_array();
		?>
			<div class="listview">
                <a href="<?php echo site_url();?>/application/detail/<?php echo $key['id'];?>" class="list" style="width:100%">
                    <div class="list-content">
                        <img src="<?php echo base_url().'coverapp/'.$key['id'].$himg['gambar'];?>" class="icon">
                        <div class="data">
                            <span class="list-title"><?php echo $hsoft['judul'];?></span>
                            <span class="list-subtitle"><?php echo $hsoft['review'];?></span>
                            <span class="list-remark"><?php if($hsoft['premium']=='1'){echo "<i class='icon-thumbs-up'></i> Featured";}?></span>
                        </div>
                    </div>
                </a>
            </div>
<?php
}
}



?>
</div>