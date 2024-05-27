import { sound } from "./player.js";
import { formatTime } from "../utils.js";

import { progress, currentDuration } from "./elements.js";

export { initProgressWorker, stopProgressWorker, updateProgressTime };

// update progress on clicking progress bar
progress!.addEventListener("click", function (event) {
    // Calculate the seek position based on where the user clicked
    const clickPosition = event.offsetX;
    const width = progress!.clientWidth;
    const seekPosition = clickPosition / width;

    // Set the seek position in the audio
    const duration = sound.duration();
    const seekTime = seekPosition * duration;

    sound.seek(seekTime);
    updateProgressTime();
});

let updateProgressWorker: any;

function initProgressWorker() {
    updateProgressWorker = setInterval(updateProgressTime, 1000);
}

function stopProgressWorker() {
    try {
        clearInterval(updateProgressWorker);
    } catch (e) {}
}

function updateProgressTime() {
    currentDuration!.innerText = formatTime(sound.seek());
    progress!.value = (sound.seek() / sound.duration()) * 100;
}
