// Alert Functions
function closeAlert() {
    const alert = document.getElementById('alertMessage');
    if (alert) {
        const bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
        alert.classList.add('hiding');
        setTimeout(() => {
            bsAlert.close();
        }, 400);
    }
}

// Auto close alert after 5 seconds
document.addEventListener('DOMContentLoaded', function() {
    const alert = document.getElementById('alertMessage');
    if (alert) {
        setTimeout(() => {
            closeAlert();
        }, 5000);
    }
    
    // Smooth scroll untuk links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href !== '#' && href !== '') {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    const navbarHeight = document.querySelector('.navbar').offsetHeight;
                    const targetPosition = target.offsetTop - navbarHeight;
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });
});

