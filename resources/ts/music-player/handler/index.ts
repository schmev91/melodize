import { onloadHandler } from "./onloadHandler";
import { playHandler } from "./playHandler";
import { pauseHandler } from "./pauseHandler";

import { shortcutHandler } from "./shortcutHandler";

export { onloadHandler, playHandler, pauseHandler, shortcutHandler };

const Handling = {
    load: onloadHandler,
    play: playHandler,
    pause: pauseHandler,
    shortcut: shortcutHandler,
};

export default Handling;
