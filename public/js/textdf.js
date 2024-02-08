import { createElement } from './util.js';

const BtnTemplate = {
  EDIT: '<button class="text-btn text-btn--edit" title="Редактировать" type="button"></button>',
  RESET: '<button class="text-btn text-btn--reset" title="Сбросить" type="button"></button>',
  SAVE: '<button class="text-btn text-btn--save" title="Сохранить" type="button"></button>',
  CANCEL: '<button class="text-btn text-btn--cancel" title="Отмена" type="button"></button>',
};

const TextStyle = {
  HOVER: 'outline: 1px solid red; position: relative;',
  EDIT: 'outline: 1px solid black; position: relative;',
};

const EditText = {
  evt: null,
  element: null,
  caption: null,
  text: null,
  isEditted: false,
  button: {
    reset: createElement(BtnTemplate.RESET),
    save: createElement(BtnTemplate.SAVE),
    cancel: createElement(BtnTemplate.CANCEL),
  },

  init(evt) {
    if (EditText.evt) {
      EditText.destroy();
    }
    EditText.evt = evt;
    EditText.element = evt.target;
    EditText.caption = evt.target.dataset.text;
    EditText.text = evt.target.textContent;

    HoverText.destroy();
    EditText.element.contentEditable = true;
    EditText.element.removeAttribute('data-text');
    EditText.element.setAttribute('style', TextStyle.EDIT);
    EditText.element.focus();
    document.addEventListener('keydown', EditText.documentEscapeKeydownHandler);
    document.addEventListener('click', EditText.documentClickHandler);
    EditText.element.addEventListener('input', EditText.elementInputHandler);

    Object.values(EditText.button).forEach((element) => EditText.element.insertAdjacentElement('beforeend', element));
  },

  destroy() {
    EditText.evt = null;
    EditText.element.setAttribute('data-text', EditText.caption);
    EditText.element.contentEditable = false;
    EditText.element.removeAttribute('style');
    EditText.element.removeEventListener('input', EditText.elementInputHandler)
    EditText.element = null;
    EditText.caption = null;
    EditText.text = null;
    EditText.isEditted = false;
    document.removeEventListener('keydown', EditText.escapeKeydownHandler);
    document.removeEventListener('click', EditText.documentClickHandler);
    Object.values(EditText.button).forEach((element) => element.remove());
  },

  documentEscapeKeydownHandler(evt) {
    if (evt.key === 'Escape') {
      EditText.element.textContent = EditText.text;
      EditText.destroy();
      document.removeEventListener('keydown', EditText.escapeKeydownHandler);
    }
  },

  documentClickHandler(evt) {
    evt.preventDefault();

    if (evt.target !== EditText.element && evt.target.tagName !== 'BUTTON') {
      if (EditText.isEditted) {
        EditText.shake();
        return;
      }
      EditText.destroy();
    }
  },

  elementInputHandler(evt) {
    if (evt.target.textContent === EditText.text) {
      EditText.isEditted = false;
    } else {
      EditText.isEditted = true;
    }
  },

  shake() {
    EditText.element.scrollIntoView({ block: 'center' });
    EditText.element.classList.add('shake');
    setTimeout(() => {
      EditText.element.classList.remove('shake');
    }, 600);
  },
};

const HoverText = {
  evt: null,
  element: null,
  editBtn: null,

  init(evt) {
    HoverText.evt = evt;
    HoverText.element = evt.target;
    HoverText.editBtn = createElement(BtnTemplate.EDIT);

    HoverText.element.setAttribute('style', TextStyle.HOVER);
    HoverText.element.insertAdjacentElement('beforeend', HoverText.editBtn);

    HoverText.editBtn.addEventListener('click', HoverText.editBtnClickHandler);
    HoverText.element.addEventListener('mouseleave', HoverText.destroy);
    document.body.removeEventListener('mouseover', bodyMouseOverHandler);
  },

  destroy() {
    HoverText.evt = null;
    HoverText.element.removeAttribute('style');
    HoverText.element.removeEventListener('mouseleave', HoverText.destroy);
    HoverText.element = null;
    HoverText.editBtn.remove();
    HoverText.editBtn = null;
    document.body.addEventListener('mouseover', bodyMouseOverHandler);
  },

  editBtnClickHandler() {
    if (!EditText.isEditted) {
      EditText.init(HoverText.evt);
      return;
    }
    EditText.shake();
  },
};

function bodyMouseOverHandler(evt) {
  if (evt.target.dataset.text) {
    HoverText.init(evt);
  }
}

export const initTextEdit = () => document.body.addEventListener('mouseover', bodyMouseOverHandler);
