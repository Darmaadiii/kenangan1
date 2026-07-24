<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="ngrok-skip-browser-warning" content="true">
    <title>Darma & Elfin</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'softpink': {
                            50: '#fff5f7',
                            100: '#fde8ed',
                            200: '#f7d6e0',
                            300: '#f2b5c8',
                            400: '#e8a0bf',
                            500: '#d9779f',
                            600: '#c25480',
                            700: '#9e3b63',
                            800: '#5c1d37',
                            900: '#300f1c',
                        },
                        'roseaccent': '#e8a0bf',
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #300f1c;
        }
        .font-serif-luxury {
            font-family: 'Playfair Display', serif;
        }

        .pink-border {
            border-color: rgba(247, 214, 224, 0.25);
        }
        .pink-btn {
            border: 1px solid rgba(247, 214, 224, 0.35);
            color: #f7d6e0;
            background: rgba(247, 214, 224, 0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .pink-btn:hover {
            background: rgba(247, 214, 224, 0.25);
            box-shadow: 0 0 15px rgba(232, 160, 191, 0.4);
        }

        /* Container Snap Scroll Vertikal Halaman Utama */
        .snap-container {
            scroll-snap-type: y mandatory;
            overflow-y: scroll;
            height: 100vh;
            scroll-behavior: smooth;
        }
        
        /* Animasi Masuk Saat Slide Pindah */
        .snap-section {
            scroll-snap-align: start;
            scroll-snap-stop: always;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .slide-content {
            opacity: 0;
            transform: translateY(30px) scale(0.96);
            transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1), transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .snap-section.active-slide .slide-content {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        .snap-container::-webkit-scrollbar { display: none; }
        .snap-container { -ms-overflow-style: none; scrollbar-width: none; }

        /* Horizontal Carousel Slider Galeri */
        .gallery-carousel {
            scroll-snap-type: x mandatory;
            overflow-x: scroll;
            scroll-behavior: smooth;
            display: flex;
            width: 100%;
        }
        .gallery-item {
            scroll-snap-align: center;
            scroll-snap-stop: always;
            flex: 0 0 100%;
            max-width: 100%;
        }
        .gallery-carousel::-webkit-scrollbar { display: none; }
        .gallery-carousel { -ms-overflow-style: none; scrollbar-width: none; }

        /* Fixed Background Foto Utama Transparan (Pink Blur Ambient) */
        .bg-photo-layer {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-image: url("/photos/1.jpeg");
            background-size: cover;
            background-position: center;
            filter: blur(14px) scale(1.1);
            opacity: 0.32;
            z-index: 0;
            pointer-events: none;
            animation: pulseBg 12s ease-in-out infinite alternate;
        }

        @keyframes pulseBg {
            0% { transform: scale(1.1); filter: blur(14px); }
            100% { transform: scale(1.18); filter: blur(18px); }
        }

        .bg-overlay-layer {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: radial-gradient(circle, rgba(48, 15, 28, 0.45) 0%, rgba(30, 8, 17, 0.88) 100%);
            z-index: 1;
            pointer-events: none;
        }

        /* Partikel Melayang */
        .floating-elements {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 2;
            overflow: hidden;
        }

        @keyframes floatUp {
            0% {
                transform: translateY(105vh) rotate(0deg) scale(0.7);
                opacity: 0;
            }
            15% { opacity: 0.8; }
            85% { opacity: 0.8; }
            100% {
                transform: translateY(-10vh) rotate(360deg) scale(1.2);
                opacity: 0;
            }
        }

        .floating-item {
            position: absolute;
            animation: floatUp 8s linear infinite;
            font-size: 1.5rem;
            user-select: none;
            filter: drop-shadow(0 0 5px rgba(255,255,255,0.3));
        }

        /* Stiker Memental Cute */
        @keyframes bounceCute {
            0%, 100% { transform: translateY(0) scale(1) rotate(0deg); }
            50% { transform: translateY(-8px) scale(1.12) rotate(5deg); }
        }

        .cute-sticker {
            animation: bounceCute 3.5s ease-in-out infinite;
            display: inline-block;
        }

        /* Glowing Ring Effect Foto Utama Soft Pink */
        @keyframes glowRing {
            0%, 100% { box-shadow: 0 0 15px rgba(232, 160, 191, 0.3); }
            50% { box-shadow: 0 0 30px rgba(232, 160, 191, 0.7); }
        }

        .glow-avatar {
            animation: glowRing 4s infinite ease-in-out;
        }

        /* Card Shimmer Shiny Effect */
        .shimmer-card {
            position: relative;
            overflow: hidden;
        }
        .shimmer-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                45deg,
                transparent 45%,
                rgba(255, 255, 255, 0.08) 50%,
                transparent 55%
            );
            transform: rotate(30deg);
            animation: shimmerMove 6s infinite;
        }

        @keyframes shimmerMove {
            0% { transform: translate(-100%, -100%) rotate(30deg); }
            100% { transform: translate(100%, 100%) rotate(30deg); }
        }

        /* Efek Flip Card untuk Game */
        .game-card {
            perspective: 1000px;
        }
        .game-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            transform-style: preserve-3d;
        }
        .game-card.flipped .game-card-inner {
            transform: rotateY(180deg);
        }
        .game-card-front, .game-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            border-radius: 16px;
        }
        .game-card-back {
            transform: rotateY(180deg);
        }
    </style>
