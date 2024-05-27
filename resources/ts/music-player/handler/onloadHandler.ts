import { sound } from "../player.js";
import { maxDuration, currentDuration } from "../elements.js";
import { formatTime } from "../../utils.js";

export { onloadHandler };

function onloadHandler() {
    maxDuration!.innerText = formatTime(sound.duration());
    currentDuration!.innerText = formatTime(sound.seek());
}
