    <li  class="arrow_down">
        <a href="<?=$category['address']?>" class="<?php if ($category['block'] == 1){echo 'block';} ?>
            " ><?= $category['name']?></a>


        <?php if( isset($category['childs']) ): ?>
            <div class="sub-menu">
                <ul>
                    <?= $this->getMenuHtml($category['childs'])?>
                </ul>
            </div>
        <?php endif;?>
    </li>
