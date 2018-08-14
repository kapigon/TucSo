<?php
$uri = $this->uri->uri_string();

$buddhas = '';
$tra_tu = '';
$danh_gia_tu = '';
$lien_he = '';
$danh_sach_user_cho_duyet = '';
$tthem_vi_phat = '';
$thong_tin_nguoi_dung = '';
$dang_ky = '';
$dang_nhap = '';
$active = 'active';

if($uri == 'Buddhas'){
    $buddhas = $active;
}
else if($uri == 'tra-tu'){
    $tra_tu = $active;
}else if($uri == 'danh-gia-tu' || $uri == 'tu-cho-duyet'){
    $danh_gia_tu = $active;
}else if($uri == 'lien-he'){
    $lien_he = $active;
}else if($uri == 'danh-sach-user-cho-duyet'){
    $danh_sach_user_cho_duyet = $active;
}else if($uri == 'them-vi-phat'){
    $tthem_vi_phat = $active;
}else if($uri == 'thong-tin-nguoi-dung'){
    $thong_tin_nguoi_dung = $active;
}else if($uri == 'dang-ky'){
    $dang_ky = $active;
}else if($uri == 'dang-nhap'){
    $dang_nhap = $active;
}

$this->session->userdata('username');


?>
<div class="row" style="margin-bottom: 25px;">
    <div class="span12">
        <nav class="navbar navbar-inverse navbar-expand-lg">
            <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo base_url();?>">Midrolling</a>
                 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
              </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav">
                    <li class="<?php echo $tra_tu;?>"><a href="<?php echo base_url();?>about">About</a></li>
                    <li class="<?php echo $tra_tu;?>"><a href="<?php echo base_url();?>posts">Post</a></li>

                  <?php if($this->session->userdata('logged_in')){ ?>
                      <li><a href="<?php echo base_url();?>favorites">Favorite</a></li>
                      <!--<li class="<?php echo $danh_sach_user_cho_duyet;?>"><a href="<?php echo base_url();?>danh-sach-user-cho-duyet">User chờ duyệt</a></li>-->
                      <li class="<?php echo $buddhas;?>"><a href="<?php echo base_url();?>Buddhas"><span class="glyphicon glyphicon-book"></span> Buddhas</a></li>
                  <?php }
                  ?>
                  </ul>

                  <ul class="nav navbar-nav navbar-right">
                      <?php
                      if($this->session->userdata('logged_in')){ ?>
                          <?php if($this->session->userdata('user_role') == 1){ ?>
                                  <li><a href="<?php echo base_url();?>Buddhas/create"><span class="glyphicon glyphicon-book"></span>Thêm Vị Phật</a></li>
                          <?php }?>
                          <li class="<?php echo $thong_tin_nguoi_dung;?>"><a href="<?php echo base_url();?>users/MyAccount"><span class="glyphicon glyphicon-user"></span> <?php echo $this->session->userdata('username'); ?></a></li>
                          <li><a href="<?php echo base_url();?>users/logOut"><span class="glyphicon glyphicon-log-out"></span> Thoát</a></li>
                      <?php    
                      }else{
                      ?>
                          <li class="<?php echo $dang_ky;?>"><a href="<?php echo base_url();?>users/register"><span class="glyphicon glyphicon-user"></span> Đăng ký</a></li>
                          <li class="<?php echo $dang_nhap;?>"><a href="<?php echo base_url();?>users/login"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập</a></li>
                      <?php
                      }
                      ?>
                  </ul>
            </div>
          </div>
        </nav>
    </div>
</div>