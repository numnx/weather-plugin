<?php
class WeatherApi
{
    #Get Weather from openweathermap.org with Get Request
    public function getWeather() {
        $lat = get_post_meta(get_the_ID(), 'lat', true);
        $long = get_post_meta(get_the_ID(), 'long', true);
        $api_key = '1fc506591f0750007a96ca023f2bd11c';
        $url = 'https://api.openweathermap.org/data/2.5/weather?lat=' . $lat . '&lon=' . $long . '&exclude=minutely,hourly&appid=' . $api_key . '&units=metric&lang=de';
        $response = wp_remote_get($url);
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body);
        $description = $data->weather[0]->description;
        $weather = $data->weather[0]->main;
        $humidity = $data->main->humidity;
        $wind = $data->wind->speed;
        $temp = $data->main->temp;
        $icon = $data->weather[0]->icon;
        $iconUrl = "http://openweathermap.org/img/w/$icon.png";
        $result = array(
            'description' => $description,
            'temp' => $temp,
            'humidity' => $humidity,
            'wind' => $wind,
            'icon' => $iconUrl
        );
        return $result;
    }
}