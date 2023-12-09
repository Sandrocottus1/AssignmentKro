<!DOCTYPE html>
<html>
<head>
    <title>Draggable Marker and Latitude Longitude</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<header>
        <h2 class="logo"><a href="login page.php">AssignmentKaro.com</a></h2>
        <nav class="navigation">
            <a href="#">HOME</a>
            <a href="#">SERVICES</a>
            <a href="#">CONTACT</a>
            <button class="btnLogin-popup">Your Profile</button>
        </nav> 
    </header>
    <div class="head1">
        Mark Your Location
    </div>
    <div id="circular-map"></div>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <style>
        #circular-map{
            width: 500px;
            height: 500px;
            border-radius: 75%;
            overflow: hidden;
            margin-top: 100px;
            margin-left: -300px;
            border: 4px solid black ;        
        }
    </style>
    <input type="hidden" name="username">
    <div id="coordinates" class="coords">Latitude: 0.0000, Longitude: 0.0000</div>
    <div class="cont">
    <button id="submitBtn" class='btn btn1' name='btn'>Save User location</button>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var map = L.map('circular-map').setView([0, 0], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
        var marker = L.marker([0, 0], { draggable: true }).addTo(map);
        function getCurrentLocation(){
            if('geolocation'in navigator){
                navigator.geolocation.getCurrentPosition(
                    function(position){
                        var lat=position.coords.latitude;
                        var lng=position.coords.longitude;
                        marker.setLatLng([lat,lng]);
                        map.setView([lat,lng])
                    }
                )
            }
        }
        map.locate({
            setView: true,
            maxZoom: 15,
            watch: true,
            enableHighAccuracy: true
        });
        map.on('dblclick', function(event) {
            var currentZoom = map.getZoom();
            var newZoom = currentZoom + 1;
            var clickedLatLng = event.latlng;
            map.setView(clickedLatLng, newZoom);
        });
        map.on('click', function(event) {
            marker.setLatLng(event.latlng);
        });
        
        
        function updateMarkerPosition(position) {
            var lat = position.coords.latitude;
            var lng = position.coords.longitude;
            marker.setLatLng([lat, lng]);
            map.setView([lat, lng], map.getZoom());
            updateCoordinates(lat, lng);
        }

        function updateCoordinates(lat, lng) {
            var coordinatesDiv = document.getElementById('coordinates');
            coordinatesDiv.textContent = 'Latitude: ' + lat.toFixed(4) + ', Longitude: ' + lng.toFixed(4);
        }
        document.addEventListener('DOMContentLoaded', function() {
            if ("geolocation" in navigator) {
                navigator.geolocation.getCurrentPosition(updateMarkerPosition);
            } else {
                console.error('Geolocation is not supported by this browser.');
            }
        });
        marker.on('dragend', function(event) {
            var updatedLatLng = event.target.getLatLng();
            updateCoordinates(updatedLatLng.lat, updatedLatLng.lng);
        });

        document.getElementById('submitBtn').addEventListener('click', function() {
            var lat = marker.getLatLng().lat;
            var lng = marker.getLatLng().lng; 
            $.ajax({
                url:'markr.php',
                method:'POST',
                data: {lat:lat,lng:lng},
                success: function(response) {
                    alert(response);
                },
                error: function(){
                    alert('Error occured while saving location.');
                }
            })
        });
        function showPopupAndRedirect() {
            window.location.href = "dashboard.php";
        }
        var originalPosition = map.getCenter();
        document.getElementById('resetButton').addEventListener('click', function(){
        map.setView(originalPosition); 
        });
    </script>
    <button onclick="showPopupAndRedirect()" class="next">Next</button>
    <div class="or">Click next if to user earlier saved location or move to next page </div>
     
</body>
</html>
