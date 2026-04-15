<?php
if (!defined('ABSPATH')) {
    exit();
}

$collaboration_items = $args['collaboration_items'] ?? [];
?>

<section class="communities-collaborations" data-section="communities-collaborations">
    <div class="communities-collaborations__grid">
        <div class="communities-collaborations__intro">
            <div class="communities-collaborations__eyebrow" data-animate="fade-up">
                <span class="communities-collaborations__eyebrow-line" aria-hidden="true"></span>
                <span class="communities-collaborations__eyebrow-text">Our Collaborations</span>
            </div>

            <h2 class="communities-collaborations__title" data-animate="fade-up" data-delay="0.1">
                Working Together to Bridge the Digital Divide
            </h2>

            <p class="communities-collaborations__description" data-para-anim data-delay="0.2">
                Real impact happens through collaboration. Our partnership
                with Connecting Communities Africa brings together
                investment, expertise, and a shared mission to create
                inclusive connectivity at scale.
            </p>
        </div>

        <div class="communities-collaborations__accordion" data-collab-accordion>
            <?php foreach ($collaboration_items as $index => $item): ?>
                <article
                    class="communities-collaborations__item"
                    data-collab-item
                    <?php echo $item['expanded'] ? 'data-open' : ''; ?>
                    data-animate="fade-up"
                    data-delay="<?php echo esc_attr(0.2 + $index * 0.05); ?>"
                >
                    <button
                        type="button"
                        class="communities-collaborations__button"
                        data-collab-trigger
                        aria-expanded="<?php echo $item['expanded'] ? 'true' : 'false'; ?>"
                        aria-controls="communities-collab-panel-<?php echo esc_attr($index); ?>"
                        id="communities-collab-trigger-<?php echo esc_attr($index); ?>"
                    >
                        <span class="communities-collaborations__icon-wrap" aria-hidden="true">
                            <img
                                src="<?php echo esc_url($item['icon']); ?>"
                                alt=""
                                class="communities-collaborations__icon"
                                loading="lazy"
                            >
                        </span>

                        <span class="communities-collaborations__divider" aria-hidden="true"></span>

                        <span class="communities-collaborations__content">
                            <span class="communities-collaborations__item-title">
                                <?php echo esc_html($item['title']); ?>
                            </span>
                            <span
                                class="communities-collaborations__content-body"
                                data-collab-panel
                                id="communities-collab-panel-<?php echo esc_attr($index); ?>"
                                aria-hidden="<?php echo $item['expanded'] ? 'false' : 'true'; ?>"
                            >
                                <span class="communities-collaborations__content-body-inner">
                                    <span class="communities-collaborations__item-description">
                                        <?php echo esc_html($item['description']); ?>
                                    </span>
                                </span>
                            </span>
                        </span>

                        <span class="communities-collaborations__toggle" aria-hidden="true">
                            <span class="communities-collaborations__toggle-bars">
                                <span class="communities-collaborations__toggle-bar communities-collaborations__toggle-bar--h"></span>
                                <span class="communities-collaborations__toggle-bar communities-collaborations__toggle-bar--v"></span>
                            </span>
                        </span>
                    </button>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
