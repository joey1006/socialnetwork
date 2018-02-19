<?php 

include "loadcomment.php";



echo "<div class='gallery'>";

  $result = $mysqli->query( "SELECT * FROM photos");
  while($row = $result->fetch_assoc()) {



    $location  = $row["location"];
    $locationsplit = explode(",", $location);
    $locationsplit[0]; // piece1
    $locationsplit[1]; // piece2

          echo 
          '
          <div class="item">
          <h2>'.$row["title"].'</h2>
          
          <hr>

          <div class="item-photo">
          
          <img class="lazy" data-original="photos/' . $row['img'] .' ">
          <p>Uploader : '.$row['uploader'].'</p>
          </div>
          ';

          echo "
          <div class='maps'>
              <div id='map".$row["id"]."'class='rendermap'>
              </div>
              <script>
              function initMap() {
                  var map = new google.maps.Map(document.getElementById('map".$row["id"]."'), {
                    zoom: 16,
                    center: {lat: " . $locationsplit[0] .", lng: " . $locationsplit[1] ."}
                  });
                  var marker = new google.maps.Marker({
                  position: {lat: " . $locationsplit[0] .", lng: " . $locationsplit[1] ."},
                  map: map,
                  title: 'The uploaders location!'
            });
                  var geocoder = new google.maps.Geocoder;
                  var infowindow = new google.maps.InfoWindow;

                  
                }

                function geocodeLatLng(geocoder, map, infowindow) {
                  var input = document.getElementById('latlng').value;
                  var latlngStr = input.split(',', 2);
                  var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
                  geocoder.geocode({'location': latlng}, function(results, status) {
                    if (status === 'OK') {
                      if (results[0]) {
                        map.setZoom(11);
                        var marker = new google.maps.Marker({
                          position: latlng,
                          map: map
                        });
                        infowindow.setContent(results[0].formatted_address);
                        infowindow.open(map, marker);
                      } else {
                        window.alert('No results found');
                      }
                    } else {
                      window.alert('Geocoder failed due to: ' + status);
                    }
                  });
                }
                </script>
                

              
          </div>
          ";
          
          echo'
          <form action="model/addcomment.php" method="post">

          <div class="textareacomment">
            <textarea  rows="5" cols="25" name="comment" placeholder="put comment please"></textarea>
          </div>
          
          <input type="hidden" name="photoid" value="' . $row["id"] . '">
          <input type="submit" name="submit">

          </form>
      ';

          foreach ($comments[$row["id"]] as $commentsdisplay) {
          echo "
              <div class='comments'>

                 <p>" . nl2br($commentsdisplay["comment"]) . "</p>

                 <b style='text-align:left;'>" . $commentsdisplay["author"] . "</b>" .
                 " - " . $commentsdisplay["datum"] . "</p>

                </div>
              ";
          }






          //div item
          echo '</div>';
        }
        
echo "<script async defer src='https://maps.googleapis.com/maps/api/js?key=AIzaSyBd2uXOpC1XwN8F0_Ooi0Y_W4Dy2e_AHeY&callback=initMap'
            type='text/javascript'></script>";

echo "</div>";
?>