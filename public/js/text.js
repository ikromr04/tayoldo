import { updateText } from './api.js';
import { createElement } from '/js/util.js';

const SHAKE_CLASS_NAME = 'shake';
const SHAKE_ANIMATION_TIMEOUT = 600;
const Operation = {
  UNCOMPLETED: '<small class="text-aware">Завершите действие</small>',
  NO_TEXT: '<small class="text-aware">Поле не может быть пустым</small>',
  FAILED: '<small class="text-aware">Что то пошло не так</small>',
  SUCCESS: '<small class="text-aware text-aware--success">Текст успешно изменен</small>',
}

const Mode = {
  DEFAULT: 'default',
  EDIT: 'edit',
  SAVE: 'save',
};

const ActionTemplate = {
  EDIT: '<button class="action action--edit">редактировать</button>',
  SAVE: '<button class="action action--save">сохранить</button>',
  CANCEL: '<button class="action action--cancel">отмена</button>',
};

export default class TextManager {
  #textWrapEl = null;
  #textEl = null;
  #initialText = null;
  #textSlug = null;
  #editEl = null;
  #saveEl = null;
  #cancelEl = null;

  #mode = Mode.DEFAULT;

  init = () => document.addEventListener('mouseover', this.#documentMouseoverHandler);

  shake = () => {
    this.#textWrapEl.scrollIntoView({ block: 'center', behavior: 'smooth' });
    this.#textWrapEl.classList.add(SHAKE_CLASS_NAME);
    setTimeout(() => {
      this.#textWrapEl.classList.remove(SHAKE_CLASS_NAME);
    }, SHAKE_ANIMATION_TIMEOUT);
  };

  #changeMode = (mode) => {
    switch (mode) {
      case Mode.DEFAULT:
        this.#textWrapEl.replaceWith(this.#textEl);
        this.#textEl.removeAttribute('style');
        this.#textEl.removeAttribute('contenteditable');
        this.#textEl.setAttribute('data-text', this.#textSlug);
        this.#textEl.textContent = this.#initialText;
        this.#textWrapEl.remove();
        this.#textWrapEl = null;
        this.#textEl = null;
        this.#initialText = null;
        this.#textSlug = null;
        this.#editEl = null;
        this.#saveEl = null;
        this.#cancelEl = null;
        this.#mode = mode;
        break;

      case Mode.EDIT:
        this.#textWrapEl = document.createElement('div');
        this.#textEl.replaceWith(this.#textWrapEl);
        this.#textWrapEl.setAttribute('style', 'position: relative;');
        this.#textEl.setAttribute('style', 'outline: 1px solid #959595;');
        this.#renderCancelEl();
        this.#textWrapEl.append(this.#textEl);
        this.#renderSaveEl();
        this.#textSlug = this.#textEl.dataset.text;
        this.#textEl.removeAttribute('data-text');
        this.#initialText = this.#textEl.textContent;
        this.#textEl.contentEditable = true;
        this.#textWrapEl.scrollIntoView({ block: 'center', behavior: 'smooth' });

        this.#textEl.addEventListener('input', this.#textElInputHandler);
        this.#mode = mode;
        break;

      case Mode.SAVE:
        this.#saveEl.removeAttribute('disabled');
        this.#textEl.setAttribute('style', 'outline: 1px solid #00D72F;');
        this.#mode = mode;
        break;
    }
  };

  #documentMouseoverHandler = (evt) => {
    if (evt.target.dataset.text) {
      evt.target.setAttribute('style', 'position: relative; outline: 1px solid red;');
      this.#editEl = createElement(ActionTemplate.EDIT);
      evt.target.append(this.#editEl);

      document.removeEventListener('mouseover', this.#documentMouseoverHandler);
      evt.target.addEventListener('mouseleave', this.#textElMouseleaveHandler);
      this.#editEl.addEventListener('click', this.#editElClickHandler);
    }
  };

  #textElMouseleaveHandler = (evt) => {
    evt.target.removeAttribute('style');
    this.#editEl.remove();
    this.#editEl = null;

    document.addEventListener('mouseover', this.#documentMouseoverHandler);
    evt.target.removeEventListener('mouseleave', this.#textElMouseleaveHandler);
  };

  #textElInputHandler = () => {
    if (this.#textEl.textContent === this.#initialText) {
      const textEl = this.#textEl;
      textEl.dataset.text = this.#textSlug;
      this.#changeMode(Mode.DEFAULT);
      this.#textEl = textEl;
      this.#changeMode(Mode.EDIT);
    } else {
      this.#changeMode(Mode.SAVE);
    }
  };

  #editElClickHandler = (evt) => {
    switch (this.#mode) {
      case Mode.DEFAULT:
        this.#textEl = evt.target.parentElement;
        this.#textEl.removeAttribute('style');
        evt.target.remove();
        this.#editEl = null;

        document.addEventListener('mouseover', this.#documentMouseoverHandler);
        this.#textEl.removeEventListener('mouseleave', this.#textElMouseleaveHandler);
        this.#changeMode(Mode.EDIT);
        break;

      case Mode.EDIT:
        this.#changeMode(Mode.DEFAULT);
        this.#textEl = evt.target.parentElement;
        this.#textEl.removeAttribute('style');
        evt.target.remove();
        this.#editEl = null;

        document.addEventListener('mouseover', this.#documentMouseoverHandler);
        this.#textEl.removeEventListener('mouseleave', this.#textElMouseleaveHandler);
        this.#changeMode(Mode.EDIT);
        break;

      case Mode.SAVE:
        this.shake();
        if (this.#textWrapEl.querySelector('small')) {
          this.#textWrapEl.querySelector('small').remove();
        }
        this.#textWrapEl.append(createElement(Operation.UNCOMPLETED));
        break;
    }
  };

  #cancelElClickHandler = () => this.#changeMode(Mode.DEFAULT);

  #saveElClickHandler = () => {
    if (this.#textEl.textContent.length === 0) {
      this.shake();
      if (this.#textWrapEl.querySelector('small')) {
        this.#textWrapEl.querySelector('small').remove();
      }
      this.#textWrapEl.append(createElement(Operation.NO_TEXT));
      return;
    }
    this.#saveEl.textContent = 'сохранение...';

    updateText(
      {
        slug: this.#textSlug,
        text: this.#textEl.textContent,
      },
      (response) => {
        this.#saveEl.textContent = 'сохранить';
        if (this.#textWrapEl.querySelector('small')) {
          this.#textWrapEl.querySelector('small').remove();
        }
        this.#textWrapEl.append(createElement(Operation.SUCCESS));
        this.#initialText = response.text;
        setTimeout(() => {
          this.#changeMode(Mode.DEFAULT);
        }, 1000);
      },
      () => {
        if (this.#textWrapEl.querySelector('small')) {
          this.#textWrapEl.querySelector('small').remove();
        }
        this.#textWrapEl.append(createElement(Operation.FAILED));
      }
    );
  };

  #renderCancelEl = () => {
    this.#cancelEl = createElement(ActionTemplate.CANCEL);
    this.#textWrapEl.append(this.#cancelEl);

    this.#cancelEl.addEventListener('click', this.#cancelElClickHandler);
  };

  #renderSaveEl = () => {
    this.#saveEl = createElement(ActionTemplate.SAVE);
    this.#saveEl.disabled = true;
    this.#textWrapEl.append(this.#saveEl);
    this.#saveEl.addEventListener('click', this.#saveElClickHandler);
  };
}
