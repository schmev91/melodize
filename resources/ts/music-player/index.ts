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
import { onloadHandler } from "./handler/onloadHandler";
import { playHandler } from "./handler/playHandler";

declare global {
    var player: Howl;
    var tracksList: Track[];
    var trackIndex: number;
}

initController();

const url = `${window.location.href}api/tracks`;
export async function init(url: string) {
    await fetch(url)
        .then((res) => res.json())
        .then(async (data) => {
            if (globalThis.player) globalThis.player.stop();

            const Parser = new LocaltrackParser();
            data = data.map(Parser.parse);
            globalThis.tracksList = data;
            globalThis.trackIndex = 0;

            //first run
            await refresh();
            playHandler();
        });
}

export async function refresh() {
    if (globalThis.player) globalThis.player.stop();

    const currentTrack = globalThis.tracksList[trackIndex];

    //create a new Player with the current track index
    globalThis.player = createPlayer(currentTrack.url);
    globalThis.player
        .once("load", onloadHandler)
        .on("play", call(startProgressUpdater))
        .once("play", visualizer)
        .on("pause", stopProgressUpdater)
        .on("stop", stopProgressUpdater)
        .on("end", call(stopProgressUpdater, nextHandler));

    refreshPlayerView(currentTrack);
}

function refreshPlayerView({ title, artist, cover }: Track) {
    // REFRESH VIEW FOR MUSIC PLAYER
    trackTitle.innerText = title;
    trackArtist.innerText = artist;
    trackCover.src = cover;

    // Set max duration for the current playing song
    currentDuration!.innerText = formatTime(globalThis.player.seek());
    maxDuration!.innerText = formatTime(globalThis.player.duration());
}
