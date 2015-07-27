<?php
$_SESSION['status']=$this->session->userdata('status');
?>
<div class="navigation-bar fixed-top dark">
    <div class="navigation-bar-content container">
        <a href="" class="element"><span class=""><i class="icon-home"></i></span></a>
        <a class="element1 pull-menu" href="<?php echo site_url();?>/home"></a>

        <ul class="element-menu">
            <li><a href="<?php echo site_url();?>/home"><i class="icon-console"></i> SourceCamp</a></li>
            <li>
                <span class="element-divider"></span>
            </li>
            <li class="no-phone no-tablet-potrait">
                <div class="no-phone no-tablet-potrait element input-element">
                    <form method="POST" action="<?php echo site_url();?>/search">
                        <div class="input-control text">
                            <input type="text" name="cari" placeholder="Search...">
                            <button class="btn-search"></button>
                        </div>
                    </form>
                </div>
            </li>
            <li>
                <span class="element-divider"></span>
            </li>
            <li>
                <a href="<?php echo site_url();?>/search/browse"><i class="icon-folder-2"></i> Browse</a>
            </li>
            <li>
                <a href="<?php echo site_url();?>/search/featured"><i class="icon-star-3"></i> Featured</a>
            </li>
            <li>
                <a href="<?php echo site_url();?>/article"><i class="icon-file-4"></i> Article</a>
            </li>
        </ul>
        <?php if($_SESSION['status']==""){
        ?>
                <ul class="element-menu no-phone no-potrait-tablet place-right">
                    <li><a href="<?php echo site_url();?>/login"><i class="icon-enter"></i> Sign In</a></li>
                    <li><a href="<?php echo site_url();?>/join"><i class="icon-plus"></i> Join</a></li>
                </ul>
        <?php
        }
        if($_SESSION['status']!=""){ 
            $query = $this->db->where('id_user',$this->session->userdata('id'));
            $query = $this->db->get('sc_images');
            $hasil = $query->row_array();
            ?>
            <ul class="element-menu place-right no-potrait-tablet no-phone">
            <li class="no-phone no-potrait-tablet">
                <a href="<?php echo site_url();?>/update/" class="no-phone element image-button image-left place-right">
                    Arief Setya
                    <img src="<?php echo base_url().'/foto/'.$this->session->userdata('id').$hasil['gambar'];?>"/>
                </a>

            </li>
            <li class="element-menu no-phone no-potrait-tablet">
                <a href="<?php echo site_url();?>/logout"><i class="icon-exit"></i> Sign Out</a>
            </li>
        </ul>

           

            <?php }?>

    </div>
</div>

