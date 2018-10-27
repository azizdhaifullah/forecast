@extends('index')
@section('content')
{{csrf_field()}}
<script type="text/javascript">
    $(function(){
        var long;
        var lat;
        $("#content").hide();
        $("#preloader").show();
        if ("geolocation" in navigator){ 
            navigator.geolocation.getCurrentPosition(function(position){ 
                long = parseFloat(position.coords.longitude).toFixed(6);
                lat = parseFloat(position.coords.latitude).toFixed(6);
                $.post( 'data', { 'lat': lat, 'long':long, '_token':$('input[name=_token]').val()}, function(data) {
                    var link = [];
                    var i = 0;
                    $.each(data.weather, function(){
                      $.each(this, function (index,value) {
                        if (index == "weather_state_abbr") {
                           link.push('https://www.metaweather.com/static/img/weather/png/'+value+'.png');
                           $("#weatherpict"+i).attr('src', link[i]);
                        }

                        if (index == "weather_state_name") {
                          if(i == 0) {
                            $("#weathertext"+i).html(value);
                          }else{
                            $("#weathertext"+i).html(value + '<i class="material-icons right">close</i>');
                            $("#notetext"+i).html(value);
                          }
                        }

                        if (index == "the_temp") {
                          if(i == 0) {
                            $("#celciustext"+i).html(value.toFixed(0) +"&deg;");
                          }else{
                            $("#notetext"+i).append(" | "+ value.toFixed(0) +"&deg;");
                          }
                        }
                      })
                      i+=1;
                    });
                    console.log(data.weather);
                    $("#title").html(data.loc);
                    $("#content").show();
                    $("#preloader").hide();
                }, "json");
            });
        }else{
            console.log("Browser doesn't support geolocation!");
        }

    });
</script>
<?php
  date_default_timezone_set("Asia/Jakarta");
?>
<div id="content">  
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 id="title" class="header center light-blue-text"></h1>
      <div class="row center">
        <div class="col s12 offset-m4 m4">
          <img id="weatherpict0" width="200px">
        </div>
        <div class="col s12 m1">
          <h3 id="weathertext0"></h3> 
          <h5 id="celciustext0"></h5> 
        </div>
      </div>
      <div class="row center">
        <h2 class=" header light"> <?= date("l") ?> </h2>
      </div>
      <br><br>
    </div>
</div>
<div class="divider"></div>
<div class="section">
  <!--   Icon Section   -->

  <div class="row">
    <div class="col s12 m3">
       <div class="card">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator" style="padding: 20px" id="weatherpict1">
        </div>
        <div class="card-content">
          <span class="card-title activator grey-text text-darken-4"><?= date("l", strtotime("+1 Days")) ?><i class="material-icons right">more_vert</i></span>
          <p id="notetext1"></p>
        </div>
        <div class="card-reveal">
          <span class="card-title grey-text text-darken-4" id="weathertext1"></span>
          <p></p>
        </div>
      </div>
    </div>

    <div class="col s12 m3">
       <div class="card">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator" style="padding: 20px" id="weatherpict2" src="/assets/img/background1.jpg">
        </div>
        <div class="card-content">
          <span class="card-title activator grey-text text-darken-4"><?= date("l", strtotime("+2 Days")) ?><i class="material-icons right">more_vert</i></span>
          <p id="notetext2"></p>
        </div>
        <div class="card-reveal">
          <span class="card-title grey-text text-darken-4" id="weathertext2"></span>
          <p></p>
        </div>
      </div>
    </div>

    <div class="col s12 m3">
       <div class="card">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator" style="padding: 20px" id="weatherpict3" src="/assets/img/background1.jpg">
        </div>
        <div class="card-content">
          <span class="card-title activator grey-text text-darken-4"><?= date("l", strtotime("+3 Days")) ?><i class="material-icons right">more_vert</i></span>
          <p id="notetext3"></p>
        </div>
        <div class="card-reveal">
          <span class="card-title grey-text text-darken-4" id="weathertext3"></span>
          <p>Here is some more information about this product that is only revealed once clicked on.</p>
        </div>
      </div>
    </div>

    <div class="col s12 m3">
       <div class="card">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator" style="padding: 20px" id="weatherpict4" src="/assets/img/background1.jpg">
        </div>
        <div class="card-content">
          <span class="card-title activator grey-text text-darken-4"><?= date("l", strtotime("+4 Days")) ?><i class="material-icons right">more_vert</i></span>
          <p id="notetext4"></p>
        </div>
        <div class="card-reveal">
          <span class="card-title grey-text text-darken-4" id="weathertext4"></span>
          <p>Here is some more information about this product that is only revealed once clicked on.</p>
        </div>
      </div>
    </div>

    <div class="col s12 m3">
       <div class="card">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator" style="padding: 20px" id="weatherpict5" src="/assets/img/background1.jpg">
        </div>
        <div class="card-content">
          <span class="card-title activator grey-text text-darken-4"><?= date("l", strtotime("+5 Days")) ?><i class="material-icons right">more_vert</i></span>
          <p id="notetext5"></p>
        </div>
        <div class="card-reveal">
          <span class="card-title grey-text text-darken-4" id="weathertext5"></span>
          <p>Here is some more information about this product that is only revealed once clicked on.</p>
        </div>
      </div>
    </div>

  </div>  
</div>
</div>
<br><br>

<center>
<div id="preloader" class="section">
  <div class="preloader-wrapper big active">
    <div class="spinner-layer spinner-blue">
      <div class="circle-clipper left">
        <div class="circle"></div>
      </div><div class="gap-patch">
        <div class="circle"></div>
      </div><div class="circle-clipper right">
        <div class="circle"></div>
      </div>
    </div>

    <div class="spinner-layer spinner-red">
      <div class="circle-clipper left">
        <div class="circle"></div>
      </div><div class="gap-patch">
        <div class="circle"></div>
      </div><div class="circle-clipper right">
        <div class="circle"></div>
      </div>
    </div>

    <div class="spinner-layer spinner-yellow">
      <div class="circle-clipper left">
        <div class="circle"></div>
      </div><div class="gap-patch">
        <div class="circle"></div>
      </div><div class="circle-clipper right">
        <div class="circle"></div>
      </div>
    </div>

    <div class="spinner-layer spinner-green">
      <div class="circle-clipper left">
        <div class="circle"></div>
      </div><div class="gap-patch">
        <div class="circle"></div>
      </div><div class="circle-clipper right">
        <div class="circle"></div>
      </div>
    </div>
  </div>
</div>
</center>

@endsection