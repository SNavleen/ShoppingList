<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
<?php
$wipe = fopen('/var/www/html/food.csv', 'w');
fclose($wipe);

$urlfrills="http://www.nofrills.ca/banners/publication/v1/en_CA/NOFR/current/3118/items?start=0&rows=54&tag=";

$optionsfrills = array(
	'http' =>array(
	'header' => "Host: www.nofrills.ca
User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:40.0) Gecko/20100101 Firefox/40.0
Accept: application/json
Accept-Language: en-US,en;q=0.5
Accept-Encoding: gzip, deflate
Content-Type: application/x-www-form-urlencoded
X-Requested-With: XMLHttpRequest
Referer: http://www.nofrills.ca/en_CA/flyers.banner@NOFR.storenum@3118.week@current.html
Cookie: cq5pr=CQ5_HER; SessionPersistence-publish=CLIENTCONTEXT%3A%3DvisitorId%3D%2CvisitorId_xss%3D%7CPROFILEDATA%3A%3D%7C; __utma=188733623.1212156381.1442643484.1442643484.1442669845.2; __utmc=188733623; __utmz=188733623.1442643484.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); storeProvienceCookie=ON; __utmb=188733623.38.8.1442673086596; NSC_qsdrif.mpcmbx.db_80=ffffffff0960541645525d5f4f58455e445a4a423660; NSC_LED_QSDRLS.MPCMBX.DB_80=ffffffffc3a0aa1f45525d5f4f58455e445a4a423660; __utmt_UA-11208484-6=1; __utmt_UA-11208484-36=1; __utmt_UA-52329251-1=1
Connection: keep-alive
Pragma: no-cache
Cache-Control: no-cache
Content-Length: 0",
	'method' => 'POST',
	//'content' => http_build_query($data),
	),
);
$contextfrills = stream_context_create($optionsfrills);
$resultfrills = file_get_contents($urlfrills, false, $contextfrills);
$arrayfrills = json_decode($resultfrills,true);

$urlbasic="http://local.flyerservices.com/MTR/FBSC/en/9fd33c0a-f79b-492c-8a31-dfff60b3991b/Product/ListByPage?page=1";
$optionsbasic = array(
	'http' =>array(
	'header' => "Host: local.flyerservices.com
User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:40.0) Gecko/20100101 Firefox/40.0
Accept: */*
Accept-Language: en-US,en;q=0.5
Accept-Encoding: gzip, deflate
X-Requested-With: XMLHttpRequest
Referer: http://local.flyerservices.com/MTR/FBSC/en/9fd33c0a-f79b-492c-8a31-dfff60b3991b/Product/Grid?page=5&storeId=4f8dba52-4f5e-43c4-85d9-f327d9753463
Cookie: 9fd33c0a-f79b-492c-8a31-dfff60b3991b_STATUS=ZOOM%7CFULL%7C4%7Cundefined%7C%7C%7Cfalse%7Cfalse%7C; NOFR_Store=04e8bd86-53c6-4c09-92ac-0245654ba18f; VID=c2f68f73-72d5-5fdc-c947-793ebf01a9c7; SESSIONIDNOFR=iyegpj0ajlskof05v4r1l40n; _ga=GA1.3.34cbfd76-0ef6-4825-bd6e-7298fe0469ea; SESSIONIDFBSC=ldp04kwcufocwce1qgrfi1be; FBSC_Store=4f8dba52-4f5e-43c4-85d9-f327d9753463; _gat=1
	Connection: keep-alive",
	'method' => 'GET',
	),
);

$contextbasic = stream_context_create($optionsbasic);
$resultbasic = file_get_contents($urlbasic, false, $contextbasic);
$arraybasic1 = json_decode($resultbasic,true);
		
$urlbasic="http://local.flyerservices.com/MTR/FBSC/en/9fd33c0a-f79b-492c-8a31-dfff60b3991b/Product/ListByPage?page=2";
$optionsbasic = array(
	'http' =>array(
	'header' => "Host: local.flyerservices.com
User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:40.0) Gecko/20100101 Firefox/40.0
Accept: */*
Accept-Language: en-US,en;q=0.5
Accept-Encoding: gzip, deflate
X-Requested-With: XMLHttpRequest
Referer: http://local.flyerservices.com/MTR/FBSC/en/9fd33c0a-f79b-492c-8a31-dfff60b3991b/Product/Grid?page=5&storeId=4f8dba52-4f5e-43c4-85d9-f327d9753463
Cookie: 9fd33c0a-f79b-492c-8a31-dfff60b3991b_STATUS=ZOOM%7CFULL%7C4%7Cundefined%7C%7C%7Cfalse%7Cfalse%7C; NOFR_Store=04e8bd86-53c6-4c09-92ac-0245654ba18f; VID=c2f68f73-72d5-5fdc-c947-793ebf01a9c7; SESSIONIDNOFR=iyegpj0ajlskof05v4r1l40n; _ga=GA1.3.34cbfd76-0ef6-4825-bd6e-7298fe0469ea; SESSIONIDFBSC=ldp04kwcufocwce1qgrfi1be; FBSC_Store=4f8dba52-4f5e-43c4-85d9-f327d9753463; _gat=1
	Connection: keep-alive",
	'method' => 'GET',
	),
);

