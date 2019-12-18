# -
Падающий снег для сайта на HTML5 Canvas
<section class="xmas">
 <!-- Блок Merry Xmas -->
 <div class="xmas-message"></div>
 
 <!-- Снег! -->
 <canvas id="xmas"></canvas>
</section>
.xmas {
 height: 100%;
 width: 100%;
 position: relative;
 background: url("../images/xmas-large.jpg") no-repeat 0 0/cover;
}
.xmas .xmas-message {
 position: absolute;
 left: 50%;
 top: 50%;
 z-index: 2;
 -ms-transform: translate(-50%, -50%);
 -webkit-transform: translate(-50%, -50%);
 transform: translate(-50%, -50%);
 width: calc(90% - 6rem);
 height: calc(100% - 12rem);
 margin: 0 auto;
 background: url(../images/merryxmas.png) no-repeat 50% 50% / contain;
}
.xmas .from {
 position: absolute;
 bottom: 40px;
 width: 100%;
 z-index: 3;
 text-align: center;
}
.xmas .from div {
 font-family: "quimby-mayoral", sans-serif;
 color: #ffffff;
 font-size: 40px;
 margin-bottom: 10px;
}
.xmas .from .gc-link {
 display: inline-block;
 font-family: "brandon-grotesque", sans-serif;
 font-size: 24px;
 color: #ffffff;
 -webkit-transition: 400ms ease;
 transition: 400ms ease;
 text-decoration: none;
 text-transform: uppercase;
}
.xmas .from .gc-link:hover {
 color: #1cff94;
}
.xmas #xmas {
 width: 100%;
 height: 100%;
 position: relative;
 z-index: 2;
}
$(document).ready(function(){
 
 initLetItSnow();
});
 
var initLetItSnow = function(){
 
 (function() {
 var requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame ||
 function(callback) {
 window.setTimeout(callback, 1000 / 60);
 };
 window.requestAnimationFrame = requestAnimationFrame;
 })();
 
 var flakes = [],
 canvas = document.getElementById("xmas"),
 ctx = canvas.getContext("2d"),
 mX = -100,
 mY = -100;
 
 if( $(window).width() < 999 ){
 var flakeCount = 125;
 } else {
 var flakeCount = 450;
 }
 
 canvas.width = window.innerWidth;
 canvas.height = window.innerHeight;
 
 function snow() {
 ctx.clearRect(0, 0, canvas.width, canvas.height);
 
 for (var i = 0; i < flakeCount; i++) {
 var flake = flakes[i],
 x = mX,
 y = mY,
 minDist = 250,
 x2 = flake.x,
 y2 = flake.y;
 
 var dist = Math.sqrt((x2 - x) * (x2 - x) + (y2 - y) * (y2 - y)),
 dx = x2 - x,
 dy = y2 - y;
 
 if (dist < minDist) {
 var force = minDist / (dist * dist),
 xcomp = (x - x2) / dist,
 ycomp = (y - y2) / dist,
 deltaV = force;
 
 flake.velX -= deltaV * xcomp;
 flake.velY -= deltaV * ycomp;
 
 } else {
 flake.velX *= .98;
 if (flake.velY <= flake.speed) {
 flake.velY = flake.speed
 }
 flake.velX += Math.cos(flake.step += .05) * flake.stepSize;
 }
 
 ctx.fillStyle = "rgba(255,255,255," + flake.opacity + ")";
 flake.y += flake.velY;
 flake.x += flake.velX;
 
 if (flake.y >= canvas.height || flake.y <= 0) {
 reset(flake);
 }
 
 if (flake.x >= canvas.width || flake.x <= 0) {
 reset(flake);
 }
 
 ctx.beginPath();
 ctx.arc(flake.x, flake.y, flake.size, 0, Math.PI * 2);
 ctx.fill();
 }
 requestAnimationFrame(snow);
 };
 
 function reset(flake) {
 flake.x = Math.floor(Math.random() * canvas.width);
 flake.y = 0;
 flake.size = (Math.random() * 3) + 2;
 flake.speed = (Math.random() * 1) + 0.5;
 flake.velY = flake.speed;
 flake.velX = 0;
 flake.opacity = (Math.random() * 0.5) + 0.3;
 }
 
 function init() {
 for (var i = 0; i < flakeCount; i++) {
 var x = Math.floor(Math.random() * canvas.width),
 y = Math.floor(Math.random() * canvas.height),
 size = (Math.random() * 3) + 4,
 speed = (Math.random() * 1) + 0.5,
 opacity = (Math.random() * 0.5) + 0.3;
 
 flakes.push({
 speed: speed,
 velY: speed,
 velX: 0,
 x: x,
 y: y,
 size: size,
 stepSize: (Math.random()) / 160,
 step: 0,
 opacity: opacity
 });
 }
 
 snow();
 };
 
 canvas.addEventListener("mousemove", function(e) {
 mX = e.clientX,
 mY = e.clientY
 });
 
 window.addEventListener("resize",function(){
 canvas.width = window.innerWidth;
 canvas.height = window.innerHeight;
 })
 
 init();
};
