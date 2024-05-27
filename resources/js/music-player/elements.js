var body = document.querySelector("body");

var musicPlayer = document.getElementById("music-player");

var playBtn = document.getElementById("player-play");
var pauseBtn = document.getElementById("player-pause");

var progress = document.getElementById("player-progress");

var currentDuration = document.getElementById("current-duration");
var maxDuration = document.getElementById("max-duration");

var visualizeCanvas = document.getElementById("visualize-canvas");

export {
    body,
    musicPlayer,
    playBtn,
    pauseBtn,
    currentDuration,
    maxDuration,
    progress,
    visualizeCanvas,
};
