import { createElement } from './util.js';

const formEl = document.querySelector('.form-dash');
const imgChooserEl = formEl.querySelector('input[name="img"]');
const imgPreviewEl = formEl.querySelector('img');
const releaseFormEl = formEl.querySelector('select[name="release_form_id"]');
const categoryEl = formEl.querySelector('select[name="category_id"]');
const fileChooserEl = formEl.querySelector('input[name="instruction"]');
const submitEl = document.querySelector('[data-action="submit"]');

const simditor = new Simditor({
  textarea: formEl.querySelector('textarea[name="content"]'),
  toolbar: [
    'title',
    'bold',
    'italic',
    'underline',
    'strikethrough',
    'fontScale',
    'color',
    'ol',
    'ul',
    'blockquote',
    'table',
    'link',
    'hr',
    'indent',
    'outdent',
    'alignment',
  ]
});

const pristine = window.Pristine(formEl, {
  classTo: 'form-dash__element',
  errorClass: 'form-dash__element--invalid',
  successClass: 'form-dash__element--valid',
  errorTextParent: 'form-dash__element',
  errorTextTag: 'span',
  errorTextClass: 'form-dash__error'
}, true);

simditor.body[0].classList.add('form-dash__field', 'form-dash__field--text', 'content');

imgChooserEl.addEventListener('change', (evt) => {
  const file = evt.target.files[0];

  imgPreviewEl.src = URL.createObjectURL(file);
  imgChooserEl.nextElementSibling.value = file.name;
});

fileChooserEl.addEventListener('change', (evt) => {
  const file = evt.target.files[0];
  fileChooserEl.nextElementSibling.value = file.name;
});

if (releaseFormEl) {
  releaseFormEl.addEventListener('change', (evt) => {
    if (evt.target.value === 'add-new-release-form') {
      evt.target.replaceWith(createElement('<input class="form-dash__field" name="release_form" type="text" placeholder="Таблетки" required data-pristine-required-message="Объязательное поле" autocomplete="off">'));
    }
  });
}
if (categoryEl) {
  categoryEl.addEventListener('change', (evt) => {
    if (evt.target.value === 'add-new-category') {
      evt.target.replaceWith(createElement('<input class="form-dash__field" name="category" type="text" placeholder="Категория" required data-pristine-required-message="Объязательное поле" autocomplete="off">'));
    }
  });
}

formEl.addEventListener('submit', (evt) => evt.preventDefault());
submitEl.addEventListener('click', () => {
  const isValid = pristine.validate();
  if (isValid) {
    formEl.submit();
  }
});
