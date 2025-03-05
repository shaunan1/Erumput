<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Kota Kediri</title>       
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eee8dc;
            margin: 0;
            padding: 40px 20px;
        }

        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap');
        h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 32px;
            text-align: center;
            background: linear-gradient(45deg, #b89b6f, #6e5837);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 2px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }

        /* Wrapper Carousel */
        .carousel-container {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            width: 100%;
            max-width: 1000px;
            margin: auto;
            background-color: #ebe6db; /* Warna latar belakang carousel */
            padding: 40px 0; /* Jarak atas-bawah */
        }

        /* Carousel */
        .carousel {
            display: flex;
            overflow: hidden;
            position: relative;
            width: 100%;
            background-color: #f0ead6; /* Warna mirip desain sebelumnya */
            border-radius: 20px; /* Membuat sudut membulat */
            padding: 20px;
            max-width: 900px;
            margin: auto;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Bayangan lembut */
        }

        .card-container {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        /* Desain Kartu */
        .card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin: 10px;
            padding: 15px;
            width: 250px;
            height: 220px;
            text-align: center;
            transition: transform 0.4s ease, opacity 0.4s ease;
            opacity: 0.6;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        /* Kartu Tengah Diperbesar */
        .card.active {
            transform: scale(1.1);
            opacity: 1;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
        }

        .card img {
            max-width: 100%;
            height: 100px;
            object-fit: cover;
            border-radius: 10px;
        }

        .card h3 {
            font-size: 14px;
            font-weight: bold;
            color: #333;
            margin: 10px 0 5px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 100%;
        }

        .card p {
            font-size: 12px;
            color: #666;
            margin: 0;
            line-height: 1.4;
        }

        /* Tombol Navigasi */
        .button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: #c4b695;
            color: white;
            border: none;
            cursor: pointer;
            padding: 12px;
            border-radius: 50%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            font-size: 18px;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.3s;
        }

        .button:hover {
            background: #a08d6f;
        }

        .button.left {
            left: -50px;
        }

        .button.right {
            right: -50px;
        }

    </style>
</head>
<body>

    <h1>Berita Kota Kediri</h1>
    
    <div class="carousel-container">
        <button class="button left" onclick="moveSlide(-1)">&#10094;</button>
        
        <div class="carousel">
            <div class="card-container">
                @foreach ($berita as $index => $item)
                    <div class="card {{ $index === 1 ? 'active' : '' }}">
                        <img src="{{ $item['gambar'] }}" alt="{{ $item['judul'] }}">
                        <h3 title="{{ $item['judul'] }}">
                            {{ strlen($item['judul']) > 40 ? substr($item['judul'], 0, 40) . '...' : $item['judul'] }}
                        </h3>
                        <p>
                            {{ strlen($item['deskripsi']) > 80 ? substr($item['deskripsi'], 0, 80) . '...' : $item['deskripsi'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>

        <button class="button right" onclick="moveSlide(1)">&#10095;</button>
    </div>

    <script>
        let currentIndex = 1; // Fokus awal di tengah

        function moveSlide(direction) {
            const cards = document.querySelectorAll('.card');
            const totalCards = cards.length;

            currentIndex = (currentIndex + direction + totalCards) % totalCards;
            const cardWidth = cards[0].offsetWidth + 20;
            document.querySelector('.card-container').style.transform = `translateX(-${(currentIndex - 1) * cardWidth}px)`;

            document.querySelectorAll('.card').forEach((card, index) => {
                card.classList.toggle('active', index === currentIndex);
            });
        }

        setInterval(() => {
            moveSlide(1);
        }, 3000); // Auto-slide setiap 3 detik
    </script>

</body>
</html>
