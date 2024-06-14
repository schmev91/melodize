import WaveSurfer from "wavesurfer.js";
import {
    call,
    formatTime,
    getCurrentPlaying,
    getOrigin,
    mounter,
    optional,
    storageHelper,
} from "../utils";
import Track from "../interface/Track";
import { hideClassName } from "../music-player/constants";
import { play } from "../music-player/core";

declare global {
    interface Window {
        showingTrack?: Track;
        isResettingWaveSurfer?: boolean;
    }
}
export default function trackShow(): void {
    const { id, url } = window.showingTrack!;

    document
        .getElementById("playCurrentShowing")
        ?.addEventListener(
            "click",
            call(
                mounter(play, [window.showingTrack]),
                mounter(refreshCurrentPlayingFlag, id),
            ),
        );

    initWaveSurfer(url);

    refreshCurrentPlayingFlag();
}

function initWaveSurfer(url: string): void {
    // EMPTY WAVESURFER CONTAINER
    optional(document.getElementById("waveform")).innerHTML = "";

    globalThis.waveSurfer = WaveSurfer.create({
        container: "#waveform",
        barWidth: 2,
        waveColor: "#d4d7f8",
        progressColor: "#35e668",
        hideCursor: true,
    });

    // REMOVE LOADING BAR ON READY
    globalThis.waveSurfer.on("ready", function () {
        document
            .getElementById("waveform-loading")
            ?.classList.add(hideClassName);

        const current = document.getElementById("waveform-current");
        current!.innerHTML = "0:00";
        current?.classList.remove(hideClassName);
        document.getElementById("waveform-duration")!.innerHTML = formatTime(
            globalThis.waveSurfer.getDuration(),
        );

        const waveform = document.getElementById("waveform");
        const hover: HTMLElement | null =
            document.getElementById("waveform-hover");
        waveform?.addEventListener(
            "pointermove",
            (e) => (hover!.style.width = `${e.offsetX}px`),
        );
    });
    // Seek timestamp if is playing current showing or play current showing if not
    globalThis.waveSurfer.on("seeking", (timestamp) => {
        if (globalThis.isPlayingShowing) {
            globalThis.player.seek(timestamp);
            return;
        }
        if (window.isResettingWaveSurfer) {
            window.isResettingWaveSurfer = undefined;
            return;
        }
        play([window.showingTrack!]);
    });
    globalThis.waveSurfer.load(storageHelper(url));
}
export function refreshCurrentPlayingFlag() {
    const currentPlaying = getCurrentPlaying();
    if (!currentPlaying || !window.showingTrack) return;
    globalThis.isPlayingShowing = window.showingTrack.id == currentPlaying.id;
}
