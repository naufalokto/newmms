<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard - Mifta Motor Sport</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Montserrat:wght@500;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/customer-dashboard.css">
</head>
<body>
    <header class="main-header">
        <div class="header-logo-wrap">
            <img src="/images/logo2.png" alt="Logo" class="header-logo">
        </div>
        <nav class="header-menu">
            <a href="#" class="header-link active">Service</a>
            <a href="#" class="header-link">Product</a>
            <a href="#" class="header-link">Testimonial</a>
            <a href="#" class="header-link">Help</a>
        </nav>
        <div class="header-user" id="headerUser">
            <span class="header-username">Ethan Maxwell</span>
            <img src="https://ui-avatars.com/api/?name=Ethan+Maxwell&background=eeeeee&color=141414&size=128" alt="Profile" class="header-profile">
            <div class="dropdown-menu" id="dropdownMenu" style="display:none;">
                <a href="/" class="dropdown-item">Logout</a>
            </div>
        </div>
    </header>
    <div class="hero-section">
        <img src="/images/Main Picture.jpg" alt="Main Hero" class="hero-image">
        <img src="/images/logo.png" alt="Logo Tengah" class="hero-logo-center">
        <div class="hero-title">Service</div>
        <div class="hero-breadcrumb">
            <span class="breadcrumb-home">Home</span>
            <span class="breadcrumb-separator">&gt;</span>
            <span class="breadcrumb-current">Service</span>
        </div>
    </div>
    <div class="hero-bar">
        <span class="bar-col">Time</span>
        <span class="bar-col">Service</span>
        <span class="bar-col">Location</span>
        <span class="bar-col">Status</span>
        <span class="bar-col">Issue Detail</span>
        <span class="bar-col">Action</span>
    </div>
    <!-- Service List Row Example -->
    <div class="service-list-row" style="display: grid; grid-template-columns: 1.1fr 1.3fr 1.3fr 1fr 2fr 1.2fr; align-items: center; justify-items: center; width: 100%; max-width: 1100px; margin: 0 auto 8px auto; padding: 0 40px; min-height: 55px; border-bottom: 1px solid #eee;">
        <span style="font-family: 'Poppins', sans-serif; color: #141414; font-size: 1rem; font-weight: 500; line-height: 1.5rem;">27/06/2025</span>
        <span style="display: flex; align-items: center; gap: 0.375rem; font-family: 'Poppins', sans-serif; color: #141414; font-size: 1rem; font-weight: 500;">
            <div style="background: #F9F1E7; border-radius: 0.3rem; width: 3rem; height: 3rem; display: flex; align-items: center; justify-content: center; padding: 0.7125rem;">
                <svg width="1.575rem" height="1.575rem" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg" style="flex-shrink:0;">
                  <g clip-path="url(#clip0_252_524)">
                    <path d="M13.2461 9.13623L2.72561 19.669C2.48772 19.9069 2.30315 20.1817 2.1719 20.4935C2.04065 20.8052 1.97502 21.1333 1.97502 21.4778C1.97502 21.8224 2.04065 22.1505 2.1719 22.4622C2.30315 22.7739 2.48772 23.0446 2.72561 23.2743C2.9635 23.504 3.2342 23.6845 3.53772 23.8157C3.84124 23.947 4.16936 24.0167 4.52209 24.0249C4.85842 24.0249 5.18245 23.9593 5.49417 23.828C5.80588 23.6968 6.08479 23.5122 6.33088 23.2743L13 16.6175V18.8446L7.45061 24.394C7.05686 24.7878 6.60979 25.0872 6.1094 25.2923C5.60901 25.4974 5.07991 25.5999 4.52209 25.5999C3.95608 25.5999 3.42698 25.4933 2.93479 25.28C2.4426 25.0667 2.00374 24.7673 1.61819 24.3817C1.23264 23.9962 0.937329 23.5614 0.732251 23.0774C0.527173 22.5935 0.416431 22.0603 0.400024 21.4778C0.400024 20.9118 0.502563 20.3827 0.707642 19.8905C0.91272 19.3983 1.21213 18.9513 1.60588 18.5493L11.5235 8.63174C11.4907 8.44307 11.466 8.25439 11.4496 8.06572C11.4332 7.87705 11.425 7.68428 11.425 7.4874C11.425 6.83935 11.5071 6.21592 11.6711 5.61709C11.8352 5.01826 12.0731 4.45225 12.3848 3.91904C12.6965 3.38584 13.0698 2.90596 13.5045 2.47939C13.9393 2.05283 14.4192 1.68369 14.9442 1.37197C15.4692 1.06025 16.0311 0.822363 16.6299 0.658301C17.2287 0.494238 17.8563 0.408105 18.5125 0.399902C18.9555 0.399902 19.3615 0.432715 19.7307 0.49834C20.0998 0.563965 20.4608 0.662402 20.8135 0.793652C21.1662 0.924902 21.5067 1.08076 21.8348 1.26123C22.1629 1.4417 22.5156 1.63857 22.893 1.85186L18.0449 6.6999L19.3 7.95498L24.1481 3.10693C24.3449 3.45146 24.5295 3.796 24.7018 4.14053C24.874 4.48506 25.0299 4.84189 25.1694 5.21103C25.3088 5.58018 25.4196 5.94932 25.5016 6.31846C25.5836 6.6876 25.6246 7.08135 25.6246 7.49971C25.6246 8.04111 25.559 8.57842 25.4278 9.11162C25.2965 9.64482 25.1037 10.1534 24.8494 10.6374C24.5951 11.1214 24.2998 11.5767 23.9635 12.0032C23.6272 12.4298 23.2375 12.8071 22.7946 13.1353C22.4172 12.9876 22.0317 12.8728 21.6379 12.7907C21.2442 12.7087 20.8422 12.6595 20.4321 12.6431C20.9653 12.4462 21.4533 12.1755 21.8963 11.831C22.3393 11.4864 22.7166 11.0927 23.0283 10.6497C23.3401 10.2067 23.5862 9.71865 23.7666 9.18545C23.9471 8.65225 24.0332 8.09853 24.025 7.52432C24.025 6.90908 23.9266 6.31846 23.7297 5.75244L19.3 10.1698L15.8301 6.6999L20.2475 2.27021C19.6897 2.07334 19.1114 1.9749 18.5125 1.9749C17.7496 1.9749 17.036 2.11846 16.3715 2.40557C15.7071 2.69268 15.1246 3.08643 14.6242 3.58682C14.1239 4.08721 13.7301 4.66963 13.443 5.33408C13.1559 5.99853 13.0082 6.71631 13 7.4874C13 7.76631 13.0246 8.04111 13.0739 8.31182C13.1231 8.58252 13.1805 8.85732 13.2461 9.13623ZM20.0875 14.5749C20.8504 14.5749 21.5641 14.7185 22.2285 15.0056C22.893 15.2927 23.4795 15.6864 23.9881 16.1868C24.4967 16.6872 24.8905 17.2696 25.1694 17.9341C25.4483 18.5985 25.5918 19.3163 25.6 20.0874C25.6 20.8503 25.4565 21.564 25.1694 22.2284C24.8823 22.8929 24.4885 23.4794 23.9881 23.988C23.4877 24.4966 22.9053 24.8903 22.2408 25.1692C21.5764 25.4481 20.8586 25.5917 20.0875 25.5999C19.3246 25.5999 18.611 25.4563 17.9465 25.1692C17.2821 24.8821 16.6955 24.4884 16.1869 23.988C15.6783 23.4876 15.2846 22.9052 15.0057 22.2407C14.7268 21.5763 14.5832 20.8585 14.575 20.0874C14.575 19.3245 14.7186 18.6108 15.0057 17.9464C15.2928 17.2819 15.6865 16.6954 16.1869 16.1868C16.6873 15.6782 17.2698 15.2845 17.9342 15.0056C18.5987 14.7267 19.3164 14.5831 20.0875 14.5749ZM16.15 20.0874C16.15 20.6288 16.2526 21.1374 16.4576 21.6132C16.6627 22.089 16.9416 22.5073 17.2944 22.8683C17.6471 23.2292 18.0655 23.5122 18.5494 23.7173C19.0334 23.9224 19.5461 24.0249 20.0875 24.0249C20.4731 24.0249 20.8504 23.9716 21.2196 23.8649C21.5887 23.7583 21.9332 23.5942 22.2532 23.3728L16.8022 17.9218C16.5889 18.2417 16.4289 18.5862 16.3223 18.9554C16.2156 19.3245 16.1582 19.7019 16.15 20.0874ZM23.3729 22.253C23.5862 21.9331 23.7461 21.5886 23.8528 21.2194C23.9594 20.8503 24.0168 20.4729 24.025 20.0874C24.025 19.546 23.9225 19.0374 23.7174 18.5616C23.5123 18.0858 23.2293 17.6716 22.8684 17.3188C22.5074 16.9661 22.0891 16.6831 21.6133 16.4698C21.1375 16.2565 20.6289 16.1499 20.0875 16.1499C19.702 16.1499 19.3246 16.2032 18.9555 16.3099C18.5864 16.4165 18.2418 16.5806 17.9219 16.802L23.3729 22.253Z" fill="#141414"/>
                  </g>
                  <defs>
                    <clipPath id="clip0_252_524">
                      <rect width="25.2" height="25.2" fill="white" transform="translate(0.400024 0.399902)"/>
                    </clipPath>
                  </defs>
                </svg>
            </div>
            Daily Service
        </span>
        <span style="font-family: 'Poppins', sans-serif; color: #141414; font-size: 1rem; font-weight: 500;">Sawojajar</span>
        <span class="status-badge status-finished">Finished</span>
        <span style="font-family: 'Poppins', sans-serif; color: #141414; font-size: 1rem; font-weight: 500;">-</span>
        <span><button style="font-family: 'Poppins', sans-serif; background: #FE8400; color: #fff; border: none; border-radius: 6px; padding: 6px 18px; font-size: 1rem; font-weight: 500; cursor: pointer;">Detail</button></span>
    </div>
    <script>
        // Toggle dropdown on click user/profile
        const headerUser = document.getElementById('headerUser');
        const dropdownMenu = document.getElementById('dropdownMenu');
        headerUser.addEventListener('click', function(e) {
            e.stopPropagation();
            dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
        });
        // Hide dropdown if click outside
        document.addEventListener('click', function() {
            dropdownMenu.style.display = 'none';
        });
    </script>
    <!-- Spacer to make page longer -->
    <div style="min-height: 300px;"></div>
    <!-- Pre Footer Bar -->
    <div class="pre-footer-bar"></div>
    <!-- Footer -->
    <footer class="footer-bar">
        <div class="footer-content">
            <img src="/images/logo.png" alt="Mifta Motor Sport Logo" class="footer-logo">
            <div class="footer-text">Need help renting a car? Call <span class="footer-phone">+1-333-444-5555</span></div>
            <div class="footer-socials">
                <a href="#" class="footer-social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="footer-social"><i class="fab fa-instagram"></i></a>
                <a href="#" class="footer-social"><i class="fab fa-twitter"></i></a>
                <a href="#" class="footer-social"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </footer>
</body>
</html> 