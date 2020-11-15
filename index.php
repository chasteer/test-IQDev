<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Калькулятор</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!--jQuery-->
    <script src="./jquery-3.4.1.min.js"></script>
    <!--Plugin JavaScript file-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
<main>
    <header>
        <div class="headerInfoBox">
            <div class="logoBox">
            </div>
            <div class="phoneBox">
                <a href="tel:8-800-100-5005">8-800-100-5005</a>
                <a href="tel:+7(3452)522-000">+7(3452)522-000</a>
            </div>
        </div>
        <div class="menuBox">
            <ul>
                <li><a href="#">Кредитные карты</a></li>
                <li class="activeMenuLi"><a href="#">Вклады</a></li>
                <li ><a href="#">Дебетовая карта</a></li>
                <li><a href="#">Страхование</a></li>
                <li><a href="#">Друзья</a></li>
                <li><a href="#">Интернет-банк</a></li>
            </ul>
        </div>
    </header>
    <div class="mainBox">
            <div class="breadcrumbs">
                <a href="#">Главная</a><span> →</span>
                <a href="#">Вклады</a><span> →</span>
                <a href="#" style="text-decoration: none">Калькулятор</a>
            </div>
            <div class="calcBox">
                <form>
                    <h1>Калькулятор</h1>
                    <p> <label for="currDate">Дата оформления вклада</label><input id="currDate" type="text" value=""></p>
                    <p><label for="sumDeposit">Сумма вклада</label><input id="sumDeposit" type="text"><input id="sumDepositRange" type="text" ></p>

                    <p>
                        <label for="depositTerm">Срок вклада</label>
                        <select name="depositTerm" id="depositTerm">
                            <option value="1">1 год</option>
                            <option value="2">2 года</option>
                            <option value="3">3 года</option>
                            <option value="4">4 года</option>
                            <option value="5">5 лет</option>
                        </select>

                    </p>
                    <p>
                        <label for="depositReplenishmentYesNo">Пополнение вклада</label>
                        <span>
                            <input type="radio" name="depositReplenishmentYesNo" id="depositReplenishmentNo" checked value="No">
                            <label for="depositReplenishmentNo">Нет</label>
                        </span>
                        <span>
                            <input type="radio" name="depositReplenishmentYesNo" id="depositReplenishmentYes" value="Yes">
                            <label for="depositReplenishmentYes">Да</label>
                        </span>
                    </p>
                    <p><label for="sumAddDeposit">Сумма пополнения вклада</label><input id="sumAddDeposit" type="text"><input id="sumAddDepositRange" type="text" ></p>
                    <p><button id="calculate">Рассчитать</button><span id="spanRes">Результат : </span><span id="res"> </span> </p>
                </form>
            </div>
    </div>
    <footer>
        <div class="footerMenuBox">
            <ul>
                <li><a href="#">Кредитные карты</a></li>
                <li><a href="#">Вклады</a></li>
                <li ><a href="#">Дебетовая карта</a></li>
                <li><a href="#">Страхование</a></li>
                <li><a href="#">Друзья</a></li>
                <li><a href="#">Интернет-банк</a></li>
            </ul>
        </div>
    </footer>
</main>
<script src="script.js"></script>
</body>
</html>