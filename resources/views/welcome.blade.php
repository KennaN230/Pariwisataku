<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Pariwisataku</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Roboto Condensed', sans-serif;
    }
    .zoom:hover {
      transform: scale(1.05);
      transition: transform 0.3s;
      box-shadow: 0 6px 12px rgba(0,0,0,0.2);
    }

    /* Styling for chatbot window */
   /* Styling for chatbot window */
#chatbot {
  position: fixed;
  bottom: 20px;
  right: 20px;
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  width: 300px;
  max-height: 0;
  opacity: 0;
  visibility: hidden;
  display: flex;
  flex-direction: column;
  overflow: hidden;
  z-index: 100;
  transition: max-height 0.5s ease, opacity 0.5s ease, visibility 0s linear 0.5s;
}

#chatbot.open {
  max-height: 400px; /* Ukuran chatbot saat terbuka */
  opacity: 1;
  visibility: visible;
  transition: max-height 0.5s ease, opacity 0.5s ease;
}

#chatbotHeader {
  background-color: #4caf50;
  color: white;
  padding: 10px;
  font-weight: bold;
  cursor: pointer;
}

#chatbox {
  padding: 10px;
  height: 200px;
  overflow-y: auto;
  background-color: #f9f9f9;
}

#chatInput {
  border: 1px solid #ccc;
  padding: 10px;
  border-radius: 4px;
  width: 100%;
  margin-top: 10px;
}

  </style>
</head>

<body class="bg-gradient-to-b from-blue-100 to-white min-h-screen">
  <!-- Navbar -->
  <nav class="bg-blue-200 px-6 py-4 flex justify-between items-center shadow-md">
    <h1 class="text-xl font-bold">Pariwisataku</h1>
    <ul class="flex space-x-4 text-sm font-semibold">
      <li><a href="#" class="hover:text-blue-700">Home</a></li>
      <li><a href="#destinasi" class="hover:text-blue-700">Wisata Alam</a></li>
      <li><a href="#" class="hover:text-blue-700">Wisata Kuliner</a></li>
      <li><a href="#" class="hover:text-blue-700">Budaya</a></li>
      <li><a href="#" class="hover:text-blue-700">Kuliner</a></li>
    </ul>
    <a href="/login" class="bg-blue-600 text-white px-4 py-1 rounded-lg hover:bg-blue-700">Login</a>
  </nav>

  <!-- Hero Section -->
  <section class="text-center py-10 bg-cover bg-center relative" style="background-image: url('/foto/laut2.jpg');">
    <div class="absolute inset-0 bg-black opacity-30"></div>
    <div class="relative z-10">
      <h2 class="text-lg italic text-white">“Eksplorasi Jember, Jelajahi Keindahan Tanpa Batas!”</h2>
      <h1 class="text-2xl sm:text-3xl font-bold text-white mt-2">Cari Destinasi Wisata Jember Dengan Mudah & Cepat dengan AI</h1>
      <div class="mt-6 flex justify-center relative">
        <input type="text" placeholder="Cari destinasi..." class="w-2/3 sm:w-1/2 p-3 rounded-full shadow-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 pl-10" />
        <img src="https://cdn-icons-png.flaticon.com/512/622/622669.png" class="w-5 h-5 absolute left-12 top-1/2 transform -translate-y-1/2 opacity-50" alt="search icon" />
      </div>
    </div>
  </section>

  <!-- Bagian HTML Card -->
  <section id="destinasi" class="px-6 py-10 bg-gradient-to-b from-white to-blue-100">
    <h2 class="text-center text-xl font-bold text-gray-800 mb-6">Destinasi Unggulan</h2>
    <div id="cardContainer" class="flex justify-center space-x-4 overflow-x-auto pb-4">
      <!-- Card akan ditambahkan di sini melalui JavaScript -->
    </div>
  </section>


  <!-- Modal Detail Destinasi -->
  <div id="detailModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white p-6 rounded-xl shadow-lg max-w-md text-center">
      <h2 id="modalTitle" class="text-xl font-bold mb-2"></h2>
      <p id="modalDescription" class="text-gray-700 mb-4"></p>
      <button onclick="closeModal()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tutup</button>
    </div>
  </div>

  <!-- Floating Chatbot and Contact -->
  <div class="fixed bottom-6 right-6 flex flex-col space-y-3 z-50">
  <button onclick="toggleChatbot()" class="bg-blue-500 text-white px-4 py-2 rounded-full shadow-lg hover:bg-blue-600 transition-transform hover:scale-105">
  Chatbot
