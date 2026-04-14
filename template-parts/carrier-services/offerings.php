<?php
if (!defined('ABSPATH')) {
    exit();
}

$label = 'Our Offering';
$title = 'Flexible Solutions for Every Stage of Growth';

$offerings = [
    [
        'number' => '01',
        'title' => 'Internet Transit',
        'desc' =>
            'Reliable access to national and international connectivity with scalable bandwidth to match your needs.',
    ],
    [
        'number' => '02',
        'title' => 'Turn-Key ISP Infrastructure',
        'desc' =>
            'End-to-end infrastructure support for operators looking to launch, expand, or strengthen service delivery.',
    ],
    [
        'number' => '03',
        'title' => 'Data Centre & Colocation',
        'desc' =>
            'Secure hosting environments with dependable uptime, operational flexibility, and room to scale.',
    ],
    [
        'number' => '04',
        'title' => 'White-Label Cloud & Managed Platforms',
        'desc' =>
            'Managed platforms that help operators deploy branded digital services faster and with less operational friction.',
    ],
];
?>

<section class="our-offering-section relative bg-white py-[7vw] md:py-20 sm:py-16 min-h-[400vh]" data-section="our-offering">
    <div class="our-offering-sticky sticky top-[5%]">
        <div class="w-full px-[5.21vw] md:px-[4vw] sm:px-[6vw]">
            <div class="max-w-[92rem] mx-auto">
                <div class="text-center w-fit mx-auto">
                    <div class="flex items-center justify-center gap-3 mb-14 md:mb-6" data-animate="fade-up">
                        <span class="w-6 h-1 bg-brand-primary"></span>
                        <span class="font-body text-base text-[#111]">
                            <?php echo esc_html($label); ?>
                        </span>
                    </div>

                    <h2 class="font-heading text-[3.75vw] font-normal leading-[1.12] tracking-[0.01em] text-text-primary md:text-5xl sm:text-4xl" data-animate="fade-up" data-delay="0.1">
                        <?php echo esc_html($title); ?>
                    </h2>
                </div>

                <div class="our-offering-content mx-auto mt-[6vw] max-w-[45vw] md:mt-12 md:max-w-full">
                    <div class="our-offering-list flex flex-col gap-[1vw] md:gap-4">
                        <?php foreach ($offerings as $index => $item): ?>
                            <article
                                class="our-offering-item<?php echo $index === 0
                                    ? ' is-active'
                                    : ''; ?>"
                                data-offering-item
                                data-offering-index="<?php echo esc_attr(
                                    $index,
                                ); ?>"
                            >
                                <div class="our-offering-item__head">
                                    <h3 class="our-offering-item__title">
                                        <?php echo esc_html($item['title']); ?>
                                    </h3>
                                    <span class="our-offering-item__number">
                                        <?php echo esc_html($item['number']); ?>
                                    </span>
                                </div>

                                <div class="our-offering-item__divider"></div>

                                <div class="our-offering-item__body">
                                      <div class="our-offering-item__body-inner">
                                         <p>
            <?php echo esc_html($item['desc']); ?>
        </p>
       
    </div>
</div>
                            </article>
                        <?php endforeach; ?>
                    </div>

                    <div class="our-offering-cta mt-[4.8vw] text-center md:mt-10">
                        <p class="mx-auto max-w-[42vw] font-body text-body-lg leading-[1.4] text-text-body md:max-w-[640px] md:text-lg sm:max-w-full sm:text-base">
                            Tell us what your network requires, and our team will design a solution that fits.
                        </p>

                        <div class="mt-[2vw] md:mt-6">
                            <a href="#" class="btn btn-primary group magnetic inline-flex">
                                <span class="btn-line"></span>
                                <span class="btn-text">Request a Quote</span>
                                <span class="btn-icon" aria-hidden="true">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="1.71429" cy="1.71429" r="1.71429" fill="currentColor"/>
                                        <circle cx="11.9994" cy="1.71429" r="1.71429" fill="currentColor"/>
                                        <circle cx="11.9994" cy="12" r="1.71429" fill="currentColor"/>
                                        <circle cx="22.2866" cy="12" r="1.71429" fill="currentColor"/>
                                        <circle cx="1.71429" cy="22.2857" r="1.71429" fill="currentColor"/>
                                        <circle cx="11.9994" cy="22.2857" r="1.71429" fill="currentColor"/>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>