<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
    div.box { background: #EEE; height: 100%; width: 100%; }
    div.div1{background: #FFF; float: left; height: 100%; width: 300px; }
    div.div2{ background: #666; height: 150%; }
    div.clear { clear: both; height: 1px; overflow: hidden; font-size:0pt; margin-top: -1px; }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      div.div1 {
    padding: 0.55cm 0.20cm 0cm 0.30cm;
}

      #map {
        height: 100%;
      }
      form {
        margin: 0px;

      }
.controls {
  margin-top: 10px;
  border: 1px solid transparent;
  border-radius: 2px 0 0 2px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  height: 32px;
  outline: none;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
}

#pac-input {
  background-color: #fff;
  font-family: sans-serif;
  font-size: 15px;
  font-weight: 300;
  margin-left: 12px;
  padding: 0 11px 0 13px;
  text-overflow: ellipsis;
  width: 300px;
}

#pac-input:focus {
  border-color: #4d90fe;
}

.pac-container {
  font-family: sans-serif;
}

#type-selector {
  color: #fff;
  background-color: #4d90fe;
  padding: 5px 11px 0px 11px;
}

#type-selector label {
  font-family: sans-serif;
  font-size: 13px;
  font-weight: 300;
}

    </style>
    <title>Task 1</title>
    <style>
      #target {
        width: 345px;
      }
    </style>
  </head>
  <body>


    <?php
    $servername = "learnlabs.in:3306";
    $username = "learndrx_nidhi";
    $password = "worldpeace";
    $dbname = "learndrx_SunScore";

    $conn = new mysqli($servername,$username,$password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//if(isset($_POST['firstC1']) && isset($_POST['firstC2']) && isset($_POST['secondC1']) && isset($_POST['secondC2']) && isset($_POST['answer'])){
        $latHouse=$_POST["firstC1"];
        $lngHouse=$_POST["firstC2"];
        $latObs=$_POST["secondC1"];
        $lngObs=$_POST["secondC2"];
        $ans=$_POST["answer"];
         $temp_address=$_POST["address"];
         //(xyz', 'xyz',$latObs,$lngObs, $ans, 'north','north','north','north',3.5,3.5,3.5,3.5,'yes','xyz','xyz')";
//marker_direction, obs_type, Lat_of_obs, Long_of_obs, ans , mcq_north, mcq_south, mcq_East, mcq_West, North_D, South_D, East_D, West_D, Obs_around_step, website_token, user_id
         $ids=$_POST["id"];
         $typesetting = $_POST["house_setting"];
         $markerdirection = $_POST["direction"];
         $obstruction = $_POST["obstruction"];
         $north = $_POST["north_dense"];
         $south = $_POST["south_dense"];
         $east = $_POST["east_dense"];
         $west = $_POST["west_dense"];

         $e1 = 0;//$_POST["e1"];
         $e2 = 0;//$_POST["e2"];
         $e3 = 0;//$_POST["e3"];
         $e4 = 0;//$_POST["e4"];
         $obsmcq = "redundant";//$_POST["obs_mcq"];
         $token = $_POST["token"];
         //echo $token."here is the token";
         //logic is i m generating a token, which is stored in the form and local storage both, and then the php form uses that to store the value



//$sql = "INSERT INTO TestData (Id,Address, Lat_of_house, Long_of_house, Lat_of_obs, Long_of_obs, ans ) VALUES ($ids, '$temp_address', $latHouse, $lngHouse,$latObs,$lngObs, $ans)";
$sql = "INSERT INTO TestData2 (Id, Setting, Address, Lat_of_house, Long_of_house, marker_direction, obs_type, Lat_of_obs, Long_of_obs, ans , mcq_north, mcq_south, mcq_East, mcq_West, North_D, South_D, East_D, West_D, Obs_around_step, website_token, user_id ) VALUES ($ids, '$typesetting', '$temp_address', $latHouse, $lngHouse,'$markerdirection', '$obstruction',$latObs,$lngObs, $ans, '$north','$south','$east','$west',$e1,$e2,$e3,$e4,'$obsmcq','$token','xyz')";


if ($conn->query($sql) === TRUE) {
  echo '<script language="javascript">';
echo 'alert("Response recorded successfully !")';
echo '</script>';

    //increase count only here
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>






<?php
$servername = "learnlabs.in:3306";
$username = "learndrx_nidhi";
$password = "worldpeace";
$dbname = "learndrx_ecodigs";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//$sql = "(select * from listings WHERE address NOT LIKE 'None' order by id limit 200)";

//$sql = "select * from (select * from listings WHERE address NOT LIKE 'None' order by id limit 15) as rows  order by rand() limit 3 ";
//orders first 300 in ascnding order and then pics the random 10 from this.
//$sql = "select * from (select * from listings WHERE address NOT LIKE 'None' order by id limit 10) as rows  order by id limit 10 ";
$sql = "select * from (select * from listings WHERE id = 1253 or id = 1252 or id = 1240 or id = 1239 or id = 1236 or id = 1229 or id = 71 or id = 108 or id = 169) as rows order by rand() limit 5";

$result = $conn->query($sql);



$id_array = array();
$address_array = array();
$i=0;
if ($result->num_rows > 0) {
    //echo "<table><tr><th>ID</th><th>Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "<tr><td>".$row["id"]."</td><td>".$row["address"]." </td></tr>";
        $b =  $row['address'] . ", Pittsburgh, PA";
        $id_array[$i] = $row['id'];
        $address_array[$i] = $b;
        $i++;
    }
   // echo "</table>";
   // echo "$id_array"
} else {
    echo "0 results";
}

//print_r($id_array);
//print_r($address_array);

$conn->close();
?>


  <!--  <input id="pac-input" class="controls" type="text" placeholder="Search Box">-->

    <div class="box">

       <div class="div1" id="form" style="overflow-y:auto; overflow-x:hidden; height:100%; !important">
       <form method="post" action="#" margin-left:25px>
         <b>Task 1: </b>Finding the distance of the obstruction from the house.<br>
           <br><br>1. This task has 3 assignments.
           You need to <u>input all fields</u> in order to complete the task and get rewarded.
           <br><br>2. In case the marker on the map dosent point to a specific house, reload your webpage.
           On completing an assignment successfully, you will be notified with a prompt.<br><br>
           <b>3. This box displays the token once you finish the task:</b><br><br><br>
           <input type="text" name ="tokendisplay" id="tokendisplay" value="" style="height: 50px; width: 280px; font-size:25pt;">
<br><br>   <hr>
           <br><br>Q1. Describe the setting<br>
           <input type="radio" name="house_setting" value="Urban">Urban setting<br>
           <input type="radio" name="house_setting" value="SubUrban">Suburban setting<br>
           <input type="radio" name="house_setting" value="Rural">Rural setting<br>



<br><br>   <hr>

             <br>Q2.
             <b>Instructions:</b><br>
             <b>Step 1:</b> If not zoomed in to maximum, click on the plus on the bottom-right corner of the map. Do not rotate the default imagery.<br><br>

  <hr>
             <img style="width:180px;height:150px;" src="https://raw.githubusercontent.com/berzentine/SunScore/master/Version1Task1/Screen%20Shot%202016-01-24%20at%206.40.19%20pm.png">
             <img style="width:180px;height:150px;" src="https://raw.githubusercontent.com/berzentine/SunScore/master/Version1Task1/Screen%20Shot%202016-01-24%20at%206.40.29%20pm.png">

<br><br>

             <br><b>Step 2:</b>
             <ul>

                <li>Obstructions are the objects that block the view of a window of a room.
               <li>Obstructions can be trees(eg. A) or buildings(eg. B).
               <li>Select that side of the building which has the nearest obstruction in front of it.
              <br>Drag the marker to the windows closest to this obstruction.(Eg. A)
                <li>Incase, the windows arent visible, drag the marker to the edge of the wall.


                </ul>

                <hr>

             <br><b>Step 3:</b><br><br><b>Click</b> on the marker and the coordinates of the place would be autofilled.<br>
             <br>
             House Coordinates(Lat):<br>
             <input type="hidden" name ="address" id="address">
             <input type="hidden" name ="id" id="id">
             <input type="hidden" name ="token" id="token">

             <input type="text" name="firstC1" id="firstC1">
             <br>
             House Coordinates(Long):<br>
            <input type="text" name="firstC2" id="firstC2">
            <br>
            <br>



            <hr>

            <b>Step 4:</b><br>
            <img src="https://raw.githubusercontent.com/berzentine/SunScore/master/Version1Task1/step3.gif" style="width:200px;height:180px;">
            <br>Considering the building center as the center of the compass, in what direction did you placed the marker in step 2? <br>
            <br><input type="radio" value="N" name="direction" >N
            <input type="radio" value="E" name="direction" >E
            <input type="radio" value="W" name="direction" >W
            <input type="radio" value="S" name="direction" >S
            <input type="radio" value="NE" name="direction" >NE
            <input type="radio" value="SE" name="direction" >SE
            <input type="radio" value="SW" name="direction" >SW
            <input type="radio" value="NW" name="direction" >NW

            <hr>

            <br>
            <br>
            <b>Step 5:</b>What was the obstruction you considered in step 2 ?<br>
            <input type="radio" name="obstruction" value="Tree" >Tree
            <input type="radio" name="obstruction" value="Building">Building/Apartment <br><br>

            <br>

<hr>
<br>
            <b>Step 6:</b><br>


            <img src="https://raw.githubusercontent.com/berzentine/SunScore/master/Version1Task1/Screen%20Shot%202016-01-29%20at%2011.22.10%20pm.png" style="width:180px;height:180px;">

            <img src="https://raw.githubusercontent.com/berzentine/SunScore/master/Version1Task1/Screen%20Shot%202016-01-29%20at%2011.21.58%20pm.png" style="width:180px;height:180px;">
          <br>Drag the marker on the obstructing object you considered in step 2(see Figure above). <b><i>Place it on the point closest to the window.</b></i>
<br><br>
<hr>
            <br><b>Step 7:</b>Click on the marker. The coordinates of the obstruction should be autofilled.<br>
            Obstruction Coordinates(Lat):<br>
            <input type="text" name="secondC1"  id="secondC1">
            <br>

            Obstruction Coordinates(Long):<br>
            <input type="text" name="secondC2"  id="secondC2">

            <br>
            <br>
            <hr>


            <input hidden type="text" value="Press Calculate" name= "answer"  id="answer">
            <img src="https://raw.githubusercontent.com/berzentine/SunScore/master/Version1Task1/Screen%20Shot%202016-01-29%20at%2011.32.47%20pm.png" style="width:200px;height:200px;">
            <img src="https://raw.githubusercontent.com/berzentine/SunScore/master/Version1Task1/Screen%20Shot%202016-01-29%20at%2011.32.06%20pm.png" style="width:200px;height:200px;">

            <br><br><b>Q3.</b>
            <br><b>Refer the above images for these questions.</b><br>
            <br>How dense (in terms of obstructions) is the area on the North side adjacent to the house?<br>
            <input type="radio" name="north_dense" value="Sparse">Sparse/None
            <input type="radio" name="north_dense" value="Middle">Middle
            <input type="radio" name="north_dense" value="Dense">Dense<br>



            <br><br>How dense (in terms of obstructions) is the area on the South side adjacent to the house?<br>
            <input type="radio" name="south_dense" value="Sparse" >Sparse/None
            <input type="radio" name="south_dense" value="Middle">Middle
            <input type="radio" name="south_dense" value="Dense">Dense<br>



            <br><br>How dense (in terms of obstructions) is the area on the East side adjacent to the house?<br>
            <input type="radio" name="east_dense" value="Sparse">Sparse/None
            <input type="radio" name="east_dense" value="Middle">Middle
            <input type="radio" name="east_dense" value="Dense">Dense<br>



            <br><br>How dense (in terms of obstructions) is the area on the West side adjacent to the house?<br>
            <input type="radio" name="west_dense" value="Sparse" >Sparse/None
            <input type="radio" name="west_dense" value="Middle">Middle
            <input type="radio" name="west_dense" value="Dense">Dense<br>





              <br>
	<button id="submitBtn" onclick="myfunction();">Submit</button>

     </form>


       </div>
       <div class="div2" id="map"></div>
       <div class="clear">

    </div>






    <script type="text/javascript">
  	var address = <?php echo json_encode($address_array); ?>;
  	var ids = <?php echo json_encode($id_array); ?>;

	if(!window.localStorage['count']){
		window.localStorage.setItem('count', 0);
    var token = generatetoken();
    document.getElementById('token').value = token;

    window.localStorage.setItem('token', token);
    //console.log(token+"is thisblacnk");
             //window.localStorage['count']=0
         }
    //document.getElementById("Calculate").onclick = function() {updateanswer()};



      function updateanswer() {

        //console.log('updateanswer');
        var lat1 = document.getElementById('firstC1').value;
        var lon1 = document.getElementById('firstC2').value;
        var lat2 = document.getElementById('secondC1').value;
        var lon2 = document.getElementById('secondC2').value;


        var R = 6371000; // metres
        var φ1 = toRad(lat1);
        var φ2 = toRad(lat2);
        var Δφ = toRad(lat2-lat1);
        var Δλ = toRad(lon2-lon1);

        var a = Math.sin(Δφ/2) * Math.sin(Δφ/2) +
                Math.cos(φ1) * Math.cos(φ2) *
                Math.sin(Δλ/2) * Math.sin(Δλ/2);
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));

        var d = R * c;

        console.log('updateanswer' + d);
        document.getElementById('answer').value = d;
        //document.getElementById('address').innerHTML = str;
      }
      function toRad(Value) {
    /** Converts numeric degrees to radians */
    return Value * Math.PI / 180;
}





