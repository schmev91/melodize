import { Howl, createPlayer } from "./player";
import visualizer from "./visualizer";
import { startProgressUpdater, stopProgressUpdater } from "./progress";
import { call, formatTime } from "../utils";
import { nextHandler } from "./handler/nextHandler";
import { initController } from "./controller";
import Track from "../interface/Track";
import LocaltrackParser from "../class/LocaltrackParser";
import {
    currentDuration,
    maxDuration,
    trackArtist,
    trackCover,
    trackTitle,
} from "./elements";

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

    const { title, artist, cover, url } = globalThis.tracksList[trackIndex];

    //create a new Player with the current track index
    globalThis.player = createPlayer(url);
    globalThis.player
        .on("play", call(startProgressUpdater))
        .once("play", visualizer)
        .on("pause", stopProgressUpdater)
        .on("stop", stopProgressUpdater)
        .on("end", call(stopProgressUpdater, nextHandler));

    // REFRESH VIEW FOR MUSIC PLAYER
    trackTitle.innerText = title;
    trackArtist.innerText = artist;
    trackCover.src = cover;
    // Set max duration for the current playing song
    maxDuration!.innerText = formatTime(globalThis.player.duration());
    currentDuration!.innerText = formatTime(globalThis.player.seek());
}
