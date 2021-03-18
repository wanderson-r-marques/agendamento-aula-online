document.querySelectorAll('[wm-agendar]').forEach(e => {
    e.addEventListener('click', (event) => {
        const idAluno = e.getAttribute('wm-idAluno')
        const idAgenda = e.getAttribute('wm-idAgenda')
        const descricao = e.parentNode.parentNode.childNodes[1].textContent
        setTimeout(() => {
            if (confirm(`Deseja agendar para ${descricao} ?`)) {
                fetch("requests/agendar.php", {
                    method: "POST",
                    headers: {'Content-Type':'application/x-www-form-urlencoded'},
                    body: `idAluno=${idAluno}&idAgenda=${idAgenda}`
                })
                .then(res => res.json())
                .then(data => {                   
                    if(data == 'true')
                        window.location.reload()
                    else
                        e.checked=false
                })
            }else{
                e.checked=false
            }
        }, 100)


    })
})

