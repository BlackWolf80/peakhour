<p class="menu_head">

        <?php if( isset($category['childs'])): ?>
             <?= $category['name']?>
        <?php else:?>
            <li><a href="/ads?group=<?=$category['id']?>"><?= $category['name']?></a></li>
        <?php endif;?>
</p>
        <?php if( isset($category['childs']) ): ?>
        <div class="menu_body">
                <?= $this->getMenuHtml($category['childs'])?>
        </div>
        <?php endif;?>


