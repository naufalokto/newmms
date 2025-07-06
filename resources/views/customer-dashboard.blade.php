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
</body>
</html> 