import Track from "./interface/Track";

export function formatTime(secs: number) {
    const minutes = Math.floor(secs / 60) || 0;
    const seconds = secs - minutes * 60 || 0;
    return `${minutes}:${seconds < 10 ? "0" : ""}${Math.ceil(seconds)}`;
}

export function call(...functions: Function[]) {
    return function (...args: any) {
        functions.forEach((fn) => fn(...args));
    };
}

export function mounter(fn: Function, ...args: any): any {
    return function () {
        fn(...args);
    };
}

export function getOrigin(): string {
    return window.location.origin;
}

export function storageHelper(url: string) {
    return `${getOrigin()}/storage/${url}`;
}

export function once(fn: Function): Function {
    let called = false;
    return function (...args: any) {
        if (called) return;
        called = true;
        fn(...args);
    };
}

export function getCurrentPlaying(): Track | null {
    if (!globalThis.tracksList) return null;
    return globalThis.tracksList[globalThis.trackIndex];
}
