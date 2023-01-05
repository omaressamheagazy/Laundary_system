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
  const trackLocation = ({ onSuccess, onError = () => { } }) => {
    if ('geolocation' in navigator === false) {
      return onError(new Error('Geolocation is not supported by your browser.'));
    }
  
    // Use watchPosition instead.
    return navigator.geolocation.watchPosition(onSuccess, onError);
  };
  function init() {
    const initialPosition = { lat: 59.325, lng: 18.069 };
    const map = createMap(initialPosition);
    const marker = createMarker({ map, position: initialPosition });
    const $info = document.getElementById('info');
  
    trackLocation({
      onSuccess: ({ coords: { latitude: lat, longitude: lng } }) => {
        marker.setPosition({ lat, lng });
        map.panTo({ lat, lng });
        // Print out the user's location.
        $info.textContent = `Lat: ${lat} Lng: ${lng}`;
        // Don't forget to remove any error class name.
        $info.classList.remove('error');
        console.log("This is lat", lat);
        console.log("This is long", lng);
      },
      onError: err => {
        // Print out the error message.
        $info.textContent = `Error: ${getPositionErrorMessage(err.code) || err.message}`;
        // Add error class name.
        $info.classList.add('error');
      }
    });
  }