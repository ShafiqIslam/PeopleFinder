(function () {
    var circle;

    function initialize() {
        var mapOptions = {
            center: new google.maps.LatLng(22.8167, 89.5500),
            zoom: 12
        };


        var map = new google.maps.Map(document.getElementById('map-canvas'),
        mapOptions);

        var drawingManager = new google.maps.drawing.DrawingManager({
            drawingMode: google.maps.drawing.OverlayType.CIRCLE,
            drawingControl: true,
            drawingControlOptions: {
                position: google.maps.ControlPosition.TOP_CENTER,
                drawingModes: [
                    google.maps.drawing.OverlayType.CIRCLE
                ]
            },
            circleOptions: {
                fillColor: '#004de8',
                fillOpacity: 0.2,
                strokeColor: '#004de8',
                strokeOpacity: 0.5,
                strokeWeight: 5,
                //clickable: true,
                draggable: true,
                editable: true,
                zIndex: 1
            }
        });
        drawingManager.setMap(map);
        google.maps.event.addListener(drawingManager, 'circlecomplete', onCircleComplete);
    }

    function onCircleComplete(shape) {
        if (shape == null || (!(shape instanceof google.maps.Circle))) return;

        if (circle != null) {
            circle.setMap(null);
            circle = null;
        }

        circle = shape;
        console.log('radius', circle.getRadius());
        console.log('lat', circle.getCenter().lat());
        console.log('lng', circle.getCenter().lng());
    }

    google.maps.event.addDomListener(window, 'load', initialize);

})();