</head>
<body class="text-softpink-100 overflow-hidden relative">

    <!-- AUDIO PLAYER HIDDEN -->
    <audio id="bg-music" loop>
        <source src="https://cdn.pixabay.com/download/audio/2022/05/27/audio_1808fbf07a.mp3?filename=romantic-piano-112188.mp3" type="audio/mpeg">
    </audio>

    <!-- ELEMEN BACKGROUND FOTO & OVERLAY PINK -->
    <div class="bg-photo-layer"></div>
    <div class="bg-overlay-layer"></div>

    <!-- ELEMEN LUCU MELAYANG -->
    <div class="floating-elements">
        <span class="floating-item" style="left: 5%; animation-duration: 9s; animation-delay: 0s;">🌸</span>
        <span class="floating-item" style="left: 15%; animation-duration: 7s; animation-delay: 2s;">💖</span>
        <span class="floating-item" style="left: 25%; animation-duration: 11s; animation-delay: 1s;">✨</span>
        <span class="floating-item" style="left: 35%; animation-duration: 8s; animation-delay: 4s;">🌺</span>
        <span class="floating-item" style="left: 45%; animation-duration: 12s; animation-delay: 0.8s;">🎀</span>
        <span class="floating-item" style="left: 55%; animation-duration: 10s; animation-delay: 0.5s;">🤍</span>
        <span class="floating-item" style="left: 65%; animation-duration: 7.5s; animation-delay: 3s;">🌸</span>
        <span class="floating-item" style="left: 78%; animation-duration: 9.5s; animation-delay: 1.5s;">💕</span>
        <span class="floating-item" style="left: 88%; animation-duration: 8.5s; animation-delay: 3.5s;">✨</span>
        <span class="floating-item" style="left: 95%; animation-duration: 10.5s; animation-delay: 2s;">🌷</span>
    </div>

    <!-- CONTENT WRAPPER -->
    <div class="relative z-10">

        <!-- Floating Music Button -->
        <div class="fixed top-5 right-5 z-50 flex gap-2">
            <button id="music-btn" onclick="toggleMusic()" class="w-10 h-10 rounded-full bg-softpink-800/60 border pink-border flex items-center justify-center text-softpink-200 shadow-lg backdrop-blur-md hover:scale-110 active:scale-95 transition-all duration-300">
                <i id="music-icon" class="fa-solid fa-music text-xs animate-pulse"></i>
            </button>
        </div>

        <!-- Floating Navigation Dots -->
        <div class="fixed right-3 top-1/2 -translate-y-1/2 z-50 flex flex-col gap-3">
            <a href="#hero" id="dot-hero" class="w-3 h-3 rounded-full bg-softpink-200 shadow-md transition-all duration-500 scale-125"></a>
            <a href="#about" id="dot-about" class="w-3 h-3 rounded-full bg-softpink-700 hover:bg-softpink-300 transition-all duration-500"></a>
            <a href="#game" id="dot-game" class="w-3 h-3 rounded-full bg-softpink-700 hover:bg-softpink-300 transition-all duration-500"></a>
            <a href="#gallery" id="dot-gallery" class="w-3 h-3 rounded-full bg-softpink-700 hover:bg-softpink-300 transition-all duration-500"></a>
        </div>

        <!-- MAIN SNAP SCROLL CONTAINER -->
        <div class="snap-container max-w-md mx-auto">

            <!-- SECTION 1: HERO / BANNER UTAMA -->
            <section id="hero" class="snap-section text-center relative active-slide">
                <div class="slide-content w-full bg-softpink-800/60 border pink-border rounded-[32px] p-8 shadow-2xl backdrop-blur-md space-y-6 relative overflow-hidden shimmer-card">
                    
                    <span class="absolute top-3 left-4 text-xl cute-sticker" style="animation-delay: 0s;">🌸</span>
                    <span class="absolute top-3 right-4 text-xl cute-sticker" style="animation-delay: 1s;">✨</span>

                    <p class="text-xs uppercase tracking-[0.3em] text-softpink-300 font-medium">
                        <i class="fa-solid fa-heart text-pink-400 mr-1 text-[10px] animate-bounce"></i> OUR JOURNEY <i class="fa-solid fa-heart text-pink-400 ml-1 text-[10px] animate-bounce"></i>
                    </p>
                    
                    <div class="relative w-44 h-44 mx-auto rounded-full p-1 border-2 border-softpink-300/50 overflow-hidden bg-transparent shadow-xl group glow-avatar">
                        <img src="/photos/1.jpeg" class="w-full h-full object-cover rounded-full group-hover:scale-110 transition-transform duration-700 ease-out" alt="Darma & Elfin">
                    </div>
                    
                    <div>
                        <h1 class="text-3xl font-serif-luxury text-softpink-50 tracking-wide">Darma & Elfin</h1>
                        <p class="text-xs text-softpink-300 mt-2 italic">"Merayakan setiap momen indah denganmu 🤍"</p>
                    </div>
                    
                    <div class="pt-2">
                        <a href="#about" class="inline-block px-6 py-2.5 rounded-full pink-btn text-xs tracking-wider uppercase font-medium shadow-sm hover:scale-105 active:scale-95 transition-all">
                            Scroll Ke Bawah <i class="fa-solid fa-arrow-down ml-1 text-[10px] animate-bounce"></i>
                        </a>
                    </div>
                </div>
            </section>

            <!-- SECTION 2: CERITA KITA -->
            <section id="about" class="snap-section text-center">
                <div class="slide-content w-full bg-softpink-800/60 border pink-border rounded-[32px] p-8 shadow-2xl backdrop-blur-md space-y-5 relative shimmer-card">
                    
                    <span class="absolute top-4 right-5 text-xl cute-sticker" style="animation-delay: 0.5s;">🎀</span>
                    <span class="absolute bottom-4 left-5 text-xl cute-sticker" style="animation-delay: 1.5s;">🌷</span>

                    <p class="text-[11px] uppercase tracking-[0.25em] text-softpink-300 font-medium">
                        OUR STORY ✨
                    </p>

                    <h2 class="text-2xl font-serif-luxury text-softpink-50">
                        Kisah & Perjalanan 💖
                    </h2>

                    <hr class="border-softpink-600/40 w-1/3 mx-auto">

                    <p class="text-xs text-softpink-200 leading-relaxed italic px-2">
                        "Website ini dibuat khusus untuk merangkum dan menyimpan setiap kenangan indah kita. Tempat di mana kita bisa kembali melihat perjalanan manis yang sudah kita lewati bersama."
                    </p>

                    <div class="pt-3">
                        <a href="#game" class="inline-block px-6 py-2.5 rounded-full pink-btn text-xs tracking-wider uppercase font-medium shadow-sm hover:scale-105 active:scale-95 transition-all">
                            Main Game Lucu <i class="fa-solid fa-gamepad ml-1 text-xs"></i>
                        </a>
                    </div>
                </div>
            </section>

            <!-- SECTION 3: MINI GAME TEBAK KARTU KENANGAN -->
            <section id="game" class="snap-section text-center">
                <div class="slide-content w-full bg-softpink-800/60 border pink-border rounded-[32px] p-6 shadow-2xl backdrop-blur-md space-y-4 relative shimmer-card">
                    
                    <span class="absolute top-3 left-4 text-lg cute-sticker">🎮</span>
                    <span class="absolute top-3 right-4 text-lg cute-sticker">💖</span>

                    <div>
                        <p class="text-[10px] uppercase tracking-[0.25em] text-softpink-300 font-medium">MINI GAME ROMANTIS</p>
                        <h2 class="text-xl font-serif-luxury text-softpink-50 mt-0.5">Buka Kartu Kenangan 💌</h2>
                        <p class="text-[11px] text-softpink-300 mt-1 italic">Klik salah satu kartu di bawah untuk membuka kenangan kita!</p>
                    </div>

                    <!-- Grid Kartu Game 3x3 -->
                    <div class="grid grid-cols-3 gap-3 pt-2 max-w-[320px] mx-auto" id="game-grid">
                        <!-- Kartu di-generate dinamis lewat JavaScript -->
                    </div>

                    <div class="pt-2 flex justify-center gap-2">
                        <button onclick="initGame()" class="px-4 py-2 rounded-full pink-btn text-[11px] tracking-wider uppercase font-medium shadow-sm hover:scale-105 active:scale-95 transition-all">
                            Reset Kartu 🔄
                        </button>
                        <a href="#gallery" class="px-4 py-2 rounded-full pink-btn text-[11px] tracking-wider uppercase font-medium shadow-sm hover:scale-105 active:scale-95 transition-all">
                            Ke Galeri <i class="fa-solid fa-arrow-down ml-1 text-[9px]"></i>
                        </a>
                    </div>
                </div>
            </section>

            <!-- SECTION 4: GALERI FOTO LENGKAP (SLIDE HORIZONTAL) -->
            <section id="gallery" class="snap-section text-center">
                <div class="slide-content w-full bg-softpink-800/60 border pink-border rounded-[32px] p-5 shadow-2xl backdrop-blur-md space-y-4 relative overflow-hidden shimmer-card">
                    
                    <div class="text-center w-full">
                        <p class="text-[10px] uppercase tracking-[0.25em] text-softpink-300 font-medium">GALERI KENANGAN 🌸</p>
                        <h2 class="text-2xl font-serif-luxury text-softpink-50 mt-0.5">Foto & Cerita 💕</h2>
                    </div>

                    <!-- CAROUSEL WRAPPER FOTO HORIZONTAL SLIDE -->
                    <div class="relative w-full">
                        
                        <button onclick="prevGallerySlide()" class="absolute left-2 top-1/2 -translate-y-1/2 z-30 w-8 h-8 rounded-full bg-softpink-900/80 border pink-border flex items-center justify-center text-softpink-100 shadow-md hover:scale-110 active:scale-95 transition-all">
                            <i class="fa-solid fa-chevron-left text-xs"></i>
                        </button>
                        <button onclick="nextGallerySlide()" class="absolute right-2 top-1/2 -translate-y-1/2 z-30 w-8 h-8 rounded-full bg-softpink-900/80 border pink-border flex items-center justify-center text-softpink-100 shadow-md hover:scale-110 active:scale-95 transition-all">
                            <i class="fa-solid fa-chevron-right text-xs"></i>
                        </button>

                        <div id="gallery-carousel" class="gallery-carousel gap-4">
                            
                            @for ($i = 1; $i <= 15; $i++)
                            <div class="gallery-item">
                                <div class="bg-softpink-900/40 border pink-border rounded-[20px] p-3 shadow-lg relative overflow-hidden">
                                    <span class="absolute top-4 right-5 z-20 text-xs cute-sticker">
                                        @if($i % 3 == 0) 🌸 @elseif($i % 3 == 1) 💖 @else ✨ @endif
                                    </span>

                                    <div class="h-64 rounded-[14px] overflow-hidden bg-transparent relative group">
                                        <img src="/photos/{{ $i }}.jpeg" alt="Momen {{ $i }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                    <div class="p-2 text-center space-y-0.5">
                                        <h3 class="font-serif-luxury text-base text-softpink-100">Kenangan #{{ $i }}</h3>
                                        <p class="text-[11px] text-softpink-300">Momen indah yang takkan pernah terlupakan.</p>
                                        <p class="text-[10px] text-roseaccent italic">"Terima kasih sudah melengkapi hariku 🤍"</p>
                                    </div>
                                </div>
                            </div>
                            @endfor

                            @if(isset($photos))
                                @foreach($photos as $photo)
                                <div class="gallery-item">
                                    <div class="bg-softpink-900/40 border pink-border rounded-[20px] p-3 shadow-lg relative">
                                        <div class="h-64 rounded-[14px] overflow-hidden bg-transparent group">
                                            <img src="/storage/{{ $photo->image_path }}" alt="{{ $photo->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                        </div>
                                        <div class="p-2 text-center space-y-0.5">
                                            <h3 class="font-serif-luxury text-base text-softpink-100">{{ $photo->title }}</h3>
                                            <p class="text-[11px] text-softpink-300">{{ $photo->caption }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif

                        </div>
                    </div>

                    <!-- Indikator Slide Foto -->
                    <div class="pt-1 flex items-center justify-between px-2">
                        <span id="gallery-indicator" class="text-[10px] text-softpink-300 font-medium">Foto 1 dari 15</span>
                        <a href="#hero" class="px-4 py-1.5 rounded-full pink-btn text-[10px] tracking-wider uppercase font-medium shadow-sm hover:scale-105 active:scale-95 transition-all">
                            Ke Atas <i class="fa-solid fa-arrow-up ml-1 text-[8px]"></i>
                        </a>
                    </div>
                </div>
            </section>

        </div>

    </div>

    <!-- Script Navigasi, Animasi Slide, Carousel Galeri, Audio, & Game Logika -->
    <script>
        const container = document.querySelector('.snap-container');
        const sections = document.querySelectorAll('.snap-section');
        const dots = {
            hero: document.getElementById('dot-hero'),
            about: document.getElementById('dot-about'),
            game: document.getElementById('dot-game'),
            gallery: document.getElementById('dot-gallery')
        };

        const observerOptions = {
            root: container,
            threshold: 0.5
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    sections.forEach(sec => sec.classList.remove('active-slide'));
                    entry.target.classList.add('active-slide');

                    Object.values(dots).forEach(dot => {
                        dot.classList.remove('bg-softpink-200', 'scale-125', 'shadow-lg');
                        dot.classList.add('bg-softpink-700');
                    });

                    const id = entry.target.getAttribute('id');
                    if (dots[id]) {
                        dots[id].classList.add('bg-softpink-200', 'scale-125', 'shadow-lg');
                        dots[id].classList.remove('bg-softpink-700');
                    }
                }
            });
        }, observerOptions);

        sections.forEach(section => observer.observe(section));

        // CONTROLLER SLIDE CAROUSEL GALERI FOTO
        const galleryCarousel = document.getElementById('gallery-carousel');
        const galleryIndicator = document.getElementById('gallery-indicator');
        const totalItems = galleryCarousel.querySelectorAll('.gallery-item').length;

        function updateGalleryIndicator() {
            const itemWidth = galleryCarousel.clientWidth;
            const currentIndex = Math.round(galleryCarousel.scrollLeft / itemWidth) + 1;
            galleryIndicator.innerText = `Foto ${currentIndex} dari ${totalItems}`;
        }

        function nextGallerySlide() {
            galleryCarousel.scrollBy({ left: galleryCarousel.clientWidth, behavior: 'smooth' });
        }

        function prevGallerySlide() {
            galleryCarousel.scrollBy({ left: -galleryCarousel.clientWidth, behavior: 'smooth' });
        }

        galleryCarousel.addEventListener('scroll', updateGalleryIndicator);

        // Audio Player
        const audio = document.getElementById('bg-music');
        const musicIcon = document.getElementById('music-icon');
        let isPlaying = false;

        function toggleMusic() {
            if (isPlaying) {
                audio.pause();
                musicIcon.classList.remove('fa-compact-disc', 'fa-spin');
                musicIcon.classList.add('fa-music');
            } else {
                audio.play();
                musicIcon.classList.remove('fa-music');
                musicIcon.classList.add('fa-compact-disc', 'fa-spin');
            }
            isPlaying = !isPlaying;
        }

        // Script Logika Game Tebak Kartu
        const gameIcons = ['🌸', '💖', '✨', '🌹', '💌', '🌷', '🤍', '🎀', '⭐'];
        const messages = [
            "Senyummu buat hariku cerah! ☀️",
            "Momen paling manis bersamamu 🤍",
            "I Love You More Than Ever! 💖",
            "Bahagia banget punya kamu 🥰",
            "Kamu adalah takdir terbaikku ✨",
            "Terima kasih sudah bertahan bersamaku 🌷",
            "Selamanya sama kamu ya! 💍",
            "Rindu setiap detik bersamamu 🌸",
            "You are my favorite notification! 📱"
        ];

        function initGame() {
            const grid = document.getElementById('game-grid');
            grid.innerHTML = '';
            
            let photoIndices = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15];
            photoIndices.sort(() => Math.random() - 0.5);

            for (let i = 0; i < 9; i++) {
                const photoNum = photoIndices[i];
                const card = document.createElement('div');
                card.className = 'game-card w-full h-24 cursor-pointer';
                card.onclick = function() {
                    this.classList.toggle('flipped');
                };

                card.innerHTML = `
                    <div class="game-card-inner">
                        <!-- Depan Kartu -->
                        <div class="game-card-front bg-softpink-800/90 border pink-border flex flex-col items-center justify-center shadow-lg hover:scale-105 transition-all duration-300">
                            <span class="text-2xl">${gameIcons[i]}</span>
                            <span class="text-[9px] text-softpink-300 mt-1 uppercase tracking-wider">Klik Me</span>
                        </div>
                        <!-- Belakang Kartu -->
                        <div class="game-card-back bg-softpink-900 border border-roseaccent/50 flex flex-col overflow-hidden shadow-xl">
                            <img src="/photos/${photoNum}.jpeg" class="w-full h-14 object-cover" alt="Foto">
                            <div class="p-1 text-[8px] text-center text-softpink-100 flex items-center justify-center h-10 font-medium leading-tight">
                                ${messages[i]}
                            </div>
                        </div>
                    </div>
                `;
                grid.appendChild(card);
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            initGame();
            updateGalleryIndicator();
        });
    </script>

</body>
</html>