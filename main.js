const loginForm = document.getElementById('login-form');

loginForm.addEventListener('submit', function(event) {
  event.preventDefault();

  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;

  if (email.trim() === '' || password.trim() === '') {
    alert('Veuillez remplir tous les champs.');
    return;
  }

  alert('Connexion réussie !');
});

const contactAdminLink = document.getElementById('contact-admin');

contactAdminLink.addEventListener('click', function(event) {
  event.preventDefault();
  window.open('mailto:admin@example.com', '_blank');
});