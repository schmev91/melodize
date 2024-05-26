import { Howl, Howler } from "howler";
import {formatTime} from "./utils"

// // Initialize Howler.js
var sound = new Howl({
    src: ["storage/tracks/dazbee_hikari.mp3"],
    onload: onloadHandler,
    onplay: initProgressWorker,
    onpause: stopProgressWorker,
    onstop: stopProgressWorker,
    onend: stopProgressWorker,
});

var playBtn = document.getElementById("player-play");
var pauseBtn = document.getElementById("player-pause");

var progress = document.getElementById("player-progress");
var currentDuration = document.getElementById("current-duration");
var maxDuration = document.getElementById("max-duration");

export { sound, playBtn, pauseBtn, progress, currentDuration, maxDuration };

function onloadHandler() {
    maxDuration.innerText = formatTime(sound.duration());
    currentDuration.innerText = formatTime(sound.seek());
}

function initProgressWorker() {
    let updateProgressWorker = setInterval(updateProgressTime, 1000);
}

function stopProgressWorker() {
    try {
        clearInterval(updateProgressWorker);
    } catch (e) {}
}