$contextbasic = stream_context_create($optionsbasic);
$resultbasic = file_get_contents($urlbasic, false, $contextbasic);
$arraybasic2 = json_decode($resultbasic,true);

$urlbasic="http://local.flyerservices.com/MTR/FBSC/en/9fd33c0a-f79b-492c-8a31-dfff60b3991b/Product/ListByPage?page=3";
$optionsbasic = array(
	'http' =>array(
	'header' => "Host: local.flyerservices.com
User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:40.0) Gecko/20100101 Firefox/40.0
Accept: */*
Accept-Language: en-US,en;q=0.5
Accept-Encoding: gzip, deflate
X-Requested-With: XMLHttpRequest
Referer: http://local.flyerservices.com/MTR/FBSC/en/9fd33c0a-f79b-492c-8a31-dfff60b3991b/Product/Grid?page=5&storeId=4f8dba52-4f5e-43c4-85d9-f327d9753463
Cookie: 9fd33c0a-f79b-492c-8a31-dfff60b3991b_STATUS=ZOOM%7CFULL%7C4%7Cundefined%7C%7C%7Cfalse%7Cfalse%7C; NOFR_Store=04e8bd86-53c6-4c09-92ac-0245654ba18f; VID=c2f68f73-72d5-5fdc-c947-793ebf01a9c7; SESSIONIDNOFR=iyegpj0ajlskof05v4r1l40n; _ga=GA1.3.34cbfd76-0ef6-4825-bd6e-7298fe0469ea; SESSIONIDFBSC=ldp04kwcufocwce1qgrfi1be; FBSC_Store=4f8dba52-4f5e-43c4-85d9-f327d9753463; _gat=1
	Connection: keep-alive",
	'method' => 'GET',
	),
);

$contextbasic = stream_context_create($optionsbasic);
$resultbasic = file_get_contents($urlbasic, false, $contextbasic);
$arraybasic3 = json_decode($resultbasic,true);

$urlbasic="http://local.flyerservices.com/MTR/FBSC/en/9fd33c0a-f79b-492c-8a31-dfff60b3991b/Product/ListByPage?page=4";
$optionsbasic = array(
	'http' =>array(
	'header' => "Host: local.flyerservices.com
User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:40.0) Gecko/20100101 Firefox/40.0
Accept: */*
Accept-Language: en-US,en;q=0.5
Accept-Encoding: gzip, deflate
X-Requested-With: XMLHttpRequest
Referer: http://local.flyerservices.com/MTR/FBSC/en/9fd33c0a-f79b-492c-8a31-dfff60b3991b/Product/Grid?page=5&storeId=4f8dba52-4f5e-43c4-85d9-f327d9753463
Cookie: 9fd33c0a-f79b-492c-8a31-dfff60b3991b_STATUS=ZOOM%7CFULL%7C4%7Cundefined%7C%7C%7Cfalse%7Cfalse%7C; NOFR_Store=04e8bd86-53c6-4c09-92ac-0245654ba18f; VID=c2f68f73-72d5-5fdc-c947-793ebf01a9c7; SESSIONIDNOFR=iyegpj0ajlskof05v4r1l40n; _ga=GA1.3.34cbfd76-0ef6-4825-bd6e-7298fe0469ea; SESSIONIDFBSC=ldp04kwcufocwce1qgrfi1be; FBSC_Store=4f8dba52-4f5e-43c4-85d9-f327d9753463; _gat=1
	Connection: keep-alive",
	'method' => 'GET',
	),
);

