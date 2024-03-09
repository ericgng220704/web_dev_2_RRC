let currentImageIndex = 1;
const images = document.querySelectorAll(".carousel__items--2 img");
const totalImages = images.length;

function toggleImage(index) {
     const currentImage = document.getElementById(`${index}`);
     currentImage.classList.toggle("hidden");
}

toggleImage(currentImageIndex);

document.querySelector(".next-button").addEventListener("click", function () {
     currentImageIndex = currentImageIndex + 1;
     if (currentImageIndex <= totalImages) {
          toggleImage(currentImageIndex);
          toggleImage(currentImageIndex - 1);
          console.log(currentImageIndex);
     } else {
          currentImageIndex = totalImages;
     }
});

document.querySelector(".prev-button").addEventListener("click", function () {
     currentImageIndex = currentImageIndex - 1;
     if (currentImageIndex >= 1) {
          toggleImage(currentImageIndex);
          toggleImage(currentImageIndex + 1);
          console.log(currentImageIndex);
     } else {
          currentImageIndex = 1;
     }
});
