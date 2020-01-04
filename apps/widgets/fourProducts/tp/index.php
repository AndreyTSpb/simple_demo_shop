<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 03/01/2020
 * Time: 22:30
 */
?>
<div class="card box-shadow col-3" style="max-width: 18rem;">
    <!-- Изображение -->
    <div class="m-3">
        <img class="rounded mx-auto d-block" src="<?=DOCUMENT_STATIC.DS?>/images/<?=$img?>" width="140px" height="140px" alt="...">
    </div>
    <!-- Текстовый контент -->
    <div class="card-body">
        <h5 class="card-title text-center"><?=$title;?></h5>
        <div class="price-box pt-2 pb-2">
            <span class="h3"><i class="fa fa-rub"></i> <?=$price?></span>
        </div>
        <div class="star">
            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i>
        </div>
        <div class="mt-1" style="position: absolute; bottom: 15px;">
            <button class="btn btn-primary" data-id="<?=$id?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i> To Card</button>
        </div>
    </div>
</div><!-- Конец карточки -->
