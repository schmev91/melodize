import { init } from "../music-player/core";
import { getOrigin, mounter } from "../utils";

export default function home(): void {
    document
        .getElementById("btn-play_userUploaded")
        ?.addEventListener("click", mounter(init, `${getOrigin()}/api/tracks`));
}
