function changeImage(element) {
  const mainImage = document.querySelector('#main-image');
  mainImage.src = element.src.replace('100x80', '600x400');
  
  // Remove active class from all thumbs
  document.querySelectorAll('.thumb').forEach(thumb => {
      thumb.classList.remove('active');
  });
  
  // Add active class to clicked thumb
  element.classList.add('active');
}