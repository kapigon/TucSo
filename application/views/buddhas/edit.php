<?php echo validation_errors(); ?>

<?php echo form_open_multipart('Buddhas/update'); ?>
    <input type="hidden" name="ID" value="<?php echo $Buddha['ID'];?>">
    
    <div class="form-group">
        <label>Tên vị Phật</label>
        <input type="text" class="form-control" placeholder="Nhập Tên vị Phật" name="Name" value="<?php echo $Buddha['Name'];?>">
    </div>
    
    <div class="form-group">
        <label>Chủng tự</label>
        <input type="text" class="form-control" placeholder="Nhập Chủng tự" name="ChungTu" value="<?php echo $Buddha['ChungTu'];?>">
    </div>
    
    <div class="form-group">
        <label>Chân ngôn tiếng Phạn</label>
        <input type="text" class="form-control" placeholder="Nhập Chân Ngôn" name="ChanNgonTiengPhan" value="<?php echo $Buddha['ChanNgonTiengPhan'];?>">
    </div>
    
    <div class="form-group">
        <label>Chân ngôn tiếng Việt</label>
        <input type="text" class="form-control" placeholder="Nhập Chân Ngôn" name="ChanNgonTiengViet" value="<?php echo $Buddha['ChanNgonTiengViet'];?>">
    </div>
    
    <div class="form-group">
        <label>Hình Ảnh</label>
        <input type="file" name="HinhAnh" size="20">
    </div>
    
    <div class="form-group">
    <label>Ghi chú</label>
        <textarea class="form-control" rows="6" name="GhiChu" id="editor"><?php echo $Buddha['GhiChu'];?></textarea>
    </div>

    <button type="submit" class="btn btn-default">Cập nhật</button>
</form>