<?php
if (!defined('ABSPATH')) {
    exit();
}

$label = get_field('partners_program_label') ?: 'Partner Program';
$title = get_field('partners_program_title') ?: 'What is the TrAC Partner Program?';
$p1 =
    get_field('partners_program_paragraph_1') ?:
    "The TrAC Partner Programme is a structured ecosystem designed to help companies grow alongside Africa's fastest-expanding connectivity network. Whether you manufacture hardware, own infrastructure, or sell managed services there's a partnership built for you.";
$p2 =
    get_field('partners_program_paragraph_2') ?:
    "Partners get access to TrAC's network, its customer base, its technical expertise, and a team that has been designing and operating networks across Africa for over 20 years.";

$cards = [
    [
        'title' => 'Technology Partners',
        'body' =>
            "TrAC's technology partner program is designed for hardware manufacturers, software developers, cybersecurity companies, and cloud solution providers who want to extend their reach across East and Central Africa.",
        // Reuse existing imagery already in the theme.
        'image' => TRAC_URI . '/src/imgs/partners/program-1.png',
        'offsetClass' => '',
        'delay' => '0',
    ],
    [
        'title' => 'Reseller Partners',
        'body' =>
            "The TrAC Reseller Program gives IT service companies, managed service providers, telecoms consultants, and systems integrators the ability to offer TrAC's full suite of connectivity solutions directly to their customers.",
        'image' => TRAC_URI . '/src/imgs/partners/program-2.png',
        'offsetClass' => '',
        'delay' => '0.3',
    ],
    [
        'title' => 'Infrastructure Partners',
        'body' =>
            "TrAC's network is only as strong as the physical infrastructure it runs on. Our Infrastructure Partner Programme is for tower companies, fibre operators, civil infrastructure owners, building landlords, and data centre operators.",
        'image' => TRAC_URI . '/src/imgs/partners/program-3.png',
        'offsetClass' => '',
        'delay' => '0.5',
    ],
];
?>

<section class="partners-program relative bg-white py-[7vw] md:py-20 sm:py-16" data-section="partners-program">
    <div class="w-full px-[5.21vw] md:px-[4vw] sm:px-[6vw]">
        <div class="max-w-[92rem] mx-auto">
            <div class="text-center max-w-[56rem] mx-auto">
                <div class="flex items-center justify-center gap-3 mb-8 md:mb-6" data-animate="fade-up">
                    <span class="w-6 h-1 bg-brand-primary"></span>
                    <span class="font-body text-base text-[#111]"><?php echo esc_html(
                        $label,
                    ); ?></span>
                </div>

                <h2 class="font-heading text-[3.438vw] font-normal leading-[1.24] tracking-[0.01em] text-text-primary mb-[1.5vw] md:text-4xl md:mb-6 sm:text-3xl" data-animate="fade-up" data-delay="0.1">
                    <?php echo esc_html($title); ?>
                </h2>

                <p class="font-body text-[1.25vw] leading-[1.58] text-text-body mb-[1.3vw] md:text-lg md:mb-5 sm:text-base" data-animate="fade-up" data-delay="0.2">
                    <?php echo esc_html($p1); ?>
                </p>
                <p class="font-body text-[1.25vw] leading-[1.58] text-text-body md:text-lg sm:text-base" data-animate="fade-up" data-delay="0.3">
                    <?php echo esc_html($p2); ?>
                </p>
            </div>

		            <div class="mt-[5vw] md:mt-12 space-y-[2.6vw] md:space-y-8 mx-auto flex flex-col items-center">
		                <?php foreach ($cards as $card): ?>
		                    <div class="<?php echo esc_attr(
		                        'w-full flex justify-center ' . $card['offsetClass'],
		                    ); ?>">
		                        <div class="bg-[#eef3fc] w-[80%] mx-auto rounded-[2vw] md:rounded-3xl overflow-hidden grid grid-cols-[minmax(0,0.9fr)_minmax(0,1.1fr)] md:grid-cols-1 items-stretch" data-partners-program-card>
		                            <div class="relative w-full h-full min-h-[16vw] md:min-h-[240px]">
		                                <img src="<?php echo esc_url(
		                                    $card['image'],
		                                ); ?>" alt="" class="absolute inset-0 w-full h-full object-cover" loading="lazy">
	                            </div>

                            <div class="p-[3vw] md:p-8 sm:p-6 flex flex-col">
                                <h3 class="font-body text-text-primary text-[1.823vw] md:text-2xl sm:text-xl mb-5 font-normal">
                                    <?php echo esc_html($card['title']); ?>
                                </h3>

                                <p class="font-body text-text-body text-[1.146vw] leading-[1.7] md:text-base sm:text-sm mb-8 md:mb-6">
                                    <?php echo esc_html($card['body']); ?>
                                </p>

                                <div class="mt-auto">
                                    <a href="<?php echo esc_url(
                                        '#',
                                    ); ?>" class="btn btn-primary group magnetic inline-flex">
                                        <span class="btn-line"></span>
                                        <span class="btn-text">Learn More</span>
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
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
