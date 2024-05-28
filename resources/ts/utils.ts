export { formatTime, call };

function formatTime(secs: number) {
    const minutes = Math.floor(secs / 60) || 0;
    const seconds = secs - minutes * 60 || 0;
    return `${minutes}:${seconds < 10 ? "0" : ""}${Math.ceil(seconds)}`;
}

function call(...functions: Function[]) {
    return function (...args: any) {
        functions.forEach((fn) => fn(...args));
    };
}
