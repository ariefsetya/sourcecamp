<div class="span8" style="width:100%;">
<div class="tab-control" data-role="tab-control">
                <ul class="tabs">
                    <li class="active"><a href="#tab_home"><i class="icon-new"></i> PROJECT</a></li>
                    <li><a href="#tab_mailings"><i class="icon-screen"></i> SOFTWARE</a></li>
                    <li><a href="#tab_folder"><i class="icon-clipboard-2"></i> ARTICLE</a></li>
                </ul>

                <div class="frames">
                    <div class="frame" id="tab_home" style="display: block;">
                            <table class="table hovered">
                                <thead>
                                    <th>No</th>
                                    <th style="max-width:150px;" data-hint-position="top" data-hint="Project Name|Your project name.">Project Name</th>
                                    <th data-hint-position="top" data-hint="Project Version|Your project version.">Project Version</th>
                                    <th data-hint-position="top" data-hint="Operating System|Your project compatible operating system.">OS</th>
                                    <th data-hint-position="top" data-hint="Open for Edit|Your project is open source.">OFE</th>
                                    <th data-hint-position="top" data-hint="Protected View|Your project privacy."><i class="icon-locked-2"></i></th>
                                    <th colspan="4">Action</th>
                                </thead>
                                <?php
                                $no = 1;
                                $id = $this->session->userdata('id');
                                $query = $this->db->where('id_user',$id);
                                $query = $this->db->get('sc_project');
                                $hasil = $query->result_array();
                                foreach ($hasil as $key) {
                                ?>
                                <tbody>
                                    <td><?php echo $no;?></td>
                                    <td><?php echo $key['nama'];?></td>
                                    <td><?php echo $key['versi'];?></td>
                                    <td><?php echo $key['os'];?></td>
                                    <td><?php if($key['open_for_edit']==0){echo "<i class='icon-thumbs-down'></i>";} else if($key['open_for_edit']==1){echo "<i class='icon-thumbs-up'></i>";}?></td>
                                    <td><?php if($key['protected']==0){echo "<i class='icon-thumbs-down'></i>";} else if($key['protected']==1){echo "<i class='icon-thumbs-up'></i>";}?></td>
                                    <td><a href="<?php echo site_url()."/project/detail/".$key['id'];?>"> Detail</a></td>
                                    <td><a href="<?php echo site_url()."/project/update/".$key['id'];?>"> Update</a></td>
                                    <td><a href="<?php echo site_url()."/project/upgrade/".$key['id'];?>"> Upgrade</a></td>
                                    <td><a onclick="return confirm('Are you sure to delete <?php echo $key[nama];?>?')" href="<?php echo site_url()."/project/delete/".$key['id'];?>"> Delete</a></td>
                                </tbody>
                                <?php
                                $no++;
                                }
                                ?>
                            </table>
                    </div>

                    <div class="frame" id="tab_mailings" style="display: none;">
                        <table class="table hovered">
                            <thead>
                                <th>No</th>
                                <th style="max-width:150px;" data-hint-position="top" data-hint="Application Name|Your application name.">Application Name</th>
                                <th data-hint-position="top" data-hint="Operating System|Your application compatible operating system.">OS</th>
                                <th colspan="4">Action</th>
                            </thead>
                            <?php
                            $no = 1;
                            $id = $this->session->userdata('id');
                            $query = $this->db->where('id_user',$id);
                            $query = $this->db->get('sc_softwares');
                            $hasil = $query->result_array();
                            foreach ($hasil as $key) {
                            ?>
                            <tbody>
                                <td><?php echo $no;?></td>
                                <td><?php echo $key['judul'];?></td>
                                <td><?php echo $key['os'];?></td>
                                <td><a href="<?php echo site_url()."/application/detail/".$key['id'];?>"> Detail</a></td>
                                <td><a href="<?php echo site_url()."/application/update/".$key['id'];?>"> Update</a></td>
                                <td><a href="<?php echo site_url()."/application/upgrade/".$key['id'];?>"> Upgrade</a></td>
                                <td><a onclick="return confirm('Are you sure to delete <?php echo $key[judul];?>?')" href="<?php echo site_url()."/application/delete/".$key['id'];?>"> Delete</a></td>
                            </tbody>
                            <?php
                            $no++;
                            }
                            ?>
                        </table>
                    </div>

                    <div class="frame" id="tab_folder" style="display: none;">
                        <table class="table hovered">
                            <thead>
                                <th>No</th>
                                <th style="max-width:150px;" data-hint-position="top" data-hint="Title|Your article title.">Title</th>
                                <th colspan="3">Action</th>
                            </thead>
                            <?php
                            $no = 1;
                            $id = $this->session->userdata('id');
                            $query = $this->db->where('id_user',$id);
                            $query = $this->db->get('sc_posts');
                            $hasil = $query->result_array();
                            foreach ($hasil as $key) {
                            ?>
                            <tbody>
                                <td><?php echo $no;?></td>
                                <td><?php echo $key['judul'];?></td>
                                <td><a href="<?php echo site_url()."/article/detail/".$key['id'];?>"> Detail</a></td>
                                <td><a href="<?php echo site_url()."/article/update/".$key['id'];?>"> Update</a></td>
                                <td><a onclick="return confirm('Are you sure to delete <?php echo $key[judul];?>?')" href="<?php echo site_url()."/article/delete/".$key['id'];?>"> Delete</a></td>
                            </tbody>
                            <?php
                            $no++;
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>