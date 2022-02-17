const btn = document.querySelectorAll('.btn'),
      modal = document.querySelector('.modal'),
      closeModal = document.querySelector('.modal-close')

btn.forEach(button => {
    button.addEventListener('click',(e)=>{
        
        const target = e.target.parentElement.parentElement.children,
              fio = target[1].textContent,
              pasport = target[2].textContent,
              date = target[3].textContent,
              number = target[4].textContent
        if(number !== '-') alert('Гость уже заселён!')
        else{
            modal.classList.remove('hidden');
        
            modal.querySelector('.fio').textContent = fio;
            modal.querySelector('.pasport').textContent = pasport;
            modal.querySelector('.date').textContent = date;
        }
    })    
});



closeModal.addEventListener('click',()=>{
    modal.classList.add('hidden')
})