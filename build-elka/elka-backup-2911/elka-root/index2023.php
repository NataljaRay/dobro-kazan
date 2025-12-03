<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetAdditionalCss("/local/templates/main/custom_css/christmas.css");
$APPLICATION->SetAdditionalCss("/local/templates/main/custom_css/datatables.css");
$APPLICATION->SetAdditionalCss("/local/templates/main/custom_css/datatables.min.css");
 

$APPLICATION->SetTitle("Елка желаний");
?>
        <div class="header-general-page">
            <video class="video-header" src="/public/video/ЕЖ2023.MP4" type="video/mp4" autoplay="" muted=""
                loop=""></video>
            <div class="header-logo">
                <img src="/public/svg-logotype-color.svg" class="header-logo-img">
            </div>
            <div class="wrapper title-header">
                <h1 class="title">Ёлка Желаний 2023</h1>
            </div>
            <div class="header-info-grid">
                <div class="header-info">
                    <div id="openModal" class="modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title">
                                        Заполните информацию о вашем желании </h3>
                                    <a href="#close" title="Close" class="close">×</a>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        <script src="https://yastatic.net/s3/frontend/forms/_/embed.js"></script>
                                        <iframe src="https://forms.yandex.ru/u/6568bee6c09c0241aa2dc225/?iframe=1"
                                            frameborder="0" name="ya-form-6568bee6c09c0241aa2dc225"
                                            width="100%"></iframe>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="openModal1" class="modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title">
                                        Заполните информацию об исполнении </h3>
                                    <a href="#close" title="Close" class="close">×</a>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        <script src="https://yastatic.net/s3/frontend/forms/_/embed.js"></script><iframe
                                            src="https://forms.yandex.ru/u/6568fe5d90fa7b488ef3ee93/?iframe=1"
                                            frameborder="0" name="ya-form-6568fe5d90fa7b488ef3ee93"
                                            width="100%"></iframe>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn-g btn" href="#openModal1">Исполнить желание</a>
                    <div class="header-info">
                        <h3 class="title-h3">
                            Исполняем желания <br>
                            до 30 января 2024 г. </h3>
                    </div>
                    <div class="header-info">
                        <a class="btn-d btn" href="#">
                            <style>
                                background-color: #cccccc;
                                !Important
                            </style>Загадать желание
                        </a>
                    </div>
                    <div class="header-info">
                        <h3 class="title-h3">
                            Принимаем желания <br>
                            до 15 декабря 2023 г. </h3>
                    </div>
                </div>
            </div>
            <div class="wrapper content-info">
                <div class="title content-title">
                    <h3 class="title-h1">Каким может быть желание?</h3>
                </div>
                <div class="content-info-item">
                    <div class="item">
                        <div class="item-title">
                            <h3>Материальное</h3>
                            <p class="item-p">
                                Это конкретный подарок, который желает получить Мечтатель
                            </p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-title">
                            <h3>Нематериальное</h3>
                            <p class="item-p">
                                Это событие или мероприятие, в котором желает принять участие Мечтатель
                            </p>
                        </div>
                    </div>
                </div>
                <div class="title content-title">
                    <h3 class="title-h1">Кто может участвовать?</h3>
                </div>
                <div class="content-info-item">
                    <div class="item-left">
                        <div class="item-title">
                            <h3>Дети с ограниченными возможностями здоровья</h3>
                            <div class="wishlist-item-list-age">
                                г.Казань
                            </div>
                            <p class="item-p">
                                от 3 до 17 лет включительно.
                            </p>
                            <p>
                                не принимающие участие в елках желаний от других благотворительных фондов
                            </p>
                        </div>
                    </div>
                    <div class="item-right">
                        <div class="item-title">
                            <h3>Дети с инвалидностью</h3>
                            <div class="wishlist-item-list-age">
                                г.Казань
                            </div>
                            <p class="item-p">
                                от 3 до 17 лет включительно
                            </p>
                            <p>
                                не принимающие участие в елках желаний от других благотворительных фондов
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrapper christmas-info">
                <h3> <i>Поделитесь новогодним желанием своего ребенка на сайте акции и дайте возможность увидеть ее
                        исполнителям</i> </h3>
            </div>
            <div class="wrapper btn">
                <div id="openModal" class="modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">Заполните информацию</h3>
                                <a href="#close" title="Close" class="close">×</a>
                            </div>
                            <div class="modal-body">
                                <p>
                                    <script src="https://yastatic.net/s3/frontend/forms/_/embed.js"></script> <iframe
                                        src="https://forms.yandex.ru/u/6568bee6c09c0241aa2dc225/?iframe=1"
                                        frameborder="0" name="ya-form-6568bee6c09c0241aa2dc225" width="100%"></iframe>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-info-grid">
                    <div class="header-info">
                        <div id="openModal1" class="modal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Заполните информацию</h3>
                                        <a href="#close" title="Close" class="close">×</a>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            <script src="https://yastatic.net/s3/frontend/forms/_/embed.js"></script>
                                            <iframe src="https://forms.yandex.ru/u/6568bee6c09c0241aa2dc225/?iframe=1"
                                                frameborder="0" name="ya-form-6568bee6c09c0241aa2dc225"
                                                width="100%"></iframe>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn-g btn" href="#openModal1">Исполнить желание</a>
                    </div>
                </div>
            </div>
            <div class="wrapper content-title">
                <h3 class="title-h1">Часто задаваемые вопросы:</h3>
            </div>
            <div class="wrapper faq">
                <div class="acor-container">
                    <input type="radio" name="acor" id="acor1"> <label for="acor1">Как подать заявку?</label>
                    <div class="acor-body">
                        <p>
                            Заявку на участие можно подать на сайте <a
                                href="https://dobro.kzn.ru/elka-zhelaniy/">https://dobro.kzn.ru/elka-zhelaniy/</a>
                        </p>
                        <ol>
                            <li>Внимательно ознакомьтесь с информацией на сайте ;</li>
                            <li>Нажмите на кнопку “Загадать желание” ;</li>
                            <li>Заполните “Контактные данные представителя” ;</li>
                            <li>
                                Перейдите к заполнению анкеты на ребенка - мечтателя. Обратите внимание, что анкета
                                состоит из 5 блоков: о мечтателе, категория, дополнительная информация, доброе дело,
                                желание ; </li>
                            <li>
                                Если у вас несколько детей, которые подходят под условия участия в акции - на них также
                                необходимо заполнить анкеты ; </li>
                            <li>
                                Если вы заполнили анкету, проверьте данные и завершите подачу заявки. </li>
                        </ol>
                        <p>
                        </p>
                    </div>
                    <input type="radio" name="acor" id="acor2"> <label for="acor2">Кто подает заявки и от чьего
                        имени?</label>
                    <div class="acor-body">
                        <p>
                            Если вы законный представитель ребенка (родитель или опекун) — вы заполняете заявку от имени
                            своего ребенка или своих детей.
                        </p>
                    </div>
                    <input type="radio" name="acor" id="acor3"> <label for="acor3">Кто может стать мечтателем?</label>
                    <div class="acor-body">
                        <p>
                            Дети в возрасте от 3 до 17 лет включительно, не принимающие участие в елках желаний от
                            других благотворительных фондов:
                        </p>
                        <ul>
                            <li>Дети с ограниченными возможностями здоровья</li>
                            <li>Дети с инвалидностью</li>
                        </ul>
                    </div>
                    <input type="radio" name="acor" id="acor4"> <label for="acor4">У меня несколько детей. Нужно ли на
                        каждого заводить отдельную заявку?</label>
                    <div class="acor-body">
                        <p>
                            Если у вас несколько детей, подходящих под условия акции — вы подаете анкету на каждого
                            ребенка отдельно.
                        </p>
                    </div>
                    <input type="radio" name="acor" id="acor5"> <label for="acor5">Какие желания нельзя
                        загадывать?</label>
                    <div class="acor-body">
                        <p>
                            НЕ принимаются следующие категории желания:
                        </p>
                        <ol>
                            <li>общая сумма подарка не должна превышать сумму 5.000 рублей</li>
                            <li>прохождение лечения и предоставление медицинских услуг ;</li>
                            <li>
                                приобретение технических средств реабилитации и абилитации (велосипед адаптационный/
                                реабилитационный, кресла-коляски, ортопедическая обувь, трости/ костыли/ опоры/ поручни,
                                специальные устройства/голосообразующие аппараты и т. д.) ; </li>
                            <li>приобретение лекарственных средств ;</li>
                            <li>
                                приобретение специализированного медицинского оборудования ; </li>
                            <li>приобретение недвижимости и транспортных средств ;</li>
                            <li>приобретение животных ;</li>
                            <li>ремонт помещений ;</li>
                            <li>
                                приобретение бытовой, цифровой техники, домашней/ офисной/ садовой мебели и прочее
                                (смартфоны, планшеты, телевизоры, ноутбуки, микроволновые печи, компьютерные стулья,
                                обеденные столы и т.д.) </li>
                        </ol>
                        <p>
                        </p>
                    </div>
                    <input type="radio" name="acor" id="acor6"> <label for="acor6">До какого числа можно подать заявку
                        на исполнение желания?</label>
                    <div class="acor-body">
                        <p>
                            Прием заявок на исполнение желаний принимается до 15 декабря 2023.
                        </p>
                    </div>
                </div>
            </div>
            <div class="wrapper christmas-info">
                <h3> <i>Акция, где каждый из нас может стать добрым волшебником и подарить радость тем, кто в этом
                        нуждается</i> </h3>
            </div>
            <div class="wrapper btn">
                <div id="openModal" class="modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">Заполните информацию</h3>
                                <a href="#close" title="Close" class="close">×</a>
                            </div>
                            <div class="modal-body">
                                <p>
                                    <script src="https://yastatic.net/s3/frontend/forms/_/embed.js"></script> <iframe
                                        src="https://forms.yandex.ru/u/6568bee6c09c0241aa2dc225/?iframe=1"
                                        frameborder="0" name="ya-form-6568bee6c09c0241aa2dc225" width="100%"></iframe>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-info-grid">
                    <div class="header-info">
                        <div id="openModal" class="modal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Заполните информацию</h3>
                                        <a href="#close" title="Close" class="close">×</a>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            <script src="https://yastatic.net/s3/frontend/forms/_/embed.js"></script>
                                            <iframe src="https://forms.yandex.ru/u/6568bee6c09c0241aa2dc225/?iframe=1"
                                                frameborder="0" name="ya-form-6568bee6c09c0241aa2dc225"
                                                width="100%"></iframe>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn-g btn" href="#openModal1">Исполнить желание</a>
                    </div>
                </div>
            </div>
            <h2></h2>
            <div class="wrapper wishlist">
                <div class="wrapper wishlist">
                    <div class="title content-title">
                        <h3 class="title-h1">Список желаний</h3>
                    </div>
                    <div class="header_wrap">
                        <div class="wrapper-wishlist">
                            <div class="wishlist-item">
                                <div class="scrolling-wrapper">
                                    <article class="contant-table">
                                        <!-- Prodcuts from gavascript file in here. -->
                                        <table id="example" class="table table-striped nowrap" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        ФИО
                                                    </th>
                                                    <th>
                                                        Возраст
                                                    </th>
                                                    <th>
                                                        Желание
                                                    </th>
                                                    <th>
                                                        Статус
                                                    </th>
                                                    <th>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="data-output">
                                            </tbody>
                                        </table>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <div class="header-info-grid">
                            <div class="header-info">
                                <div id="openModal1" class="modal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title">Заполните информацию</h3>
                                                <a href="#close" title="Close" class="close">×</a>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    <script
                                                        src="https://yastatic.net/s3/frontend/forms/_/embed.js"></script>
                                                    <iframe
                                                        src="https://forms.yandex.ru/u/6568fe5d90fa7b488ef3ee93/?iframe=1"
                                                        frameborder="0" name="ya-form-6568fe5d90fa7b488ef3ee93"
                                                        width="100%"></iframe>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            fetch("/local/templates/main/json/users.json")
                .then(function (response) {
                    return response.json();
                })
                .then(function (users) {
                    let placeholder = document.querySelector("#data-output");
                    let out = "";
                    for (let user of users) {
                        out += `
			<tr>
				<td>${user.name}</td>
				<td>${user.age} лет</td>
				<td>${user.wish}</td>
				<td><span class="wait">${user.status}</span></td>
				<td> <a class="btn-t" href="#openModal1">Исполнить желание</a></td>
</tr>
		`;
                    }

                    placeholder.innerHTML = out;
                    $("#example").DataTable({
                        responsive: true,
                    });
                });


        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                var scrollbar = document.body.clientWidth - window.innerWidth + 'px';
                console.log(scrollbar);
                document.querySelector('[href="#openModal"]').addEventListener('click', function () {
                    document.body.style.overflow = 'hidden';
                    document.querySelector('#openModal').style.marginLeft = scrollbar;
                });
                document.querySelector('[href="#close"]').addEventListener('click', function () {
                    document.body.style.overflow = 'visible';
                    document.querySelector('#openModal').style.marginLeft = '0px';
                });
            });
        </script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>

<br>
</div>