    <!-- ═══════════════════════════════════════
         NAVIGATION
         ═══════════════════════════════════════ -->
    <nav class="navbar" id="navbar">
        <div class="navbar-inner">
            <a href="#hero" class="navbar-logo">
                <img src="images/hontech-logo.png" alt="Hontech Auto Center Inc." class="navbar-logo-img">
            </a>

            <div class="navbar-links" id="navLinks">
                <!-- Menu 1: About Hontech -->
                <div class="nav-item">
                    <button type="button" class="nav-trigger" aria-expanded="false" aria-controls="menu-about">
                        Discover Hontech <i data-lucide="chevron-down" style="width:16px;height:16px"></i>
                    </button>
                    <div class="mega" id="menu-about" hidden>
                        <div class="mega-inner">
                            <div class="mega-col">
                                <div class="mega-label">Company</div>
                                <a href="#about">About Us</a>
                                <a href="#vision-mission">Vision &amp; Mission</a>
                                <a href="#why-hontech">Why Hontech</a>
                            </div>
                            <div class="mega-col">
                                <div class="mega-label">Our Story</div>
                                <a href="#values">Core Values</a>
                                <a href="#milestones">Milestones</a>
                                <a href="#team">Our Team</a>
                            </div>
                            <a href="#team" class="mega-feature">
                                <img src="images/team-photo.png" alt="" loading="lazy">
                                <span class="mega-feature-body">
                                    <span class="mega-feature-title">Certified experts. CASA-like quality.</span>
                                    <span class="mega-feature-meta"><b>16+</b> Expert Personnel</span>
                                </span>
                                <span class="mega-feature-btn">Meet Our Team</span>
                            </a>
                        </div>
                        <button type="button" class="mega-close">Close <i data-lucide="x" style="width:14px;height:14px"></i></button>
                    </div>
                </div>

                <!-- Menu 2: Services -->
                <div class="nav-item">
                    <button type="button" class="nav-trigger" aria-expanded="false" aria-controls="menu-services">
                        Care &amp; Services <i data-lucide="chevron-down" style="width:16px;height:16px"></i>
                    </button>
                    <div class="mega" id="menu-services" hidden>
                        <div class="mega-inner">
                            <div class="mega-col">
                                <div class="mega-label">Services</div>
                                <a href="#services">Our Services</a>
                                <a href="#services">Full PMS Packages</a>
                            </div>
                            <div class="mega-col">
                                <div class="mega-label">Tools &amp; Help</div>
                                <a href="#book">How to Book</a>
                                <a href="#faq">FAQ</a>
                            </div>
                            <a href="#book" class="mega-feature">
                                <img src="images/service-image.png" alt="" loading="lazy">
                                <span class="mega-feature-body">
                                    <span class="mega-feature-title">Ready to service your car?</span>
                                    <span class="mega-feature-meta">Call or message us to book</span>
                                </span>
                                <span class="mega-feature-btn">Book Now</span>
                            </a>
                        </div>
                        <button type="button" class="mega-close">Close <i data-lucide="x" style="width:14px;height:14px"></i></button>
                    </div>
                </div>

                <a href="#news">News</a>
                <a href="#contact">Contact</a>
                <a href="admin.php" class="nav-admin-link"><i data-lucide="shield" style="width:14px;height:14px;display:inline-block;vertical-align:middle;margin-right:4px;"></i>Admin</a>
            </div>
            <div class="mega-backdrop" hidden></div>

            <a href="#book" class="navbar-cta">Book Now</a>

            <button class="navbar-toggle" id="navToggle" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </nav>

    <script>
    // Mega-menu: click to open, one open at a time; Esc / Close / backdrop / link click closes.
    (function () {
        var nav = document.getElementById('navbar');
        var triggers = nav.querySelectorAll('.nav-trigger');
        var backdrop = nav.querySelector('.mega-backdrop');

        function closeAll() {
            triggers.forEach(function (t) {
                t.setAttribute('aria-expanded', 'false');
                document.getElementById(t.getAttribute('aria-controls')).hidden = true;
            });
            backdrop.hidden = true;
        }

        triggers.forEach(function (t) {
            t.addEventListener('click', function () {
                var open = t.getAttribute('aria-expanded') === 'true';
                closeAll();
                if (!open) {
                    t.setAttribute('aria-expanded', 'true');
                    document.getElementById(t.getAttribute('aria-controls')).hidden = false;
                    backdrop.hidden = false;
                }
            });
        });
        nav.querySelectorAll('.mega-close').forEach(function (b) { b.addEventListener('click', closeAll); });
        nav.querySelectorAll('.mega a').forEach(function (a) { a.addEventListener('click', closeAll); });
        backdrop.addEventListener('click', closeAll);
        document.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeAll(); });
    })();
    </script>
