function init() {
    myLatLng = { lat: 1.5618663, lng: 103.6554999 };
    mapOptions = {
        center: myLatLng,
        zoom: 14,
    };

    //create map
    map = new google.maps.Map(document.getElementById("map"), mapOptions);

    //create a DirectionsService object to use the route method and get a result for our request
    directionsService = new google.maps.DirectionsService();

    //create a DirectionsRenderer object which we will use to display the route
    directionsDisplay = new google.maps.DirectionsRenderer();

    //bind the DirectionsRenderer to the map
    directionsDisplay.setMap(map);
    console.log(document.getElementById('long'));
    orderID = $('#orderID').val();
    console.log(orderID);
    updateMap();
}
//define calcRoute function
function updateMap() {
    console.log(orderID);
    Echo.channel(`location.${orderID}`).listen("SendLocation", (e) => {
        let lat = parseFloat(e.lat);
        let lng = parseFloat(e.long);
        var request = {
            origin: "1.5618663, 103.6554999",
            destination: `${lat}, ${lng}`,
            travelMode: google.maps.TravelMode.DRIVING, //WALKING, BYCYCLING, TRANSIT
            unitSystem: google.maps.UnitSystem.IMPERIAL,
        };

        //pass the request to the route method
        directionsService.route(request, function (result, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                $('#arrival-time').html(result.routes[0].legs[0].duration.text);
                console.log(result.routes[0].legs[0].duration.text);
                directionsDisplay.setDirections(result);
            } else {
                //delete route from map
                directionsDisplay.setDirections({ routes: [] });
                //center map in London
                map.setCenter(myLatLng);

                //show error message
            }
        });
    });
}
