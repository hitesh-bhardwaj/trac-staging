<?php
if (!defined('ABSPATH')) {
    exit();
}

$client_logos = [
    [
        'src' => get_template_directory_uri() . '/src/imgs/home/clients/pccw.png',
        'alt' => 'PCCW',
    ],
    [
        'src' => get_template_directory_uri() . '/src/imgs/home/clients/us-embassy.png',
        'alt' => 'US Embassy',
    ],
    [
        'src' => get_template_directory_uri() . '/src/imgs/home/clients/goodlife.png',
        'alt' => 'GoodLife',
    ],
    [
        'src' => get_template_directory_uri() . '/src/imgs/home/clients/vodacom.png',
        'alt' => 'Vodacom',
    ],
    [
        'src' => get_template_directory_uri() . '/src/imgs/home/clients/nttdata.png',
        'alt' => 'NTT Data',
    ],
    [
        'src' => get_template_directory_uri() . '/src/imgs/home/clients/total-energies.png',
        'alt' => 'Total Energies',
    ],
    [
        'src' => get_template_directory_uri() . '/src/imgs/home/clients/pwc.png',
        'alt' => 'PWC',
    ],
    [
        'src' => get_template_directory_uri() . '/src/imgs/home/clients/serena.png',
        'alt' => 'Serena Hotels',
    ],
    [
        'src' => get_template_directory_uri() . '/src/imgs/home/clients/rca.png',
        'alt' => 'RCA',
    ],
];
?>

<section class="clients-section relative bg-white overflow-hidden" data-section="clients">
    <div class="clients-container w-full  py-[3.5vw] md:px-[4vw] md:py-16 sm:px-[6vw] sm:py-12">
        <div
            class="clients-marquee"
            data-animate="fade-up"
            data-delay="0.2"
        >
            <div class="clients-marquee-track">
                <?php for ($set = 0; $set < 2; $set++) : ?>
                    <div class="clients-marquee-group" aria-hidden="<?php echo $set === 0 ? 'false' : 'true'; ?>">
                        <?php foreach ($client_logos as $logo) : ?>
                            <div class="client-logo-card flex items-center justify-center p-[2vw] aspect-[327/239] md:p-6 sm:p-4">
                                <img
                                    src="<?php echo esc_url($logo['src']); ?>"
                                    alt="<?php echo $set === 0 ? esc_attr($logo['alt']) : ''; ?>"
                                    class="client-logo-image  w-auto h-auto object-contain md:max-w-32 md:max-h-14 sm:max-w-24 sm:max-h-10"
                                >
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</section>
