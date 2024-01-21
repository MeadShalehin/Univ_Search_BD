@extends('layouts.frontendpanel.master')

@section('links')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
@endsection

@section('content')
    <div class="breadcrumb-area">
        <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-3 pt-100 pb-95"
            style="background-image:url({{ asset('FrontendPanelAsset') }}/img/bg/breadcrumb-bg-3.jpg);">
            <div class="container">
                <h2>Universities</h2>
            </div>
        </div>
        <div class="breadcrumb-bottom">
            <div class="container">
                <ul>
                    <li><a href="{{ route('frontend_dashboard') }}">Home</a> <span><i class="fa fa-angle-double-right"></i><a
                                href="{{ route('frontend_university') }}">Universities</a></span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="event-area pt-60 pb-130">
        <div class="container">
            <div class="row mb-20">
                <div class="col-md-3">
                    <label for="location-select">Select a Location:</label>
                    <div class="shop-select">
                        <select id="location-select" onchange="handleLocationSelection()">
                            <option value="" disabled selected>Select a location</option>
                            <option value="mohammadpur">Mohammadpur</option>
                            <option value="notun-bazar">Notun Bazar</option>
                            <option value="bosila">Bosila</option>
                            <option value="current-location">Current Location</option>
                        </select>
                        {{--  <button onclick="reloadSelectedLocation()">Reload Location</button>  --}}

                    </div>

                </div>

                <div class="col-md-3">
                    <label for="distance-slider">Distance (meters):</label>
                    <input type="range" id="distance-slider" min="1000" max="10000" step="1000" value="5000" onchange="updateDistance()">
                    <span id="distance-value">5000 meters</span>
                </div>
            </div>
            <div id="map" style="height: 800px;"></div>
        </div>
    </div>
@endsection


@section('footer_js')
    <script>
        var map;
        var selectedLocation = 'current-location';
        var userLocationMarker;
        var userLocationCircle;
        var dist = 5000; // 10,000 meters (10 km)

        // Function to set the map view to the user's current location with marker and circle color
        function setMapViewToUserLocation(latitude, longitude, markerColor, circleColor) {
            {{--  console.log('Setting map view to:', latitude, longitude);  --}}

            if (!map) {
                map = L.map('map').setView([latitude, longitude], 13);

                // Add a base map layer (you can choose different tilesets)
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

            } else {
                map.setView([latitude, longitude], 13);
            }

            // Remove previous marker and circle if they exist
            if (userLocationMarker && userLocationCircle) {
                userLocationMarker.remove();
                userLocationCircle.remove();
            }

            // Create a marker for the user's location with the specified color
            userLocationMarker = L.marker([latitude, longitude], {
                icon: L.divIcon({
                    className: 'user-location-marker',
                    html: '<div></div>', // Empty div for the marker
                }),
            }).addTo(map);

            // Add CSS styling to the marker
            var userLocationMarkerCss = `
            .user-location-marker {
                background-color: ${markerColor};
                width: 25px;
                height: 41px;
                margin: -20px -12px; /* Adjust as needed for marker placement */
                border-radius: 5px; /* Rounded corners */
            }
        `;

            var style = document.createElement('style');
            style.type = 'text/css';
            style.appendChild(document.createTextNode(userLocationMarkerCss));
            document.head.appendChild(style);

            // Create a circle around the user's location with the specified color
            userLocationCircle = L.circle([latitude, longitude], {
                color: circleColor, // Border color
                fillColor: circleColor, // Fill color
                fillOpacity: 0.5, // Fill opacity
                radius: dist,
            }).addTo(map);

            fetch('/get-universities-geojson')
                .then(response => response.json())
                .then(data => {
                    // Use the fetched GeoJSON data here
                    var universitiesGeoJSON = data;

                    // Function to filter universities within a specified radius (10 km)
                    function filterUniversities(feature, selectedLatitude, selectedLongitude) {
                        {{--  console.log('Setting map view to:', selectedLatitude, selectedLongitude);  --}}

                        var distance = L.latLng(feature.geometry.coordinates[1], feature.geometry.coordinates[0])
                            .distanceTo(L.latLng(selectedLatitude, selectedLongitude)); // Use the user's location

                        return distance <= dist;
                    }

                    L.geoJSON(universitiesGeoJSON, {
                        onEachFeature: function(feature, layer) {
                            // Customize pop-up content for each university
                            var popupContent = `
                                <strong>${feature.properties.name}</strong><br>
                                ${feature.properties.description}<br>
                                <a href="${feature.properties.website}" target="_blank">Website</a>
                            `;
                            layer.bindPopup(popupContent);
                        },
                        filter: function(feature) {
                            return filterUniversities(feature, latitude,
                            longitude); // Pass the selected location's coordinates
                        } // Apply the filter function
                    }).addTo(map);
                })
                .catch(error => {
                    console.error('Error fetching GeoJSON data:', error);
                });


        }

        // Function to handle location selection from the dropdown
        function handleLocationSelection() {
            const locationSelect = document.getElementById('location-select');
            selectedLocation = locationSelect.value;
            reloadSelectedLocation(); // Call the function to apply the color change immediately
        }

        // Function to reload the selected location
        function reloadSelectedLocation() {
            // Clear existing map layers
            if (map) {
                map.eachLayer(function(layer) {
                    if (layer instanceof L.Marker || layer instanceof L.Circle || layer instanceof L.GeoJSON) {
                        map.removeLayer(layer);
                    }
                });
            }

            switch (selectedLocation) {
                case 'mohammadpur':
                    setMapViewToUserLocation(23.7509415, 90.3654296, 'blue', 'green');
                    break;
                case 'notun-bazar':
                    setMapViewToUserLocation(23.7927, 90.4020, 'blue', 'green');
                    break;
                case 'bosila':
                    setMapViewToUserLocation(23.7473392, 90.3452890, 'blue', 'green');
                    break;
                case 'current-location':
                    getCurrentLocation();
                    break;
                default:
                    alert('Please select a location.');
                    break;
            }
        }

        // Function to handle distance slider change
        function updateDistance() {
            const distanceSlider = document.getElementById('distance-slider');
            const distanceValue = document.getElementById('distance-value');
            dist = parseInt(distanceSlider.value);
            distanceValue.innerText = dist + ' meters';

            // Reload the selected location with the updated distance
            reloadSelectedLocation();
        }

        // Function to get the current location
        function getCurrentLocation() {
            if ("geolocation" in navigator) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    const my_latitude = position.coords.latitude;
                    const my_longitude = position.coords.longitude;
                    setMapViewToUserLocation(my_latitude, my_longitude, 'blue', 'green');
                });
            } else {
                alert("Geolocation is not available in your browser.");
            }
        }

        // Call the function to get the current location
        getCurrentLocation();
        // handleLocationSelection();
    </script>
@endsection
