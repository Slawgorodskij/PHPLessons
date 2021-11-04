console.log('Я работаю');

document.querySelector('.header__menu').addEventListener('click', () => {
  document.querySelector('.modal-menu').classList.remove('inactive');
});
document.querySelector('.modal-menu__icon').addEventListener('click', () => {
  document.querySelector('.modal-menu').classList.add('inactive');
});
