import { Howl } from "../player";
import { pauseHandler } from "./pauseHandler";
import { playHandler } from "./playHandler";
import { updateProgressTime } from "../progress";

function shortcutHandler(event: KeyboardEvent) {
    switch (event.code) {
        case "Space":
            event.preventDefault();
            if (globalThis.player.playing()) pauseHandler();
            else playHandler();
            break;
        case "ArrowLeft":
            globalThis.player.seek(globalThis.player.seek() - 3);
            updateProgressTime();
            break;
        case "ArrowRight":
            globalThis.player.seek(globalThis.player.seek() + 3);
            updateProgressTime();
            break;
        case "ArrowUp":
            event.preventDefault();
            globalThis.player.volume(globalThis.player.volume() + 0.1);
            break;
        case "ArrowDown":
            event.preventDefault();
            globalThis.player.volume(globalThis.player.volume() - 0.1);
            break;
    }
}

export { shortcutHandler };
