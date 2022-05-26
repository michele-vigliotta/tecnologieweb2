/*function getDate(){
  var today = new Date();
  var tomorrow = new Date(today);

  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0');
  var yyyy = today.getFullYear();

  today = yyyy + '-' + mm + '-' + dd;
  document.getElementById('data').value = today;
  document.getElementById('data').min = today;

  tomorrow.setDate(tomorrow.getDate() + 1);
  var dd = String(tomorrow.getDate()).padStart(2, '0');
  var mm = String(tomorrow.getMonth() + 1).padStart(2, '0');
  var yyyy = tomorrow.getFullYear();

  tomorrow = yyyy + '-' + mm + '-' + dd;
  document.getElementById('endDate').value = tomorrow;
  document.getElementById('endDate').min = tomorrow;
}

getDate();*/

// to get current year
function getYear() {
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    document.querySelector("#displayYear").innerHTML = currentYear;
}

getYear();

// nice select
$(document).ready(function () {
    $("select").niceSelect();
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
