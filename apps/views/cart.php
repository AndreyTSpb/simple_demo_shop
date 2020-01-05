<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 05/01/2020
 * Time: 08:10
 */
?>
<!-- Modal -->
<div class="modal fade" id="modal-shop-cart" tabindex="-1" role="dialog" aria-labelledby="modal-shop-cart" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fa fa-shopping-basket"></i>   Корзина</h5>
                <button type="button" class="close close-cart" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="close-cart">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="cart-body">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-dark">
                        <div class="row text-center text-white font-weight-bold">
                            <div class="col-2 border-right border-white">
                                Изо.
                            </div>
                            <div class="col-5 border-right border-white">
                                Наименование
                            </div>
                            <div class="col-3 border-right border-white">
                                Кол.
                            </div>
                            <div class="col-2">
                                Уд-ть
                            </div>
                        </div>
                    </li>
                    <!-- List products -->
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-2">
                                <img src="<?=DOCUMENT_STATIC.DS?>images/blue-clipart-christmas-1.png" width="35px" height="35px">
                            </div>
                            <div class="col-5">
                                name
                            </div>
                            <div class="col-3">
                                sum * qnt
                            </div>
                            <div class="col-2">
                                X
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-2">
                                <img src="<?=DOCUMENT_STATIC.DS?>images/blue-clipart-christmas-1.png" width="35px" height="35px">
                            </div>
                            <div class="col-5">
                                name
                            </div>
                            <div class="col-3">
                                sum * qnt
                            </div>
                            <div class="col-2">
                                X
                            </div>
                        </div>
                    </li>
                    <!-- /End List products -->
                    <!-- Itog -->
                    <li class="list-group-item list-group-item-secondary">
                        <div class="row flex-row-reverse">
                            <div class="col-6">
                                <strong>ИТОГО :</strong> <i class="fa fa-rub"></i> <span class="itog">4343</span>
                            </div>
                        </div>
                    </li>
                    <!-- /End Itog -->
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="close-cart btn btn-secondary" data-dismiss="modal">Продолжить покупки</button>
                <button type="button" class="btn btn-primary">Оформить заказ</button>
            </div>
        </div>
    </div>
</div>
