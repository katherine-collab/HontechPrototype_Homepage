    <!-- ═══════════════════════════════════════
         CONTACT
         ═══════════════════════════════════════ -->
    <section class="section section-dark" id="contact">
        <div class="container">
            <div class="reveal">
                <div class="section-label" style="color:#ef4444;">Connect With Us</div>
                <h2 class="section-title">Let's Get Your Car<br>Back on the Road</h2>
                <p class="section-subtitle">
                    Visit us at our spacious Marikina Heights facility, or connect instantly with our dispatch supervisors through any of the active lines below.
                </p>
            </div>

            <div class="contact-grid">
                <div class="contact-info-cards">
                    <div class="contact-card reveal delay-1">
                        <div class="contact-card-icon">
                            <i data-lucide="phone" style="width:22px;height:22px;color:#ef4444"></i>
                        </div>
                        <div>
                            <h4>Phone Support</h4>
                            <p>8 564 4550 / 7 121 9124</p>
                        </div>
                    </div>

                    <div class="contact-card reveal delay-2">
                        <div class="contact-card-icon">
                            <i data-lucide="mail" style="width:22px;height:22px;color:#ef4444"></i>
                        </div>
                        <div>
                            <h4>Email Dispatch</h4>
                            <p>hontechautocenter@gmail.com</p>
                        </div>
                    </div>

                    <div class="contact-card reveal delay-3">
                        <div class="contact-card-icon">
                            <i data-lucide="map-pin" style="width:22px;height:22px;color:#ef4444"></i>
                        </div>
                        <div>
                            <h4>Workshop Location</h4>
                            <p>70 Bayan-bayanan Ave. corner SW Narra St.<br>Marikina Heights, Marikina City</p>
                        </div>
                    </div>

                    <div class="contact-card reveal delay-4">
                        <div class="contact-card-icon">
                            <i data-lucide="instagram" style="width:22px;height:22px;color:#ef4444"></i>
                        </div>
                        <div>
                            <h4>Social Media Channels</h4>
                            <p>@hontechautocenterinc</p>
                        </div>
                    </div>
                </div>

                <form id="contactForm" class="contact-form reveal-right" onsubmit="return false;">
                    <h4 style="font-size: 14px; font-weight: 700; color: white; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 0.05em;">Send a Direct Message</h4>
                    <div class="form-group">
                        <label for="contact-name">Your Name *</label>
                        <input type="text" id="contact-name" placeholder="John Doe" required>
                    </div>
                    <div class="form-group">
                        <label for="contact-email">Your Email *</label>
                        <input type="email" id="contact-email" placeholder="john@example.com" required>
                    </div>
                    <div class="form-group">
                        <label for="contact-message">How can we help? *</label>
                        <textarea id="contact-message" rows="4" placeholder="e.g., body repairs, fleet contract pricing, warranty inquiries..." required></textarea>
                    </div>
                    <button type="submit" id="btnSubmitContact" class="btn-primary" style="width: 100%; justify-content: center; cursor: pointer;">
                        <i data-lucide="send" style="width:16px;height:16px"></i>
                        Send Message
                    </button>
                </form>
            </div>

            <div class="contact-map reveal" style="margin-top: 48px;">
                <!-- Real pinned location (resolved from https://maps.app.goo.gl/XXuCnayVV9H9EQRs6): Hontech Auto Center Inc, 14.6500919, 121.1134286 -->
                <iframe
                    src="https://www.google.com/maps?q=14.6500919,121.1134286&z=17&output=embed"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" title="Hontech Auto Center Inc. location map">
                </iframe>
                <a href="https://maps.app.goo.gl/XXuCnayVV9H9EQRs6" target="_blank" rel="noopener" class="contact-map-directions">
                    <i data-lucide="navigation" style="width:16px;height:16px"></i>
                    Get Directions
                </a>
            </div>
        </div>
    </section>
