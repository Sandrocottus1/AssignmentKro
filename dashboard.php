<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style1.css">
</head>
<body>
    <header>
        <h2 class="logo"><a href="login page.php">AssignmentKaro.com</a></h2>
        <nav class="navigation">
            <a href="#">HOME</a>
            <a href="#">SERVICES</a>
            <a href="#">CONTACT</a>
            <button class="btnLogin-popup">Your profile</button>
            
        </nav>
    </header>    
    <div id="notification">
        <button id="fetchMatchedUserData">Matched Status</button>
        <div id="matchedUserData"></div>
    </div>
    <button id='chatButton'>Start Chatting</button>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
    const fetchMatchedUserDataButton = document.getElementById('fetchMatchedUserData');
    const matchedUserDataDiv = document.getElementById('matchedUserData');
    fetchMatchedUserDataButton.addEventListener('click', function() {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'dashboserv1.php', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                const response = xhr.responseText;
                matchedUserDataDiv.innerHTML = response;
            } else {
                matchedUserDataDiv.innerHTML = 'Error fetching matched user data.';
            }
        };
        xhr.send();
    });
});
      </script>
        <div class="loader">
        <h3> What is your interest for <span class="auto-type"></span></h3>
        </div>
        <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
        <script>
          var typed =new Typed(".auto-type",{
            strings: ["today?","tomorrow?","everyday?"],
            typeSpeed:50,
            backSpeed:50,
            loop: true
          })
          </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.2.0/socket.io.js"></script>
    <script src="dashboard.js"></script>
    <form id="hero1">
    <div class="hero" id="hero">
      <div class="container">
       <div class="row"><p>Get your assignment done!</p>
        <label><input type="radio" id="checkbox1" name="option" value="1">
        <span></span>
        </label> 
       </div> 
       <div class="row"><p>Do assignment</p>
        <label><input type="radio" id="checkbox2" name="option" value="2">
        <span></span>
      </label> 
       </div> 
       <div class="conti">
       <button type="submit" class="btn2 btn3" name="submit" id="submit">Submit</button>
       </div>
      </div>
    </div>
    </form>
    
<script>
  document.getElementById('submit').addEventListener('click', function () {
    const selectedOption = [];
    const checkboxes = document.querySelectorAll('input[type="radio"]:checked');
    checkboxes.forEach(radio=> {
      selectedOption.push(radio.value);
    });
    if(selectedOption.length===0) {
      alert('Please select any one option.');
      return;
    }
    fetch('dashboserv.php', {
        method: 'POST',
        body: JSON.stringify(selectedOption),
        headers: {
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href=data.redirect
        } else {
            alert('Error saving preferences. Please try again.');
        }
    })
    .catch(error => {
        console.error(error);
    });
});

</script>
<script>
        document.addEventListener('DOMContentLoaded', function() {
    const chatButton = document.getElementById("chatButton");
    chatButton.addEventListener('click', function() {
        window.location.href = 'chat.php'; 
    });
});
      </script>
</body>
</html>



