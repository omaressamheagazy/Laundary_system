function initMap() {
    // Create a map
    // Create a map
    console.log(latitude);
    console.log(longitude);
    var map = new google.maps.Map(document.getElementById("map"), {
        zoom: 18,
        center: { lat: parseFloat(latitude), lng: parseFloat(longitude) },
    });

    // Add a marker for the place
    var marker = new google.maps.Marker({
        map: map,
        position: { lat: parseFloat(latitude), lng: parseFloat(longitude) },
    });
}
