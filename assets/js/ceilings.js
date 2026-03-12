"use strict"

function openOrderForm(furnitureTitle) {
  const modal = document.querySelector('#order-modal');
  modal.style.display = 'block';

  const input = document.querySelector('#ceilings_title');
  if (input) {
      input.value = furnitureTitle;
  }
}

function closeOrderForm() {
  document.querySelector('#order-modal').style.display = 'none';
}

// Close modal when clicking outside of it
window.onclick = function(event) {
  const modal = document.querySelector('#order-modal');
  if (event.target === modal) {
      modal.style.display = 'none';
  }
}