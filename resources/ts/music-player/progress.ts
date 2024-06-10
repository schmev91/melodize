import { Howl } from "./player.js";
import { formatTime } from "../utils.js";
import { progress, currentDuration } from "./elements.js";

export { startProgressUpdater, stopProgressUpdater, updateProgressTime };

let updateProgressWorker: any;

export default function progressWatcher(event: MouseEvent) {
    // Calculate the seek position based on where the user clicked
    const clickPosition = event.offsetX;
    const width = progress!.clientWidth;
    const seekPosition = clickPosition / width;

    // Set the seek position in the audio
    const duration = globalThis.player.duration();
    const seekTime = seekPosition * duration;

    globalThis.player.seek(seekTime);
    updateProgressTime();
}

function startProgressUpdater() {
    updateProgressWorker = setInterval(updateProgressTime, 500);
}

function stopProgressUpdater() {
    clearInterval(updateProgressWorker);
}

function updateProgressTime(): void {
    const currentTimestamp = globalThis.player.seek();
    currentDuration!.innerText = formatTime(currentTimestamp);
    progress!.value = (currentTimestamp / globalThis.player.duration()) * 100;

    if (!globalThis.isPlayingShowing) return;
    globalThis.waveSurfer.setTime(currentTimestamp);
    document.getElementById("waveform-current")!.innerHTML =
        formatTime(currentTimestamp);
}
