<?php 
$fileName = 'cart.css';
require 'components/header.php';  

?>
     <div class="site-content">
        <section class="menu-grid-section">
            <h2 class="grid-title"><span>Menu</span> Spesial</h2>

            <div class="menu-grid-container">
                
                <div class="menu-item-card">
                    <div class="tag popular">Popular</div>
                    <img src="img/indomiefix.png" alt="Indomie Goreng" class="item-img">
                    <div class="item-content">
                        <h3 class="item-name">Indomie Goreng Special</h3>
                        <p class="item-description">Indomie Goreng dengan tambahan telur mata sapi, sayuran, dan bakso.</p>
                        <div class="item-footer">
                            <span class="item-price">IDR 15K</span>
                            <button class="add-to-cart-btn">
                                <i data-feather="plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="menu-item-card">
                    <img src="img/indomiefix.png" alt="Indomie Kuah Kari" class="item-img">
                    <div class="item-content">
                        <h3 class="item-name">Indomie Kuah Kari Ayam</h3>
                        <p class="item-description">Kuah kari kental, ayam suwir, dan perasan jeruk limau segar.</p>
                        <div class="item-footer">
                            <span class="item-price">IDR 14K</span>
                            <button class="add-to-cart-btn">
                                <i data-feather="plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="menu-item-card">
                    <div class="tag discount">Diskon 10%</div>
                    <img src="img/indomiefix.png" alt="Roti Bakar Keju" class="item-img">
                    <div class="item-content">
                        <h3 class="item-name">Roti Bakar Keju Meleleh</h3>
                        <p class="item-description">Roti bakar lembut dengan isian keju cheddar dan mozzarella.</p>
                        <div class="item-footer">
                            <span class="item-price new-price">IDR 11.7K</span>
                            <span class="old-price">IDR 13K</span>
                            <button class="add-to-cart-btn">
                                <i data-feather="plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="menu-item-card">
                    <img src="img/indomiefix.png" alt="Nasi Goreng" class="item-img">
                    <div class="item-content">
                        <h3 class="item-name">Nasi Goreng Kampung</h3>
                        <p class="item-description">Nasi goreng pedas dengan ayam, telur orak-arik, dan kerupuk udang.</p>
                        <div class="item-footer">
                            <span class="item-price">IDR 18K</span>
                            <button class="add-to-cart-btn">
                                <i data-feather="plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="menu-item-card">
                    <div class="tag popular">Best Seller</div>
                    <img src="img/indomiefix.png" alt="Es Teh Manis" class="item-img">
                    <div class="item-content">
                        <h3 class="item-name">Es Teh Manis Jumbo</h3>
                        <p class="item-description">Minuman wajib, teh segar dengan es batu melimpah.</p>
                        <div class="item-footer">
                            <span class="item-price">IDR 6K</span>
                            <button class="add-to-cart-btn">
                                <i data-feather="plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="menu-item-card">
                    <img src="img/indomiefix.png" alt="Kopi Susu" class="item-img">
                    <div class="item-content">
                        <h3 class="item-name">Kopi Susu Hangat</h3>
                        <p class="item-description">Perpaduan kopi hitam dan susu kental yang pas.</p>
                        <div class="item-footer">
                            <span class="item-price">IDR 12K</span>
                            <button class="add-to-cart-btn">
                                <i data-feather="plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
        </section>
    </div> 
<?php 
$jsName = 'cart.js';
require 'components/footer.php';  ?>