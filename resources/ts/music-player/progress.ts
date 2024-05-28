import { Howl } from "./player.js";
import { formatTime } from "../utils.js";
import { progress, currentDuration } from "./elements.js";

export default initProgressWatcher;
export { startProgressUpdater, stopProgressUpdater, updateProgressTime };

let updateProgressWorker: any;

function initProgressWatcher(player: Howl): Function {
    return function (event: MouseEvent) {
        // Calculate the seek position based on where the user clicked
        const clickPosition = event.offsetX;
        const width = progress!.clientWidth;
        const seekPosition = clickPosition / width;

        // Set the seek position in the audio
        const duration = player.duration();
        const seekTime = seekPosition * duration;

        player.seek(seekTime);
        updateProgressTime();
    };
}

function startProgressUpdater() {
    updateProgressWorker = setInterval(updateProgressTime, 1000);
}

function stopProgressUpdater() {
    clearInterval(updateProgressWorker);
}

function updateProgressTime(): void {
    currentDuration!.innerText = formatTime(globalThis.player.seek());
    progress!.value =
        (globalThis.player.seek() / globalThis.player.duration()) * 100;
}
