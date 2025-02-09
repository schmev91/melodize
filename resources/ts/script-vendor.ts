import home from "./page/home";
import trackShow from "./page/track-show";
import { navigatedEvent } from "./music-player/constants";

export default function initScriptVendor(): void {
    document.addEventListener(navigatedEvent, function () {
        const parsed = location.pathname.split("/");

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
