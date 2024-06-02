import LocaltrackParser from "../class/LocaltrackParser";
import Track from "../interface/Track";
import { call, formatTime } from "../utils";
import { trackTitle, trackArtist, trackCover, currentDuration, maxDuration } from "./elements";
import { onloadHandler } from "./handler/index";
import { nextHandler } from "./handler/nextHandler";
import { playHandler } from "./handler/playHandler";
import { createPlayer } from "./player";
import { startProgressUpdater, stopProgressUpdater } from "./progress";
import visualizer from "./visualizer";

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
            refresh();
            playHandler();
        });
}

export function refresh() {
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