$contextbasic = stream_context_create($optionsbasic);
$resultbasic = file_get_contents($urlbasic, false, $contextbasic);
$arraybasic4 = json_decode($resultbasic,true);

$urlbasic="http://local.flyerservices.com/MTR/FBSC/en/9fd33c0a-f79b-492c-8a31-dfff60b3991b/Product/ListByPage?page=5";
$optionsbasic = array(
	'http' =>array(
	'header' => "Host: local.flyerservices.com
User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:40.0) Gecko/20100101 Firefox/40.0
Accept: */*
Accept-Language: en-US,en;q=0.5
Accept-Encoding: gzip, deflate
X-Requested-With: XMLHttpRequest
Referer: http://local.flyerservices.com/MTR/FBSC/en/9fd33c0a-f79b-492c-8a31-dfff60b3991b/Product/Grid?page=5&storeId=4f8dba52-4f5e-43c4-85d9-f327d9753463
Cookie: 9fd33c0a-f79b-492c-8a31-dfff60b3991b_STATUS=ZOOM%7CFULL%7C4%7Cundefined%7C%7C%7Cfalse%7Cfalse%7C; NOFR_Store=04e8bd86-53c6-4c09-92ac-0245654ba18f; VID=c2f68f73-72d5-5fdc-c947-793ebf01a9c7; SESSIONIDNOFR=iyegpj0ajlskof05v4r1l40n; _ga=GA1.3.34cbfd76-0ef6-4825-bd6e-7298fe0469ea; SESSIONIDFBSC=ldp04kwcufocwce1qgrfi1be; FBSC_Store=4f8dba52-4f5e-43c4-85d9-f327d9753463; _gat=1
	Connection: keep-alive",
	'method' => 'GET',
	),
);

$contextbasic = stream_context_create($optionsbasic);
$resultbasic = file_get_contents($urlbasic, false, $contextbasic);
$arraybasic5 = json_decode($resultbasic,true);

$urlbasic="http://local.flyerservices.com/MTR/FBSC/en/9fd33c0a-f79b-492c-8a31-dfff60b3991b/Product/ListByPage?page=6";
$optionsbasic = array(
	'http' =>array(
	'header' => "Host: local.flyerservices.com
User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:40.0) Gecko/20100101 Firefox/40.0
Accept: */*
Accept-Language: en-US,en;q=0.5
Accept-Encoding: gzip, deflate
X-Requested-With: XMLHttpRequest
Referer: http://local.flyerservices.com/MTR/FBSC/en/9fd33c0a-f79b-492c-8a31-dfff60b3991b/Product/Grid?page=5&storeId=4f8dba52-4f5e-43c4-85d9-f327d9753463
Cookie: 9fd33c0a-f79b-492c-8a31-dfff60b3991b_STATUS=ZOOM%7CFULL%7C4%7Cundefined%7C%7C%7Cfalse%7Cfalse%7C; NOFR_Store=04e8bd86-53c6-4c09-92ac-0245654ba18f; VID=c2f68f73-72d5-5fdc-c947-793ebf01a9c7; SESSIONIDNOFR=iyegpj0ajlskof05v4r1l40n; _ga=GA1.3.34cbfd76-0ef6-4825-bd6e-7298fe0469ea; SESSIONIDFBSC=ldp04kwcufocwce1qgrfi1be; FBSC_Store=4f8dba52-4f5e-43c4-85d9-f327d9753463; _gat=1
	Connection: keep-alive",
	'method' => 'GET',
	),
);

$contextbasic = stream_context_create($optionsbasic);
$resultbasic = file_get_contents($urlbasic, false, $contextbasic);
$arraybasic6 = json_decode($resultbasic,true);

