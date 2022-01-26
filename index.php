<?

if ($_GET['product']) {

    //$to = 'gnatkovskymax@gmail.com';
    $to = 'sf@renklod.com.ua';
    $to2 = 'ks@renklod.com.ua';
    $to3 = 'ZM@renklod.com.ua';
    $to4 = 'mc@renklod.com.ua';
    $current_site = "https://deonghi-shop.com.ua/lp/delonghi-lactel";
    $request_email = 'delonghi-shop.com.ua';
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $client_ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $client_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $client_ip = $_SERVER['REMOTE_ADDR'];
    }
    $date = date('d-m-Y H:i:s');

    $subject = 'Заявка с лендинга Delonghi "Lactel"'.rand();

    $headers = "From: " . strip_tags($request_email) . "\r\n";
    $headers .= "Reply-To: " . strip_tags($request_email) . "\r\n";
    $headers .= "CC: $request_email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $message = '<div>
                    <div>С сайта ' . $current_site . ' отправлена заявка!</div>
                    <br>
                    <div style="margin-bottom: 5px;">Имя: <strong>' . $_GET['name'] . '</strong></div>
                    <div style="margin-bottom: 5px;">Телефон: <strong>' . $_GET['phone'] . '</strong></div>
                    <div style="margin-bottom: 5px;">Название товара: <strong>' . $_GET['product'] . '</strong></div>
                    <div style="margin-bottom: 5px;">Старая цена: <strong>' . $_GET['price_old'] . '</strong></div>
                    <div style="margin-bottom: 5px;">Новая цена: <strong>' . $_GET['price_new'] . '</strong></div>
                    <div style="margin-bottom: 5px;">Ip: <strong>' . $client_ip . '</strong></div>
                    <div style="margin-bottom: 5px;">Время: <strong>' . $date . '</strong></div>
                </div>';

    if (mail($to, $subject, $message, $headers)) {
        mail($to2, $subject, $message, $headers);
        mail($to3, $subject, $message, $headers);
        mail($to4, $subject, $message, $headers);
        echo 'sended';
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta charset="UTF-8">
        <title>Lactel молоко  для ідеальної пінки капучино - Delonghi</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">

        <!-- Google Tag Manager delonghi-shop.ua-->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                                                              new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
                                    })(window,document,'script','dataLayer','GTM-N7QHDCZ');</script>
        <!-- End Google Tag Manager -->


    </head>
    <body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N7QHDCZ"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
        <section class="container-fluid s1">
            <div class="container">
                <img class="s1-img" src="img/s1-milk.png" alt="Молоко Lactel">
                <div class="s1-text">
                    <img class="s1-text-img" src="img/s1-text.svg" alt="Молоко ідеальної пінки капучино">
                </div>
            </div>
        </section>



        <section class="container-fluid s2">
            <div class="container">
                <div class="title">Купуйте кавомашину за супер ціною!</div>

                <div class="product">
                    <div class="product-item product-item--milk1">
                        <a href="https://delonghi-shop.com.ua/detailed/avtomaticheskie_kofemashinyi/delonghi_ecam_37085_sb_dinamica.htm" target="_blank" class="product-item-link">
                            <img src="img/s2-product-3.jpg" alt="" class="product-item-img">
                            <span class="product-item-title">Кавомашина DeLonghi ECAM 370.85 SB Dinamica</span>
                        </a>
                        <div class="product-item-price">
                            <div class="product-item-price-old">25 999 ₴</div>
                            <div class="product-item-price-new">18 999 ₴</div>
                        </div>
                        <div class="product-item-btn">
                            <div class="product-item-buy">
                                <a  data-fancybox="" data-src="#pop-up-form" href="javascript:;" class="btn-y">Купити за супер ціною</a>
                            </div>
                            <div class="product-item-info">
                                <a href="https://delonghi-shop.com.ua/detailed/avtomaticheskie_kofemashinyi/delonghi_ecam_37085_sb_dinamica.htm" class="btn-b" target="_blank">Переглянути ХАРАКТЕРИСТИКИ</a>
                            </div>
                        </div>
                    </div>

                    <div class="product-item product-item--milk2">
                        <a href="https://delonghi-shop.com.ua/detailed/avtomaticheskie_kofemashinyi/delonghi_epam_96075_glm_maestosa.htm" target="_blank" class="product-item-link">
                            <img src="img/s2-product-2.jpg" alt="" class="product-item-img">
                            <span class="product-item-title">Кавомашина DeLonghi EPAM 960.75 GLM Maestosa</span>
                        </a>
                        <div class="product-item-price">
                            <div class="product-item-price-old">77 999 ₴ </div>
                            <div class="product-item-price-new">54 999 ₴ </div>
                        </div>
                        <div class="product-item-btn">
                            <div class="product-item-buy">
                                <a  data-fancybox="" data-src="#pop-up-form" href="javascript:;" class="btn-y">Купити за супер ціною</a>
                            </div>
                            <div class="product-item-info">
                                <a href="https://delonghi-shop.com.ua/detailed/avtomaticheskie_kofemashinyi/delonghi_epam_96075_glm_maestosa.htm" class="btn-b" target="_blank">Переглянути ХАРАКТЕРИСТИКИ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="container-fluid s3">
            <div class="container">
                <p>
                    Щоб отримати ідеальну пінку для капучино, потрібно мати 2 речі – кавомашину DeLonghi та молоко відповідної якості та характеристик.
                </p>
                <p>
                    Для ідеального результату у вашій чашці, молоко має бути охолодженим до 4-5 градусів (температура холодильника), з високим вмістом білку (2,5-3%) та з жирністю до 2,5%
                </p>
                <p>
                    Молоко ультрапастеризоване з вітаміном Д3 ТМ Лактель є безпечним та корисним продуктом. Молоко виготовляється з молока-сировини вищого сорту, нормалізоване за масовою часткою жиру, збагачене вітаміном Д3 та піддається тепловій обробці за температури 137⁰С (4 секунди), охолоджене та запаковане в асептичних умовах. За цих умов виробництва молоко повністю безпечне (гинуть всі вегетативні та спорові форми бактерій, інактивуються ферменти), відповідає вимогам промислової стерильності, зберігає всі корисні речовини (білки, жири, вуглеводи, мікро- та мікроелементи, вітаміни), повністю готове до споживання.
                </p>
                <p>
                    Для пакування молока використовується безпечна упаковка «Тетра Фіно Асептік» - багатошаровий матеріал на основі картону та полімерів або «Тетра Брік Асептік» - багатошаровий матеріал з комбінованого картону, які надійно захищають молоко від впливу зовнішнього середовища.
                </p>
                <p>
                    На підприємстві виробника функціонує система управління якістю та безпечністю харчових продуктів у відповідності вимогам міжнародного стандарту
                    <b>ISO 22000:2005.</b>
                </p>
                <p>
                    Ми приготували акційну пропозицію для всіх поціновувачів лате, капучино та інших кавових напоїв. Придбати кавомашину за акційною ціною можна зробивши замовлення з цієї сторінки.
                </p>
                <a data-fancybox=""  data-type="iframe" data-src="terms.pdf" href="javascript:;" class="btn-terms">Правила акції</a>
                <img src="img/s3-line.svg" alt="" class="s3-line">
                <a href="https://delonghi-shop.com.ua/" target="_blank" class="s3-link">
                    <img src="img/s3-logo.svg" alt="Delonghi" class="s3-logo">
                </a>
                <p class="footer-text">Офіційний магазин DeLonghi</p>
            </div>
        </section>


        <!-- POPup form -->
        <div style="display: none;" id="pop-up-form" class="popup">
            <h2>Для оформлення замовлення залиште свої контактнi даннi</h2>
            <form class="myform" action="">
                <input type="text" class="name" placeholder="Ваше ім'я">
                <input type="text" class="phone" placeholder="Ваш телефон" inputmode="text">
                <input type="submit" value="Замовити">
            </form>
        </div>


        <div style="display: none;" id="pop-up-thanks" class="popup">
            <img src="img/check.svg" alt="">
            <h2>Дякуемо за ваше замовлення!</h2>
            Найближчим часом наш менеджер зв'яжеться з Вами.
        </div>
        <!-- POPup form end-->



        <a class="thanks" data-fancybox="" data-src="#pop-up-thanks" href="javascript:;">
        </a>



        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <!-- FancyBox -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
        <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

        <script src="inputmask.js"></script>


        <script>

            $('input.phone').inputmask("+38(999)999-99-99");

            var rules = {
                'name': function (value){return value.length>0},
                'phone': function (value){return Array.isArray(value.match(/^\+\d{2}\(\d{3}\)\d{3}\-\d{2}\-\d{2}$/gm))},
            };

            function validate(paramObj = {}){
                var errorArr = [];
                if(Object.keys(paramObj).length){
                    Object.keys(paramObj).forEach(function (key) {
                        if(!rules[key](paramObj[key])){
                            errorArr.push('.' + key);
                        }
                    });
                    return (errorArr.length) ? errorArr : true;
                }
                return errorArr;

            } ;

            let params = {
                'price_old' : '',
                'price_new' : '',
                'product':'',
                'name' : '',
                'phone' : ''
            };

            $('.btn-y').each(function (){
                var self = this;
                $(this).on('click', function (){
                    params.price_old = $(self).parent().parent().parent().find('.product-item-price-old').text();
                    params.price_new = $(self).parent().parent().parent().find('.product-item-price-new').text();
                    params.product    = $(self).parent().parent().parent().find('.product-item-title').text();
                    console.log(params);
                })
            });

            $("form").on('submit', function (e) {
                e.preventDefault();

                var paramObj = {};
                paramObj.name = $(this).find('.name').val();
                paramObj.phone = $(this).find('.phone').val();
                var self = this;
                var validation = validate(paramObj);
                if(validation === true){
                    params.name = paramObj.name;
                    params.phone = paramObj.phone;
                    $.ajax({
                        url: "/lp/delonghi-lactel",
                        method: 'get',
                        data: params,
                        success: function (data) {
                            if(data){
                                console.log(data);
                                $('.fancybox-button').trigger('click')
                                $('.thanks').trigger('click')
                            }
                        }
                    });
                }else{
                    if(validation.length){
                        validation.forEach(function (value){
                            $(self).find(value).css('color','red');
                        })
                    }
                }

            });
        </script>
    </body>
</html>