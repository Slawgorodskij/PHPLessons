document.querySelector('.header__menu').addEventListener('click', () => {
  document.querySelector('.modal-menu').classList.remove('inactive');
});
document.querySelector('.modal-menu__icon').addEventListener('click', () => {
  document.querySelector('.modal-menu').classList.add('inactive');
});

const modals = document.querySelectorAll('.modals');
const modalsItem = document.querySelector('.modals__item');
const modalsIcon = document.querySelectorAll('.modals-icon');

if (document.querySelector('.entrance')) {
  const registration = document.querySelector('.registration');
  const entrance = document.querySelector('.entrance-modals');
  const btnRegistration = document.querySelector('.btn-registration');
  const btnEntrance = document.querySelector('.btn-entrance');

  btnRegistration.addEventListener('click', () => {
    registration.classList.remove('inactive');
  });

  btnEntrance.addEventListener('click', () => {
    entrance.classList.remove('inactive');
  });
}

modalsIcon.forEach((event) => {
  event.addEventListener('click', () => {
    closeModal();
  });
});

modals.forEach((elem) => {
  elem.addEventListener('click', (caseClose) => {
    if (caseClose.target === elem) {
      closeModal();
    }
  });
});

const closeModal = () => {
  modals.forEach((event) => {
    event.classList.add('inactive');
  });
};

if (document.querySelector('.user-reviews')) {
  const userReviews = document.querySelector('.user-reviews');
  const modalReviews = document.querySelector('.modal-reviews');

  userReviews.addEventListener('click', () => {
    modalReviews.classList.remove('inactive');
  });
}

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

  smallPhoto.forEach((elem) => {
    elem.addEventListener('click', (event) => {
      bigPhoto.innerHTML = '';
      renderPhoto(event.target.currentSrc);
    });
  });
}

if (document.querySelector('.greeting')) {
  const greeting = document.querySelector('.greeting');
  greeting.classList.remove('inactive');
  setTimeout(closeModal, 1000);
}
