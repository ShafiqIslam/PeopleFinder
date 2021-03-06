(function () {
    var circle;
    var pos = {
      lat: 51.6,
      lng: -0.1
    };

    function initialize() {
        //console.log(pos);
        var mapOptions = {
            center: new google.maps.LatLng(pos.lat, pos.lng),
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
    };


    function onCircleComplete(shape) {
        if (shape == null || (!(shape instanceof google.maps.Circle))) return;

        if (circle != null) {
            circle.setMap(null);
            circle = null;
        }

        circle = shape;
        $('input[name=search_lat]').val(circle.getCenter().lat());
        $('input[name=search_lng]').val(circle.getCenter().lng());
        $('input[name=search_radius]').val(circle.getRadius());

        $(".btn_map_valid").removeAttr("disabled");        
    }

    function get_geolocation() {
        // Try HTML5 geolocation.        
        if (navigator.geolocatin) {
          navigator.geolocation.getCurrentPosition(function(position) {
            //console.log(position);
            pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            //console.log(pos);
          }, function() {
            console.log("Error");
          });
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    }

    //google.maps.event.addDomListener(window, 'load', initialize);
    get_geolocation();
})();
