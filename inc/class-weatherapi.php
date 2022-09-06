<?php
class WeatherApi
{
    public function getWeather()
    {
        #Get Weather from openweatermap api
        $lat = get_post_meta(get_the_ID(), 'lat', true);
        $long = get_post_meta(get_the_ID(), 'long', true);
        $api_key = '1fc506591f0750007a96ca023f2bd11c';
        $url = 'https://api.openweathermap.org/data/2.5/weather?lat=' . $lat . '&lon=' . $long . '&exclude=minutely,hourly&appid=' . $api_key . '&units=metric&lang=de';
        $content = file_get_contents($url);
        $data = json_decode($content, true);
        $weather = array(
            'description' => $data['weather'][0]['description'],
            'temp' => $data['main']['temp'],
            'humidity' => $data['main']['humidity'],
            'wind' => $data['wind']['speed'],
            'icon' => $data['weather'][0]['icon'],
        );
        return $weather;
    }
}
