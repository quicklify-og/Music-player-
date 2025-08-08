<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Music Player By : Tricks Master </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link href="https://tm1.fun/.png" rel="icon" type="image/x-icon"/>
  
  <meta name="description" content="Online Music Player Script.">
  <meta name="author" content="TricksMaster.">
  <meta name="keywords" content="Online Music Player By Tricks Master">
</head>
<style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Poppins');
@import url('https://fonts.googleapis.com/css2?family=Solway&display=swap');

/* BASIC */

*{ 
 margin: 0;
 padding: 0;
 box-sizing: border-box;
 font-family: "Poppins", sans-serif;
}

*:focus {
    outline: none;
} 

:root { 
 --main-color: red ;
 --shadow-color: rgba(93, 38, 193, 0.4);
}

body { 
 width: 100%;
 height: 100vh;
 background-image: linear-gradient(45deg, var(--main-color) 45%, #ffffff 0%);
 background-repeat: no-repeat; 
}


/* STRUCTURE  */

.wrapper {
 width: 100%;
 min-height: 100%;
 padding: 80px 20px 20px 20px;
}

/* ANIMATIONS */

/* Simple CSS3 Fade-in-down Animation */
.fadeInDown {
  animation-name: fadeInDown;
  animation-duration: 2s;
  animation-fill-mode: both;
}

@keyframes fadeInDown {
  0% {
    opacity: 0;
    transform: translate3d(0, -100%, 0);
  }
  100% {
    opacity: 1;
    transform: none;
  }
}


#formContent {
  border-radius: 10px;
  background: #fff;
  width: 95%;
  max-width: 540px;
  min-height: 350px;
  max-height: 100%;
  position: relative;
  left: 50%;
  transform: translateX(-50%);
  box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
}

#navbarId { 
  text-align: center;   
}

img {
  width: 40%;
  margin: 20px auto 5px auto;
  padding-top: 30px;
  display: block;
  
}

h2 {
  text-align: center;
  font-size: 16px;
  font-weight: 600;
  text-transform: uppercase;
  display: inline-block;
  letter-spacing: 0.4px;
  margin: 5px 8px 20px 8px; 
  color: #636e72;
  border-bottom: 1px solid #636e72;
}


input[type=text],select {
  background-color: #f6f6f6;
  border: none;
  color: #0d0d0d;
  padding: 12px 32px;
  text-align: left;
  text-decoration: none;
  display: block;
  font-size: 14px;
  margin: 5px auto;
  width: 85%;
  border: 2px solid #f6f6f6;
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}

input[type=text]:focus {
  background-color: #fff;
  border-bottom: 2px solid var(--main-color);
}

input[type=text]:placeholder {
  color: #cccccc;
}


/* FORM TYPOGRAPHY*/

input[type=button], input[type=submit], input[type=reset]  {
  background-color: var(--main-color);
  border: none;
  color: white;
  letter-spacing: 1px;
  padding: 12px 80px;
  text-align: center;
  text-decoration: none;
  display: block;
  text-transform: uppercase;
  font-size: 13px;
  -webkit-box-shadow: 0 10px 30px 0 var(--shadow-color);
  box-shadow: 0 10px 30px 0 var(--shadow-color);
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
  margin: 5px auto 35px auto;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -ms-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
  cursor: pointer;
}

input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover  {
  background-color: var(--main-color);
}

input[type=button]:active, input[type=submit]:active, input[type=reset]:active  {
  -moz-transform: scale(0.95);
  -webkit-transform: scale(0.95);
  -o-transform: scale(0.95);
  -ms-transform: scale(0.95);
  transform: scale(0.95);
}

/* Simple CSS3 Fade-in Animation */
@-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@keyframes fadeIn { from { opacity:0; } to { opacity:1; } }

.fadeIn {
  opacity:0;
  -webkit-animation:fadeIn ease-in 1;
  -moz-animation:fadeIn ease-in 1;
  animation:fadeIn ease-in 1;

  -webkit-animation-fill-mode:forwards;
  -moz-animation-fill-mode:forwards;
  animation-fill-mode:forwards;

  -webkit-animation-duration:1s;
  -moz-animation-duration:1s;
  animation-duration:1s;
}

