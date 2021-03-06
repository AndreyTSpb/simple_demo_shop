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
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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
                            <div class="col-3 border-right border-white">
                                Наиме-ние
                            </div>
                            <div class="col-3 border-right border-white">
                                Кол.
                            </div>
                            <div class="col-2 border-right border-white">
                                Цена
                            </div>
                            <div class="col-2">
                                Уд-ть
                            </div>
                        </div>
                    </li>
                    <!-- List products -->
                    <i id="list-products"></i>
                    <!-- /End List products -->
                    <!-- Itog -->
                    <li class="list-group-item list-group-item-secondary">
                        <div class="row flex-row-reverse">
                            <div class="col-6">
                                <strong>ИТОГО :</strong>  <span class="itog" id="itog"></span> <i class="fa fa-rub"></i>
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

<!-- HTML template for products -->
<script id="product-template" type="text/template">
    <li class="list-group-item" id="row-<%= id %>">
        <div class="row">
            <div class="col-2 text-center">
                <img src="<?=DOCUMENT_STATIC.DS?>images/<%= img %>" width="35px" height="35px">
            </div>
            <div class="col-3">
                <%= name %>
            </div>
            <div class="col-3 text-center">
                <span class="input-group-btn">
                      <button type="button" class="btn btn-default btn-number btn-sm pl-0 pr-0"  data-type="minus" data-id = "<%= id %>" data-field="quant[2]">
                        <i class="fa fa-minus"></i>
                      </button>
                </span>
                <span class="qrt"><%= qrt %></span>
                <span class="input-group-btn">
                      <button type="button" class="btn btn-default btn-number btn-sm pl-0 pr-0" data-type="plus" data-id = "<%= id %>" data-field="quant[2]">
                          <span class="fa fa-plus"></span>
                      </button>
                </span>
            </div>
            <div class="col-2 text-right">
                <%= price %>
            </div>
            <div class="col-2 text-center text-danger h4">
                <i class="fa fa-times btn-del_product-to-cart cursor-pointer " data-id="<%= id %>" aria-hidden="true"></i>
            </div>
        </div>
    </li>
</script>
