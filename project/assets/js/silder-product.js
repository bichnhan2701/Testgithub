let slideIndex = 1; 
showSlides(slideIndex); // Start showing slides

// Next/previous controls for all slides
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls for all slides
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  const slides = document.getElementsByClassName("mySlides");
  const imgs = document.getElementsByClassName("color_img");
  const totalSlides = slides.length;

  if (n > totalSlides) slideIndex = 1; // Reset to the first slide if out of bounds
  if (n < 1) slideIndex = totalSlides; // Reset to the last slide if out of bounds

  // Hide all slides
  Array.from(slides).forEach(slide => slide.style.display = "none");

  // Remove active class from all thumbnails
  Array.from(imgs).forEach(img => img.classList.remove("active"));

  // Show the current slide
  slides[slideIndex - 1].style.display = "block";

  // Add active class to the current thumbnail
  imgs[slideIndex - 1].classList.add("active");
}
