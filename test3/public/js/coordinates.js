var position = {};
position.long = 0;
position.lat = 0;

marker.on('dragend', function (e) {
    position.long = e.target.getLngLat().lng;
    position.lat = e.target.getLngLat().lat;
    console.log(position);
});

function submitPosition() {
    window.location.href = "http://127.0.0.1:8000/register-owner?longitude=" + position.long + "&latitude=" + position.lat;
}
