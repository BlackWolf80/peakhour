<section class="rev_slider_wrapper me-fin-banner">
    <div id="slider1" class="rev_slider"  data-version="5.0">
        <ul>
            <?php foreach ($slides as $slide):?>
            <li data-transition="fade">
                <img src="<?=$slide['image']?>"  alt="">
                <div class="tp-caption sfb tp-resizeme banner-h1"
                     data-x="left" data-hoffset="380"
                     data-y="top" data-voffset="290"
                     data-whitespace="nowrap"
                     data-transform_idle="o:1;"
                     data-transform_in="o:0"
                     data-transform_out="o:0"
                     data-start="500">
                    <span class="shadow_text"><?=$slide['title']?></span>
                </div>
                <div class="tp-caption sfb tp-resizeme banner-border"
                     data-x="left" data-hoffset="380"
                     data-y="top" data-voffset="400"
                     data-whitespace="nowrap"
                     data-transform_idle="o:1;"
                     data-transform_in="o:0"
                     data-transform_out="o:0"
                     data-start="800">
                    <span></span>
                </div>
                <div class="tp-caption sfb tp-resizeme banner-text"
                     data-x="left" data-hoffset="380"
                     data-y="top" data-voffset="435"
                     data-whitespace="nowrap"
                     data-transform_idle="o:1;"
                     data-transform_in="o:0"
                     data-transform_out="o:0"
                     data-start="1100">
                    <p class="shadow_text"><?=$slide['text']?></p>
                </div>
                <?=$slide['buttons']?>

            </li>
            <?php endforeach;?>
        </ul>
    </div>
</section>