import { Howl, createPlayer } from "./player";
import visualizer from "./visualizer";
import { startProgressUpdater, stopProgressUpdater } from "./progress";
import { call } from "../utils";
import { onloadHandler } from "./handler/index";
import { nextHandler } from "./handler/nextHandler";
import { initController } from "./controller";
import Track from "../interface/Track";
import LocaltrackParser from "../class/LocaltrackParser";

declare global {
    var player: Howl;
    var tracksList: Track[];
    var trackIndex: number;
}

const url = `${window.location.href}api/tracks`;
fetch(url)
    .then((res) => res.json())
    .then((data) => {
        const Parser = new LocaltrackParser();
        data = data.map(Parser.parse);
        globalThis.tracksList = data;
        globalThis.trackIndex = 0;

        console.log(data);
        //first run
        refresh();
        initController();
    });

export function refresh() {
    if (globalThis.player) globalThis.player.stop();

    //create a new Player with the current track index
    globalThis.player = createPlayer(globalThis.tracksList[trackIndex].url);
    globalThis.player
        .once("load", onloadHandler)
        .on("play", call(startProgressUpdater))
        .once("play", visualizer)
        .on("pause", stopProgressUpdater)
        .on("stop", stopProgressUpdater)
        .on("end", call(stopProgressUpdater, nextHandler));
}
