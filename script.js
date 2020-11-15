$(document).ready(function () {


    //Формирование хлебных крошек

    //////////////////////////////////////////////////////
    //Дата ПИКЕР
    $("#currDate").datepicker();//Дата пикер
    //Нажатие на дата пикер
    $("#currDate").keydown(function (e) {
        e.preventDefault();
    })
    ////////////////////////////////////////////////////

    ///////////////////////////////////////////////////
    //Sliders
    //Сумма вклада
    $('#sumDepositRange').ionRangeSlider({
        min: 1000,
        max: 3000000,
        from: 10000,
        skin: "big",
       onStart:function (data) {
            $("#sumDeposit").val(data.from)
        },
        onChange: function (data) {
            $("#sumDeposit").val(data.from)
        }

    });

    let sumDepositRange = $("#sumDepositRange").data("ionRangeSlider"); //Сумма вклада
    //Сумма пополнения вклада
    $('#sumAddDepositRange').ionRangeSlider({
        min: 1000,
        max: 3000000,
        from: 10000,
        skin: "big",
        onStart:function (data) {
            $("#sumAddDeposit").val(data.from)
        },
        onChange: function (data) {
            $("#sumAddDeposit").val(data.from)
        }
    });

    let sumAddDepositRange = $("#sumAddDepositRange").data("ionRangeSlider");   //Сумма пополнения вклада
    //валидация для Суммы вклада
    $("#sumDeposit").keyup(function (e) {
        $(this).val($(this).val().replace(/[^\d].+/, ""));
        if(inputValidate(e))
        {
           sumDepositRange.update({from:$("#sumDeposit").val()})
        }
    })
    //Валидация для пополнения вклада
    $("#sumAddDeposit").keyup(function (e) {
        $(this).val($(this).val().replace(/[^\d].+/, ""));
        if(inputValidate(e))
        {
            sumAddDepositRange.update({from: $("#sumAddDeposit").val(),min: 1000,
                max: 3000000,})
        }
    })
    //Проверка на range.MAX Сумма вклада
    $("#sumDeposit").keypress(function (e){
        if(parseInt($("#sumDeposit").val()) > 300000)
           e.preventDefault()
    })
    //Проверка на range.MAX Пополнение Вклада
    $("#sumAddDeposit").keypress(function (e){
        if(parseInt($("#sumAddDeposit").val()) > 300000)
            e.preventDefault()
    })
    //////////////////////////////////////////////////////////////////////////////////////////

    /////////////////////////////////////////////////////////////////////////////////////////
    //Кнопка отправки
    $("#calculate").click(function (event) {
        submitClick(event);
    })
    /////////////////////////////////////////////////////////////////////////////////////////
})

//валидация для number only
function inputValidate(e) {
    if (e.which == 8 ||
        e.which  == 9 ||
        e.which  == 13 ||
        e.which  == 46 ||
        e.which  == 110 ||
        e.which  == 190 ||
        (e.which  >= 35 && e.which  <= 40) ||
        (e.which  >= 48 && e.which  <= 57) ||
        (e.which  >= 96 && e.which  <= 105)
    ) {
        return true;
    }
    else
        return false;
}

//валидация данных до отправки
function submitClick(event) {
    event.preventDefault();
    let valid = true;
    let currDate = $("#currDate").val();
    let sumDeposit = parseInt($("#sumDeposit").val());
    let depositTerm = $("#depositTerm").val();
    let depositReplenishmentYesNo = $('input[name="depositReplenishmentYesNo"]:checked').val();
    let sumAddDeposit = parseInt($("#sumAddDeposit").val());
    if(sumDeposit < 1000 || sumDeposit > 3000000)
    {
        alert("Сумма вклада указана неверно");
        valid = false;
    }
    if(depositReplenishmentYesNo == "No")
        sumAddDeposit = 0;
    else if(depositReplenishmentYesNo == "Yes" && (sumAddDeposit < 1000 || sumAddDeposit > 3000000))
    {
        alert("Сумма пополнения вклада указана неверно");
        valid = false;
    }
    if(currDate == "")
    {
        alert("Дата не указана");
        valid = false;
    }
    if(valid) {

        let _array = [currDate,sumDeposit,depositTerm,sumAddDeposit];
        calc(_array);
    }
}
//отправка и получение данных из calc.php
function calc(_array) {
    $.ajax({
        url:"calc.php",
        type:"POST",
        data: { array: _array },
        success:function (data) {
            $("#res").empty();
            $("#res").append(data);
        }

    })
}