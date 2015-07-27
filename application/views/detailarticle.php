<?php
$id = $this->uri->segment(3);

$data['tgl'] = date("Y-m-d");
$data['jam'] = date("H:i:s");
$data['ip']=$_SERVER['REMOTE_ADDR'];
$data['id_article']=$id;
$this->db->insert('sc_stat',$data);

$qdata = $this->db->where('id',$id);
$qdata = $this->db->get('sc_posts');
$hdata = $qdata->row_array();
?>
<div class="span8">
	<legend><b><?php echo $hdata['judul'];?></b></legend>
	<pre style="font-family:Segoe UI Light;"><?php echo $hdata['isi'];?></pre>
	<span class="small">Posted on <?php echo $hdata['tgl']." ".$hdata['jam'];?></span>
</div>