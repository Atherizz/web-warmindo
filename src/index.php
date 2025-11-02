<?php

require 'function/function.php';


$sql = 'SELECT name, price, image_url FROM menu_items ORDER BY id';

$result = pg_query($conn, $sql);
if (!$result) {
    die('Query gagal: ' . pg_last_error($conn));
}

$menuItems = pg_fetch_all($result);

$fileName = 'style.css';
require 'components/header.php';
?>

<div class="site-content">
    <section class="hero" id="home">
        <main class="content">
            <h1>Nikmati Kenikmatan <span>Indomie</span> Setiap Suapan </h1>
            <p>Indomie Hangat, Cita Rasa Khas, Harga Bersahabat!</p>
            <a href="/web-warmindo/src/cart.php" class="cta">Pesan Sekarang & Rasakan Sensasinya!</a>
        </main>
    </section>

    <section id="about" class="about">
        <h2><span>About</span> Us</h2>
        <div class="row">
            <div class="about-img">
                <img src="img/indomie1.jpg" alt="About Us">
            </div>
            <div class="content">
                <h3>Apa yang berbeda dari <span>Warmindo</span> <span>MASBRO?</span></h3>
                <p>Selamat datang di Warmindo MASBRO, tempat di mana kelezatan dan keunikan bertemu!
                    Apa yang membedakan kami dari tempat lain? Kami menyajikan hidangan dengan cita rasa autentik dan
                    bahan-bahan segar yang dipilih secara hati-hati. Dari bumbu khas yang memanjakan lidah hingga resep rahasia
                    yang membuat setiap suapan istimewa, Warmindo MASBRO menawarkan pengalaman kuliner yang tak tertandingi.

                    Nikmati suasana hangat dan pelayanan ramah kami, dan rasakan perbedaan yang membuat setiap kunjungan menjadi momen berharga.
                    Ayo, cicipi kelezatan yang membedakan kami dan jadikan setiap hidangan sebagai kenangan tak terlupakan!</p>
            </div>
        </div>
    </section>

    <?php

    ?>

    <section id="menu" class="menu">
        <h2><span>Our</span> Menu</h2>
        <p>Berikut adalah menu andalan kami di Warmindo MASBRO</p>
        <div class="row">

           <?php foreach ($menuItems as $item): ?>

            <div class="menu-card">
                <?php

                ?>
                <img src="<?= htmlspecialchars($item['image_url']) ?>" alt="<?= htmlspecialchars($row['name']) ?>" class="menu-card-img">
                <h3 class="menu-card-title"><?= htmlspecialchars($item['name']) ?></h3>
                <p class="menu-card-price">IDR <?= number_format($item['price'], 0, ',', '.') ?></p>
            </div>

            <?php endforeach; ?>

        </div>
    </section>

    <section id="contact" class="contact">
        <div class="contact-container">
            <div class="contact-form-wrapper">
                <h2>Ajukan Pertanyaan Melalui <span>Email</span></h2>
                <p class="contact-subtitle">Isi formulir di bawah ini dan kami akan menghubungi Anda sesegera mungkin.</p>

                <form action="">
                    <div class="form-group">
                        <label>Name</label>
                        <div class="input-group">
                            <input type="text" placeholder="Nama Anda" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <div class="input-group">
                            <input type="email" placeholder="email@example.com" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Message</label>
                        <div class="input-group">
                            <textarea placeholder="Silakan berikan detail tentang pertanyaan Anda..." required></textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn-submit">Kirim Pesan</button>
                </form>
            </div>

            <div class="map-wrapper">
                <h3>Outlet Warmindo MASBRO</h3>
                <p class="map-address">
                    Jl. Soekarno Hatta No.9, Jatimulyo, Kec. Lowokwaru, <br>
                    Kota Malang, Jawa Timur 65141
                </p>

                <div class="map-info">
                    <div class="rating">
                        ★ 4.7
                    </div>
                    <a href="#" class="reviews">226 reviews</a>
                </div>
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.502734311529!2d112.61354597403435!3d-7.946885879164739!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78827687d272e7%3A0x789ce9a636cd3aa2!2sPoliteknik%20Negeri%20Malang!5e0!3m2!1sid!2sid!4v1760360797821!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
require 'components/footer.php';

pg_free_result($result);
pg_close($conn);
?>