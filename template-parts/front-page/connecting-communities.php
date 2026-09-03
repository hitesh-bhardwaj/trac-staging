<?php
if (!defined('ABSPATH')) {
    exit();
}

$section_label =
    get_field('communities_section_label') ?: 'Connecting Communities';

$section_title =
    get_field('communities_section_title') ?:
    'Building the Foundation for Rural Digitisation';

$section_content_1 =
    get_field('communities_section_content_1') ?:
    'Beyond delivering reliable internet and strong customer support, we continuously invest in infrastructure that enables wider access. Through long-term partnerships and ongoing optimisation, we ensure our networks evolve alongside the needs of people and organisations across Rwanda and East Africa.';

$section_content_2 =
    get_field('communities_section_content_2') ?:
    'The Connecting Communities (CC) platform builds on this connectivity, with TrAC enabling the rollout of Community Smart Hubs across Rwanda and across East Africa. CC and TrAC are bringing access to financial services, education, clean water, and digital tools.';

$button_text = get_field('communities_button_text') ?: 'Read More';

$button_link = get_field('communities_button_link') ?: '#';

$section_image =
    get_field('communities_section_image') ?:
    get_template_directory_uri() . '/src/imgs/home/connecting-communities.png';

$section_image_alt =
    get_field('communities_section_image_alt') ?: 'Connecting communities';
?>

<section
    class="connecting-communities-section relative w-full bg-brand-quaternary px-[5vw] py-[7vw] text-white md:py-[10vw] sm:px-[6vw] sm:py-[16vw]"
    data-section="connecting-communities"
>
    <div class="grid w-full grid-cols-[0.9fr_1fr] items-center gap-[6vw] md:grid-cols-1 md:gap-[8vw]">
        <div class="flex flex-col items-start">
            <div
                class="mb-[4vw] flex items-center justify-start gap-[1.2vw] md:mb-[5vw] md:gap-3 sm:mb-[8vw]"
                data-animate="fade-up"
            >
                <span class="h-[0.2vw] w-[1.5vw] bg-white md:h-[3px] md:w-6 sm:w-5"></span>

                <span class="font-body text-30 leading-none text-white md:text-xl sm:text-[4.5vw]">
                    <?php echo esc_html($section_label); ?>
                </span>
            </div>

            <h2
                class="font-heading flex w-full flex-col text-66 leading-[1.12] tracking-[0.01em] text-white md:text-4xl sm:text-3xl"
            >
                <span data-heading-anim>

                <?php echo esc_html($section_title); ?>
                 </span>
            </h2>

            <div class="mt-[2.8vw] max-w-[46vw] space-y-[2.2vw] font-body text-24">
                <p data-para-anim>
                    <?php echo esc_html($section_content_1); ?>
                </p>

                <p data-para-anim>
                    <?php echo esc_html($section_content_2); ?>
                </p>
            </div>
<div data-animate="fade-up">

             <a  href="<?php echo esc_url(
                 get_field('hero_primary_button_link') ?: '/connecting-communities',
             ); ?>" class="btn btn-primary group magnetic mt-[3vw]">
                        <span class="btn-line"></span>
                        <span class="btn-text"><?php echo esc_html(
                            'Read More',
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

        <div
            class="relative h-[50vw] w-full overflow-hidden rounded-[0.9vw] md:h-[58vw] md:rounded-[2vw] sm:h-[68vw] sm:rounded-[4vw]"
            data-animate="fade-up"
        >
            <img
                src="<?php echo esc_url($section_image); ?>"
                alt="<?php echo esc_attr($section_image_alt); ?>"
                class="h-full w-full object-cover"
                loading="lazy"
            >
        </div>
    </div>
</section>
