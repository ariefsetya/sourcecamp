<div style="" class="span8">
<?php

$query = $this->db->query('SELECT * FROM sc_posts order by id desc');
$hasil = $query->result_array();

foreach ($hasil as $key) {
	?><div style="width:100%">
        <div class="">
        	<div class=""><legend><a href="<?php echo site_url();?>/article/detail/<?php echo $key['id'];?>"><?php echo $key['judul'];?></a></legend></div>
            <div class="panel-content">
            <?php echo $key['isi'];?>
            </div>
            <br/>
            <div class="list-subtitle"><?php echo "Posted on ".$key['tgl']." ".$key['jam'];?></div>
        </div>
    </div>
    <br>
	<?php
}
?>
</div>