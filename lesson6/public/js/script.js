console.log('Я работаю');

document.querySelector('.header__menu').addEventListener('click', () => {
  document.querySelector('.modal-menu').classList.remove('inactive');
});
document.querySelector('.modal-menu__icon').addEventListener('click', () => {
  document.querySelector('.modal-menu').classList.add('inactive');
});

const modals = document.querySelector('.modals');
const modalsItem = document.querySelector('.modals__item');
const modalsIcon = document.querySelector('.modals-icon');
const userReviews = document.querySelectorAll('.user-reviews');

userReviews.forEach((item) => {
  item.addEventListener('click', (caseOpen) => {
    modals.classList.remove('inactive');
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

const closeModal = () => {
  modals.classList.add('inactive');
};

if (document.querySelector('.product-information')) {
  const bigPhoto = document.querySelector('.product-information__big-photo');
  const smallPhoto = document.querySelectorAll('.small-photo_item');
  const smallPhotoOne = document.querySelector('.small-photo_item');
  const srcPhoto = smallPhotoOne.getElementsByTagName('img')[0];

  const renderPhoto = (dataURL) => {
    let photoModal = `<img src="${dataURL}"  alt="photo">`;
    bigPhoto.insertAdjacentHTML('beforeend', photoModal);
  };

  renderPhoto(srcPhoto.src);

  // document.addEventListener('DOMContentLoaded', () => {
  //   const smallPhotoOne = document.querySelector('.small-photo_item');
  //   const srcPhoto = smallPhotoOne.getElementsByTagName('img')[0];
  //   renderPhoto(srcPhoto.src);
  // });

  smallPhoto.forEach((elem) => {
    elem.addEventListener('click', (event) => {
      // console.log(event.target.currentSrc);
      bigPhoto.innerHTML = '';
      renderPhoto(event.target.currentSrc);
    });
  });
}
//class="modals__photo"
