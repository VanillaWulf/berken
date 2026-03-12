"use strict";

const sliderState = {};

function initSlider(cardId, slideIndex = 1) {
    if (!sliderState[cardId]) {
        sliderState[cardId] = slideIndex;
    }
}

function slidePrev(cardId) {
    changeSlide(cardId, -1);
}

function slideNext(cardId) {
    changeSlide(cardId, 1);
}

function goToSlide(cardId, slideIndex) {
    sliderState[cardId] = slideIndex + 1;
    updateSlider(cardId);
}

function changeSlide(cardId, n) {
    if (!sliderState[cardId]) {
        sliderState[cardId] = 1;
    }
    sliderState[cardId] += n;
    updateSlider(cardId);
}

function updateSlider(cardId) {
    const card = document.querySelector(`[data-card-id="${cardId}"]`);
    const slides = card.querySelectorAll(".slider-img");
    const dots = card.querySelectorAll(".dot");
    const totalSlides = slides.length;

    if (sliderState[cardId] > totalSlides) {
        sliderState[cardId] = 1;
    }
    if (sliderState[cardId] < 1) {
        sliderState[cardId] = totalSlides;
    }

    slides.forEach((slide, i) => {
        slide.classList.remove("active");
        if (i === sliderState[cardId] - 1) {
            slide.classList.add("active");
        }
    });

    dots.forEach((dot, i) => {
        dot.classList.remove("active");
        if (i === sliderState[cardId] - 1) {
            dot.classList.add("active");
        }
    });
}

// Initialize all sliders
document.querySelectorAll('.work-card').forEach(card => {
    const cardId = parseInt(card.getAttribute('data-card-id'));
    initSlider(cardId);
});