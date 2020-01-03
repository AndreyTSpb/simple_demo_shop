<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 02/01/2020
 * Time: 23:53
 */
?>
<div class="row featurette">
    <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading"><?=$title?></h2>
        <p class="lead"><?=$text?></p>
    </div>
    <div class="col-md-5 order-md-1">
        <?php if(!$img):?>
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        <?php else:?>
            <img class="featurette-image img-fluid mx-auto" src="<?=DOCUMENT_STATIC?>/images/<?=$img?>" alt="Generic placeholder image">
        <?php endif;?>
    </div>
</div>
