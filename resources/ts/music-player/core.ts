import LocaltrackParser from "../class/LocaltrackParser";
import Track from "../interface/Track";
import { call, formatTime, getOrigin } from "../utils";
import {
    trackTitle,
    trackArtist,
    trackCover,
    currentDuration,
    maxDuration,
    playerLabel,
} from "./elements";
import { onloadHandler } from "./handler/index";
import { nextHandler } from "./handler/nextHandler";
import { playHandler } from "./handler/playHandler";
import { createPlayer } from "./player";
import { startProgressUpdater, stopProgressUpdater } from "./progress";
import visualizer from "./visualizer";

// FETCH AND INIT PLAYER FROM API
export async function init(url: string) {
    await fetch(url)
        .then((res) => res.json())
        .then(async (data: Track[]) => {
            play(data);
        });
}

export function play(data: Track[]) {
    stopPlayer();
    globalThis.tracksList = parseService(data);
    globalThis.trackIndex = 0;

    //first run
    refresh();
    playHandler();
}
function parseService(data: Track[]): Track[] {
    const Parser = new LocaltrackParser();
    data = data.map(Parser.parse);
    return data;
}

function stopPlayer(): void {
    if (globalThis.player) globalThis.player.stop();
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

function refreshPlayerView({ id, title, artist, cover }: Track) {
    // UPDATE TRACK LINK FOR LABEL
    playerLabel.href = `${getOrigin()}/tracks/${id}`;
    // REFRESH VIEW FOR MUSIC PLAYER
    trackTitle.innerText = title;
    trackArtist.innerText = artist;
    trackCover.src = cover;

    // Set max duration for the current playing song
    currentDuration!.innerText = formatTime(globalThis.player.seek());
    maxDuration!.innerText = formatTime(globalThis.player.duration());
}
