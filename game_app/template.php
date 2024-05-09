<!---- RENDER---->

    

    <div class="letters-box">
    <? 
        for($li = 0; $li <10; $li++) {
            $letters = $letter[$li]; 
        ?>   
            
        <div class="letters"><?=$letters?></div>

    <? } ?>
        </div>

<div class="map">
<? 
        for($ni = 0; $ni <10; $ni++) {
            $numbers = $num_inex[$ni]; 
        ?>   
            
        <div class="numbers"><?=$numbers?></div>

    <? } ?>
    <!------------------>
    <? 
    for ($ri=0; $ri < 10 ; $ri++) { ?>
        <? for ($ci=0 ; $ci < 10; $ci++) {  ?>
            <?     
                $attributes = $map[$ri][$ci] == 1 ? 'class="ship sq"' : 'class="sq"';
                $attributes .= "href=\"/?shoot={$ri}x{$ci}\"";
            ?>
                <a <?= $attributes ?>></a>   
        <? }?>
    <? } ?>
</div>

<!--? if($map[$ri][$ci] == 1) {      
        $attributes = 'class="ship"';
     } else {
        $attributes = '';
    }
?-->