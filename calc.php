<?php


//summn = summn-1 + (summn-1 + summadd)daysn(percent / daysy)
//4.5.2 где summn – сумма на счете на месяц n (руб),
//
//4.5.3 summn-1 – сумма на счете на конец прошлого месяца
//
//4.5.4 summadd – сумма ежемесячного пополнения
//
//4.5.5 daysn – количество дней в данном месяце, на которые приходился вклад
//
//4.5.6 percent – процентная ставка банка - 10%
//
//4.5.7 daysy – количество дней в году.
//
//4.5.8 Если в поле «Пополнение вклада» стоит «нет», данные «summadd» не используются.

$arrVis = array("01"=>31,"02"=>29,"03"=>31,"04"=>30,"05"=>31,"06"=>30,"07"=>31,"08"=>31,"09"=>30,"10"=>31,"11"=>30,"12"=>31);
$arrNoVis = array("01"=>31,"02"=>28,"03"=>31,"04"=>30,"05"=>31,"06"=>30,"07"=>31,"08"=>31,"09"=>30,"10"=>31,"11"=>30,"12"=>31);
$arrMonth = array("01","02","03","04","05","06","07","08","09","10","11","12");

define("percent", 0.1);
$arr = $_REQUEST['array'];// [0]=> Дата yyyy\mm\dd [1]=> Сумма вклада [2]=> Срок вклада [3]=> Сумма пополнения вклада (0 либо [1000;3000000])
$daysn = preg_split("/\//",$arr[0])[1];
$summn_1 = $arr[3];
$daysy = 0;
$summn =$arr[1];
$year = preg_split("/\//",$arr[0])[2];
$arrdays = array();

  /*  $summn_1 = $summn_1 + ($summn_1)*$daysn*(percent/$daysy);
    $summn+=$summn_1;*/

$month = preg_split("/\//",$arr[0])[0];
$j0 = (int)$month - 1;
$j = (int)$month - 1;

for($i =0; $i<$arr[2]*12;$i++)
{
    if($i%12 == 0)
    {
        if((bool) date('L', mktime(0, 0, 0, 1, 1,$year)))
        {
            $arrdays = $arrVis;
            $daysy = 365;
        }
        else
        {
            $arrdays = $arrNoVis;
            $daysy = 366;
        }
    }

    $summn += ($summn + $summn_1)*$arrdays[$month]*(percent/$daysy);
    $month =  $arrMonth[$j-1];
    if($j < 12)
    $j++;
    elseif($j == 12)
    $j = 1;
}
print (int)$summn . " руб.";

