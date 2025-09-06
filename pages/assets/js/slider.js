let slides = document.getElementById("slides");
let currentIndex = 0;
let forward = true;
const totalSlides = document.querySelectorAll(".slide").length;

function moveToSlide(index) {
    slides.style.transform = "translateX(" + -index * 100 + "%)";
    currentIndex = index;
    updateActiveButton();
}

function updateActiveButton() {
    let buttons = document.querySelectorAll(".manual-btn");
    buttons.forEach((button, index) => {
        if (index === currentIndex) {
            button.classList.add("active");
        } else {
            button.classList.remove("active");
        }
    });
}

function autoSlide() {
    if (forward) {
        if (currentIndex < totalSlides - 1) {
            currentIndex++;
        } else {
            forward = false;
            currentIndex--;
        }
    } else {
        if (currentIndex > 0) {
            currentIndex--;
        } else {
            forward = true;
            currentIndex++;
        }
    }
    moveToSlide(currentIndex);
}

setInterval(autoSlide, 3000);
updateActiveButton();