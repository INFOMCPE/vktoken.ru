<?php
//$_GET['option']  
if($_GET['code'] != null){
	$urlh = file_get_contents("https://oauth.vk.com/access_token?client_id=5768603&client_secret=kw4c8dolvvQ9ren95p9E&redirect_uri=http://vktoken.ru/tasker.php&code={$_GET['code']}"); 
        $url = json_decode($urlh); 
        $access_token = $url->access_token;
        if($url->access_token !== null){
echo "<head>
		<link rel=stylesheet href=css/framico.css> 
		<link rel=stylesheet href=https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<body>
	<center>
<h3 class=text-size-3>Токен:</h3><br>
		 <textarea cols=100 readonly rows=2> {$access_token}</textarea>
<a type=button class='btn blue' href=/>На главную</a>
</center>
</body>
";
}
if($url->access_token == null){
	$urlh = file_get_contents("https://oauth.vk.com/access_token?client_id=5768603&client_secret=secret&redirect_uri=http://vktoken.ru/tasker.php&code={$_GET['code']}"); 
        $url = json_decode($urlh); 
        echo "<head>
		<link rel=stylesheet href=css/framico.css> 
		<link rel=stylesheet href=https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<body>
	<center>
		<h3><Code>ОШИБКА</code></h3><br>
<a type=button class='btn blue' href=/>На главную</a>
</center>
</body>";
        }
}
if($_GET['code'] == null){
if($_POST['scope'] != null){
	$scope = $_POST['scope'];
	
     $data = array(
    "scope" => "$scope",
    );
	$html = "<head>
		<link rel=stylesheet href=css/framico.css> 
		<link rel=stylesheet href=https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
</head>
<body><center>
	<a type=button class='btn blue' href=https://oauth.vk.com/authorize?client_id=5768603&display=page&redirect_uri=http://vktoken.ru/tasker.php&scope={$data["scope"]}&response_type=code&v=5.60>Получить токен</a>
	</center>
</body>";
	echo $html;
}
}
if($_GET['error_reason'] == user_denied){
	echo "<head>
		<link rel=stylesheet href=css/framico.css> 
		<link rel=stylesheet href=https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css>
		
</head>
<body>
	<center>
	<h3 class=text-size-3>Вы отменили запрос на токен</h3>
	<p>Ответ вк: <code>{$_GET['error_description']}</code></p>
	<a type=button class='btn blue' href=/>На главную</a>
	</center>
	</body>
	
	";
	}
?>
