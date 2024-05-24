import { Howl, Howler } from "howler";

// // Initialize Howler.js
var sound = new Howl({
    src: ["storage/tracks/dazbee_hikari.mp3"],
    onload: onloadHandler,
    onplay: initProgressWorker,
    onpause: stopProgressWorker,
    onstop: stopProgressWorker,
    onend: stopProgressWorker,
});

const playBtn = document.getElementById("player-play");
const pauseBtn = document.getElementById("player-pause");

const progress = document.getElementById("player-progress");
const currentDuration = document.getElementById("current-duration");
const maxDuration = document.getElementById("max-duration");

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

function onloadHandler() {
    maxDuration.innerText = formatTime(sound.duration());
    currentDuration.innerText = formatTime(sound.seek());
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

function initProgressWorker() {
    let updateProgressWorker = setInterval(updateProgressTime, 1000);
}

function stopProgressWorker() {
    try {
        clearInterval(updateProgressWorker);
    } catch (e) {}
}

function formatTime(secs) {
    const minutes = Math.floor(secs / 60) || 0;
    const seconds = secs - minutes * 60 || 0;
    return `${minutes}:${seconds < 10 ? "0" : ""}${Math.ceil(seconds)}`;
}

// Listen for the Space key press
document.addEventListener("keydown", function (event) {
    if (event.code === "Space") {
        event.preventDefault(); // Prevent default action (scrolling the page)

        if (sound.playing()) pauseHandler();
        else playHandler();
    }
});
