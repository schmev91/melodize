import { maxDuration, currentDuration } from "../elements.js";
import { formatTime } from "../../utils.js";

export { onloadHandler };

function onloadHandler() {
    maxDuration!.innerText = formatTime(globalThis.player.duration());
    currentDuration!.innerText = formatTime(globalThis.player.seek());
}
