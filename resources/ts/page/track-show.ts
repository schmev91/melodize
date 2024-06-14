import WaveSurfer from "wavesurfer.js";
import {
    call,
    formatTime,
    getCurrentPlaying,
    getOrigin,
    mounter,
    storageHelper,
} from "../utils";
import Track from "../interface/Track";
import { hideClassName } from "../music-player/constants";
import { play } from "../music-player/core";

declare global {
    interface Window {
        showingTrack: Track;
    }
}
export default function trackShow(): void {
    const { id, url } = window.showingTrack;

    document
        .getElementById("playCurrentShowing")
        ?.addEventListener(
            "click",
            call(
                mounter(play, [window.showingTrack]),
                mounter(refrestCurrentPlayingFlag, id),
            ),
        );

    initWaveSurfer(url);

    refrestCurrentPlayingFlag(id);
}

function initWaveSurfer(url: string): void {
    // EMPTY WAVESURFER CONTAINER
    document.getElementById("waveform")!.innerHTML = "";

    globalThis.waveSurfer = WaveSurfer.create({
        container: "#waveform",
        barWidth: 2,
        waveColor: "#d4d7f8",
        progressColor: "#35e668",
    });

    // REMOVE LOADING BAR ON READY
    globalThis.waveSurfer.on("ready", function () {
        document
            .getElementById("waveform-loading")
            ?.classList.add(hideClassName);

        document.getElementById("waveform-current")!.innerHTML = "0:00";
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
        } else {
            play([window.showingTrack]);
            refrestCurrentPlayingFlag(window.showingTrack.id);
        }
    });
    globalThis.waveSurfer.load(storageHelper(url));
}
function refrestCurrentPlayingFlag(id: number) {
    const currentPlaying = getCurrentPlaying();
    if (!currentPlaying) return;
    if (id == currentPlaying.id) {
        globalThis.isPlayingShowing = true;
    }
}
