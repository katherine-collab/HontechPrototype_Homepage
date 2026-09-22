    <!-- ═══════════════════════════════════════
         LATEST NEWS (Toyota-style card grid + category filter)
         ═══════════════════════════════════════ -->
    <?php
    // TODO: wire to backend (announcements/ads table). Static placeholder data for the prototype.
    $news_items = [
        ['cat' => 'Promos',    'date' => '10 SEP 2026', 'title' => 'Full PMS Package Promo: Save More on Your Next Service',           'img' => 'images/service-image.png'],
        ['cat' => 'Company',   'date' => '8 SEP 2026',  'title' => 'Hontech Welcomes New Certified Technicians to the Team',           'img' => 'images/team-photo.png'],
        ['cat' => 'Tips',      'date' => '2 SEP 2026',  'title' => '5 Signs Your Car Needs a Brake Check Before the Rainy Season',    'img' => 'images/hero-bg.png'],
        ['cat' => 'Promos',    'date' => '25 AUG 2026', 'title' => 'Free 30-Point Inspection with Any Preventive Maintenance Booking', 'img' => 'images/service-image.png'],
        ['cat' => 'Company',   'date' => '14 AUG 2026', 'title' => 'Hontech Auto Center Marks Another Milestone in Metro Manila',      'img' => 'images/hero-bg.png'],
        ['cat' => 'Tips',      'date' => '1 AUG 2026',  'title' => 'How Often Should You Change Your Engine Oil?',                    'img' => 'images/team-photo.png'],
    ];
    $news_cats = array_values(array_unique(array_column($news_items, 'cat')));
    ?>
    <section class="section section-alt" id="news">
        <div class="container">
            <div class="reveal">
                <div class="section-label">Newsroom</div>
                <h2 class="section-title">Latest News</h2>
            </div>

            <!-- Anniversary spotlight: TODO: wire to backend as a pinned announcement once the CMS exists.
                 Confirm with the client: exact free-PMS week dates, and whether "Nicodemus L. De Guzman" /
                 title is the correct signature to publish. -->
            <div class="news-spotlight reveal">
                <span class="news-spotlight-watermark" aria-hidden="true">HONTECH</span>
                <div class="news-spotlight-top">
                    <div class="news-spotlight-text">
                        <span class="news-spotlight-year">Est. 2020 &middot; Celebrating 2026</span>
                        <h3>We're Turning <span>6</span>!</h3>
                        <p>To celebrate six incredible years of driving together, we're giving back to the community that made it possible! Join us for our 6th Anniversary Celebration and take advantage of our exclusive Free PMS Week!</p>
                        <p class="news-spotlight-highlight">
                            <i data-lucide="car-front" style="width:18px;height:18px"></i>
                            <span><strong>First-Come, First-Served:</strong> the first 2 clients to arrive each day for one full week get 100% FREE Labor &amp; Materials for Preventive Maintenance Service (PMS). Mark your calendars, set your alarms, and let us take care of your ride on us!</span>
                        </p>
                    </div>
                    <div class="news-spotlight-media">
                        <img src="images/service-image.jpg" alt="Hontech Auto Center Inc. technicians servicing a vehicle" loading="lazy">
                    </div>
                </div>

                <!-- Sponsor invitation letter, as given by the client. Left out the "Supplier / Partner
                     Company Name" + "Address" inside-address lines since those are mail-merge fields for
                     an individually addressed letter, not content -- they'd read as broken placeholders
                     on a public page. Everything else is verbatim. -->
                <div class="news-spotlight-sponsor">
                    <span class="news-spotlight-sponsor-eyebrow">Attention: Sales &amp; Partnership Department</span>
                    <p class="news-spotlight-sponsor-subject">Subject: Request for Support &amp; Sponsorship — 6th Anniversary Celebration of Hontech Auto Center, Inc.</p>
                    <p>Dear Supplier,</p>
                    <p>Warm greetings from Hontech Auto Center, Inc.!</p>
                    <p>This coming October 7, 2026, Hontech Auto Center, Inc. will proudly mark its 6th anniversary in the industry. Over the past six years, our commitment to providing quality service and reliable automotive care has been the cornerstone of our success&mdash;a milestone made possible in large part by strong, dependable partners like you.</p>
                    <p>To celebrate this milestone and express gratitude to our loyal clients, we are hosting a week-long anniversary promo. Our flagship campaign will offer 100% Free Labor and Materials for Preventive Maintenance Service (PMS) to the first two (2) clients who arrive early each day throughout the event week.</p>
                    <p>In line with this, we would like to invite you to be an official sponsor of our 6th Anniversary Celebration. We are respectfully requesting support in the form of:</p>
                    <ul>
                        <li><strong>Sponsorship of PMS Supplies &amp; Consumables:</strong> engine oils, filters, fluids, or related maintenance products.</li>
                        <li><strong>Co-branded Event Merchandise or Giveaways:</strong> promotional items, tools, or merchandise for our visiting clients.</li>
                    </ul>
                    <p>In appreciation of your support, we will feature your company as a key event partner across our digital marketing channels, social media campaign posts, and printed event signage throughout the celebration week.</p>
                    <p>Thank you for your continued partnership and support over the years. We look forward to celebrating this success together. Please feel free to reach out at <a href="tel:+639228097492">0922 809 7492</a> or visit us to discuss potential co-sponsorship details.</p>
                </div>

                <div class="news-spotlight-sign">
                    <span>Sincerely,</span>
                    <strong>Nicodemus L. De Guzman</strong>
                    <span>President / General Manager</span>
                </div>
            </div>

            <div class="news-filters reveal" role="group" aria-label="Filter news by category">
                <span class="news-filters-label">Filter by category</span>
                <button type="button" class="chip active" data-cat="all">All</button>
                <?php foreach ($news_cats as $c): ?>
                    <button type="button" class="chip" data-cat="<?= htmlspecialchars($c) ?>"><?= htmlspecialchars($c) ?></button>
                <?php endforeach; ?>
            </div>

            <div class="news-grid">
                <?php foreach ($news_items as $n): ?>
                    <article class="news-card reveal" data-cat="<?= htmlspecialchars($n['cat']) ?>">
                        <a href="#news" class="news-card-link">
                            <div class="news-card-img">
                                <img src="<?= htmlspecialchars($n['img']) ?>" alt="" loading="lazy">
                            </div>
                            <div class="news-card-body">
                                <div class="news-card-meta">
                                    <span class="news-card-date"><?= htmlspecialchars($n['date']) ?></span>
                                    <span class="news-card-cat"><?= htmlspecialchars($n['cat']) ?></span>
                                </div>
                                <h3 class="news-card-title"><?= htmlspecialchars($n['title']) ?></h3>
                            </div>
                        </a>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <script>
    (function () {
        var chips = document.querySelectorAll('#news .chip');
        var cards = document.querySelectorAll('#news .news-card');
        chips.forEach(function (chip) {
            chip.addEventListener('click', function () {
                var cat = chip.getAttribute('data-cat');
                chips.forEach(function (c) { c.classList.toggle('active', c === chip); });
                cards.forEach(function (card) {
                    card.hidden = cat !== 'all' && card.getAttribute('data-cat') !== cat;
                });
            });
        });
    })();
    </script>
