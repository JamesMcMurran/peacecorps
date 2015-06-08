<!DOCTYPE html>

<html>
        
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimal-ui">
    
   <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
    <script src="lib/jquery.min.js"></script>
    <script src="lib/jquery.mobile.js"></script>
    
    <style>
        .titleImage {
          margin: 4%;
          max-height: 200px;
        }
        .ui-listview>li p {
           white-space: normal;
        }
        .hidden{
            display:none;
        }
    </style>
    
    <script>
    
    var Last;
    $( window ).load(function() {
        $( "ul" ).on( "click", "li", function() {
          $( ".hidden", this ).slideToggle( "slow" );
        });
    });
    
    
    function timeConverter(UNIX_timestamp){
      var a = new Date(UNIX_timestamp*1000);
      var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
      var year = a.getFullYear();
      var month = months[a.getMonth()];
      var date = a.getDate();
      var hour = a.getHours();
      var min = a.getMinutes();
      var sec = a.getSeconds();
      var time = month + ',' + date + ' ' + year + ' ' + hour + ':' + min + ':' + sec ;
      return time;
    }
    
    
    $.get( "API/Alerts.php", function( data ) {
        console.log(data);
        $('ul').empty();
        $('#date').text(timeConverter(data.Date));
        $.each( data.Locations, function( key, val ) {
            console.log( "<li id='" + key + "'>" + val + "</li>" );
            
            $( "#locationList" ).append( '<li>\
                <span class="country">'+val.Country+'</span>\
                <span class="city">, '+val.City+'</span>\
                <span class="region">, '+val.Region+'</span>\
                <br />\
                <span class="hidden">\
                  Province :'+val.Province+'<br />\
                  Issued :'+val.Issued+'<br />\
                  Level :'+val.level+'<br />\
                  Current :'+val.current+'<br />\
                  Reason :'+val.reason+'<br />\
                  <p>Full Reason: '+val.reasonLong+'<p><br/>\
                  lat:'+val.lat+'<br />\
                  lng:'+val.lng+'<br />\
                </span>\
            </li>' );
        });
      $('ul' ).listview( "refresh" );
    }, "json" );
    
    
    
    </script>
  </head>

<body>
<span class="ng-scope" style="text-align: center"><img class="titleImage" src="img/peacecorps_logo-home.png" /></span>
<div>
    <a href="PeaceCore-debug.apk" download="PeaceCore-debug.apk">Android APK</a> - -
    <a href="app.xap" download="app.xap">Windows App</a>
    <span > Or text a city,County to Alerts@PC.gov to get a text back with the alerts</span>
    </div>     
<form class="ui-filterable">
    <input id="filterBasic-input" data-type="search">
</form>
<ul id="locationList" data-role="listview" data-filter="true" data-input="#filterBasic-input">

</ul>

</body>
</html>