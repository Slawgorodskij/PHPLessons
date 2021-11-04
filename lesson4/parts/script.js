document.querySelector('.header__menu').addEventListener('click', () => {
  document.querySelector('.modal-menu').classList.remove('inactive');
});
document.querySelector('.modal-menu__icon').addEventListener('click', () => {
  document.querySelector('.modal-menu').classList.add('inactive');
});

const modals = document.querySelector('.modals');
const modalsItem = document.querySelector('.modals__item');
const modalsIcon = document.querySelector('.modals-icon');
const listJs = document.querySelectorAll('.list-js');

listJs.forEach((item) => {
  item.addEventListener('click', (caseOpen) => {
    renderModals(caseOpen);
  });
});

modalsIcon.addEventListener('click', () => {
  closeModal();
});

modals.addEventListener('click', (caseClose) => {
  if (caseClose.target === modals) {
    closeModal();
  }
});

const renderModals = (caseOpen) => {
  modals.classList.remove('inactive');
  let photoModal = `<img src="${caseOpen.target.currentSrc}" class="modals__photo" alt="photo">`;
  modalsItem.insertAdjacentHTML('beforeend', photoModal);
};

const closeModal = () => {
  modals.classList.add('inactive');
  document.querySelector('.modals__photo').remove();
};
