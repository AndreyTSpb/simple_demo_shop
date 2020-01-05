document.addEventListener("DOMContentLoaded", function() {
    //Создаем глобальную переменную с корзиной чтобы 10 раз не вызывать ее
    let  cart_modal = document.querySelector('#modal-shop-cart'),
         products = "";

    /**
     * Проверка есть ли чего нибуть в куках корзины,
     * если есть заполняем глобальную переменную  products
     */
    function testCart() {

        let arr_cookie = document.cookie.split(";"); // куки в массив через разделитель
        let cart = "";

        // удалим пробельные символы (если они, вдруг, есть) в начале и в конце у каждой куки
        for (let j=0; j<arr_cookie.length; j++) {
            arr_cookie[j] = arr_cookie[j].replace(/(\s*)\B(\s*)/g, '');
        }

        //  ищем куку с корзиной
        arr_cookie.forEach(function (val, key) {
            if(val.match(/cart=(.+?)/)){
                // преобразуем строчку в масив через разделител "="
                //отделяем имя куки в нулевой элемент массива , а значение куки в первый элемент
                cart = arr_cookie[key].split('=');
            }
        });
        console.log(cart.length);
        if(cart.length > 0){
            products = JSON.parse(cart[1]);
            //console.log(products);
            return true;
        }
        return false;
    }

    /**
     * Отсюда запускаем все функции для посмотра и управления корзиной
     */
    function showCart() {
        //если карзина не пуста то можно ее показать
        if(testCart()) {  //проверяем куки и если они есть заполняем корзину

            removeItem(); // функция для удаления ненужного товара

            getCart();   // заполняем модалку перебранным массивом из корзины

            openCart();  // показывем корзину
        }

        /**
         * Закрываем корзину при нажатии кнопки Закрыть или Х
         * у всех элементов закрывающих корзину класс сlose-сart
         */
        cart_modal.addEventListener('click', function (event) {
            let target = event.target;
            if(target && target.classList.contains('close-cart')) {
                closeCart(1);
            }
        });

        /**
         * закрываем корзину автоматически если она еще открыта
         * для проверки смотрим есть ли у корзины класс SHOW
         */
         if(!cart_modal.classList.contains('show')) closeCart(10000);
    }

    /**
     * Функия для закрытия корзины,
     * Принимает в качестве парраметра время до закрытия в милисекундах
     * У блока удаляем класс "show" и свойство "display = none"
     * Если добавлена затемняющяя заливка то
     * body.removeChild(document.getElementsByClassName('modal-backdrop')[0]);
     * @param time
     */
    function closeCart(time) {
        setTimeout(function () {
            //$('#modal-shop-cart').modal('hide');
            cart_modal.style.display = 'none';
            cart_modal.classList.remove('show');

            // удаляем затемнение
            if(document.getElementsByClassName('modal-backdrop')[0]){
                removeModalBackdrop();
            }

        }, time);
    }

    /**
     * Открываем модалку через JS
     * К блоку добавляем класс "show" и свойство "display = block"
     * Затемняющим фоном не заливаю
     * Для заливки в котец BODY надо добавить блок с заливкой
     * <div class="modal-backdrop fade show"></div>
     * можно открыть через JQuery, но мы легких путей не ищем
     */
    function openCart() {
        //$('#modal-shop-cart').modal('show');
        cart_modal.style.display = 'block';
        cart_modal.classList.add('show');
        //добавляем затемнение
        createModalBackdrop();
    }

    /**
     * Создание блока затемняющего весь экрвн под модалкой
     */
    function createModalBackdrop() {
        let div = document.createElement('div');
        div.classList.add('modal-backdrop','fade','show');
        document.body.appendChild(div);
    }

    /**
     * Удаление блока затемняющего весь экрвн под модалкой
     */
    function removeModalBackdrop() {
        document.body.classList.remove('modal-open');
        document.body.removeChild(document.getElementsByClassName('modal-backdrop')[0]);
    }

    /**
     * Выборка из куки корзины
     *
     */
    function getCart() {
        /**
         *[
         *  {"id":"2","name":"Product 2","img":"yellow-clipart-christmas-1.png","price":"231","qrt":2},
         *  {"id":"4","name":"Product 4","img":"blue-clipart-christmas-1.png","price":"332","qrt":1},
         *  {"id":"3","name":"Product 3","img":"red-clipart-christmas-1.png","price":"432","qrt":1}
         * ]
         */

        let templateProductItem = document.getElementById('product-template').innerHTML,
            compiled = _.template(templateProductItem),
            html = '',
            list_products = document.getElementById('list-products'),
            summ_price = 0;

        list_products.innerHTML = "";
        products.forEach(function(product) {
            let data = {
                id: product.id,
                name: product.name,
                img: product.img,
                price: product.price,
                qrt: product.qrt
            }
            summ_price += +product.qrt * +product.price;
            html += compiled(data);
        });
        $('#list-products').append(html);
        document.getElementById('itog').textContent = summ_price;
    }

    /**
     * Удаление из корзины,
     * 1) Вешаем слушателя и все тело modal-body id="cart-body"
     * 2) ловим нажатие по красному кресту с классом "btn-del_product-to-catr"
     * 3) получаем из атрибута "data-id", айди товара
     * 4) Отыскиваем его в куках корзины и удаляем
     * 5) удаляем всю строчку
     * 6)
     */
    function removeItem() {
        let cartBody = document.getElementById('cart-body'),
            remove_item;

        cartBody.addEventListener('click', function (e) {
            let target = e.target;
            if(target && target.classList.contains('btn-del_product-to-cart')){
                e.preventDefault();
                //получаем айди продукта
                let id = target.getAttribute('data-id');
                products.forEach(function (product, key) {

                    if(product.id === id){

                        //запоминаем ключ удаляемого элемента
                        remove_item = key;

                    }

                });

                //удаляем ненужный элемент из масива продуктов
                products.splice(remove_item,1);

                //закидываем масив в куки
                document.cookie = 'cart='+JSON.stringify(products); // обновляем куку с корзиной

                // удаляем строчку из визуального отображения
                let rem_row = document.getElementById("row-"+id);
                rem_row.parentNode.removeChild(rem_row);
            }
        });
    }
    

    /**
     * кнопка для вызова корзины
     * Можно прицепить к любому элементу
     * его оригинальный вызов отключаетмся
     */

    let btn_sh_cart = document.getElementById('shopping-cart');

    if(testCart()) {
        btn_sh_cart.style.color = "red";
    }

    if(btn_sh_cart){
        btn_sh_cart.addEventListener('click', function (e) {
            e.preventDefault();
            showCart();
        });
   }
});