<?php
function bl_sc_embedded_map($atts = array(), $content = null)
{
    $atts = array_change_key_case((array) $atts, CASE_LOWER);
    extract(shortcode_atts(
        array(
            'width' => '400px',
            'height' => '280px',
            'marker' => true,
            'lat' => 41.50281,
            'lng' => 1.81346,
            'zoom' => 14.5
        ),
        $atts
    ));

    $id = uniqid();
    $content = '<div id="' . $id . '" style="width: ' . $width . '; height: ' . $height . ';"></div>';



    if (!wp_script_is('mapbox-gl-js')) {
        wp_enqueue_script('mapbox-gl-js');
    }

    if (!wp_script_is('mapbox-gl-css')) {
        wp_enqueue_style('mapbox-gl-css');
    }

    $script = "<script>
    document.addEventListener('DOMContentLoaded', function () {
        mapboxgl.accessToken = 'pk.eyJ1Ijoib3J6b2MiLCJhIjoiY2lzZGEzNXhmMDAwdjJvcGZ4NXU2bzU0NCJ9.RzrN_JISe561WfI1SjWCvw';
        const map = new mapboxgl.Map({
         container: '" . $id . "', // container ID
         style: 'mapbox://styles/mapbox/streets-v11', // style URL
         center: [" . $lng . "," . $lat . "], // starting position [lng, lat]
         zoom: " . $zoom . ", // starting zoom
        });
        map.addControl(new mapboxgl.NavigationControl());
        new mapboxgl.Marker().setLngLat([" . $lng . ", " . $lat . "]).addTo(map);
    });
    </script>";

    return $content . $script;
}

add_shortcode('embedded_map', 'bl_sc_embedded_map');
