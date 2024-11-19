import { init } from "../music-player/core";
import { getOrigin, mounter } from "../utils";
export default function home() {
    var _a;
    (_a = document
        .getElementById("btn-play_userUploaded")) === null || _a === void 0 ? void 0 : _a.addEventListener("click", mounter(init, "".concat(getOrigin(), "/api/tracks")));
}