function generatetoken(){
  var text = "";
  var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

  for( var i=0; i < 12; i++ )
    {  text += possible.charAt(Math.floor(Math.random() * possible.length));}
    //document.getElementById(token).value = text;
    //console.log(text+"here is the token");
      return text;
}




function myfunction(){
  var lat1 = document.getElementById('firstC1').value;
  var lon1 = document.getElementById('firstC2').value;
  var lat2 = document.getElementById('secondC1').value;
  var lon2 = document.getElementById('secondC2').value;


  var R = 6371000; // metres
  var φ1 = toRad(lat1);
  var φ2 = toRad(lat2);
  var Δφ = toRad(lat2-lat1);
  var Δλ = toRad(lon2-lon1);

  var a = Math.sin(Δφ/2) * Math.sin(Δφ/2) +
          Math.cos(φ1) * Math.cos(φ2) *
          Math.sin(Δλ/2) * Math.sin(Δλ/2);
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));

  var d = R * c;

  //console.log('updateanswer' + d);
  document.getElementById('answer').value = d;
  //console.log("mufunction called");
  if(window.localStorage.getItem('count')<5){
    var index = window.localStorage.getItem('count');
    index++;
    window.localStorage.setItem('count', index);
  }
}
// This example adds a search box to a map, using the Google Place Autocomplete
// feature. People can enter geographical searches. The search box will return a
// pick list containing a mix of places and predicted search terms.


