function getLocation() {
    if (!navigator.geolocation) {
        console.log('Geolocation API not supported by this browser.');
    } else {
        console.log('Checking location...');
        navigator.geolocation.getCurrentPosition(success, error);
    }
}
function success(position) {
    document.getElementById("1").textContent = position["coords"]["latitude"];
    document.getElementById("2").textContent = position["coords"]["longitude"];
    console.log(position);
}
function error(er) {
    console.log('Geolocation error!');
}

if (!navigator.geolocation) {
    window.location.href = "app-settings:location";
}

const xhttp = new XMLHttpRequest();
xhttp.onload = function () {
    document.getElementById("test").innerHTML = this.responseText;
};
xhttp.open("GET", "connect.php");
xhttp.send();