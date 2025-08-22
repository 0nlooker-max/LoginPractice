// Function to get URL parameters
function getQueryParam(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}

// Get the value of the 'log' parameter
const showSignUp = getQueryParam('log') === 'true';

// Select elements  
const signInBtn = document.getElementById("signIn");
const signUpBtn = document.getElementById("signUp");
const container = document.querySelector(".container");

// Set the initial state based on the URL parameter
if (showSignUp) {
    container.classList.remove("right-panel-active");
} else {
    container.classList.add("right-panel-active");
}

// Event listeners for buttons
signInBtn.addEventListener("click", () => {
    container.classList.remove("right-panel-active");
});

signUpBtn.addEventListener("click", () => {
    container.classList.add("right-panel-active");
});