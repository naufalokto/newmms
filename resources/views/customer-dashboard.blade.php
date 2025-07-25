<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- viewport: checked responsive -->
    <title>Customer Dashboard - Mifta Motor Sport</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Montserrat:wght@500;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/customer-dashboard.css">
</head>
<body>
    <header class="main-header">
        <div class="header-left">
            <a href="/" class="btn-back" style="display:inline-flex;align-items:center;gap:0.5rem;padding:0.5rem 1rem;background:#FE8400;color:#fff;border-radius:0.5rem;text-decoration:none;font-weight:600;font-family:'Poppins',sans-serif;font-size:0.9rem;transition:all 0.2s ease;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 12H5M12 19L5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Back to Home
            </a>
        </div>
        <div class="header-logo-wrap">
            <img src="/images/logo2.png" alt="Logo" class="header-logo">
        </div>
        <nav class="header-menu">
            <a href="/customer/dashboard" class="header-link active">Service</a>
            <a href="/product-customer" class="header-link">Product</a>
            <a href="#" class="header-link" onclick="openTestimoniModal(); return false;">Testimonial</a>
            
        </nav>
        <div class="header-user" id="headerUser">
            <span class="header-username">{{ Auth::user()->nama }}</span>
            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->nama) }}&background=eeeeee&color=141414&size=128" alt="Profile" class="header-profile">
            <div class="dropdown-menu" id="dropdownMenu" style="display:none;">
                <button onclick="performLogout()" class="dropdown-item" style="background:none;border:none;padding:0.7em 1.2em;width:100%;text-align:left;cursor:pointer;color:#333;">Logout</button>
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
    
    @if(session('success'))
        <div class="custom-notification success-notification {{ str_contains(strtolower(session('success')), 'dibatalkan') ? 'cancelled-notification' : '' }}">
            <div class="notification-icon">
                @if(str_contains(strtolower(session('success')), 'dibatalkan'))
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                @else
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 12L11 14L15 10M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                @endif
            </div>
            <div class="notification-content">
                @if(str_contains(strtolower(session('success')), 'dibatalkan'))
                    <h4>Cancelled</h4>
                @else
                    <h4>Booking Successfully Added</h4>
                @endif
            </div>
            <button class="notification-close" onclick="this.parentElement.remove()">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </div>
    @endif

    @if(session('error'))
        <div class="custom-notification error-notification">
            <div class="notification-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 9V13M12 17H12.01M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="notification-content">
                <h4>Error</h4>
                <p>{{ session('error') }}</p>
            </div>
            <button class="notification-close" onclick="this.parentElement.remove()">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </div>
    @endif

    <div class="hero-bar">
        <span class="bar-col">Time</span>
        <span class="bar-col">Service</span>
        <span class="bar-col">Location</span>
        <span class="bar-col">Status</span>
        <span class="bar-col">Issue Detail</span>
        <span class="bar-col">Action</span>
    </div>
    
    @if($services->count() > 0)
        @foreach($services as $service)
            <!-- Desktop View - Original Structure -->
            <div class="service-list-row desktop-view" style="display: grid; grid-template-columns: 1.1fr 1.3fr 1.3fr 1fr 2fr 1.2fr; align-items: center; justify-items: center; width: 100%; max-width: 1100px; margin: 0 auto 1.9rem auto; padding: 0 40px; min-height: 55px; border-bottom: 1px solid #eee;">
                <span style="font-family: 'Poppins', sans-serif; color: #141414; font-size: 1rem; font-weight: 500; line-height: 1.5rem;">{{ \Carbon\Carbon::parse($service->tanggal)->format('d/m/Y') }}</span>
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
                    {{ $service->typeservice->nama_service ?? 'Unknown Service' }}
                </span>
                <span style="font-family: 'Poppins', sans-serif; color: #141414; font-size: 1rem; font-weight: 500;">{{ $service->cabang->nama_cabang ?? 'Unknown Location' }}</span>
                <span class="status-badge status-{{ $service->status === 'pend' ? 'pending' : ($service->status === 'pros' ? 'ongoing' : ($service->status === 'fin' ? 'finished' : ($service->status === 'cancel' ? 'cancelled' : strtolower($service->status)))) }}">
                    @switch($service->status)
                        @case('pend') Pending @break
                        @case('pros') Ongoing @break
                        @case('fin') Finished @break
                        @case('cancel') Cancelled @break
                        @default {{ ucfirst($service->status) }}
                    @endswitch
                </span>
                <span style="font-family: 'Poppins', sans-serif; color: #141414; font-size: 1rem; font-weight: 500;">{{ $service->keluhan ?: '-' }}</span>
                <span>
                    @if($service->status === 'pend')
                        <button type="button" class="cancel-btn-red" onclick="showCancelConfirmation({{ $service->id_service }})">
                            Cancel Appointment
                        </button>
                    @else
                        <button class="cancel-btn-red" disabled style="opacity: 0.5; cursor: not-allowed;">
                            @if($service->status === 'fin') Completed
                            @elseif($service->status === 'cancel') Cancelled
                            @else In Progress @endif
                        </button>
                    @endif
                </span>
            </div>

            <!-- Mobile View - Card Layout -->
            <div class="service-card-mobile">
                <div class="service-card-header">
                    <div class="service-main-info">
                        <div class="service-icon-large">
                            <svg width="24" height="24" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <!-- Same SVG path as above -->
                                <g clip-path="url(#clip0_252_524)">
                                    <path d="M13.2461 9.13623L2.72561 19.669C2.48772 19.9069 2.30315 20.1817 2.1719 20.4935C2.04065 20.8052 1.97502 21.1333 1.97502 21.4778C1.97502 21.8224 2.04065 22.1505 2.1719 22.4622C2.30315 22.7739 2.48772 23.0446 2.72561 23.2743C2.9635 23.504 3.2342 23.6845 3.53772 23.8157C3.84124 23.947 4.16936 24.0167 4.52209 24.0249C4.85842 24.0249 5.18245 23.9593 5.49417 23.828C5.80588 23.6968 6.08479 23.5122 6.33088 23.2743L13 16.6175V18.8446L7.45061 24.394C7.05686 24.7878 6.60979 25.0872 6.1094 25.2923C5.60901 25.4974 5.07991 25.5999 4.52209 25.5999C3.95608 25.5999 3.42698 25.4933 2.93479 25.28C2.4426 25.0667 2.00374 24.7673 1.61819 24.3817C1.23264 23.9962 0.937329 23.5614 0.732251 23.0774C0.527173 22.5935 0.416431 22.0603 0.400024 21.4778C0.400024 20.9118 0.502563 20.3827 0.707642 19.8905C0.91272 19.3983 1.21213 18.9513 1.60588 18.5493L11.5235 8.63174C11.4907 8.44307 11.466 8.25439 11.4496 8.06572C11.4332 7.87705 11.425 7.68428 11.425 7.4874C11.425 6.83935 11.5071 6.21592 11.6711 5.61709C11.8352 5.01826 12.0731 4.45225 12.3848 3.91904C12.6965 3.38584 13.0698 2.90596 13.5045 2.47939C13.9393 2.05283 14.4192 1.68369 14.9442 1.37197C15.4692 1.06025 16.0311 0.822363 16.6299 0.658301C17.2287 0.494238 17.8563 0.408105 18.5125 0.399902C18.9555 0.399902 19.3615 0.432715 19.7307 0.49834C20.0998 0.563965 20.4608 0.662402 20.8135 0.793652C21.1662 0.924902 21.5067 1.08076 21.8348 1.26123C22.1629 1.4417 22.5156 1.63857 22.893 1.85186L18.0449 6.6999L19.3 7.95498L24.1481 3.10693C24.3449 3.45146 24.5295 3.796 24.7018 4.14053C24.874 4.48506 25.0299 4.84189 25.1694 5.21103C25.3088 5.58018 25.4196 5.94932 25.5016 6.31846C25.5836 6.6876 25.6246 7.08135 25.6246 7.49971C25.6246 8.04111 25.559 8.57842 25.4278 9.11162C25.2965 9.64482 25.1037 10.1534 24.8494 10.6374C24.5951 11.1214 24.2998 11.5767 23.9635 12.0032C23.6272 12.4298 23.2375 12.8071 22.7946 13.1353C22.4172 12.9876 22.0317 12.8728 21.6379 12.7907C21.2442 12.7087 20.8422 12.6595 20.4321 12.6431C20.9653 12.4462 21.4533 12.1755 21.8963 11.831C22.3393 11.4864 22.7166 11.0927 23.0283 10.6497C23.3401 10.2067 23.5862 9.71865 23.7666 9.18545C23.9471 8.65225 24.0332 8.09853 24.025 7.52432C24.025 6.90908 23.9266 6.31846 23.7297 5.75244L19.3 10.1698L15.8301 6.6999L20.2475 2.27021C19.6897 2.07334 19.1114 1.9749 18.5125 1.9749C17.7496 1.9749 17.036 2.11846 16.3715 2.40557C15.7071 2.69268 15.1246 3.08643 14.6242 3.58682C14.1239 4.08721 13.7301 4.66963 13.443 5.33408C13.1559 5.99853 13.0082 6.71631 13 7.4874C13 7.76631 13.0246 8.04111 13.0739 8.31182C13.1231 8.58252 13.1805 8.85732 13.2461 9.13623ZM20.0875 14.5749C20.8504 14.5749 21.5641 14.7185 22.2285 15.0056C22.893 15.2927 23.4795 15.6864 23.9881 16.1868C24.4967 16.6872 24.8905 17.2696 25.1694 17.9341C25.4483 18.5985 25.5918 19.3163 25.6 20.0874C25.6 20.8503 25.4565 21.564 25.1694 22.2284C24.8823 22.8929 24.4885 23.4794 23.9881 23.988C23.4877 24.4966 22.9053 24.8903 22.2408 25.1692C21.5764 25.4481 20.8586 25.5917 20.0875 25.5999C19.3246 25.5999 18.611 25.4563 17.9465 25.1692C17.2821 24.8821 16.6955 24.4884 16.1869 23.988C15.6783 23.4876 15.2846 22.9052 15.0057 22.2407C14.7268 21.5763 14.5832 20.8585 14.575 20.0874C14.575 19.3245 14.7186 18.6108 15.0057 17.9464C15.2928 17.2819 15.6865 16.6954 16.1869 16.1868C16.6873 15.6782 17.2698 15.2845 17.9342 15.0056C18.5987 14.7267 19.3164 14.5831 20.0875 14.5749ZM16.15 20.0874C16.15 20.6288 16.2526 21.1374 16.4576 21.6132C16.6627 22.089 16.9416 22.5073 17.2944 22.8683C17.6471 23.2292 18.0655 23.5122 18.5494 23.7173C19.0334 23.9224 19.5461 24.0249 20.0875 24.0249C20.4731 24.0249 20.8504 23.9716 21.2196 23.8649C21.5887 23.7583 21.9332 23.5942 22.2532 23.3728L16.8022 17.9218C16.5889 18.2417 16.4289 18.5862 16.3223 18.9554C16.2156 19.3245 16.1582 19.7019 16.15 20.0874ZM23.3729 22.253C23.5862 21.9331 23.7461 21.5886 23.8528 21.2194C23.9594 20.8503 24.0168 20.4729 24.025 20.0874C24.025 19.546 23.9225 19.0374 23.7174 18.5616C23.5123 18.0858 23.2293 17.6716 22.8684 17.3188C22.5074 16.9661 22.0891 16.6831 21.6133 16.4698C21.1375 16.2565 20.6289 16.1499 20.0875 16.1499C19.702 16.1499 19.3246 16.2032 18.9555 16.3099C18.5864 16.4165 18.2418 16.5806 17.9219 16.802L23.3729 22.253Z" fill="#141414"/>
                                </g>
                            </svg>
                        </div>
                        <div class="service-header-text">
                            <h3 class="service-date">{{ \Carbon\Carbon::parse($service->tanggal)->format('M d, Y') }}</h3>
                            <p class="service-type">{{ $service->typeservice->nama_service ?? 'Service Appointment' }}</p>
                        </div>
                    </div>
                    <span class="status-badge status-{{ $service->status === 'pend' ? 'pending' : ($service->status === 'pros' ? 'ongoing' : ($service->status === 'fin' ? 'finished' : ($service->status === 'cancel' ? 'cancelled' : strtolower($service->status)))) }}">
                        @switch($service->status)
                            @case('pend') Pending @break
                            @case('pros') In Progress @break
                            @case('fin') Completed @break
                            @case('cancel') Cancelled @break
                            @default {{ ucfirst($service->status) }}
                        @endswitch
                    </span>
                </div>
                
                <div class="service-card-content">
                    <div class="service-details-grid">
                        <div class="service-detail-item">
                            <p class="service-detail-label">Location</p>
                            <p class="service-detail-value">{{ $service->cabang->nama_cabang ?? 'Main Branch' }}</p>
                        </div>
                        <div class="service-detail-item">
                            <p class="service-detail-label">Time</p>
                            <p class="service-detail-value">{{ \Carbon\Carbon::parse($service->jadwal)->format('H:i') }}</p>
                        </div>
                    </div>
                    
                    @if($service->keluhan)
                    <div class="service-issue-section">
                        <p class="service-issue-label">
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                            </svg>
                            Issue Description
                        </p>
                        <p class="service-issue-text">{{ $service->keluhan }}</p>
                    </div>
                    @endif
                </div>
                
                @if($service->status === 'pend')
                <div class="service-card-footer">
                    <div class="service-status-section">
                        <p class="service-status-label">Action Available</p>
                    </div>
                    <button type="button" class="cancel-btn-red" onclick="showCancelConfirmation({{ $service->id_service }})">
                        Cancel Appointment
                    </button>
                </div>
                @endif
            </div>
        @endforeach
    @else
        <!-- Desktop Empty State -->
        <div class="service-list-row desktop-view" style="display: grid; grid-template-columns: 1fr; align-items: center; justify-items: center; width: 100%; max-width: 1100px; margin: 0 auto 1.9rem auto; padding: 2rem 40px; min-height: 100px; border-bottom: 1px solid #eee;">
            <span style="font-family: 'Poppins', sans-serif; color: #666; font-size: 1.1rem; font-weight: 500; text-align: center;">
                No service bookings found. <a href="{{ route('service.create') }}" style="color: #FE8400; text-decoration: none;">Book your first service now!</a>
            </span>
        </div>
        
        <!-- Mobile Empty State -->
        <div class="no-services-card">
            <div class="no-services-icon">
                <svg width="32" height="32" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
            </div>
            <h3 class="no-services-title">No Service Appointments</h3>
            <p class="no-services-text">You don't have any service appointments yet. Book your first service to get started!</p>
        </div>
    @endif
    
    <!-- Custom Cancel Confirmation Modal -->
    <div id="cancelConfirmationModal" class="custom-modal" style="display:none; position: fixed; z-index: 10000; left: 0; top: 0; width: 100vw; height: 100vh; overflow: auto; background: rgba(0,0,0,0.5);">
        <div class="custom-modal-content" style="background: #fff; margin: 15% auto; padding: 0; border-radius: 1rem; width: 90%; max-width: 500px; box-shadow: 0 20px 60px rgba(0,0,0,0.3); animation: modalSlideIn 0.3s ease-out;">
            <div class="modal-header" style="padding: 2rem 2rem 1rem 2rem; text-align: center; border-bottom: 1px solid #eee;">
                <div class="modal-icon" style="width: 4rem; height: 4rem; background: linear-gradient(135deg, #ff6b6b, #ee5a52); border-radius: 50%; margin: 0 auto 1rem auto; display: flex; align-items: center; justify-content: center;">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 9V13M12 17H12.01M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h3 style="margin: 0; font-family: 'Poppins', sans-serif; font-size: 1.5rem; font-weight: 600; color: #333;">Cancel Appointment</h3>
                <p style="margin: 0.5rem 0 0 0; font-family: 'Poppins', sans-serif; font-size: 1rem; color: #666; line-height: 1.5;">Are you sure you want to cancel this appointment? This action cannot be undone.</p>
            </div>
            <div class="modal-body" style="padding: 1rem 2rem 2rem 2rem;">
                <div class="modal-actions" style="display: flex; gap: 1rem; justify-content: center;">
                    <button type="button" class="modal-btn-secondary" onclick="closeCancelConfirmation()" style="background: #f8f9fa; color: #6c757d; border: 1px solid #dee2e6; border-radius: 0.5rem; padding: 0.75rem 2rem; font-family: 'Poppins', sans-serif; font-size: 1rem; font-weight: 500; cursor: pointer; transition: all 0.2s ease;">
                        No, Keep It
                    </button>
                    <form id="cancelForm" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="modal-btn-primary" style="background: linear-gradient(135deg, #dc3545, #c82333); color: white; border: none; border-radius: 0.5rem; padding: 0.75rem 2rem; font-family: 'Poppins', sans-serif; font-size: 1rem; font-weight: 500; cursor: pointer; transition: all 0.2s ease;">
                            Yes, Cancel It
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimoni Modal Pop Up -->
    <div id="testimoniModal" class="modal" style="display:none; position: fixed; z-index: 9999; left: 0; top: 0; width: 100vw; height: 100vh; overflow: auto; background: rgba(0,0,0,0.25);">
        <div class="modal-content" style="width:30rem; height:auto; border-radius:1rem; background:#FFF; margin: 6% auto; padding:2.5rem 2.5rem 2rem 2.5rem; box-shadow:0 8px 32px rgba(0,0,0,0.18); position:relative; display:flex; flex-direction:column; align-items:center;">
            <span class="close" onclick="closeTestimoniModal()" style="position:absolute; top:1.2rem; right:1.5rem; font-size:2rem; color:#FE8400; cursor:pointer;">&times;</span>
            <h2 style="font-family:'Montserrat',sans-serif; font-size:2rem; font-weight:700; color:#141414; margin-bottom:0.5rem;">Rate Our Service</h2>
            <div style="width:100%; display:flex; justify-content:center; margin-bottom:1.2rem;">
                <div style="width:60%; height:4px; background:#FE8400; border-radius:2px;"></div>
            </div>
            <div id="serviceSelectContainer" style="width:100%; margin-bottom:1.2rem; display:none;">
                <label for="serviceSelect" style="font-family:'Poppins',sans-serif; color:#141414; font-weight:500; margin-bottom:0.5rem; display:block;">Select Service to Review</label>
                <select id="serviceSelect" style="width:100%; padding:0.7rem; border:1px solid #ddd; border-radius:0.5rem; font-size:1rem; font-family:'Inter',sans-serif;">
                </select>
            </div>
            <div class="star-rating" style="display:flex; gap:0.7rem; font-size:2.5rem; color:#FE8400; margin-bottom:1.5rem; cursor:pointer;">
                <span class="star" data-value="1">&#9734;</span>
                <span class="star" data-value="2">&#9734;</span>
                <span class="star" data-value="3">&#9734;</span>
                <span class="star" data-value="4">&#9734;</span>
                <span class="star" data-value="5">&#9734;</span>
            </div>
            <textarea id="testimoniMessage" placeholder="Your Message" rows="5" style="width:100%; border:1px solid #ddd; border-radius:0.5rem; padding:1rem; font-size:1rem; font-family:'Inter',sans-serif; resize:none;"></textarea>
            <input type="hidden" id="testimoniIdPengguna" value="{{ Auth::user()->id_pengguna }}">
            <input type="hidden" id="testimoniIdService">
            <input type="hidden" id="testimoniMenyoroti" value="false">
            <div id="testimoniMsg" style="margin-top:0.7rem; font-size:1rem;"></div>
            <button class="submit-testimoni-btn" style="margin-top:1.5rem; width:100%; background:#FE8400; color:#fff; border:none; border-radius:0.5rem; padding:0.9rem 0; font-size:1.1rem; font-weight:600; cursor:pointer; transition:background 0.2s;">Submit</button>
        </div>
    </div>

    <!-- Service Completion Notification Modal -->
    <div id="serviceCompletionModal" class="modal" style="display:none; position: fixed; z-index: 10001; left: 0; top: 0; width: 100vw; height: 100vh; overflow: auto; background: rgba(0,0,0,0.6);">
        <div class="modal-content" style="background: #fff; margin: 10% auto; padding: 0; border-radius: 1rem; width: 90%; max-width: 500px; box-shadow: 0 20px 60px rgba(0,0,0,0.3); animation: modalSlideIn 0.3s ease-out; overflow: hidden;">
            <!-- Modal Header -->
            <div class="completion-modal-header" style="background: linear-gradient(135deg, #4CAF50, #45a049); padding: 2rem; text-align: center; color: white;">
                <div class="completion-icon" style="width: 4rem; height: 4rem; background: rgba(255,255,255,0.2); border-radius: 50%; margin: 0 auto 1rem auto; display: flex; align-items: center; justify-content: center;">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 12L11 14L15 10M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h3 style="margin: 0; font-family: 'Poppins', sans-serif; font-size: 1.5rem; font-weight: 600;">Service Completed!</h3>
                <p style="margin: 0.5rem 0 0 0; font-family: 'Poppins', sans-serif; font-size: 1rem; opacity: 0.9;">Your service has been successfully completed</p>
            </div>
            
            <!-- Modal Body -->
            <div class="completion-modal-body" style="padding: 2rem;">
                <div class="service-completion-details" style="text-align: center; margin-bottom: 1.5rem;">
                    <div class="service-info" style="background: #f8f9fa; border-radius: 0.5rem; padding: 1.5rem; margin-bottom: 1rem;">
                        <h4 id="completedServiceName" style="font-family: 'Poppins', sans-serif; font-size: 1.2rem; font-weight: 600; color: #333; margin: 0 0 0.5rem 0;"></h4>
                        <p id="completedServiceLocation" style="font-family: 'Poppins', sans-serif; color: #666; margin: 0 0 0.5rem 0;"></p>
                        <p id="completedServiceTime" style="font-family: 'Poppins', sans-serif; color: #888; font-size: 0.9rem; margin: 0;"></p>
                    </div>
                    
                    <div class="completion-message" style="margin-bottom: 1.5rem;">
                        <p style="font-family: 'Poppins', sans-serif; color: #555; line-height: 1.6; margin: 0;">
                            Thank you for choosing our service! We hope you're satisfied with the quality of our work. 
                            <br><br>
                            <strong>Would you like to leave a review and help others discover our service?</strong>
                        </p>
                    </div>
                </div>
                
                <!-- Action Buttons -->
                <div class="completion-actions" style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                    <button type="button" class="completion-btn-secondary" onclick="closeCompletionModal()" style="background: #f8f9fa; color: #6c757d; border: 1px solid #dee2e6; border-radius: 0.5rem; padding: 0.75rem 1.5rem; font-family: 'Poppins', sans-serif; font-size: 1rem; font-weight: 500; cursor: pointer; transition: all 0.2s ease;">
                        Maybe Later
                    </button>
                    <button type="button" class="completion-btn-primary" onclick="openTestimoniFromCompletion()" style="background: linear-gradient(135deg, #FE8400, #e67600); color: white; border: none; border-radius: 0.5rem; padding: 0.75rem 1.5rem; font-family: 'Poppins', sans-serif; font-size: 1rem; font-weight: 500; cursor: pointer; transition: all 0.2s ease;">
                        Leave a Review
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Service History Modal -->
    <div id="serviceHistoryModal" class="modal" style="display:none; position: fixed; z-index: 10000; left: 0; top: 0; width: 100vw; height: 100vh; overflow: auto; background: rgba(0,0,0,0.5);">
        <div class="modal-content" style="background: #fff; margin: 5% auto; padding: 0; border-radius: 1rem; width: 90%; max-width: 800px; max-height: 80vh; box-shadow: 0 20px 60px rgba(0,0,0,0.3); animation: modalSlideIn 0.3s ease-out; overflow: hidden;">
            <!-- Modal Header -->
            <div class="history-modal-header" style="background: linear-gradient(135deg, #FE8400, #e67600); padding: 2rem; text-align: center; color: white; position: relative;">
                <span class="close-history" onclick="closeServiceHistory()" style="position:absolute; top:1rem; right:1.5rem; font-size:2rem; color:white; cursor:pointer;">&times;</span>
                <h3 style="margin: 0; font-family: 'Poppins', sans-serif; font-size: 1.5rem; font-weight: 600;">Service History</h3>
                <p style="margin: 0.5rem 0 0 0; font-family: 'Poppins', sans-serif; font-size: 1rem; opacity: 0.9;">Your completed services and testimonials</p>
            </div>
            
            <!-- Modal Body -->
            <div class="history-modal-body" style="padding: 0; max-height: 60vh; overflow-y: auto;">
                <!-- Tab Navigation -->
                <div class="history-tabs" style="display: flex; background: #f8f9fa; border-bottom: 1px solid #dee2e6;">
                    <button class="history-tab active" onclick="switchHistoryTab('services')" data-tab="services" style="flex: 1; padding: 1rem; background: none; border: none; font-family: 'Poppins', sans-serif; font-weight: 500; cursor: pointer; transition: all 0.2s ease;">
                        Completed Services
                    </button>
                    <button class="history-tab" onclick="switchHistoryTab('testimonials')" data-tab="testimonials" style="flex: 1; padding: 1rem; background: none; border: none; font-family: 'Poppins', sans-serif; font-weight: 500; cursor: pointer; transition: all 0.2s ease;">
                        My Testimonials
                    </button>
                </div>
                
                <!-- Tab Content -->
                <div id="servicesTabContent" class="tab-content active" style="padding: 1.5rem;">
                    <div id="servicesList" style="display: flex; flex-direction: column; gap: 1rem;">
                        <!-- Services will be loaded here -->
                    </div>
                </div>
                
                <div id="testimonialsTabContent" class="tab-content" style="padding: 1.5rem; display: none;">
                    <div id="testimonialsList" style="display: flex; flex-direction: column; gap: 1rem;">
                        <!-- Testimonials will be loaded here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Cancel -->
    <div id="cancelModal" class="custom-modal" style="display:none; position:fixed; z-index:10000; left:0; top:0; width:100vw; height:100vh; background:rgba(0,0,0,0.4); align-items:center; justify-content:center;">
      <div class="modal-content" style="background:#fff; border-radius:1rem; padding:2rem; max-width:350px; margin:auto; box-shadow:0 8px 32px rgba(0,0,0,0.2); text-align:center;">
        <h3 style="font-family:'Poppins',sans-serif; color:#FE8400; margin-bottom:1rem;">Cancel Appointment</h3>
        <p style="font-family:'Poppins',sans-serif; color:#333; margin-bottom:2rem;">Are you sure you want to cancel this booking?</p>
        <div style="display:flex; gap:1rem; justify-content:center;">
          <button id="cancelNoBtn" style="background:#eee; color:#333; border:none; border-radius:0.5rem; padding:0.6rem 1.5rem; font-family:'Poppins',sans-serif; font-weight:500; cursor:pointer;">No</button>
          <button id="cancelYesBtn" style="background:#FE8400; color:#fff; border:none; border-radius:0.5rem; padding:0.6rem 1.5rem; font-family:'Poppins',sans-serif; font-weight:500; cursor:pointer;">Yes, Cancel</button>
        </div>
      </div>
    </div>
    <!-- Modal Hasil Cancel -->
    <div id="cancelResultModal" class="custom-modal" style="display:none; position:fixed; z-index:10000; left:0; top:0; width:100vw; height:100vh; background:rgba(0,0,0,0.4); align-items:center; justify-content:center;">
      <div class="modal-content" style="background:#fff; border-radius:1rem; padding:2rem; max-width:350px; margin:auto; box-shadow:0 8px 32px rgba(0,0,0,0.2); text-align:center;">
        <h3 style="font-family:'Poppins',sans-serif; color:#FE8400; margin-bottom:1rem;">Cancelled</h3>
        <p id="cancelResultMsg" style="font-family:'Poppins',sans-serif; color:#333; margin-bottom:2rem;"></p>
        <button id="cancelResultOkBtn" style="background:#FE8400; color:#fff; border:none; border-radius:0.5rem; padding:0.6rem 1.5rem; font-family:'Poppins',sans-serif; font-weight:500; cursor:pointer;">OK</button>
      </div>
    </div>

    <!-- Card Current Testimonial -->
    <div id="currentTestimonialCard" style="max-width:600px;margin:2rem auto 0 auto;"></div>

    <!-- Card Pending Testimonial -->
    <div id="pendingTestimonialCards" style="max-width:700px;margin:2rem auto 0 auto;"></div>

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
        // Star rating interaction
        let selectedRating = 0;
        let validServiceId = 1; // Default service ID
        let userHasService = true; // Flag untuk validasi
        
        document.addEventListener('DOMContentLoaded', function() {

            let lastScrollTop = 0;
            const header = document.querySelector('.main-header');
            const scrollThreshold = 10; // Minimum scroll distance to trigger hide/show
        
            window.addEventListener('scroll', function() {
                const currentScroll = window.pageYOffset || document.documentElement.scrollTop;
            
            // Don't hide header when at top of page
            if (currentScroll <= 0) {
                header.classList.remove('header-hidden');
                return;
            }
            
            // Only act if scroll difference is significant enough
            if (Math.abs(currentScroll - lastScrollTop) < scrollThreshold) {
                return;
            }
            
            if (currentScroll > lastScrollTop) {
                // Scrolling down - hide header
                header.classList.add('header-hidden');
            } else {
                // Scrolling up - show header
                header.classList.remove('header-hidden');
            }
            
            lastScrollTop = currentScroll;
        });
            // Get valid service ID when modal opens
           
            
            const stars = document.querySelectorAll('.star-rating .star');
            stars.forEach((star, idx) => {
                star.addEventListener('click', function() {
                    selectedRating = idx + 1;
                    stars.forEach((s, i) => {
                        s.innerHTML = i <= idx ? '\u2605' : '\u2606';
                    });
                });
            });
            // Submit Testimoni
            document.querySelector('.submit-testimoni-btn').addEventListener('click', async function() {
                const id_pengguna = document.getElementById('testimoniIdPengguna').value;
                 const id_service = document.getElementById('testimoniIdService').value || validServiceId;
                const isi_testimoni = document.getElementById('testimoniMessage').value;
                const menyoroti = document.getElementById('testimoniMenyoroti').value;
                const msgDiv = document.getElementById('testimoniMsg');

                 console.log('Submitting testimonial with:', { // Debug log
                    id_pengguna,
                    id_service,
                    isi_testimoni,
                    menyoroti,
                    rating_bintang: selectedRating
                });

                if (!userHasService) {
                    msgDiv.innerHTML = '<span style="color:red;">You must do a service first.</span>';
                    return;
                }
                if (!isi_testimoni.trim()) {
                    msgDiv.innerHTML = '<span style="color:red;">Pesan testimoni tidak boleh kosong.</span>';
                    return;
                }
                if (selectedRating === 0) {
                    msgDiv.innerHTML = '<span style="color:red;">Silakan beri rating bintang.</span>';
                    return;
                }
                try {
                    const response = await fetch('/testimoni', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                           id_pengguna: parseInt(id_pengguna),
                            id_service: parseInt(id_service),
                            isi_testimoni,
                            menyoroti,
                            rating_bintang: selectedRating
                        })
                    });
                    const result = await response.json();
                    console.log('Testimonial response:', result); // Debug log

                    if (response.ok) {
                        msgDiv.innerHTML = '<span style="color:green;">' + result.message + '</span>';
                        document.getElementById('testimoniMessage').value = '';
                        selectedRating = 0;
                        document.querySelectorAll('.star-rating .star').forEach(s => s.innerHTML = '\u2606');
                        setTimeout(() => {
                        closeTestimoniModal();
                    }, 2000);
                    } else {
                        msgDiv.innerHTML = '<span style="color:red;">' + (result.error || result.message) + '</span>';
                    }
                } catch (err) {
                    console.error('Error submitting testimonial:', err);
                    msgDiv.innerHTML = '<span style="color:red;">Terjadi kesalahan saat mengirim testimoni.</span>';
                }
            });
        });
        
         async function getValidService() {
                try {
                    const response = await fetch('/testimoni/valid-service', {
                        method: 'GET',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    });
                    const result = await response.json();
                    const serviceSelectContainer = document.getElementById('serviceSelectContainer');
                    const serviceSelect = document.getElementById('serviceSelect');
                    if (response.ok && result.eligible_services && result.eligible_services.length > 0) {
                        // Jika lebih dari satu, tampilkan dropdown
                        if (result.eligible_services.length > 1) {
                            serviceSelectContainer.style.display = 'block';
                            serviceSelect.innerHTML = '';
                            result.eligible_services.forEach(service => {
                                const opt = document.createElement('option');
                                opt.value = service.id_service;
                                opt.textContent = `${service.tanggal} - ${service.keluhan ? service.keluhan : 'No Issue'} - ${service.finished_at ? new Date(service.finished_at).toLocaleString() : ''}`;
                                serviceSelect.appendChild(opt);
                            });
                            document.getElementById('testimoniIdService').value = serviceSelect.value;
                            serviceSelect.onchange = function() {
                                document.getElementById('testimoniIdService').value = this.value;
                            };
                        } else {
                            // Hanya satu, otomatis pilih
                            serviceSelectContainer.style.display = 'none';
                            document.getElementById('testimoniIdService').value = result.eligible_services[0].id_service;
                        }
                        userHasService = true;
                    } else {
                        serviceSelectContainer.style.display = 'none';
                        userHasService = false;
                    }
                } catch (err) {
                    console.error('Error fetching valid service:', err);
                    userHasService = false;
                }
            }
        // Modal Testimoni
        function openTestimoniModal() {
            document.getElementById('testimoniModal').style.display = 'block';
            // Get valid service when modal opens
            getValidService();
        }
        function closeTestimoniModal() {
            document.getElementById('testimoniModal').style.display = 'none';
        }

        // Custom Cancel Confirmation Modal
        function showCancelConfirmation(serviceId) {
            cancelServiceId = serviceId;
            document.getElementById('cancelModal').style.display = 'flex';
        }

        document.getElementById('cancelNoBtn').onclick = function() {
            document.getElementById('cancelModal').style.display = 'none';
            cancelServiceId = null;
        };

        document.getElementById('cancelYesBtn').onclick = function() {
            if (!cancelServiceId) return;
            document.getElementById('cancelModal').style.display = 'none';
            fetch(`/service/${cancelServiceId}/cancel`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('cancelResultMsg').textContent = data.message || 'Cancelled successfully.';
                document.getElementById('cancelResultModal').style.display = 'flex';
            })
            .catch(error => {
                document.getElementById('cancelResultMsg').textContent = 'Error cancelling booking.';
                document.getElementById('cancelResultModal').style.display = 'flex';
            });
        };

        document.getElementById('cancelResultOkBtn').onclick = function() {
            document.getElementById('cancelResultModal').style.display = 'none';
            location.reload();
        };

        // Logout function
        function performLogout() {
            // Create a form dynamically
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route("logout") }}';
            
            // Add CSRF token
            var csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';
            form.appendChild(csrfToken);
            
            // Submit the form
            document.body.appendChild(form);
            form.submit();
        }

        // Service completion checking functions
        let currentCompletedServiceId = null;

        function checkForCompletedServices() {
            fetch('/check-completed-services', {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.hasCompleted) {
                    showServiceCompletionModal(data.service);
                }
            })
            .catch(error => {
                console.log('Error checking completed services:', error);
            });
        }

        function showServiceCompletionModal(service) {
            currentCompletedServiceId = service.id;
            
            // Update modal content
            document.getElementById('completedServiceName').textContent = service.service_name;
            document.getElementById('completedServiceLocation').textContent = `Location: ${service.location}`;
            document.getElementById('completedServiceTime').textContent = `Completed: ${service.completed_at}`;
            
            // Show modal
            document.getElementById('serviceCompletionModal').style.display = 'block';
            
            // Add escape key listener
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeCompletionModal();
                }
            });
        }

        function closeCompletionModal() {
            if (currentCompletedServiceId) {
                // Mark service as notified
                fetch(`/mark-service-notified/${currentCompletedServiceId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('Service marked as notified');
                    }
                })
                .catch(error => {
                    console.log('Error marking service as notified:', error);
                });
            }
            
            document.getElementById('serviceCompletionModal').style.display = 'none';
            currentCompletedServiceId = null;
        }

        function openTestimoniFromCompletion() {
            // Close completion modal first
            closeCompletionModal();
            
            // Set the service ID for testimonial
            if (currentCompletedServiceId) {
                validServiceId = currentCompletedServiceId;
                document.getElementById('testimoniIdService').value = validServiceId;
            }
            
            // Small delay then open testimonial modal
            setTimeout(() => {
                openTestimoniModal();
            }, 300);
        }

        // Service History Functions
        function openServiceHistory() {
            document.getElementById('serviceHistoryModal').style.display = 'block';
            loadServiceHistory();
        }

        function closeServiceHistory() {
            document.getElementById('serviceHistoryModal').style.display = 'none';
        }

        function switchHistoryTab(tabName) {
            // Remove active class from all tabs
            document.querySelectorAll('.history-tab').forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(content => {
                content.style.display = 'none';
            });
            
            // Activate selected tab
            document.querySelector(`[data-tab="${tabName}"]`).classList.add('active');
            document.getElementById(`${tabName}TabContent`).style.display = 'block';
            
            if (tabName === 'services') {
                loadServiceHistory();
            } else {
                loadTestimonialHistory();
            }
        }

        function loadServiceHistory() {
            fetch('/service-history', {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                const servicesList = document.getElementById('servicesList');
                
                if (data.services.length === 0) {
                    servicesList.innerHTML = '<p style="text-align: center; color: #666; font-family: \'Poppins\', sans-serif;">No completed services found.</p>';
                    return;
                }
                
                servicesList.innerHTML = data.services.map(service => `
                    <div class="service-history-item" style="background: #f8f9fa; border-radius: 0.5rem; padding: 1.5rem; border: 1px solid #e9ecef;">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem;">
                            <div>
                                <h4 style="margin: 0 0 0.5rem 0; font-family: 'Poppins', sans-serif; font-size: 1.1rem; font-weight: 600; color: #333;">${service.service_name}</h4>
                                <p style="margin: 0 0 0.25rem 0; font-family: 'Poppins', sans-serif; color: #666; font-size: 0.9rem;">Location: ${service.location}</p>
                                <p style="margin: 0; font-family: 'Poppins', sans-serif; color: #888; font-size: 0.85rem;">Completed: ${service.completed_at}</p>
                            </div>
                            <div>
                                ${service.has_testimonial 
                                    ? '<span style="background: #28a745; color: white; padding: 0.25rem 0.75rem; border-radius: 1rem; font-size: 0.8rem; font-family: \'Poppins\', sans-serif;">Reviewed</span>'
                                    : `<button onclick="openTestimoniForService(${service.id})" style="background: #FE8400; color: white; border: none; padding: 0.5rem 1rem; border-radius: 0.25rem; font-family: 'Poppins', sans-serif; font-size: 0.9rem; cursor: pointer;">Leave Review</button>`
                                }
                            </div>
                        </div>
                    </div>
                `).join('');
            })
            .catch(error => {
                console.log('Error loading service history:', error);
            });
        }

        function loadTestimonialHistory() {
            fetch('/testimonial-history', {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                const testimonialsList = document.getElementById('testimonialsList');
                
                if (data.testimonials.length === 0) {
                    testimonialsList.innerHTML = '<p style="text-align: center; color: #666; font-family: \'Poppins\', sans-serif;">No testimonials found.</p>';
                    return;
                }
                
                testimonialsList.innerHTML = data.testimonials.map(testimonial => `
                    <div class="testimonial-history-item" style="background: #f8f9fa; border-radius: 0.5rem; padding: 1.5rem; border: 1px solid #e9ecef;">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem;">
                            <div style="flex: 1;">
                                <h4 style="margin: 0 0 0.5rem 0; font-family: 'Poppins', sans-serif; font-size: 1.1rem; font-weight: 600; color: #333;">${testimonial.service_name}</h4>
                                <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem;">
                                    <div style="display: flex; gap: 0.1rem; color: #FE8400;">
                                        ${'★'.repeat(testimonial.rating)}${'☆'.repeat(5-testimonial.rating)}
                                    </div>
                                    <span style="font-family: 'Poppins', sans-serif; color: #666; font-size: 0.9rem;">${testimonial.rating}/5</span>
                                </div>
                                <p style="margin: 0 0 0.5rem 0; font-family: 'Poppins', sans-serif; color: #555; font-size: 0.95rem; line-height: 1.4;">"${testimonial.message}"</p>
                                <p style="margin: 0; font-family: 'Poppins', sans-serif; color: #888; font-size: 0.85rem;">Submitted: ${testimonial.created_at}</p>
                            </div>
                            ${testimonial.highlighted 
                                ? '<span style="background: #FE8400; color: white; padding: 0.25rem 0.75rem; border-radius: 1rem; font-size: 0.8rem; font-family: \'Poppins\', sans-serif;">Featured</span>'
                                : ''
                            }
                        </div>
                    </div>
                `).join('');
            })
            .catch(error => {
                console.log('Error loading testimonial history:', error);
            });
        }

        function openTestimoniForService(serviceId) {
                        // Close history modal if open
            if (document.getElementById('serviceHistoryModal').style.display === 'block') {
                closeServiceHistory();
            }
            
            // Set the service ID for testimonial
            validServiceId = serviceId;
            document.getElementById('testimoniIdService').value = serviceId;
            userHasService = true;
            
            console.log('Opening testimonial for service ID:', serviceId); // Debug log
            
            // Open testimonial modal
            setTimeout(() => {
                openTestimoniModal();
            }, 300);
        }

        // Render current testimonial card
        function renderCurrentTestimonialCard() {
            fetch('/testimonial-history', {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                const cardDiv = document.getElementById('currentTestimonialCard');
                if (!data.testimonials || data.testimonials.length === 0) {
                    cardDiv.innerHTML = '';
                    return;
                }
                // Ambil testimoni terbaru (urut tanggal)
                const testimonial = data.testimonials[0];
                cardDiv.innerHTML = `
                    <div style="background:#fff; border-radius:1rem; box-shadow:0 4px 16px rgba(0,0,0,0.08); padding:2rem; margin-bottom:2rem; border:1px solid #eee;">
                        <div style="display:flex;align-items:center;gap:1rem;margin-bottom:1rem;">
                            <div style="width:56px;height:56px;border-radius:50%;background:linear-gradient(135deg,#FE8400,#ff9900);display:flex;align-items:center;justify-content:center;font-size:1.7rem;color:white;font-weight:bold;">
                                ${testimonial.service_name ? testimonial.service_name.charAt(0).toUpperCase() : 'S'}
                            </div>
                            <div>
                                <div style="font-family:'Montserrat',sans-serif;font-weight:700;font-size:1.1rem;color:#141414;">${testimonial.service_name || 'Service'}</div>
                                <div style="font-family:'Poppins',sans-serif;font-size:0.98rem;color:#888;">${testimonial.location || ''}</div>
                                <div style="font-family:'Poppins',sans-serif;font-size:0.95rem;color:#aaa;">${testimonial.created_at}</div>
                            </div>
                        </div>
                        <div style="font-family:'Poppins',sans-serif;font-size:1.05rem;color:#444;margin-bottom:1rem;">"${testimonial.message}"</div>
                        <div style="display:flex;align-items:center;gap:0.3rem;">
                            ${'★'.repeat(testimonial.rating)}${'☆'.repeat(5-testimonial.rating)}
                            <span style="font-family:'Poppins',sans-serif;font-size:0.95rem;color:#FE8400;margin-left:0.5rem;">${testimonial.rating}/5</span>
                        </div>
                    </div>
                `;
            })
            .catch(error => {
                document.getElementById('currentTestimonialCard').innerHTML = '';
            });
        }
        // Panggil saat halaman dimuat
        renderCurrentTestimonialCard();

        // Render pending testimonial cards
        function renderPendingTestimonialCards() {
            fetch('/testimoni/valid-service', {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                const cardsDiv = document.getElementById('pendingTestimonialCards');
                if (!data.eligible_services || data.eligible_services.length === 0) {
                    cardsDiv.innerHTML = `<div style='text-align:center;color:#888;font-family:Poppins,sans-serif;font-size:1.05rem;margin:2rem 0;'>No Testimonial needs to be filled.</div>`;
                    return;
                }
                cardsDiv.innerHTML = data.eligible_services.map(service => `
                    <div style="background:#fff; border-radius:1rem; box-shadow:0 4px 16px rgba(0,0,0,0.08); padding:2rem; margin-bottom:1.5rem; border:1px solid #eee; display:flex; align-items:center; gap:1.5rem; flex-wrap:wrap;">
                        <div style="display:flex;align-items:center;gap:1rem;flex:1;min-width:200px;">
                            <div style="width:56px;height:56px;border-radius:50%;background:linear-gradient(135deg,#FE8400,#ff9900);display:flex;align-items:center;justify-content:center;font-size:1.7rem;color:white;font-weight:bold;">
                                ${service.service_name ? service.service_name.charAt(0).toUpperCase() : 'S'}
                            </div>
                            <div>
                                <div style="font-family:'Montserrat',sans-serif;font-weight:700;font-size:1.1rem;color:#141414;">${service.service_name || 'Service'}</div>
                                <div style="font-family:'Poppins',sans-serif;font-size:0.98rem;color:#888;">${service.location || ''}</div>
                                <div style="font-family:'Poppins',sans-serif;font-size:0.95rem;color:#aaa;">${service.finished_at ? new Date(service.finished_at).toLocaleString() : ''}</div>
                                <div style="font-family:'Poppins',sans-serif;font-size:0.95rem;color:#888;">Keluhan: ${service.keluhan ? service.keluhan : '-'}</div>
                            </div>
                        </div>
                        <button onclick="openTestimoniForService(${service.id_service})" style="background:#FE8400;color:#fff;border:none;border-radius:0.5rem;padding:0.7rem 1.5rem;font-family:'Poppins',sans-serif;font-weight:600;font-size:1rem;cursor:pointer;transition:background 0.2s;">Beri Testimoni</button>
                    </div>
                `).join('');
            })
            .catch(error => {
                document.getElementById('pendingTestimonialCards').innerHTML = '<div style="text-align:center;color:#888;font-family:Poppins,sans-serif;font-size:1.05rem;margin:2rem 0;">Gagal memuat data testimoni.</div>';
            });
        }
        // Panggil saat halaman dimuat
        renderPendingTestimonialCards();
    </script>
    <!-- Spacer to make page longer -->
    <div style="min-height: 300px;"></div>
    <!-- Pre Footer Bar -->
    <div class="pre-footer-bar" style="display: flex; align-items: center; justify-content: center; background: #141414; min-height: 4.94rem; width: 100%;">
        <span style="color: #fff; font-family: 'Poppins', sans-serif; font-size: 1.125rem; font-weight: 400; text-align: center;">
            Need help? Please call 
            <span style="color: #FE8400; font-weight: 600;">+62 857-0815-0434</span>
        </span>
    </div>
    <!-- Footer -->
    <footer class="footer-bar">
        <div class="footer-content">
            <img src="/images/logo.png" alt="Mifta Motor Sport Logo" class="footer-logo">
           <div class="footer-social" style="margin-left: auto; display: flex; gap: 1rem; align-items: center; padding-right: 2rem;">
            <a href="https://www.instagram.com/motorsport_mifta_indonesia?igsh=MXQ3dnM2ODV3azdjcQ==" target="_blank" class="instagram-link">
                <div class="instagram-content">
                    <svg width="28" height="28" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_252_574)">
                            <path d="M21.7842 0.5C25.5808 0.5 27.4789 0.500416 28.9238 1.25098C30.1414 1.88348 31.1341 2.87613 31.7666 4.09375C32.4996 5.53867 32.5176 7.43682 32.5176 11.2334V21.7666C32.5176 25.5632 32.5172 27.4613 31.7666 28.9062C31.1341 30.1239 30.1239 31.1165 28.9062 31.749C27.4613 32.4996 25.5632 32.5 21.7842 32.5H11.251C7.4544 32.5 5.55625 32.4996 4.09375 31.749C2.87613 31.1165 1.88348 30.1239 1.25098 28.9062C0.500416 27.4613 0.5 25.5632 0.5 21.7666V11.2334C0.5 7.43682 0.500415 5.53867 1.25098 4.09375C1.88348 2.87613 2.87613 1.88348 4.09375 1.25098C5.53867 0.500415 7.43682 0.5 11.251 0.5H21.7842ZM16.498 4.86426C13.3399 4.86426 12.943 4.87712 11.7021 4.93359C10.4635 4.99033 9.61775 5.18687 8.87793 5.47461C8.11282 5.77177 7.464 6.1696 6.81738 6.81641C6.17013 7.46319 5.77181 8.11284 5.47363 8.87793C5.18524 9.61796 4.98934 10.4641 4.93359 11.7021C4.87809 12.9431 4.86328 13.3401 4.86328 16.5C4.86328 19.6602 4.87736 20.0557 4.93359 21.2969C4.99056 22.5357 5.1871 23.3812 5.47461 24.1211C5.77205 24.8864 6.16941 25.5358 6.81641 26.1826C7.46289 26.8298 8.11218 27.2282 8.87695 27.5254C9.61723 27.8131 10.4628 28.0097 11.7012 28.0664C12.9423 28.1229 13.3391 28.1367 16.499 28.1367C19.6592 28.1367 20.0548 28.1229 21.2959 28.0664C22.5345 28.0097 23.3808 27.8131 24.1211 27.5254C24.8862 27.2282 25.5351 26.8299 26.1816 26.1826C26.8288 25.5359 27.2263 24.8861 27.5244 24.1211C27.8104 23.3811 28.0063 22.535 28.0645 21.2969C28.1202 20.0559 28.1348 19.66 28.1348 16.5C28.1348 13.3399 28.1202 12.9433 28.0645 11.7021C28.0063 10.4635 27.8104 9.61777 27.5244 8.87793C27.2263 8.11267 26.8288 7.46313 26.1816 6.81641C25.5345 6.16924 24.887 5.77156 24.1211 5.47461C23.3793 5.18685 22.5327 4.99032 21.2939 4.93359C20.0531 4.87712 19.6577 4.86426 16.498 4.86426ZM15.4561 6.96094C15.7658 6.96045 16.1118 6.96094 16.5 6.96094C19.6068 6.96094 19.9753 6.97159 21.2021 7.02734C22.3365 7.07922 22.9521 7.26945 23.3623 7.42871C23.9053 7.63962 24.2932 7.89156 24.7002 8.29883C25.1072 8.70595 25.359 9.09392 25.5703 9.63672C25.7296 10.0464 25.92 10.6623 25.9717 11.7969C26.0274 13.0235 26.0391 13.392 26.0391 16.4971C26.0391 19.6025 26.0274 19.9716 25.9717 21.1982C25.9198 22.3327 25.7296 22.9487 25.5703 23.3584C25.3595 23.901 25.1071 24.2876 24.7002 24.6943C24.2929 25.1016 23.9056 25.3545 23.3623 25.5654C22.9526 25.7254 22.3363 25.914 21.2021 25.9658C19.9755 26.0216 19.6068 26.0342 16.5 26.0342C13.3936 26.0342 13.025 26.0216 11.7988 25.9658C10.6643 25.9135 10.0481 25.7237 9.6377 25.5645C9.09476 25.3536 8.70703 25.1016 8.2998 24.6943C7.89261 24.2871 7.64008 23.9006 7.42871 23.3574C7.26945 22.9477 7.07997 22.3317 7.02832 21.1973C6.97256 19.9706 6.96094 19.6015 6.96094 16.4941C6.96094 13.3399 6.97257 13.0206 7.02832 11.7939C7.08019 10.6597 7.26947 10.044 7.42871 9.63379C7.63961 9.09076 7.89254 8.70219 8.2998 8.29492C8.70693 7.88786 9.09487 7.63614 9.6377 7.4248C10.0479 7.2648 10.6643 7.07556 11.7988 7.02344C12.8718 6.97497 13.288 6.96043 15.4561 6.95801V6.96094ZM16.5 10.5244C13.2001 10.5246 10.5245 13.2 10.5244 16.5C10.5244 19.8 13.2001 22.4745 16.5 22.4746C19.8 22.4746 22.4746 19.8001 22.4746 16.5C22.4745 13.1999 19.8 10.5244 16.5 10.5244ZM16.5 12.6211C18.642 12.6211 20.3788 14.3578 20.3789 16.5C20.3789 18.6421 18.642 20.3789 16.5 20.3789C14.3579 20.3788 12.6221 18.642 12.6221 16.5C12.6221 14.3578 14.3579 12.6212 16.5 12.6211ZM22.5684 8.90039C21.8647 8.97204 21.3154 9.56625 21.3154 10.2891C21.3156 11.0598 21.9411 11.6855 22.7119 11.6855C23.4825 11.6853 24.1072 11.0597 24.1074 10.2891C24.1074 9.5183 23.4826 8.89282 22.7119 8.89258L22.5684 8.90039Z" fill="currentColor"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_252_574">
                                <rect width="32" height="32" fill="white" transform="translate(0.5 0.5)"/>
                            </clipPath>
                        </defs>
                    </svg>
                    <span class="instagram-text">Follow Us on Instagram</span>
                </div>
            </a>
        </div>
    </footer>
</body>
</html>