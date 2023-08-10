<?php
    $url ="https://api.openweathermap.org/data/2.5/forecast?q=London&appid=a82f1c3aa55b0b86c03fddf7b9e8db96";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $result = curl_exec($ch);
    curl_close($ch);
    $result = json_decode($result,true);
    
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Weather App</title>
</head>
<body>
    
    <div class="container">
        <div class="current-info">

            <div class="date-container">
                <div class="time" id="time">
                <?php echo date(('g:i A'),$result['list'][0]['dt']) ?></span>
                </div>
                <div class="date" id="date">
                <?php echo date(('l, j F'),$result['list'][0]['dt']) ?>
                </div>

                <div class="others" id="current-weather-items">
                    <div class="weather-item">
                        <div>Humidity</div>
                        <div><?php echo $result['list'][0]['main']['humidity'] ?> %</div>
                    </div>

                    <div class="weather-item">
                        <div>Wind Speed</div>
                        <div><?php echo round(($result['list'][0]['wind']['speed']*3600)/1000) ?> km/h</div>
                    </div>
                    
                </div>
            </div>

            <div class="place-container">
                <div class="time-zone" id="time-zone"><?php echo $result['city']['name'] ?></div>
                <div id="country" class="country"><?php echo $result['city']['country'] ?></div>
            </div>
        </div>

        
    </div>

    <div class="future-forecast">
        <div class="today" id="current-temp">
            <img src="https://openweathermap.org/img/wn/<?php echo $result['list'][0]['weather'][0]['icon'] ?>@2x.png" alt="weather icon" class="w-icon">
            <div class="other">
                <div class="day"><?php echo date(('l'),$result['list'][0]['dt']) ?></div>
                <div class="temp">Highest <?php echo round($result['list'][0]['main']['temp_max']-273.15) ?> °C</div>
                <div class="temp">Lowest <?php echo round($result['list'][0]['main']['temp_min']-273.15) ?> °C</div>
            </div>
        </div>

        <div class="weather-forecast" id="weather-forecast">
            <div class="weather-forecast-item">
                <div class="day"><?php echo date(('D'),$result['list'][9]['dt']) ?></div>
                <img src="https://openweathermap.org/img/wn/<?php echo $result['list'][9]['weather'][0]['icon'] ?>@2x.png" alt="weather icon" class="w-icon">
                <div class="temp">Highest <?php echo round($result['list'][9]['main']['temp_max']-273.15) ?> °C</div>
                <div class="temp">Lowest <?php echo round($result['list'][9]['main']['temp_min']-273.15) ?> °C</div>
            </div>
            <div class="weather-forecast-item">
                <div class="day"><?php echo date(('D'),$result['list'][18]['dt']) ?></div>
                <img src="https://openweathermap.org/img/wn/<?php echo $result['list'][18]['weather'][0]['icon'] ?>@2x.png" alt="weather icon" class="w-icon">
                <div class="temp">Highest <?php echo round($result['list'][18]['main']['temp_max']-273.15) ?> °C</div>
                <div class="temp">Lowest <?php echo round($result['list'][18]['main']['temp_min']-273.15) ?> °C</div>
            </div>
            <div class="weather-forecast-item">
                <div class="day"><?php echo date(('D'),$result['list'][24]['dt']) ?></div>
                <img src="https://openweathermap.org/img/wn/<?php echo $result['list'][24]['weather'][0]['icon'] ?>@2x.png" alt="weather icon" class="w-icon">
                <div class="temp">Highest <?php echo round($result['list'][24]['main']['temp_max']-273.15) ?>°C</div>
                <div class="temp">Lowest <?php echo round($result['list'][24]['main']['temp_min']-273.15) ?> °C</div>
            </div>
            <div class="weather-forecast-item">
                <div class="day"><?php echo date(('D'),$result['list'][33]['dt']) ?></div>
                <img src="https://openweathermap.org/img/wn/<?php echo $result['list'][33]['weather'][0]['icon'] ?>@2x.png" alt="weather icon" class="w-icon">
                <div class="temp">Highest <?php echo round($result['list'][33]['main']['temp_max']-273.15) ?> °C</div>
                <div class="temp">Lowest <?php echo round($result['list'][33]['main']['temp_min']-273.15) ?> °C</div>
            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script src="script.js"></script>
</body>
</html>