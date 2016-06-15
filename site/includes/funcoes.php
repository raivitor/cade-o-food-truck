<?php

$url = $_SERVER['HTTP_HOST']."/ft2/index.php/";

function curl_get($url, $dados){
	$ch = curl_init();
	 
	//Monta a URL
	$url = $url . '?' . http_build_query($dados);
	 
	//envia a URL como parâmetro para o cURL;
	print_r(curl_setopt($ch, CURLOPT_URL, $url));
}


function curl_post($url, $dados){
	$ch = curl_init();
	// informar URL e outras funções ao CURL
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	// Acessar a URL e imprimir a saída
	$result = curl_exec($ch);
	$result = json_decode($result);
	curl_close($ch);
	return $result;
}


function curl_put($url, $dados){
	$ch = curl_init($url);

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
	curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($dados));

	$result = curl_exec($ch);
    $result = json_decode($result);
	curl_close($ch);
	return $result;	
}

function curl_del($url){
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);
    $result = json_decode($result);
    curl_close($ch);
    return $result;
}

?>