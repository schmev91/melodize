import WaveSurfer from "wavesurfer.js";
import { getOrigin, storageHelper } from "../utils";
import Track from "../interface/Track";

declare global {
    interface Window {
        showingTrack: Track;
    }
}
export default function trackShow(): void {
    const { url } = window.showingTrack;

    const wavesurfer = WaveSurfer.create({
        container: "#waveform",
        barWidth: 2,
        waveColor: "#d4d7f8",
        progressColor: "#35e668",
    });

    wavesurfer.on("load", function () {
        document.getElementById("waveform-loading")?.remove();
    });
    wavesurfer.load(storageHelper(url));
}
