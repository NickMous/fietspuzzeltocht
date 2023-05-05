if (!navigator.geolocation) {
    window.location.href = "app-settings:location";
}

function getLocation() {
    if (!navigator.geolocation) {
        document.getElementById("errors").textContent = 'Geolocation API not supported by this browser.';
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
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function () {
        if (this.responseText == true) {
            console.log("waar");
            const xmlhttp1 = new XMLHttpRequest();
            xmlhttp1.onload = function () {
                window.location.href = "question.php";
            };
            let str1 = `scripts/userup.php?id=${id}&q=1`;
            xmlhttp1.open("GET", str1);
            xmlhttp1.send();
        } else {
            document.getElementById("errors").textContent = `${position["coords"]["latitude"]}, ${position["coords"]["longitude"]}`;
            console.log("niet");
        }
        console.log(this.responseText);
    };
    let long = position["coords"]["longitude"];
    let lat = position["coords"]["latitude"];
    let str = `scripts/locations.php?lat=${lat}&long=${long}&point=${checkpoint}&route=${route}`;
    xmlhttp.open("GET", str);
    xmlhttp.send();
}

function error(er) {
    console.log('Geolocation error!');
}

let checkpoint = 0;
let route = 0;
let id = 0;

function check(point, rout, id2) {
    checkpoint = point;
    route = rout;
    id = id2;
    getLocation();
}

function nextone(point, rout, id2) {
    checkpoint = point;
    route = rout;
    id = id2;
    const xmlhttp1 = new XMLHttpRequest();
    xmlhttp1.onload = function () {
        window.location.href = "location.php";
    };
    let str1 = `scripts/userup1.php?id=${id}&q=0`;
    xmlhttp1.open("GET", str1);
    xmlhttp1.send();
}