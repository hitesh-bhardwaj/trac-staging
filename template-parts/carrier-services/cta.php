<?php
if (!defined('ABSPATH')) {
    exit();
}

// Get CTA section settings
$cta_title = get_field('cta_title') ?: 'Ready to Get Connected?';
$cta_subtitle =
    get_field('cta_subtitle') ?:
    "Fast, reliable home internet is just a few steps away.
Get on TrAC today.";
$cta_button_text = get_field('cta_button_text') ?: 'Get Connected';
$cta_button_link = get_field('cta_button_link') ?: '#get-connected';
?>

<section class="cta-section relative bg-[#eef3fc] overflow-hidden" data-section="cta">
    <div class="cta-bg-pattern absolute inset-0 w-full h-full top-[-15%]">
        <svg width="1796" height="670" viewBox="0 0 1796 670" fill="none" xmlns="http://www.w3.org/2000/svg" data-cta-svg>
            <path d="M897.253 0.433594L897.753 669.434" stroke="#D9D9D9"/>
            <path d="M1795.73 0.433594C1795.73 0.433594 1480.02 188.66 1307.73 346.434C1181.94 461.627 1013.73 669.434 1013.73 669.434" stroke="#D9D9D9"/>
            <path d="M156.253 0.433594C156.253 0.433594 459.317 171.52 600.753 346.434C692.225 459.557 802.34 669.434 802.34 669.434" stroke="#D9D9D9"/>
            <path d="M1639.73 0.433594C1639.73 0.433594 1336.67 171.52 1195.23 346.434C1103.76 459.557 993.644 669.434 993.644 669.434" stroke="#D9D9D9"/>
            <path d="M312.253 0.433594C312.253 0.433594 588.919 172.632 695.253 346.434C765.457 461.18 822.427 669.434 822.427 669.434" stroke="#D9D9D9"/>
            <path d="M1483.73 0.433594C1483.73 0.433594 1207.07 172.632 1100.73 346.434C1030.53 461.18 973.558 669.434 973.558 669.434" stroke="#D9D9D9"/>
            <path d="M468.253 0.433594C468.253 0.433594 691.966 180.748 765.753 346.434C817.782 463.261 842.514 669.434 842.514 669.434" stroke="#D9D9D9"/>
            <path d="M1327.73 0.433594C1327.73 0.433594 1104.02 180.748 1030.23 346.434C978.203 463.261 953.471 669.434 953.471 669.434" stroke="#D9D9D9"/>
            <path d="M624.253 0.433594C624.253 0.433594 778.46 208.825 825.753 346.434C869.573 473.939 862.601 669.434 862.601 669.434" stroke="#D9D9D9"/>
            <path d="M1171.73 0.433594C1171.73 0.433594 1017.52 208.825 970.231 346.434C926.411 473.939 933.384 669.434 933.384 669.434" stroke="#D9D9D9"/>
            <path d="M780.253 0.433594C780.253 0.433594 843.514 209.91 863.753 346.434C882.333 471.762 882.688 669.434 882.688 669.434" stroke="#D9D9D9"/>
            <path d="M1015.73 0.433594C1015.73 0.433594 952.471 209.91 932.231 346.434C913.652 471.762 913.297 669.434 913.297 669.434" stroke="#D9D9D9"/>
            <path d="M0.25293 0.433594C0.25293 0.433594 315.961 188.66 488.253 346.434C614.046 461.627 782.253 669.434 782.253 669.434" stroke="#D9D9D9"/>
            
            <defs>
                <linearGradient id="paint0_linear_329_19266" x1="1388.75" y1="224" x2="1432.49" y2="178.5" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#10417F"/>
                    <stop offset="1" stop-color="white" stop-opacity="0"/>
                </linearGradient>
                <linearGradient id="paint1_linear_329_19266" x1="1320.25" y1="167" x2="1365.08" y2="119.726" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#10417F"/>
                    <stop offset="1" stop-color="white" stop-opacity="0"/>
                </linearGradient>
                <linearGradient id="paint2_linear_329_19266" x1="1246.75" y1="131" x2="1278.79" y2="79.0764" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#10417F"/>
                    <stop offset="1" stop-color="white" stop-opacity="0"/>
                </linearGradient>
                <linearGradient id="paint3_linear_329_19266" x1="1157.25" y1="101" x2="1170.68" y2="46.0217" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#10417F"/>
                    <stop offset="1" stop-color="white" stop-opacity="0"/>
                </linearGradient>
                <linearGradient id="paint4_linear_329_19266" x1="1049.75" y1="91.5" x2="1031.82" y2="56.5279" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#10417F"/>
                    <stop offset="1" stop-color="white" stop-opacity="0"/>
                </linearGradient>
                <linearGradient id="paint5_linear_329_19266" x1="931.752" y1="80.5" x2="923.467" y2="78.7016" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#10417F"/>
                    <stop offset="1" stop-color="white" stop-opacity="0"/>
                </linearGradient>
                <linearGradient id="paint6_linear_329_19266" x1="802.614" y1="75.1336" x2="775.885" y2="71.8353" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#10417F"/>
                    <stop offset="1" stop-color="white" stop-opacity="0"/>
                </linearGradient>
                <linearGradient id="paint7_linear_329_19266" x1="673.592" y1="68.8576" x2="623.007" y2="54.1492" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#10417F"/>
                    <stop offset="1" stop-color="white" stop-opacity="0"/>
                </linearGradient>
                <linearGradient id="paint8_linear_329_19266" x1="534.457" y1="57.0501" x2="475.819" y2="29.8294" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#10417F"/>
                    <stop offset="1" stop-color="white" stop-opacity="0"/>
                </linearGradient>
                <linearGradient id="paint9_linear_329_19266" x1="394.117" y1="54.9376" x2="336.21" y2="20.7446" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#10417F"/>
                    <stop offset="1" stop-color="white" stop-opacity="0"/>
                </linearGradient>
                <linearGradient id="paint10_linear_329_19266" x1="238.933" y1="49.5904" x2="183.217" y2="12.623" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#10417F"/>
                    <stop offset="1" stop-color="white" stop-opacity="0"/>
                </linearGradient>
                <linearGradient id="paint11_linear_329_19266" x1="148.752" y1="93" x2="91.752" y2="57" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#10417F"/>
                    <stop offset="1" stop-color="white" stop-opacity="0"/>
                </linearGradient>
            </defs>
        </svg>
    </div>

    <div class="cta-container relative z-[10] w-full px-[5.21vw] py-[10.417vw] md:px-[4vw] md:py-32 sm:px-[6vw] sm:py-24 ">
        <div class="cta-content text-center max-w-[51vw] mx-auto mt-[5vw] md:max-w-full space-y-[15vw]">
            <div>
                <h2 class="cta-title font-heading text-[3.438vw] leading-[1.12] tracking-[0.01em] text-[#111] mb-[1.563vw] md:text-4xl md:mb-4 sm:text-3xl sm:mb-3" data-heading-anim>
                    <?php echo esc_html($cta_title); ?>
                </h2>

                <p class="cta-subtitle font-body text-[1.25vw] leading-[1.5] text-[#1e1e1e] mb-[4.167vw] md:text-lg md:mb-10 sm:text-base sm:mb-8 w-[85%] mx-auto " data-para-anim data-delay="0.1">
                    <?php echo esc_html($cta_subtitle); ?>
                </p>

                <div class="cta-button-wrapper mt-[12vw]" data-animate="fade-up" data-delay="0.2">
                    <a href="<?php echo esc_url($cta_button_link); ?>" class="btn btn-primary group magnetic inline-flex">
                        <span class="btn-line"></span>
                        <span class="btn-text"><?php echo esc_html(
                            $cta_button_text,
                        ); ?></span>
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
</section>