.fadeIn.first {
  -webkit-animation-delay: 0.4s;
  -moz-animation-delay: 0.4s;
  animation-delay: 0.4s;
}

.fadeIn.second {
  -webkit-animation-delay: 0.6s;
  -moz-animation-delay: 0.6s;
  animation-delay: 0.6s;
}

.fadeIn.third {
  -webkit-animation-delay: 0.8s;
  -moz-animation-delay: 0.8s;
  animation-delay: 0.8s;
}

.fadeIn.fourth {
  -webkit-animation-delay: 1s;
  -moz-animation-delay: 1s;
  animation-delay: 1s;
}


#formFooter {
  background-color: #f6f6f6;
  border-top: 1px solid #dce8f1;
  padding: 25px;
  text-align: center;
  border-radius: 0 0 10px 10px;
}

a {
  color: var(--main-color);
  display:inline-block;
  text-decoration: none;
  font-weight: 400;
}

/* Simple CSS3 Fade-in Animation */
.underlineHover:after {
  display: block;
  left: 0;
  bottom: -10px;
  width: 0;
  height: 2px;
  background-color: var(--main-color);
  content: "";
  transition: width 0.2s;
}

.underlineHover:hover {
  color: #0d0d0d;
}

.underlineHover:hover:after{
  width: 100%;
}

.small_text_msg {
  margin: 0px 0px 10px 25px;
  color: #636e72;
  font-size: 12px;
  display: block;
  text-align: left;
}

.BoxContent {
  background-color: #f6f6f6;
  width: 85%;
  min-height: 30px;
  padding: 15px;
  margin: 5px auto 20px auto;
  border-radius: 5px;
}

.BoxContent p {
  padding: 10px 0px;
  border-top: thin solid #ffffff;
  text-align: center;
  font-size: 12px;
  color: #636e72;
  font-family: 'Solway', serif;
}

pre {
  font-size: 13px;
}

</style>

</style>
<body>
<br><div class="wrapper fadeInDown">
    <div id="formContent">
      <div class="fadeIn first" id="navbarId">
      
      <?php

if (!isset($_GET['submit'])) {
	
	echo"<br><h2 class='active'>Online Music Player Script</h2><br><br><form method='GET' action=''><div class='container'>  <div class='brand-title'><center></div> <div class='inputs'> 
<br><input type='text' name='song' placeholder='Enter Song Name...' /><center><input type='submit' class='submit' name='submit' value='Serch & Play'></div><br><a href='https://telegram.me/tricksmaster111'>#TricksMaster</a> </div><br><center></center></div></div>";
	
	}
if (isset($_GET['submit'])) {
	      
$song = $_GET['song'];

$url = "https://tm1.fun/Music/api.php?song=" . urlencode($song);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($ch);
curl_close($ch);
$json = json_decode($output);

$msg = $json->msg;
$sName = $json->name;
$singer = $json->artists;
$lng = $json->language;
$cdr = $json->coded_by;
$img = $json->pic;
$aud = $json->music;
$cpr = $json->copyright;

if($msg=="success"){

echo "<style>#image{border-radius:65px;}</style><center>

<img src= $img id='image' class='rotate' ></image><center><font color='red' size='5'> Song Details </font><font color=' #393C39'><center><br><legend color='#9700FF'></legend >

<b><font color='black'> Song Name :<font color='blue'> $sName<br><font color='black'>Singers :<font color='blue'> $singer<br><font color='black'>Language :<font color='blue'> $lng<br><br><audio src= $aud controls autoplay></audio><br><font color='black'></font><font color='green'>$cpr<br><br>";

 }else{
 	
 	echo "<br><h2 class='active'>Online Music Player Script</h2><br><br>

<br><br><br><b><font color='red'> $msg </font>";
 	
 }}

?>

</body>
</html>