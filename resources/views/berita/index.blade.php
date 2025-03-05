<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Kediri</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .carousel {
            display: flex;
            overflow: hidden;
            position: relative;
            width: 100%;
            max-width: 800px;
            margin: auto;
        }
        .card-container {
            display: flex;
            transition: transform 0.5s ease;
        }
        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin: 15px;
            padding: 20px;
            width: 300px;
            text-align: center;
        }
        .card img {
            max-width: 100%;
            border-radius: 8px;
        }
        .card h3 {
            font-size: 16px;
            font-weight: bold;
            color: #333;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 100%;
        }

        /* Styling Tombol Navigasi */
        .button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.6);
            color: white;
            border: none;
            cursor: pointer;
            padding: 15px;
            border-radius: 50%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            font-size: 20px;
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.3s;
        }

        .button:hover {
            background: rgba(0, 0, 0, 0.8);
        }

        .button.left {
            left: 10px;
        }
        .button.right {
            right: 10px;
        }
    </style>
</head>
<body>
    <h1>Daftar Berita Kota Kediri</h1>
    <div class="carousel">
        <div class="card-container">
            @foreach ($berita as $item)
                <div class="card">
                    <img src="{{ $item['gambar'] }}" alt="{{ $item['judul'] }}">
                    <h3 title="{{ $item['judul'] }}">
                        {{ strlen($item['judul']) > 50 ? substr($item['judul'], 0, 50) . '...' : $item['judul'] }}
                    </h3>
                </div>
            @endforeach
        </div>
        <button class="button left" onclick="moveSlide(-1)">&#10094;</button>
        <button class="button right" onclick="moveSlide(1)">&#10095;</button>
    </div>

    <script>
        let currentIndex = 0;

        function moveSlide(direction) {
            const cards = document.querySelectorAll('.card');
            const totalCards = cards.length;
            currentIndex = (currentIndex + direction + totalCards) % totalCards;
            const cardWidth = cards[0].offsetWidth;
            document.querySelector('.card-container').style.transform = `translateX(-${currentIndex * cardWidth}px)`;
        }

        setInterval(() => {
            moveSlide(1);
        }, 3000); // Auto slide setiap 3 detik
    </script>
</body>
</html>
