// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see the error "The Geolocation service
// failed.", it means you probably did not give permission for the browser to
// locate you.
let map, infoWindow;

function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: 1.5618663, lng: 103.6554999 },
        zoom: 16,
    });

    infoWindow = new google.maps.InfoWindow();
    // start of  pan to current location feature feature
    const locationButton = document.createElement("a");
    locationButton.style.cssText +=
        "color:black;background-color:#ffff; cursor:pointer; border:1px solid;box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px; padding:7px ";
    locationButton.textContent = "Pan to Current Location";
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
    locationButton.addEventListener("click", () => {
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };
                    infoWindow.setPosition(pos);
                    infoWindow.setContent("Location found.");
                    infoWindow.open(map);
                    map.setCenter(pos);

                    $("#latitude").val(pos["lat"]);
                    $("#longitude").val(pos["lng"]);
                },
                () => {
                    handleLocationError(true, infoWindow, map.getCenter());
                }
            );
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
    });
    // start of  autocomplete feature
    var input = document.getElementById("autocomplete");

    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo("bounds", map);
    var infowindow = new google.maps.InfoWindow();
    var marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29),
    });
    autocomplete.addListener("place_changed", function () {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }
        marker.setIcon({
            // url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35),
        });
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

        var address = "";
        if (place.address_components) {
            address = [
                (place.address_components[0] &&
                    place.address_components[0].short_name) ||
                    "",
                (place.address_components[1] &&
                    place.address_components[1].short_name) ||
                    "",
                (place.address_components[2] &&
                    place.address_components[2].short_name) ||
                    "",
            ].join(" ");
        }

        infowindow.setContent(
            "<div><strong>" + place.name + "</strong><br>" + address
        );
        infowindow.open(map, marker);
        var place = autocomplete.getPlace();
        $("#latitude").val(place.geometry["location"].lat()); // assign the value to the latitude input
        $("#longitude").val(place.geometry["location"].lng()); // assign the value to the longtiude input
    });
    // end of autocomplete feature
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(
        browserHasGeolocation
            ? "Error: The Geolocation service failed."
            : "Error: Your browser doesn't support geolocation."
    );
    infoWindow.open(map);
}

window.initMap = initMap;
