import { getAudioContext } from "../utils";
import { visualizeCanvas } from "./elements";
var context = visualizeCanvas.getContext("2d");
var analyser;
export default function visualizer() {
    // Get the AudioContext instance from Howler.js _node
    // const audioCtx = globalThis.player._sounds[0]._node.context;
    var audioCtx = getAudioContext();
    // Create the analyser node
    analyser = audioCtx.createAnalyser();
    analyser.fftSize = 128;
    // Connect Howler.js sound to the analyser node
    var audioNode = globalThis.player._sounds[0]._node;
    audioNode.connect(analyser);
    analyser.connect(audioCtx.destination);
    visualize();
}
function visualize() {
    if (!analyser) {
        // If analyser is not initialized, return
        return;
    }
    var bufferLength = analyser.frequencyBinCount;
    var dataArray = new Uint8Array(bufferLength);
    var barWidth = (visualizeCanvas.width / bufferLength) * 1.5;
    function animate() {
        context.clearRect(0, 0, visualizeCanvas.width, visualizeCanvas.height);
        analyser.getByteFrequencyData(dataArray);
        var x = 0;
        for (var i = 0; i < bufferLength; i++) {
            var barHeight = dataArray[i];
            // // Calculate color based on the bar index or height
            // const hue = (i * 360) / bufferLength; // Varying hue from 0 to 360 degrees
            // context!.fillStyle = `hsl(${hue}, 100%, 50%)`;
            // context!.fillStyle = "#d4d7f8";
            context.fillStyle = "#9eb3e6";
            context.fillRect(x, visualizeCanvas.height - barHeight, barWidth, barHeight);
            x += barWidth;
        }
        requestAnimationFrame(animate);
    }
    animate();
}
