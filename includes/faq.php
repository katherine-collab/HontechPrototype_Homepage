    <!-- ═══════════════════════════════════════
         FAQ (built from the FQA poster set: images/faq/faq-01..18.jpg, cover faq-00.jpg)
         ═══════════════════════════════════════ -->
    <?php
    // Each item = one poster. 'img' is the optimized copy of the original in images/FQA images/.
    $faq_items = [
        ['cat' => 'Trust & Safety',    'n' => 1,  'q' => 'Why choose us?',
         'a' => 'Because we are committed to providing Fast Service, Trusted Quality, and Exceptional Value through a systematic CASA-inspired service process, experienced technicians, quality workmanship, and outstanding customer care.'],
        ['cat' => 'Service',           'n' => 2,  'q' => 'How fast is your PMS (Preventive Maintenance Service)?',
         'a' => 'Our Express Lane PMS is designed for qualified services with a targeted completion time of as fast as 120 minutes, subject to online reservation, service requirements, and operating conditions.'],
        ['cat' => 'Trust & Safety',    'n' => 3,  'q' => 'Are your technicians experienced?',
         'a' => 'Our technicians are experienced automotive professionals, many of whom are former CASA technicians. The majority of our workforce are also company owners/shareholders, reflecting their commitment to quality workmanship and customer satisfaction.'],
        ['cat' => 'Trust & Safety',    'n' => 4,  'q' => 'Is my vehicle safe in your shop?',
         'a' => 'Yes. Our shop is equipped with CCTV cameras, and only authorized personnel are allowed to handle customer vehicles. We also follow proper receiving and releasing procedures to help ensure your vehicle\'s safety and security.'],
        ['cat' => 'Service',           'n' => 5,  'q' => 'Do you perform quality inspections?',
         'a' => 'Every vehicle undergoes a Quality Control Inspection before work begins and again before release to help ensure dependable workmanship and customer satisfaction.'],
        ['cat' => 'Pricing & Payment', 'n' => 6,  'q' => 'Are your prices competitive?',
         'a' => 'We offer competitive and fair pricing without compromising the quality of our workmanship, replacement parts, or customer service. We are committed to delivering excellent value for your investment.'],
        ['cat' => 'Pricing & Payment', 'n' => 7,  'q' => 'Do you provide a warranty?',
         'a' => 'Yes. We provide a longer warranty period than many repair shops. Covered repair-related concerns occurring within the warranty period will be addressed in accordance with our warranty terms and conditions.'],
        ['cat' => 'Trust & Safety',    'n' => 8,  'q' => 'Why should I trust you?',
         'a' => 'We educate car owners rather than profit off quick repairs. We perform a mandatory Actual & Visual Inspection before any work begins to ensure an accurate evaluation, eliminate trial-and-error costs, and save you money by fixing only what is necessary.'],
        ['cat' => 'Service',           'n' => 9,  'q' => 'Do you offer roadside assistance?',
         'a' => 'Roadside assistance and home service may be available through our online communication channels, subject to availability and service coverage. Our Service Advisors are also available to provide guidance.'],
        ['cat' => 'About Us',          'n' => 10, 'q' => 'Is there a comfortable waiting area?',
         'a' => 'Yes. We provide a clean, comfortable, and air-conditioned waiting area where customers can relax while waiting for their vehicles.'],
        ['cat' => 'Trust & Safety',    'n' => 11, 'q' => 'Are your employees friendly?',
         'a' => 'Our team is committed to providing friendly, courteous, honest, and professional service from the moment you arrive until your vehicle is released.'],
        ['cat' => 'Pricing & Payment', 'n' => 12, 'q' => 'How do I pay?',
         'a' => 'We accept cash, GCash, checks, and major credit and debit cards.'],
        ['cat' => 'Pricing & Payment', 'n' => 13, 'q' => 'Do you offer discounts?',
         'a' => 'Yes. Qualified customers may benefit from referral rewards, loyalty programs, first-time customer offers, fleet account packages, car club discounts, and seasonal or social media promotions.'],
        ['cat' => 'About Us',          'n' => 14, 'q' => 'Are you open every day?',
         'a' => 'We are open seven (7) days a week, except on selected regular holidays, which will be announced in advance.'],
        ['cat' => 'Service',           'n' => 15, 'q' => 'Do you keep my vehicle\'s service history?',
         'a' => 'Yes. We maintain your vehicle\'s service history, including maintenance, repairs, parts replaced, and recommendations, helping us provide more accurate service during your future visits.'],
        ['cat' => 'About Us',          'n' => 16, 'q' => 'Are you an accredited training ground?',
         'a' => 'Yes! Hontech Auto Center is proud to be an accredited training ground for Automotive Technology students. We provide hands-on training, real industry experience, technical skill development, and mentorship from experienced automotive professionals.'],
        ['cat' => 'About Us',          'n' => 17, 'q' => 'Are you expanding?',
         'a' => 'Our Regalado Branch continues to serve motorists in Quezon City and nearby areas. We are also evaluating a proposed second branch in Laloma, Quezon City, as part of our long-term expansion plans.'],
        ['cat' => 'Service',           'n' => 18, 'q' => 'What\'s coming next?',
         'a' => 'Yes. We are preparing to launch our Senior Citizen & Priority Express Lane to provide faster and more convenient service for qualified customers.'],
    ];
    $faq_cats = array_values(array_unique(array_column($faq_items, 'cat')));
    ?>
    <section class="section" id="faq">
        <div class="container">
            <div class="reveal">
                <div class="section-label">Support Center</div>
                <h2 class="section-title">Frequently Asked Questions</h2>
                <p class="section-subtitle">Got questions about car care? We've got answers.</p>
            </div>

            <div class="qa-filters reveal" role="group" aria-label="Filter questions by category">
                <span class="news-filters-label">Filter by category</span>
                <button type="button" class="chip active" data-cat="all">All</button>
                <?php foreach ($faq_cats as $c): ?>
                    <button type="button" class="chip" data-cat="<?= htmlspecialchars($c) ?>"><?= htmlspecialchars($c) ?></button>
                <?php endforeach; ?>
            </div>

            <div class="qa-layout">
                <aside class="qa-cover reveal-left">
                    <!-- Swaps to the poster of whichever question below is open; starts on the cover poster. -->
                    <button type="button" class="qa-poster-btn" id="qaCoverBtn" data-poster="images/faq/faq-00.jpg" aria-label="View this poster larger">
                        <img src="images/faq/faq-00.jpg" alt="Hontech Auto Center Frequently Asked Questions poster" id="qaCoverImg" loading="lazy">
                    </button>
                </aside>

                <div class="qa-list">
                    <?php foreach ($faq_items as $i => $it):
                        $img = sprintf('images/faq/faq-%02d.jpg', $it['n']); ?>
                        <details class="qa-item reveal" data-cat="<?= htmlspecialchars($it['cat']) ?>" data-poster="<?= $img ?>" data-poster-alt="Poster: <?= htmlspecialchars($it['q']) ?>">
                            <summary>
                                <span class="qa-num"><?= sprintf('%02d', $i + 1) ?></span>
                                <span class="qa-q"><?= htmlspecialchars($it['q']) ?></span>
                                <i data-lucide="chevron-down" class="qa-chevron" style="width:20px;height:20px"></i>
                            </summary>
                            <div class="qa-body">
                                <span class="qa-cat"><?= htmlspecialchars($it['cat']) ?></span>
                                <p><?= htmlspecialchars($it['a']) ?></p>
                                <a href="#book" class="qa-book">Book Now</a>
                            </div>
                        </details>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <dialog class="qa-lightbox" id="qaLightbox" aria-label="FAQ poster">
            <form method="dialog"><button class="qa-lightbox-close" aria-label="Close">&times;</button></form>
            <img src="" alt="FAQ poster">
        </dialog>
    </section>

    <script>
    (function () {
        var root = document.getElementById('faq');
        var items = root.querySelectorAll('.qa-item');
        var chips = root.querySelectorAll('.qa-filters .chip');
        chips.forEach(function (chip) {
            chip.addEventListener('click', function () {
                var cat = chip.getAttribute('data-cat');
                chips.forEach(function (c) { c.classList.toggle('active', c === chip); });
                items.forEach(function (it) {
                    it.hidden = cat !== 'all' && it.getAttribute('data-cat') !== cat;
                });
            });
        });

        // Left poster: follows whichever question is open. Only one question stays open at a time
        // so the poster always matches what's on screen.
        var coverBtn = document.getElementById('qaCoverBtn');
        var coverImg = document.getElementById('qaCoverImg');
        var coverDefaultSrc = coverImg.getAttribute('src');
        var coverDefaultAlt = coverImg.getAttribute('alt');

        items.forEach(function (item) {
            item.addEventListener('toggle', function () {
                if (item.open) {
                    items.forEach(function (other) { if (other !== item) other.open = false; });
                    coverImg.src = item.getAttribute('data-poster');
                    coverImg.alt = item.getAttribute('data-poster-alt');
                    coverBtn.setAttribute('data-poster', item.getAttribute('data-poster'));
                    // On mobile the poster sits above the list rather than beside it; bring it into view.
                    if (window.innerWidth <= 900) {
                        coverBtn.closest('.qa-cover').scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                } else if (![].some.call(items, function (i) { return i.open; })) {
                    coverImg.src = coverDefaultSrc;
                    coverImg.alt = coverDefaultAlt;
                    coverBtn.setAttribute('data-poster', coverDefaultSrc);
                }
            });
        });

        var box = document.getElementById('qaLightbox');
        var boxImg = box.querySelector('img');
        coverBtn.addEventListener('click', function () {
            boxImg.src = coverBtn.getAttribute('data-poster');
            boxImg.alt = coverImg.alt;
            box.showModal();
        });
        box.addEventListener('click', function (e) { if (e.target === box) box.close(); });
    })();
    </script>
