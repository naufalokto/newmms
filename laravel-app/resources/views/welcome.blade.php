<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mifta Motor Sport</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --black: #000000;
            --black2: #141414;
            --dark: #292D32;
            --gray: #575757;
            --light-gray: #C4C4C4;
            --offwhite: #FAFAFA;
            --peach: #FFE4C6;
            --orange: #FE8400;
            --white: #FFFFFF;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Inter', Arial, sans-serif;
            background: #FAFAFA;
            color: var(--black2);
            line-height: 1.6;
        }
        header {
            display: flex;
            flex-direction: row;
            width: 100vw;
            min-width: 0;
            border: none;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .header-left {
            width: 38.3125rem;
            background: #141414;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            height: 72px;
            flex-shrink: 0;
            padding-left: 32px;
        }
        .header-right {
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            height: 72px;
            flex: 1 1 auto;
            min-width: 0;
            padding-right: 32px;
        }
        .logo {
            display: flex;
            align-items: center;
            gap: 0;
        }
        .logo img {
            height: 40px;
            width: auto;
            display: block;
        }
        .logo-text {
            font-weight: 700;
            font-size: 1.25rem;
            letter-spacing: 0.5px;
        }
        nav {
            display: flex;
            gap: 48px;
            margin-right: 32px;
        }
        nav a {
            color: var(--black2);
            text-decoration: none;
            font-weight: 500;
            font-size: 1.08rem;
            transition: color 0.2s;
            padding: 0 2px;
        }
        nav a:hover {
            color: var(--orange);
        }
        .user {
            font-size: 1.08rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-left: 16px;
            color: var(--black2);
        }
        .user-img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
            background: #eee;
        }
        .hero {
            position: relative;
            display: flex;
            align-items: center;
            height: 46.375rem;
        }
        .hero-bg-img {
            position: absolute;
            right: 0;
            top: 0;
            width: 56.8125rem;
            height: 34.0625rem;
            object-fit: cover;
            z-index: 1;
            transform: none;
            border-radius: 0;
            pointer-events: none;
        }
        .hero-left {
            position: relative;
            width: 38.3125rem;
            height: 46.375rem;
            background: #141414;
            z-index: 2;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 56px 0 56px 56px;
        }
        .hero-content {
            position: relative;
            z-index: 3;
        }
        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            color: var(--white);
            margin-bottom: 18px;
            line-height: 1.13;
        }
        .hero-desc {
            color: #C4C4C4;
            font-size: 1.15rem;
            margin-bottom: 32px;
            max-width: 420px;
        }
        .hero-btn {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
            background: var(--orange);
            color: var(--white);
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 0.5rem;
            font-size: 1.25rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
            margin: 40px 0 0 0;
            width: fit-content;
        }
        .hero-btn:hover {
            background: #d96f00;
        }
        .hero-right {
            width: 56.8125rem;
            height: 34.0625rem;
            flex-shrink: 0;
            display: flex;
            align-items: stretch;
            justify-content: flex-end;
            background: url('/images/Main%20Picture.jpg') lightgray 50% / cover no-repeat;
            position: relative;
            border-bottom-left-radius: 40px;
            overflow: hidden;
        }
        .hero-right img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            min-height: 440px;
        }
        @media (max-width: 1000px) {
            header { padding: 0 18px 0 12px; }
            .hero { flex-direction: column; }
            .hero-left, .hero-right { padding: 32px 8vw; }
            .hero-right { border-radius: 0; }
        }
        @media (max-width: 700px) {
            .hero-title { font-size: 2rem; }
            .hero-left, .hero-right { padding: 24px 4vw; }
            .hero { min-height: 320px; }
            .hero-left {
                width: 100%;
                height: auto;
                padding: 24px 4vw;
            }
            .header-left, .header-right {
                width: 100%;
                min-width: 0;
                padding-left: 12px;
                padding-right: 12px;
                height: 56px;
            }
            header {
                flex-direction: column;
                height: auto;
            }
        }
        .section {
            padding: 56px 8vw;
            background: var(--offwhite);
        }
        .section-title {
            font-size: 1.7rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 32px;
        }
        .about {
            display: flex;
            align-items: flex-start;
            gap: 40px;
            flex-wrap: wrap;
            justify-content: center;
        }
        .about-content {
            max-width: 480px;
        }
        .about-content p {
            margin-bottom: 18px;
        }
        .about-content .link {
            color: var(--orange);
            font-weight: 600;
            text-decoration: none;
            transition: color 0.2s;
        }
        .about-content .link:hover {
            color: #d96f00;
        }
        .services-section {
            background: var(--black2);
            color: var(--white);
            padding: 56px 8vw;
        }
        .services-title {
            text-align: center;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 32px;
        }
        .services {
            display: flex;
            gap: 32px;
            justify-content: center;
            flex-wrap: wrap;
        }
        .service-card {
            background: var(--white);
            color: var(--black2);
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.04);
            padding: 32px 24px;
            width: 260px;
            text-align: center;
        }
        .service-card svg {
            color: var(--orange);
            font-size: 2.2rem;
            margin-bottom: 12px;
        }
        .service-card h3 {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 8px;
        }
        .service-card p {
            font-size: 0.97rem;
            color: var(--gray);
        }
        .appointment-section {
            background: #FAFAFA;
            padding: 48px 8vw;
        }
        .appointment-title {
            text-align: center;
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 24px;
        }
        .appointment-form {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            justify-content: center;
            align-items: center;
            max-width: 900px;
            margin: 0 auto;
        }
        .appointment-form input,
        .appointment-form select,
        .appointment-form textarea {
            padding: 12px 14px;
            border: 1px solid var(--light-gray);
            border-radius: 6px;
            font-size: 1rem;
            min-width: 180px;
            background: var(--white);
        }
        .appointment-form textarea {
            min-width: 260px;
            min-height: 40px;
        }
        .appointment-form .btn {
            background: var(--orange);
            color: var(--white);
            border: none;
            padding: 14px 32px;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }
        .appointment-form .btn:hover {
            background: #d96f00;
        }
        .collection-section {
            padding: 56px 8vw 32px 8vw;
            background: var(--offwhite);
        }
        .collection-title {
            text-align: center;
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 32px;
        }
        .collections {
            display: flex;
            gap: 24px;
            justify-content: center;
            flex-wrap: wrap;
        }
        .collection-card {
            background: var(--white);
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.04);
            width: 260px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }
        .collection-card .info {
            padding: 16px;
            flex: 1;
        }
        .collection-card .info h4 {
            font-size: 1.05rem;
            font-weight: 700;
            margin-bottom: 4px;
        }
        .collection-card .info p {
            font-size: 0.97rem;
            color: var(--gray);
            margin-bottom: 8px;
        }
        .collection-card .info .price {
            font-size: 1rem;
            font-weight: 600;
            color: var(--black2);
            margin-bottom: 8px;
        }
        .collection-card .info .btn {
            background: var(--orange);
            color: var(--white);
            border: none;
            padding: 8px 18px;
            border-radius: 6px;
            font-size: 0.97rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }
        .collection-card .info .btn:hover {
            background: #d96f00;
        }
        .see-more-btn {
            display: block;
            margin: 24px auto 0 auto;
            background: var(--orange);
            color: var(--white);
            border: none;
            padding: 12px 36px;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }
        .see-more-btn:hover {
            background: #d96f00;
        }
        .testimonial-section {
            padding: 56px 8vw 32px 8vw;
            background: var(--offwhite);
        }
        .testimonial-title {
            text-align: center;
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 32px;
        }
        .testimonials {
            display: flex;
            gap: 24px;
            justify-content: center;
            flex-wrap: wrap;
        }
        .testimonial-card {
            background: var(--white);
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.04);
            width: 320px;
            padding: 32px 24px;
            text-align: center;
        }
        .testimonial-card img {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 12px;
        }
        .testimonial-card h4 {
            font-size: 1.05rem;
            font-weight: 700;
            margin-bottom: 6px;
        }
        .testimonial-card p {
            font-size: 0.97rem;
            color: var(--gray);
        }
        .stats-section {
            background: #FFE4C6;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 4rem 10rem;
            gap: 10rem;
            height: 5.81rem;
            border-radius: 5px;
            align-self: stretch;
        }
        .stat {
            text-align: center;
        }
        .stat .number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--orange);
        }
        .stat .label {
            font-size: 1rem;
            color: var(--black2);
        }
        .contact-section {
            background: var(--offwhite);
            padding: 56px 8vw 32px 8vw;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .contact-container {
            display: flex;
            max-width: 65.9375rem;
            min-height: 33.875rem;
            width: 100%;
            padding: 3.5rem;
            justify-content: center;
            align-items: center;
            gap: 5.44rem;
            background: #fff;
            border-radius: 0.25rem;
            box-shadow: 0px 0px 40px 0px rgba(0,0,0,0.04);
            align-self: stretch;
        }
        .contact-form {
            display: flex;
            flex-direction: column;
            flex: 1 1 0;
            min-width: 260px;
            max-width: 58.9rem;
            padding: 0;
        }
        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid var(--light-gray);
            border-radius: 6px;
            font-size: 1rem;
            margin-bottom: 16px;
            background: #fff;
        }
        .contact-form textarea {
            min-height: 80px;
        }
        .contact-form .btn {
            background: var(--orange);
            color: var(--white);
            border: none;
            padding: 18px 40px;
            border-radius: 6px;
            font-size: 1.25rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
            width: fit-content;
            align-self: flex-start;
            margin-top: 12px;
        }
        .contact-form .btn:hover {
            background: #d96f00;
        }
        .contact-image {
            flex: 0 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .contact-image img {
            width: 28.9rem;
            height: 28.9rem;
            max-width: 100%;
            border-radius: 0.25rem;
            object-fit: cover;
        }
        @media (max-width: 900px) {
            .contact-container {
                flex-direction: column;
                gap: 2rem;
                padding: 2rem 1rem;
                min-height: unset;
                max-width: 100%;
            }
            .contact-image img {
                width: 100%;
                height: auto;
                max-width: 100%;
            }
        }
        footer {
            background: var(--black);
            color: var(--white);
            padding: 24px 8vw 12px 8vw;
            text-align: center;
            font-size: 1rem;
            position: relative;
        }
        .footer-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
        }
        .footer-logo {
            font-weight: 700;
            font-size: 1.1rem;
        }
        .footer-contact {
            color: var(--orange);
            font-weight: 600;
        }
        .footer-social {
            margin-top: 12px;
        }
        .footer-social a {
            color: var(--orange);
            margin: 0 8px;
            font-size: 1.3rem;
            text-decoration: none;
            transition: color 0.2s;
        }
        .footer-social a:hover {
            color: var(--white);
        }
        @media (max-width: 700px) {
            header, .hero, .section, .services-section, .appointment-section, .collection-section, .testimonial-section, .stats-section, .contact-section, footer {
                padding-left: 4vw;
                padding-right: 4vw;
            }
            .about, .services, .collections, .testimonials, .stats-section, .contact-section {
                flex-direction: column;
                align-items: center;
                gap: 24px;
            }
            .hero-content {
                max-width: 100%;
            }
            .hero-img {
                width: 100%;
            }
        }
        .help-title-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }
        .help-title {
            color: #141414;
            text-align: center;
            font-family: 'Montserrat', Arial, sans-serif;
            font-size: 2rem;
            font-style: normal;
            font-weight: 500;
            line-height: normal;
            margin: 2.5rem 0 1.5rem 0;
        }
        .help-underline {
            width: 50%;
            max-width: 500px;
            min-width: 3.5rem;
            height: 2px;
            background: #FE8400;
            margin: 0.2rem 0 0 0;
            border-radius: 1px;
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
        <img class="hero-bg-img" src="/images/Main%20Picture.jpg" alt="Hero Image">
        <div class="hero-left">
            <div class="hero-content">
                <div class="hero-title">Professional Care and Sales for Every Ride</div>
                <div class="hero-desc">Mifta Motor Sport offers everything your ride needs, in one place.</div>
                <button class="hero-btn">Book Now</button>
            </div>
        </div>
    </section>
    <section class="section about" id="about">
        <div class="about-content">
            <h2 class="section-title" style="text-align:left; margin-bottom:18px;">Get to Know Us</h2>
            <p>Mifta Motor Sport is your one-stop destination for premium motorbike service and trusted sales. We combine expert care with a curated selection of high-performance motorcycles to keep every ride smooth, powerful, and reliable.</p>
            <a class="link" href="#services">Explore Our Services</a>
        </div>
    </section>
    <section class="services-section" id="services">
        <h2 class="services-title">Our Premium Services</h2>
        <div class="services">
            <div class="service-card">
                <div><svg width="32" height="32" fill="currentColor" viewBox="0 0 24 24"><path d="M19.07 4.93a10 10 0 1 0 0 14.14a10 10 0 0 0 0-14.14zm-7.07 13a8 8 0 1 1 8-8a8 8 0 0 1-8 8zm1-13h-2v2h2zm0 14h-2v2h2zm7-7h-2v2h2zm-14 0H3v2h2zm9.07-5.07l-1.41 1.41l1.41 1.41l1.41-1.41zm-8.48 8.48l-1.41 1.41l1.41 1.41l1.41-1.41zm8.48 1.41l1.41-1.41l-1.41-1.41l-1.41 1.41zm-8.48-8.48l1.41-1.41l-1.41-1.41l-1.41 1.41z"/></svg></div>
                <h3>Expert Bike Care</h3>
                <p>Pro maintenance for peak performance.</p>
            </div>
            <div class="service-card">
                <div><svg width="32" height="32" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm1 17.93V20h-2v-.07A8.12 8.12 0 0 1 4.07 13H6v-2H4.07A8.12 8.12 0 0 1 11 4.07V6h2V4.07A8.12 8.12 0 0 1 19.93 11H18v2h1.93A8.12 8.12 0 0 1 13 19.93z"/></svg></div>
                <h3>Quality Parts</h3>
                <p>Reliable components for lasting performance.</p>
            </div>
            <div class="service-card">
                <div><svg width="32" height="32" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm1 17.93V20h-2v-.07A8.12 8.12 0 0 1 4.07 13H6v-2H4.07A8.12 8.12 0 0 1 11 4.07V6h2V4.07A8.12 8.12 0 0 1 19.93 11H18v2h1.93A8.12 8.12 0 0 1 13 19.93z"/></svg></div>
                <h3>Showroom</h3>
                <p>Discover premium bikes, ready to ride.</p>
            </div>
        </div>
    </section>
    <section class="appointment-section" id="appointment">
        <h2 class="appointment-title">Book Your Appointment</h2>
        <form class="appointment-form">
            <input type="date" placeholder="Service Date" required>
            <input type="text" placeholder="Service Location" required>
            <select required>
                <option value="">Service Type</option>
                <option>Maintenance</option>
                <option>Repair</option>
                <option>Upgrade</option>
            </select>
            <textarea placeholder="Describe Your Issue" required></textarea>
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