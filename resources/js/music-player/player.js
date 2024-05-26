import { Howl } from "howler";

// Initialize Howler.js
var sound = new Howl({
    src: ["storage/tracks/dazbee_hikari.mp3"],
    onload: onloadHandler,
    onplay: initProgressWorker,
    onpause: stopProgressWorker,
    onstop: stopProgressWorker,
    onend: stopProgressWorker,
});

export { sound };

import { playBtn, pauseBtn } from "./elements.js";

import {
    onloadHandler,
    playHandler,
    pauseHandler,
    shortcutHandler,
    initProgressWorker,
    stopProgressWorker,
} from "./handler";

document.addEventListener("keydown", shortcutHandler);

playBtn.addEventListener("click", playHandler);
pauseBtn.addEventListener("click", pauseHandler);
