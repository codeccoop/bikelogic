<?php
function bl_sc_embedded_map($atts = [], $content = null, $tag = '')
{
    $atts = array_change_key_case((array) $atts, CASE_LOWER);

    extract(shortcode_atts(
        array(
            'width' => null,
            'height' => null,
            'marker' => true,
            'lat' => 41.47861679478992,
            'lng' => 2.071680583439843,
            'zoom' => 14.7,
            'class' => null
        ),
        $atts,
        $tag
    ));

    $id = uniqid();

    $style = '';
    if ($height) {
        $style .= 'height: ' . $height . ';';
    }
    if ($width) {
        $style .= 'width: ' . $width . ';';
    }

    $classes = 'bl_embedded_map';
    if ($class) {
        $classes .= ' ' . $class;
    }

    $content = '<div id="map" class="' . $classes . '" style="' . $style . '"></div>';

    if (!wp_script_is('mapbox-gl-js')) {
        wp_enqueue_script('mapbox-gl-js');
    }

    if (!wp_script_is('mapbox-gl-css')) {
        wp_enqueue_style('mapbox-gl-css');
    }

    $script = '<script>
    document.addEventListener("DOMContentLoaded", function () {
     const map = L.map("map", {
        center: [' . $lat . ', ' . $lng . '],
        zoom: ' . $zoom . ',
        })
        L.tileLayer(`https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png`, {
        attribution: `Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors`,
        }).addTo(map)
        var marker = L.marker([' . $lat . ', ' . $lng . ']).addTo(map);
    });
        
    </script>';

    return $content . $script;
}

add_shortcode('embedded_map', 'bl_sc_embedded_map');
