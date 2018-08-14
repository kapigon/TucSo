<h2><?= $title ?></h2>

<?php
    $i = 0;
    foreach($Buddhas as $Buddha): 
        $i++;
        if($i % 2 == 1){
            echo '<div class="row buddhas-list">';
        }?>
                <div class="col-lg-6 item">
                    <img class="rounded-circle" src="<?php echo base_url();?>customs/images/Buddhas/<?php echo $Buddha['HinhAnh']; ?>" alt="<?php echo $Buddha['Name']; ?>" height="300">
                    <h3><a class="btn btn-secondary" href="<?php echo site_url('Buddhas/' . $Buddha['Slug']);?>" role="button"><?php echo $Buddha['Name']; ?></a></h3>
                    <small> <b>Chủng tự:</b> <?php echo $Buddha['ChungTu'];?></small>
                    <p>(<?php echo $Buddha['ChanNgonTiengPhan'];?>)</p>
                    <p>
                        <a class="btn btn-secondary" href="<?php echo site_url('favorites/delete/' . $Buddha['favID']);?>" role="button">Ngừng thực hành »</a>
                        <a class="btn btn-secondary" href="<?php echo site_url('Buddhas/' . $Buddha['Slug']);?>" role="button">Xem »</a>
                    </p>
                </div><!-- /.col-lg-4 -->
        <?php 
            if($i % 2 == 0 || count($Buddhas) == $i){
                echo '</div>';
            }
        ?>
<?php endforeach; ?>

<div class="pagination-links">
    <?php echo $this->pagination->create_links();?>
</div>
<div class="clearer"></div>


<div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>#</th>
          <th>Vị Phật</th>
          <th>Tổng số</th>
          <th>Hôm nay</th>
          <th>ĐVT</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach($Buddhas as $Buddha): ?>
            <tr>
                <td>
                    <!-- Hình Ảnh -->
                    <img class="rounded-circle" src="<?php echo base_url();?>customs/images/Buddhas/<?php echo $Buddha['HinhAnh']; ?>" alt="<?php echo $Buddha['Name']; ?>" height="100">
                </td>
                <td>
                    <!-- Tên Vị Phật -->
                    <h3><a class="btn btn-secondary" href="<?php echo site_url('Buddhas/' . $Buddha['Slug']);?>" role="button"><?php echo $Buddha['Name']; ?></a></h3>
                </td>
                <td>
                    <!-- Tổng số thực hành -->
                    0
                </td>
                <td>
                    <!-- Số thực hành hôm nay -->
                    <form action="<?php echo base_url();?>favorites/nhaptucso/<?php echo $Buddha['ID']; ?>" method="post" accept-charset="utf-8">
                        <input type="number" name="" class="tuc-so text-right" value="0"/>
                        <button type="submit" class="btn btn-default">Nhập</button>
                    </form>
                </td>
                <td>
                    <!-- Đơn vị tính -->
                    Chuỗi
                </td>
            </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>