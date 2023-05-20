// Declare HTML elements as JS variables
var chat_messages = document.getElementById("messages");
var chat_modal = document.getElementById("chat_modal");
var chat_btn = document.getElementById("chat_btn");
var send_btn = document.getElementById("send_btn");
var chat_box = document.getElementById("message_input");
var close_btn = document.getElementById("close_btn");

// Initial rendering of chat messages
getMessages();

// Show dialog element as a modal when chat link is clicked
chat_btn.addEventListener("click", () => {
    chat_modal.showModal();
});

send_btn.addEventListener("click", () => {
    let new_message = chat_box.value;
    var recipient = chat_box.dataset.recipient;

    if (new_message.trim() !== "" && recipient) {
        var formData = new FormData();
        formData.append("message", newMessage);
        formData.append("recipient", recipient);

        fetch("insert_chat_data.php", {
            method: "POST",
            body: formData,
        })
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                // Successfully inserted the message, update chat messages
                getMessages();
            })
            .catch((error) => {
                console.log("Error sending chat message:", error);
            });

        messageInput.value = "";
        messageInput.dataset.recipient = ""; // Clear the recipient after sending the message
    }
});

// Close dialog element when close button is clicked
close_btn.addEventListener("click", () => {
    chat_modal.close();
});

// Retrieves messages from the PHP server
async function getMessages() {
    fetch("read_chat_data.php")
        .then((res) => {
            return res.json();
        })
        .then((messages) => {
            renderMessages(messages);
        })
        .catch((error) => {
            console.log(`Error found: ${error}`);
        });
}

// Renders messages into the chat view
function renderMessages(messages) {
    chat_messages.innerHTML = "";
    for (let message1 of messages) {
        var { sender, message, timestamp } = message1;
        var messageHTML = generateMessageHTML(sender, message, timestamp);
        chat_messages.appendChild(messageHTML);
    }
}

function generateMessageHTML(sender, message, timestamp) {
    var userLabel = sender === "1" ? "Admin" : `Customer #${sender}`;
    var messageElement = document.createElement("div");
    messageElement.classList.add("message");
    messageElement.innerHTML = `
    <div><strong>${userLabel}</strong></div>
    <div>${message}</div>
    <div>${timestamp}</div>
    <button class="reply-button" data-recipient="${sender}">Reply</button>
    `;
    return messageElement;
}
