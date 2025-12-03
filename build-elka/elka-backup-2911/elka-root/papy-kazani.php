<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Папы Казани");
<body>
  <header class="gradient header">
    <div class="container">
      <div class="title-header">
        <h2>Папы Казани</h2>
      </div>
      <!-- /.title-header -->
      <div class="p-title-header">
        <p>Проект помощи многодетным семьям в трудной жизненной ситуации</p>
      </div>
      <!-- /.p-info -->
    </div>
    <!-- /.container -->
    <div class="header-btn">
      <a href="#openModal" class=" btn">Нужна помощь</a>
      <!-- HTML модального окна -->
      <div id="openModal" class="modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">Заполните информацию о семье</h3>
              <a href="#close" title="Close" class="close">×</a>
            </div>
            <div class="modal-body">
              <div class="ul-modal">
                <script src="https://yastatic.net/s3/frontend/forms/_/embed.js"></script><iframe
                  src="https://forms.yandex.ru/u/658d5d5973cee708e179ffb5/?iframe=1" frameborder="0"
                  name="ya-form-658d5d5973cee708e179ffb5" width="90%"></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- HTML модального окна -->
      <!-- HTML модального окна -->
      <div id="openModal1" class="modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">Как хотите помочь?</h3>
              <a href="#close" title="Close" class="close">×</a>
            </div>
            <div class="modal-body">
              <div class="ul-modal">
                <script src="https://yastatic.net/s3/frontend/forms/_/embed.js"></script><iframe
                  src="https://forms.yandex.ru/u/658d62a4c09c020a54d9d2e0/?iframe=1" frameborder="0"
                  name="ya-form-658d62a4c09c020a54d9d2e0" width="90%"></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- HTML модального окна -->

      <a href="#openModal1" class="btn">Помочь</a>
    </div>
    <!-- /.btn btn-help -->
  </header>
  <!-- /.header -->
  <content class="info-content">
    <div class="container">
      <h2> Кто может участвовать?</h2>
      <blockquote class="blockquote-1">
        <p>Многодетные семьи в трудной жизненной ситуации</p>
        <cite>город Казань</cite>
      </blockquote>
      <h2> Кому нужна помощь</h2>
    </div>
    <div class="container">
      <div class="cards">
        <div class="card">
          <div class="background">
            <img src="https://excurs.od.ua/wp-content/uploads/2014/10/odessa-2-774x387.jpg" alt="" />
          </div>
          <h4>Семья Давлетшиных</h4>
          <div class="description">
            <p>Семья просит приобрести диван, постельные принадлежности.
              У детей нет ученического стола.
            </p>

          </div>
          <div class="description">
            <ul>
              <li>
                <i class="fa fa-users"></i>
                <span>Дети - 6</span>
              <li>
                <i class="fa fa-coins"></i>
                <span>Общая сумма:<b>43.000&#8381</b></span>
              </li>
              <li>
                <i class="fa fa-plus"></i>
                <span>Диван</span>
              </li>
              <li>
                <i class="fa fa-plus"></i>
                <span>Постельные принадлежности</span>
              </li>
              <li>
                <i class="fa fa-plus"></i>
                <span>Ученический стол</span>
              </li>
              <div class="button-group">
                <a href="#openModal1" class="btn">Помочь</a>
              </div>
            </ul>


          </div>
          <p class="description">
            Семья живет в съемной квартире. Мебель только та, которая
            досталась при съеме квартиры. Старый диван, на котором спал
            старший сын сломался. Мать спит на полу, раскладывая матрас. Нет
            постельного белья, занавесок.
          </p>
        </div>
        <div class="card">
          <div class="background">
            <img src="https://excurs.od.ua/wp-content/uploads/2014/10/odessa-2-774x387.jpg" alt="" />
          </div>
          <h4>Семья Амировых</h4>
          <div class="description">
            <p>Дом деревянный, старый.
              В Детской комнате нет ремонта.
            </p>

          </div>
          <div class="description">
            <ul>
              <li>
                <i class="fa fa-users"></i>
                <span>Дети - 4</span>
              <li>
                <i class="fa fa-coins"></i>
                <span>Общая сумма:<b>~ 350.000&#8381</b></span>
              </li>
              <li>
                <i class="fa fa-plus"></i>
                <span>Ремонт:<b>200.000&#8381</b></span>
              </li>
              <li>
                <i class="fa fa-plus"></i>
                <span>Мебель:<b>150.000&#8381</b></span>
              </li>
              <li>
              </li>

              <div class="button-group">
                <a href="#openModal1" class="btn">Помочь</a>
              </div>
            </ul>


          </div>
          <p class="description">
            У Ирины (мама) инвалидность по онкологическому заболеванию, не работает. Трое несовершеннолетних детей.
            Сожитель (не родной отец детей) работает. Живут в частном доме, в очень скромных условиях в поселке Сухая
            река. Выращивают овощи, держат кур, стараются жить достойно.

          </p>
        </div>

      </div>
    </div>
    <!-- /.container -->
  </content>
  <!-- /.info-content -->
</body>
?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>