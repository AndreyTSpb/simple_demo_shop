document.addEventListener("DOMContentLoaded", function() {
    if(document.getElementById('four_product')){
        /**
         * 1) Ловим событие на нажатию кнопки с классом 'btn-cart' в блоке с ID 'four_product'
         * 2) У кнопки получаем ID из атрибута 'data-id'
         * 3) Передаем в функцию добавить в корзину
         */
        let div = document.querySelector('#four_product');
        div.addEventListener('click', function (e) {
             let target = e.target;
             if(target && target.classList.contains('btn-cart')){
                 /**таким длинным методом получаем цену (вариант когда нету доступа к изменению кода HTML)
                  *так как нам нужно получить цену у той карточки по которой нажали
                  * 1) находим сначала самый главный родительский элемент 'CARD' по которому нажали
                  * 2) Потом в найденом блоке с ценой находим уже значения цены
                  * 3) Имя картинки
                  * 4) название
                  */
                 let card = target.parentElement.parentElement.parentElement;

                 if(card.classList.contains('card')){
                     //PRICE
                     let priceElement = card.getElementsByClassName('price-box')[0],
                         price = priceElement.getElementsByTagName('span')[0].innerText;
                     if(!priceElement) return false;

                     if(priceElement.getElementsByClassName('sale')){
                         let sale_price = priceElement.getElementsByClassName('sale');
                     }

                     //IMG
                     let img_src = card.getElementsByTagName('img')[0].src,
                         img;
                     // перебрать путь к файлу оставив только его конец
                     if(img_src){
                         let arr_url_img = img_src.split('/');
                         img = arr_url_img[arr_url_img.length -1];
                     }

                     //NAME
                     if(!card.getElementsByClassName('card-title')) return false;
                     let name = card.getElementsByClassName('card-title')[0].textContent;

                     /**
                      * Отправляем в корзину  ID, PRICE, NAME, IMG
                      */
                     AddToCart(target.getAttribute('data-id').replace(/(\s*)\B(\s*)/g, ''), price.replace(/(\s*)\B(\s*)/g, ''), img.replace(/(\s*)\B(\s*)/g, ''), name.replace(/(\s*)\B(\s*)/g, ''));
                 }
             }
        });

        /**
         * Добавление в корзину товаров
         * Корзина на COOKIE
         * @param id - айди товара
         * @param price
         * @param img
         * @param name
         * @constructor
         */
        function AddToCart(id, price, img, name) {

            //массив создаем с описанием товара
            let product = {
                id : id,
                name : name,
                img : img,
                price : price,
                qrt : 1
            };

            let products = []; //массив для всех продуктов что добавлены в корзину

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

            //проверяем есть ли уже товар в корзине
            if(cart.length > 0){
                let flag_add = 1; //флаг что добавляем, а не увеличиваем количество
                products = JSON.parse(cart[1]); // приобразуем значения JSON в массив продуктов

                products.forEach(function (item) {
                    if(item['id'] === product['id']){
                        item['qrt'] ++; //увеличиваем количество на 1
                        flag_add = 0; // отмечаем что, это происходит увеличение количества уже существующего товара, а не добавления нового
                    }
                });

                if(flag_add === 1) products.push(product); //если флаг равен 1 то это добавление нового товара в массив

                document.cookie = 'cart='+JSON.stringify(products); // обновляем куку с корзиной

            }else{
                //если кука пустая то просто добавляем
                products.push(product);
                document.cookie = 'cart='+JSON.stringify(products);
            }
        }
    }
});