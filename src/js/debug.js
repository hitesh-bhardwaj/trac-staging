/**
 * Debug-only logging - stripped from production builds (`import.meta.env.DEV`
 * is false once built by Vite), so init/lifecycle messages never reach the
 * browser console on the live site.
 */
export const trac_log = (...args) => {
    if (import.meta.env.DEV) console.log(...args);
};

export const trac_warn = (...args) => {
    if (import.meta.env.DEV) console.warn(...args);
};
