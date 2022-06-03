const img = document.getElementById('img');

img.addEventListener('error', function handleError() {
  img.src = '../images/no_img.png';
});
