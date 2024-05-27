import { Howl as HowlType } from "howler";

// Extend the existing Howl type definition
interface Howl extends HowlType {
    [key: string]: any;
}

// Initialize Howler.js
var sound: Howl = new HowlType({
    src: ["storage/tracks/シニカル・シニカル feat.Such.mp3"],
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

import {
    onloadHandler,
    playHandler,
    pauseHandler,
    shortcutHandler,
    initProgressWorker,
    stopProgressWorker,
} from "./handler/index.js";
import visualizer from "./visualizer.js";

import { body, musicPlayer, playBtn, pauseBtn } from "./elements.js";

// add padding for the body to exclude the music player from the screen
body!.style.paddingBottom = (musicPlayer?.clientHeight || 0) + "px";

document.addEventListener("keydown", shortcutHandler);

playBtn!.addEventListener("click", playHandler);
pauseBtn!.addEventListener("click", pauseHandler);
