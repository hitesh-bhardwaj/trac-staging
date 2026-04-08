export function createNetworkCanvas(canvas, options = {}) {
    if (!canvas) return null;

    const ctx = canvas.getContext('2d');

    const config = {
        starCount: 30,
        fps: options.fps ?? 60,
        maxVelocity: 15,
        minRadius: 6,
        maxRadius: 6,
        linkDistance: 200,
        maxConnectionsPerStar: 3,
        starColor: '#97ACC8',
        lineColor: '#97ACC8',
        backgroundClear: true,
        interactive: options.interactive ?? true,
        devicePixelRatio: Math.min(window.devicePixelRatio || 1, 2),
        activeAreaStart: 0.4,
    };

    const state = {
        stars: [],
        connections: [],
        mouse: {
            x: 0,
            y: 0,
            active: false,
        },
        rafId: null,
        isRunning: false,
    };

    function getWidth() {
        return canvas.width / config.devicePixelRatio;
    }

    function getHeight() {
        return canvas.height / config.devicePixelRatio;
    }

    function getActiveTop() {
        return getHeight() * config.activeAreaStart;
    }

    function getActiveBottom() {
        return getHeight();
    }

    function resize() {
        const rect = canvas.getBoundingClientRect();
        const dpr = config.devicePixelRatio;

        canvas.width = rect.width * dpr;
        canvas.height = rect.height * dpr;

        ctx.setTransform(dpr, 0, 0, dpr, 0, 0);

        if (!state.stars.length) {
            createStars();
        } else {
            clampStarsToBounds();
            rebuildConnections();
        }
    }

    function randomBetween(min, max) {
        return Math.random() * (max - min) + min;
    }

    function createStars() {
        state.stars = [];

        const width = getWidth();
        const activeTop = getActiveTop();
        const activeBottom = getActiveBottom();
        const activeHeight = activeBottom - activeTop;

        for (let i = 0; i < config.starCount; i++) {
            state.stars.push({
                x: Math.random() * width,
                y: activeTop + Math.random() * activeHeight,
                radius: randomBetween(config.minRadius, config.maxRadius),
                vx: randomBetween(-config.maxVelocity, config.maxVelocity),
                vy: randomBetween(-config.maxVelocity, config.maxVelocity),
            });
        }

        rebuildConnections();
    }

    function clampStarsToBounds() {
        const width = getWidth();
        const activeTop = getActiveTop();
        const activeBottom = getActiveBottom();

        state.stars.forEach((star) => {
            star.x = Math.max(0, Math.min(width, star.x));
            star.y = Math.max(activeTop, Math.min(activeBottom, star.y));
        });
    }

    function distance(point1, point2) {
        const dx = point2.x - point1.x;
        const dy = point2.y - point1.y;
        return Math.sqrt(dx * dx + dy * dy);
    }

    function connectionKey(a, b) {
        return a < b ? `${a}-${b}` : `${b}-${a}`;
    }

    function rebuildConnections() {
    const stars = state.stars;
    const maxPerStar = config.maxConnectionsPerStar;
    const connectionCounts = new Array(stars.length).fill(0);
    const connectionSet = new Set();
    const connections = [];

    if (stars.length <= 1) {
        state.connections = connections;
        return;
    }

    function tryAddConnection(i, j, ignoreDistance = false) {
        if (i === j) return false;
        if (connectionCounts[i] >= maxPerStar) return false;
        if (connectionCounts[j] >= maxPerStar) return false;

        const key = i < j ? `${i}-${j}` : `${j}-${i}`;
        if (connectionSet.has(key)) return false;

        const dist = distance(stars[i], stars[j]);
        if (!ignoreDistance && dist > config.linkDistance) return false;

        connectionSet.add(key);
        connectionCounts[i] += 1;
        connectionCounts[j] += 1;
        connections.push([i, j]);
        return true;
    }

    // 1) Build one guaranteed connected chain using nearest unvisited star
    const visited = new Set([0]);
    let current = 0;

    while (visited.size < stars.length) {
        let nextIndex = -1;
        let bestDistance = Infinity;

        for (let j = 0; j < stars.length; j++) {
            if (visited.has(j)) continue;
            if (connectionCounts[current] >= maxPerStar) break;
            if (connectionCounts[j] >= maxPerStar) continue;

            const dist = distance(stars[current], stars[j]);
            if (dist < bestDistance) {
                bestDistance = dist;
                nextIndex = j;
            }
        }

        // if current is saturated, connect from any visited node to nearest unvisited node
        if (nextIndex === -1) {
            let bestFrom = -1;
            let bestTo = -1;
            let bestDistanceFallback = Infinity;

            for (const from of visited) {
                if (connectionCounts[from] >= maxPerStar) continue;

                for (let to = 0; to < stars.length; to++) {
                    if (visited.has(to)) continue;
                    if (connectionCounts[to] >= maxPerStar) continue;

                    const dist = distance(stars[from], stars[to]);
                    if (dist < bestDistanceFallback) {
                        bestDistanceFallback = dist;
                        bestFrom = from;
                        bestTo = to;
                    }
                }
            }

            if (bestFrom !== -1 && bestTo !== -1) {
                tryAddConnection(bestFrom, bestTo, true);
                visited.add(bestTo);
                current = bestTo;
            } else {
                break;
            }
        } else {
            tryAddConnection(current, nextIndex, true);
            visited.add(nextIndex);
            current = nextIndex;
        }
    }

    // 2) Add extra nearby connections, but keep max 3 per star
    const candidatePairs = [];

    for (let i = 0; i < stars.length; i++) {
        for (let j = i + 1; j < stars.length; j++) {
            const dist = distance(stars[i], stars[j]);
            if (dist <= config.linkDistance) {
                candidatePairs.push({ i, j, dist });
            }
        }
    }

    candidatePairs.sort((a, b) => a.dist - b.dist);

    for (let k = 0; k < candidatePairs.length; k++) {
        const { i, j } = candidatePairs[k];
        tryAddConnection(i, j, false);
    }

    state.connections = connections;
}

    function drawStars() {
        for (let i = 0; i < state.stars.length; i++) {
            const star = state.stars[i];

            ctx.fillStyle = config.starColor;
            ctx.beginPath();
            ctx.arc(star.x, star.y, star.radius, 0, Math.PI * 2);
            ctx.fill();
        }
    }

    function drawConnections() {
        ctx.beginPath();

        for (let i = 0; i < state.connections.length; i++) {
            const [aIndex, bIndex] = state.connections[i];
            const starA = state.stars[aIndex];
            const starB = state.stars[bIndex];

            ctx.moveTo(starA.x, starA.y);
            ctx.lineTo(starB.x, starB.y);
        }

        // optional mouse links, capped visually
        if (config.interactive && state.mouse.active) {
            let mouseLinks = 0;

            for (let i = 0; i < state.stars.length; i++) {
                if (mouseLinks >= 3) break;

                const star = state.stars[i];
                if (distance(state.mouse, star) < config.linkDistance) {
                    ctx.moveTo(star.x, star.y);
                    ctx.lineTo(state.mouse.x, state.mouse.y);
                    mouseLinks += 1;
                }
            }
        }

        ctx.lineWidth = 0.3;
        ctx.strokeStyle = config.lineColor;
        ctx.stroke();
    }

    function draw() {
        if (config.backgroundClear) {
            ctx.clearRect(0, 0, getWidth(), getHeight());
        }

        ctx.globalCompositeOperation = 'source-over';
        drawConnections();
        drawStars();
    }

    function update() {
        const width = getWidth();
        const activeTop = getActiveTop();
        const activeBottom = getActiveBottom();

        for (let i = 0; i < state.stars.length; i++) {
            const star = state.stars[i];

            star.x += star.vx / config.fps;
            star.y += star.vy / config.fps;

            if (star.x < 0 || star.x > width) {
                star.vx = -star.vx;
                star.x = Math.max(0, Math.min(width, star.x));
            }

            if (star.y < activeTop || star.y > activeBottom) {
                star.vy = -star.vy;
                star.y = Math.max(activeTop, Math.min(activeBottom, star.y));
            }
        }

        rebuildConnections();
    }

    function tick() {
        if (!state.isRunning) return;

        draw();
        update();

        state.rafId = requestAnimationFrame(tick);
    }

    function handleMouseMove(e) {
        const rect = canvas.getBoundingClientRect();
        state.mouse.x = e.clientX - rect.left;
        state.mouse.y = e.clientY - rect.top;
        state.mouse.active = true;
    }

    function handleMouseLeave() {
        state.mouse.active = false;
    }

    function bindEvents() {
        window.addEventListener('resize', resize);

        if (config.interactive) {
            canvas.addEventListener('mousemove', handleMouseMove);
            canvas.addEventListener('mouseleave', handleMouseLeave);
        }
    }

    function unbindEvents() {
        window.removeEventListener('resize', resize);

        if (config.interactive) {
            canvas.removeEventListener('mousemove', handleMouseMove);
            canvas.removeEventListener('mouseleave', handleMouseLeave);
        }
    }

    function start() {
        if (state.isRunning) return;
        state.isRunning = true;
        state.rafId = requestAnimationFrame(tick);
    }

    function stop() {
        state.isRunning = false;

        if (state.rafId) {
            cancelAnimationFrame(state.rafId);
            state.rafId = null;
        }
    }

    function destroy() {
        stop();
        unbindEvents();
        ctx.clearRect(0, 0, getWidth(), getHeight());
    }

    resize();
    bindEvents();
    start();

    return {
        start,
        stop,
        destroy,
        resize,
        state,
        config,
    };
}

export function initNetworkCanvas(selector, options = {}) {
    const canvas =
        typeof selector === 'string'
            ? document.querySelector(selector)
            : selector;

    if (!canvas) return null;

    return createNetworkCanvas(canvas, options);
}