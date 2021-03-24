
<?php

$curl = curl_init();
$url = 'https://catalog.onliner.by/sdapi/catalog.api/search//notebook';
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true); //передача в качестве строки
$result = curl_exec($curl);// результат
curl_close($curl);
$array = json_decode($result,true);
echo '<pre>';
print_r($array);
echo '<pre>';
foreach ($array['products'] as $arItem) {
   // foreach ($item as $key){
		//$desc = $values->name;
       echo '<pre>';
      print_r($arItem);
        echo '<pre>';
    //}

}
//prices->price_min->amount
