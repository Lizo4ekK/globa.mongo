const whatWatch = document.getElementById('what-watch');
const whatWatchList = document.getElementById('list-what-watch');

const actor = document.getElementById('actor');
const actorList = document.getElementById('list-actor');

const newb = document.getElementById('new');
const newList = document.getElementById('list-new');

const storage = window.localStorage;

const send = async function(data) {
    return await fetch('/controllers/controller.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => { return response.json() });
}

whatWatch.onclick = async function() {
    await send({ event: 'whatWatch' })
    .then(res => whatWatchList.innerHTML = res);
}

actor.onchange = async function() {
    storage.setItem('actor', actor.value)

    await send({ event: 'actor', name: this.value })
    .then(res => actorList.innerHTML = res);
}

if (storage.getItem('actor')) {
    actor.value = storage.getItem('actor');
    actor.dispatchEvent(new Event('change'));
}

newb.onclick = async function() {
    await send({ event: 'new' })
    .then(res => newList.innerHTML = res);
}