//note
const C4 = new Audio("../sounds/C4.mp3");
const Db4 = new Audio("../sounds/Db4.mp3");
const D4 = new Audio("../sounds/D4.mp3");
const Eb4 = new Audio("../sounds/Eb4.mp3");
const E4 = new Audio("../sounds/E4.mp3");
const F4 = new Audio("../sounds/F4.mp3");
const Gb4 = new Audio("../sounds/Gb4.mp3");
const G4 = new Audio("../sounds/G4.mp3");
const Ab4 = new Audio("../sounds/Ab4.mp3");
const A4 = new Audio("../sounds/A4.mp3");
const Bb4 = new Audio("../sounds/Bb4.mp3");
const B4 = new Audio("../sounds/B4.mp3");
const C5 = new Audio("../sounds/C5.mp3");
const Db5 = new Audio("../sounds/Db5.mp3");
const D5 = new Audio("../sounds/D5.mp3");
const Eb5 = new Audio("../sounds/Eb5.mp3");
const E5 = new Audio("../sounds/E5.mp3");


function getNote(note) {
    if(note == "Do") {
        return  C4;
    }if(note == "Do#") {
        return  Db4;
    }if(note == "Re") {
        return  D4;
    }if(note == "Re#") {
        return  Eb4;
    }if(note == "Mi") {
        return  E4;
    }if(note == "Fa") {
        return  F4;
    }if(note == "Fa#") {
        return  Gb4;
    }if(note == "Sol") {
        return  G4;
    }if(note == "Sol#") {
        return  Ab4;
    }if(note == "La") {
        return  A4;
    }if(note == "La#") {
        return  Bb4;
    }if(note == "Si") {
        return  B4;
    }
}

function note() 
{
    // Notes Blanche
    let margin = 40;        
    for (var i = 0 ; i < 3; i++) {
        let notes = ['Do', 'Re', 'Mi', 'Fa', 'Sol', 'La', 'Si']
        let piano = document.getElementById('piano')
        notes.forEach(function(note) {
            let myNote = "div" + note;
            myNote = document.createElement('div');
            myNote.style.height = "450px";
            myNote.style.width = "60px";
            myNote.style.border = "solid";
            myNote.style.backgroundColor = "white"; 
            myNote.addEventListener("click", function() {
                let p = document.createElement('p');
                p.innerHTML = note;
                p.style.paddingTop = "400px";
                p.style.marginLeft = "17px";
                p.style.fontSize = "25px"
                p.style.fontWeight = 'bold';
                note = getNote(note)
                note.play();
                myNote.appendChild(p)
            });   
            piano.appendChild(myNote)
            console.log(myNote)
        })

        // Notes noire
        let notesNoire = ['Do#', 'Re#', 'Fa#' , 'Sol#', 'La#']

        notesNoire.forEach(function(note) {
            let myNote = "div" + note;
            myNote = document.createElement('div');
            myNote.style.height = "350px";
            myNote.style.width = "40px";
            myNote.style.backgroundColor = "black";
            myNote.addEventListener("click", function() {
                let p = document.createElement('p');
                p.innerHTML = note;
                p.style.paddingTop = "300px";
                p.style.marginLeft = "7px";
                p.style.color = "grey";
                p.style.fontSize = "25px"
                p.style.fontWeight = 'bold';
                note = getNote(note)
                note.play();
                myNote.appendChild(p)
            }); 
            myNote.style.position = "absolute";
            myNote.style.marginLeft = margin + "px";
            piano.appendChild(myNote)

            if(margin == 100 || margin == 340 || margin == 520 || margin == 760 || margin == 940) {
                margin += 120
            }else {
                margin += 60;
            }
        });
    }
}   

