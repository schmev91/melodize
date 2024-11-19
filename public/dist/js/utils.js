export function getAudioContext() {
    return globalThis.player._sounds[0]._node.context;
}
export function formatTime(secs) {
    var minutes = Math.floor(secs / 60) || 0;
    var seconds = secs - minutes * 60 || 0;
    return "".concat(minutes, ":").concat(seconds < 10 ? "0" : "").concat(Math.ceil(seconds));
}
export function call() {
    var functions = [];
    for (var _i = 0; _i < arguments.length; _i++) {
        functions[_i] = arguments[_i];
    }
    return function () {
        var args = [];
        for (var _i = 0; _i < arguments.length; _i++) {
            args[_i] = arguments[_i];
        }
        functions.forEach(function (fn) { return fn.apply(void 0, args); });
    };
}
export function mounter(fn) {
    var args = [];
    for (var _i = 1; _i < arguments.length; _i++) {
        args[_i - 1] = arguments[_i];
    }
    return function () {
        fn.apply(void 0, args);
    };
}
export function getOrigin() {
    return window.location.origin;
}
export function storageHelper(url) {
    return "".concat(getOrigin(), "/storage/").concat(url);
}
export function once(fn) {
    var called = false;
    return function () {
        var args = [];
        for (var _i = 0; _i < arguments.length; _i++) {
            args[_i] = arguments[_i];
        }
        if (called)
            return;
        called = true;
        fn.apply(void 0, args);
    };
}
export function getCurrentPlaying() {
    if (!globalThis.tracksList)
        return null;
    return globalThis.tracksList[globalThis.trackIndex];
}
export function optional(object) {
    if (!object)
        return {};
    return object;
}
