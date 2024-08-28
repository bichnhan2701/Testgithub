// let slideIndex = 1;
// showSlides(slideIndex);

// // Next/previous controls
// function plusSlides(n) {
//   showSlides(slideIndex += n);
// }

// // Thumbnail image controls
// function currentSlide(n) {
//   showSlides(slideIndex = n);
// }

// function showSlides(n) {
//   let i;
//   let slides = document.getElementsByClassName("mySlides");
//   let imgs = document.getElementsByClassName("color-img");
//   if (n > slides.length) {slideIndex = 1}
//   if (n < 1) {slideIndex = slides.length}
//   for (i = 0; i < slides.length; i++) {
//     slides[i].style.display = "none";
//   }
//   for (i = 0; i < imgs.length; i++) {
//     imgs[i].className = imgs[i].className.replace(" active", "");
//   }
//   slides[slideIndex-1].style.display = "block";
//   imgs[slideIndex-1].className += " active";
// }


// let slideIndex = 1;
// let slideIndex1 = 0; // To track mySlides1

// showSlides1(); // Start showing mySlides1 first

// // Function to automatically show mySlides1 images
// function showSlides1() {
//   let i;
//   let slides1 = document.getElementsByClassName("mySlides1");
//   for (i = 0; i < slides1.length; i++) {
//     slides1[i].style.display = "none";
//   }
//   slideIndex1++;
//   if (slideIndex1 > slides1.length) {
//     slideIndex1 = 1;
//     showSlides(slideIndex); // Once all mySlides1 are shown, start showSlides
//     return;
//   }
//   slides1[slideIndex1-1].style.display = "block";
//   setTimeout(showSlides1, 2000); // Change image every 2 seconds
// }

// // Next/previous controls for mySlides
// function plusSlides(n) {
//   showSlides(slideIndex += n);
// }

// // Thumbnail image controls for mySlides
// function currentSlide(n) {
//   showSlides(slideIndex = n);
// }

// function showSlides(n) {
//   let i;
//   let slides = document.getElementsByClassName("mySlides");
//   let imgs = document.getElementsByClassName("color-img");
//   if (n > slides.length) {slideIndex = 1}
//   if (n < 1) {slideIndex = slides.length}
//   for (i = 0; i < slides.length; i++) {
//     slides[i].style.display = "none";
//   }
//   for (i = 0; i < imgs.length; i++) {
//     imgs[i].className = imgs[i].className.replace(" active", "");
//   }
//   slides[slideIndex-1].style.display = "block";
//   imgs[slideIndex-1].className += " active";
// }


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
  let i;
  let slides1 = document.getElementsByClassName("mySlides1");
  let slides = document.getElementsByClassName("mySlides");
  let imgs = document.getElementsByClassName("color-img");
  let totalSlides = slides1.length + slides.length;

  if (n > totalSlides) {slideIndex = 1}
  if (n < 1) {slideIndex = totalSlides}

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

  // Show the current slide
  if (slideIndex <= slides1.length) {
    slides1[slideIndex-1].style.display = "block";
  } else {
    slides[slideIndex-slides1.length-1].style.display = "block";
  }

  // Add active class to the current thumbnail
  imgs[slideIndex-1].className += " active";
}
