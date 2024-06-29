import { initController } from "./controller";
import initScriptVendor from "../script-vendor";
// add listener to music player buttons
initController();
// boot script vendor to execute specific script base on route due to the inconvenient of livewire
initScriptVendor();
