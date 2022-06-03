/*var slider = document.getElementById("dimensionRange");
var output = document.getElementById("dimensionValue");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}*/


window.onload = function(){
    slideOne();
    slideTwo();
}

let sliderOne = document.getElementById("smin");
let sliderTwo = document.getElementById("smax");
let displayValOne = document.getElementById("vmin");
let displayValTwo = document.getElementById("vmax");
let minGap = 0;
let sliderTrack = document.querySelector(".slider-track");
let sliderMaxValue = document.getElementById("smax").max;

function slideOne(){
    if(parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap){
        sliderOne.value = parseInt(sliderTwo.value) - minGap;
    }
    displayValOne.textContent = sliderOne.value;
    fillColor();
}
function slideTwo(){
    if(parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap){
        sliderTwo.value = parseInt(sliderOne.value) + minGap;
    }
    displayValTwo.textContent = sliderTwo.value;
    fillColor();
}
function fillColor(){
    percent1 = (sliderOne.value / sliderMaxValue) * 100;
    percent2 = (sliderTwo.value / sliderMaxValue) * 100;
    sliderTrack.style.background = `linear-gradient(to right, #dadae5 ${percent1}% , #3264fe ${percent1}% , #3264fe ${percent2}%, #dadae5 ${percent2}%)`;
}
