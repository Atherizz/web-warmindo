<?php 
$fileName = 'review.css';
require 'components/header.php';  

?>
     <div class="site-content">
        <section class="review-section">
            <h2 class="review-title">Apa Kata <span>Pelanggan</span> Kami?</h2>

            <div class="review-container">
                
                <div class="review-summary">
                    <span class="overall-rating">4.8</span>
                    <span class="star-rating">
                        ★★★★★
                    </span>
                    <span class="total-reviews">(Berdasarkan 289 Ulasan)</span>
                </div>
                
                <div class="review-item">
                    <div class="review-header">
                        <img src="img/user.jpg" alt="User Avatar" class="user-avatar">
                        <div class="user-info">
                            <h4 class="user-name">Rangga Prawira</h4>
                            <span class="user-verified">(Verified Order)</span>
                        </div>
                        <span class="review-date">1 week ago</span>
                    </div>
                    
                    <h5 class="review-heading">Rasa Klasik yang Selalu Juara!</h5>
                    <p class="review-text">Indomie Goreng Special-nya selalu mantap, bumbunya pas, dan porsinya mengenyangkan. Pelayanan cepat dan ramah, sangat direkomendasikan untuk nongkrong.</p>
                    
                    <div class="review-rating">
                        <span class="stars">★★★★★</span>
                        <span class="rating-value">5.0</span>
                    </div>
                </div>

                <div class="review-item">
                    <div class="review-header">
                        <img src="img/user.jpg" alt="User Avatar" class="user-avatar">
                        <div class="user-info">
                            <h4 class="user-name">Siti Aisyah</h4>
                            <span class="user-verified">(Verified Order)</span>
                        </div>
                        <span class="review-date">1 month ago</span>
                    </div>
                    
                    <h5 class="review-heading">Kuah Soto Terbaik di Malang!</h5>
                    <p class="review-text">Kuah sotonya kaya rasa, toppingnya lengkap. Cuma butuh waktu sedikit lama saat ramai, tapi sepadan dengan rasanya.</p>
                    
                    <div class="review-rating">
                        <span class="stars">★★★★☆</span>
                        <span class="rating-value">4.5</span>
                    </div>
                </div>

                <div class="review-item">
                    <div class="review-header">
                        <img src="img/user.jpg" alt="User Avatar" class="user-avatar">
                        <div class="user-info">
                            <h4 class="user-name">Bima Sakti</h4>
                            <span class="user-verified">(Verified Order)</span>
                        </div>
                        <span class="review-date">2 days ago</span>
                    </div>
                    
                    <h5 class="review-heading">Tempat Nongkrong Santai</h5>
                    <p class="review-text">Roti Bakar Keju-nya enak, manis dan asinnya balance. Suasana tempatnya cozy, cocok buat nugas sambil ngopi susu.</p>
                    
                    <div class="review-rating">
                        <span class="stars">★★★★★</span>
                        <span class="rating-value">5.0</span>
                    </div>
                </div>
                
                <div class="load-more-container">
                    <button class="load-more-btn">Lihat Ulasan Sebelumnya</button>
                </div>

            </div>
            
        </section>
    </div> 

<?php require 'components/footer.php';  ?>