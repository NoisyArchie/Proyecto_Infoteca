document.getElementById('yesButton').addEventListener('click', async function() {
    await handleReservation('si');
});

document.getElementById('noButton').addEventListener('click', async function() {
    await handleReservation('no');
});

async function handleReservation(needLocker) {
    if (needLocker === 'no') {
        document.getElementById('result').innerText = "No se necesita un locker.";
        return;
    }

    // Si necesita un locker, enviamos la solicitud al servidor
    try {
        const response = await fetch('reserva.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ needLocker })
        });
        const data = await response.json();
        document.getElementById('result').innerText = data.message;
    } catch (error) {
        document.getElementById('result').innerText = "Error en la reserva.";
    }
}
