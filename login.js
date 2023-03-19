const form = document.querySelector('form');
form.addEventListener('submit', (event) => {
  event.preventDefault(); // prevent the default form submission behavior

  // get the form data
  const formData = new FormData(event.target);

  // validate the form data (you can add your own validation rules)
  const email = formData.get('email');
  const password = formData.get('password');
  if (!email || !password) {
    alert('Please enter your email and password.');
    return;
  }

  // submit the form (you can use AJAX to send the form data to the server)
  console.log(`Email: ${email}, Password: ${password}`);
});