<?php
    $weatherapi = new WeatherApi();
    $currentweather = $weatherapi->getWeather();
    # Wordpress Header
    get_header();
    # Wetter Wrapper
    #font awesome sun icon svg
    echo '<div class="wetter-wrapper">';
    #SVG Icon
    echo '
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M122.4 1.2C127.6-.9 133.4-.2 137.9 3l70.3 50.3L278.5 3c4.5-3.2 10.3-3.9 15.4-1.8s8.8 6.7 9.7 12.2l14.1 85.3L403 112.8c5.4 .9 10.1 4.6 12.2 9.7s1.4 10.9-1.8 15.4l-38.8 54.3c-2.2-.1-4.3-.2-6.5-.2c-23.2 0-45 6.2-63.8 17c.1-12.5-2.2-25.3-7.3-37.6c-20.3-49-76.4-72.2-125.4-52s-72.2 76.4-52 125.4c18.3 44.3 66 67.5 111.1 56.6c-36.3 18.2-62.8 53.3-69.1 94.9l-23.6 16.9c-4.5 3.2-10.3 3.9-15.4 1.8s-8.8-6.7-9.7-12.2L98.7 317.7 13.4 303.6c-5.5-.9-10.1-4.6-12.2-9.7S-.2 282.9 3 278.5l50.3-70.3L3 137.9c-3.2-4.5-3.9-10.3-1.8-15.4s6.7-8.8 12.2-9.7L98.7 98.7l14.1-85.3c.9-5.5 4.6-10.1 9.7-12.2zM149 232.7c-13.5-32.7 2-70.1 34.6-83.6s70.1 2 83.6 34.6s-2 70.1-34.6 83.6s-70.1-2-83.6-34.6zM639.9 431.9c0 44.2-35.8 80-80 80H288c-53 0-96-43-96-96c0-47.6 34.6-87 80-94.6l0-1.3c0-53 43-96 96-96c34.9 0 65.4 18.6 82.2 46.4c13-9.1 28.8-14.4 45.8-14.4c44.2 0 80 35.8 80 80c0 5.9-.6 11.7-1.9 17.2c37.4 6.7 65.8 39.4 65.8 78.7z"/></svg>';
    # Custom Field Stadt
    echo '<h1 class="stadt">' . $sun . get_post_meta(get_the_ID(), 'stadt', true) . '</h1>';
    # Custom Field Lat
    echo '<hr><div class="meta-wrapper"><p class="wp-lat">Latitude: ' . get_post_meta( get_the_ID(), 'lat', true ) . '</p>';
    #Custom Field Long
    echo '<p class="wp-long">Longitude: ' . get_post_meta( get_the_ID(), 'long', true ) . '</p>';
    #Custom Field plz
    echo '<p class="wp-plz">Plz: ' . get_post_meta( get_the_ID(), 'plz', true ) . '</p></div>';
    #Get Weather from openweatermap api 3.0
    # Output Current Weather Description
    
    echo '<hr><p class="wp-description">' . $currentweather['description'] . '</p>';
    # Output Current Weather Temp
    echo '<p class="wp-temp">' . $currentweather['temp'] . ' °C</p>';
    # Output Current Weather Humidity
    echo '<p class="wp-humidity">' . $currentweather['humidity'] . '% Luftfeuchtigkeit </p>';
    # Output Current Weather Wind
    echo '<p class="wp-wind">' . $currentweather['wind'] . 'km/h Windgeschwindigkeit</p>';
    # Ende Wetter Wrapper
    echo '</div>';



    #Wordpress Footer
    get_footer();
