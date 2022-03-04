const btn = document.querySelector('.btn-add'),
      burger = document.querySelector('.menu'),
      menu = document.querySelector('.hamburger'),
      menuItems = document.querySelector('.menu__items'),
      sort = document.querySelectorAll('.img-icon'),
      btnOut = document.querySelectorAll('.btn-evict'),
      modal = document.querySelector('.modal'),
      closeModal = document.querySelector('.modal-close'),
      cardTitle = document.querySelectorAll('.card-body .title'),
      count = document.querySelectorAll('.count'),
      canvas = document.querySelector('#statistic');

burger.addEventListener('click',()=>{
    burger.classList.toggle('active-one');
    if(burger.classList.contains('active-one')){
        menuItems.style.display="flex";
    } else {
        menuItems.style.display="none";
    }
})
      
      
      
let numbers = document.querySelectorAll('.number');

numbers.forEach(number=>{
    count.forEach(i=>{
        if(number.textContent == i.parentElement.parentElement.querySelector('.title').textContent.split('Room #')[1]){
            const num = i.textContent.split("Осталось: ")[1];
            i.textContent = `Осталось: ${+(num-1)}`;
            if(i.textContent.split('Осталось: ')[1]==0){
                i.parentElement.querySelector('.available').classList.add('notavailable');
                i.parentElement.querySelector('.available').classList.remove('available');
            }
        }
    })
})

if(btn){
    btn.addEventListener('click',(e)=>{
        e.preventDefault()
        modal.classList.remove('hidden');
    
        if(modal.querySelectorAll('.notavailable')){
            modal.querySelectorAll('.notavailable').forEach(card=>{
                card.parentElement.parentElement.parentElement.style.display="none";
            })
        }
    })  
}
  

btnOut.forEach(button => {
    button.addEventListener('click',(e)=>{
        const target = e.target.parentElement.parentElement.children,
              fio = target[1].textContent,
              pasport = target[2].textContent,
              date = target[3].textContent,
              out = target[4].textContent,
              number = target[5].textContent

        let date1 = new Date(date);
        let date2 = new Date(out);
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

sort.forEach((item,i)=>{
    item.addEventListener('click',(e)=>{
        e.preventDefault();
        console.log(e)
    })
})
if(modal){
    modal.querySelectorAll('.btn-in').forEach(btn=>{
        btn.addEventListener('click',(e)=>{
            const number = e.target.parentElement.querySelector('.title').textContent.split('Room').join('').split(' #').join('')
            modal.querySelector('#number').value=number
        })
    })
}