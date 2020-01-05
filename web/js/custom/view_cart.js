document.addEventListener("DOMContentLoaded", function() {
    //Создаем глобальную переменную с корзиной чтобы 10 раз не вызывать ее
    let  cart = document.querySelector('#modal-shop-cart');

    /**
     * Проверка есть ли чего нибуть в куках корзины
     * @returns {boolean}
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
        if(cart[1].length > 0){
            return true;
        }
        return false;
    }

    function showCart() {

        openCart();

        /**
         * Закрываем корзину при нажатии кнопки Закрыть или Х
         * у всех элементов закрывающих корзину класс сlose-сart
         */
        cart.addEventListener('click', function (event) {
            let target = event.target;
            if(target && target.classList.contains('close-cart')) {
                closeCart(1);
            }
        });

        /**
         * закрываем корзину автоматически если она еще открыта
         * для проверки смотрим есть ли у корзины класс SHOW
         */
         if(!cart.classList.contains('show')) closeCart(10000);
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
            cart.style.display = 'none';
            cart.classList.remove('show');

            // удаляем затемнение
            removeModalBackdrop();
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
        cart.style.display = 'block';
        cart.classList.add('show');
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
     * кнопка для вызова корзины
     * Можно прицепить к любому элементу
     * его оригинальный вызов отключаетмся
     */

    let btn_sh_cart = document.getElementById('shopping-cart');

    //if(testCart()) {
    //    btn_sh_cart.style.color = "red";
    //}

    if(btn_sh_cart){
        btn_sh_cart.addEventListener('click', function (e) {
            e.preventDefault();
            showCart();
        });
   }
});