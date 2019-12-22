<!DOCTYPE html>
<html lang="en">
<head>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6wWy83m1Mj-WVV446QA0c6yVB4AseJNQ"></script>
	<?php include "../helper/bootstrap_common.php";?>
 </head>
 <?php include "../asset/css/navstyle.php";?>
<style>
  body{
		background-color: ;
	}
	.contact{
		padding: 4%;
		height: 400px;
	}
	.col-md-3{
		background: darkgreen;
		padding: 4%;
		border-top-left-radius: 0.5rem;
		border-bottom-left-radius: 0.5rem;

	}
	.contact-info{
		margin-top:10%;
	}
	.contact-info img{
		margin-bottom: 15%;
	}
	.contact-info h2{
		margin-bottom: 10%;
    color: white;
	}
  .contact-info h4{
    color: white;
  }
	.col-md-9{
		background: #fff;
		padding: 3%;
		border-top-right-radius: 0.5rem;
		border-bottom-right-radius: 0.5rem;
	}
	.contact-form label{
		font-weight:600;
	}
	.contact-form button{
		background: darkgreen;
		color: white;
		font-weight: 600;
		width: 25%;
	}
	.contact-form button:focus{
		box-shadow:none;
  }
  body > div.container.contact > div:nth-child(2) > footer > div > div > div.col-md-4.col-lg-2.mx-auto.my-md-4.my-0.mt-4.mb-1 > ul > li > p > a{
    color: white;
  }
</style>
<title>Title</title>
</head>
<body>
<?php include "../setting/constant.php";?>
<?php $Detect = OPPO ;?>
<div><?php include "../helper/header_common.php";?></div>
    <div class="container contact">
      <div class="row">
        <div class="col-md-3">
          <div class="contact-info">
            <img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image"/>
            <h2>Contact Us</h2>
            <h4>We would love to hear from you !</h4>
          </div>
        </div>
        <div class="col-md-9">
          <div class="contact-form">
            <div class="form-group">
              <label class="control-label col-sm-2" for="fname">First Name:</label>
              <div class="col-sm-10">
              <input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="lname">Last Name:</label>
              <div class="col-sm-10">
              <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="email">Email:</label>
              <div class="col-sm-10">
              <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="comment">Comment:</label>
              <div class="col-sm-10">
              <textarea class="form-control" rows="5" id="comment"></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Submit</button>
              </div>
            </div>

            <div class="form-group">
                <div id="map-canvas"> </div>
                    <style>
                            #map-canvas {
                                width: 500px;
                                height: 500px;
                                }
                    </style>
            </div>

          </div>

        </div>

      </div>
      <div><?php include "../helper/footer_common.php";?></div>
      <div><?php include "../asset/css/footerstyle.php";?></div>
    </div>
<?php include "../helper/script.php";?>

 <script>

    function initialize() {
        var myLatlng = new google.maps.LatLng(10.789120, 106.695340);
        var mapOptions = {
            center: myLatlng,
            zoom: 15
        };

        var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

        var infowindow = new google.maps.InfoWindow({
            content: '<div id="content"><a href="http://localhost/doanhk2/">WINT ZOO</a> <br/> 24 Phan Liem, Da Kao Ward, District 1, Ho Chi Minh City, Vietnam</div>',
            position: myLatlng
        });

        infowindow.open(map);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</body>
</html>