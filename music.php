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
 --main-color: #ff4757;
 --main-color-dark: #ff3742;
 --secondary-color: #5352ed;
 --accent-color: #7bed9f;
 --shadow-color: rgba(255, 71, 87, 0.3);
 --light-gray: #f8f9fa;
 --dark-gray: #495057;
 --text-color: #2c2c2c;
}

body { 
 width: 100%;
 min-height: 100vh;
 background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
 background-attachment: fixed;
 font-family: "Poppins", sans-serif;
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
  border-radius: 20px;
  background: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255, 255, 255, 0.2);
  width: 95%;
  max-width: 600px;
  min-height: 350px;
  max-height: 100%;
  position: relative;
  left: 50%;
  transform: translateX(-50%);
  box-shadow: 0 25px 50px rgba(0,0,0,0.15), 0 0 0 1px rgba(255,255,255,0.05);
  overflow: hidden;
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
  font-size: 24px;
  font-weight: 700;
  text-transform: uppercase;
  display: inline-block;
  letter-spacing: 1px;
  margin: 10px 8px 30px 8px; 
  background: linear-gradient(135deg, var(--main-color), var(--secondary-color));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  position: relative;
}

h2::after {
  content: '';
  position: absolute;
  bottom: -8px;
  left: 50%;
  transform: translateX(-50%);
  width: 50px;
  height: 3px;
  background: linear-gradient(135deg, var(--main-color), var(--secondary-color));
  border-radius: 2px;
}


input[type=text],select {
  background: rgba(255, 255, 255, 0.9);
  border: 2px solid rgba(255, 255, 255, 0.3);
  color: var(--text-color);
  padding: 16px 24px;
  text-align: left;
  text-decoration: none;
  display: block;
  font-size: 16px;
  margin: 10px auto;
  width: 85%;
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  border-radius: 12px;
  box-shadow: 0 4px 15px rgba(0,0,0,0.1);
  font-weight: 500;
}

input[type=text]:focus {
  background: #fff;
  border: 2px solid var(--main-color);
  box-shadow: 0 0 0 4px rgba(255, 71, 87, 0.1), 0 8px 25px rgba(0,0,0,0.15);
  transform: translateY(-2px);
}

input[type=text]:placeholder {
  color: #cccccc;
}


/* FORM TYPOGRAPHY*/

input[type=button], input[type=submit], input[type=reset]  {
  background: linear-gradient(135deg, var(--main-color), var(--main-color-dark));
  border: none;
  color: white;
  letter-spacing: 1px;
  padding: 16px 40px;
  text-align: center;
  text-decoration: none;
  display: block;
  text-transform: uppercase;
  font-size: 14px;
  font-weight: 600;
  box-shadow: 0 8px 25px var(--shadow-color), 0 0 0 1px rgba(255,255,255,0.1);
  border-radius: 12px;
  margin: 15px auto 35px auto;
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  cursor: pointer;
  position: relative;
  overflow: hidden;
}

input[type=button]::before, input[type=submit]::before, input[type=reset]::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
  transition: left 0.5s;
}

input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover  {
  background: linear-gradient(135deg, var(--main-color-dark), var(--main-color));
  transform: translateY(-3px);
  box-shadow: 0 12px 35px var(--shadow-color), 0 0 0 1px rgba(255,255,255,0.1);
}

input[type=button]:hover::before, input[type=submit]:hover::before, input[type=reset]:hover::before {
  left: 100%;
}

input[type=button]:active, input[type=submit]:active, input[type=reset]:active  {
  transform: translateY(-1px);
  box-shadow: 0 6px 20px var(--shadow-color);
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
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            padding: 20px;
            margin: 15px 0;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            position: relative;
            overflow: hidden;
        }
        .song-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 71, 87, 0.1), transparent);
            transition: left 0.6s;
        }
        .song-card:hover {
            border-color: var(--main-color);
            background: rgba(255, 255, 255, 1);
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15), 0 0 0 1px var(--main-color);
        }
        .song-card:hover::before {
            left: 100%;
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
            background: linear-gradient(135deg, var(--main-color), var(--main-color-dark));
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            margin-top: 15px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 71, 87, 0.3);
        }
        .play-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 71, 87, 0.4);
        }
        .audio-player {
            display: none;
            margin-top: 15px;
            padding: 15px;
            background: rgba(248, 249, 250, 0.8);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .audio-player audio {
            width: 100%;
            height: 40px;
            border-radius: 8px;
            outline: none;
        }
        
        .preview-note {
            font-size: 11px;
            color: #666;
            margin-top: 8px;
            padding: 8px 12px;
            background: rgba(255, 193, 7, 0.1);
            border-radius: 6px;
            border-left: 3px solid #ffc107;
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
                echo "<div class='preview-note'>🎵 30-second preview only - Full songs available on streaming platforms</div>";
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
        
        echo "<br><div style='background: linear-gradient(135deg, rgba(255, 243, 205, 0.9), rgba(255, 234, 167, 0.9)); border: 1px solid rgba(255, 193, 7, 0.3); border-radius: 12px; padding: 20px; margin: 20px 0; box-shadow: 0 4px 15px rgba(255, 193, 7, 0.1); backdrop-filter: blur(5px);'>";
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