</button>
  </div>

  <!-- Chatbot -->
<div id="chatbot" class="flex flex-col transform transition-all duration-500 ease-in-out opacity-0 translate-y-10">
  <div id="chatbotHeader" onclick="toggleChatbot()" class="bg-blue-500 text-white p-4 cursor-pointer">
    Chatbot - Klik untuk Menutup
  </div>
  <div id="chatbox" class="bg-white p-4 rounded-b-xl shadow-lg">
    <div id="chatContainer" class="space-y-2">
      <p><strong>Chatbot:</strong> Halo! Ada yang bisa saya bantu tentang destinasi wisata Jember?</p>
    </div>
    <form onsubmit="sendToChatGPT(); return false;" class="flex space-x-2 mt-2">
      <input type="text" id="chatInput" placeholder="Ketik pesan..." class="flex-1 border rounded p-2 focus:outline-none" onkeyup="sendMessage(event)" />
      <button type="submit" class="bg-blue-500 text-white px-4 rounded hover:bg-blue-600">Kirim</button>
    </form>
  </div>
</div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-blue-200 py-6 mt-10 text-center text-sm text-gray-700">
    <p>&copy; 2025 Pariwisataku. All rights reserved.</p>
  </footer>

  <script>
function toggleChatbot() {
  const chatbot = document.getElementById('chatbot');

  // Toggle the open class to trigger the transition
  if (chatbot.classList.contains('open')) {
    chatbot.classList.remove('open');
  } else {
    chatbot.classList.add('open');
  }
}


function appendMessage(sender, message) {
  const chatContainer = document.getElementById('chatContainer');
  
  const messageElement = document.createElement('div');
  messageElement.classList.add('message');

  if (sender === 'Anda') {
    messageElement.classList.add('user-message', 'text-right', 'text-green-700');
  } else {
    messageElement.classList.add('gpt-message', 'text-left', 'text-blue-700');
  }

  messageElement.innerHTML = `<strong>${sender}:</strong> ${message}`;
  chatContainer.appendChild(messageElement);

  chatContainer.scrollTop = chatContainer.scrollHeight;
}

async function sendToChatGPT() {
  const input = document.getElementById('chatInput');
  const message = input.value.trim();
  if (!message) return;

  appendMessage('Anda', message);
  input.value = '';

  const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  try {
    const response = await fetch('/chatbot', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': token,
      },
      body: JSON.stringify({ message })
    });

    const data = await response.json();
    if (response.ok) {
      appendMessage('GPT', data.reply);
    } else {
      appendMessage('GPT', 'Maaf, terjadi kesalahan.');
    }
  } catch (error) {
    appendMessage('GPT', 'Maaf, terjadi kesalahan saat menghubungi AI.');
  }
}

function sendMessage(event) {
  if (event.key === 'Enter') {
    event.preventDefault(); // <--- penting cegah reload
    sendToChatGPT();
  }
}


// Ambil data destinasi
fetch('/destinasi')
.then(response => response.json())
.then(data => {
  const container = document.getElementById('cardContainer');
  container.innerHTML = '';

  data.forEach(item => {
    const card = document.createElement('div');
    card.className = "bg-white rounded-xl overflow-hidden shadow-lg zoom min-w-[140px] cursor-pointer";
    card.onclick = () => showDetail(item.nama, item.deskripsi);
    card.innerHTML = `
      <img src="${item.gambar_url}" alt="${item.nama}" class="w-full h-24 object-cover">
      <h3 class="p-2">${item.nama}</h3>
    `;
    container.appendChild(card);
  });
})
.catch(error => {
  console.error("Error fetching data:", error);
  const container = document.getElementById('cardContainer');
  container.innerHTML = '<p class="text-center text-red-500">Gagal memuat destinasi. Silakan coba lagi nanti.</p>';
});

// Modal
function showDetail(title, description) {
  document.getElementById('modalTitle').textContent = title;
  document.getElementById('modalDescription').textContent = description;
  document.getElementById('detailModal').classList.remove('hidden');
}

function closeModal() {
  document.getElementById('detailModal').classList.add('hidden');
}
</script>
</body>

</html>
