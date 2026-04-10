import { gsap } from 'gsap';

export function initTeamSlider() {
    const sections = Array.from(document.querySelectorAll('[data-team-slider]'));
    if (!sections.length) return;

    sections.forEach((section) => {
        const prevBtn = section.querySelector('[data-team-slider-prev]');
        const nextBtn = section.querySelector('[data-team-slider-next]');
        const rail = section.querySelector('[data-team-slider-rail]');
        const thumbs = Array.from(section.querySelectorAll('[data-team-slider-thumb]'));

        const activeCard = section.querySelector('[data-team-slider-active-card]');
        const activeImage = section.querySelector('[data-team-slider-active-image]');
        const activeImageEl = section.querySelector('[data-team-slider-active-image] img');
        const activeName = section.querySelector('[data-team-slider-active-name]');
        const activeRole = section.querySelector('[data-team-slider-active-role]');
        const activeLinkedin = section.querySelector('[data-team-slider-linkedin]');

        if (
            !prevBtn ||
            !nextBtn ||
            !rail ||
            !thumbs.length ||
            !activeCard ||
            !activeImage ||
            !activeImageEl ||
            !activeName ||
            !activeRole ||
            !activeLinkedin
        ) {
            return;
        }

        let currentIndex = 0;
        let isAnimating = false;

        const getData = (thumb) => ({
            name: thumb.dataset.name || '',
            role: thumb.dataset.role || '',
            image: thumb.dataset.image || '',
            linkedin: thumb.dataset.linkedin || '#',
        });

        const updateButtons = () => {
            prevBtn.disabled = currentIndex === 0;
            nextBtn.disabled = currentIndex === thumbs.length - 1;
        };

        const updateRailPosition = (animate = true) => {
            const thumb = thumbs[currentIndex];
            if (!thumb) return;

            const thumbLeft = thumb.offsetLeft;
            const shift = thumbLeft;

            if (animate) {
                gsap.to(rail, {
                    x: -shift,
                    duration: 0.7,
                    ease: 'power3.inOut',
                    overwrite: true,
                });
            } else {
                gsap.set(rail, { x: -shift });
            }
        };

        const setActiveContent = (index, immediate = false) => {
            const thumb = thumbs[index];
            if (!thumb) return;

            const data = getData(thumb);

            if (immediate) {
                activeImageEl.src = data.image;
                activeImageEl.alt = data.name;
                activeName.textContent = data.name;
                activeRole.textContent = data.role;
                activeLinkedin.href = data.linkedin || '#';
                return;
            }

            isAnimating = true;

            const tl = gsap.timeline({
                defaults: {
                    duration: 0.35,
                    ease: 'power2.out',
                },
                onComplete: () => {
                    isAnimating = false;
                },
            });

            tl.to([activeImage, activeName, activeRole, activeLinkedin], {
                autoAlpha: 0,
            }).add(() => {
                activeImageEl.src = data.image;
                activeImageEl.alt = data.name;
                activeName.textContent = data.name;
                activeRole.textContent = data.role;
                activeLinkedin.href = data.linkedin || '#';
            }).to([activeImage, activeName, activeRole, activeLinkedin], {
                autoAlpha: 1,
            });
        };

        const goTo = (index) => {
            if (isAnimating) return;
            if (index < 0 || index >= thumbs.length || index === currentIndex) return;

            currentIndex = index;
            setActiveContent(currentIndex);
            updateRailPosition(true);
            updateButtons();
        };

        thumbs.forEach((thumb, index) => {
            thumb.addEventListener('click', () => {
                goTo(index);
            });
        });

        prevBtn.addEventListener('click', () => {
            goTo(currentIndex - 1);
        });

        nextBtn.addEventListener('click', () => {
            goTo(currentIndex + 1);
        });

        const handleResize = () => {
            updateRailPosition(false);
        };

        window.addEventListener('resize', handleResize);

        setActiveContent(0, true);
        updateRailPosition(false);
        updateButtons();

        section._teamSliderCleanup = () => {
            window.removeEventListener('resize', handleResize);
        };
    });

    console.log('[Trac] Team slider initialized');
}