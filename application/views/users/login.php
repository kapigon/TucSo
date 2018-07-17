<?php echo validation_errors(); ?>
<form class="form-horizontal" action="<?php echo base_url();?>Users/login" method="post">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="form-group">
              <label>Tên đăng nhập</label>
                <input type="username" class="form-control"  id="usr"  name="username" placeholder="Tên đăng nhập" autocomplete="Off">
            </div>
            <div class="form-group">
              <label>Mật khẩu</label>
                <input type="password" class="form-control" id="pwd"   name="password" placeholder="Mật khẩu">
            </div>
            <div class="form-group">
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Ghi nhớ
                  </label>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" value="Đăng nhập" name="Login">Đăng nhập</button>
            </div>
        </div>
    </div>
</form>