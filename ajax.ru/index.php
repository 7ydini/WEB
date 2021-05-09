<?php
require_once('city.php'); // подключаем список с городами
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
// возвращаем список городов
if ($action == 'getCity'){
    if (isset($city[$_GET['country']])){
        echo json_encode($city[$_GET['country']]); // возвраащем данные в JSON формате;
    }
    else{
        echo json_encode(array('Выберите страну'));
    }
    exit;
}
// выводим пришедшие данные
if ($action == 'postResult'){
    echo '<pre>' . htmlspecialchars(print_r($_POST, true)) . '</pre>';
    exit;
}
?>
<script type="text/javascript">
        function loadCity(select){
            var citySelect = $('select[name="city"]');
            citySelect.attr('disabled', 'disabled'); // делаем список городов не активным      
            // послыаем AJAX запрос, который вернёт список городов для выбранной страны
            $.getJSON('index.php', {action:'getCity', country:select.value}, function(cityList){
                citySelect.html(''); // очищаем список городов
                // заполняем список городов новыми пришедшими данными
                $.each(cityList, function(i){
                    citySelect.append('<option value="' + i + '">' + this + '</option>');
                });             
                citySelect.removeAttr('disabled'); // делаем список городов активным
            });
        }
    </script>
<!DOCTYPE html>
<html>
<head>
    <title>Страна - город</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    
    <style>
        body {font-family:Verdana; font-size:12px;}
    </style>
    
</head>
<body>
    <form action="index.php" method="post">
        <h1>Загрузка городов с использованием AJAX</h1>
			<div>Страна</div>
			<div>
        <select name="country" onchange="loadCity(this)" style="width:200px;">
            <option></option>
            <?php
            // заполняем список стран
            foreach ($city as $country => $cityList){
                echo '<option value="' . $country . '">' . $country . '</option>' . "\n";
            }
            ?>
        </select>
                            </div>
        <div>
            <div>Город</div>
        <select name="city" disabled="disabled" style="width:200px;">
            <option>Выберите город</option>
        </select>
        </div>
    </form>
</body>
</html>
