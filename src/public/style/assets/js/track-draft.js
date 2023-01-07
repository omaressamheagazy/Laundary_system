var executed = false;
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
        return 'Permission denied.';
      case 2:
        return 'Position unavailable.';
      case 3:
        return 'Timeout reached.';
      default:
        return null;
    }
  }
  function init() {
    Echo.channel(`location.${"54"}`)
    .listen('SendLocation', (e) => {
            console.log(e);
            let location = {
                lat: e.lat,
                long: e.long
            }
            showMap(location);

        });

  }
  
  function showMap(position) {
    if(!executed) {
      executed = true;
      const initialPosition = { lat: 59.325, lng: 18.069 };
      map = createMap(initialPosition);
      marker = createMarker({ map, position: initialPosition });
    }
    console.log('hi');
    // console.log(marker);
    var pos = {lat: parseFloat(position.latitude), lng: parseFloat(position.longitude) }
    marker.setPosition(pos);
    map.panTo(pos);
    // setInterval(init, 5000); // The interval set to 5 seconds

  }
