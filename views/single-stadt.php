<?php
    $currentweather = $weatherplugin->getWeather();
    # Wordpress Header
    get_header();
    # Wetter Wrapper
    echo '<div class="wetter-wrapper">';
    # Output Current Weather Icon
    echo '<img class="weather-icon" src="' . $currentweather['icon'] . '" alt="Weather Icon">';
    # Custom Field Stadt
    echo '<h1 class="stadt">' . get_post_meta(get_the_ID(), 'stadt', true) . '</h1>';
    # Custom Field Lat
    echo '<hr><div class="meta-wrapper"><p class="wp-lat">Latitude: ' . get_post_meta( get_the_ID(), 'lat', true ) . '</p>';
    #Custom Field Long
    echo '<p class="wp-long">Longitude: ' . get_post_meta( get_the_ID(), 'long', true ) . '</p>';
    #Custom Field plz
    echo '<p class="wp-plz">Plz: ' . get_post_meta( get_the_ID(), 'plz', true ) . '</p></div>';
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
