<?php
/**
 * Section: Map
 */

$address = get_field('map_address') ?: '349 Doi Can Street, Ngoc Ha Ward, Hanoi City';
$phone = get_field('map_phone') ?: 'T: (+84) 28 3622 2265';
$lat = get_field('map_latitude') ?: '21.0366';
$lng = get_field('map_longitude') ?: '105.8155';
$marker_icon = get_field('map_marker_icon') ?: get_template_directory_uri() . '/assets/images/logo fslife.png';
$embed_code = get_field('map_embed_code');

?>
<section class="map-section pb-24 bg-white">
    <div class="container mx-auto px-6">
        <!-- Header Info -->
        <div class="text-center mb-12">
            <h2 class="text-xl md:text-2xl font-bold text-brand-blue mb-2 tracking-tight">
                <?php echo esc_html($address); ?>
            </h2>
            <p class="text-sm font-medium text-brand-black-600">
                <?php echo esc_html($phone); ?>
            </p>
        </div>

        <!-- Map Container -->
        <div class="map-container relative w-full h-[450px] lg:h-[600px] rounded-3xl overflow-hidden shadow-2xl transition-all duration-700 border-8 border-white"
            data-aos="zoom-in" id="leaflet-map" data-lat="<?php echo esc_attr($lat); ?>"
            data-lng="<?php echo esc_attr($lng); ?>" data-marker="<?php echo esc_url($marker_icon); ?>"
            data-address="<?php echo esc_attr($address); ?>">
            <?php if ($embed_code && empty($lat)): ?>
                <?php echo $embed_code; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const mapElement = document.getElementById('leaflet-map');
        if (!mapElement) return;

        const lat = parseFloat(mapElement.dataset.lat);
        const lng = parseFloat(mapElement.dataset.lng);
        const markerUrl = mapElement.dataset.marker;
        const address = mapElement.dataset.address;

        if (isNaN(lat) || isNaN(lng)) {
            console.error('Invalid coordinates for map');
            return;
        }

        // Initialize Map
        const map = L.map('leaflet-map', {
            scrollWheelZoom: false
        }).setView([lat, lng], 15);

        // Add Tile Layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Custom Marker Icon with Blue Square Background
        const customIcon = L.divIcon({
            className: 'custom-map-marker',
            html: `
            <div class="marker-container">
                <img src="${markerUrl}" alt="Marker Logo">
            </div>
            <div class="marker-arrow"></div>
        `,
            iconSize: [60, 60],
            iconAnchor: [30, 70], // Anchor at the bottom
            popupAnchor: [0, -70]
        });

        // Add Marker
        L.marker([lat, lng], { icon: customIcon }).addTo(map)
            .bindPopup(`<div class="text-center font-bold text-brand-blue">${address}</div>`);
    });
</script>

<style>
    #leaflet-map {
        width: 100%;
        height: 100%;
        z-index: 1;
        height: 600px;
    }

    .leaflet-container {
        background: #f8f9fa;
    }

    /* Custom Marker Styles */
    .custom-map-marker {
        background: transparent !important;
        border: none !important;
        position: relative;
    }

    .marker-container {
        width: 60px;
        height: 60px;
        background-color: #2B3C54;
        /* brand-blue */
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        overflow: hidden;
        border-radius: 5px;
        border: 2px solid white;
        animation: marker-bounce 2s ease-in-out infinite;
    }

    .marker-container img {
        max-width: 100%;
        width: 100px !important;
        max-height: 100%;
        object-fit: contain;
    }

    .marker-arrow {
        width: 0;
        height: 0;
        border-left: 10px solid transparent;
        border-right: 10px solid transparent;
        border-top: 10px solid #2B3C54;
        position: absolute;
        bottom: -8px;
        left: 50%;
        transform: translateX(-50%);
        animation: arrow-bounce 2s ease-in-out infinite;
    }

    /* Pulse Effect */
    .custom-map-marker::before {
        content: '';
        position: absolute;
        top: 30px;
        left: 30px;
        width: 20px;
        height: 20px;
        background: rgba(43, 60, 84, 0.6);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        z-index: 1;
        animation: marker-pulse 2s ease-out infinite;
        pointer-events: none;
    }

    @keyframes marker-bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }
    
    @keyframes arrow-bounce {
        0%, 100% { transform: translateY(0) translateX(-50%); }
        50% { transform: translateY(-10px) translateX(-50%); }
    }

    @keyframes marker-pulse {
        0% {
            width: 20px;
            height: 20px;
            opacity: 0.8;
        }
        100% {
            width: 100px;
            height: 100px;
            opacity: 0;
        }
    }
</style>