document.addEventListener("DOMContentLoaded", function () {
    const inputField = document.getElementById("chatbot-input");
    const sendButton = document.getElementById("chatbot-send");
    const chatMessages = document.getElementById("chatbot-messages");

    function appendMessage(role, text) {
        const messageDiv = document.createElement("div");
        messageDiv.classList.add("p-2", "my-1", "rounded-lg");
        messageDiv.classList.add(role === "user" ? "bg-gray-200 text-right" : "bg-blue-100 text-left");
        messageDiv.innerText = text;
        chatMessages.appendChild(messageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight; // Cuộn xuống cuối
    }

    sendButton.addEventListener("click", function () {
        const message = inputField.value.trim();
        if (message === "") return;

        appendMessage("user", message);
        inputField.value = ""; // Xóa nội dung input sau khi gửi

        fetch("chatbot.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ message })
        })
        .then(response => response.json())
        .then(data => appendMessage("bot", data.reply))
        .catch(() => appendMessage("bot", "Lỗi kết nối!"));
    });

    inputField.addEventListener("keypress", function (event) {
        if (event.key === "Enter") sendButton.click();
    });
});
