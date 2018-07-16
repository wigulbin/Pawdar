jQuery(function($) {
    // Asynchronously Load the map API 
    var script = document.createElement('script');
    script.src = "https://maps.googleapis.com/maps/api/js?key=&callback=initialize";
    document.body.appendChild(script);
});

function initialize() {}
/**
 * index.js
 * - All our useful JS goes here, awesome!
 */

$(document).ready(function() {
    var zipcode = $("#zipcode").val();
    console.log("Zipcode "+zipcode);
    var jsonObject;
    $.ajax({
        url: 'php/findorg.php',
        type: 'GET',
        dataType: 'JSON',
        data: {
            zipcode: zipcode
        },

        success: function(serverResponse) {
            console.log(serverResponse.data);
            $(".item").html("");
            //$(".test").append(JSON.stringify(serverResponse));
            jsonObject = serverResponse;
            //console.log(jsonObject);
            //console.log(jsonObject.data);
            //console.log(jsonObject.data);
        },

        error: function(jqXHR, textStatus, errorThrown) {
            console.log('error');
            console.log(errorThrown);
            console.log(jqXHR);
        },


        complete: function() {
            // $("#ajaxIndicator").modal('hide');
            //console.log("done");
            //console.log(jsonObject);
            init(jsonObject.data);

        }
    });

    function init(info) {
        console.log(info);
        var map;
        var bounds = new google.maps.LatLngBounds();
        var mapOptions = {
            mapTypeId: 'roadmap'
        };

        // Display a map on the page
        map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
        map.setTilt(45);
        
        // Multiple Markers
        var markers = [
        ];

        // Info Window Content
        var infoWindowContent = [
            
        ];
        //console.log(infoWindowContent);
        //console.log(infoWindowContent);
        // Display multiple markers on a map
        var infoWindow = new google.maps.InfoWindow(),
            marker, i;
        var geocoder = new google.maps.Geocoder();
        var address = '08807';
        var test2 = "l;sdjsl;dkfj";
        var index = 0;
        var inner = 0;
        var info1 = {}
        //var info1 ={};
        //console.log(info.length);
        for (var j in info) {
            inner = 0;
            for (i in info[j]) {
                //console.log(i +" "+ info[j][i]);

                info1[index] = {
                    "orgID": info[j]['orgID'],
                    "orgLocation": info[j]['orgLocation'],
                    "orgName": info[j]['orgName'],
                    "orgCity": info[j]['orgCity'],
                    "orgState": info[j]['orgState'],
                    "orgCountry": info[j]['orgCountry'],
                    "orgPhone": info[j]['orgPhone'],
                    "orgEmail": info[j]['orgEmail'],
                    "orgWebsiteUrl": info[j]['orgWebsiteUrl'],
                    "orgFacebookUrl": info[j]['orgFacebookUrl'],

                };

                //console.log(info1);
                //infoWindowContent[index][inner] = info[j][i];
                //infoWindowContent[index].push(info[j][i]);
                //inner++;
            }
            //console.log("\n\n");
            index++;
            // console.log("\n\n");
        }
        var orgname = "";
        var geoloc = "";
        var marker;
        console.log("Length " + index);
        for (var k = 0; k < index; ++k) {
            //console.log("Item: " + info1[k]['orgLocation']);
            //address=info1[k]['orgLocation'].toString();
            //console.log("k is outer " + k);
            address=info1[k]["orgLocation"];
            orgname=info1[k]["orgName"];
            organization = info1[k]
            function go(address, orgname, markers, organization) {
                geocoder.geocode({
                    'address': address
                }, function(results, status) {
                    console.log("Address "+address+"\n"+"Orgname "+orgname);
                    if (status == google.maps.GeocoderStatus.OK) {
                        console.log("Ok");
                        //console.log("info1: "+info1);
                        //console.log(k);
                        //console.log("k is " + k)
                        lat = results[0].geometry.location.lat();
                        lng = results[0].geometry.location.lng();
                        markers.push([orgname, parseFloat(lat), parseFloat(lng)]);
                        //console.log("lat " + lat + " long " + lng);
                        var uluru = {
                            lat: parseFloat(lat),
                            lng: parseFloat(lng)
                        };
                        var position = new google.maps.LatLng(parseFloat(lat), parseFloat(lng));
                        bounds.extend(position);
                        //console.log("lat "+parseFloat(lat)+" long "+parseFloat(lng));
                        //var test = "Hello";
                        marker = new google.maps.Marker({
                            position: uluru,
                            map: map
                        });
                        /*
                        marker.addListener('click', function() {
                            infoWindow.setContent(orgname);
                            infoWindow.open(map, marker);
                        });
                        */
                        google.maps.event.addListener(marker, 'click', (function(marker) {
                            return function() {
                                infoWindow.setContent("<p><b>Org Name:</b> "
                                +organization['orgName']
                                +"</p><p><b>Org City:</b> "
                                +organization['orgCity']
                                +"</p><p><b>Org State:</b> "
                                +organization['orgState']
                                +"</p><p><b>Org Country:</b> "
                                +organization['orgCountry']
                                +"</p><p><b>Org Phone:</b> "
                                +organization['orgPhone']
                                +"</p><p><b>Org Website: </b><a target='_blank' href='"
                                +organization['orgWebsiteUrl']
                                +"'>"+organization['orgWebsiteUrl']
                                +"</a></p><form action='php/apiconnect.php' id='zip_value'><input type='hidden' id='zip_code' name='zip_code' value='"
                                +address+"'/><input class='btn btn-primary' type='submit' value='Pets at this Loc'/></form> ");
                                infoWindow.open(map, marker);
                            }
                        })(marker));
                        map.fitBounds(bounds);
                        
                    } else {
                        //alert("no");
                    }

                });
            }
            go(address, orgname, markers, organization);
        }
        
        console.log(markers); 
        
            // Automatically center the map fitting all markers on the screen
            map.fitBounds(bounds);
        

        // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
        var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
            this.setZoom(14);
            google.maps.event.removeListener(boundsListener);
        });

    }

    $("#zip_value").submit(function(event){
        event.preventDefault();
        alert($("#zip_code").val());
    });
})