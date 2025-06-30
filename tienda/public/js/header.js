document.addEventListener('DOMContentLoaded', () => {
  const sel = document.getElementById('navSelect');
  sel.addEventListener('change', e => {
    const url = e.target.value;
    if (url) window.location.href = url;   // <-- redirige
  });
});

document.addEventListener('DOMContentLoaded', () => {
  const sel = document.getElementById('navSelect1');
  sel.addEventListener('change', e => {
    const url = e.target.value;
    if (url) window.location.href = url;   // <-- redirige
  });
});