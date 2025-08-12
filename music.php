<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>InnerVibe - Premium Music Player</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body, html {
      height: 100%;
      font-family: 'Montserrat', sans-serif;
      background: #0a0a0a;
      color: #fff;
      overflow-x: hidden;
    }
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 15px;
    }
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 12px 20px;
      background: linear-gradient(90deg, #1a1a1a, #2a2a2a);
      border-radius: 10px;
      margin-bottom: 15px;
      box-shadow: 0 2px 8px rgba(29, 185, 84, 0.3);
    }
    .logo {
      width: 90px;
      filter: drop-shadow(0 0 4px #1DB954);
      transition: transform 0.3s ease;
    }
    .logo:hover {
      transform: scale(1.1);
    }
    h1 {
      font-size: 20px;
      font-weight: 700;
      color: #fff;
      letter-spacing: 0.5px;
      text-shadow: 0 0 6px rgba(29, 185, 84, 0.6);
    }
    .header-left {
      display: flex;
      align-items: center;
      gap: 15px;
    }
    .search-bar {
      position: relative;
      width: 300px;
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(10px);
      border-radius: 30px;
      padding: 3px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .search-bar:hover, .search-bar:focus-within {
      transform: scale(1.05);
      box-shadow: 0 0 15px rgba(29, 185, 84, 0.5);
    }
    .search-bar input {
      padding: 10px 40px;
      border-radius: 30px;
      border: none;
      background: transparent;
      width: 100%;
      color: #fff;
      font-size: 14px;
      transition: all 0.3s ease;
    }
    .search-bar input:focus {
      outline: none;
      background: rgba(0, 0, 0, 0.2);
    }
    .search-bar input::placeholder {
      color: #b3b3b3;
      animation: typing 4s infinite;
    }
    @keyframes typing {
      0%, 20% { opacity: 1; }
      25%, 45% { opacity: 0.5; }
      50%, 70% { opacity: 1; }
      75%, 95% { opacity: 0.5; }
      100% { opacity: 1; }
    }
    .search-bar::before {
      content: '';
      position: absolute;
      inset: 0;
      border-radius: 30px;
      padding: 2px;
      background: linear-gradient(45deg, #1DB954, #8a2be2, #1e90ff, #1DB954);
      background-size: 200%;
      -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
      -webkit-mask-composite: xor;
      mask-composite: exclude;
      animation: gradient 3s linear infinite;
      z-index: -1;
    }
    @keyframes gradient {
      0% { background-position: 0%; }
      100% { background-position: 200%; }
    }
    .search-bar .search-icon {
      position: absolute;
      left: 12px;
      top: 50%;
      transform: translateY(-50%);
      color: #1DB954;
      font-size: 14px;
      transition: transform 0.3s ease;
    }
    .search-bar input:focus + .search-icon {
      transform: translateY(-50%) scale(1.2);
    }
    .search-bar .clear-icon {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      color: #b3b3b3;
      font-size: 14px;
      cursor: pointer;
      display: none;
      transition: color 0.2s ease, transform 0.2s ease;
    }
    .search-bar .clear-icon.show {
      display: block;
    }
    .search-bar .clear-icon:hover {
      color: #ff4d4d;
      transform: translateY(-50%) rotate(90deg);
    }
    .suggestions {
      position: absolute;
      top: calc(100% + 8px);
      left: 0;
      right: 0;
      background: rgba(30, 30, 30, 0.95);
      backdrop-filter: blur(10px);
      border-radius: 10px;
      max-height: 160px;
      overflow-y: auto;
      z-index: 100;
      border: 1px solid rgba(29, 185, 84, 0.3);
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
      display: none;
      animation: slideIn 0.3s ease-out;
    }
    @keyframes slideIn {
      from { transform: translateY(-10px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }
    .suggestions.show {
      display: block;
    }
    .suggestion-item {
      padding: 8px 12px;
      color: #fff;
      font-size: 13px;
      cursor: pointer;
      transition: all 0.2s ease;
    }
    .suggestion-item:hover {
      background: linear-gradient(45deg, #1DB954, #8a2be2);
      color: #fff;
      transform: translateX(5px);
    }
    .section-title {
      font-size: 18px;
      font-weight: 600;
      color: #fff;
      margin: 15px 0 10px;
      text-align: left;
      text-shadow: 0 0 5px rgba(29, 185, 84, 0.5);
      cursor: pointer;
      transition: color 0.3s ease;
    }
    .section-title:hover {
      color: #1DB954;
      text-shadow: 0 0 10px rgba(29, 185, 84, 0.8);
    }
    .songs-container {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 10px;
      padding: 10px;
    }
    .song-card {
      display: flex;
      align-items: center;
      background: #1c1c1c;
      border-radius: 8px;
      padding: 8px;
      transition: all 0.3s ease;
      cursor: pointer;
      position: relative;
    }
    .song-card:hover {
      transform: translateY(-4px);
      background: #252525;
      box-shadow: 0 4px 12px rgba(29, 185, 84, 0.4);
    }
    .song-card img {
      width: 60px;
      height: 60px;
      border-radius: 6px;
      margin-right: 10px;
    }
    .song-info {
      flex: 1;
    }
    .song-info h3 {
      font-size: 14px;
      font-weight: 600;
      margin-bottom: 2px;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    .song-info p {
      font-size: 10px;
      color: #b3b3b3;
      margin-bottom: 2px;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    .song-meta {
      display: flex;
      gap: 5px;
      align-items: center;
      font-size: 9px;
      color: #b3b3b3;
    }
    .song-meta span {
      display: flex;
      align-items: center;
      gap: 3px;
    }
    .song-meta i {
      font-size: 10px;
      color: #1DB954;
    }
    .download-btn, .favorite-btn {
      position: absolute;
      top: 8px;
      right: 8px;
      background: linear-gradient(45deg, #1DB954, #8a2be2);
      border: none;
      border-radius: 50%;
      width: 26px;
      height: 26px;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.3s ease;
    }
    .favorite-btn {
      right: 40px;
      background: none;
      border: 1px solid #1DB954;
    }
    .favorite-btn.active {
      background: linear-gradient(45deg, #1DB954, #8a2be2);
    }
    .download-btn i, .favorite-btn i {
      color: #fff;
      font-size: 12px;
    }
    .download-btn:hover, .favorite-btn:hover {
      box-shadow: 0 0 10px rgba(29, 185, 84, 0.7);
      transform: scale(1.1);
    }
    .now-playing {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(10, 10, 10, 0.95);
      backdrop-filter: blur(20px);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: space-between;
      padding: 30px;
      z-index: 1000;
      transform: translateY(100%);
      transition: transform 0.7s cubic-bezier(0.68, -0.55, 0.27, 1.55);
      overflow: hidden;
    }
    .now-playing.active {
      transform: translateY(0);
    }
    .now-playing-bg {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-size: cover;
      background-position: center;
      opacity: 0.3;
      filter: blur(30px);
      z-index: -1;
      animation: pulse-bg 5s infinite;
    }
    @keyframes pulse-bg {
      0% { opacity: 0.3; transform: scale(1); }
      50% { opacity: 0.5; transform: scale(1.1); }
      100% { opacity: 0.3; transform: scale(1); }
    }
    .waveform {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 100%;
      display: flex;
      justify-content: space-around;
      align-items: center;
      z-index: 0;
      opacity: 0.2;
      pointer-events: none;
    }
    .waveform div {
      width: 3px;
      height: 50px;
      background: linear-gradient(180deg, #1DB954, #8a2be2, #1e90ff);
      border-radius: 2px;
      animation: wave 1.5s ease-in-out infinite;
      animation-delay: calc(0.1s * var(--i));
    }
    @keyframes wave {
      0%, 100% { height: 50px; transform: translateY(0); }
      50% { height: 150px; transform: translateY(-20px); }
    }
    .now-playing-header {
      display: flex;
      justify-content: space-between;
      width: 100%;
      align-items: center;
    }
    .now-playing-header i {
      font-size: 26px;
      cursor: pointer;
      color: #fff;
      transition: all 0.3s ease;
      padding: 10px;
    }
    .now-playing-header i:hover {
      color: #1DB954;
      transform: rotate(360deg);
      text-shadow: 0 0 15px #1DB954;
    }
    .now-playing-img-container {
      position: relative;
      perspective: 1000px;
      margin: 20px 0;
    }
    .now-playing-img {
      width: 300px;
      height: 300px;
      border-radius: 20px;
      box-shadow: 0 0 40px rgba(29, 185, 84, 0.7), 0 0 60px rgba(138, 43, 226, 0.5);
      animation: rotate3d 15s linear infinite;
      transform-style: preserve-3d;
    }
    @keyframes rotate3d {
      0% { transform: rotateY(0deg); }
      100% { transform: rotateY(360deg); }
    }
    .now-playing-info {
      text-align: center;
      margin-bottom: 20px;
      z-index: 1;
    }
    .now-playing-info h3 {
      font-size: 28px;
      font-weight: 800;
      margin-bottom: 5px;
      background: linear-gradient(45deg, #1DB954, #8a2be2, #1e90ff);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      text-shadow: 0 0 10px rgba(29, 185, 84, 0.6);
      animation: text-glow 3s infinite;
    }
    .now-playing-info p {
      font-size: 18px;
      color: #b3b3b3;
      text-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
    }
    @keyframes text-glow {
      0% { text-shadow: 0 0 10px rgba(29, 185, 84, 0.6); }
      50% { text-shadow: 0 0 20px rgba(138, 43, 226, 0.8); }
      100% { text-shadow: 0 0 10px rgba(29, 185, 84, 0.6); }
    }
    .progress-container {
      display: flex;
      align-items: center;
      width: 100%;
      max-width: 700px;
      gap: 15px;
      margin-bottom: 20px;
      z-index: 1;
    }
    #current-time, #total-duration {
      font-size: 14px;
      color: #b3b3b3;
      font-weight: 500;
      text-shadow: 0 0 5px rgba(29, 185, 84, 0.3);
    }
    .progress-bar {
      cursor: pointer;
      flex-grow: 1;
      height: 8px;
      background: #333;
      border-radius: 4px;
      position: relative;
      overflow: hidden;
      box-shadow: 0 0 15px rgba(29, 185, 84, 0.5);
    }
    .progress {
      height: 100%;
      background: linear-gradient(90deg, #1DB954, #8a2be2, #1e90ff);
      background-size: 200%;
      width: 0;
      transition: width 0.1s linear;
      animation: progress-glow 3s infinite;
    }
    @keyframes progress-glow {
      0% { background-position: 0%; }
      100% { background-position: 200%; }
    }
    .progress-bar:hover .progress {
      box-shadow: 0 0 20px #1DB954, 0 0 30px #8a2be2;
    }
    .now-playing-controls {
      display: flex;
      align-items: center;
      gap: 25px;
      margin-bottom: 20px;
      z-index: 1;
    }
    .now-playing-controls button {
      background: none;
      border: none;
      color: #fff;
      font-size: 26px;
      cursor: pointer;
      transition: all 0.3s ease;
      padding: 10px;
      border-radius: 50%;
      position: relative;
    }
    .now-playing-controls button:hover {
      color: #1DB954;
      transform: scale(1.2);
      text-shadow: 0 0 15px #1DB954;
      background: rgba(29, 185, 84, 0.2);
    }
    .now-playing-controls button.active {
      color: #1DB954;
      text-shadow: 0 0 15px #1DB954;
    }
    .now-playing-controls .play-pause-btn {
      font-size: 40px;
      border: 2px solid #1DB954;
      border-radius: 50%;
      width: 70px;
      height: 70px;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 0 20px rgba(29, 185, 84, 0.7);
      animation: pulse-btn 2s infinite;
    }
    .now-playing-controls .play-pause-btn:hover {
      border-color: #1e90ff;
      box-shadow: 0 0 30px rgba(30, 144, 255, 0.7);
    }
    @keyframes pulse-btn {
      0% { box-shadow: 0 0 20px rgba(29, 185, 84, 0.7); }
      50% { box-shadow: 0 0 40px rgba(29, 185, 84, 0.9); }
      100% { box-shadow: 0 0 20px rgba(29, 185, 84, 0.7); }
    }
    .now-playing-footer {
      display: flex;
      align-items: center;
      gap: 20px;
      z-index: 1;
    }
    .now-playing-footer i {
      font-size: 22px;
      color: #b3b3b3;
      cursor: pointer;
      transition: all 0.3s ease;
    }
    .now-playing-footer i:hover {
      color: #1DB954;
      transform: scale(1.2);
      text-shadow: 0 0 15px #1DB954;
    }
    .now-playing-footer i.active {
      color: #1DB954;
    }
    #volume {
      width: 120px;
      -webkit-appearance: none;
      background: #333;
      border-radius: 5px;
      height: 5px;
      outline: none;
      box-shadow: 0 0 10px rgba(29, 185, 84, 0.5);
    }
    #volume::-webkit-slider-thumb {
      -webkit-appearance: none;
      width: 14px;
      height: 14px;
      background: #1DB954;
      border-radius: 50%;
      cursor: pointer;
      box-shadow: 0 0 15px rgba(29, 185, 84, 0.7);
      transition: all 0.3s ease;
    }
    #volume::-webkit-slider-thumb:hover {
      background: #1e90ff;
      box-shadow: 0 0 20px rgba(30, 144, 255, 0.7);
    }
    .mini-player {
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      height: 70px;
      background: linear-gradient(90deg, #1a1a1a, #2a2a2a);
      display: none;
      align-items: center;
      padding: 10px;
      z-index: 999;
      border-top: 1px solid rgba(29, 185, 84, 0.4);
      box-shadow: 0 -4px 12px rgba(0, 0, 0, 0.6);
      transition: all 0.3s ease;
    }
    .mini-player.active {
      display: flex;
    }
    .mini-player:hover {
      transform: translateY(-2px);
      box-shadow: 0 -6px 20px rgba(29, 185, 84, 0.5);
    }
    .mini-player img {
      width: 50px;
      height: 50px;
      border-radius: 6px;
      margin-right: 10px;
      box-shadow: 0 0 10px rgba(29, 185, 84, 0.3);
    }
    .mini-player-info {
      flex: 1;
      min-width: 0;
    }
    .mini-player-info h3 {
      font-size: 14px;
      font-weight: 600;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      text-shadow: 0 0 5px rgba(29, 185, 84, 0.4);
    }
    .mini-player-info p {
      font-size: 11px;
      color: #b3b3b3;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    .mini-player-controls {
      display: flex;
      align-items: center;
      gap: 15px;
    }
    .mini-player-controls button {
      background: none;
      border: none;
      color: #fff;
      font-size: 18px;
      cursor: pointer;
      transition: all 0.2s ease;
      padding: 8px;
      border-radius: 50%;
    }
    .mini-player-controls button:hover {
      color: #1DB954;
      transform: scale(1.1);
      text-shadow: 0 0 10px #1DB954;
    }
    .mini-player-controls .mini-play-pause-btn {
      font-size: 22px;
      border: 1px solid #1DB954;
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .mini-player-controls .mini-play-pause-btn:hover {
      border-color: #1e90ff;
      box-shadow: 0 0 10px rgba(30, 144, 255, 0.5);
    }
    .loader {
      display: none;
      width: 80px;
      height: 50px;
      margin: 20px auto;
      display: flex;
      justify-content: space-between;
      align-items: flex-end;
      position: relative;
    }
    .loader div {
      width: 12px;
      height: 12px;
      background: linear-gradient(45deg, #1DB954, #8a2be2, #1e90ff);
      background-size: 200%;
      border-radius: 3px;
      animation: pulse 1.2s ease-in-out infinite;
      animation-delay: calc(0.1s * var(--i));
    }
    @keyframes pulse {
      0%, 100% {
        height: 12px;
        opacity: 0.6;
        transform: translateY(0);
      }
      50% {
        height: 40px;
        opacity: 1;
        transform: translateY(-5px);
        box-shadow: 0 0 10px rgba(29, 185, 84, 0.8), 0 0 20px rgba(138, 43, 226, 0.5);
      }
    }
    .loader::before {
      content: '';
      position: absolute;
      bottom: -10px;
      left: 0;
      right: 0;
      height: 2px;
      background: linear-gradient(45deg, #1DB954, #8a2be2, #1e90ff);
      opacity: 0.3;
      border-radius: 2px;
    }
    .download-message {
      position: fixed;
      top: 20px;
      right: 20px;
      background: rgba(29, 185, 84, 0.9);
      color: #fff;
      padding: 10px 20px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
      z-index: 1000;
      display: none;
    }
    .download-message.error {
      background: rgba(255, 77, 77, 0.9);
    }
    footer {
      text-align: center;
      padding: 12px;
      color: #b3b3b3;
      font-size: 12px;
      font-weight: 400;
    }
    @media (max-width: 600px) {
      .header {
        flex-direction: column;
        align-items: flex-start;
        padding: 10px;
      }
      .header-left {
        margin-bottom: 10px;
      }
      .search-bar {
        width: 100%;
      }
      .search-bar input {
        padding: 8px 30px;
        font-size: 13px;
      }
      .search-bar .search-icon, .search-bar .clear-icon {
        font-size: 13px;
      }
      .songs-container {
        grid-template-columns: 1fr;
        padding: 8px;
      }
      .song-card {
        padding: 10px;
        width: 317px;
      }
      .song-card img {
        width: 50px;
        height: 50px;
      }
      .song-info h3 {
        font-size: 12px;
      }
      .song-info p {
        font-size: 9px;
      }
      .song-meta {
        font-size: 8px;
      }
      .download-btn, .favorite-btn {
        width: 24px;
        height: 24px;
      }
      .download-btn i, .favorite-btn i {
        font-size: 11px;
      }
      .now-playing {
        padding: 20px;
      }
      .now-playing-img {
        width: 200px;
        height: 200px;
      }
      .now-playing-info h3 {
        font-size: 22px;
      }
      .now-playing-info p {
        font-size: 14px;
      }
      .progress-container {
        gap: 10px;
      }
      .progress-bar {
        height: 6px;
      }
      #current-time, #total-duration {
        font-size: 12px;
      }
      .now-playing-controls button {
        font-size: 20px;
        padding: 8px;
      }
      .now-playing-controls .play-pause-btn {
        font-size: 32px;
        width: 60px;
        height: 60px;
      }
      .now-playing-footer i {
        font-size: 18px;
      }
      #volume {
        width: 80px;
      }
      .waveform div {
        width: 2px;
        height: 30px;
      }
      @keyframes wave {
        0%, 100% { height: 30px; transform: translateY(0); }
        50% { height: 100px; transform: translateY(-10px); }
      }
      .mini-player {
        height: 60px;
        padding: 8px;
      }
      .mini-player img {
        width: 40px;
        height: 40px;
      }
      .mini-player-info h3 {
        font-size: 12px;
      }
      .mini-player-info p {
        font-size: 10px;
      }
      .mini-player-controls button {
        font-size: 16px;
        padding: 6px;
      }
      .mini-player-controls .mini-play-pause-btn {
        font-size: 18px;
        width: 35px;
        height: 35px;
      }
      .loader {
        width: 60px;
        height: 40px;
      }
      .loader div {
        width: 10px;
        height: 10px;
      }
      @keyframes pulse {
        0%, 100% {
          height: 10px;
          opacity: 0.6;
          transform: translateY(0);
        }
        50% {
          height: 30px;
          opacity: 1;
          transform: translateY(-5px);
          box-shadow: 0 0 8px rgba(29, 185, 84, 0.8), 0 0 15px rgba(138, 43, 226, 0.5);
        }
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <div class="header-left">
        <img class="logo" src="https://payez.site/vibe.png" alt="SpotVibe">
        <h1>InnerVibe - Premium Music Experience</h1>
      </div>
      <div class="search-bar">
        <i class="fas fa-search search-icon"></i>
        <input type="text" id="searchInput" placeholder="Search for songs...">
        <i class="fas fa-times clear-icon" id="clearInput"></i>
        <div class="suggestions" id="suggestions"></div>
      </div>
    </div>
    <div class="section-title" id="trending-title">Trending Songs</div>
    <div class="loader" id="loader">
      <div style="--i: 1;"></div>
      <div style="--i: 2;"></div>
      <div style="--i: 3;"></div>
      <div style="--i: 4;"></div>
      <div style="--i: 5;"></div>
    </div>
    <div class="songs-container" id="songs-container"></div>
    <div class="section-title" id="favorites-title">Favorite Songs</div>
    <div class="songs-container" id="favorites-container"></div>
  </div>
  <div class="now-playing" id="now-playing">
    <div class="now-playing-bg" id="now-playing-bg"></div>
    <div class="waveform">
      <div style="--i: 1;"></div>
      <div style="--i: 2;"></div>
      <div style="--i: 3;"></div>
      <div style="--i: 4;"></div>
      <div style="--i: 5;"></div>
      <div style="--i: 6;"></div>
      <div style="--i: 7;"></div>
      <div style="--i: 8;"></div>
      <div style="--i: 9;"></div>
      <div style="--i: 10;"></div>
    </div>
    <div class="now-playing-header">
      <i class="fas fa-chevron-down" onclick="closeNowPlaying()"></i>
      <i class="far fa-ellipsis-h"></i>
    </div>
    <div class="now-playing-img-container">
      <img class="now-playing-img" id="now-playing-img" src="" alt="Now Playing">
    </div>
    <div class="now-playing-info">
      <h3 id="now-playing-title"></h3>
      <p id="now-playing-artist"></p>
    </div>
    <div class="progress-container">
      <span id="current-time">0:00</span>
      <div class="progress-bar"><div class="progress" id="progress"></div></div>
      <span id="total-duration">0:00</span>
    </div>
    <div class="now-playing-controls">
      <button onclick="toggleShuffle()" id="shuffle-btn"><i class="fas fa-random"></i></button>
      <button onclick="previousSong()"><i class="fas fa-backward"></i></button>
      <button onclick="togglePlayPause()" class="play-pause-btn"><i class="fas fa-play" id="play-pause-icon"></i></button>
      <button onclick="nextSong()"><i class="fas fa-forward"></i></button>
      <button onclick="toggleRepeat()" id="repeat-btn"><i class="fas fa-redo"></i></button>
    </div>
    <div class="now-playing-footer">
      <i class="far fa-heart" id="like-btn" onclick="toggleFavorite(currentSongIndex)"></i>
      <i class="fas fa-volume-up"></i>
      <input type="range" id="volume" min="0" max="1" step="0.01" value="1">
      <i class="fas fa-share"></i>
    </div>
  </div>
  <div class="mini-player" id="mini-player">
    <img id="mini-player-img" src="" alt="Now Playing">
    <div class="mini-player-info">
      <h3 id="mini-player-title"></h3>
      <p id="mini-player-artist"></p>
    </div>
    <div class="mini-player-controls">
      <button onclick="previousSong()"><i class="fas fa-backward"></i></button>
      <button onclick="togglePlayPause()" class="mini-play-pause-btn"><i class="fas fa-play" id="mini-play-pause-icon"></i></button>
      <button onclick="nextSong()"><i class="fas fa-forward"></i></button>
      <button onclick="openNowPlaying()"><i class="fas fa-chevron-up"></i></button>
    </div>
  </div>
  <div class="download-message" id="downloadMessage"></div>
  <footer>Made with 🎵 by InnerVibe</footer>
  <script src="https://www.youtube.com/iframe_api"></script>
  <script>
    // YouTube IFrame Player API
    let player;
    function onYouTubeIframeAPIReady() {
      player = new YT.Player('player', {
        height: '0',
        width: '0',
        playerVars: { autoplay: 0, controls: 0 },
        events: { 'onReady': () => console.log('YouTube Player Ready') }
      });
    }

    // State management
    let songs = [];
    let currentSongIndex = -1;
    let audio = new Audio();
    let favorites = JSON.parse(localStorage.getItem('favorites')) || [];
    const API_KEY = 'YOUR_YOUTUBE_API_KEY'; // Replace with your YouTube API key
    const searchInput = document.getElementById('searchInput');
    const clearInput = document.getElementById('clearInput');
    const suggestions = document.getElementById('suggestions');
    const songsContainer = document.getElementById('songs-container');
    const favoritesContainer = document.getElementById('favorites-container');
    const loader = document.getElementById('loader');
    const nowPlaying = document.getElementById('now-playing');
    const nowPlayingBg = document.getElementById('now-playing-bg');
    const nowPlayingImg = document.getElementById('now-playing-img');
    const nowPlayingTitle = document.getElementById('now-playing-title');
    const nowPlayingArtist = document.getElementById('now-playing-artist');
    const progress = document.getElementById('progress');
    const playPauseIcon = document.getElementById('play-pause-icon');
    const volumeControl = document.getElementById('volume');
    const downloadMessage = document.getElementById('downloadMessage');
    const currentTime = document.getElementById('current-time');
    const totalDuration = document.getElementById('total-duration');
    const progressBar = document.querySelector('.progress-bar');
    const shuffleBtn = document.getElementById('shuffle-btn');
    const repeatBtn = document.getElementById('repeat-btn');
    const likeBtn = document.getElementById('like-btn');
    const miniPlayer = document.getElementById('mini-player');
    const miniPlayerImg = document.getElementById('mini-player-img');
    const miniPlayerTitle = document.getElementById('mini-player-title');
    const miniPlayerArtist = document.getElementById('mini-player-artist');
    const miniPlayPauseIcon = document.getElementById('mini-play-pause-icon');
    let isShuffle = false;
    let repeatMode = 0; // 0: no repeat, 1: repeat all, 2: repeat one
    let isPlaying = false;
    let currentView = 'trending'; // Track current view: 'trending' or 'favorites'

    // Format play count
    function formatPlayCount(plays) {
      if (!plays) return 'N/A';
      const num = parseInt(plays);
      if (num >= 1000000) return `${(num / 1000000).toFixed(1)}M plays`;
      if (num >= 1000) return `${(num / 1000).toFixed(1)}K plays`;
      return `${num} plays`;
    }

    // Format time
    function formatTime(seconds) {
      const minutes = Math.floor(seconds / 60);
      const secs = Math.floor(seconds % 60);
      return `${minutes}:${secs < 10 ? '0' : ''}${secs}`;
    }

    // Show download message
    function showDownloadMessage(message, isError = false) {
      downloadMessage.textContent = message;
      downloadMessage.classList.toggle('error', isError);
      downloadMessage.style.display = 'block';
      setTimeout(() => {
        downloadMessage.style.display = 'none';
      }, 3000);
    }

    // Load songs on page load
    window.onload = () => {
      loadTrendingSongs();
      displayFavorites();
    };

    // Fetch trending songs
    async function loadTrendingSongs() {
      loader.style.display = 'flex';
      songsContainer.innerHTML = '';
      try {
        const jioUrl = 'https://jiosavan-coderaryan.vercel.app/search?query=new';
        const jioResponse = await fetch(jioUrl);
        const jioData = await jioResponse.json();
        songs = jioData.results ? jioData.results.map(item => ({
          id: item.id || `${item.name}-${item.artist}`, // Unique ID for favorites
          name: item.name || 'Unknown Song',
          thumbnail: item.thumbnail || 'https://via.placeholder.com/150',
          audio_url: item.audio_url || '',
          artist: item.artists || item.artist || 'Unknown Artist',
          album: item.album || 'Unknown Album',
          play_count: item.play_count || '0',
          language: item.language || 'N/A',
          label: item.label || 'N/A',
          bitrate: item.bitrate || 'N/A',
          isYouTube: false
        })) : [];

        if (!songs.length) {
          const ytUrl = `https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults=10&q=trending+music&type=video&key=${API_KEY}`;
          const ytResponse = await fetch(ytUrl);
          const ytData = await ytResponse.json();
          const videoIds = ytData.items.map(item => item.id.videoId).join(',');
          const statsUrl = `https://www.googleapis.com/youtube/v3/videos?part=statistics&id=${videoIds}&key=${API_KEY}`;
          const statsResponse = await fetch(statsUrl);
          const statsData = await statsResponse.json();

          songs = ytData.items.map((item, index) => ({
            id: item.id.videoId, // Unique ID for YouTube songs
            name: item.snippet.title,
            thumbnail: item.snippet.thumbnails.default.url,
            audio_url: `https://www.youtube.com/watch?v=${item.id.videoId}`,
            artist: item.snippet.channelTitle || 'Unknown Artist',
            album: 'N/A',
            play_count: statsData.items[index]?.statistics?.viewCount || '0',
            language: 'N/A',
            label: 'YouTube',
            bitrate: 'N/A',
            isYouTube: true
          }));
        }

        displaySongs(songs);
      } catch (error) {
        console.error('Error fetching trending songs:', error);
        songsContainer.innerHTML = '<p style="color: #ff4d4d;">Failed to load trending songs. Please check your internet or try again.</p>';
      } finally {
        loader.style.display = 'none';
      }
    }

    // Real-time suggestions
    let debounceTimeout;
    searchInput.addEventListener('input', () => {
      const query = searchInput.value.trim();
      clearInput.classList.toggle('show', query.length > 0);
      if (query.length < 2) {
        suggestions.classList.remove('show');
        currentView = 'trending';
        displaySongs(songs);
        displayFavorites();
        return;
      }
      clearTimeout(debounceTimeout);
      debounceTimeout = setTimeout(() => fetchSuggestions(query), 300);
    });

    // Clear input
    clearInput.addEventListener('click', () => {
      searchInput.value = '';
      clearInput.classList.remove('show');
      suggestions.classList.remove('show');
      currentView = 'trending';
      loadTrendingSongs();
      displayFavorites();
    });

    // Trigger search on Enter
    searchInput.addEventListener('keydown', (e) => {
      if (e.key === 'Enter') {
        e.preventDefault();
        fetchSuggestions(searchInput.value.trim());
      }
    });

    // Fetch suggestions
    async function fetchSuggestions(query) {
      try {
        const jioUrl = `https://jiosavan-coderaryan.vercel.app/search?query=${encodeURIComponent(query)}`;
        const jioResponse = await fetch(jioUrl);
        const jioData = await jioResponse.json();
        songs = jioData.results ? jioData.results.map(item => ({
          id: item.id || `${item.name}-${item.artist}`,
          name: item.name || 'Unknown Song',
          thumbnail: item.thumbnail || 'https://via.placeholder.com/150',
          audio_url: item.audio_url || '',
          artist: item.artists || item.artist || 'Unknown Artist',
          album: item.album || 'Unknown Album',
          play_count: item.play_count || '0',
          language: item.language || 'N/A',
          label: item.label || 'N/A',
          bitrate: item.bitrate || 'N/A',
          isYouTube: false
        })) : [];

        if (!songs.length) {
          const ytUrl = `https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults=10&q=${encodeURIComponent(query)}&type=video&key=${API_KEY}`;
          const ytResponse = await fetch(ytUrl);
          const ytData = await ytResponse.json();
          const videoIds = ytData.items.map(item => item.id.videoId).join(',');
          const statsUrl = `https://www.googleapis.com/youtube/v3/videos?part=statistics&id=${videoIds}&key=${API_KEY}`;
          const statsResponse = await fetch(statsUrl);
          const statsData = await statsResponse.json();

          songs = ytData.items.map((item, index) => ({
            id: item.id.videoId,
            name: item.snippet.title,
            thumbnail: item.snippet.thumbnails.default.url,
            audio_url: `https://www.youtube.com/watch?v=${item.id.videoId}`,
            artist: item.snippet.channelTitle || 'Unknown Artist',
            album: 'N/A',
            play_count: statsData.items[index]?.statistics?.viewCount || '0',
            language: 'N/A',
            label: 'YouTube',
            bitrate: 'N/A',
            isYouTube: true
          }));
        }

        currentView = 'search';
        displaySongs(songs);
        displayFavorites();
      } catch (error) {
        console.error('Error fetching songs:', error);
        songsContainer.innerHTML = '<p style="color: #ff4d4d;">Failed to load songs. Please try again.</p>';
      } finally {
        loader.style.display = 'none';
      }
    }

    // Display songs
    function displaySongs(songs) {
      songsContainer.innerHTML = '';
      songs.forEach((song, index) => {
        const isFavorited = favorites.some(fav => fav.id === song.id);
        const songCard = document.createElement('div');
        songCard.className = 'song-card';
        songCard.innerHTML = `
          <img src="${song.thumbnail}" alt="${song.name}">
          <div class="song-info">
            <h3>${song.name}</h3>
            <p>${song.artist}</p>
            <div class="song-meta">
              <span><i class="fas fa-compact-disc"></i>${song.album}</span>
              <span><i class="fas fa-play"></i>${formatPlayCount(song.play_count)}</span>
              <span><i class="fas fa-language"></i>${song.language}</span>
              <span><i class="fas fa-tag"></i>${song.label}</span>
              <span><i class="fas fa-music"></i>${song.bitrate}</span>
            </div>
          </div>
          <button class="download-btn" onclick="downloadSong(${index})">
            <i class="fas fa-download"></i>
          </button>
          <button class="favorite-btn ${isFavorited ? 'active' : ''}" onclick="toggleFavorite(${index})">
            <i class="${isFavorited ? 'fas' : 'far'} fa-heart"></i>
          </button>
        `;
        songCard.onclick = (e) => {
          if (!e.target.closest('.download-btn') && !e.target.closest('.favorite-btn')) {
            playSong(index);
          }
        };
        songsContainer.appendChild(songCard);
      });
    }

    // Display favorite songs
    function displayFavorites() {
      favoritesContainer.innerHTML = '';
      if (favorites.length === 0) {
        favoritesContainer.innerHTML = '<p style="color: #b3b3b3;">No favorite songs yet. Add some using the heart button!</p>';
        return;
      }
      favorites.forEach((song, index) => {
        const songCard = document.createElement('div');
        songCard.className = 'song-card';
        songCard.innerHTML = `
          <img src="${song.thumbnail}" alt="${song.name}">
          <div class="song-info">
            <h3>${song.name}</h3>
            <p>${song.artist}</p>
            <div class="song-meta">
              <span><i class="fas fa-compact-disc"></i>${song.album}</span>
              <span><i class="fas fa-play"></i>${formatPlayCount(song.play_count)}</span>
              <span><i class="fas fa-language"></i>${song.language}</span>
              <span><i class="fas fa-tag"></i>${song.label}</span>
              <span><i class="fas fa-music"></i>${song.bitrate}</span>
            </div>
          </div>
          <button class="download-btn" onclick="downloadSong(${index}, 'favorites')">
            <i class="fas fa-download"></i>
          </button>
          <button class="favorite-btn active" onclick="toggleFavorite(${index}, 'favorites')">
            <i class="fas fa-heart"></i>
          </button>
        `;
        songCard.onclick = (e) => {
          if (!e.target.closest('.download-btn') && !e.target.closest('.favorite-btn')) {
            playSongFromFavorites(index);
          }
        };
        favoritesContainer.appendChild(songCard);
      });
    }

    // Toggle favorite song
    function toggleFavorite(index, source = 'trending') {
      const songList = source === 'favorites' ? favorites : songs;
      const song = songList[index];
      const isFavorited = favorites.some(fav => fav.id === song.id);

      if (isFavorited) {
        favorites = favorites.filter(fav => fav.id !== song.id);
        showDownloadMessage(`Removed ${song.name} from favorites`, false);
      } else {
        favorites.push(song);
        showDownloadMessage(`Added ${song.name} to favorites`, false);
      }

      localStorage.setItem('favorites', JSON.stringify(favorites));
      displaySongs(songs);
      displayFavorites();

      // Update now-playing like button if the current song is toggled
      if (currentSongIndex !== -1 && songs[currentSongIndex]?.id === song.id) {
        const isNowFavorited = favorites.some(fav => fav.id === song.id);
        likeBtn.className = isNowFavorited ? 'fas fa-heart' : 'far fa-heart';
        likeBtn.classList.toggle('active', isNowFavorited);
      }
    }

    // Download song
    async function downloadSong(index, source = 'trending') {
      const songList = source === 'favorites' ? favorites : songs;
      const song = songList[index];

      if (song.isYouTube) {
        showDownloadMessage('Downloading YouTube songs is not allowed due to Terms of Service.', true);
        return;
      }

      if (song.audio_url) {
        try {
          const response = await fetch(song.audio_url);
          if (!response.ok) throw new Error('Failed to fetch the song');

          const blob = await response.blob();
          const url = window.URL.createObjectURL(blob);
          const link = document.createElement('a');
          link.href = url;
          link.download = `${song.name}.mp3`;
          document.body.appendChild(link);
          link.click();
          document.body.removeChild(link);
          window.URL.revokeObjectURL(url);
          showDownloadMessage(`Downloading ${song.name}`);
        } catch (error) {
          console.error('Download error:', error);
          showDownloadMessage('Failed to download the song. Please try again.', true);
        }
      } else {
        showDownloadMessage('Download not available for this song.', true);
      }
    }

    // Play song
    function playSong(index) {
      if (index < 0 || index >= songs.length) return;
      currentSongIndex = index;
      currentView = 'trending';
      const song = songs[index];
      
      if (song.isYouTube) {
        nowPlaying.classList.add('active');
        miniPlayer.classList.remove('active');
        player.loadVideoById(song.audio_url.split('v=')[1]);
        audio.pause();
      } else {
        audio.src = song.audio_url;
        audio.play().catch(e => console.error('Playback failed:', e));
        isPlaying = true;
        nowPlaying.classList.add('active');
        miniPlayer.classList.remove('active');
        nowPlayingBg.style.backgroundImage = `url(${song.thumbnail})`;
        nowPlayingImg.src = song.thumbnail;
        nowPlayingTitle.textContent = song.name;
        nowPlayingArtist.textContent = song.artist;
        miniPlayerImg.src = song.thumbnail;
        miniPlayerTitle.textContent = song.name;
        miniPlayerArtist.textContent = song.artist;
        playPauseIcon.className = 'fas fa-pause';
        miniPlayPauseIcon.className = 'fas fa-pause';
        const isFavorited = favorites.some(fav => fav.id === song.id);
        likeBtn.className = isFavorited ? 'fas fa-heart' : 'far fa-heart';
        likeBtn.classList.toggle('active', isFavorited);
        shuffleBtn.classList.toggle('active', isShuffle);
        repeatBtn.classList.toggle('active', repeatMode !== 0);
      }
    }

    // Play song from favorites
    function playSongFromFavorites(index) {
      if (index < 0 || index >= favorites.length) return;
      currentSongIndex = index;
      currentView = 'favorites';
      const song = favorites[index];
      
      if (song.isYouTube) {
        nowPlaying.classList.add('active');
        miniPlayer.classList.remove('active');
        player.loadVideoById(song.audio_url.split('v=')[1]);
        audio.pause();
      } else {
        audio.src = song.audio_url;
        audio.play().catch(e => console.error('Playback failed:', e));
        isPlaying = true;
        nowPlaying.classList.add('active');
        miniPlayer.classList.remove('active');
        nowPlayingBg.style.backgroundImage = `url(${song.thumbnail})`;
        nowPlayingImg.src = song.thumbnail;
        nowPlayingTitle.textContent = song.name;
        nowPlayingArtist.textContent = song.artist;
        miniPlayerImg.src = song.thumbnail;
        miniPlayerTitle.textContent = song.name;
        miniPlayerArtist.textContent = song.artist;
        playPauseIcon.className = 'fas fa-pause';
        miniPlayPauseIcon.className = 'fas fa-pause';
        likeBtn.className = 'fas fa-heart';
        likeBtn.classList.add('active');
        shuffleBtn.classList.toggle('active', isShuffle);
        repeatBtn.classList.toggle('active', repeatMode !== 0);
      }
    }

    // Close now playing panel
    function closeNowPlaying() {
      nowPlaying.classList.remove('active');
      if (currentSongIndex !== -1) {
        miniPlayer.classList.add('active');
      }
    }

    // Open now playing panel from mini player
    function openNowPlaying() {
      nowPlaying.classList.add('active');
      miniPlayer.classList.remove('active');
    }

    // Playback controls
    function togglePlayPause() {
      if (audio.paused && audio.src) {
        audio.play().catch(e => console.error('Playback failed:', e));
        isPlaying = true;
        playPauseIcon.className = 'fas fa-pause';
        miniPlayPauseIcon.className = 'fas fa-pause';
      } else {
        audio.pause();
        isPlaying = false;
        playPauseIcon.className = 'fas fa-play';
        miniPlayPauseIcon.className = 'fas fa-play';
      }
    }

    function nextSong() {
      const songList = currentView === 'favorites' ? favorites : songs;
      if (isShuffle) {
        const randomIndex = Math.floor(Math.random() * songList.length);
        currentView === 'favorites' ? playSongFromFavorites(randomIndex) : playSong(randomIndex);
      } else if (repeatMode === 2) {
        currentView === 'favorites' ? playSongFromFavorites(currentSongIndex) : playSong(currentSongIndex);
      } else if (currentSongIndex < songList.length - 1) {
        currentView === 'favorites' ? playSongFromFavorites(currentSongIndex + 1) : playSong(currentSongIndex + 1);
      } else if (repeatMode === 1) {
        currentView === 'favorites' ? playSongFromFavorites(0) : playSong(0);
      }
    }

    function previousSong() {
      const songList = currentView === 'favorites' ? favorites : songs;
      if (isShuffle) {
        const randomIndex = Math.floor(Math.random() * songList.length);
        currentView === 'favorites' ? playSongFromFavorites(randomIndex) : playSong(randomIndex);
      } else if (currentSongIndex > 0) {
        currentView === 'favorites' ? playSongFromFavorites(currentSongIndex - 1) : playSong(currentSongIndex - 1);
      } else if (repeatMode === 1) {
        currentView === 'favorites' ? playSongFromFavorites(songList.length - 1) : playSong(songList.length - 1);
      }
    }

    // Progress bar and time
    audio.onloadedmetadata = () => {
      totalDuration.textContent = formatTime(audio.duration);
      progress.style.width = '0%';
    };

    audio.ontimeupdate = () => {
      if (audio.duration) {
        const progressPercent = (audio.currentTime / audio.duration) * 100;
        progress.style.width = `${progressPercent}%`;
        currentTime.textContent = formatTime(audio.currentTime);
      }
    };

    // Interactive progress bar
    progressBar.addEventListener('click', (e) => {
      const rect = progressBar.getBoundingClientRect();
      const clickX = e.clientX - rect.left;
      const width = rect.width;
      const percentage = clickX / width;
      audio.currentTime = percentage * audio.duration;
    });

    // Shuffle and Repeat
    function toggleShuffle() {
      isShuffle = !isShuffle;
      shuffleBtn.classList.toggle('active', isShuffle);
    }

    function toggleRepeat() {
      repeatMode = (repeatMode + 1) % 3;
      repeatBtn.classList.toggle('active', repeatMode !== 0);
    }

    // Volume control
    volumeControl.oninput = () => {
      audio.volume = volumeControl.value;
    };

    // Auto-play next song
    audio.onended = () => nextSong();

    // Keyboard shortcuts
    document.addEventListener('keydown', (e) => {
      if (e.code === 'Space' && (nowPlaying.classList.contains('active') || miniPlayer.classList.contains('active'))) {
        e.preventDefault();
        togglePlayPause();
      }
    });

    // Toggle between trending and favorites
    document.getElementById('trending-title').addEventListener('click', () => {
      currentView = 'trending';
      loadTrendingSongs();
      displayFavorites();
    });

    document.getElementById('favorites-title').addEventListener('click', () => {
      currentView = 'favorites';
      songsContainer.innerHTML = '<p style="color: #b3b3b3;">Showing favorite songs below.</p>';
      displayFavorites();
    });
  </script>
</body>
</html/>