const btn = document.querySelector('.btn-add'),
      burger = document.querySelector('.menu'),
      search = document.querySelectorAll('.search'),
      guests = document.querySelectorAll('tbody tr'),
      addNumber = document.querySelector('.add-number'),
      menu = document.querySelector('.hamburger'),
      menuItems = document.querySelector('.menu__items'),
      sort = document.querySelectorAll('.img-icon'),
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

search.forEach(item=>{
    console.log(guests)
    item.addEventListener('input',(e)=>{
        filter = e.target.value.toUpperCase()
        for(let i = 0; i<guests.length;i++){
            let a = guests[i];
            console.log(a.innerHTML.toUpperCase());
            if(a.innerHTML.toUpperCase().indexOf(filter)>-1){
                guests[i].style.display=''
            } else {
                guests[i].style.display="none"
            }
        }
    })
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

if(addNumber){
    addNumber.addEventListener('click',()=>{
        modal.classList.remove('hidden')
    })
}

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