//sobeys
$test = curl -L "https://flyers.sobeys.com/flyers/sobeys-sobeysontario/grid_view/84535?type=2&locale=en&store_code=878&hide=special%2Cpub";
$testarray = json_decode($test,true);
echo $testarray;
$final = array();
//no frills
$i = 0;
while ($i < 53) {
	$out = fopen('/var/www/html/food.csv', 'a+');
	$title = $arrayfrills["flyerResponse"]["docs"][$i]["productTitle"];
	$price = $arrayfrills["flyerResponse"]["docs"][$i]["priceString"];
	$final[0] = "No Frills";
	$final[1] = $title;
	$final[2] = "700 Strasburg Road Kitchener, ON   N2E 2M2";
	$final[3] = $price;
	$i = $i + 1;
	fputcsv($out, $final);
	fclose($out);
} 
//food basic one
$i=0;
while ($i < 8) {
	$out = fopen('/var/www/html/food.csv', 'a+');
	$title = $arraybasic1["Products"][$i]["ProductTitle"];
	$price = $arraybasic1["Products"][$i]["Price"];
	$final[0] = "Food Basic";
	$final[1] = $title;
	$final[2] = "600 Laurelwood Drive Waterloo, ON N2V 0A2";
	$final[3] = $price;
	$i= $i + 1;
	fputcsv($out, $final);
	fclose($out);
} 
//food basic two
$i=0;
while ($i < 15) {
	$out = fopen('/var/www/html/food.csv', 'a+');
	$title = $arraybasic2["Products"][$i]["ProductTitle"];
	$price = $arraybasic2["Products"][$i]["Price"];
	$final[0] = "Food Basic";
	$final[1] = $title;
	$final[2] = "600 Laurelwood Drive Waterloo, ON N2V 0A2";
	$final[3] = $price;
	$i= $i + 1;
	fputcsv($out, $final);
	fclose($out);
}
//food basic 3 
$i=0;
while ($i < 18) {
	$out = fopen('/var/www/html/food.csv', 'a+');
	$title = $arraybasic3["Products"][$i]["ProductTitle"];
	$price = $arraybasic3["Products"][$i]["Price"];
	$final[0] = "Food Basic";
	$final[1] = $title;
	$final[2] = "600 Laurelwood Drive Waterloo, ON N2V 0A2";
	$final[3] = $price;
	$i= $i + 1;
	fputcsv($out, $final);
	fclose($out);
}
//food basic 4
$i=0;
while ($i < 24) {
	$out = fopen('/var/www/html/food.csv', 'a+');
	$title = $arraybasic4["Products"][$i]["ProductTitle"];
	$price = $arraybasic4["Products"][$i]["Price"];
	$final[0] = "Food Basic";
	$final[1] = $title;
	$final[2] = "600 Laurelwood Drive Waterloo, ON N2V 0A2";
	$final[3] = $price;
	$i= $i + 1;
	fputcsv($out, $final);
	fclose($out);
}  
//food basic 5
$i=0;
while ($i < 24) {
	$out = fopen('/var/www/html/food.csv', 'a+');
	$title = $arraybasic5["Products"][$i]["ProductTitle"];
	$price = $arraybasic5["Products"][$i]["Price"];
	$final[0] = "Food Basic";
	$final[1] = $title;
	$final[2] = "600 Laurelwood Drive Waterloo, ON N2V 0A2";
	$final[3] = $price;
	$i= $i + 1;
	fputcsv($out, $final);
	fclose($out);
} 
//food basic 6
$i=0;
while ($i < 10) {
	$out = fopen('/var/www/html/food.csv', 'a+');
	$title = $arraybasic6["Products"][$i]["ProductTitle"];
	$price = $arraybasic6["Products"][$i]["Price"];
	$final[0] = "Food Basic";
	$final[1] = $title;
	$final[2] = "600 Laurelwood Drive Waterloo, ON N2V 0A2";
	$final[3] = $price;
	$i= $i + 1;
	fputcsv($out, $final);
	fclose($out);
} 
$i=0;

//var_dump($array["flyerResponse"]["docs"][0]["productTitle"]);


?>
 </body>
</html>