function initAutocomplete() {
  //console.log("initi called");
  //document.getElementById('token').value = token;
//  if(window.localStorage['token']){
//document.getElementById(token).value = window.localStorage.getItem('token');}
  var i=0;
  //var j=0;
  var marker;
  var geocoder = new google.maps.Geocoder();
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -33.8688, lng: 151.2195},
    zoom: 22,
    tilt:0,
    mapTypeId: google.maps.MapTypeId.SATELLITE
  });


  if(window.localStorage['count']){
		document.getElementById('token').value = window.localStorage.getItem('token');
         }


 if(window.localStorage.getItem('count')<5){
  //**update address here**//
  //var address = ["1104 Kenzie Drive, Pittsburgh, PA","120 Cobblestone Drive, Pittsburgh, PA","806 College St, Pittsburgh, PA 15232, USA"];
      var index = window.localStorage.getItem('count')
      //console.log(index);
      console.log(address[index]);

       document.getElementById("address").value= address[index];
       document.getElementById("id").value= ids[index];
      geocoder.geocode( { 'address': address[index]}, function(results, status) {
      	//window.localStorage.setItem('count', index);

        if (status == google.maps.GeocoderStatus.OK) {
        //address.splice(y,1);
          map.setCenter(results[0].geometry.location);
          marker = new google.maps.Marker({
              map: map,
              draggable: true,
              position: results[0].geometry.location

          });

  marker.addListener('click', function() {

  //console.log('ready');
  //var latlong_value = results[0].geometry.location;
  if(i==0){
  //document.getElementById('address_field').value = address;
  document.getElementById('firstC1').value = marker.getPosition().lat();
  document.getElementById('firstC2').value = marker.getPosition().lng();
  i++;
  console.log(i);
  //document.cookie = "index= "+x;
  }


  google.maps.event.addListener(marker, 'dragend', function() {
    //updateMarkerStatus('Drag ended');



    console.log('dragend');
    document.getElementById('secondC1').value = marker.getPosition().lat();
    document.getElementById('secondC2').value = marker.getPosition().lng();
    //updateMarkerAddress(marker.getPosition());
    ///geocodePosition(marker.getPosition());
  });
 });
        } else {
          alert("Geocode was not successful for the following reason: " + status);
        }

      });

      }
      else{
        if(window.localStorage.getItem('count')==5){
          var y = document.getElementById("tokendisplay");
          document.getElementById("tokendisplay").value = window.localStorage.getItem('token');
          y.type= "text";
          document.write(window.localStorage.getItem('token') +" is you token you need to submit.");

        alert("Task done !  "+ window.localStorage.getItem('token') +" is your token key");
        localStorage.clear();
        }
        else{
        alert("Geocode was not successful for the following reason: " + status);
      }

      }


}






//google.maps.event.addDomListener(window, 'load', initAutocomplete);

function displayLocationElevation(location, elevator, infowindow) {
  // Initiate the location request
  elevator.getElevationForLocations({
    'locations': [location]
  }, function(results, status) {
    infowindow.setPosition(location);
    if (status === google.maps.ElevationStatus.OK) {
      // Retrieve the first result
      if (results[0]) {
        // Open the infowindow indicating the elevation at the clicked position.
        infowindow.setContent('The elevation at this point <br>is ' +
            results[0].elevation + ' meters.');
      } else {
        infowindow.setContent('No results found');
      }
    } else {
      infowindow.setContent('Elevation service failed due to: ' + status);
    }
  });
}

    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJ015OnrjZ5Zrd9NSssSUBXzoE3c1MpLw&libraries=places&callback=initAutocomplete"
         async defer></script>


</script>>

</script>

  </body>
</html>
