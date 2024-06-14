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
    const commentBtn = document.getElementById("comment-btn");
    currentDuration!.innerText = formatTime(currentTimestamp);
    progress!.value = (currentTimestamp / globalThis.player.duration()) * 100;

    const waveSurferCurrentTime = document.getElementById("waveform-current");
    // scripts if showing the current playing track
    if (!globalThis.isPlayingShowing) {
        if (window.showingTrack) {
            window.isResettingWaveSurfer = true;
            globalThis.waveSurfer.setTime(0);
            waveSurferCurrentTime!.innerHTML = "0:00";
        }
        commentBtn?.setAttribute("wire:click", "comment");
        return;
    }

    globalThis.waveSurfer.setTime(currentTimestamp);
    waveSurferCurrentTime!.innerHTML = formatTime(currentTimestamp);

    // Include at column in comment on the current playing track
    commentBtn?.setAttribute("wire:click", `comment(${currentTimestamp})`);
}
