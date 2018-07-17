
<div class="row buddhas-list">
    <div class="item">
        <img class="rounded-circle" src="<?php echo base_url();?>customs/images/Buddhas/<?php echo $Buddha['HinhAnh']; ?>" alt="<?php echo $Buddha['Name']; ?>" height="400">
        <h2><?php echo $Buddha['Name']; ?> </h2>
        <small><b>Chủng tự:</b> <?php echo $Buddha['ChungTu'];?></small>
        <p><b>Chân ngôn tiếng Phạn:</b>  <?php echo $Buddha['ChanNgonTiengPhan'];?></p>
        <p><b>Chân ngôn tiếng Việt:</b>  <?php echo $Buddha['ChanNgonTiengViet'];?></p>
        <p><b>Ghi chú:</b>  <?php echo $Buddha['GhiChu'];?></p>
        <hr>  
    </div>
</div>
<div class="row">
    <?php if($this->session->userdata('user_role') == 1){ ?>
        <a class="btn btn-default pull-left" href="<?php echo site_url('Buddhas/edit/' . $Buddha['Slug']);?>">Sửa</a>
        <?php echo form_open('Buddhas/delete/'. $Buddha['ID']); ?>
            <input type="submit" value="Xóa" class="btn btn-danger">
        </form>
        <?php } ?>
</div>