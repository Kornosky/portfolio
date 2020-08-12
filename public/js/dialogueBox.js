var app = document.getElementById('dialogueBox-text');

var typewriter = new Typewriter(app, {
    loop: false,
    cursor: " ",
    delay: 1
});

typewriter.typeString('Hello! Welcome to my site!')
    .pauseFor(2500)
    .deleteAll()
    .typeString('I hope you\'ll find something cool!')
    .pauseFor(2500)
    .start();