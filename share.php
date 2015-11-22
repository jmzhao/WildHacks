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
<body>

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
        <input type="text" id="search" name="search" placeholder="Search Keywords" />
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
      <form method="post" action="store.php" id="fileform" enctype="multipart/form-data">
          <input type="file" name="photo" id="image" /><br>
          <input type="hidden" name="filename" value="makeid()" />
          <input type="button" class="button success" value="Upload" onclick="submit()" />
          </form>
      </div>  
    </div>
</div>

</div>
<hr />
<script type="text/javascript">
function JSON() {
  json = {};
  return json;
}
  function submit(){
    alert("coming in");
        var filename = $("#image").val();

        $.ajax({
            type: "POST",
            url: "store.php",
            enctype: 'multipart/form-data',
            data: {
                file: filename
            },
            success: function () {
                alert("Data Uploaded: ");
            },
            error: function (e) {
                alert(e);
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

// [START region_fillform]
function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();
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
<script src="js/vendor/jquery.js"></script>
<script src="js/foundation.min.js"></script>
<script src="js/foundation/foundation.topbar.js"></script>
<script src="js/foundation/foundation-datepicker.min.js"></script>
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
