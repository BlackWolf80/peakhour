<section class="we_are">
        <div class="left_side float_left vid">
            <div class="we_are_opacity">
                <iframe src="https://www.youtube.com/embed/<?=$videoArray['address']?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>



            </div>
        </div> <!-- End Left_Side -->
        <div class="right_side float_right">
            <div class="we_are_deatails">
                <h2><?=$videoArray['name']?></h2>
                <p>
                    <?php if ($videoArray['description'] != null){
                        echo '<p>'.$videoArray['description'].'</p>';
                    }?>
                </p>

<!--                <input type="button" onclick="history.back();" value="Назад"/>-->
                <a class="banner-button"  onclick="javascript:history.back(); return false;"><i class="fa fa-arrow-circle-left"></i>Назад</a>
            </div>
        </div> <!-- End right_side -->
    </section>