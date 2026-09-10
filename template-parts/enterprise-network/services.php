<?php
if (!defined('ABSPATH')) {
    exit();
}

$enterprise_services_label = get_field('enterprise_services_label');
$enterprise_services_title = get_field('enterprise_services_title');
$enterprise_services_description = get_field(
    'enterprise_services_description',
);

$enterprise_services = [];
for ($i = 1; $i <= 4; $i++) {
    $enterprise_services[] = [
        'img' => get_field("enterprise_service_{$i}_image"),
        'title' => get_field("enterprise_service_{$i}_title"),
        'para' => get_field("enterprise_service_{$i}_description"),
        'link' => get_field("enterprise_service_{$i}_button_link"),
        'btn_text' => get_field("enterprise_service_{$i}_button_text"),
    ];
}
?>

<section class="enterprise-services pt-[7%] pb-[10%] md:py-20 sm:py-16" data-section="enterprise-services">
    <div class="w-full px-[5vw] md:px-[7vw]">
        <div class="text-left">
            <div class="flex items-center justify-start gap-3 mb-12 md:mb-10" data-animate="fade-up">
                <span class="w-6 h-1 bg-brand-secondary"></span>
                <span class="font-body  text-brand-secondary text-30 sm:text-[4vw]"><?php echo trac_esc_html(
                    $enterprise_services_label,
                ); ?></span>
            </div>

            <h2 data-heading-anim class="font-heading text-66 font-normal leading-[1.3] tracking-[0.01em] text-text-primary mb-[2vw] text-left sm:mb-[6vw]">
                <?php echo trac_esc_html($enterprise_services_title); ?>
            </h2>

            <p class="w-[70%] font-body text-24 leading-[1.45] text-text-body  mb-[2.6vw]  md:mb-8 text-left md:w-full sm:mb-[10vw]" data-para-anim data-delay="0.2">
                <?php echo trac_esc_html($enterprise_services_description); ?>
            </p>

            <div class="grid grid-cols-2 gap-10 mt-[5vw] md:grid-cols-1 md:gap-8 text-left">
                <?php foreach ($enterprise_services as $index => $card): ?>
                    <div
                        class="bg-brand-tertiary rounded-[32px] p-10 flex flex-col min-h-[22.9vw] md:min-h-0 md:p-8 text-left md:rounded-[4vw]"
                        data-animate="fade-up"
                        <?php if ($index > 0): ?>
                            data-delay="<?php echo esc_attr($index * 0.1); ?>"
                        <?php endif; ?>
                    >
                        <div>
                            <div class="size-[4.5vw] md:size-[7vw] sm:size-[10vw] mb-10 sm:mb-6">
                                <img src="<?php echo esc_url(
                                    $card['img'],
                                ); ?>" alt="services" class="w-full h-full" loading="lazy">
                            </div>

                            <h3 class="font-heading text-white text-36  mb-6 font-normal sm:!text-[7vw] sm:mb-4 leading-[1.3]">
                                <?php echo trac_esc_html($card['title']); ?>
                            </h3>

                            <p class="font-body text-white leading-[1.45] mb-3 text-[1.1vw] md:text-[2.5vw] sm:text-[4vw]">
                                <?php echo trac_esc_html($card['para']); ?>
                            </p>
                        </div>

                        <div class="mt-auto pt-10 w-full">
                            <a href="<?php echo esc_url(
                                $card['link'],
                            ); ?>" class="btn btn-primary group magnetic w-full!">
                        <span class="btn-line"></span>
                        <span class="btn-text"><?php echo trac_esc_html(
                            $card['btn_text'],
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
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
