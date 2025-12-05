<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Ёлка желаний");

$APPLICATION->AddHeadString('<link rel="preload" href="img/elka-bg-1.png" as="image">');
$APPLICATION->AddHeadString('<link rel="preload" href="img/elka-bg-2.png" as="image">');
$APPLICATION->AddHeadString('<style>#elka, #elka * {font-family: \'Inter\', sans-serif;}</style>');
$APPLICATION->SetAdditionalCSS("/culture-of-charity/fairs-of-goodness/css/style.css");
?>
  <!--<div class="body" style="max-width: 100%;">-->
  <div id="elka" class="body" style="max-width: 1440px;  margin: 0 auto;">
    <div class="container1" >
      <div class="conditions">
        <h2 class="conditions__title">Ёлка желаний <br>2025-2026</h2>
        <p class="conditions__date">
          Акция начинается с 15 ноября 2025 года <br>и завершается 31 января 2026 года.
        </p>
        <div class="conditions__info">
          <div class="conditions__text">
            Для продолжения ознакомьтесь с положением и подтвердите согласие
          </div>
          <a class="conditions__btn e-btn e-btn--conditions" href="/culture-of-charity/fairs-of-goodness/assets/elka-zhelaniy-2025.pdf" target="_blank">
            Положение об акции
          </a>
        </div>
        <div class="checkbox">
          <label class="e-checkbox e-checkbox--top">
            <input type="checkbox" name="checkbox" id="consent" onchange="toggleLinks()">
            <div class="e-checkbox__toggle">
              <div class="e-checkbox__content">
                Я согласен с условиями акции
              </div>
            </div>
          </label>
        </div>
        <div id="error-message" class="error-message">
        </div>
        <div id="timer" class="timer"></div>

      </div>

      <div class="role">
        <h2 class="role__title">Выберите роль</h2>
        <div class="role__inner">
          <div class="role__block">
            <h3 class="role__block-title">Загадать желание</h3>
            <p class="role__block-text">
              Дорогой Мечтатель, успей загадать <br>желание до 20 декабря.
            </p>
            <a class="role__btn e-btn role-link disabled" onclick="handleLinkClick(event)"
               href="https://xn--j1ab.xn--80aanbeohciex.xn--p1ai/trustee/referral?code=0fed4518-e18b-43a4-98dd-e9c4724e99db" target="_blank">
              Стать мечтателем
            </a>
          </div>
          <div class="role__block">
            <h3 class="role__block-title">Исполнить желание</h3>
            <p class="role__block-text">
              Дорогой Исполнитель, начать исполнять желания можно с 5 декабря по 28 февраля.
            </p>
            <a class="role__btn e-btn role-link disabled" onclick="handleLinkClick(event)"
               href="https://xn--j1ab.xn--80aanbeohciex.xn--p1ai/executor/referral?code=0fed4518-e18b-43a4-98dd-e9c4724e99db" target="_blank">
              Стать исполнителем
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--</div>-->

  <style>body{margin: 0}</style>

  <script>
      function toggleLinks() {
          const checkbox = document.getElementById('consent');
          const links = document.querySelectorAll('.role-link');
          const errorMessage = document.getElementById('error-message');
          errorMessage.textContent = ""; // Скрываем ошибку при переключении
          links.forEach(link => {
              link.classList.toggle('disabled', !checkbox.checked);
          });
      }

      function handleLinkClick(event) {
          const checkbox = document.getElementById('consent');
          const errorMessage = document.getElementById('error-message');
          if (!checkbox.checked) {
              event.preventDefault(); // Предотвращаем переход по ссылке
              errorMessage.textContent = "Нужно согласиться с условиями акции.";
          }
      }

      function startCountdown() {
          const endDate = new Date("2025-02-28T23:59:59").getTime();
          const timerElement = document.getElementById('timer');

          function updateCountdown() {
              const now = new Date().getTime();
              const timeRemaining = endDate - now;

              if (timeRemaining <= 0) {
                  timerElement.textContent = "Акция завершена.";
                  clearInterval(timerInterval);
                  return;
              }

              const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
              const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
              const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
              const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

              // timerElement.textContent = `До окончания акции осталось: ${days}д ${hours}ч ${minutes}м ${seconds}с`;
          }

          const timerInterval = setInterval(updateCountdown, 1000);
          updateCountdown();
      }

      // window.onload = startCountdown;

      // Генерация снежинок
      function generateSnowflakes() {
          const snowflakeContainer = document.body;
          const snowflakeCount = 50; // Количество снежинок

          for (let i = 0; i < snowflakeCount; i++) {
              const snowflake = document.createElement("div");
              snowflake.classList.add("snowflake");
              snowflake.textContent = "❄";
              snowflake.style.left = Math.random() * 100 + "vw"; // Случайное начальное положение по оси X
              snowflake.style.animationDuration = Math.random() * 5 + 5 + "s"; // Случайная продолжительность падения
              snowflake.style.fontSize = Math.random() * 20 + 15 + "px"; // Случайный размер снежинки
              snowflakeContainer.appendChild(snowflake);
          }
      }

      window.onload = function () {
          // startCountdown();
          // generateSnowflakes();
      };
  </script>

<!--    <div class="projectPageHeader header-blue2">-->
<!--        <div class="headerContent">-->
<!--            <div class="centerContent">-->
<!--                <img src="/public/img/blue_2.svg" class="centerImage"/>-->
<!--                <div class="centerHeader">-->
<!--                    Ёлка желаний-->
<!--                </div>-->
<!---->
<!--                <div class="headerCenterText">-->
<!--                    Страница находится в разработке-->
<!--                </div>-->
<!--                <div class="oneButtonContainer">-->
<!--                    <a href="/" target="_blank" class="centerButton">На главную</a>-->
<!--                </div>-->
<!---->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <br>-->
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>