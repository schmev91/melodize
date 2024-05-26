import { sound } from "./player";
import { playHandler, pauseHandler, updateProgressTime } from "./handler";

function shortcutHandler(event) {
    switch (event.code) {
        case "Space":
            event.preventDefault();
            if (sound.playing()) pauseHandler();
            else playHandler();
            break;
        case "ArrowLeft":
            sound.seek(sound.seek() - 3);
            updateProgressTime();
            break;
        case "ArrowRight":
            sound.seek(sound.seek() + 3);
            updateProgressTime();
            break;
        // case "ArrowUp":
        //     sound.volume(sound.volume() + 0.1);
        //     break;
        // case "ArrowDown":
        //     sound.volume(sound.volume() - 0.1);
        //     break;
    }
}
export { shortcutHandler };
