<?php
if (!defined('ABSPATH')) {
    exit();
    
}

$hero_connectors_svg_path =
    get_template_directory() . '/src/imgs/connectors.svg';
?>

?>


<section class="hero relative min-h-screen !bg-brand-primary overflow-hidden" data-section="hero" data-hero-static>
    <div class="hero-container w-full px-[5vw] relative z-[10] md:px-[4vw] md:pt-[120px] sm:px-[8vw] sm:pt-[100px]">
        <div class="hero-grid flex justify-between gap-[2.604vw] items-start md:flex-col md:gap-8">
            <div class="hero-text w-[70%] md:w-full md:max-w-full md:pt-8 sm:pt-4  relative z-[10]">
                <h1
                    class="hero-title font-heading text-white tracking-[0.05vw] mb-6 md:mb-6 sm:mb-4 md:text-center"
                    data-hero-reveal
                    data-heading-anim
                    data-base-delay="0.05"
                 >
                    <span class="block hero-title-line">
                        <?php echo esc_html(
                            get_field('hero_title_line_1') ?:
                            "Rwanda's Connectivity",
                        ); ?>
                    </span>
                    <span class="block hero-title-line">
                        <?php echo esc_html(
                            get_field('hero_title_line_2') ?: "Backbone. East Africa's",
                        ); ?>
                    </span>
                     <span class="block hero-title-line">
                        <?php echo esc_html(
                            get_field('hero_title_line_3') ?: 'Growth Partner.',
                        ); ?>
                    </span>
</h1>

                <p
                    class="text-24 font-body text-white w-[36vw] mb-[3.125vw] md:w-full md:max-w-full md:mb-8 sm:mb-6 md:text-center"
                    data-hero-reveal
                    data-hero-delay="0.14"
                    data-para-anim
                 >
                    <?php echo esc_html(
                        get_field('hero_subtitle_2') ?:
                        "Rooted in Rwanda, TrAC delivers reliable internet for enterprises, small businesses, homes, and the communities shaping the future of Rwanda and East Africa.",
                    ); ?>
                </p>

                <div
                    class="hero-cta flex flex-wrap gap-[1.042vw] md:gap-4 sm:flex-col sm:gap-3 md:items-center"
                    data-hero-reveal
                    data-hero-delay="0.22"
                 >
                    <a href="<?php echo esc_url(
                        get_field('hero_primary_button_link') ?:
                        '#get-connected',
                     ); ?>" class="btn btn-primary group magnetic">
                        <span class="btn-line"></span>
                        <span class="btn-text"><?php echo esc_html(
                            get_field('hero_primary_button_text') ?:
                            'Get on TrAC',
                        ); ?></span>
                        <span class="btn-icon">
                          <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M9.45369 8.66578C9.45369 8.86726 9.37668 9.06894 9.22286 9.22276L1.34483 17.1008C1.03699 17.4086 0.538513 17.4086 0.230876 17.1008C-0.0767616 16.793 -0.0769585 16.2945 0.230875 15.9868L7.55193 8.66578L0.230875 1.34473C-0.0769592 1.03689 -0.0769592 0.538408 0.230875 0.230772C0.538709 -0.0768662 1.03719 -0.0770627 1.34483 0.230772L9.22286 8.1088C9.37668 8.26262 9.45369 8.4643 9.45369 8.66578Z" fill="currentColor"/>
                          <path d="M16.4537 8.66578C16.4537 8.86726 16.3767 9.06894 16.2229 9.22276L8.34483 17.1008C8.03699 17.4086 7.53851 17.4086 7.23088 17.1008C6.92324 16.793 6.92304 16.2945 7.23088 15.9868L14.5519 8.66578L7.23087 1.34473C6.92304 1.03689 6.92304 0.538408 7.23087 0.230772C7.53871 -0.0768662 8.03719 -0.0770627 8.34483 0.230772L16.2229 8.1088C16.3767 8.26262 16.4537 8.4643 16.4537 8.66578Z" fill="currentColor"/>
                          </svg>

                        </span>
                    </a>

                    <a href="<?php echo esc_url(
                        get_field('hero_secondary_button_link') ?: '#products',
                     ); ?>" class="btn btn-outline group magnetic">
                        <span class="btn-line"></span>
                        <span class="btn-text"><?php echo esc_html(
                            get_field('hero_secondary_button_text') ?:
                            'Explore Products',
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

            
            <div class=" sm:block w-full h-screen absolute flex justify-end overflow-hidden -mt-4">
              <div class="w-[60%] h-full flex items-center justify-center relative">
                <img
                   src="<?php echo get_template_directory_uri(); ?>/src/imgs/hero-earth.webp"
                   alt="Mobile globe visual"
                   class="w-full h-full object-contain"
                   loading="lazy"
                  >
                     <div class="w-[115%] h-[115%] absolute top-[-8%] left-[-8%]  connectors-svg pointer-events-none" aria-hidden="true">
                     <?php
                     if (file_exists($hero_connectors_svg_path)) {
                         echo file_get_contents($hero_connectors_svg_path);
                     }
                     ?>
                     </div>
            </div>
         </div>
        </div>
    </div>

    
</section>
