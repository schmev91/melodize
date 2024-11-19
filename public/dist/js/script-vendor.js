import home from "./page/home";
import trackShow from "./page/track-show";
import { navigatedEvent } from "./music-player/constants";
export default function initScriptVendor() {
    document.addEventListener(navigatedEvent, function () {
        var parsed = location.pathname.split("/");
        switch (parsed[1]) {
            case "":
                home();
                break;
            case "tracks":
                trackShow();
                break;
            default:
                break;
        }
    });
}
