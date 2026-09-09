<?php
if (!defined('ABSPATH')) {
    exit();
}

$jobs = [];
$jobs_query = new WP_Query([
    'post_type' => 'job',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC',
]);

if ($jobs_query->have_posts()) {
    while ($jobs_query->have_posts()) {
        $jobs_query->the_post();
        $jobs[] = [
            'title' => get_the_title(),
            'location' => get_field('job_location'),
            'department' => get_field('job_department'),
            'para' => get_field('job_excerpt'),
            'apply_text' => get_field('job_apply_button_text'),
            'apply_link' => get_field('job_apply_link'),
        ];
    }
    wp_reset_postdata();
}

if (!$jobs) {
    return;
}

$positions_label = get_field('careers_positions_label');
$positions_title = get_field('careers_positions_title');
$apply_button_text = get_field('careers_positions_button_text');
?>

<section class="open-positions py-[7vw] md:py-20 sm:py-16" data-section="open-positions" id="open-positions">
    <div class="w-full px-[5vw] md:px-[4vw] sm:px-[6vw]">
        <div class="text-left">
            <div class="flex items-center justify-start gap-3 mb-12 md:mb-10" data-animate="fade-up">
                <span class="w-6 h-1 bg-brand-secondary"></span>
                <span class="font-body  text-brand-secondary text-30 sm:!text-[4vw]"><?php echo trac_esc_html(
                    $positions_label,
                ); ?></span>
            </div>

            <h2 data-heading-anim class="font-heading text-66 font-normal leading-[1.24] tracking-[0.01em] text-text-primary mb-[2vw]  md:mb-8  sm:mb-6 text-left">
                <?php echo trac_esc_html($positions_title); ?>
            </h2>

            <div class="grid grid-cols-2 gap-10 mt-[5vw] md:grid-cols-1 md:gap-8 text-left">
                <?php foreach ($jobs as $index => $card): ?>
                    <div
                        class="bg-brand-tertiary rounded-[1.2vw] p-9 flex flex-col h-fit md:min-h-0 md:p-8 text-left sm:rounded-[4vw]"
                        data-animate="fade-up"
                        <?php if ($index > 0): ?>
                            data-delay="<?php echo esc_attr($index * 0.1); ?>"
                        <?php endif; ?>
                    >
                        <div>
                            <h3 class="font-heading text-white text-36 md:text-2xl font-normal">
                                <?php echo trac_esc_html($card['title']); ?>
                            </h3>
                            <p class="font-body text-white leading-[1.7] mb-6 text-24">
                                <?php echo trac_esc_html(
                                    trim(
                                        $card['location'] .
                                            ($card['department']
                                                ? ' · ' . $card['department']
                                                : ''),
                                    ),
                                ); ?>
                            </p>

                            <p class="font-body text-white leading-[1.7] mb-3 text-[1.15vw] sm:!text-[4vw]">
                                <?php echo trac_esc_html($card['para']); ?>
                            </p>
                        </div>

                        <div class="mt-auto pt-10">
                            <a href="<?php echo esc_url(
                                $card['apply_link'] ?: '#job-application',
                            ); ?>" class="btn btn-primary group magnetic sm:!w-fit">
                        <span class="btn-line"></span>
                        <span class="btn-text"><?php echo trac_esc_html(
                            $card['apply_text'] ?: $apply_button_text,
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
