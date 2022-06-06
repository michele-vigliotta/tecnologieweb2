let dimensionMin = document.getElementById("d-min");
let dimensionMax = document.getElementById("d-max");
let postiTotaliMin = document.getElementById("pt-min");
let postiTotaliMax = document.getElementById("pt-max");
let numeroCamereMin = document.getElementById("nc-min");
let numeroCamereMax = document.getElementById("nc-max");
let postiCamereMin = document.getElementById("pc-min");
let postiCamereMax = document.getElementById("pc-max");
let prezzoMin = document.getElementById("p-min");
let prezzoMax = document.getElementById("p-max");

function valDMin(){
  dimensionMax.setAttribute("min", parseInt(dimensionMin.value));
}

function valDMax(){
  dimensionMin.setAttribute("max", parseInt(dimensionMax.value));
}

function valPtMin(){
  postiTotaliMax.setAttribute("min", parseInt(postiTotaliMin.value));
}

function valPtMax(){
  postiTotaliMin.setAttribute("max", parseInt(postiTotaliMax.value));
}

function valNcMin(){
  numeroCamereMax.setAttribute("min", parseInt(numeroCamereMin.value));
}

function valNcMax(){
  numeroCamereMin.setAttribute("max", parseInt(numeroCamereMax.value));
}

function valPcMin(){
  postiCamereMax.setAttribute("min", parseInt(postiCamereMin.value));
}

function valPcDMax(){
  postiCamereMin.setAttribute("max", parseInt(postiCamereMax.value));
}

function valPMin(){
  prezzoMax.setAttribute("min", parseInt(prezzoMin.value));
}

function valPMax(){
  prezzoMin.setAttribute("max", parseInt(prezzoMax.value));
}

$("[type='number']").keypress(function (evt) {
    evt.preventDefault();
});

function filterAnimation(){
  var filter = document.getElementsByClassName("filter");
  $(filter[0]).css('box-sizing', 'none');
  console.log(filter[0]);
  filter[0].addEventListener("click", function () {
    console.log(this);
    this.classList.toggle("active");
    var body = this.nextElementSibling;
    console.log(body);
    if (body.style.display === "block") {
      $(body).css('display','none');
    } else {
      $(body).css('display','block');
    }
  });
}
filterAnimation();
