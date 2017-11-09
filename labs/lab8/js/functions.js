// Lab 8

/*  NOTES:
            
    Math.random() >>>> floating point number 0-1 NOT including 1
    Math.floor() >>>> rounds down any floating point >> e.g. Math.floor(23.99) = 23
    
    querySelector() >>>> returns first matching element within document
    
    Number() >>>> ensures only number entered
    
    "Events" are actions that occur within broswer. "Event listener" waits for event; "event handler" code that runs when event occurs
    
    focus() >>>> automatically puts text cursor in text field when page loads
*/

var randNum = Math.floor(Math.random() * 99) + 1;
// console.log(randNum);
// document.getElementById("numToGuess").innerHTML = randNum;

// JavaScript var:
// var gCount = document.querySelector('#gameCount');
// var gWon = document.querySelector('#wonGames');
// var gLost = document.querySelector('#lostGames');
// var error = document.querySelector('#error');
// var guesses = document.querySelector('#guesses');
// var lastResult = document.querySelector('#lastResult');
// var lowOrHi = document.querySelector('#lowOrHi');
var guessSubmit = document.querySelector('.guessSubmit');
var guessField = document.querySelector('.guessField');

// var resetButton = document.querySelector('#reset');

// jQuery var:
var gCount = $('#gameCount');
var gWon = $('#wonGames');
var gLost = $('#lostGames');
var error = $('#error');
var guesses = $('#guesses');
var lastResult = $('#lastResult');
var lowOrHi = $('#lowOrHi');
var resetButton = $('#reset');

var guessCount = 1;
guessField.focus();
resetButton.style.display = 'none';

function checkGuess() {
    // alert('Placeholder');

    var userGuess = Number(guessField.value);
    console.log(userGuess);

    if (isNaN(userGuess) || userGuess <= 0 || userGuess > 99) { // 
        error.innerHTML = 'Only accepts numbers 1 to 99';
    }
    else {
        error.innerHTML = '';

        if (guessCount === 1) {
            guesses.innerHTML = 'Previous guesses: ';
        }

        guesses.innerHTML += userGuess + ' ';

        if (userGuess === randNum) {
            gWon.innerHTML += 1;
            
            lastResult.innerHTML = 'Congratulations! You got it right!';
            lastResult.style.backgroundColor = 'green';
            lowOrHi.innerHTML = '';
            setGameOver();
        }
        else if (guessCount === 7) {
            gLost.innerHTML++;
            
            lastResult.innerHTML = 'Sorry, you lost!';
            setGameOver();
        }
        else {
            lastResult.innerHTML = "Wrong!";
            lastResult.style.backgroundColor = 'red';

            if (userGuess < randNum) {
                lowOrHi.innerHTML = 'Last guess was too low!';
            }
            else if (userGuess > randNum) {
                lowOrHi.innerHTML = 'Last guess was too high!';
            }
        }

        guessCount++;
        guessField.value = '';
        guessField.focus();

    }

}

guessSubmit.addEventListener('click', checkGuess);

function setGameOver() {
    guessField.disabled = true;
    guessSubmit.disabled = true;
    resetButton.style.display = 'inline';
    resetButton.addEventListener('click', resetGame);
    
    gCount.style.display = 'inline';
}

function resetGame() {
    guessCount = 1;

    var resetParameters = document.querySelectorAll('.resultPara p');

    for (var i = 0; i < resetParameters.length; i++) {
        resetParameters[i].textContent = '';
    }

    resetButton.style.display = 'none';

    guessField.disabled = false;
    guessSubmit.disabled = false;
    guessField.value = '';
    guessField.focus();

    lastResult.style.backgroundColor = 'white';

    randNum = Math.floor(Math.random() * 99) + 1;
}
