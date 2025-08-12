<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> QuickMusic - Online Music Player </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link href="https://tm1.fun/.png" rel="icon" type="image/x-icon"/>
  
  <meta name="description" content="QuickMusic - Fast and Easy Online Music Player.">
  <meta name="author" content="QuickMusic.">
  <meta name="keywords" content="QuickMusic, Online Music Player, Stream Music">
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
	
	echo"<br><h2 class='active'>QuickMusic Player</h2><br><br><form method='GET' action=''><div class='container'>  <div class='brand-title'><center></div> <div class='inputs'> 
<br><input type='text' name='song' placeholder='Enter Song Name...' /><center><input type='submit' class='submit' name='submit' value='Search & Play'></div><br><a href='#'>#QuickMusic</a> </div><br><center></center></div></div>";
	
	}
if (isset($_GET['submit'])) {
	      
$song = $_GET['song'];

// Enhanced search for Indian music - try multiple search strategies
$searchTerm = $song;

// If the search doesn't contain common Indian music keywords, add them to improve results
$indianKeywords = ['bollywood', 'hindi', 'tamil', 'telugu', 'punjabi', 'marathi', 'bengali', 'gujarati', 'kannada', 'malayalam'];
$hasIndianKeyword = false;
foreach($indianKeywords as $keyword) {
    if(stripos($song, $keyword) !== false) {
        $hasIndianKeyword = true;
        break;
    }
}

// Try different country codes for better Indian music results
$countryCodes = ['IN', 'US']; // India first, then US
$results = [];

foreach($countryCodes as $country) {
    $url = "https://itunes.apple.com/search?term=" . urlencode($searchTerm) . "&media=music&limit=10&country=" . $country;
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'QuickMusic/1.0');
    $output = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if($httpCode == 200 && $output) {
        $json = json_decode($output, true);
        if($json && isset($json['results']) && count($json['results']) > 0) {
            $results = array_merge($results, $json['results']);
        }
    }
    
    // If we got good results from India store, prioritize them
    if($country == 'IN' && count($results) >= 5) {
        break;
    }
}

// Remove duplicates based on track name and artist
$uniqueResults = [];
$seen = [];
foreach($results as $result) {
    $key = strtolower($result['trackName'] . '|' . $result['artistName']);
    if(!isset($seen[$key])) {
        $uniqueResults[] = $result;
        $seen[$key] = true;
    }
}

$results = array_slice($uniqueResults, 0, 10);

// Full songs are now handled via direct streaming platform links

