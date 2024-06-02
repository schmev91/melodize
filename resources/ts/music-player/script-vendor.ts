import home from "../page/home";
import trackShow from "../page/track-show";
import { navigatedEvent } from "./constants";

export default function initScriptVendor(): void {
    document.addEventListener(navigatedEvent, function () {
        const parsed = location.pathname.split("/");
        console.log(parsed);

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
