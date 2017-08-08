<?php
		
	function getClosedLeadsArray($accountKey)
	{
		require_once(__DIR__ . '/vendor/autoload.php');

		// Configure API key authorization: api_key
		Introvert\Configuration::getDefaultConfiguration()->setApiKey('key', $accountKey);
		
		$api = new Introvert\ApiClient();
		$crm_user_id = array(); // int[] | фильтр по id ответственного
		$status[] =142 ; // int[] | фильтр по id статуса
		$id = array(); // int[] | фильтр по id
		$ifmodif = ""; // string | фильтр по дате изменения. timestamp или строка в формате 'D, j M Y H:i:s'
		$count = 1000; // int | Количество запрашиваемых элементов
		$offset = 0; // int | смещение, относительно которого нужно вернуть элементы

		try {
   			$result = $api->lead->getAll($crm_user_id, $status, $id, $ifmodif, 0, $offset);
   			//print_r($result);
		} catch (Exception $e) {
    		echo 'Exception when calling LeadApi->getAll: ', $e->getMessage(), PHP_EOL;
		}
 		
 		return $result['result']; 
	}

	function getClientSum($dateFrom, $dateTo, $apiKey)
	{
	    $dealSum=0; 
		$closedDeals=getClosedLeadsArray($apiKey);

		$closedDeal=array();
	    //print_r($closedDeals);
 		foreach ($closedDeals as $closedDeal) {
    	
    		if  (($closedDeal['date_close']>=$dateFrom) & ($closedDeal['date_close']<=$dateTo))
    		{
//  			$i++;
    			$price=(int)$closedDeal['price'];
    			$dealSum=$dealSum+$price;
       		 	//echo '<br>' . 'N=' . $i . '   id=' . $closedDeal['id'] . '   price:' . $price . '<br>';
    		}
    	}
//  echo '<br>Summa:' . $dealSum . '<br>';
    	return $dealSum;
    }

    function getClients()
    {
    	$clients = array("1" => array(//здесь нужно ввести параметры доступа к системам
       				 	 "id" => 1,
            			 "name" => "",
           				 "apiKey" => "",
        			 ),
        			 "2" => array(
        			 	 "id" => 2,
            			 "name" => "",
            			 "apiKey" => "",
        			 )
                    );
    	return $clients;
	}

    

    function getAllClientsSum($dateFrom, $dateTo)
    {
    	$clients=getClients();
    	$generalSumArr=array();
    	$client=array();
    	
    	foreach ($clients as $client) {
    		//echo '<br>client id=' . $client['id'] . '   client name=' . $client['name'] . '   api=' . $client['apiKey'] . '<br>';
    		$generalSum['id']=$client['id'];
    		$generalSum['name']=$client['name'];
    		$generalSum['Sum']=getClientSum($dateFrom, $dateTo, $client['apiKey']);
    		$generalSumArr[]=$generalSum;
    		//echo '<br>';
    		//print_r($generalSum);
    		//echo '<br>';
    	 }

    	
    	//print_r($generalSumArr);
    	return $generalSumArr;
    }
?>