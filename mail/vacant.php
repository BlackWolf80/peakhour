<table>
    <tr>
        <td class="container" colspan="3">
            <h3> <?=$vc['vac_name'];?></h3>
        </td>
    </tr>
    <tr>
        <td class="container" colspan="3">
            <h4> <?=$vc['price'];?> ₽</h4>
        </td>
    </tr>
    <tr>
        <td colspan="3">
            <div class="vacant"></div>
        </td>
    </tr>
    <tr><td>
            № <?=$vc['id'];?>
        </td>
        <td><?=$vc['organization']?></td>
        <td><?=$vc['date']?></td>
    </tr>
    <tr>
        <td><?=$vc['contact_name'];?></td>
        <td><?=$vc['phone'];?></td>
        <td><?=$vc['email'];?></td>
    </tr>
    <tr>
        <td colspan="3">
            <div class="vacant"></div>
        </td>
    </tr>
    <?php if($vc['address'] != null):?>
        <tr>
            <td>адрес:</td>
            <td colspan="2">
                <?=$vc['address'];?>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div class="vacant"></div>
            </td>
        </tr>
    <?php endif;?>
    <?php if($vc['description'] != null):?>
        <tr>
            <td >
                <h4>Описание:</h4>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <?=$vc['description'];?>
            </td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td></td>
        </tr>
    <?php endif;?>
</table>



