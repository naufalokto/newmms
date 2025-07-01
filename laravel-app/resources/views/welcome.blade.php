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
    </style>
    </head>
    <body>
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
                <a href="#help">Help</a>
            </nav>
            <div class="user">
                Ethan Maxwell
                <img class="user-img" src="https://randomuser.me/api/portraits/men/32.jpg" alt="User">
            </div>
        </div>
    </header>
    <section class="hero">
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
         <img src="/images/Main%20Picture.jpg" alt="Hero Image">
        </div>
       
    </section>
    <section class="section about" id="about">
        <div class="about-content">
            <h2 class="section-title" style="text-align:center; ">Get to Know Us</h2>
            <hr class="section-divider">
            <div class="about-text">
                <div class="about-image">
                    <img src="{{asset('images/Gambar-Peralatan-Bengkel.jpg')}}" alt="About Us Image">
                </div>
                <div class="about-description">
                    <p>Mifta Motor Sport is your one-stop destination for premium motorbike service and trusted sales. We combine expert care with a curated selection of high-performance motorcycles to keep every ride smooth, powerful, and reliable.
                       
                    </p>
                     <a class="link" href="#services">Explore Our Services</a>
                </div>  
            </div>
        </div>
    </section>
    <section class="services-section" id="services">
        <h2 class="services-title">Our Premium Services</h2>
        <hr class="section-divider">
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
    </section>
    <!-- Book Your Appointment Title and Underline OUTSIDE the peach background -->
    <div class="appointment-title-container">
        <h2 class="appointment-title">Book Your Appointment</h2>
        <span class="appointment-title-underline-svg" style="height:0rem;align-self:stretch;display:block;">
            <svg width="398" height="2" viewBox="0 0 398 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 1L397 0.999965" stroke="#FE8400" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </span>
    </div>
    <section class="appointment-section" id="appointment" style="background: #FFE4C6;">
        <form class="appointment-form">
            <div class="input-group">
                <input type="date" placeholder="Service Date" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Service Location" required>
            </div>
            <div class="input-group">
                <select required>
                    <option value="">Service Type</option>
                    <option>Maintenance</option>
                    <option>Repair</option>
                    <option>Upgrade</option>
                </select>
                <img src="/images/chevron.png" alt="Dropdown Icon" class="dropdown-icon">
            </div>
            <div class="input-group input-group-textarea">
                <textarea placeholder="Describe Your Issue" required></textarea>
            </div>
            <button class="btn" type="submit">Book Now</button>
        </form>
    </section>
    <section class="collection-section" id="product">
        <h2 class="collection-title">Our Exclusive Collection</h2>
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
    </section>
    <section class="testimonial-section" id="testimonial">
        <h2 class="testimonial-title">What Our Clients Say?</h2>
        <div class="testimonials">
            <div class="testimonial-card">
                <h4>Sophia Lane</h4>
                <p>The service at Mifta Motor Sport was quick and professional. My bike feels smoother than ever.</p>
            </div>
            <div class="testimonial-card">
                <h4>Dylan Scott</h4>
                <p>I found my dream bike at Mifta Motor Sport. The staff were helpful, and the whole process was easy.</p>
            </div>
        </div>
    </section>
    <section class="stats-section">
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
    </section>
    <div class="help-title-container">
        <div class="help-title">Need Help from Mifta Motor Sport?</div>
        <div class="help-underline"></div>
    </div>
    <section class="contact-section" id="help">
        <div class="contact-container">
            <form class="contact-form">
                <input type="text" placeholder="Your Name*" required>
                <input type="text" placeholder="Your Phone Number*" required>
                <textarea placeholder="Your Message" required></textarea>
                <button class="btn" type="submit">Send A Message</button>
            </form>
            <div class="contact-image">
                <img src="/images/contact.jpg" alt="Contact" />
            </div>
        </div>
    </section>
    <footer>
        <div class="footer-row">
            <div class="footer-logo">Mifta Motor Sport</div>
            <div class="footer-contact">Need help renting a car? Please call <span style="color:var(--orange);">+1-333-444-5555</span></div>
        </div>
        <div class="footer-social">
            <a href="#"><span style="font-family:Arial;">&#xf09a;</span></a>
            <a href="#"><span style="font-family:Arial;">&#xf099;</span></a>
            <a href="#"><span style="font-family:Arial;">&#xf16d;</span></a>
            <a href="#"><span style="font-family:Arial;">&#xf0e1;</span></a>
        </div>
    </footer>
    </body>
</html>