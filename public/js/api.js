const headers = {
  'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
};

const toggleDashNav = () =>
  fetch(`/dashboard/state`)
    .catch((err) => console.error(err));

const updateText = (body, onSuccess, onFail) =>
  fetch('/dashboard/update-text', {
    headers,
    method: 'post',
    body: JSON.stringify(body),
  })
    .then((response) => response.json())
    .then((response) => onSuccess(response))
    .catch((err) => onFail(err));

export { toggleDashNav, updateText };
