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
