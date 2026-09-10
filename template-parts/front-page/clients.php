<?php
if (!defined('ABSPATH')) {
    exit();
}

$client_logos = [];

for ($i = 1; $i <= 9; $i++) {
    $image = get_field("client_{$i}_image");
    $alt = get_field("client_{$i}_alt");

    if ($image) {
        $client_logos[] = [
            'src' => is_array($image) ? $image['url'] : $image,
            'alt' => $alt,
        ];
    }
}
?>

<section class="relative bg-white overflow-hidden min-h-auto" data-section="clients" id="clients">
    <div class="clients-container w-full  py-[3.5vw] md:py-0">
        <div
            class="clients-marquee w-full overflow-hidden [--clients-logo-gap:3vw] md:[--clients-logo-gap:40px] sm:[--clients-logo-gap:28px]"
            data-animate="fade-up"
            data-delay="0.2"
        >
            <div class="clients-marquee-track flex w-max [animation:clients-marquee_28s_linear_infinite] [will-change:transform] hover:[animation-play-state:paused]">
                <?php for ($set = 0; $set < 2; $set++): ?>
                    <div class="clients-marquee-group flex flex-[0_0_auto] gap-[var(--clients-logo-gap)] pr-[var(--clients-logo-gap)] [&[aria-hidden='true']]:sm:hidden" aria-hidden="<?php echo $set ===
                    0
                        ? 'false'
                        : 'true'; ?>">
                        <?php foreach ($client_logos as $logo): ?>
                            <div class="client-logo-card flex w-[17vw] flex-[0_0_17vw] items-center justify-center p-[2vw] aspect-[327/239] md:w-[220px] md:flex-[0_0_220px] md:p-6 sm:aspect-square sm:w-[170px] sm:flex-[0_0_170px] sm:p-4">
                                <img
                                    src="<?php echo esc_url($logo['src']); ?>"
                                    alt="<?php echo $set === 0
                                        ? esc_attr($logo['alt'])
                                        : ''; ?>"
                                    class="[filter:grayscale(0)] w-auto h-auto object-contain md:w-[20vw] sm:w-[30vw]"
                                >
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</section>
