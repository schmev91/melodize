import { maxDuration, } from "../elements.js";
import { formatTime } from "../../utils.js";
export { onloadHandler };
// @schmev91 THIS FUNCTION IS NO LONGER USED, BUT SOME HOW IT IS STILL IN USED
function onloadHandler() {
    // const { title, artist, cover } =
    //     globalThis.tracksList[globalThis.trackIndex];
    // trackTitle.innerText = title;
    // trackArtist.innerText = artist;
    // trackCover.src = cover;
    // Set max duration for the current playing song
    maxDuration.innerText = formatTime(globalThis.player.duration());
    // currentDuration!.innerText = formatTime(globalThis.player.seek());
}
