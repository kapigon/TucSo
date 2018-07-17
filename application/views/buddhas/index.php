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
                        <a class="btn btn-secondary" href="<?php echo site_url('Favorites/addToFavorites/' . $Buddha['ID']);?>" role="button">Đưa vào thực hành »</a>
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

   