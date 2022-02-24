const btn = document.querySelectorAll('.btn-in'),
      btnOut = document.querySelectorAll('.btn-evict'),
      modal = document.querySelector('.modal'),
      closeModal = document.querySelector('.modal-close'),
      arrowLeft = document.querySelector('.arrow-left'),
      arrowRight = document.querySelector('.arrow-right')


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

btnOut.forEach(button => {
    button.addEventListener('click',(e)=>{
        const target = e.target.parentElement.parentElement.children,
              fio = target[1].textContent,
              pasport = target[2].textContent,
              date = target[3].textContent,
              out = target[4].textContent,
              number = target[5].textContent

        let date1 = new Date(date.split('.').reverse());
        let date2 = new Date(out.split('.').reverse());
        let daysLag = Math.ceil(Math.abs(date2.getTime() - date1.getTime()) / (1000 * 3600 * 24));
        
        if(number === '-') alert('Гость ещё не заселён!')
        else{
            modal.classList.remove('hidden');
            console.log(daysLag);
            modal.querySelector('.fio').textContent = fio;
            modal.querySelector('.pasport').textContent = pasport;
            modal.querySelector('.date').textContent = date;
            modal.querySelector('.out').textContent = out;
            modal.querySelector('.number').textContent = number;
            modal.querySelector('.out-date').textContent ='До отъезда: '+ daysLag + ' дней';
            modal.querySelector('.out-price').textContent='Стоимость услуг ' + '2000rub';
        }
    })    
});

if(closeModal){
    closeModal.addEventListener('click',()=>{
        modal.classList.add('hidden')
    })
}