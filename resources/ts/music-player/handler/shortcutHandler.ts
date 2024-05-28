import { Howl } from "../player";
import { pauseHandler } from "./pauseHandler";
import { playHandler } from "./playHandler";
import { updateProgressTime } from "../progress";
import { volumeDown, volumeUp } from "./volumeHandler";

function shortcutHandler(event: KeyboardEvent) {
    switch (event.code) {
        case "Space":
            event.preventDefault();
            if (globalThis.player.playing()) pauseHandler();
            else playHandler();
            break;
        case "ArrowLeft":
            globalThis.player.seek(Math.floor(globalThis.player.seek() - 3));
            updateProgressTime();
            break;
        case "ArrowRight":
            globalThis.player.seek(Math.floor(globalThis.player.seek() + 3));
            updateProgressTime();
            break;
        case "ArrowUp":
            event.preventDefault();
            volumeUp();
            break;
        case "ArrowDown":
            event.preventDefault();
            volumeDown();
            break;
    }
}

export { shortcutHandler };
