import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import * as Tone from 'tone'

const now = Tone.now()
const synth = new Tone.Synth({
    oscillator: {
        type: "fmsine4",
        modulationType: "square"
    }
}).toDestination();
const notesElement = document.getElementById("notes");
let divs = notesElement.getElementsByTagName('div');
let notes_from_ia = [];
for(var i = 0;i<divs.length;i++){
    notes_from_ia.push(divs[i].id);
}


let first = document.querySelector("#"+ notes_from_ia[0]);
first.classList.add("active");
let play = false;

document.getElementById("play-button").addEventListener("click",async () => {
    await Tone.start();
    if(play){
        Tone.Transport.stop();
        notes_from_ia.forEach(note=>{
            let ft = document.querySelector("#"+ note);
            ft.classList.remove("active");
        })
        play=false;
    }else{
        play =true;
        console.log("context started");

        const loop = new Tone.Pattern(((time, note) => {
            synth.triggerAttackRelease(note, "8n", time);
            Tone.Draw.schedule(() => {
                const noteElement = document.querySelector("#"+note);
                noteElement.classList.add("active");
                setTimeout(() => {
                    noteElement.classList.remove("active");
                }, 100);
            }, time);
        }), notes_from_ia).start(0);

        loop.interval = "4n";
        Tone.Transport.start();
    }
});