const createMap = ({ lat, lng }) => {
    return new google.maps.Map(document.getElementById('map'), {
      center: { lat, lng },
      zoom: 15
    });
  };
  
  const createMarker = ({ map, position }) => {
    return new google.maps.Marker({ map, position });
  };
  
  const getCurrentPosition = ({ onSuccess, onError = () => { } }) => {
    if ('geolocation' in navigator === false) {
      return onError(new Error('Geolocation is not supported by your browser.'));
    }
  
    return navigator.geolocation.getCurrentPosition(onSuccess, onError, {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 0
    });
  };
  
  const getPositionErrorMessage = code => {
    switch (code) {
      case 1:
        alert( 'Permission denied, please make sure that you enable location, and reload the page.');
        break;
      case 2:
        alert ('Position unavailable.');
        break;
      case 3:
        alert( 'Timeout reached.');
        break;
      default:
        return null;
    }
  }
  
  const trackLocation = ({ onSuccess, onError = () => { } }) => {
    if ('geolocation' in navigator === false) {
      return onError(new Error('Geolocation is not supported by your browser.'));
    }
  
    // Use watchPosition instead.
    return navigator.geolocation.watchPosition(onSuccess, onError);
  };

  function updateMap() {
    if ('geolocation' in navigator === false) {
      return onError(new Error('Geolocation is not supported by your browser.'));
    }
    Echo.channel(`location.${"54"}`)
    .listen('SendLocation', (e) => {
            let lat = parseFloat( e.lat);
            let lng = parseFloat( e.long);
            // marker.setPosition({ lat, lng });
            // map.panTo({ lat, lng });
            // console.log(lat,lng);
            directionsService = new google.maps.DirectionsService();
            
            directionsService.route(
              {
                      origin: "1.5618663, 103.6554999",
                      destination: `${lat}, ${lng}`,
                      travelMode: "DRIVING"
              },
              (response, status) => {
                if (status === "OK") {
                    new google.maps.DirectionsRenderer({
                        // suppressMarkers: true,
                        directions: response,
                        map: map,
                      });
                    console.log('hi');
                    console.log(response);
                }
            }
          )
        });
  }
  
  function init() {
    const initialPosition = { lat: 1.5618663, lng: 103.6554999 };
    map = createMap(initialPosition);
    marker = createMarker({ map, position: initialPosition });
    updateMap();

  }