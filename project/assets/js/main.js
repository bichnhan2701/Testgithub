function handleLogin() {
  document.getElementById('handleRegister').style.display = 'none';
  document.getElementById('handleLogin').style.display = 'block';
}

function handleRegister() {
  document.getElementById('handleLogin').style.display = 'none';
  document.getElementById('handleRegister').style.display = 'block';
}

function closeHandle() {
  document.getElementById('handleLogin').style.display = 'none';
  document.getElementById('handleRegister').style.display = 'none';
}