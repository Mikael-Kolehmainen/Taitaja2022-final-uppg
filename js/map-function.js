var map, loaded;
var currentLocation = 0;

var totalLocations = document.getElementById("current").innerText;
totalLocations = totalLocations.substring(totalLocations.indexOf("/")+1);
totalLocations = totalLocations.replace(" ", "");
totalLocations = totalLocations.replace("/");
totalLocations = totalLocations - 1;

function loadMap() {
    var locationID = "location_" + currentLocation;
    var location = document.getElementById(locationID);

    location.style.display = "block";

    var coordinateID = "cord_" + currentLocation;
    var coordinates = document.getElementById(coordinateID).innerText;

    coordinates = coordinates.replace('(', '');
    coordinates = coordinates.replace(')', '');

    var coordinatesArr = coordinates.split(',').map(Number);

    map = L.map('map').setView([coordinatesArr[0], coordinatesArr[1]], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var titleID = "title_" + currentLocation;
    var title = document.getElementById(titleID).innerText;

    var DateID = "date_" + currentLocation;
    var date = document.getElementById(DateID).innerText;

    L.marker([coordinatesArr[0], coordinatesArr[1]]).addTo(map)
        .bindPopup(title + "<br>" + date)
        .openPopup();
    loaded = true;

    document.getElementById('decrement').disabled = true;
}
function updateView(increment) {
    console.log(currentLocation);
    console.log(totalLocations);
    if (currentLocation != totalLocations || currentLocation != 0) {
        var lastLocationID = "location_" + currentLocation;
        var lastLocation = document.getElementById(lastLocationID);
        lastLocation.style.display = "none";

        switch (increment) {
            case 1:
                currentLocation = currentLocation + 1;
                break;
            case -1:
                currentLocation = currentLocation - 1;
                break;
        }

        var locationID = "location_" + currentLocation;
        var location = document.getElementById(locationID);

        location.style.display = "block";
        document.getElementById('increment').disabled = false;
        document.getElementById('decrement').disabled = false;
    }
    if (currentLocation == totalLocations) {
        document.getElementById('increment').disabled = true;
    }
    if (currentLocation == 0) {
        document.getElementById('decrement').disabled = true;
    }
    var coordinateID = "cord_" + currentLocation;
    var coordinates = document.getElementById(coordinateID).innerText;

    coordinates = coordinates.replace('(', '');
    coordinates = coordinates.replace(')', '');

    var coordinatesArr = coordinates.split(',').map(Number);

    var titleID = "title_" + currentLocation;
    var title = document.getElementById(titleID).innerText;

    var DateID = "date_" + currentLocation;
    var date = document.getElementById(DateID).innerText;

    map.panTo(coordinatesArr, 2);
    L.marker([coordinatesArr[0], coordinatesArr[1]]).addTo(map)
        .bindPopup(title + "<br>" + date)
        .openPopup();
}