// let slideIndex = 1;
// showSlides(slideIndex); // Start showing slides

// // Next/previous controls for all slides
// function plusSlides(n) {
//   showSlides(slideIndex += n);
// }

// // Thumbnail image controls for all slides
// function currentSlide(n) {
//   showSlides(slideIndex = n);
// }

// function showSlides(n) {
//   let i;
//   let slides1 = document.getElementsByClassName("mySlides1");
//   let slides = document.getElementsByClassName("mySlides");
//   let imgs = document.getElementsByClassName("color-img");
//   let totalSlides = slides1.length + slides.length;

//   if (n > totalSlides) {slideIndex = 1}
//   if (n < 1) {slideIndex = totalSlides}

//   // Hide all slides
//   for (i = 0; i < slides1.length; i++) {
//     slides1[i].style.display = "none";
//   }
//   for (i = 0; i < slides.length; i++) {
//     slides[i].style.display = "none";
//   }

//   // Remove active class from all thumbnails
//   for (i = 0; i < imgs.length; i++) {
//     imgs[i].className = imgs[i].className.replace(" active", "");
//   }

//   // Show the current slide
//   if (slideIndex <= slides1.length) {
//     slides1[slideIndex-1].style.display = "block";
//   } else {
//     slides[slideIndex-slides1.length-1].style.display = "block";
//   }

//   // Add active class to the current thumbnail
//   imgs[slideIndex-1].className += " active";
// }

function showSlides(n) {
  let i;
  let slides1 = document.getElementsByClassName("mySlides1");
  let slides = document.getElementsByClassName("mySlides");
  let imgs = document.getElementsByClassName("color-img");
  let totalSlides = slides1.length + slides.length;

  if (n > totalSlides) {slideIndex = 1;}
  if (n < 1) {slideIndex = totalSlides;}

  // Hide all slides
  for (i = 0; i < slides1.length; i++) {
    slides1[i].style.display = "none";
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  // Remove active class from all thumbnails
  for (i = 0; i < imgs.length; i++) {
    imgs[i].className = imgs[i].className.replace(" active", "");
  }

  // Show the current slide if it exists
  if (slides1.length > 0 && slideIndex <= slides1.length) {
    if (slides1[slideIndex - 1]) {
      slides1[slideIndex - 1].style.display = "block";
    }
  } else if (slides.length > 0) {
    if (slides[slideIndex - slides1.length - 1]) {
      slides[slideIndex - slides1.length - 1].style.display = "block";
    }
  }

  // Add active class to the current thumbnail if it exists
  if (imgs[slideIndex - 1]) {
    imgs[slideIndex - 1].className += " active";
  }
}
