<?php
if (!defined('ABSPATH')) {
    exit();
}

$label = get_field('cs_overview_label');
$title = get_field('cs_overview_title');
$description_paragraphs = trac_split_lines(
    get_field('cs_overview_description'),
);

$solution_image = get_field('cs_overview_image');
$solution_image_src = is_array($solution_image)
    ? $solution_image['url']
    : $solution_image;
$solution_title = get_field('cs_overview_card_title');
$solution_desc = get_field('cs_overview_card_desc');

$offerings = [];
for ($i = 1; $i <= 2; $i++) {
    $offerings[] = [
        'title' => get_field("cs_offering_{$i}_title"),
        'description' => get_field("cs_offering_{$i}_description"),
        'icon' => get_field("cs_offering_{$i}_icon"),
    ];
}

$button_text = get_field('cs_overview_button_text');
$button_link = get_field('cs_overview_button_link');
?>

<section class="carrier-overview relative bg-white px-[5vw] py-[6.25vw] md:py-16 md:px-[7vw] sm:py-12" data-section="solution-overview">
    <div class="mx-auto max-w-[92rem]">
        <div class="max-w-[60rem]">
            <div class="flex items-center justify-start gap-3 mb-10 md:mb-6" data-animate="fade-up">
                <span class="w-6 h-1 bg-brand-secondary"></span>
                <span class="font-body text-brand-secondary text-30 sm:!text-[4vw]"><?php echo trac_esc_html(
                    $label,
                ); ?></span>
            </div>

            <h2 class="font-heading text-[3.5vw] font-normal leading-[1.15] tracking-[0.01em] text-text-primary mb-[1.6vw] md:text-5xl md:mb-6 sm:text-4xl" data-heading-anim>
                <?php echo trac_esc_html($title); ?>
            </h2>

            <div class="space-y-[1.4vw] md:space-y-5">
                <?php foreach ($description_paragraphs as $index => $paragraph): ?>
                    <p class="font-body text-24 leading-[1.5] text-primary " data-para-anim data-delay="<?php echo esc_attr(
                        $index * 0.1,
                    ); ?>">
                        <?php echo trac_esc_html($paragraph); ?>
                    </p>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="mt-[5vw] md:mt-12 sm:mt-10" data-animate="fade-up" data-delay="0.15">
            <article class="flex w-full  bg-brand-quaternary rounded-[1.6vw]  overflow-hidden sm:flex-col sm:rounded-[3vw]">
                <div class="h-[30vw] w-[25vw] rounded-[1.6vw] md:h-72 sm:h-64 overflow-hidden sm:w-full group">
                    <img
                        src="<?php echo esc_url($solution_image_src); ?>"
                        alt="<?php echo esc_attr($solution_title); ?>"
                        class="h-full w-full object-cover scale-105 transition-transform duration-[600ms] ease-out group-hover:scale-100"
                        loading="lazy"
                    >
                </div>
                <div class=" p-[2.6vw] py-[3vw] md:p-10 sm:p-7 flex flex-col w-[70%] sm:w-full">
                    <h3 class="font-heading text-white text-[1.8vw] md:text-3xl font-normal mb-[1.4vw] md:mb-5">
                        <?php echo trac_esc_html($solution_title); ?>
                    </h3>
                    <p class="font-body text-white text-24 md:text-lg leading-[1.6] w-[70%] md:w-full">
                        <?php echo trac_esc_html($solution_desc); ?>
                    </p>
                </div>
            </article>
        </div>

        <div class="grid grid-cols-2 gap-[2.5vw] md:grid-cols-2 sm:grid-cols-1 md:gap-6 mt-[2.5vw] md:mt-6 items-stretch">
            <?php foreach ($offerings as $i => $o): ?>
                <div class="rounded-[1.4vw] md:rounded-3xl bg-brand-tertiary p-[2.5vw] md:p-10 sm:p-7 flex flex-col items-start gap-[2vw] md:gap-6" data-animate="fade-up" data-delay="<?php echo esc_attr(
                    0.1 * $i,
                ); ?>">
                    <img
                        src="<?php echo esc_url($o['icon']); ?>"
                        alt="offerings icon"
                        class="size-[4vw] md:w-12 md:h-12 object-contain" 
                        loading="lazy"
                    >
                    <div>
                        <h3 class="font-heading text-white text-36 md:text-2xl font-normal mb-[0.8vw] md:mb-3">
                            <?php echo trac_esc_html($o['title']); ?>
                        </h3>
                        <p class="font-body text-white text-24 md:text-base leading-[1.55] w-[88%]">
                            <?php echo trac_esc_html($o['description']); ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="flex justify-center mt-[3.2vw] md:mt-10" data-animate="fade-up" data-delay="0.2">
            <a href="<?php echo esc_url(
                $button_link,
            ); ?>" class="btn btn-primary group magnetic border border-brand-secondary">
                <span class="btn-line"></span>
                <span class="btn-text"><?php echo trac_esc_html(
                    $button_text,
                ); ?></span>
                <span class="btn-icon">
                    <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.45369 8.66578C9.45369 8.86726 9.37668 9.06894 9.22286 9.22276L1.34483 17.1008C1.03699 17.4086 0.538513 17.4086 0.230876 17.1008C-0.0767616 16.793 -0.0769585 16.2945 0.230875 15.9868L7.55193 8.66578L0.230875 1.34473C-0.0769592 1.03689 -0.0769592 0.538408 0.230875 0.230772C0.538709 -0.0768662 1.03719 -0.0770627 1.34483 0.230772L9.22286 8.1088C9.37668 8.26262 9.45369 8.4643 9.45369 8.66578Z" fill="currentColor"/>
                        <path d="M16.4537 8.66578C16.4537 8.86726 16.3767 9.06894 16.2229 9.22276L8.34483 17.1008C8.03699 17.4086 7.53851 17.4086 7.23088 17.1008C6.92324 16.793 6.92304 16.2945 7.23088 15.9868L14.5519 8.66578L7.23087 1.34473C6.92304 1.03689 6.92304 0.538408 7.23087 0.230772C7.53871 -0.0768662 8.03719 -0.0770627 8.34483 0.230772L16.2229 8.1088C16.3767 8.26262 16.4537 8.4643 16.4537 8.66578Z" fill="currentColor"/>
                    </svg>
                </span>
            </a>
        </div>
    </div>
</section>
