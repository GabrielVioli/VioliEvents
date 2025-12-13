//public/scripts/script.js

document.getElementById('form-evento').addEventListener('submit', function(event) {
    event.preventDefault();

    let camposObrigatorios = ['title', 'date', 'city', 'description', 'image'];
    let temErro = false;

    camposObrigatorios.forEach(function(id) {
        let campo = document.getElementById(id);

        campo.classList.remove('is-invalid');

        if (!campo.value) {
            temErro = true;
            campo.classList.add('is-invalid');
        }
    });

    if (temErro) {
        alert('Por favor, preencha todos os campos obrigatórios!');
    } else {
        this.submit();
    }
});

let inputs = document.querySelectorAll('.form-control');
inputs.forEach(input => {
    input.addEventListener('input', function() {
        if(this.value) {
            this.classList.remove('is-invalid');
        }
    });
});
