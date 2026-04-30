
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bar Bar Es Duren Durian - Landing Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        /* 1. FLEXBOX SETUP (Biar Footer nempel di bawah) */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
            background-color: #ffffff;
            color: #333;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Konten utama fleksibel agar menekan footer ke bawah */
        main {
            flex: 1;
        }

        /* 2. NAVBAR & HEADER */
        .top-line {
            width: 100%; height: 45px;
            background-image: url("{{ asset('image/texture.png') }}"), linear-gradient(to bottom, #39AE1F, #8CFF00);
            background-repeat: repeat-x, no-repeat;
            background-size: auto 100%, cover;
            z-index: 99; position: relative;
        }

        header {
            padding: 15px 0; background: white; border-bottom: 1px solid #eee;
            position: relative; z-index: 100;
        }

        .navbar { display: flex; justify-content: space-between; align-items: center; }
        .logo-area img { height: 75px; transition: 0.3s; display: block; }
        .logo-area img:hover { transform: scale(1.05); }

        nav ul { display: flex; list-style: none; gap: 25px; }
        nav ul li a { text-decoration: none; color: #555; font-weight: 700; font-size: 14px; }
        nav ul li a.active { border-bottom: 3px solid #333; padding-bottom: 5px; }
        .user-profile i { font-size: 35px; color: #4CAF50; cursor: pointer; }

        /* 3. HERO SLIDER */
        .hero { margin-top: 20px; }
        .promo-banner { border-radius: 40px; display: flex; padding: 40px; color: white; position: relative; align-items: center; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .promo-slide { display: none; opacity: 0; transition: opacity 0.5s ease; }
        .promo-slide.active { display: block; opacity: 1; }

        .promo-img-wrapper { background: white; padding: 20px; border-radius: 35px; flex: 0 0 320px; position: relative; display: flex; align-items: center; justify-content: center; box-shadow: 0 10px 25px rgba(0,0,0,0.15); }
        .promo-img-wrapper img { width: 100%; border-radius: 20px; }

        .promo-text { padding: 0 40px; flex: 1; font-weight: bold; }
        .promo-text h1 { font-size: 32px; color: #ffeb3b; margin-bottom: 15px; }

        .right-box { text-align: right; flex: 0 0 200px; display: flex; flex-direction: column; align-items: flex-end; gap: 10px; }
        .old-price { text-decoration: line-through red; font-size: 32px; font-weight: bold; }
        .new-price { font-size: 28px; font-weight: 800; color: #ffeb3b; }

        .slide-arrow { position: absolute; top: 50%; transform: translateY(-50%); background: white; width: 40px; height: 40px; border-radius: 50%; border: none; cursor: pointer; z-index: 101; }
        .arrow-left { left: -20px; }
        .arrow-right { right: -20px; }

        /* 4. RECOMMENDATION */
        .recommendation { text-align: center; padding: 50px 0; }
        .card-container { display: grid; grid-template-columns: repeat(3, 1fr); gap: 25px; }
        .card { border: 1px solid #eee; border-radius: 30px; padding: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .card img { width: 100%; height: 180px; object-fit: contain; background: #f9f9f9; border-radius: 20px; margin-bottom: 15px; }
        .card a { color: #4CAF50; text-decoration: none; font-weight: bold; }

        /* 5. FOOTER */
        footer { padding: 40px 0 0 0; background-color: #fff; border-top: 1px solid #eee; margin-top: auto; }
        .footer-grid { display: grid; grid-template-columns: 1fr 1fr 1fr; align-items: start; margin-bottom: 40px; }
        .footer-logo { text-align: center; }
        .footer-logo img { height: 80px; }
        .footer-social { text-align: right; }
        .social-icons { display: flex; justify-content: flex-end; gap: 15px; font-size: 25px; }
        .pattern-bg { height: 120px; background-color: #fffbeb; background-image: radial-gradient(#ffe082 15%, transparent 16%); background-size: 40px 40px; opacity: 0.6; }
    </style>
</head>
<body>

    <div class="top-line"></div>

    <header>
        <div class="container navbar">
            <div class="logo-area">
                <img src="{{ asset('image/logo.png') }}" alt="Logo">
            </div>
            <nav>
                <ul>
                    <li><a href="#" class="active">Home</a></li>
                    <li><a href="#">Menu</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </nav>
            <div class="user-profile">
    <a href="/login" style="text-decoration: none;">
        <i class="fas fa-user-circle"></i>
    </a>
</div>
        </div>
    </header>

    <main>
        <section class="hero container">
            <div class="promo-slider-container" style="position: relative; border-radius: 40px;">
                @foreach($products as $index => $item)
                <div class="promo-slide js-slide {{ $index == 0 ? 'active' : '' }}">
                    <div class="promo-banner" style="background-color: {{ $item->warna_bg }};">
                        <div class="promo-img-wrapper">
                            <img src="{{ asset('image/' . $item->gambar) }}" class="main-prod">
                        </div>
                        <div class="promo-text">
                            <h1>{{ $item->nama }}</h1>
                            <p>{{ $item->deskripsi }}</p>
                        </div>
                        <div class="right-box">
                            <span class="old-price">Rp. {{ $item->harga_lama }}</span>
                            <span class="new-price">Rp. {{ $item->harga_baru }}</span>
                        </div>
                    </div>
                </div>
                @endforeach

                <button class="slide-arrow arrow-left" onclick="changeSlide(-1)"><i class="fas fa-chevron-left"></i></button>
                <button class="slide-arrow arrow-right" onclick="changeSlide(1)"><i class="fas fa-chevron-right"></i></button>
            </div>
        </section>

        <section class="recommendation container">
            <h2>Recommendation</h2>
            <div class="card-container">
                @foreach($recommends as $rec)
                <div class="card">
                    <img src="{{ asset('image/' . $rec->gambar) }}" alt="{{ $rec->nama }}">
                    <h3>{{ $rec->nama }}</h3>
                    <a href="#">details</a>
                </div>
                @endforeach
            </div>
        </section>
    </main>

    <footer>
        <div class="container footer-grid">
            <div class="footer-links">
                <h4>LINKS</h4>
                <p>About Us</p>
                <p>Contact Us</p>
            </div>
            <div class="footer-logo">
                <img src="{{ asset('image/logo.png') }}" alt="Footer Logo">
            </div>
            <div class="footer-social">
                <h4>FOLLOW US</h4>
                <div class="social-icons">
                    <i class="fab fa-instagram" style="color: #E1306C;"></i>
                    <i class="fab fa-tiktok"></i>
                    <i class="fab fa-whatsapp" style="color: #25D366;"></i>
                </div>
            </div>
        </div>
        <div class="pattern-bg"></div>
    </footer>

    <script>
        let currentSlideIndex = 0;
        const slides = document.querySelectorAll('.js-slide');

        function changeSlide(direction) {
            if (slides.length <= 1) return;
            slides[currentSlideIndex].classList.remove('active');
            currentSlideIndex = (currentSlideIndex + direction + slides.length) % slides.length;
            slides[currentSlideIndex].classList.add('active');
        }
    </script>
</body>
</html>