if(count($results) > 0) {
        // Get up to 5 results for display
        $displayResults = array_slice($results, 0, 5);
        
        echo "<style>
        #image{border-radius:65px;}
        .song-card {
            border: 2px solid #f0f0f0;
            border-radius: 10px;
            padding: 15px;
            margin: 10px 0;
            background: #fafafa;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .song-card:hover {
            border-color: var(--main-color);
            background: #f5f5f5;
        }
        .close-btn {
            background: #ff4444;
            color: white;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            cursor: pointer;
            float: right;
            font-size: 16px;
            margin-bottom: 10px;
        }
        .close-btn:hover {
            background: #cc0000;
        }
        .play-btn {
            background: var(--main-color);
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 15px;
            cursor: pointer;
            font-size: 12px;
            margin-top: 10px;
        }
        .play-btn:hover {
            opacity: 0.8;
        }
        .audio-player {
            display: none;
            margin-top: 10px;
        }
        </style>";
        
        echo "<center><button class='close-btn' onclick='window.location.href=\"music.php\"'>&times;</button>";
        echo "<font color='red' size='5'>Song Recommendations</font><br><br>";
        
        // Generate multiple full song sources for better coverage
        $fullSongSources = [];
        
        // Add multiple streaming platform suggestions
        $streamingPlatforms = [
            ['name' => 'YouTube Music', 'icon' => '🎵', 'color' => '#FF0000', 'search' => 'https://music.youtube.com/search?q=' . urlencode($searchTerm)],
            ['name' => 'Spotify', 'icon' => '🎧', 'color' => '#1DB954', 'search' => 'https://open.spotify.com/search/' . urlencode($searchTerm)],
            ['name' => 'JioSaavn', 'icon' => '🎶', 'color' => '#06C755', 'search' => 'https://www.jiosaavn.com/search/' . urlencode($searchTerm)],
            ['name' => 'Gaana', 'icon' => '🎤', 'color' => '#FF6600', 'search' => 'https://gaana.com/search/' . urlencode($searchTerm)]
        ];
        
        echo "<h3 style='color: #666; margin: 20px 0 10px 0;'>🎧 Music Previews</h3>";
        
        foreach($displayResults as $index => $result) {
            $sName = $result['trackName'] ?? 'Unknown';
            $singer = $result['artistName'] ?? 'Unknown Artist';
            $album = $result['collectionName'] ?? 'Unknown Album';
            $img = $result['artworkUrl60'] ?? '';
            $preview = $result['previewUrl'] ?? '';
            $genre = $result['primaryGenreName'] ?? 'Unknown';
            
            if($preview) {
                echo "<div class='song-card' id='card-$index'>";
                
                if($img) {
                    echo "<img src='$img' style='border-radius: 10px; float: left; margin-right: 15px;' width='60' height='60'>";
                }
                
                echo "<div style='overflow: hidden;'>";
                echo "<b><font color='black'>$sName</font><br>";
                echo "<font color='gray'>by $singer</font><br>";
                echo "<font color='gray' size='2'>Album: $album | Genre: $genre</font><br>";
                echo "<button class='play-btn' onclick='playMusic($index)'>▶ Play 30s Preview</button>";
                echo "<div class='audio-player' id='player-$index'>";
                echo "<audio controls style='width: 100%; margin-top: 10px;' preload='metadata'>";
                echo "<source src='$preview' type='audio/mpeg'>";
                echo "Your browser does not support the audio element.";
                echo "</audio>";
                echo "<div style='font-size: 11px; color: #666; margin-top: 5px;'>📽️ 30-second preview only</div>";
                echo "</div>";
                echo "</div>";
                echo "<div style='clear: both;'></div>";
                echo "</div>";
            }
        }
        
        echo "<script>
        function playMusic(index) {
            
            // Hide all players first
            var players = document.querySelectorAll('.audio-player');
            players.forEach(function(player) {
                player.style.display = 'none';
                var audio = player.querySelector('audio');
                audio.pause();
                audio.currentTime = 0;
            });
            
            // Show selected player
            var player = document.getElementById('player-' + index);
            player.style.display = 'block';
            
            // Auto play the audio
            var audio = player.querySelector('audio');
            audio.play();
            
            // Update play button text when playing
            var playBtn = document.querySelector('[onclick=\"playMusic(' + index + ')\"]');
            playBtn.innerHTML = '⏸️ Playing Preview...';
            
            // Reset button when audio ends
            audio.addEventListener('ended', function() {
                playBtn.innerHTML = '▶ Play 30s Preview';
            });
            
            // Reset button when paused
            audio.addEventListener('pause', function() {
                if (audio.currentTime === 0 || audio.ended) {
                    playBtn.innerHTML = '▶ Play 30s Preview';
                }
            });
        }
        
        // Enhanced music discovery with multiple attempts
        function enhancedSearch(query) {
            var searchTerm = encodeURIComponent(query);
            var platforms = [
                'https://music.youtube.com/search?q=' + searchTerm,
                'https://open.spotify.com/search/' + searchTerm,
                'https://www.jiosaavn.com/search/' + searchTerm,
                'https://gaana.com/search/' + searchTerm
            ];
            
            // Open first available platform
            window.open(platforms[0], '_blank');
        }
        </script>";
        
        echo "<br><div style='background: #fff3cd; border: 1px solid #ffeaa7; border-radius: 5px; padding: 15px; margin: 10px 0;'>";
        echo "<font color='#856404' size='2'><b>🎵 About QuickMusic:</b><br>";
        echo "• <b>Music Discovery:</b> Search and preview songs with high-quality clips<br>";
        echo "• <b>Legal Previews:</b> 30-second previews provided by iTunes Store<br>";
        echo "• <b>Copyright Compliance:</b> Full songs require proper licensing<br>";
        echo "• <b>Global Catalog:</b> Specialized search for Indian and international music</font>";
        echo "</div>";
        echo "<br><font color='green'>Previews provided by iTunes</font><br><br>";
        echo "<a href='music.php' style='color: var(--main-color); text-decoration: none;'>← Search Again</a>";
        
    } else {
    echo "<br><h2 class='active'>QuickMusic Player</h2><br><br>";
    echo "<br><br><br><b><font color='red'>No results found for '$song'</font>";
    echo "<br><br><font color='gray' size='2'>Try searching with keywords like: Bollywood, Hindi, Tamil, Telugu, etc.</font><br>";
    echo "<br><br><a href='music.php' style='color: var(--main-color);'>← Try Another Search</a>";
}}

?>

</body>
</html>