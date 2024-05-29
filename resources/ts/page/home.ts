import { init } from "../music-player/index";
import { mounter } from "../utils";

document
    .getElementById("btn-play_userUploaded")
    ?.addEventListener(
        "click",
        mounter(init, `${window.location.origin}/api/tracks`),
    );
