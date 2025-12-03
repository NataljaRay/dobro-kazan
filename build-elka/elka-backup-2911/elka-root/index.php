<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetAdditionalCss("/local/templates/main/custom_css/christmas.css");
$APPLICATION->SetAdditionalCss("/local/templates/main/custom_css/datatables.css");
$APPLICATION->SetAdditionalCss("/local/templates/main/custom_css/datatables.min.css");

$APPLICATION->SetTitle("Елка желаний");
?><style>
        .body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #f8fafc, #eef2f7);
            position: relative;
            background-image: url('https://cdn.er.ru/media/news/January2021/YAow6QMuFlHPJnl9nmLY.jpg');
            background-size: cover;
            background-position: center;
			 border-radius: 0 10px; 
			 
        }

        /* Анимация снежинок */
        .snowflake {
            position: absolute;
            top: -50px;
            color: white;
            font-size: 1.5em;
            pointer-events: none;
            animation: fall 10s linear infinite;
        }

        /* Анимация падения снежинок */
        @keyframes fall {
            to {
                transform: translateY(100vh);
            }
        }

        .header1 {
            text-align: center;
            background-color: rgba(76, 175, 80, 0.8);
            color: white;
        }

        .container1 {
            max-width: 1440px;
            margin: 0 auto;
            padding: 20px;
        }

        .conditions {
            position: relative;
            text-align: center;
            margin: 10px 0;
            padding: 20px;
            background-color: rgba(240, 240, 240, 0.8);
            border-radius: 8px;
            overflow: hidden;
            color: #333;
            font-size: 1.2em; /* Увеличиваем шрифт */
        }

        .conditions::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://cdn.er.ru/media/news/January2021/YAow6QMuFlHPJnl9nmLY.jpg');
            background-size: cover;
            background-position: center;
            filter: blur(8px);
            opacity: 0.5;
            z-index: -1;
        }

        .conditions a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }

        .timer {
            font-size: 18px;
            color: #333;
            margin-top: 15px;
        }

        h1,
        h2,
        h3 {
            color: #333;
        }

        .blocks-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .block {
            width: 300px;
            height: 450px;
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .block img {
            width: 160px;
            height: 160px;
            margin-bottom: 15px;
        }

        .block-dreamer {
            background-color: #fff7e7;
        }

        .block-helper {
            background-color: #e6f6ff;
        }

        .block::before {
            content: "❆ ❆ ❆ ❆ ❆";
            position: absolute;
            top: 0;
            left: 0;
            font-size: 2rem;
            color: rgba(255, 255, 255, 0.2);
            transform: translate(-50%, -50%) rotate(45deg);
        }

        a.role-link {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }

        a.role-link.disabled {
            background-color: #ccc;
            pointer-events: none;
        }

        @media (max-width: 768px) {
            .blocks-container {
                flex-direction: column;
                align-items: center;
            }
        }

        footer {
            text-align: center;
            margin: 20px 0;
            font-size: 0.9em;
            color: #777;
        }

        .checkbox {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 10px;
            position: relative;
        }

        .checkbox input {
            margin-right: 10px;
        }
    </style> <script>
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

        window.onload = startCountdown;

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
            startCountdown();
            generateSnowflakes();
        };
    </script>
<div class="body">
	<div class="header1">
	</div>
	<div class="container1">
		<div class="conditions">
			<h2>Ёлка желаний 2024-2025</h2>
			<p>
				Для продолжения ознакомьтесь с положением и подтвердите согласие.
			</p>
<p style="text-align: center; margin-top: 20px;">
    <a href="/elka-zhelaniy/assets/elka_zhelaniy.pdf" target="_blank" 
       style="
           display: inline-block; 
           padding: 10px 20px; 
           background-color: #4CAF50; 
           color: white; 
           text-decoration: none; 
           font-size: 1.0em; 
           border-radius: 8px; 
           box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); 
           transition: background-color 0.3s ease;">
			   Прочитать положение
    </a>
</p>
			<div class="checkbox">
 <input type="checkbox" id="consent" onchange="toggleLinks()"> <label for="consent">Я согласен с условиями акции</label>
			</div>
			<div id="error-message" class="error-message">
			</div>
			<div id="timer" class="timer">
			</div>
			<p>
				Акция начинается с 25 ноября 2024 года и завершается 31 января 2025 года.
			</p>

		</div>
		<h2 style="text-align: center; color:#f2f3f4">Выберите роль</h2>
		<div class="blocks-container">
			<div class="block block-dreamer">
 <img alt="Иллюстрация мечтателя" src="https://ctd-new.delion.ru/_next/static/media/home-dream.bd7b2895.svg">
				<h3>Загадать желание</h3>
				<p>
					Поделитесь новогодним желанием своего ребенка на сайте акции и дайте возможность увидеть её исполнителям.
				</p>
 <a href="https://xn--j1ab.xn--80aanbeohciex.xn--p1ai/trustee/referral?code=0fed4518-e18b-43a4-98dd-e9c4724e99db" class="role-link disabled" onclick="handleLinkClick(event)">Стать мечтателем</a>
			</div>
			<div class="block block-helper">
 <img alt="Иллюстрация исполнителя" src="https://ctd-new.delion.ru/_next/static/media/home-application.d6330fe0.svg">
				<h3>Исполнить желание</h3>
				<!--<p class="helper-message" style="color: red;">
					Будет доступно с 7 декабря 2024
				</p>-->
				<p>
					Станьте частью большого и доброго дела, подарив нуждающимся детям радость и новогоднее чудо.
				</p>
				 <a href="https://xn--j1ab.xn--80aanbeohciex.xn--p1ai/executor/referral?code=0fed4518-e18b-43a4-98dd-e9c4724e99db" class="role-link disabled" onclick="handleLinkClick(event)">Стать исполнителем</a>
			</div>
		</div>
 <footer>
	© 2024 Ёлка желаний Добрая Казань. </footer>
</div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>