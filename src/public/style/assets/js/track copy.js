const successCallback = (position) => {
    console.log(position);
    var driver_id = $('#driverID').val() // driver id
    let url = $('#trackURL').val();
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: '/driver/order/live-location',
        data: { latitude: position.coords.latitude, longitude: position.coords.longitude, driver_id: driver_id },
        type: "POST",
        dataType: "json"
    });
};
const errorCallback = (error) => {
    getPositionErrorMessage(error.code);
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

options = {
  enableHighAccuracy: false,
  timeout: 5000,
  maximumAge: 0
};

let orderStatus   =  parseInt( $('#orderStatus').val() ) ; // get order status id
let pickUpStatus  =  parseInt(  $('#pickUpStatus').val() );
let deliverStatus =  parseInt( $('#deliverStatus').val() );

if(orderStatus == pickUpStatus || orderStatus == deliverStatus) { // activate the live location, only if the driver is picking up or deliver user laundry
    if('geolocation' in navigator) {
      navigator.geolocation.watchPosition(successCallback, errorCallback, options);
    } else {
      alert('Geolocation is not supported by your browser.');
    }
}

