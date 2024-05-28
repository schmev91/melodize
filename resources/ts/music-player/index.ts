import { Howl, createPlayer } from "./player";
import visualizer from "./visualizer";
import { startProgressUpdater, stopProgressUpdater } from "./progress";
import { call } from "../utils";
import { onloadHandler } from "./handler/index";
import { nextHandler } from "./handler/nextHandler";
import { initController } from "./controller";

declare global {
    var player: Howl;
    var tracksList: string[];
    var trackIndex: number;
}

globalThis.tracksList = [
    "storage/tracks/シニカル・シニカル feat.Such.mp3",
    "storage/tracks/Animal - MiComet cover.mp3",
    "storage/tracks/Mikazuki Step (r-906；三日月ステップ)／DAZBEE (Cover).mp3",
];
globalThis.trackIndex = 0;

//first run
refresh();
initController();

export function refresh() {
    if (globalThis.player) globalThis.player.stop();

    //create a new Player with the current track index
    globalThis.player = createPlayer(globalThis.tracksList[trackIndex]);
    globalThis.player
        .on("load", onloadHandler)
        .on("play", call(startProgressUpdater, visualizer))
        .on("pause", stopProgressUpdater)
        .on("stop", stopProgressUpdater)
        .on("end", call(stopProgressUpdater, nextHandler));
}
