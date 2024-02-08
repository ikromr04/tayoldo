import { toggleDashNav } from './api.js';
import TextManager from './text.js';

const dashToggleEl = document.querySelector('.dash__btn');
const dashEl = document.querySelector('.dashboard');
const textManager = new TextManager();

dashToggleEl.addEventListener('click', async (evt) => {
  evt.preventDefault();
  await toggleDashNav();
  dashEl.classList.toggle('dashboard--closed');
});

textManager.init();
