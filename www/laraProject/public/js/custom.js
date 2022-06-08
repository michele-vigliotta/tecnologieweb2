// to get current year
function getYear() {
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    document.querySelector("#displayYear").innerHTML = currentYear;
}

getYear();

// nice select
/*$(document).ready(function () {
    $("select").niceSelect();
});*/

$(document).ready(function() {
        $('#select1').multiselect();
    });


// client section owl carousel
$(".client_owl-carousel").owlCarousel({
    loop: true,
    margin: 20,
    dots: false,
    nav: true,
    navText: [],
    autoplay: true,
    autoplayHoverPause: true,
    navText: [
        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    ],
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 2
        }
    }
});

function faqAnimation(){
  var faq = document.getElementsByClassName("faq-question");
  var i;
  for (i = 0; i < faq.length; i++) {
          faq[i].addEventListener("click", function () {
              /* Toggle between adding and removing the "active" class,
              to highlight the button that controls the panel */
              this.classList.toggle("active");
              /* Toggle between hiding and showing the active panel */
              var body = this.nextElementSibling;
              if (body.style.display === "block") {
                  body.style.display = "none";
              } else {
                  body.style.display = "block";
              }
          });
  }
}
faqAnimation();


$("select[name='tipo']").change(function() {
  let type = $(this).val();

  if(type=="camera"||type=="camera_s"||type=="camera_m"){
    $('#plc').prop('disabled', false);
    $('#as').prop('disabled', false);
    $('#nc').prop('disabled', true);
  }else {
    $('#plc').prop('disabled', true);
    $('#as').prop('disabled', true);
    $('#nc').prop('disabled', false);
  }
});
