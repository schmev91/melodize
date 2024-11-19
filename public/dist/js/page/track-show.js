import WaveSurfer from "wavesurfer.js";
import { call, formatTime, getCurrentPlaying, mounter, storageHelper, } from "../utils";
import { hideClassName } from "../music-player/constants";
import { play } from "../music-player/core";
export default function trackShow() {
    var _a;
    var _b = window.showingTrack, id = _b.id, url = _b.url;
    (_a = document
        .getElementById("playCurrentShowing")) === null || _a === void 0 ? void 0 : _a.addEventListener("click", call(mounter(play, [window.showingTrack]), mounter(refreshCurrentPlayingFlag, id)));
    initWaveSurfer(url);
    refreshCurrentPlayingFlag();
}
function initWaveSurfer(url) {
    // EMPTY WAVESURFER CONTAINER
    console.log("initing");
    var waveform = document.getElementById("waveform");
    if (waveform && waveform.innerHTML)
        waveform.innerHTML = "";
    globalThis.waveSurfer = WaveSurfer.create({
        container: "#waveform",
        barWidth: 2,
        waveColor: "#d4d7f8",
        progressColor: "#35e668",
        cursorWidth: 0,
    });
    // REMOVE LOADING BAR ON READY
    globalThis.waveSurfer.on("ready", surferReadyHandler);
    // Seek timestamp if is playing current showing or play current showing if not
    globalThis.waveSurfer.on("seeking", surferSeekingHandler);
    //Use the existed buffer if show the current playing track
    globalThis.waveSurfer.load(storageHelper(url));
}
export function refreshCurrentPlayingFlag() {
    var currentPlaying = getCurrentPlaying();
    if (!currentPlaying || !window.showingTrack)
        return;
    globalThis.isPlayingShowing = window.showingTrack.id == currentPlaying.id;
}
function surferReadyHandler() {
    var _a;
    (_a = document.getElementById("waveform-loading")) === null || _a === void 0 ? void 0 : _a.classList.add(hideClassName);
    var current = document.getElementById("waveform-current");
    current.innerHTML = "0:00";
    current === null || current === void 0 ? void 0 : current.classList.remove(hideClassName);
    document.getElementById("waveform-duration").innerHTML = formatTime(globalThis.waveSurfer.getDuration());
    var waveform = document.getElementById("waveform");
    var hover = document.getElementById("waveform-hover");
    waveform === null || waveform === void 0 ? void 0 : waveform.addEventListener("pointermove", function (e) { return (hover.style.width = "".concat(e.offsetX, "px")); });
}
function surferSeekingHandler(timestamp) {
    if (globalThis.isPlayingShowing) {
        globalThis.player.seek(timestamp);
        return;
    }
    if (window.isResettingWaveSurfer) {
        window.isResettingWaveSurfer = undefined;
        return;
    }
    play([window.showingTrack]);
}
