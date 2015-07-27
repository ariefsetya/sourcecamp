<div class="span8">
<?php
$query = $this->db->query('select*from sc_updates where id_software !="0" order by id desc limit 0,1');
$hasil = $query->row_array();
$query2 = $this->db->query('select*from sc_softwares where id="'.$hasil['id_software'].'"');
$hasil2 = $query2->row_array();
$query3 = $this->db->query('select*from sc_images where id_software="'.$hasil['id_software'].'"');
$hasil3 = $query3->row_array();
?>
<legend>Newest Update Software</legend>
<div style="width:100%;" class="listview">
	<a href="<?php echo site_url();?>/application/detail/<?php echo $hasil['id_software'];?>" class="list" style="width:100%">
        <div class="list-content">
            <img src="<?php echo base_url().'coverapp/'.$hasil['id_software'].$hasil3['gambar'];?>" class="icon">
            <div class="data" style="width:80%">
                <span class="list-title"><?php echo $hasil2['judul'];?></span>
                <span class="list-subtitle"><?php echo $hasil2['review'];?></span>
                <span class="list-remark"><?php if($hasil2['premium']=='1'){echo "<i class='icon-thumbs-up'></i> Featured";}?></span>
            </div>
        </div>
    </a>
</div>
<?php
awal:
$no = 0;
$query = $this->db->query('select*from sc_updates where id_project !="0" order by id desc limit '.$no.',1');
$hasil = $query->row_array();
$query2 = $this->db->query('select*from sc_project where id="'.$hasil['id_project'].'"');
$hasil2 = $query2->row_array();
if($hasil['protected']==1){
	$no++;
	goto awal;
}
$query3 = $this->db->query('select*from sc_images where id_project="'.$hasil['id_project'].'"');
$hasil3 = $query3->row_array();
?>
<legend>Newest Update Project</legend>
<div style="width:100%;" class="listview">
	<a href="<?php echo site_url();?>/project/detail/<?php echo $hasil['id_project'];?>" class="list" style="width:100%">
        <div class="list-content">
            <img src="<?php echo base_url().'cover/'.$hasil['id_project'].$hasil3['gambar'];?>" class="icon">
            <div class="data" style="width:80%">
                <span class="list-title"><?php echo $hasil2['nama'];?></span>
                <span class="list-subtitle"><?php echo $hasil2['deskripsi'];?></span>
            </div>
        </div>
    </a>
</div>
<?php
$query = $this->db->query('select*from sc_posts order by id desc limit 0,5');
$hasil = $query->result_array();
?>
<legend>Newest Update Articles</legend>
<?php
foreach ($hasil as $key) {
$query2 = $this->db->query('select*from sc_users where id ="'.$key['id_user'].'"');
$hasil2 = $query2->row_array();
$query3 = $this->db->query('select*from sc_images where id_user ="'.$key['id_user'].'"');
$hasil3 = $query3->row_array();

?>
<div style="width:100%;" class="listview">
	<a href="<?php echo site_url();?>/article/detail/<?php echo $key['id'];?>" class="list" style="width:100%">
        <div class="list-content">
            <img src="<?php echo base_url().'foto/'.$key['id_user'].$hasil3['gambar'];?>" class="icon">
            <div class="data" style="width:80%">
                <span class="list-title"><?php echo $key['judul'];?></span>
                <span class="list-subtitle"><?php echo $key['isi'];?></span>    
            </div>
        </div>
    </a>
</div>
<?php
}
?>

</div>