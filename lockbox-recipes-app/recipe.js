const overlay = document.querySelector('#overlay');
const modal = document.querySelector('.modal-container');
const deleteBtn = document.querySelector('#deleteBtn');
const modalNo = document.querySelector('.modal-no');

const showModal = (e) => {
   e.preventDefault();
   window.scrollTo(0,0);
   modal.style.display = 'block';
   overlay.style.display = 'block';
}

const hideModal = (e) => {
   e.preventDefault();
   modal.style.display = 'none';
   overlay.style.display = 'none';
}

deleteBtn.addEventListener("click", showModal);
modalNo.addEventListener("click", hideModal);
