import {
    maxDuration,
    currentDuration,
    trackCover,
    trackTitle,
    trackArtist,
} from "../elements.js";
import { formatTime } from "../../utils.js";

export { onloadHandler };

function onloadHandler() {
    const { title, artist, cover } =
        globalThis.tracksList[globalThis.trackIndex];
    trackTitle.innerText = title;
    trackArtist.innerText = artist;
    trackCover.src = cover;

    // Set max duration for the current playing song
    maxDuration!.innerText = formatTime(globalThis.player.duration());
    currentDuration!.innerText = formatTime(globalThis.player.seek());
}
