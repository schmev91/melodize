import { Howl } from "howler";

const playlist = [];

// Initialize Howler.js
var sound = new Howl({
    src: [
        "storage/tracks/シニカル・シニカル feat.Such.mp3",
        "storage/tracks/Mikazuki Step (r-906；三日月ステップ)／DAZBEE (Cover).mp3",
    ],
    // html5: true,
    onload: onloadHandler,
    onplay: function () {
        initProgressWorker();
        visualizer();
    },
    onpause: stopProgressWorker,
    onstop: stopProgressWorker,
    onend: stopProgressWorker,
});

export { sound };

import { body, musicPlayer, playBtn, pauseBtn } from "./elements.js";
import {
    onloadHandler,
    playHandler,
    pauseHandler,
    shortcutHandler,
    initProgressWorker,
    stopProgressWorker,
} from "./handler";
import visualizer from "./visualizer.js";

// add padding for the body to exclude the music player from the screen
body.style.paddingBottom = musicPlayer.clientHeight + "px";

document.addEventListener("keydown", shortcutHandler);

playBtn.addEventListener("click", playHandler);
pauseBtn.addEventListener("click", pauseHandler);
