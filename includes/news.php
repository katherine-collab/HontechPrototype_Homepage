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
                <div class="news-spotlight-text">
                    <span class="news-spotlight-year">Est. 2020 &middot; Celebrating 2026</span>
                    <h3>We're Turning <span>6</span>!</h3>
                    <p>To celebrate six incredible years of driving together, we're giving back to the community that made it possible! Join us for our 6th Anniversary Celebration and take advantage of our exclusive Free PMS Week!</p>
                    <p class="news-spotlight-highlight">
                        <i data-lucide="car-front" style="width:18px;height:18px"></i>
                        <span><strong>First-Come, First-Served:</strong> the first 2 clients to arrive each day for one full week get 100% FREE Labor &amp; Materials for Preventive Maintenance Service (PMS). Mark your calendars, set your alarms, and let us take care of your ride on us!</span>
                    </p>
                    <a href="#book" class="btn-primary news-spotlight-cta">
                        <i data-lucide="calendar-check" style="width:16px;height:16px"></i>
                        Claim Your Free PMS Slot
                    </a>
                    <div class="news-spotlight-sign">
                        <span>Sincerely,</span>
                        <strong>Nicodemus L. De Guzman</strong>
                        <span>President / General Manager</span>
                    </div>
                </div>
                <div class="news-spotlight-media">
                    <img src="images/service-image.jpg" alt="Hontech Auto Center Inc. technicians servicing a vehicle" loading="lazy">
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
