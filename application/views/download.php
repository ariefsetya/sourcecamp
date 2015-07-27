<?php
$tipe = $this->uri->segment(2);
$id = $this->uri->segment(3);
$nama = $this->uri->segment(4);
$query = $this->db->where('id',$id);
$query = $this->db->get('sc_updates');
$hasil = $query->row_array();
$data['tgl'] = date("Y-m-d");
$data['jam'] = date("H:i:s");
$data['ip']=$_SERVER['REMOTE_ADDR'];
if($tipe=="project"){

	$data['id_project']=$hasil['id_project'];
	$this->db->insert('sc_stat',$data);
	redirect(base_url().'packedfile/'.$id.'/'.$nama);
}
if($tipe=="software"){

	$data['id_software']=$hasil['id_software'];
	$this->db->insert('sc_stat',$data);
	redirect(base_url().'packedfileapp/'.$id.'/'.$nama);
}
if($tipe=="softwareandro"){ 
	$zip = new ZipArchive;
	$res = $zip->open('packedfileapp/'.$id.'/'.$nama);
	$zip->extractTo('packedfileapp/'.$id.'/');
	$zip->close();
        
	$data['id_software']=$hasil['id_software'];
	$nama = str_replace('.zip', '.apk',$nama);
	$this->db->insert('sc_stat',$data);
	redirect(base_url().'packedfileapp/'.$id.'/'.$nama);
}
?>