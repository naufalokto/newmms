<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Service - Mifta Motor Sport</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Montserrat:wght@500;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/customer-dashboard.css">
</head>
<body>
    <a href="/" class="btn-back" style="display:inline-block;margin:1.5em 0 1em 1.5em;padding:0.5em 1.2em;background:#FE8400;color:#fff;border-radius:0.4em;text-decoration:none;font-weight:600;">&larr; Back to Home</a>
    
    <header class="main-header">
        <div class="header-logo-wrap">
            <img src="/images/logo2.png" alt="Logo" class="header-logo">
        </div>
        <nav class="header-menu">
            <a href="/customer/dashboard" class="header-link">Service</a>
            <a href="/product-customer" class="header-link">Product</a>
            <a href="#" class="header-link" onclick="openTestimoniModal(); return false;">Testimonial</a>
            <a href="#" class="header-link">Help</a>
        </nav>
        <div class="header-user" id="headerUser">
            <span class="header-username">{{ Auth::user()->nama }}</span>
            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->nama) }}&background=eeeeee&color=141414&size=128" alt="Profile" class="header-profile">
            <div class="dropdown-menu" id="dropdownMenu" style="display:none;">
                <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                    @csrf
                    <button type="submit" class="dropdown-item" style="background:none;border:none;padding:0.7em 1.2em;width:100%;text-align:left;cursor:pointer;">Logout</button>
                </form>
            </div>
        </div>
    </header>

    <div class="hero-section">
        <img src="/images/Main Picture.jpg" alt="Main Hero" class="hero-image">
        <img src="/images/logo.png" alt="Logo Tengah" class="hero-logo-center">
        <div class="hero-title">Book Service</div>
        <div class="hero-breadcrumb">
            <span class="breadcrumb-home">Home</span>
            <span class="breadcrumb-separator">&gt;</span>
            <span class="breadcrumb-current">Book Service</span>
        </div>
    </div>

    <div style="max-width: 600px; margin: 2rem auto; padding: 2rem; background: white; border-radius: 1rem; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <h2 style="font-family: 'Montserrat', sans-serif; font-size: 1.8rem; font-weight: 700; color: #141414; margin-bottom: 1.5rem; text-align: center;">Book Your Service</h2>
        
        @if($errors->any())
            <div style="background: #f8d7da; color: #721c24; padding: 1rem; margin-bottom: 1rem; border-radius: 0.5rem; border: 1px solid #f5c6cb;">
                <ul style="margin: 0; padding-left: 1.5rem;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('service.store') }}" id="serviceForm">
            @csrf
            <input type="hidden" name="id_pengguna" value="{{ Auth::user()->id_pengguna }}">
            
            <div style="margin-bottom: 1.5rem;">
                <label for="id_tipe_service" style="display: block; font-family: 'Poppins', sans-serif; font-weight: 500; color: #141414; margin-bottom: 0.5rem;">Service Type</label>
                <select name="id_tipe_service" id="id_tipe_service" required style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 0.5rem; font-family: 'Inter', sans-serif; font-size: 1rem;">
                    <option value="">Select Service Type</option>
                    @foreach($types as $type)
                        <option value="{{ $type->id_tipe_service }}" {{ old('id_tipe_service') == $type->id_tipe_service ? 'selected' : '' }}>
                            {{ $type->nama_service }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label for="id_cabang" style="display: block; font-family: 'Poppins', sans-serif; font-weight: 500; color: #141414; margin-bottom: 0.5rem;">Location</label>
                <select name="id_cabang" id="id_cabang" required style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 0.5rem; font-family: 'Inter', sans-serif; font-size: 1rem;">
                    <option value="">Select Location</option>
                    @foreach($cabangs as $cabang)
                        <option value="{{ $cabang->id_cabang }}" {{ old('id_cabang') == $cabang->id_cabang ? 'selected' : '' }}>
                            {{ $cabang->nama_cabang }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label for="tanggal" style="display: block; font-family: 'Poppins', sans-serif; font-weight: 500; color: #141414; margin-bottom: 0.5rem;">Date</label>
                <input type="date" name="tanggal" id="tanggal" required value="{{ old('tanggal') }}" style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 0.5rem; font-family: 'Inter', sans-serif; font-size: 1rem;">
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label for="jadwal" style="display: block; font-family: 'Poppins', sans-serif; font-weight: 500; color: #141414; margin-bottom: 0.5rem;">Time Slot</label>
                <select name="jadwal" id="jadwal" required style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 0.5rem; font-family: 'Inter', sans-serif; font-size: 1rem;">
                    <option value="">Select Time Slot</option>
                </select>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label for="keluhan" style="display: block; font-family: 'Poppins', sans-serif; font-weight: 500; color: #141414; margin-bottom: 0.5rem;">Issue Detail (Optional)</label>
                <textarea name="keluhan" id="keluhan" rows="4" placeholder="Describe your motorcycle issue..." style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 0.5rem; font-family: 'Inter', sans-serif; font-size: 1rem; resize: vertical;">{{ old('keluhan') }}</textarea>
            </div>

            <button type="submit" style="width: 100%; background: #FE8400; color: white; border: none; border-radius: 0.5rem; padding: 1rem; font-size: 1.1rem; font-weight: 600; font-family: 'Poppins', sans-serif; cursor: pointer; transition: background 0.2s;">
                Book Service
            </button>
        </form>
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

        // Set minimum date to today
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('tanggal').min = today;

        // Load available time slots when date and location are selected
        document.getElementById('tanggal').addEventListener('change', loadTimeSlots);
        document.getElementById('id_cabang').addEventListener('change', loadTimeSlots);

        function loadTimeSlots() {
            const date = document.getElementById('tanggal').value;
            const id_cabang = document.getElementById('id_cabang').value;
            const jadwalSelect = document.getElementById('jadwal');

            if (!date || !id_cabang) {
                jadwalSelect.innerHTML = '<option value="">Select Time Slot</option>';
                return;
            }

            fetch(`/validate-slot?date=${date}&id_cabang=${id_cabang}`)
                .then(response => response.json())
                .then(slots => {
                    jadwalSelect.innerHTML = '<option value="">Select Time Slot</option>';
                    slots.forEach(slot => {
                        if (slot.available) {
                            const option = document.createElement('option');
                            option.value = slot.time;
                            option.textContent = slot.time;
                            jadwalSelect.appendChild(option);
                        }
                    });
                })
                .catch(error => {
                    console.error('Error loading time slots:', error);
                    jadwalSelect.innerHTML = '<option value="">Error loading time slots</option>';
                });
        }
    </script>
</body>
</html> 