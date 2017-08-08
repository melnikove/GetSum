<?php
	include 'getSum.php';

	
    $totalSum=0;
    
	$dateFrom=$_POST['dateFrom'];
	$dateTo=$_POST['dateTo'];
	
    if (is_numeric($dateFrom) & is_numeric($dateTo)) {
    	if ($dateFrom<=$dateTo) {
			$sumArr=getAllClientsSum($dateFrom, $dateTo);
   			 //print_r($sumArr);
			echo '<br><h1>Сводная таблица сумму сделок по клиентам:</h1>';
			echo '<table border=3 cellspacing=0 cellpadding=0>';
			echo '<tr>';
			echo '<td width=30 align="center">Id</td>';
			echo '<td width=170 align="center">Name</td>';
			echo '<td width=170 align="center">Сумма(руб.)</td>';
	
			foreach ($sumArr as $sum) {
				echo '<tr>';
				echo '<td width=20 align="center">' . $sum['id'] . '</td>';
				echo '<td width=90 align="center">' . $sum['name'] . '</td>';
        		echo '<td width=90 align="center">' . $sum['Sum'] . '</td>';
        		echo '</tr>';
        		$totalSum=$totalSum+$sum['Sum'];
			}
			echo '<tr><td colspan=3 align="right">Общая сумма(руб.): ' . $totalSum . '<tr><td></table>';
		}
		else { echo '<h1>Дата от должна быть меньше или равно даты до!</h1>'; }
	} else { echo '<h1>Введите корректные данные!</h1>'; }
?>