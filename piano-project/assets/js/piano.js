let canvas = document.getElementById('canvas')

function draw() 
{
    let notes = ['$do', '$re', '$mi', '$fa', '$sol', '$la', '$si']
    let x = 10
    let y = 10
    let width = 60
    let height = 450

    for (var i = 0; i < 3; i++) {
        notes.forEach(function(note) {
        note = canvas.getContext("2d");
        note.strokeStyle = "black";
        note.fillStyle = 'white';
        note.lineWidth = 3;
        note.fillRect(x, y, width, height);
        note.strokeRect(x, y, width, height);
        x += 60  
    })
    }
    

    x = 50
    width = 40
    height = 320
    let notesD = ['$doD', '$reD', 'faD', 'solD', 'laD']

    for (var i = 0; i < 3; i++) {
        notesD.forEach(function(note) {
        let compteur = 0
        note = canvas.getContext("2d");
        note.strokeStyle = "white";
        note.fillStyle = 'black';
        note.lineWidth = 3;
        note.fillRect(x, y, width, height)
        if (x == 110 || x == 350 || x == 530 || x == 770 || x == 950) {
            x += 120
        } else {
            x += 60
        }
        compteur ++ 
    });
    }   
     
}