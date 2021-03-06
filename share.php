<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Foundation | Welcome</title>
  <link rel="stylesheet" href="css/foundation.css" />
  <link rel="stylesheet" href="css/foundation-datepicker.min.css" />
  <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <script src="js/vendor/modernizr.js"></script>
</head>
<body onLoad="initialize()">

  <nav class="top-bar" data-topbar>
    <ul class="title-area">
      <li class="name">
       <h1><a href="/">Freemium</a></h1>
     </li>
   </ul>

   <section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="right">
      <li class="has-form">
        <a href="/" class="button success" >Get Blessed</a>
      </li>
      <li class="has-form">
        <a href="/share.php" class="button " >Share !!</a>
      </li>
    </ul>

  </section>
</nav>
<br><br>
<div class="row">
    <div class="row">
      <div class="large-6 columns">
        <label>Whats you are interested in sharing today</label>
        <input type="text" id="search" name="search" placeholder="Give it a catchy title!" />
      </div>
      <div class="large-6 columns">
        <label>Location its being offered</label>
        <input type="text" id="autocomplete" name="autocomplete" onFocus="geolocate()" placeholder="Its intelligent try it!" />
      </div>
    </div>

    <div class="row">
      <div class="large-3 columns">
        <label>StartTime</label>
        <input type="text" class="span2"  value="11-21-2015 21:05" id="dpts" name="dpts">
      </div>
      <div class="large-3 columns">
        <label>EndTime</label>
        <input type="text" class="span2" value="11-21-2015 21:05" id="dpte" name="dpte">
      </div>
      <div class="large-6 columns">
        <label>Description</label>
        <input type="text" name="description" id="description" placeholder="Say something about your offer" />
      </div>
    </div>

    <div class="row">
      <div class="large-6 columns">
        <label>Additional Notes</label>
        <input type="text"  name="notes" id="notes" placeholder="Down the hallway next to the lounge" />
      </div>
      <div class="large-6 columns">
      <form id="my_form" name="form" action="store.php" method="POST" enctype="multipart/form-data" >
<input name="my_files" id="my_file" size="27" type="file" />
<input type="button" class="button success" name="action" value="Upload" onclick="redirect()"/>
<iframe id='my_iframe' name='my_iframe' src="" style="display:None">
</iframe>
 
</form>
      </div>  
    </div>
    <div class="row">
		<input type="button" class="button" name="submit" value="Share!" onClick="submit()" />
	</div>
</div>
</div>
<hr />
<script src="js/vendor/jquery.js"></script>
<script src="js/foundation.min.js"></script>
<script src="js/foundation/foundation.topbar.js"></script>
<script src="js/foundation/foundation-datepicker.min.js"></script>

<script type="text/javascript">
function initialize() {
	var now = new Date();
	$("#dpts").val(now.toString());
	$("#dpte").val(new Date(now.getTime() + 3600).toString());
}
function getEpoch(t){
  return (new Date($("#"+t).val())).getTime()/1000;
}
/*
function getLatLong(address){
      $.get("https://maps.googleapis.com/maps/api/geocode/json?address="+address+"&key=AIzaSyA1MgYE-d_EX4Jq0b-D-eB2px1NTQxYXW0");
  }
  */
  function makeid()
{
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for( var i=0; i < 5; i++ )
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
}
function JSON() {
  json = {};
  json.value=[];
  json.value[0]={};
  json.value[0]["@search.action"]= "upload";
  json.value[0]["id"]= "" + (new Date().getTime()) + makeid();
  json.value[0]["name"]= $("#search");
  json.value[0]["time_start"]= getEpoch("dpts");
  json.value[0]["time_end"] = getEpoch("dpte");
  //var latlng = getLatLong($("#autocomplete").val());
  json.value[0]["location"] = { 
  	"type": "Point", 
	"coordinates": [place.geometry.location.lat(), place.geometry.location.lng()]
	};
  json.value[0]["address"] = "";
  json.value[0]["address_notes"]= $("#notes");
  json.value[0]["description"] = $("#description");
  json.value[0]["picture_urls"] = [];
  return json;
}
  function redirect()
{
document.getElementById('my_form').target = 'my_iframe'; //'my_iframe' is the name of the iframe
document.getElementById('my_form').submit();

}
function submit() {
	$.ajax({
	  "header": {
			"Content-Type": "application/json; charset=utf-8",
			"api-key": "3B3CABA50386E2B6502A4A8D95328417"
		},
	  "async": true,
	  "crossDomain": true,
	  "url": "https://free-mium.search.windows.net/indexes/events/docs/index?api-version=2015-02-28",
	  "method": "POST",
	  "data": JSON(),
	  "datatype": "json",
	  "success": function(response) {
		  console.log(response);
		  alert("Thanks for sharing!!");
	  }
	});
}

// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.

var placeSearch, autocomplete;

function initAutocomplete() {
  // Create the autocomplete object, restricting the search to geographical
  // location types.
  autocomplete = new google.maps.places.Autocomplete(
    /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
    {types: ['geocode']});

  // When the user selects an address from the dropdown, populate the address
  // fields in the form.
  autocomplete.addListener('place_changed', fillInAddress);
}

var place;
// [START region_fillform]
function fillInAddress() {
  // Get the place details from the autocomplete object.
  place = autocomplete.getPlace();
  console.log(place);
}
// [END region_fillform]

// [START region_geolocation]
// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle({
        center: geolocation,
        radius: position.coords.accuracy
      });
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
// [END region_geolocation]


</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1MgYE-d_EX4Jq0b-D-eB2px1NTQxYXW0&signed_in=true&libraries=places&callback=initAutocomplete"
async defer></script>
<script>
  $(document).foundation();
  $('#dpts').fdatepicker({
    format: 'mm-dd-yyyy hh:ii',
    disableDblClickSelection: true,
    language: 'vi',
    pickTime: true
  });
  $('#dpte').fdatepicker({
    format: 'mm-dd-yyyy hh:ii',
    disableDblClickSelection: true,
    language: 'vi',
    pickTime: true
  });
</script>

</body>
</html>
