import { formatTime } from "../utils.js";
import { progress, currentDuration } from "./elements.js";
export { startProgressUpdater, stopProgressUpdater, updateProgressTime };
var updateProgressWorker;
export default function progressWatcher(event) {
    // Calculate the seek position based on where the user clicked
    var clickPosition = event.offsetX;
    var width = progress.clientWidth;
    var seekPosition = clickPosition / width;
    // Set the seek position in the audio
    var duration = globalThis.player.duration();
    var seekTime = seekPosition * duration;
    globalThis.player.seek(seekTime);
    updateProgressTime();
}
function startProgressUpdater() {
    updateProgressWorker = setInterval(updateProgressTime, 500);
}
function stopProgressUpdater() {
    clearInterval(updateProgressWorker);
}
function updateProgressTime() {
    var currentTimestamp = globalThis.player.seek();
    var commentBtn = document.getElementById("comment-btn");
    currentDuration.innerText = formatTime(currentTimestamp);
    progress.value = (currentTimestamp / globalThis.player.duration()) * 100;
    var waveSurferCurrentTime = document.getElementById("waveform-current");
    // scripts if showing the current playing track
    if (!globalThis.isPlayingShowing) {
        if (!window.showingTrack)
            return;
        window.isResettingWaveSurfer = true;
        globalThis.waveSurfer.setTime(0);
        waveSurferCurrentTime.innerHTML = "0:00";
        commentBtn === null || commentBtn === void 0 ? void 0 : commentBtn.setAttribute("wire:click", "comment");
        return;
    }
    globalThis.waveSurfer.setTime(currentTimestamp);
    waveSurferCurrentTime.innerHTML = formatTime(currentTimestamp);
    // Include at column in comment on the current playing track
    commentBtn === null || commentBtn === void 0 ? void 0 : commentBtn.setAttribute("wire:click", "comment(".concat(currentTimestamp, ")"));
}
