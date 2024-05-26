import {
    sound,
    playBtn,
    pauseBtn,
    progress,
    maxDuration,
    currentDuration,
} from "./player-elements.js";

import { formatTime } from "./utils.js";

const hideClassName = "hidden";

playBtn.addEventListener("click", playHandler);
pauseBtn.addEventListener("click", pauseHandler);
progress.addEventListener("click", function (event) {
    // Calculate the seek position based on where the user clicked
    const clickPosition = event.offsetX;
    const width = progress.clientWidth;
    const seekPosition = clickPosition / width;

    // Set the seek position in the audio
    const duration = sound.duration();
    const seekTime = seekPosition * duration;

    sound.seek(seekTime);
    updateProgressTime();
});

function updateProgressTime() {
    currentDuration.innerText = formatTime(sound.seek());
    progress.value = (sound.seek() / sound.duration()) * 100;
}

function playHandler() {
    sound.play();
    playBtn.classList.add(hideClassName);
    pauseBtn.classList.remove(hideClassName);
}

function pauseHandler() {
    sound.pause();
    pauseBtn.classList.add(hideClassName);
    playBtn.classList.remove(hideClassName);
}

// Listen for the Space key press
document.addEventListener("keydown", function (event) {
    switch (event.code) {
        case "Space":
            event.preventDefault();
            if (sound.playing()) pauseHandler();
            else playHandler();
            break;
        case "ArrowLeft":
            sound.seek(sound.seek() - 3);
            updateProgressTime();
            break;
        case "ArrowRight":
            sound.seek(sound.seek() + 3);
            updateProgressTime();
            break;
        // case "ArrowUp":
        //     sound.volume(sound.volume() + 0.1);
        //     break;
        // case "ArrowDown":
        //     sound.volume(sound.volume() - 0.1);
        //     break;
    }
});
