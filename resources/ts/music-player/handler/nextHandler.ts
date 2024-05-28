import { refresh } from "../index";
import { Howl } from "../player";

export { nextHandler };

function nextHandler() {
    globalThis.trackIndex++;
    if (globalThis.trackIndex >= globalThis.tracksList.length)
        globalThis.trackIndex = 0;
    refresh();
}
