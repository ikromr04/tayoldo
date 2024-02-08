const createElement = (template) => {
  const newElement = document.createElement('div');
  newElement.innerHTML = template;

  return newElement.firstElementChild;
};

const replace = (newElement, oldElement) => {
  const parent = oldElement.parentElement;
  parent.replaceChild(newElement, oldElement);
};

export { createElement, replace };
