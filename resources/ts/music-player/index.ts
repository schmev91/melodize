import { Howl } from "./player";
import { initController } from "./controller";
import Track from "../interface/Track";
import initScriptVendor from "./script-vendor";

declare global {
    var player: Howl;
    var tracksList: Track[];
    var trackIndex: number;
}

// add listener to music player buttons
initController();
// boot script vendor to execute specific script base on route due to the inconvenient of livewire
initScriptVendor();
