
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Upload your Document</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header><h1 class="logo">AssignmentKaro.com</h1></header>
    <h1 class ="upl">Upload your assignment <span class="auto-type"></span></h1>
    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
    <script>
        var typed =new Typed(".auto-type",{
          strings: ["instructions ","and material here!"],
          typeSpeed:50,
          backSpeed:50,
          loop: true
        })
        </script>
        <div class="main">
            <form action="uploadserv.php" method="POST" enctype="multipart/form-data" class="w-50">
                <div class="container">
                    <h1>Enter Instructions</h1>
                    <textarea id="instructions" name="instructions" rows="6" placeholder="Type your instructions here..."></textarea>
                </div>
                <div class="drop-container" id="drop-container">
                    <p class="drop-text">Drag & Drop your file here</p>
                    <input type="file" name="file" id="file" class="file-input" accept=".jpg, .jpeg, .png" />
                </div>
                <div class="file-details" id="file-details"></div>
                <div class="cont"><button  type="submit" name="btn" class="btn btn1">UPLOAD</button>
                </div>
        </div>
        <script src="chatbox.js"></script>
        <script>
            const dropContainer = document.getElementById('drop-container');
const fileInput = document.getElementById('file');
const fileDetails = document.getElementById('file-details');

dropContainer.addEventListener('dragover', (e) => {
    e.preventDefault();
    dropContainer.classList.add('drag-over');
});

dropContainer.addEventListener('dragleave', () => {
    dropContainer.classList.remove('drag-over');
});

dropContainer.addEventListener('drop', (e) => {
    e.preventDefault();
    dropContainer.classList.remove('drag-over');

    const file = e.dataTransfer.files[0];

    if (file) {
        displayFileInfo(file);
    }
});
dropContainer.addEventListener('click', () => {
    fileInput.click();
});

fileInput.addEventListener('change', () => {
    const file = fileInput.files[0];

    if (file) {
        displayFileInfo(file);
    }
});

function displayFileInfo(file) {
    fileDetails.textContent = `File Name: ${file.name}, Size: ${formatBytes(file.size)}`;
}

function formatBytes(bytes) {
    const kb = bytes / 1024;
    if (kb < 1024) {
        return kb.toFixed(2) + ' KB';
    } else {
        return (kb / 1024).toFixed(2) + ' MB';
    }
}
</script>
<script>
    function sendMessage() {
    const instructions = document.getElementById('instructions').value;
    const documentFile = document.getElementById('file').files[0];
    const formData = new FormData();

    formData.append('instructions', instructions);
    formData.append('file', documentFile);

    fetch('uploadserv.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        document.getElementById('instructions').value = '';
        document.getElementById('file').value = '';
        fetchMessages();
    })
    .catch(error => console.error('Error:', error));
}

function fetchMessages() {
    fetch('get_messages.php')
    .then(response => response.text())
    .then(data => {
        document.getElementById('messageList').innerHTML = data;
    })
    .catch(error => console.error('Error:', error));
}

window.onload = function() {
    fetchMessages();
}
</script>
</form>


        
</body>
</html>
 