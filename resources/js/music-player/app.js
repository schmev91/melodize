import { Howl } from "howler";

const tracksList = [
    "storage/tracks/シニカル・シニカル feat.Such.mp3",
    "storage/tracks/Animal - MiComet cover.mp3",
    "storage/tracks/Mikazuki Step (r-906；三日月ステップ)／DAZBEE (Cover).mp3",
];
let player = new Howl();
let trackIndex = 0;

function refresh() {
    if (player) player.stop();

    player = new Howl({
        src: [tracksList[trackIndex]],
        onload: onloadHandler,
        onplay: function () {
            initProgressWorker();
            visualizer();
        },
        onpause: stopProgressWorker,
        onstop: stopProgressWorker,
        onend: function () {
            stopProgressWorker();
            playNext();
        },
    });
}

function playNext() {
    trackIndex++;
    if (trackIndex >= tracksList.length) trackIndex = 0;
    refresh();
}
function playPrevious() {
    trackIndex--;
    if (trackIndex < 0) trackIndex = tracksList.length - 1;
    refresh();
}
