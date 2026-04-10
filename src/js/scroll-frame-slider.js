import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

const SCALE_OFFSCREEN = 1.2;
const ROTATION_DEG = 6;
const SCALE_CENTER = 1.0;

const FRAME_W = 500;
const FRAME_H = 600;
const SLIDE_W = FRAME_W;
const THUMB_W = 190;
const THUMB_H = 260;
const THUMB_GAP = 12;
const THUMB_ITEM = THUMB_W + THUMB_GAP;

const MOBILE_FRAME_W = 280;
const MOBILE_FRAME_H = 340;
const MOBILE_SLIDE_W = MOBILE_FRAME_W;
const MOBILE_THUMB_W = 100;
const MOBILE_THUMB_H = 136;
const MOBILE_THUMB_GAP = 8;
const MOBILE_THUMB_ITEM = MOBILE_THUMB_W + MOBILE_THUMB_GAP;

export function initScrollFrameSlider() {
    const sections = Array.from(document.querySelectorAll('[data-scroll-frame-slider]'));
    if (!sections.length) return;

    sections.forEach((section) => {
        const gallery = section.querySelector('[data-scroll-frame-gallery]');
        const slides = Array.from(
            section.querySelectorAll('[data-scroll-frame-slide]')
        );
        const slideInners = Array.from(
            section.querySelectorAll('.scroll-frame-slider__slide-inner')
        );
        const thumbLeft = section.querySelector(
            '[data-scroll-frame-thumb-track="left"]'
        );
        const thumbRight = section.querySelector(
            '[data-scroll-frame-thumb-track="right"]'
        );
        const currentCounter = section.querySelector(
            '[data-scroll-frame-current]'
        );

        const borderSvg = section.querySelector('[data-scroll-frame-border]');
        const clipPath = section.querySelector('[data-scroll-frame-clip-path]');
        const maskPath = section.querySelector('[data-scroll-frame-mask-path]');
        const dashedPath = section.querySelector(
            '[data-scroll-frame-dashed-path]'
        );

        if (
            !gallery ||
            !slides.length ||
            !thumbLeft ||
            !thumbRight ||
            !currentCounter ||
            !borderSvg ||
            !clipPath ||
            !maskPath ||
            !dashedPath
        ) {
            return;
        }

        const total = slides.length;
        let activeIndex = 0;
        let scrollTriggerInstance = null;

        const getValues = () => {
            const isMobile = window.innerWidth < 640;

            return isMobile
                ? {
                      frameW: MOBILE_FRAME_W,
                      frameH: MOBILE_FRAME_H,
                      slideW: MOBILE_SLIDE_W,
                      thumbW: MOBILE_THUMB_W,
                      thumbH: MOBILE_THUMB_H,
                      thumbGap: MOBILE_THUMB_GAP,
                      thumbItem: MOBILE_THUMB_ITEM,
                  }
                : {
                      frameW: FRAME_W,
                      frameH: FRAME_H,
                      slideW: SLIDE_W,
                      thumbW: THUMB_W,
                      thumbH: THUMB_H,
                      thumbGap: THUMB_GAP,
                      thumbItem: THUMB_ITEM,
                  };
        };

        const updateCounter = (index) => {
            currentCounter.textContent = String(index + 1).padStart(2, '0');
        };

        const updateLayout = () => {
            const { frameW, frameH, slideW, thumbW, thumbH, thumbGap } =
                getValues();

            const frameWrap = section.querySelector(
                '.scroll-frame-slider__frame-wrap'
            );
            const frameInner = section.querySelector(
                '.scroll-frame-slider__frame-inner'
            );
            const leftStrip = section.querySelector(
                '[data-scroll-frame-thumb-strip="left"]'
            );
            const rightStrip = section.querySelector(
                '[data-scroll-frame-thumb-strip="right"]'
            );

            if (!frameWrap || !frameInner || !leftStrip || !rightStrip) return;

            frameWrap.style.width = `${frameW + 24}px`;
            frameWrap.style.height = `${frameH + 24}px`;

            borderSvg.setAttribute('width', `${frameW + 24}`);
            borderSvg.setAttribute('height', `${frameH + 24}`);
            borderSvg.setAttribute(
                'viewBox',
                `0 0 ${frameW + 24} ${frameH + 24}`
            );

            const pathData = `M 12 12 L ${12 + frameW} 12 L ${12 + frameW} ${
                12 + frameH
            } L 12 ${12 + frameH} Z`;
            const clipId = `dash-clip-${Math.random()
                .toString(36)
                .slice(2)}`;

            clipPath.setAttribute('id', clipId);
            maskPath.setAttribute('d', pathData);
            maskPath.setAttribute('fill', 'none');
            maskPath.setAttribute('stroke', '#ffffff');
            maskPath.setAttribute('stroke-width', '12');
            maskPath.setAttribute('stroke-linecap', 'round');

            dashedPath.setAttribute('d', pathData);
            dashedPath.setAttribute('fill', 'none');
            dashedPath.setAttribute('stroke', 'rgba(255,255,255,0.5)');
            dashedPath.setAttribute('stroke-width', '1');
            dashedPath.setAttribute('stroke-dasharray', '8 6');
            dashedPath.setAttribute('stroke-linecap', 'round');
            dashedPath.setAttribute('stroke-linejoin', 'round');
            dashedPath.setAttribute('clip-path', `url(#${clipId})`);

            frameInner.style.width = `${frameW - 10}px`;
            frameInner.style.height = `${frameH - 10}px`;

            gallery.style.width = `${slideW * total}px`;

            slides.forEach((slide) => {
                slide.style.width = `${slideW}px`;
                slide.style.height = `${frameH}px`;
            });

            const thumbItems = section.querySelectorAll(
                '.scroll-frame-slider__thumb-item'
            );
            thumbItems.forEach((item) => {
                item.style.width = `${thumbW}px`;
                item.style.height = `${thumbH}px`;
            });

            thumbLeft.style.gap = `${thumbGap}px`;
            thumbRight.style.gap = `${thumbGap}px`;

            leftStrip.style.height = `${thumbH}px`;
            rightStrip.style.height = `${thumbH}px`;

            leftStrip.style.right = `calc(50% + ${frameW / 2}px)`;
            leftStrip.style.left = '0';

            rightStrip.style.left = `calc(50% + ${frameW / 2}px)`;
            rightStrip.style.right = '0';

            thumbLeft.style.left = '100%';
            thumbRight.style.left = '0';

            updateCounter(activeIndex);
        };

        const animateBorder = () => {
            const pathLength = maskPath.getTotalLength();

            gsap.set(maskPath, {
                strokeDasharray: pathLength,
                strokeDashoffset: pathLength,
            });

            gsap.to(maskPath, {
                strokeDashoffset: 0,
                duration: 1.5,
                ease: 'linear',
                delay: 0.1,
            });
        };

        const applyPosition = (pos) => {
            const { slideW, thumbItem } = getValues();

            const tx = -pos * slideW;
            gallery.style.transform = `translate3d(${tx}px, 0, 0)`;

            slideInners.forEach((el, i) => {
                if (!el) return;

                const dist = i - pos;
                const absDist = Math.abs(dist);

                const rot =
                    dist > 0
                        ? Math.min(absDist, 1) * ROTATION_DEG
                        : -Math.min(absDist, 1) * ROTATION_DEG;

                const scale =
                    SCALE_CENTER +
                    Math.min(absDist, 1) *
                        (SCALE_OFFSCREEN - SCALE_CENTER);

                el.style.transform = `rotate(${rot}deg) scale(${scale})`;
            });

            const leftThumbTx = -pos * thumbItem;
            const rightThumbTx = -(pos + 1) * thumbItem;

            thumbLeft.style.transform = `translate3d(${leftThumbTx}px, -50%, 0)`;
            thumbRight.style.transform = `translate3d(${rightThumbTx}px, -50%, 0)`;

            activeIndex = Math.max(0, Math.min(total - 1, Math.round(pos)));
            updateCounter(activeIndex);
        };

        const createScrollTrigger = () => {
            if (scrollTriggerInstance) {
                scrollTriggerInstance.kill();
                scrollTriggerInstance = null;
            }

            if (total <= 1) {
                applyPosition(0);
                return;
            }

            const snapValues = Array.from({ length: total }, (_, i) =>
                i / (total - 1)
            );

            scrollTriggerInstance = ScrollTrigger.create({
                trigger: section,
                start: 'top top',
                end: 'bottom bottom',
                snap: {
                    snapTo: snapValues,
                    duration: { min: 0.2, max: 0.5 },
                    ease: 'power2.inOut',
                    delay: 0,
                    inertia: false,
                },
                onUpdate: (self) => {
                    const pos = self.progress * (total - 1);
                    applyPosition(pos);
                },
            });

            applyPosition(0);
        };

        updateLayout();
        animateBorder();
        createScrollTrigger();

        const handleResize = () => {
            updateLayout();
            createScrollTrigger();
            ScrollTrigger.refresh();
        };

        window.addEventListener('resize', handleResize);

        section._scrollFrameSliderCleanup = () => {
            if (scrollTriggerInstance) {
                scrollTriggerInstance.kill();
                scrollTriggerInstance = null;
            }
            window.removeEventListener('resize', handleResize);
        };
    });

    console.log('[Trac] Scroll frame slider initialized');
}