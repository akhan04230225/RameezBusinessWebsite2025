(function(){
  const container = document.getElementById('rjb-chatbot');
  if(!container) return;

  container.innerHTML = `
    <div class="rjb-chat-window">
      <div class="rjb-chat-messages"></div>
      <input type="text" class="rjb-chat-input" placeholder="Ask a question..." />
    </div>`;

  const messagesEl = container.querySelector('.rjb-chat-messages');
  const inputEl = container.querySelector('.rjb-chat-input');

  async function sendMessage(message){
    appendMessage('user', message);
    inputEl.value='';

    if(!rjbChatbot.apiKey){
      appendMessage('bot', 'API key missing.');
      return;
    }

    const res = await fetch('https://api.openai.com/v1/chat/completions', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Authorization': 'Bearer ' + rjbChatbot.apiKey
      },
      body: JSON.stringify({
        model: 'gpt-3.5-turbo',
        messages: [{role: 'system', content: 'You are a helpful assistant for R & J Brothers Services LLC.'},{role:'user', content: message}]
      })
    });
    const data = await res.json();
    const reply = data.choices && data.choices[0] ? data.choices[0].message.content : 'Sorry, an error occurred.';
    appendMessage('bot', reply);
  }

  function appendMessage(sender, text){
    const p=document.createElement('p');
    p.className=sender;
    p.textContent=text;
    messagesEl.appendChild(p);
    messagesEl.scrollTop=messagesEl.scrollHeight;
  }

  inputEl.addEventListener('keydown', function(e){
    if(e.key==='Enter' && this.value.trim()){
      sendMessage(this.value.trim());
    }
  });
})();
