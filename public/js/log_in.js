function getInput() {
    window.teamName = document.getElementById('teamName').value;
    window.password = document.getElementById('password').value;
    console.log(teamName);
    console.log(password);
}  


var subButton = document.getElementById('subButton');
subButton.addEventListener('click', teamName, password, false);