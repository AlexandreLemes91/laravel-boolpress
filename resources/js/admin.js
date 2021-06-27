require('./bootstrap');

/* post confirm */
const delForm = document.querySelectorAll('.delete'); // <-- selezione di tutti i nodi con classe 'delete'
console.log(delForm);

delForm.forEach( btn =>{
    btn.addEventListener('submit', function(e){
        const resp = confirm('are u sure?');
        console.log(resp);
        console.log(e);
        
        if( !resp ){
            e.preventDefault();
        }
    })
})