<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mifta Motor Sport</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Montserrat:wght@500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <style>
        .appointment-title-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 6rem;
        }
        .appointment-title {
            margin-bottom: 2px;
        }
        .appointment-title-underline-svg {
            margin-top: 0;
        }
        .modal-popup {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0,0,0,0.18);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: fadeIn 0.2s;
        }
        .modal-popup-content {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 8px 32px rgba(0,0,0,0.18);
            padding: 2.2rem 2.5rem 1.7rem 2.5rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-width: 320px;
            max-width: 90vw;
            position: relative;
            border: 2px solid #FE8400;
        }
        .modal-popup-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.35rem;
            font-weight: 700;
            color: #141414;
            margin-bottom: 0.5rem;
            text-align: center;
        }
        .modal-popup-close {
            position: absolute;
            top: 1.1rem;
            right: 1.5rem;
            font-size: 2rem;
            color: #FE8400;
            cursor: pointer;
            font-weight: bold;
            background: none;
            border: none;
            outline: none;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .wa-btn {
            display: inline-block;
            background: #25D366;
            color: #fff;
            font-weight: 600;
            padding: 0.9rem 2rem;
            border-radius: 0.5rem;
            font-size: 1.1rem;
            text-decoration: none;
            transition: background 0.2s;
        }
        .btn-modern:hover {
            background: #ff9900;
        }
        @media (max-width: 900px) {
            .appointment-row {
                flex-direction: column;
                gap: 1rem;
            }
            .btn-modern {
                width: 100%;
                margin-left: 0;
                margin-top: 1rem;
            }
        }
    </style>
    </head>
    <body>
    @if(session('success'))
        <div style="position: fixed; top: 20px; right: 20px; background: #10B981; color: white; padding: 1rem; border-radius: 8px; z-index: 10000; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
            {{ session('success') }}
            <button onclick="this.parentElement.remove()" style="background: none; border: none; color: white; margin-left: 10px; cursor: pointer;">×</button>
        </div>
    @endif
    <header>
        <div class="header-left">
            <div class="logo">
                <img src="/images/logo.png" alt="Mifta Motor Sport Logo">
            </div>
        </div>
        <div class="header-right">
            <nav>
                <a href="#services">Service</a>
                <a href="#product">Product</a>
                <a href="#testimonial">Testimonial</a>
                <a href="/customer/dashboard">Customer Page</a>
            </nav>
            @auth
            <div class="account-dropdown" style="position:relative;">
                <button class="btn-login" style="background:#FE8400;color:#fff;border:none;padding:0.5em 1.2em;border-radius:0.4em;cursor:pointer;">
                    {{ Auth::user()->nama ?? Auth::user()->username }} &#x25BC;
                </button>
                <div class="dropdown-content" style="display:none;position:absolute;right:0;top:2.8em;background:#fff;border:1px solid #eee;border-radius:0.4em;box-shadow:0 2px 8px rgba(0,0,0,0.08);min-width:120px;z-index:9999;margin-top:0.5em;">
                    <button onclick="performLogout()" style="background:none;border:none;padding:0.7em 1.2em;width:100%;text-align:left;cursor:pointer;color:#333;">Logout</button>
                </div>
            </div>
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                var btn = document.querySelector('.account-dropdown .btn-login');
                var dropdown = document.querySelector('.account-dropdown .dropdown-content');
                if(btn && dropdown) {
                    btn.addEventListener('click', function(e) {
                        e.preventDefault();
                        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
                    });
                    document.addEventListener('click', function(e) {
                        if (!btn.contains(e.target) && !dropdown.contains(e.target)) {
                            dropdown.style.display = 'none';
                        }
                    });
                }
            });

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
            </script>
            @else
            <div style="display: flex; gap: 0.5rem;">
                <a href="/login" class="btn-login">Login</a>
                <a href="/register" class="btn-register">Register</a>
            </div>
            @endauth
        </div>
    </header>
    <div class="hero">
        <div class="hero-left">
            <div class="hero-title">
                <h1>Professional Care and Sales for Every Ride</h1>
            </div>
            <div class="hero-desc">
                <h2>Mifta Motor Sport offers everything your ride needs, in one place.</h2>
            </div>
            <button class="hero-btn">Book Now</button>
        </div>
        <div class="hero-right">    
         <img src="/images/tampilan1.png" alt="Hero Image">
        </div>
       
    </div>
    <div class="section about" id="about">
        <div class="about-content">
            <h2 class="section-title" style="text-align:center; ">Get to Know Us</h2>
            <div class="section-divider"></div> 
            <div class="about-text">
                <div class="about-image">
                    <img src="{{asset('images/tampilan2.png')}}" alt="About Us Image">
                </div>
                <div class="about-description">
                    <p>Mifta Motor Sport is your one-stop destination for premium motorbike service and trusted sales. We combine expert care with a curated selection of high-performance motorcycles to keep every ride smooth, powerful, and reliable.
                       
                    </p>
                     <a class="link" href="#services">Explore Our Services</a>
                </div>  
            </div>
        </div>
    </div>
    <div class="services-section" id="services">
        <h2 class="services-title">Our Premium Services</h2>
        <div class="section-divider"></div>
        <div class="services" style="display: flex; gap: 1.5rem; justify-content: center; align-items: flex-start;">
            <div class="service-card" style="background: #FFF; border-radius: 0.25rem; box-shadow: 0px 5px 20px 0px rgba(0,0,0,0.07); width: 17.3125rem; height: 20.125rem; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 1.125rem; text-align: center;">
                <img src="/images/fluent-mdl2_repair.jpg" alt="Expert Bike Care" style="width:56px; height:56px; object-fit:contain; margin-bottom:0.5rem;" />
                <h3 style="font-size: 1.12rem; font-weight: 600; margin-bottom: 0.25rem;">Expert Bike Care</h3>
                <p style="font-size: 0.97rem; color: #575757;">Pro maintenance for peak performance.</p>
            </div>
            <div class="service-card" style="background: #FFF; border-radius: 0.25rem; box-shadow: 0px 5px 20px 0px rgba(0,0,0,0.07); width: 17.3125rem; height: 20.125rem; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 1.125rem; text-align: center;">
                <img src="/images/mdi_motor-outline.png" alt="Quality Parts" style="width:56px; height:56px; object-fit:contain; margin-bottom:0.5rem;" />
                <h3 style="font-size: 1.12rem; font-weight: 600; margin-bottom: 0.25rem;">Quality Parts</h3>
                <p style="font-size: 0.97rem; color: #575757;">Reliable components for lasting performance.</p>
            </div>
            <div class="service-card" style="background: #FFF; border-radius: 0.25rem; box-shadow: 0px 5px 20px 0px rgba(0,0,0,0.07); width: 17.3125rem; height: 20.125rem; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 1.125rem; text-align: center;">
                <img src="/images/fluent-mdl2_repair.jpg" alt="Showroom" style="width:56px; height:56px; object-fit:contain; margin-bottom:0.5rem;" />
                <h3 style="font-size: 1.12rem; font-weight: 600; margin-bottom: 0.25rem;">Service</h3>
                <p style="font-size: 0.97rem; color: #575757;">Service premium bikes and other motorbikes for ready to ride.</p>
            </div>
        </div>
    </div>
    <!-- Book Your Appointment Title and Underline OUTSIDE the peach background -->
    <div class="appointment-title-container">
        <h2 class="appointment-title">Book Your Appointment</h2>
        <div class="section-divider"></div>
    </div>
    <div class="appointment-section" id="appointment" style="background: #FFE4C6;">
        <form class="appointment-form">
            <div class="input-group">
                <input type="date" placeholder="Service Date" required>
            </div>
            <div class="input-group">
                <select required>
                    <option value="">Service Location</option>
                    <option>Pakis</option>
                    <option>Sulfat</option>
                </select>
                <img src="/images/chevron.png" alt="Dropdown Icon" class="dropdown-icon">
            </div>
            <div class="input-group">
                <select required>
                    <option value="">Service Type</option>
                    <option>Service Daily</option>
                    <option>Other</option>
                </select>
                <img src="/images/chevron.png" alt="Dropdown Icon" class="dropdown-icon">
            </div>
            <div class="appointment-row">
                <div class="appointment-input">
                    <span class="icon">⏰</span>
                    <select id="jadwal" name="jadwal" required>
                        <option value="">Service Time</option>
                    </select>
                </div>
                <div class="appointment-input">
                    <span class="icon">ℹ️</span>
                    <input type="text" id="keluhan" name="keluhan" placeholder="Describe Your Issue">
                </div>
                <button type="submit" class="btn-modern"
                @guest disabled style="background:#ccc;cursor:not-allowed;" @endguest>
                @guest
                    You must login/signup
                @else
                    Book Now
                @endguest
                </button>
            </div>
            @auth
                <button class="btn" type="submit">Book Now</button>
            @else
                <a href="/login" class="btn" style="display:inline-block; text-align:center;">You must login/signup</a>
            @endauth
        </form>
    </div>
    <div class="collection-section" id="product">
        <div style="display: flex; flex-direction: column; align-items: center; margin-bottom: 2.5rem;">
            <h2 class="collection-title-custom">Our Exclusive Collection</h2>
            <span class="collection-underline">
                <svg width="100%" height="2" viewBox="0 0 352 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="352" height="2" rx="1" fill="#FE8400"/>
                </svg>
            </span>
        </div>
        <div class="collections">
            <div class="collection-card">
                <div class="info">
                    <h4>Motul Oil</h4>
                    <p>Sparepart</p>
                    <div class="price">Rp350.000</div>
                    <button class="btn">Buy Now</button>
                </div>
            </div>
            <div class="collection-card">
                <div class="info">
                    <h4>Ohlins Suspension Shocks</h4>
                    <p>Motor Part</p>
                    <div class="price">Rp28.900.000</div>
                    <button class="btn">Buy Now</button>
                </div>
            </div>
            <div class="collection-card">
                <div class="info">
                    <h4>Kawasaki H2R</h4>
                    <p>Motor Sport</p>
                    <div class="price">Rp750.000.000</div>
                    <button class="btn">Buy Now</button>
                </div>
            </div>
        </div>
        <button class="see-more-btn">See More</button>
    </div>
    <!-- Testimonial Section sesuai Figma -->
    <div class="testimonial-section" id="testimonial">
        <div style="display: flex; flex-direction: column; align-items: center; margin-bottom: 2.5rem;">
            <h2 class="testimonial-title-custom">What Our Clients Say?</h2>
            <span class="testimonial-underline">
                <svg width="100%" height="2" viewBox="0 0 352 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="352" height="2" rx="1" fill="#FE8400"/>
                </svg>
            </span>
        </div>
        <div class="testimonial-cards-row">
            <button class="testimonial-nav-btn">&#8592;</button>
            <div style="display: flex; gap: 2rem;">
                <div class="testimonial-card-custom">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Sophia Lane" class="testimonial-avatar">
                    <h4 style="font-family: 'Montserrat', sans-serif; font-size: 1.1rem; font-weight: 600; color: #141414; margin-bottom: 0.5rem;">Sophia Lane</h4>
                    <p style="font-size: 1rem; color: #575757; text-align: center;">The service at Mifta Motor Sport was quick and professional. My bike feels smoother than ever.</p>
                </div>
                <div class="testimonial-card-custom">
                    <img src="https://randomuser.me/api/portraits/men/46.jpg" alt="Dylan Scott" class="testimonial-avatar">
                    <h4 style="font-family: 'Montserrat', sans-serif; font-size: 1.1rem; font-weight: 600; color: #141414; margin-bottom: 0.5rem;">Dylan Scott</h4>
                    <p style="font-size: 1rem; color: #575757; text-align: center;">I found my dream bike at Mifta Motor Sport. The staff were helpful, and the whole process was easy.</p>
                </div>
            </div>
            <button class="testimonial-nav-btn">&#8594;</button>
        </div>
    </div>
    <div class="stats-section">
        <div class="stat">
            <div class="number">450+</div>
            <div class="label">Bikes Under Service</div>
        </div>
        <div class="stat">
            <div class="number">800+</div>
            <div class="label">Happy Clients</div>
        </div>
        <div class="stat">
            <div class="number">750+</div>
            <div class="label">Rental Locations</div>
        </div>
    </div>
    <!-- Help Section sesuai Figma -->
    <div class="help-section-bg" id="help">
        <div class="help-bg-half"></div>
        <div style="display: flex; flex-direction: column; align-items: center; margin-bottom: 2.5rem; position: relative; z-index:2;">
            <h2 class="help-title-custom">Need Help from Mifta Motor Sport?</h2>
            <span class="help-underline">
                <svg width="100%" height="2" viewBox="0 0 352 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="352" height="2" rx="1" fill="#FE8400"/>
                </svg>
            </span>
        </div>
        <div class="help-container-custom">
            <form class="contact-form" style="box-shadow:none; border-radius:1.5rem;">
                <input type="text" placeholder="Your Name*" required>
                <input type="text" placeholder="Your Phone Number*" required>
                <textarea placeholder="Your Message" required></textarea>
                <button class="btn" type="submit">Send A Message</button>
            </form>
            <div class="contact-image">
                <img src="/images/contact.jpg" alt="Contact" style="border-radius:1.5rem; width:320px; max-width:100%; object-fit:cover;">
            </div>
        </div>
    </div>
    <footer>
        <div class="footer-row">
            <div class="footer-logo">
                <img src="/images/logo.png" alt="Logo" />
            </div>
            <div class="footer-contact">Need help? Please call <span style="color:var(--orange);">+62 812-3456-7890</span></div>
        </div>
        <div class="footer-social">
            <a href="#"><span style="font-family:Arial;">&#xf09a;</span></a>
            <a href="#"><span style="font-family:Arial;">&#xf099;</span></a>
            <a href="#"><span style="font-family:Arial;">&#xf16d;</span></a>
            <a href="#"><span style="font-family:Arial;">&#xf0e1;</span></a>
        </div>
    </footer>
            <script>
    document.addEventListener("DOMContentLoaded", function () {
    const dateInput = document.getElementById('tanggal');
    const cabangInput = document.getElementById('id_cabang');
    const jadwalSelect = document.getElementById('jadwal');
    const slotError = document.getElementById('slot-error');

    // Fetch cabang
    fetch('/service-cabang')
        .then(res => res.json())
        .then(data => {
            const select = document.getElementById('id_cabang');
            select.innerHTML = '<option value="">Service Location</option>';
            if (!data || data.length === 0) {
                select.innerHTML += '<option value="">(Cabang tidak tersedia)</option>';
                document.getElementById('jadwal').innerHTML = '<option value="">Service Time</option>';
                document.getElementById('slot-error').style.display = 'block';
                return;
            }
            data.forEach(cabang => {
                const opt = document.createElement('option');
                opt.value = cabang.id_cabang;
                opt.textContent = cabang.nama_cabang;
                select.appendChild(opt);
            });
        })
        .catch(err => {
            console.error('Gagal fetch cabang:', err);
            document.getElementById('slot-error').style.display = 'block';
        });

    // Fetch tipe service
    fetch('/service-types')
        .then(res => res.json())
        .then(data => {
            const select = document.getElementById('id_tipe_service');
            select.innerHTML = '<option value="">Service Type</option>';
            data.forEach(type => {
                const opt = document.createElement('option');
                opt.value = type.id_tipe_service;
                opt.textContent = type.nama_service;
                select.appendChild(opt);
            });
        })
        .catch(err => console.error('Gagal fetch tipe service:', err));

    function updateSlot() {
        const date = dateInput.value;
        const cabang = cabangInput.value;
        if (!date || !cabang) {
            jadwalSelect.innerHTML = '<option value="">Service Time</option>';
            slotError.style.display = 'none';
            return;
        }

        fetch(`/validate-slot?date=${date}&id_cabang=${cabang}`)
            .then(res => res.json())
            .then(data => {
                jadwalSelect.innerHTML = '<option value="">Service Time</option>';
                let available = false;
                const reasonMap = {
                    'full': 'Penuh',
                    'passed': 'Sudah Lewat'
                };
                data.forEach(slot => {
                    const opt = document.createElement('option');
                    let reasonLabel = slot.reason ? (reasonMap[slot.reason] || slot.reason) : '';
                    opt.value = slot.time;
                    opt.textContent = `${slot.time}${reasonLabel ? ` (${reasonLabel})` : ''}`;
                    opt.disabled = !slot.available;
                    if (slot.available) available = true;
                    jadwalSelect.appendChild(opt);
                });
                slotError.style.display = available ? 'none' : 'block';
            })
            .catch(err => {
                console.error('Gagal fetch slot:', err);
                jadwalSelect.innerHTML = '<option value="">Service Time</option>';
                slotError.style.display = 'block';
            });
    }

    dateInput.addEventListener('change', updateSlot);
    cabangInput.addEventListener('change', updateSlot);
});
</script>
    </body>
</html>
