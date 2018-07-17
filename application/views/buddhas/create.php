<h2><?= $title ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('Buddhas/create'); ?>
    <div class="form-group">
        <label>Tên vị Phật</label>
        <input type="text" class="form-control" placeholder="Nhập Tên vị Phật" name="Name">
    </div>

    <div class="form-group">
        <label>Chủng tự</label>
        <input type="text" class="form-control" placeholder="Nhập Chủng tự" name="ChungTu">
    </div>

    <div class="form-group">
        <label>Chân ngôn tiếng Phạn</label>
        <input type="text" class="form-control" placeholder="Nhập Chân Ngôn" name="ChanNgonTiengPhan">
    </div>

    <div class="form-group">
        <label>Chân ngôn tiếng Việt</label>
        <input type="text" class="form-control" placeholder="Nhập Chân Ngôn" name="ChanNgonTiengViet">
    </div>

    <div class="form-group">
        <label>Hình Ảnh</label>
        <input type="file" name="HinhAnh" size="20">
    </div>

    <div class="form-group">
        <label>Ghi chú</label>
        <textarea class="form-control" rows="6" name="GhiChu" id="editor"></textarea>
    </div>

    <button type="submit" class="btn btn-default">Thêm mới</button>
</form>