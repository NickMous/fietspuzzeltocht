if (!navigator.geolocation) {
    window.location.href = "app-settings:location";
}

function getLocation() {
    if (!navigator.geolocation) {
        console.log('Geolocation API not supported by this browser.');
    } else {
        console.log('Checking location...');
        navigator.geolocation.getCurrentPosition(success, error);
    }
}

function success(position) {
    console.log(position["coords"]["latitude"]);
    console.log(position["coords"]["longitude"]);
    console.log(position);
}

function error(er) {
    console.log('Geolocation error!');
}