function toggleChat() {
    const chatWindow = document.getElementById('chat-window');
    chatWindow.style.display = (chatWindow.style.display === 'none' || chatWindow.style.display === '') ? 'block' : 'none';
  }
  
  function sendMessage() {
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;
  
    
    console.log("Email:", email);
    console.log("Message:", message);
  
    
    document.getElementById('email').value = '';
    document.getElementById('message').value = '';
  
   
  }