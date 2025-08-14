 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QuickMusic - Premium Music Player</title>
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
    .app-container {
      height: 100vh;
      display: flex;
      flex-direction: column;
    }
    .main-content {
      flex: 1;
      overflow-y: auto;
      padding-bottom: 90px;
      min-height: calc(100vh - 90px);
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
      padding: 20px 25px;
      background: linear-gradient(135deg, #1a1a1a 0%, #2a2a2a 50%, #1e1e1e 100%);
      border-radius: 20px;
      margin-bottom: 20px;
      box-shadow: 
        0 8px 32px rgba(29, 185, 84, 0.15),
        0 4px 16px rgba(138, 43, 226, 0.1),
        inset 0 1px 0 rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.05);
      position: relative;
      overflow: hidden;
    }
    .header::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(29, 185, 84, 0.1), transparent);
      animation: shimmer 3s infinite;
    }
    @keyframes shimmer {
      0% { left: -100%; }
      100% { left: 100%; }
    }
    .logo {
      width: 120px;
      height: 120px;
      filter: drop-shadow(0 0 15px #1DB954) drop-shadow(0 0 30px rgba(29, 185, 84, 0.7));
      transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
      border-radius: 20px;
      background: linear-gradient(135deg, rgba(29, 185, 84, 0.1), rgba(138, 43, 226, 0.1));
      padding: 12px;
      backdrop-filter: blur(15px);
      border: 2px solid rgba(29, 185, 84, 0.3);
      position: relative;
      overflow: hidden;
    }
    .logo::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: linear-gradient(45deg, transparent, rgba(29, 185, 84, 0.1), transparent);
      animation: logo-shimmer 3s infinite;
      transform: rotate(45deg);
    }
    @keyframes logo-shimmer {
      0% { transform: translateX(-100%) rotate(45deg); }
      100% { transform: translateX(100%) rotate(45deg); }
    }
    .logo:hover {
      transform: scale(1.2) rotate(10deg) translateY(-5px);
      filter: drop-shadow(0 0 25px #1DB954) drop-shadow(0 0 50px rgba(29, 185, 84, 0.9));
      border-color: rgba(29, 185, 84, 0.8);
      box-shadow: 0 10px 30px rgba(29, 185, 84, 0.5);
    }
    .logo-container {
      position: relative;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 10px;
    }
    .logo-text {
      font-size: 12px;
      font-weight: 600;
      color: #1DB954;
      text-align: center;
      text-shadow: 0 0 10px rgba(29, 185, 84, 0.5);
      letter-spacing: 1px;
      opacity: 0.8;
      transition: all 0.3s ease;
    }
    .logo-container:hover .logo-text {
      opacity: 1;
      transform: translateY(-2px);
      text-shadow: 0 0 15px rgba(29, 185, 84, 0.8);
    }
    h1 {
      font-size: 26px;
      font-weight: 800;
      background: linear-gradient(45deg, #1DB954, #8a2be2, #1e90ff, #1DB954);
      background-size: 400%;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      letter-spacing: 1px;
      text-shadow: 0 0 30px rgba(29, 185, 84, 0.5);
      animation: gradient-text 4s ease-in-out infinite;
      position: relative;
    }
    h1::after {
      content: '';
      position: absolute;
      bottom: -5px;
      left: 0;
      width: 100%;
      height: 3px;
      background: linear-gradient(45deg, #1DB954, #8a2be2, #1e90ff);
      border-radius: 2px;
      animation: pulse-underline 2s ease-in-out infinite;
    }
    @keyframes gradient-text {
      0%, 100% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
    }
    @keyframes pulse-underline {
      0%, 100% { 
        transform: scaleX(1);
        opacity: 0.8;
      }
      50% { 
        transform: scaleX(1.1);
        opacity: 1;
        box-shadow: 0 0 20px rgba(29, 185, 84, 0.8);
      }
    }
    .header-left {
      display: flex;
      align-items: center;
      gap: 20px;
      position: relative;
      z-index: 1;
    }
    .header-left::before {
      content: '';
      position: absolute;
      left: -10px;
      top: -10px;
      right: -10px;
      bottom: -10px;
      background: radial-gradient(circle at center, rgba(29, 185, 84, 0.1) 0%, transparent 70%);
      border-radius: 20px;
      z-index: -1;
    }
    .search-bar {
      position: relative;
      width: 350px;
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(15px);
      border-radius: 25px;
      padding: 4px;
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      box-shadow: 
        0 4px 20px rgba(0, 0, 0, 0.3),
        inset 0 1px 0 rgba(255, 255, 255, 0.2);
      border: 1px solid rgba(29, 185, 84, 0.2);
    }
    .search-bar:hover, .search-bar:focus-within {
      transform: scale(1.02) translateY(-2px);
      box-shadow: 
        0 8px 30px rgba(29, 185, 84, 0.3),
        0 4px 20px rgba(138, 43, 226, 0.2),
        inset 0 1px 0 rgba(255, 255, 255, 0.3);
      border-color: rgba(29, 185, 84, 0.5);
    }
    .search-bar input {
      padding: 14px 45px;
      border-radius: 25px;
      border: none;
      background: rgba(0, 0, 0, 0.3);
      width: 100%;
      color: #fff;
      font-size: 15px;
      font-weight: 500;
      transition: all 0.4s ease;
      backdrop-filter: blur(10px);
    }
    .search-bar input:focus {
      outline: none;
      background: rgba(0, 0, 0, 0.4);
      box-shadow: inset 0 2px 10px rgba(0, 0, 0, 0.5);
      transform: scale(1.01);
    }
    .search-bar input::placeholder {
      color: #b3b3b3;
      font-weight: 400;
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
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #1DB954;
      font-size: 16px;
      transition: all 0.3s ease;
      text-shadow: 0 0 10px rgba(29, 185, 84, 0.5);
    }
    .search-bar input:focus + .search-icon {
      transform: translateY(-50%) scale(1.3);
      color: #8a2be2;
      text-shadow: 0 0 15px rgba(138, 43, 226, 0.8);
    }
    .search-bar .clear-icon {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #b3b3b3;
      font-size: 16px;
      cursor: pointer;
      display: none;
      transition: all 0.3s ease;
      padding: 4px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.1);
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

    /* Page Sections */
    .page-section {
      display: none;
    }
    .page-section.active {
      display: block;
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
    .add-to-playlist-btn {
      position: absolute;
      bottom: 8px;
      left: 8px;
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
    .add-to-playlist-btn i {
      color: #fff;
      font-size: 12px;
    }
    .add-to-playlist-btn:hover {
      box-shadow: 0 0 10px rgba(29, 185, 84, 0.7);
      transform: scale(1.1);
    }

    /* Playlist styles with crazy cool effects */
    .playlist-controls {
      display: flex;
      justify-content: flex-start;
      margin: 20px 0;
      position: relative;
    }
    .create-playlist-btn {
      background: linear-gradient(135deg, #1DB954, #8a2be2, #1e90ff, #ff6b35);
      background-size: 400% 400%;
      border: none;
      border-radius: 25px;
      color: #fff;
      padding: 15px 30px;
      font-size: 16px;
      font-weight: 700;
      cursor: pointer;
      transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
      display: flex;
      align-items: center;
      gap: 10px;
      position: relative;
      overflow: hidden;
      text-transform: uppercase;
      letter-spacing: 1px;
      box-shadow: 
        0 8px 25px rgba(29, 185, 84, 0.4),
        0 4px 15px rgba(138, 43, 226, 0.3);
      animation: gradient-shift 4s ease infinite;
    }
    @keyframes gradient-shift {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }
    .create-playlist-btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
      transition: left 0.6s;
    }
    .create-playlist-btn:hover::before {
      left: 100%;
    }
    .create-playlist-btn:hover {
      transform: scale(1.1) translateY(-3px);
      box-shadow: 
        0 15px 35px rgba(29, 185, 84, 0.6),
        0 8px 25px rgba(138, 43, 226, 0.5),
        0 0 50px rgba(30, 144, 255, 0.3);
      text-shadow: 0 0 20px rgba(255, 255, 255, 0.8);
    }
    .create-playlist-btn i {
      font-size: 18px;
      animation: pulse-icon 2s infinite;
    }
    @keyframes pulse-icon {
      0% { transform: scale(1); }
      50% { transform: scale(1.2); }
      100% { transform: scale(1); }
    }
    .playlists-container {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 25px;
      margin-bottom: 30px;
      padding: 10px;
    }
    .playlist-card {
      background: linear-gradient(135deg, #1c1c1c 0%, #2a2a2a 50%, #1e1e1e 100%);
      border-radius: 20px;
      padding: 20px;
      cursor: pointer;
      transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      position: relative;
      border: 2px solid transparent;
      overflow: hidden;
      backdrop-filter: blur(10px);
    }
    .playlist-card::before {
      content: '';
      position: absolute;
      inset: 0;
      border-radius: 20px;
      padding: 2px;
      background: linear-gradient(45deg, #1DB954, #8a2be2, #1e90ff, #ff6b35);
      background-size: 300%;
      -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
      -webkit-mask-composite: xor;
      mask-composite: exclude;
      animation: rainbow-border 3s linear infinite;
      opacity: 0;
      transition: opacity 0.3s ease;
    }
    @keyframes rainbow-border {
      0% { background-position: 0%; }
      100% { background-position: 300%; }
    }
    .playlist-card::after {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(29, 185, 84, 0.1) 0%, transparent 70%);
      opacity: 0;
      transition: all 0.4s ease;
      transform: scale(0);
    }
    .playlist-card:hover::before {
      opacity: 1;
    }
    .playlist-card:hover::after {
      opacity: 1;
      transform: scale(1);
    }
    .playlist-card:hover {
      transform: translateY(-15px) rotateX(5deg) rotateY(5deg);
      background: linear-gradient(135deg, #252525 0%, #353535 50%, #2a2a2a 100%);
      box-shadow: 
        0 20px 40px rgba(29, 185, 84, 0.4),
        0 10px 30px rgba(138, 43, 226, 0.3),
        0 0 60px rgba(30, 144, 255, 0.2);
    }
    .playlist-card h4 {
      font-size: 20px;
      font-weight: 700;
      margin-bottom: 8px;
      color: #fff;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      background: linear-gradient(45deg, #1DB954, #8a2be2, #1e90ff);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      text-shadow: 0 0 20px rgba(29, 185, 84, 0.5);
      animation: text-glow 3s infinite;
      position: relative;
      z-index: 1;
    }
    .playlist-card p {
      font-size: 14px;
      color: #b3b3b3;
      margin-bottom: 15px;
      font-weight: 500;
      text-shadow: 0 0 10px rgba(179, 179, 179, 0.3);
      position: relative;
      z-index: 1;
    }
    .playlist-meta {
      display: flex;
      align-items: center;
      gap: 15px;
      font-size: 12px;
      color: #888;
      position: relative;
      z-index: 1;
    }
    .playlist-meta i {
      color: #1DB954;
      text-shadow: 0 0 5px rgba(29, 185, 84, 0.5);
    }
    .playlist-actions {
      position: absolute;
      top: 15px;
      right: 15px;
      display: flex;
      gap: 8px;
      z-index: 2;
    }
    .playlist-action-btn {
      background: rgba(255, 77, 77, 0.2);
      border: 2px solid rgba(255, 77, 77, 0.3);
      border-radius: 50%;
      width: 35px;
      height: 35px;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
      backdrop-filter: blur(10px);
    }
    .playlist-action-btn:hover {
      background: rgba(255, 77, 77, 0.4);
      border-color: #ff4d4d;
      transform: scale(1.2) rotate(15deg);
      box-shadow: 0 0 20px rgba(255, 77, 77, 0.6);
    }
    .playlist-action-btn i {
      color: #ff4d4d;
      font-size: 12px;
      transition: all 0.3s ease;
    }
    .playlist-action-btn:hover i {
      color: #fff;
      text-shadow: 0 0 10px #ff4d4d;
    }
    .playlist-view {
      display: none;
    }
    .playlist-view.active {
      display: block;
    }
    .playlist-header {
      display: flex;
      align-items: center;
      gap: 15px;
      margin-bottom: 20px;
      padding-bottom: 15px;
      border-bottom: 1px solid #333;
    }
    .back-btn {
      background: linear-gradient(45deg, #1DB954, #8a2be2);
      border: none;
      border-radius: 20px;
      color: #fff;
      padding: 8px 15px;
      font-size: 12px;
      cursor: pointer;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      gap: 5px;
    }
    .back-btn:hover {
      transform: scale(1.05);
      box-shadow: 0 4px 15px rgba(29, 185, 84, 0.4);
    }

    /* Bottom Navigation */
    .bottom-nav {
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      background: linear-gradient(90deg, #1a1a1a, #2a2a2a);
      border-top: 1px solid rgba(29, 185, 84, 0.4);
      padding: 10px 0;
      z-index: 999;
      display: flex;
      justify-content: space-around;
      align-items: center;
      box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.5);
    }
    .nav-item {
      display: flex;
      flex-direction: column;
      align-items: center;
      cursor: pointer;
      transition: all 0.3s ease;
      padding: 5px 20px;
      border-radius: 10px;
    }
    .nav-item:hover {
      background: rgba(29, 185, 84, 0.1);
    }
    .nav-item.active {
      background: rgba(29, 185, 84, 0.2);
    }
    .nav-item i {
      font-size: 20px;
      color: #b3b3b3;
      margin-bottom: 5px;
      transition: color 0.3s ease;
    }
    .nav-item.active i {
      color: #1DB954;
    }
    .nav-item span {
      font-size: 11px;
      color: #b3b3b3;
      transition: color 0.3s ease;
    }
    .nav-item.active span {
      color: #1DB954;
    }

    /* Modal styles */
    .playlist-modal {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(0, 0, 0, 0.8);
      backdrop-filter: blur(10px);
      display: none;
      align-items: center;
      justify-content: center;
      z-index: 2000;
    }
    .playlist-modal.active {
      display: flex;
    }
    .modal-content {
      background: #1c1c1c;
      border-radius: 12px;
      padding: 25px;
      max-width: 400px;
      width: 90%;
      border: 1px solid #333;
    }
    .modal-content h3 {
      margin-bottom: 15px;
      color: #fff;
      font-size: 18px;
    }
    .modal-input {
      width: 100%;
      padding: 10px;
      border: 1px solid #333;
      border-radius: 8px;
      background: #333;
      color: #fff;
      font-size: 14px;
      margin-bottom: 15px;
    }
    .modal-input:focus {
      outline: none;
      border-color: #1DB954;
      box-shadow: 0 0 10px rgba(29, 185, 84, 0.3);
    }
    .modal-buttons {
      display: flex;
      gap: 10px;
      justify-content: flex-end;
    }
    .modal-btn {
      padding: 8px 20px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 14px;
      transition: all 0.3s ease;
    }
    .modal-btn.primary {
      background: linear-gradient(45deg, #1DB954, #8a2be2);
      color: #fff;
    }
    .modal-btn.secondary {
      background: #333;
      color: #fff;
    }
    .modal-btn:hover {
      transform: scale(1.05);
    }

    /* Now Playing Styles */
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
      z-index: 1500;
      transform: translateY(100%);
      transition: transform 0.7s cubic-bezier(0.68, -0.55, 0.27, 1.55);
      overflow: hidden;
    }
    .now-playing.active {
      transform: translateY(0);
    }

    /* Mini Player Styles */
    .mini-player {
      position: fixed;
      bottom: 90px;
      left: 0;
      right: 0;
      background: linear-gradient(90deg, #1a1a1a, #2a2a2a);
      border-top: 1px solid rgba(29, 185, 84, 0.4);
      padding: 10px 15px;
      z-index: 1000;
      display: none;
      align-items: center;
      box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.5);
      transition: all 0.3s ease;
    }
    .mini-player.active {
      display: flex;
    }
    .mini-player-img {
      width: 50px;
      height: 50px;
      border-radius: 8px;
      margin-right: 12px;
    }
    .mini-player-info {
      flex: 1;
      overflow: hidden;
    }
    .mini-player-info h4 {
      font-size: 14px;
      font-weight: 600;
      margin: 0 0 3px 0;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      color: #fff;
    }
    .mini-player-info p {
      font-size: 11px;
      color: #b3b3b3;
      margin: 0;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    .mini-player-controls {
      display: flex;
      align-items: center;
      gap: 15px;
    }
    .mini-player-btn {
      background: none;
      border: none;
      color: #fff;
      font-size: 20px;
      cursor: pointer;
      transition: all 0.3s ease;
      padding: 8px;
      border-radius: 50%;
    }
    .mini-player-btn:hover {
      color: #1DB954;
      background: rgba(29, 185, 84, 0.2);
    }
    .mini-player-progress {
      position: absolute;
      bottom: 0;
      left: 0;
      height: 3px;
      background: #1DB954;
      transition: width 0.1s linear;
      width: 0%;
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
    .now-playing-header {
      display: flex;
      justify-content: space-between;
      width: 100%;
      align-items: center;
      position: relative;
      z-index: 10;
    }
    .now-playing-header i {
      font-size: 26px;
      cursor: pointer;
      color: #fff;
      transition: all 0.3s ease;
      padding: 15px;
      background: rgba(0, 0, 0, 0.3);
      border-radius: 50%;
      border: 2px solid rgba(255, 255, 255, 0.2);
    }
    .now-playing-header i:hover {
      color: #1DB954;
      background: rgba(29, 185, 84, 0.2);
      border-color: #1DB954;
      text-shadow: 0 0 15px #1DB954;
      transform: scale(1.1);
    }
    .now-playing-header .close-btn {
      background: rgba(255, 77, 77, 0.2);
      border: 2px solid rgba(255, 77, 77, 0.3);
    }
    .now-playing-header .close-btn:hover {
      color: #ff4d4d;
      background: rgba(255, 77, 77, 0.3);
      border-color: #ff4d4d;
      text-shadow: 0 0 15px #ff4d4d;
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

    /* Enhanced Responsive Design */
    @media (max-width: 1200px) {
      .container {
        max-width: 100%;
        padding: 10px;
      }
      .songs-container {
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 15px;
      }
      .playlists-container {
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
      }
    }

    @media (max-width: 992px) {
      .header {
        flex-direction: column;
        align-items: stretch;
        padding: 15px;
        gap: 15px;
      }
      .header-left {
        justify-content: center;
        margin-bottom: 0;
      }
      .search-bar {
        width: 100%;
        max-width: 400px;
        margin: 0 auto;
      }
      .songs-container {
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 12px;
      }
      .playlists-container {
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 15px;
      }
    }

    @media (max-width: 768px) {
      .header {
        padding: 12px;
        border-radius: 12px;
      }
      .header-left {
        flex-direction: column;
        align-items: center;
        gap: 10px;
      }
      .logo {
        width: 80px;
        height: 80px;
      }
      .logo-text {
        font-size: 10px;
      }
      h1 {
        font-size: 18px;
        text-align: center;
      }
      .search-bar {
        width: 100%;
        max-width: none;
      }
      .search-bar input {
        padding: 12px 40px;
        font-size: 14px;
      }
      .songs-container {
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 10px;
        padding: 8px;
      }
      .song-card {
        padding: 8px;
        width: auto;
      }
      .song-card img {
        width: 55px;
        height: 55px;
      }
      .song-info h3 {
        font-size: 13px;
      }
      .song-info p {
        font-size: 10px;
      }
      .song-meta {
        font-size: 9px;
        flex-wrap: wrap;
        gap: 3px;
      }
      .download-btn, .favorite-btn, .add-to-playlist-btn {
        width: 28px;
        height: 28px;
      }
      .favorite-btn {
        right: 36px;
      }
      .download-btn i, .favorite-btn i, .add-to-playlist-btn i {
        font-size: 11px;
      }
      .playlists-container {
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 12px;
      }
      .playlist-card {
        padding: 15px;
      }
      .playlist-card h4 {
        font-size: 16px;
      }
      .playlist-card p {
        font-size: 12px;
      }
      .create-playlist-btn {
        padding: 12px 25px;
        font-size: 14px;
      }
    }

    @media (max-width: 600px) {
      .container {
        padding: 8px;
      }
      .header {
        padding: 10px;
        border-radius: 10px;
      }
      .header-left {
        gap: 8px;
      }
      .logo {
        width: 70px;
        height: 70px;
      }
      h1 {
        font-size: 16px;
      }
      .search-bar input {
        padding: 10px 35px;
        font-size: 13px;
      }
      .search-bar .search-icon, .search-bar .clear-icon {
        font-size: 14px;
      }
      .songs-container {
        grid-template-columns: 1fr;
        gap: 8px;
      }
      .song-card {
        padding: 10px;
        width: auto;
        max-width: 100%;
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
      .download-btn, .favorite-btn, .add-to-playlist-btn {
        width: 24px;
        height: 24px;
      }
      .favorite-btn {
        right: 32px;
      }
      .download-btn i, .favorite-btn i, .add-to-playlist-btn i {
        font-size: 10px;
      }
      .playlists-container {
        grid-template-columns: 1fr;
        gap: 10px;
      }
      .playlist-card {
        padding: 12px;
      }
      .playlist-card h4 {
        font-size: 14px;
      }
      .create-playlist-btn {
        padding: 10px 20px;
        font-size: 12px;
        width: 100%;
        justify-content: center;
      }
      .now-playing {
        padding: 15px;
      }
      .now-playing-img {
        width: 200px;
        height: 200px;
      }
      .now-playing-info h3 {
        font-size: 20px;
      }
      .now-playing-info p {
        font-size: 14px;
      }
      .progress-container {
        gap: 8px;
        flex-wrap: wrap;
      }
      .progress-bar {
        height: 6px;
        min-width: 200px;
        flex: 1;
      }
      #current-time, #total-duration {
        font-size: 11px;
        min-width: 35px;
      }
      .now-playing-controls {
        gap: 15px;
        flex-wrap: wrap;
        justify-content: center;
      }
      .now-playing-controls button {
        font-size: 18px;
        padding: 8px;
      }
      .now-playing-controls .play-pause-btn {
        font-size: 28px;
        width: 55px;
        height: 55px;
      }
      .now-playing-footer {
        flex-wrap: wrap;
        justify-content: center;
        gap: 15px;
      }
      .now-playing-footer i {
        font-size: 16px;
      }
      #volume {
        width: 100px;
        min-width: 100px;
      }
      .mini-player {
        padding: 8px 12px;
      }
      .mini-player-img {
        width: 40px;
        height: 40px;
      }
      .mini-player-info h4 {
        font-size: 12px;
      }
      .mini-player-info p {
        font-size: 10px;
      }
      .mini-player-controls {
        gap: 10px;
      }
      .mini-player-btn {
        font-size: 16px;
        padding: 6px;
      }
      .bottom-nav {
        padding: 8px 0;
      }
      .nav-item {
        padding: 4px 15px;
      }
      .nav-item i {
        font-size: 18px;
      }
      .nav-item span {
        font-size: 10px;
      }
      .modal-content {
        width: 95%;
        padding: 20px;
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

    @media (max-width: 480px) {
      .header {
        padding: 8px;
      }
      .logo {
        width: 60px;
        height: 60px;
      }
      h1 {
        font-size: 14px;
      }
      .song-card {
        padding: 8px;
      }
      .song-card img {
        width: 45px;
        height: 45px;
      }
      .now-playing {
        padding: 10px;
      }
      .now-playing-img {
        width: 180px;
        height: 180px;
      }
      .now-playing-info h3 {
        font-size: 18px;
      }
      .now-playing-controls .play-pause-btn {
        width: 50px;
        height: 50px;
        font-size: 24px;
      }
      .progress-bar {
        min-width: 150px;
      }
    }

    @media (max-width: 360px) {
      .container {
        padding: 5px;
      }
      .header {
        padding: 6px;
      }
      h1 {
        font-size: 13px;
      }
      .song-card {
        padding: 6px;
      }
      .now-playing-img {
        width: 160px;
        height: 160px;
      }
      .progress-bar {
        min-width: 120px;
      }
    }

    /* Large Desktop Screens */
    @media (min-width: 1400px) {
      .container {
        max-width: 1400px;
      }
      .songs-container {
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 20px;
      }
      .playlists-container {
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 30px;
      }
      .song-card {
        padding: 12px;
      }
      .playlist-card {
        padding: 25px;
      }
    }

    /* Ultra-wide screens */
    @media (min-width: 1920px) {
      .container {
        max-width: 1600px;
      }
      .songs-container {
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 25px;
      }
    }

    /* Touch device optimizations */
    @media (hover: none) and (pointer: coarse) {
      .song-card:hover {
        transform: none;
        background: #1c1c1c;
        box-shadow: none;
      }
      .song-card:active {
        transform: translateY(-2px);
        background: #252525;
        box-shadow: 0 2px 8px rgba(29, 185, 84, 0.3);
      }
      .playlist-card:hover {
        transform: none;
        background: linear-gradient(135deg, #1c1c1c 0%, #2a2a2a 50%, #1e1e1e 100%);
        box-shadow: none;
      }
      .playlist-card:active {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(29, 185, 84, 0.3);
      }
      .download-btn:hover, .favorite-btn:hover, .add-to-playlist-btn:hover {
        transform: none;
        box-shadow: none;
      }
      .download-btn:active, .favorite-btn:active, .add-to-playlist-btn:active {
        transform: scale(0.95);
        box-shadow: 0 0 5px rgba(29, 185, 84, 0.5);
      }
    }

    /* High DPI screens */
    @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
      .logo {
        image-rendering: -webkit-optimize-contrast;
        image-rendering: crisp-edges;
      }
      .song-card img, .now-playing-img, .mini-player-img {
        image-rendering: -webkit-optimize-contrast;
        image-rendering: crisp-edges;
      }
    }

    /* Profile Page Styles - Crazy Attractive Theme */
    .auth-section {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 70vh;
      padding: 20px;
      background: radial-gradient(circle at 50% 50%, rgba(29, 185, 84, 0.1) 0%, rgba(138, 43, 226, 0.1) 25%, rgba(30, 144, 255, 0.1) 50%, transparent 70%);
      position: relative;
      overflow: hidden;
    }
    .auth-section::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: linear-gradient(45deg, transparent, rgba(29, 185, 84, 0.05), transparent, rgba(138, 43, 226, 0.05), transparent);
      animation: auth-bg-rotate 20s linear infinite;
    }
    @keyframes auth-bg-rotate {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
    .auth-container {
      background: linear-gradient(135deg, rgba(26, 26, 26, 0.95) 0%, rgba(42, 42, 42, 0.95) 50%, rgba(30, 30, 30, 0.95) 100%);
      backdrop-filter: blur(20px);
      border-radius: 25px;
      padding: 40px;
      width: 100%;
      max-width: 450px;
      box-shadow: 
        0 20px 60px rgba(0, 0, 0, 0.5),
        0 10px 30px rgba(29, 185, 84, 0.2),
        inset 0 1px 0 rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.1);
      position: relative;
      overflow: hidden;
      animation: auth-container-glow 4s ease-in-out infinite;
    }
    @keyframes auth-container-glow {
      0%, 100% { box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5), 0 10px 30px rgba(29, 185, 84, 0.2), inset 0 1px 0 rgba(255, 255, 255, 0.1); }
      50% { box-shadow: 0 25px 70px rgba(0, 0, 0, 0.6), 0 15px 40px rgba(138, 43, 226, 0.3), inset 0 1px 0 rgba(255, 255, 255, 0.15); }
    }
    .auth-container::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(29, 185, 84, 0.1), transparent);
      animation: auth-shimmer 3s infinite;
    }
    @keyframes auth-shimmer {
      0% { left: -100%; }
      100% { left: 100%; }
    }
    .auth-toggle {
      display: flex;
      background: rgba(0, 0, 0, 0.3);
      border-radius: 15px;
      padding: 5px;
      margin-bottom: 30px;
      position: relative;
      overflow: hidden;
    }
    .auth-toggle::before {
      content: '';
      position: absolute;
      top: 5px;
      left: 5px;
      width: calc(50% - 5px);
      height: calc(100% - 10px);
      background: linear-gradient(45deg, #1DB954, #8a2be2);
      border-radius: 10px;
      transition: transform 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
      z-index: 1;
    }
    .auth-toggle.register::before {
      transform: translateX(100%);
    }
    .auth-toggle-btn {
      flex: 1;
      background: none;
      border: none;
      color: #b3b3b3;
      padding: 12px 20px;
      font-size: 14px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      position: relative;
      z-index: 2;
      border-radius: 10px;
    }
    .auth-toggle-btn.active {
      color: #fff;
      text-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
    }
    .auth-form {
      display: none;
      opacity: 0;
      transform: translateY(20px);
      transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }
    .auth-form.active {
      display: block;
      opacity: 1;
      transform: translateY(0);
    }
    .form-header {
      text-align: center;
      margin-bottom: 30px;
    }
    .form-header h2 {
      font-size: 28px;
      font-weight: 800;
      background: linear-gradient(45deg, #1DB954, #8a2be2, #1e90ff);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 8px;
      animation: title-glow 3s infinite;
    }
    .form-header p {
      color: #b3b3b3;
      font-size: 14px;
      font-weight: 400;
    }
    .form-group {
      position: relative;
      margin-bottom: 20px;
    }
    .form-group i {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #1DB954;
      font-size: 16px;
      z-index: 2;
      transition: all 0.3s ease;
    }
    .form-group input {
      width: 100%;
      padding: 15px 45px;
      background: rgba(0, 0, 0, 0.3);
      border: 2px solid rgba(255, 255, 255, 0.1);
      border-radius: 12px;
      color: #fff;
      font-size: 14px;
      font-weight: 500;
      transition: all 0.3s ease;
      backdrop-filter: blur(10px);
      box-sizing: border-box;
    }
    .form-group input:focus {
      outline: none;
      border-color: #1DB954;
      box-shadow: 0 0 20px rgba(29, 185, 84, 0.3);
      transform: scale(1.02);
    }
    .form-group input:focus + i {
      color: #8a2be2;
      transform: translateY(-50%) scale(1.2);
      text-shadow: 0 0 10px #8a2be2;
    }
    .form-group input::placeholder {
      color: #888;
      font-weight: 400;
    }
    .form-group.error input {
      border-color: #ff4d4d;
      box-shadow: 0 0 20px rgba(255, 77, 77, 0.3);
    }
    .field-error {
      color: #ff4d4d;
      font-size: 12px;
      margin-top: 5px;
      animation: fadeIn 0.3s ease;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-5px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .toggle-password {
      position: absolute !important;
      right: 15px !important;
      left: auto !important;
      cursor: pointer;
      color: #b3b3b3 !important;
      font-size: 14px !important;
    }
    .toggle-password:hover {
      color: #1DB954 !important;
    }
    .form-options {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 25px;
      font-size: 13px;
    }
    .checkbox-container {
      display: flex;
      align-items: center;
      cursor: pointer;
      color: #b3b3b3;
      font-weight: 400;
    }
    .checkbox-container input {
      display: none;
    }
    .checkmark {
      width: 18px;
      height: 18px;
      background: rgba(0, 0, 0, 0.3);
      border: 2px solid rgba(255, 255, 255, 0.2);
      border-radius: 4px;
      margin-right: 8px;
      position: relative;
      transition: all 0.3s ease;
    }
    .checkbox-container input:checked + .checkmark {
      background: linear-gradient(45deg, #1DB954, #8a2be2);
      border-color: #1DB954;
      box-shadow: 0 0 15px rgba(29, 185, 84, 0.5);
    }
    .checkbox-container input:checked + .checkmark::after {
      content: '✓';
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: #fff;
      font-size: 12px;
      font-weight: bold;
    }
    .forgot-password {
      color: #1DB954;
      text-decoration: none;
      font-weight: 500;
      transition: all 0.3s ease;
    }
    .forgot-password:hover {
      color: #8a2be2;
      text-shadow: 0 0 10px rgba(138, 43, 226, 0.5);
    }
    .auth-submit-btn {
      width: 100%;
      padding: 15px;
      background: linear-gradient(135deg, #1DB954, #8a2be2, #1e90ff, #ff6b35);
      background-size: 400% 400%;
      border: none;
      border-radius: 12px;
      color: #fff;
      font-size: 16px;
      font-weight: 700;
      cursor: pointer;
      transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      text-transform: uppercase;
      letter-spacing: 1px;
      position: relative;
      overflow: hidden;
      animation: gradient-shift 4s ease infinite;
      margin-bottom: 25px;
    }
    .auth-submit-btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
      transition: left 0.6s;
    }
    .auth-submit-btn:hover::before {
      left: 100%;
    }
    .auth-submit-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 15px 35px rgba(29, 185, 84, 0.4), 0 8px 25px rgba(138, 43, 226, 0.3);
    }
    .auth-submit-btn i {
      font-size: 18px;
    }
    .social-login {
      text-align: center;
    }
    .divider {
      position: relative;
      margin: 20px 0;
      color: #888;
      font-size: 12px;
    }
    .divider::before {
      content: '';
      position: absolute;
      top: 50%;
      left: 0;
      right: 0;
      height: 1px;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    }
    .divider span {
      background: linear-gradient(135deg, #1a1a1a, #2a2a2a);
      padding: 0 15px;
      position: relative;
      z-index: 1;
    }
    .social-buttons {
      display: flex;
      gap: 15px;
    }
    .social-btn {
      flex: 1;
      padding: 12px;
      border: 2px solid rgba(255, 255, 255, 0.1);
      border-radius: 10px;
      background: rgba(0, 0, 0, 0.3);
      color: #fff;
      font-size: 14px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      backdrop-filter: blur(10px);
    }
    .social-btn.google:hover {
      border-color: #db4437;
      background: rgba(219, 68, 55, 0.2);
      box-shadow: 0 0 20px rgba(219, 68, 55, 0.3);
    }
    .social-btn.spotify:hover {
      border-color: #1DB954;
      background: rgba(29, 185, 84, 0.2);
      box-shadow: 0 0 20px rgba(29, 185, 84, 0.3);
    }

    /* User Profile Section */
    .user-profile-section {
      animation: profileSlideIn 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }
    @keyframes profileSlideIn {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .profile-header {
      display: flex;
      align-items: center;
      gap: 25px;
      padding: 30px;
      background: linear-gradient(135deg, rgba(29, 185, 84, 0.1) 0%, rgba(138, 43, 226, 0.1) 50%, rgba(30, 144, 255, 0.1) 100%);
      border-radius: 20px;
      margin-bottom: 30px;
      position: relative;
      overflow: hidden;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
    }
    .profile-header::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
      animation: profile-shimmer 4s infinite;
    }
    @keyframes profile-shimmer {
      0% { left: -100%; }
      100% { left: 100%; }
    }
    .profile-avatar {
      position: relative;
      cursor: pointer;
    }
    .profile-avatar img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      border: 4px solid #1DB954;
      box-shadow: 0 0 30px rgba(29, 185, 84, 0.5);
      transition: all 0.3s ease;
    }
    .profile-avatar:hover img {
      transform: scale(1.1);
      box-shadow: 0 0 40px rgba(29, 185, 84, 0.8);
    }
    .avatar-overlay {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(0, 0, 0, 0.7);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0;
      transition: all 0.3s ease;
    }
    .profile-avatar:hover .avatar-overlay {
      opacity: 1;
    }
    .avatar-overlay i {
      color: #fff;
      font-size: 24px;
    }
    .profile-info {
      flex: 1;
    }
    .profile-info h2 {
      font-size: 32px;
      font-weight: 800;
      background: linear-gradient(45deg, #1DB954, #8a2be2, #1e90ff);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 5px;
      animation: profile-name-glow 3s infinite;
    }
    .profile-info p {
      color: #b3b3b3;
      font-size: 16px;
      margin-bottom: 15px;
    }
    .profile-stats {
      display: flex;
      gap: 30px;
    }
    .stat {
      text-align: center;
    }
    .stat-number {
      display: block;
      font-size: 24px;
      font-weight: 800;
      color: #1DB954;
      text-shadow: 0 0 10px rgba(29, 185, 84, 0.5);
    }
    .stat-label {
      font-size: 12px;
      color: #888;
      text-transform: uppercase;
      letter-spacing: 1px;
    }
    .edit-profile-btn {
      background: linear-gradient(45deg, #1DB954, #8a2be2);
      border: none;
      border-radius: 12px;
      color: #fff;
      padding: 12px 25px;
      font-size: 14px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .edit-profile-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 25px rgba(29, 185, 84, 0.4);
    }
    .profile-content {
      background: linear-gradient(135deg, rgba(26, 26, 26, 0.8) 0%, rgba(42, 42, 42, 0.8) 100%);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
    }
    .profile-sections {
      display: flex;
      background: rgba(0, 0, 0, 0.3);
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    .profile-section {
      flex: 1;
      padding: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      cursor: pointer;
      transition: all 0.3s ease;
      color: #b3b3b3;
      font-weight: 600;
      position: relative;
    }
    .profile-section::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      height: 3px;
      background: linear-gradient(45deg, #1DB954, #8a2be2);
      transform: scaleX(0);
      transition: transform 0.3s ease;
    }
    .profile-section.active {
      color: #1DB954;
      background: rgba(29, 185, 84, 0.1);
    }
    .profile-section.active::after {
      transform: scaleX(1);
    }
    .profile-section:hover {
      background: rgba(255, 255, 255, 0.05);
    }
    .section-content {
      display: none;
      padding: 30px;
      animation: sectionFadeIn 0.5s ease;
    }
    .section-content.active {
      display: block;
    }
    @keyframes sectionFadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .section-content h3 {
      font-size: 24px;
      font-weight: 700;
      color: #fff;
      margin-bottom: 20px;
      background: linear-gradient(45deg, #1DB954, #8a2be2);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    .activity-list {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }
    .activity-item {
      display: flex;
      align-items: center;
      gap: 15px;
      padding: 15px;
      background: rgba(0, 0, 0, 0.3);
      border-radius: 12px;
      transition: all 0.3s ease;
    }
    .activity-item:hover {
      background: rgba(29, 185, 84, 0.1);
      transform: translateX(5px);
    }
    .activity-item i {
      color: #1DB954;
      font-size: 18px;
    }
    .activity-info {
      display: flex;
      flex-direction: column;
    }
    .activity-title {
      color: #fff;
      font-weight: 600;
    }
    .activity-time {
      color: #888;
      font-size: 12px;
    }
    .settings-list {
      display: flex;
      flex-direction: column;
      gap: 20px;
      margin-bottom: 30px;
    }
    .setting-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 20px;
      background: rgba(0, 0, 0, 0.3);
      border-radius: 12px;
      transition: all 0.3s ease;
    }
    .setting-item:hover {
      background: rgba(255, 255, 255, 0.05);
    }
    .setting-info {
      display: flex;
      flex-direction: column;
    }
    .setting-title {
      color: #fff;
      font-weight: 600;
      font-size: 16px;
    }
    .setting-desc {
      color: #888;
      font-size: 12px;
    }
    .switch {
      position: relative;
      display: inline-block;
      width: 50px;
      height: 24px;
    }
    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }
    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(255, 255, 255, 0.2);
      transition: .4s;
      border-radius: 24px;
    }
    .slider:before {
      position: absolute;
      content: "";
      height: 18px;
      width: 18px;
      left: 3px;
      bottom: 3px;
      background-color: white;
      transition: .4s;
      border-radius: 50%;
    }
    input:checked + .slider {
      background: linear-gradient(45deg, #1DB954, #8a2be2);
    }
    input:checked + .slider:before {
      transform: translateX(26px);
    }
    .logout-btn {
      background: linear-gradient(45deg, #ff4d4d, #ff6b35);
      border: none;
      border-radius: 12px;
      color: #fff;
      padding: 15px 30px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .logout-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 25px rgba(255, 77, 77, 0.4);
    }
    .premium-card {
      background: linear-gradient(135deg, rgba(255, 215, 0, 0.1) 0%, rgba(255, 140, 0, 0.1) 100%);
      border: 2px solid rgba(255, 215, 0, 0.3);
      border-radius: 20px;
      padding: 30px;
      text-align: center;
      position: relative;
      overflow: hidden;
    }
    .premium-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 215, 0, 0.1), transparent);
      animation: premium-shimmer 3s infinite;
    }
    @keyframes premium-shimmer {
      0% { left: -100%; }
      100% { left: 100%; }
    }
    .premium-header {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 15px;
      margin-bottom: 25px;
    }
    .premium-header i {
      color: #ffd700;
      font-size: 32px;
      animation: crown-pulse 2s infinite;
    }
    @keyframes crown-pulse {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.1); }
    }
    .premium-header h4 {
      font-size: 28px;
      font-weight: 800;
      background: linear-gradient(45deg, #ffd700, #ff8c00);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    .premium-features {
      display: flex;
      flex-direction: column;
      gap: 15px;
      margin-bottom: 30px;
    }
    .feature {
      display: flex;
      align-items: center;
      gap: 15px;
      padding: 12px 0;
    }
    .feature i {
      color: #1DB954;
      font-size: 18px;
    }
    .feature span {
      color: #fff;
      font-weight: 500;
    }
    .premium-btn {
      background: linear-gradient(135deg, #ffd700, #ff8c00, #ff6b35);
      background-size: 200%;
      border: none;
      border-radius: 15px;
      color: #000;
      padding: 15px 30px;
      font-size: 16px;
      font-weight: 800;
      cursor: pointer;
      transition: all 0.4s ease;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      text-transform: uppercase;
      letter-spacing: 1px;
      animation: premium-btn-glow 3s infinite;
      position: relative;
      z-index: 1;
    }
    @keyframes premium-btn-glow {
      0%, 100% { background-position: 0%; }
      50% { background-position: 100%; }
    }
    .premium-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 15px 35px rgba(255, 215, 0, 0.4);
    }

    /* Responsive Design for Profile */
    @media (max-width: 768px) {
      .auth-container {
        margin: 10px;
        padding: 30px 20px;
      }
      .profile-header {
        flex-direction: column;
        text-align: center;
        gap: 20px;
      }
      .profile-stats {
        justify-content: center;
        gap: 20px;
      }
      .profile-sections {
        flex-direction: column;
      }
      .profile-section {
        padding: 15px;
      }
      .form-group {
        margin-bottom: 15px;
      }
      .form-group input {
        padding: 12px 40px;
      }
      .social-buttons {
        flex-direction: column;
        gap: 10px;
      }
    }

    @media (max-width: 480px) {
      .auth-section {
        padding: 10px;
      }
      .auth-container {
        padding: 25px 15px;
      }
      .form-header h2 {
        font-size: 24px;
      }
      .profile-avatar img {
        width: 100px;
        height: 100px;
      }
      .profile-info h2 {
        font-size: 24px;
      }
      .premium-card {
        padding: 20px;
      }
      .premium-header h4 {
        font-size: 22px;
      }
    }
  </style>
</head>
<body>
  <div class="app-container">
    <div class="main-content">
      <!-- Home Page -->
      <div id="home-page" class="page-section active">
        <div class="container">
          <div class="header">
            <div class="header-left">
              <div class="logo-container">
                <img class="logo" src="Q.png" alt="QuickMusic">
                <div class="logo-text">QuickMusic</div>
              </div>
              <h1>QuickMusic - Premium Music Experience</h1>
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
      </div>

      <!-- Library Page -->
      <div id="library-page" class="page-section">
        <div class="container">
          <div class="header">
            <div class="header-left">
              <div class="logo-container">
                <img class="logo" src="Q.png" alt="QuickMusic">
                <div class="logo-text">QuickMusic</div>
              </div>
              <h1>Your Library</h1>
            </div>
          </div>

          <!-- Playlists List View -->
          <div id="playlists-list-view">
            <div class="section-title">My Playlists</div>
            <div class="playlist-controls">
              <button class="create-playlist-btn" onclick="createNewPlaylist()">
                <i class="fas fa-plus"></i> Create New Playlist
              </button>
            </div>
            <div class="playlists-container" id="playlists-container"></div>
          </div>

          <!-- Individual Playlist View -->
          <div id="playlist-view" class="playlist-view">
            <div class="playlist-header">
              <button class="back-btn" onclick="showPlaylistsList()">
                <i class="fas fa-arrow-left"></i> Back to Playlists
              </button>
              <h3 id="current-playlist-title"></h3>
            </div>
            <div class="songs-container" id="playlist-songs-container"></div>
          </div>
        </div>
      </div>

      <!-- Profile Page -->
      <div id="profile-page" class="page-section">
        <div class="container">
          <div class="header">
            <div class="header-left">
              <div class="logo-container">
                <img class="logo" src="Q.png" alt="QuickMusic">
                <div class="logo-text">QuickMusic</div>
              </div>
              <h1>Your Profile</h1>
            </div>
          </div>

          <!-- Login/Register Forms -->
          <div id="auth-section" class="auth-section">
            <div class="auth-container">
              <div class="auth-toggle">
                <button class="auth-toggle-btn active" onclick="showLoginForm()">Login</button>
                <button class="auth-toggle-btn" onclick="showRegisterForm()">Register</button>
              </div>

              <!-- Login Form -->
              <div id="login-form" class="auth-form active">
                <div class="form-header">
                  <h2>Welcome Back!</h2>
                  <p>Sign in to access your music collection</p>
                </div>
                <form onsubmit="loginUser(event)">
                  <div class="form-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" id="login-email" placeholder="Email Address" required>
                  </div>
                  <div class="form-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="login-password" placeholder="Password" required>
                    <i class="fas fa-eye toggle-password" onclick="togglePassword('login-password', this)"></i>
                  </div>
                  <div class="form-options">
                    <label class="checkbox-container">
                      <input type="checkbox" id="remember-me">
                      <span class="checkmark"></span>
                      Remember me
                    </label>
                    <a href="#" class="forgot-password">Forgot Password?</a>
                  </div>
                  <button type="submit" class="auth-submit-btn">
                    <i class="fas fa-sign-in-alt"></i>
                    Sign In
                  </button>
                </form>
                <div class="social-login">
                  <div class="divider">
                    <span>Or continue with</span>
                  </div>
                  <div class="social-buttons">
                    <button class="social-btn google" onclick="socialLogin('google')">
                      <i class="fab fa-google"></i>
                      Google
                    </button>
                    <button class="social-btn spotify" onclick="socialLogin('spotify')">
                      <i class="fab fa-spotify"></i>
                      Spotify
                    </button>
                  </div>
                </div>
              </div>

              <!-- Register Form -->
              <div id="register-form" class="auth-form">
                <div class="form-header">
                  <h2>Create Account</h2>
                  <p>Join QuickMusic and discover amazing music</p>
                </div>
                <form onsubmit="registerUser(event)">
                  <div class="form-group">
                    <i class="fas fa-user"></i>
                    <input type="text" id="register-name" placeholder="Full Name" required>
                  </div>
                  <div class="form-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" id="register-email" placeholder="Email Address" required>
                  </div>
                  <div class="form-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="register-password" placeholder="Password" required>
                    <i class="fas fa-eye toggle-password" onclick="togglePassword('register-password', this)"></i>
                  </div>
                  <div class="form-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="confirm-password" placeholder="Confirm Password" required>
                    <i class="fas fa-eye toggle-password" onclick="togglePassword('confirm-password', this)"></i>
                  </div>
                  <div class="form-options">
                    <label class="checkbox-container">
                      <input type="checkbox" id="agree-terms" required>
                      <span class="checkmark"></span>
                      I agree to the <a href="#">Terms & Conditions</a>
                    </label>
                  </div>
                  <button type="submit" class="auth-submit-btn">
                    <i class="fas fa-user-plus"></i>
                    Create Account
                  </button>
                </form>
                <div class="social-login">
                  <div class="divider">
                    <span>Or continue with</span>
                  </div>
                  <div class="social-buttons">
                    <button class="social-btn google" onclick="socialLogin('google')">
                      <i class="fab fa-google"></i>
                      Google
                    </button>
                    <button class="social-btn spotify" onclick="socialLogin('spotify')">
                      <i class="fab fa-spotify"></i>
                      Spotify
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- User Profile (shown after login) -->
          <div id="user-profile-section" class="user-profile-section" style="display: none;">
            <div class="profile-header">
              <div class="profile-avatar">
                <img id="user-avatar" src="https://via.placeholder.com/150" alt="User Avatar">
                <div class="avatar-overlay">
                  <i class="fas fa-camera"></i>
                </div>
              </div>
              <div class="profile-info">
                <h2 id="user-display-name">John Doe</h2>
                <p id="user-email">john.doe@example.com</p>
                <div class="profile-stats">
                  <div class="stat">
                    <span class="stat-number" id="total-playlists">0</span>
                    <span class="stat-label">Playlists</span>
                  </div>
                  <div class="stat">
                    <span class="stat-number" id="total-favorites">0</span>
                    <span class="stat-label">Favorites</span>
                  </div>
                  <div class="stat">
                    <span class="stat-number" id="total-listening">0</span>
                    <span class="stat-label">Hours</span>
                  </div>
                </div>
              </div>
              <button class="edit-profile-btn" onclick="editProfile()">
                <i class="fas fa-edit"></i>
                Edit Profile
              </button>
            </div>

            <div class="profile-content">
              <div class="profile-sections">
                <div class="profile-section active" onclick="showProfileSection('recent')">
                  <i class="fas fa-clock"></i>
                  <span>Recent Activity</span>
                </div>
                <div class="profile-section" onclick="showProfileSection('settings')">
                  <i class="fas fa-cog"></i>
                  <span>Settings</span>
                </div>
                <div class="profile-section" onclick="showProfileSection('premium')">
                  <i class="fas fa-crown"></i>
                  <span>Premium</span>
                </div>
              </div>

              <div class="profile-section-content">
                <!-- Recent Activity -->
                <div id="recent-section" class="section-content active">
                  <h3>Recent Activity</h3>
                  <div class="activity-list" id="activity-list">
                    <div class="activity-item">
                      <i class="fas fa-play"></i>
                      <div class="activity-info">
                        <span class="activity-title">Played "Song Name"</span>
                        <span class="activity-time">2 hours ago</span>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Settings -->
                <div id="settings-section" class="section-content">
                  <h3>Settings</h3>
                  <div class="settings-list">
                    <div class="setting-item">
                      <div class="setting-info">
                        <span class="setting-title">Dark Mode</span>
                        <span class="setting-desc">Toggle dark theme</span>
                      </div>
                      <label class="switch">
                        <input type="checkbox" id="dark-mode-toggle" checked>
                        <span class="slider"></span>
                      </label>
                    </div>
                    <div class="setting-item">
                      <div class="setting-info">
                        <span class="setting-title">Auto-play</span>
                        <span class="setting-desc">Automatically play next song</span>
                      </div>
                      <label class="switch">
                        <input type="checkbox" id="autoplay-toggle" checked>
                        <span class="slider"></span>
                      </label>
                    </div>
                    <div class="setting-item">
                      <div class="setting-info">
                        <span class="setting-title">High Quality Audio</span>
                        <span class="setting-desc">Stream in high quality</span>
                      </div>
                      <label class="switch">
                        <input type="checkbox" id="hq-audio-toggle">
                        <span class="slider"></span>
                      </label>
                    </div>
                  </div>
                  <button class="logout-btn" onclick="logoutUser()">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                  </button>
                </div>

                <!-- Premium -->
                <div id="premium-section" class="section-content">
                  <h3>Premium Features</h3>
                  <div class="premium-card">
                    <div class="premium-header">
                      <i class="fas fa-crown"></i>
                      <h4>QuickMusic Premium</h4>
                    </div>
                    <div class="premium-features">
                      <div class="feature">
                        <i class="fas fa-check"></i>
                        <span>Ad-free listening</span>
                      </div>
                      <div class="feature">
                        <i class="fas fa-check"></i>
                        <span>Unlimited downloads</span>
                      </div>
                      <div class="feature">
                        <i class="fas fa-check"></i>
                        <span>High quality audio</span>
                      </div>
                      <div class="feature">
                        <i class="fas fa-check"></i>
                        <span>Exclusive content</span>
                      </div>
                    </div>
                    <button class="premium-btn">
                      <i class="fas fa-crown"></i>
                      Upgrade to Premium
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bottom Navigation -->
    <div class="bottom-nav">
      <div class="nav-item active" onclick="switchPage('home')">
        <i class="fas fa-home"></i>
        <span>Home</span>
      </div>
      <div class="nav-item" onclick="switchPage('library')">
        <i class="fas fa-list-ul"></i>
        <span>Library</span>
      </div>
      <div class="nav-item" onclick="switchPage('profile')">
        <i class="fas fa-user"></i>
        <span>Profile</span>
      </div>
    </div>
  </div>

  <!-- Mini Player -->
  <div class="mini-player" id="mini-player">
    <img class="mini-player-img" id="mini-player-img" src="" alt="Now Playing">
    <div class="mini-player-info">
      <h4 id="mini-player-title"></h4>
      <p id="mini-player-artist"></p>
    </div>
    <div class="mini-player-controls">
      <button class="mini-player-btn" onclick="previousSong()">
        <i class="fas fa-backward"></i>
      </button>
      <button class="mini-player-btn" onclick="togglePlayPause()" id="mini-play-pause-btn">
        <i class="fas fa-play"></i>
      </button>
      <button class="mini-player-btn" onclick="nextSong()">
        <i class="fas fa-forward"></i>
      </button>
      <button class="mini-player-btn" onclick="expandNowPlaying()">
        <i class="fas fa-chevron-up"></i>
      </button>
    </div>
    <div class="mini-player-progress" id="mini-player-progress"></div>
  </div>

  <!-- Now Playing -->
  <div class="now-playing" id="now-playing">
    <div class="now-playing-bg" id="now-playing-bg"></div>
    <div class="now-playing-header">
      <i class="fas fa-chevron-down" onclick="minimizeNowPlaying()"></i>
      <i class="fas fa-times close-btn" onclick="stopAndClosePlayer()"></i>
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

  <div class="download-message" id="downloadMessage"></div>

  <!-- Playlist Creation Modal -->
  <div class="playlist-modal" id="playlistModal">
    <div class="modal-content">
      <h3>Create New Playlist</h3>
      <input type="text" id="playlistNameInput" class="modal-input" placeholder="Enter playlist name" maxlength="50">
      <div class="modal-buttons">
        <button class="modal-btn secondary" onclick="closePlaylistModal()">Cancel</button>
        <button class="modal-btn primary" onclick="saveNewPlaylist()">Create</button>
      </div>
    </div>
  </div>

  <!-- Add to Playlist Modal -->
  <div class="playlist-modal" id="addToPlaylistModal">
    <div class="modal-content">
      <h3>Add to Playlist</h3>
      <div id="playlistsList"></div>
      <div class="modal-buttons">
        <button class="modal-btn secondary" onclick="closeAddToPlaylistModal()">Cancel</button>
      </div>
    </div>
  </div>

  <footer>Made with 🎵 by QuickScript</footer>
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
    let playlists = JSON.parse(localStorage.getItem('playlists')) || [];
    let currentPlaylist = null;
    let currentSongForPlaylist = null;
    let currentPage = 'home';
    const API_KEY = 'YOUR_YOUTUBE_API_KEY'; // Replace with your YouTube API key

    // Advanced User Database Simulation
    let userDatabase = JSON.parse(localStorage.getItem('userDatabase')) || {};
    let sessionData = JSON.parse(localStorage.getItem('sessionData')) || {};
    let loginAttempts = JSON.parse(localStorage.getItem('loginAttempts')) || {};
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
    let isShuffle = false;
    let repeatMode = 0; // 0: no repeat, 1: repeat all, 2: repeat one
    let isPlaying = false;
    let currentView = 'trending'; // Track current view: 'trending' or 'favorites'

    // Page Navigation
    function switchPage(page) {
      // Update nav items
      document.querySelectorAll('.nav-item').forEach(item => item.classList.remove('active'));
      event.currentTarget.classList.add('active');

      // Update page sections
      document.querySelectorAll('.page-section').forEach(section => section.classList.remove('active'));
      document.getElementById(page + '-page').classList.add('active');

      currentPage = page;

      if (page === 'library') {
        displayPlaylists();
        showPlaylistsList();
      } else if (page === 'profile') {
        checkUserLoginStatus();
      }
    }

    // Advanced Authentication System
    let currentUser = JSON.parse(localStorage.getItem('currentUser')) || null;
    let currentSession = null;

    // Password strength checker
    function checkPasswordStrength(password) {
      const minLength = password.length >= 8;
      const hasUpper = /[A-Z]/.test(password);
      const hasLower = /[a-z]/.test(password);
      const hasNumber = /\d/.test(password);
      const hasSpecial = /[!@#$%^&*(),.?":{}|<>]/.test(password);
      
      const strength = [minLength, hasUpper, hasLower, hasNumber, hasSpecial].filter(Boolean).length;
      return { strength, minLength, hasUpper, hasLower, hasNumber, hasSpecial };
    }

    // Email validation
    function validateEmail(email) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
    }

    // Generate session token
    function generateSessionToken() {
      return 'sess_' + Date.now() + '_' + Math.random().toString(36).substr(2, 9);
    }

    // Hash password simulation (in real app, use proper bcrypt)
    function hashPassword(password) {
      let hash = 0;
      for (let i = 0; i < password.length; i++) {
        const char = password.charCodeAt(i);
        hash = ((hash << 5) - hash) + char;
        hash = hash & hash;
      }
      return 'hash_' + Math.abs(hash).toString(36);
    }

    // Rate limiting for login attempts
    function checkRateLimit(email) {
      const now = Date.now();
      const attempts = loginAttempts[email] || { count: 0, lastAttempt: 0 };
      
      // Reset if last attempt was more than 15 minutes ago
      if (now - attempts.lastAttempt > 15 * 60 * 1000) {
        attempts.count = 0;
      }
      
      return attempts.count < 5;
    }

    // Record login attempt
    function recordLoginAttempt(email, success) {
      const now = Date.now();
      if (!loginAttempts[email]) {
        loginAttempts[email] = { count: 0, lastAttempt: 0 };
      }
      
      if (success) {
        delete loginAttempts[email];
      } else {
        loginAttempts[email].count++;
        loginAttempts[email].lastAttempt = now;
      }
      
      localStorage.setItem('loginAttempts', JSON.stringify(loginAttempts));
    }

    // Create user session
    function createUserSession(user) {
      const sessionToken = generateSessionToken();
      const sessionData = {
        token: sessionToken,
        userId: user.id,
        createdAt: Date.now(),
        lastActivity: Date.now(),
        userAgent: navigator.userAgent,
        ipAddress: 'simulated_ip'
      };
      
      localStorage.setItem('currentSession', JSON.stringify(sessionData));
      localStorage.setItem('sessionData', JSON.stringify({
        ...JSON.parse(localStorage.getItem('sessionData') || '{}'),
        [sessionToken]: sessionData
      }));
      
      return sessionData;
    }

    // Validate session
    function validateSession() {
      const session = JSON.parse(localStorage.getItem('currentSession'));
      if (!session) return false;
      
      const now = Date.now();
      const sessionAge = now - session.createdAt;
      const inactivityTime = now - session.lastActivity;
      
      // Session expires after 7 days or 2 hours of inactivity
      if (sessionAge > 7 * 24 * 60 * 60 * 1000 || inactivityTime > 2 * 60 * 60 * 1000) {
        logoutUser();
        return false;
      }
      
      // Update last activity
      session.lastActivity = now;
      localStorage.setItem('currentSession', JSON.stringify(session));
      return true;
    }

    function checkUserLoginStatus() {
      if (currentUser && validateSession()) {
        document.getElementById('auth-section').style.display = 'none';
        document.getElementById('user-profile-section').style.display = 'block';
        updateUserProfile();
        updateActivityLog('Page visited', 'Accessed profile page');
      } else {
        document.getElementById('auth-section').style.display = 'flex';
        document.getElementById('user-profile-section').style.display = 'none';
      }
    }

    function showLoginForm() {
      document.getElementById('login-form').classList.add('active');
      document.getElementById('register-form').classList.remove('active');
      document.querySelectorAll('.auth-toggle-btn').forEach(btn => btn.classList.remove('active'));
      document.querySelector('.auth-toggle-btn:first-child').classList.add('active');
      document.querySelector('.auth-toggle').classList.remove('register');
      
      // Clear any previous error messages
      clearAuthErrors();
    }

    function showRegisterForm() {
      document.getElementById('register-form').classList.add('active');
      document.getElementById('login-form').classList.remove('active');
      document.querySelectorAll('.auth-toggle-btn').forEach(btn => btn.classList.remove('active'));
      document.querySelector('.auth-toggle-btn:last-child').classList.add('active');
      document.querySelector('.auth-toggle').classList.add('register');
      
      // Clear any previous error messages
      clearAuthErrors();
    }

    function clearAuthErrors() {
      document.querySelectorAll('.field-error').forEach(el => el.remove());
      document.querySelectorAll('.form-group').forEach(group => {
        group.classList.remove('error');
      });
    }

    function showFieldError(fieldId, message) {
      const field = document.getElementById(fieldId);
      const group = field.closest('.form-group');
      group.classList.add('error');
      
      // Remove existing error
      const existingError = group.querySelector('.field-error');
      if (existingError) existingError.remove();
      
      // Add new error
      const error = document.createElement('div');
      error.className = 'field-error';
      error.style.cssText = 'color: #ff4d4d; font-size: 12px; margin-top: 5px;';
      error.textContent = message;
      group.appendChild(error);
    }

    function togglePassword(inputId, icon) {
      const input = document.getElementById(inputId);
      if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
      } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
      }
    }

    function loginUser(event) {
      event.preventDefault();
      clearAuthErrors();
      
      const email = document.getElementById('login-email').value.trim();
      const password = document.getElementById('login-password').value;
      const rememberMe = document.getElementById('remember-me').checked;

      // Validation
      let hasErrors = false;

      if (!email) {
        showFieldError('login-email', 'Email is required');
        hasErrors = true;
      } else if (!validateEmail(email)) {
        showFieldError('login-email', 'Please enter a valid email address');
        hasErrors = true;
      }

      if (!password) {
        showFieldError('login-password', 'Password is required');
        hasErrors = true;
      }

      if (hasErrors) return;

      // Check rate limiting
      if (!checkRateLimit(email)) {
        showDownloadMessage('Too many login attempts. Please try again in 15 minutes.', true);
        return;
      }

      // Check if user exists
      const user = userDatabase[email];
      if (!user) {
        recordLoginAttempt(email, false);
        showFieldError('login-email', 'No account found with this email');
        return;
      }

      // Verify password
      const hashedPassword = hashPassword(password);
      if (user.passwordHash !== hashedPassword) {
        recordLoginAttempt(email, false);
        showFieldError('login-password', 'Incorrect password');
        return;
      }

      // Successful login
      recordLoginAttempt(email, true);
      user.lastLogin = new Date().toISOString();
      user.loginCount = (user.loginCount || 0) + 1;
      
      currentUser = user;
      localStorage.setItem('currentUser', JSON.stringify(user));
      localStorage.setItem('userDatabase', JSON.stringify(userDatabase));
      
      createUserSession(user);
      
      if (rememberMe) {
        localStorage.setItem('rememberUser', 'true');
      }

      showDownloadMessage(`Welcome back, ${user.name}!`);
      updateActivityLog('Login', 'Successfully logged in');
      checkUserLoginStatus();
    }

    function registerUser(event) {
      event.preventDefault();
      clearAuthErrors();
      
      const name = document.getElementById('register-name').value.trim();
      const email = document.getElementById('register-email').value.trim();
      const password = document.getElementById('register-password').value;
      const confirmPassword = document.getElementById('confirm-password').value;
      const agreeTerms = document.getElementById('agree-terms').checked;

      // Validation
      let hasErrors = false;

      if (!name) {
        showFieldError('register-name', 'Full name is required');
        hasErrors = true;
      } else if (name.length < 2) {
        showFieldError('register-name', 'Name must be at least 2 characters');
        hasErrors = true;
      }

      if (!email) {
        showFieldError('register-email', 'Email is required');
        hasErrors = true;
      } else if (!validateEmail(email)) {
        showFieldError('register-email', 'Please enter a valid email address');
        hasErrors = true;
      } else if (userDatabase[email]) {
        showFieldError('register-email', 'An account with this email already exists');
        hasErrors = true;
      }

      if (!password) {
        showFieldError('register-password', 'Password is required');
        hasErrors = true;
      } else {
        const passwordCheck = checkPasswordStrength(password);
        if (passwordCheck.strength < 3) {
          showFieldError('register-password', 'Password must be stronger (8+ chars, uppercase, lowercase, number)');
          hasErrors = true;
        }
      }

      if (!confirmPassword) {
        showFieldError('confirm-password', 'Please confirm your password');
        hasErrors = true;
      } else if (password !== confirmPassword) {
        showFieldError('confirm-password', 'Passwords do not match');
        hasErrors = true;
      }

      if (!agreeTerms) {
        showDownloadMessage('Please agree to the Terms & Conditions', true);
        hasErrors = true;
      }

      if (hasErrors) return;

      // Create new user
      const userData = {
        id: 'user_' + Date.now(),
        name: name,
        email: email,
        passwordHash: hashPassword(password),
        avatar: `https://ui-avatars.com/api/?name=${encodeURIComponent(name)}&background=1DB954&color=fff&size=150`,
        joinDate: new Date().toISOString(),
        lastLogin: new Date().toISOString(),
        loginCount: 1,
        isVerified: false,
        settings: {
          darkMode: true,
          autoplay: true,
          highQuality: false,
          notifications: true
        }
      };

      // Save to database
      userDatabase[email] = userData;
      localStorage.setItem('userDatabase', JSON.stringify(userDatabase));

      currentUser = userData;
      localStorage.setItem('currentUser', JSON.stringify(userData));
      
      createUserSession(userData);

      showDownloadMessage(`Welcome to QuickMusic, ${userData.name}!`);
      updateActivityLog('Registration', 'Account created successfully');
      checkUserLoginStatus();
    }

    async function socialLogin(provider) {
      // Simulate OAuth flow with realistic delay
      showDownloadMessage(`Connecting to ${provider.charAt(0).toUpperCase() + provider.slice(1)}...`);
      
      await new Promise(resolve => setTimeout(resolve, 1500));
      
      const providerEmails = {
        google: '@gmail.com',
        spotify: '@spotify.user'
      };
      
      const email = `user${Date.now()}${providerEmails[provider]}`;
      const userData = {
        id: 'user_' + Date.now(),
        name: `${provider.charAt(0).toUpperCase() + provider.slice(1)} User`,
        email: email,
        avatar: `https://ui-avatars.com/api/?name=${provider}&background=1DB954&color=fff&size=150`,
        joinDate: new Date().toISOString(),
        lastLogin: new Date().toISOString(),
        loginCount: 1,
        provider: provider,
        isVerified: true,
        settings: {
          darkMode: true,
          autoplay: true,
          highQuality: provider === 'spotify',
          notifications: true
        }
      };

      userDatabase[email] = userData;
      localStorage.setItem('userDatabase', JSON.stringify(userDatabase));

      currentUser = userData;
      localStorage.setItem('currentUser', JSON.stringify(userData));
      
      createUserSession(userData);

      showDownloadMessage(`Successfully logged in with ${provider.charAt(0).toUpperCase() + provider.slice(1)}!`);
      updateActivityLog('Social Login', `Logged in via ${provider}`);
      checkUserLoginStatus();
    }

    // Activity logging
    function updateActivityLog(action, details) {
      if (!currentUser) return;
      
      const activities = JSON.parse(localStorage.getItem(`activities_${currentUser.id}`)) || [];
      activities.unshift({
        id: Date.now(),
        action: action,
        details: details,
        timestamp: new Date().toISOString(),
        sessionId: currentSession?.token || 'unknown'
      });
      
      // Keep only last 50 activities
      if (activities.length > 50) {
        activities.splice(50);
      }
      
      localStorage.setItem(`activities_${currentUser.id}`, JSON.stringify(activities));
      displayRecentActivity();
    }

    function displayRecentActivity() {
      if (!currentUser) return;
      
      const activities = JSON.parse(localStorage.getItem(`activities_${currentUser.id}`)) || [];
      const activityList = document.getElementById('activity-list');
      
      if (activities.length === 0) {
        activityList.innerHTML = '<p style="color: #b3b3b3;">No recent activity</p>';
        return;
      }
      
      activityList.innerHTML = activities.slice(0, 10).map(activity => {
        const timeAgo = getTimeAgo(new Date(activity.timestamp));
        const iconMap = {
          'Login': 'fas fa-sign-in-alt',
          'Logout': 'fas fa-sign-out-alt',
          'Registration': 'fas fa-user-plus',
          'Social Login': 'fab fa-google',
          'Song Played': 'fas fa-play',
          'Song Downloaded': 'fas fa-download',
          'Favorite Added': 'fas fa-heart',
          'Playlist Created': 'fas fa-list-ul',
          'Page visited': 'fas fa-eye'
        };
        
        return `
          <div class="activity-item">
            <i class="${iconMap[activity.action] || 'fas fa-circle'}"></i>
            <div class="activity-info">
              <span class="activity-title">${activity.details}</span>
              <span class="activity-time">${timeAgo}</span>
            </div>
          </div>
        `;
      }).join('');
    }

    function getTimeAgo(date) {
      const now = new Date();
      const diffMs = now - date;
      const diffSecs = Math.floor(diffMs / 1000);
      const diffMins = Math.floor(diffSecs / 60);
      const diffHours = Math.floor(diffMins / 60);
      const diffDays = Math.floor(diffHours / 24);
      
      if (diffSecs < 60) return 'Just now';
      if (diffMins < 60) return `${diffMins} minute${diffMins > 1 ? 's' : ''} ago`;
      if (diffHours < 24) return `${diffHours} hour${diffHours > 1 ? 's' : ''} ago`;
      return `${diffDays} day${diffDays > 1 ? 's' : ''} ago`;
    }

    function updateUserProfile() {
      if (!currentUser) return;

      document.getElementById('user-avatar').src = currentUser.avatar;
      document.getElementById('user-display-name').textContent = currentUser.name;
      document.getElementById('user-email').textContent = currentUser.email;
      
      // Update stats with real data
      const userPlaylists = playlists.filter(p => p.createdBy === currentUser.id);
      const userFavorites = favorites.filter(f => f.userId === currentUser.id);
      
      document.getElementById('total-playlists').textContent = userPlaylists.length;
      document.getElementById('total-favorites').textContent = userFavorites.length;
      
      // Calculate listening time from activity
      const activities = JSON.parse(localStorage.getItem(`activities_${currentUser.id}`)) || [];
      const playActivities = activities.filter(a => a.action === 'Song Played').length;
      const estimatedHours = Math.floor(playActivities * 3.5 / 60); // Assuming 3.5 min average song
      
      document.getElementById('total-listening').textContent = estimatedHours;
      
      // Load user settings
      if (currentUser.settings) {
        document.getElementById('dark-mode-toggle').checked = currentUser.settings.darkMode;
        document.getElementById('autoplay-toggle').checked = currentUser.settings.autoplay;
        document.getElementById('hq-audio-toggle').checked = currentUser.settings.highQuality;
      }
      
      displayRecentActivity();
    }

    function showProfileSection(section) {
      // Update active section
      document.querySelectorAll('.profile-section').forEach(s => s.classList.remove('active'));
      document.querySelector(`[onclick="showProfileSection('${section}')"]`).classList.add('active');

      // Show section content
      document.querySelectorAll('.section-content').forEach(s => s.classList.remove('active'));
      document.getElementById(`${section}-section`).classList.add('active');
    }

    function editProfile() {
      // Create a more sophisticated profile editor
      const modal = document.createElement('div');
      modal.className = 'playlist-modal active';
      modal.innerHTML = `
        <div class="modal-content" style="max-width: 500px;">
          <h3>Edit Profile</h3>
          <div class="form-group">
            <label style="color: #fff; margin-bottom: 5px; display: block;">Full Name</label>
            <input type="text" id="edit-name" class="modal-input" value="${currentUser.name}" maxlength="50">
          </div>
          <div class="form-group">
            <label style="color: #fff; margin-bottom: 5px; display: block;">Avatar URL (optional)</label>
            <input type="url" id="edit-avatar" class="modal-input" value="${currentUser.avatar}" placeholder="https://example.com/avatar.jpg">
          </div>
          <div class="modal-buttons">
            <button class="modal-btn secondary" onclick="this.closest('.playlist-modal').remove()">Cancel</button>
            <button class="modal-btn primary" onclick="saveProfileChanges()">Save Changes</button>
          </div>
        </div>
      `;
      document.body.appendChild(modal);
    }

    function saveProfileChanges() {
      const newName = document.getElementById('edit-name').value.trim();
      const newAvatar = document.getElementById('edit-avatar').value.trim();
      
      if (!newName) {
        showDownloadMessage('Name cannot be empty', true);
        return;
      }
      
      if (newName.length < 2) {
        showDownloadMessage('Name must be at least 2 characters', true);
        return;
      }
      
      // Update user data
      currentUser.name = newName;
      if (newAvatar) {
        currentUser.avatar = newAvatar;
      } else {
        currentUser.avatar = `https://ui-avatars.com/api/?name=${encodeURIComponent(newName)}&background=1DB954&color=fff&size=150`;
      }
      
      // Update in database
      userDatabase[currentUser.email] = currentUser;
      localStorage.setItem('userDatabase', JSON.stringify(userDatabase));
      localStorage.setItem('currentUser', JSON.stringify(currentUser));
      
      updateUserProfile();
      updateActivityLog('Profile Update', 'Profile information updated');
      showDownloadMessage('Profile updated successfully!');
      
      document.querySelector('.playlist-modal').remove();
    }

    // Settings change handlers
    document.addEventListener('DOMContentLoaded', () => {
      setTimeout(() => {
        const toggles = ['dark-mode-toggle', 'autoplay-toggle', 'hq-audio-toggle'];
        toggles.forEach(toggleId => {
          const toggle = document.getElementById(toggleId);
          if (toggle) {
            toggle.addEventListener('change', (e) => {
              if (!currentUser) return;
              
              const setting = toggleId.replace('-toggle', '').replace('-', '');
              const settingMap = {
                'darkmode': 'darkMode',
                'autoplay': 'autoplay',
                'hqaudio': 'highQuality'
              };
              
              currentUser.settings = currentUser.settings || {};
              currentUser.settings[settingMap[setting]] = e.target.checked;
              
              userDatabase[currentUser.email] = currentUser;
              localStorage.setItem('userDatabase', JSON.stringify(userDatabase));
              localStorage.setItem('currentUser', JSON.stringify(currentUser));
              
              updateActivityLog('Settings', `${settingMap[setting]} ${e.target.checked ? 'enabled' : 'disabled'}`);
            });
          }
        });
      }, 100);
    });

    function logoutUser() {
      if (confirm('Are you sure you want to logout?')) {
        updateActivityLog('Logout', 'User logged out');
        
        // Clear session data
        localStorage.removeItem('currentSession');
        localStorage.removeItem('currentUser');
        localStorage.removeItem('rememberUser');
        
        currentUser = null;
        currentSession = null;
        
        showDownloadMessage('Logged out successfully');
        checkUserLoginStatus();
      }
    }

    // Playlist Navigation
    function showPlaylistsList() {
      document.getElementById('playlists-list-view').style.display = 'block';
      document.getElementById('playlist-view').classList.remove('active');
      currentPlaylist = null;
    }

    function openPlaylist(playlistId) {
      currentPlaylist = playlists.find(p => p.id === playlistId);
      if (!currentPlaylist) return;

      document.getElementById('playlists-list-view').style.display = 'none';
      document.getElementById('playlist-view').classList.add('active');
      document.getElementById('current-playlist-title').textContent = currentPlaylist.name;
      displayPlaylistSongs();
    }

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
      displayPlaylists();
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
          <button class="add-to-playlist-btn" onclick="openAddToPlaylistModal(${index})">
            <i class="fas fa-list-ul"></i>
          </button>
        `;
        songCard.onclick = (e) => {
          if (!e.target.closest('.download-btn') && !e.target.closest('.favorite-btn') && !e.target.closest('.add-to-playlist-btn')) {
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
          <button class="add-to-playlist-btn" onclick="openAddToPlaylistModal(${index}, 'favorites')">
            <i class="fas fa-list-ul"></i>
          </button>
        `;
        songCard.onclick = (e) => {
          if (!e.target.closest('.download-btn') && !e.target.closest('.favorite-btn') && !e.target.closest('.add-to-playlist-btn')) {
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
        if (currentUser) {
          updateActivityLog('Favorite Removed', `Removed "${song.name}" from favorites`);
        }
      } else {
        const favoriteWithUser = { ...song, userId: currentUser?.id, addedAt: new Date().toISOString() };
        favorites.push(favoriteWithUser);
        showDownloadMessage(`Added ${song.name} to favorites`, false);
        if (currentUser) {
          updateActivityLog('Favorite Added', `Added "${song.name}" to favorites`);
        }
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
          if (currentUser) {
            updateActivityLog('Song Downloaded', `Downloaded "${song.name}" by ${song.artist}`);
          }
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

      // Hide mini player when starting new song
      document.getElementById('mini-player').classList.remove('active');

      // Track activity
      if (currentUser) {
        updateActivityLog('Song Played', `Played "${song.name}" by ${song.artist}`);
      }

      if (song.isYouTube) {
        nowPlaying.classList.add('active');
        player.loadVideoById(song.audio_url.split('v=')[1]);
        audio.pause();
      } else {
        audio.src = song.audio_url;
        audio.play().catch(e => console.error('Playback failed:', e));
        isPlaying = true;
        nowPlaying.classList.add('active');
        nowPlayingBg.style.backgroundImage = `url(${song.thumbnail})`;
        nowPlayingImg.src = song.thumbnail;
        nowPlayingTitle.textContent = song.name;
        nowPlayingArtist.textContent = song.artist;
        playPauseIcon.className = 'fas fa-pause';
        document.getElementById('mini-play-pause-btn').innerHTML = '<i class="fas fa-pause"></i>';
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

      // Hide mini player when starting new song
      document.getElementById('mini-player').classList.remove('active');

      if (song.isYouTube) {
        nowPlaying.classList.add('active');
        player.loadVideoById(song.audio_url.split('v=')[1]);
        audio.pause();
      } else {
        audio.src = song.audio_url;
        audio.play().catch(e => console.error('Playback failed:', e));
        isPlaying = true;
        nowPlaying.classList.add('active');
        nowPlayingBg.style.backgroundImage = `url(${song.thumbnail})`;
        nowPlayingImg.src = song.thumbnail;
        nowPlayingTitle.textContent = song.name;
        nowPlayingArtist.textContent = song.artist;
        playPauseIcon.className = 'fas fa-pause';
        document.getElementById('mini-play-pause-btn').innerHTML = '<i class="fas fa-pause"></i>';
        likeBtn.className = 'fas fa-heart';
        likeBtn.classList.add('active');
        shuffleBtn.classList.toggle('active', isShuffle);
        repeatBtn.classList.toggle('active', repeatMode !== 0);
      }
    }

    // Player control functions
    function minimizeNowPlaying() {
      nowPlaying.classList.remove('active');
      if (audio.src && !audio.paused) {
        document.getElementById('mini-player').classList.add('active');
        updateMiniPlayer();
      }
    }

    function expandNowPlaying() {
      document.getElementById('mini-player').classList.remove('active');
      nowPlaying.classList.add('active');
    }

    function stopAndClosePlayer() {
      audio.pause();
      audio.src = '';
      isPlaying = false;
      currentSongIndex = -1;
      nowPlaying.classList.remove('active');
      document.getElementById('mini-player').classList.remove('active');
      playPauseIcon.className = 'fas fa-play';
      document.getElementById('mini-play-pause-btn').innerHTML = '<i class="fas fa-play"></i>';
    }

    function updateMiniPlayer() {
      const songList = currentView === 'favorites' ? favorites : 
                      currentView === 'playlist' ? currentPlaylist?.songs : songs;
      if (!songList || currentSongIndex < 0 || currentSongIndex >= songList.length) return;

      const song = songList[currentSongIndex];
      document.getElementById('mini-player-img').src = song.thumbnail;
      document.getElementById('mini-player-title').textContent = song.name;
      document.getElementById('mini-player-artist').textContent = song.artist;

      const miniPlayPauseBtn = document.getElementById('mini-play-pause-btn');
      miniPlayPauseBtn.innerHTML = isPlaying ? '<i class="fas fa-pause"></i>' : '<i class="fas fa-play"></i>';
    }

    // Playback controls
    function togglePlayPause() {
      if (audio.paused && audio.src) {
        audio.play().catch(e => console.error('Playback failed:', e));
        isPlaying = true;
        playPauseIcon.className = 'fas fa-pause';
        document.getElementById('mini-play-pause-btn').innerHTML = '<i class="fas fa-pause"></i>';
      } else {
        audio.pause();
        isPlaying = false;
        playPauseIcon.className = 'fas fa-play';
        document.getElementById('mini-play-pause-btn').innerHTML = '<i class="fas fa-play"></i>';
      }
    }

    function nextSong() {
      const songList = currentView === 'favorites' ? favorites : 
                      currentView === 'playlist' ? currentPlaylist?.songs : songs;
      if (!songList) return;

      if (isShuffle) {
        const randomIndex = Math.floor(Math.random() * songList.length);
        if (currentView === 'favorites') playSongFromFavorites(randomIndex);
        else if (currentView === 'playlist') playPlaylistSong(randomIndex);
        else playSong(randomIndex);
      } else if (repeatMode === 2) {
        if (currentView === 'favorites') playSongFromFavorites(currentSongIndex);
        else if (currentView === 'playlist') playPlaylistSong(currentSongIndex);
        else playSong(currentSongIndex);
      } else if (currentSongIndex < songList.length - 1) {
        if (currentView === 'favorites') playSongFromFavorites(currentSongIndex + 1);
        else if (currentView === 'playlist') playPlaylistSong(currentSongIndex + 1);
        else playSong(currentSongIndex + 1);
      } else if (repeatMode === 1) {
        if (currentView === 'favorites') playSongFromFavorites(0);
        else if (currentView === 'playlist') playPlaylistSong(0);
        else playSong(0);
      }
    }

    function previousSong() {
      const songList = currentView === 'favorites' ? favorites : 
                      currentView === 'playlist' ? currentPlaylist?.songs : songs;
      if (!songList) return;

      if (isShuffle) {
        const randomIndex = Math.floor(Math.random() * songList.length);
        if (currentView === 'favorites') playSongFromFavorites(randomIndex);
        else if (currentView === 'playlist') playPlaylistSong(randomIndex);
        else playSong(randomIndex);
      } else if (currentSongIndex > 0) {
        if (currentView === 'favorites') playSongFromFavorites(currentSongIndex - 1);
        else if (currentView === 'playlist') playPlaylistSong(currentSongIndex - 1);
        else playSong(currentSongIndex - 1);
      } else if (repeatMode === 1) {
        if (currentView === 'favorites') playSongFromFavorites(songList.length - 1);
        else if (currentView === 'playlist') playPlaylistSong(songList.length - 1);
        else playSong(songList.length - 1);
      }
    }

    // Progress bar and time
    audio.onloadedmetadata = () => {
      totalDuration.textContent = formatTime(audio.duration);
      progress.style.width = '0%';
      document.getElementById('mini-player-progress').style.width = '0%';
    };

    audio.ontimeupdate = () => {
      if (audio.duration) {
        const progressPercent = (audio.currentTime / audio.duration) * 100;
        progress.style.width = `${progressPercent}%`;
        document.getElementById('mini-player-progress').style.width = `${progressPercent}%`;
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
      if (e.code === 'Space' && nowPlaying.classList.contains('active')) {
        e.preventDefault();
        togglePlayPause();
      }
    });

    // Playlist Management Functions
    function createNewPlaylist() {
      document.getElementById('playlistModal').classList.add('active');
      document.getElementById('playlistNameInput').focus();
    }

    function closePlaylistModal() {
      document.getElementById('playlistModal').classList.remove('active');
      document.getElementById('playlistNameInput').value = '';
    }

    function saveNewPlaylist() {
      const name = document.getElementById('playlistNameInput').value.trim();
      if (!name) {
        showDownloadMessage('Please enter a playlist name', true);
        return;
      }

      if (playlists.some(p => p.name === name)) {
        showDownloadMessage('Playlist name already exists', true);
        return;
      }

      const newPlaylist = {
        id: Date.now().toString(),
        name: name,
        songs: [],
        createdAt: new Date().toISOString()
      };

      newPlaylist.createdBy = currentUser?.id;
      playlists.push(newPlaylist);
      localStorage.setItem('playlists', JSON.stringify(playlists));
      displayPlaylists();
      closePlaylistModal();
      showDownloadMessage(`Playlist "${name}" created successfully!`);
      if (currentUser) {
        updateActivityLog('Playlist Created', `Created playlist "${name}"`);
      }
    }

    function displayPlaylists() {
      const container = document.getElementById('playlists-container');
      container.innerHTML = '';

      if (playlists.length === 0) {
        container.innerHTML = '<p style="color: #b3b3b3;">No playlists created yet. Create your first playlist!</p>';
        return;
      }

      playlists.forEach(playlist => {
        const playlistCard = document.createElement('div');
        playlistCard.className = 'playlist-card';
        playlistCard.innerHTML = `
          <div class="playlist-actions">
            <button class="playlist-action-btn" onclick="deletePlaylist('${playlist.id}')" title="Delete Playlist">
              <i class="fas fa-trash"></i>
            </button>
          </div>
          <h4>${playlist.name}</h4>
          <p>${playlist.songs.length} songs</p>
          <div class="playlist-meta">
            <span><i class="fas fa-calendar"></i> ${new Date(playlist.createdAt).toLocaleDateString()}</span>
          </div>
        `;
        playlistCard.onclick = (e) => {
          if (!e.target.closest('.playlist-action-btn')) {
            openPlaylist(playlist.id);
          }
        };
        container.appendChild(playlistCard);
      });
    }

    function deletePlaylist(playlistId) {
      const playlist = playlists.find(p => p.id === playlistId);
      if (!playlist) return;

      if (confirm(`Are you sure you want to delete "${playlist.name}"?`)) {
        playlists = playlists.filter(p => p.id !== playlistId);
        localStorage.setItem('playlists', JSON.stringify(playlists));
        displayPlaylists();
        showDownloadMessage(`Playlist "${playlist.name}" deleted`);
      }
    }

    function displayPlaylistSongs() {
      const container = document.getElementById('playlist-songs-container');
      container.innerHTML = '';

      if (!currentPlaylist || currentPlaylist.songs.length === 0) {
        container.innerHTML = '<p style="color: #b3b3b3;">This playlist is empty. Add some songs!</p>';
        return;
      }

      currentPlaylist.songs.forEach((song, index) => {
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
          <button class="download-btn" onclick="downloadPlaylistSong(${index})">
            <i class="fas fa-download"></i>
          </button>
          <button class="favorite-btn" onclick="removeFromPlaylist(${index})">
            <i class="fas fa-times"></i>
          </button>
        `;
        songCard.onclick = (e) => {
          if (!e.target.closest('.download-btn') && !e.target.closest('.favorite-btn')) {
            playPlaylistSong(index);
          }
        };
        container.appendChild(songCard);
      });
    }

    function openAddToPlaylistModal(index, source = 'trending') {
      currentSongForPlaylist = { index, source };
      const modal = document.getElementById('addToPlaylistModal');
      const playlistsList = document.getElementById('playlistsList');

      playlistsList.innerHTML = '';

      if (playlists.length === 0) {
        playlistsList.innerHTML = '<p style="color: #b3b3b3;">No playlists available. Create one first!</p>';
      } else {
        playlists.forEach(playlist => {
          const playlistItem = document.createElement('div');
          playlistItem.className = 'playlist-item';
          playlistItem.style.cssText = 'padding: 10px; margin: 5px 0; background: #333; border-radius: 8px; cursor: pointer; transition: all 0.2s ease;';
          playlistItem.innerHTML = `
            <h4 style="margin: 0; font-size: 14px;">${playlist.name}</h4>
            <p style="margin: 5px 0 0 0; font-size: 11px; color: #b3b3b3;">${playlist.songs.length} songs</p>
          `;
          playlistItem.onmouseover = () => playlistItem.style.background = '#444';
          playlistItem.onmouseout = () => playlistItem.style.background = '#333';
          playlistItem.onclick = () => addToPlaylist(playlist.id);
          playlistsList.appendChild(playlistItem);
        });
      }

      modal.classList.add('active');
    }

    function closeAddToPlaylistModal() {
      document.getElementById('addToPlaylistModal').classList.remove('active');
      currentSongForPlaylist = null;
    }

    function addToPlaylist(playlistId) {
      if (!currentSongForPlaylist) return;

      const { index, source } = currentSongForPlaylist;
      const songList = source === 'favorites' ? favorites : songs;
      const song = songList[index];
      const playlist = playlists.find(p => p.id === playlistId);

      if (!playlist) return;

      // Check if song already exists in playlist
      if (playlist.songs.some(s => s.id === song.id)) {
        showDownloadMessage(`"${song.name}" is already in "${playlist.name}"`, true);
        closeAddToPlaylistModal();
        return;
      }

      playlist.songs.push(song);
      localStorage.setItem('playlists', JSON.stringify(playlists));
      showDownloadMessage(`Added "${song.name}" to "${playlist.name}"`);
      closeAddToPlaylistModal();

      // Update display if currently viewing this playlist
      if (currentPlaylist && currentPlaylist.id === playlistId) {
        currentPlaylist = playlist;
        displayPlaylistSongs();
      }
    }

    function removeFromPlaylist(index) {
      if (!currentPlaylist) return;

      const song = currentPlaylist.songs[index];
      currentPlaylist.songs.splice(index, 1);

      // Update the playlist in the playlists array
      const playlistIndex = playlists.findIndex(p => p.id === currentPlaylist.id);
      if (playlistIndex !== -1) {
        playlists[playlistIndex] = currentPlaylist;
        localStorage.setItem('playlists', JSON.stringify(playlists));
      }

      displayPlaylistSongs();
      showDownloadMessage(`Removed "${song.name}" from playlist`);
    }

    function playPlaylistSong(index) {
      if (!currentPlaylist || index < 0 || index >= currentPlaylist.songs.length) return;
      currentSongIndex = index;
      currentView = 'playlist';
      const song = currentPlaylist.songs[index];

      // Hide mini player when starting new song
      document.getElementById('mini-player').classList.remove('active');

      if (song.isYouTube) {
        nowPlaying.classList.add('active');
        player.loadVideoById(song.audio_url.split('v=')[1]);
        audio.pause();
      } else {
        audio.src = song.audio_url;
        audio.play().catch(e => console.error('Playback failed:', e));
        isPlaying = true;
        nowPlaying.classList.add('active');
        nowPlayingBg.style.backgroundImage = `url(${song.thumbnail})`;
        nowPlayingImg.src = song.thumbnail;
        nowPlayingTitle.textContent = song.name;
        nowPlayingArtist.textContent = song.artist;
        playPauseIcon.className = 'fas fa-pause';
        document.getElementById('mini-play-pause-btn').innerHTML = '<i class="fas fa-pause"></i>';
        const isFavorited = favorites.some(fav => fav.id === song.id);
        likeBtn.className = isFavorited ? 'fas fa-heart' : 'far fa-heart';
        likeBtn.classList.toggle('active', isFavorited);
        shuffleBtn.classList.toggle('active', isShuffle);
        repeatBtn.classList.toggle('active', repeatMode !== 0);
      }
    }

    function downloadPlaylistSong(index) {
      if (!currentPlaylist) return;
      const song = currentPlaylist.songs[index];

      if (song.isYouTube) {
        showDownloadMessage('Downloading YouTube songs is not allowed due to Terms of Service.', true);
        return;
      }

      if (song.audio_url) {
        try {
          fetch(song.audio_url).then(response => {
            if (!response.ok) throw new Error('Failed to fetch the song');
            return response.blob();
          }).then(blob => {
            const url = window.URL.createObjectURL(blob);
            const link = document.createElement('a');
            link.href = url;
            link.download = `${song.name}.mp3`;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            window.URL.revokeObjectURL(url);
            showDownloadMessage(`Downloading ${song.name}`);
          });
        } catch (error) {
          console.error('Download error:', error);
          showDownloadMessage('Failed to download the song. Please try again.', true);
        }
      } else {
        showDownloadMessage('Download not available for this song.', true);
      }
    }

    // Close modals when clicking outside
    document.getElementById('playlistModal').addEventListener('click', (e) => {
      if (e.target.id === 'playlistModal') closePlaylistModal();
    });

    document.getElementById('addToPlaylistModal').addEventListener('click', (e) => {
      if (e.target.id === 'addToPlaylistModal') closeAddToPlaylistModal();
    });

    // Enter key support for playlist creation
    document.getElementById('playlistNameInput').addEventListener('keydown', (e) => {
      if (e.key === 'Enter') {
        e.preventDefault();
        saveNewPlaylist();
      }
    });
  </script>
</body>
</html