window.onload = function()
{
    //ref to form
    const shopping_cart = document.querySelector('#shopping_cart');

    //if login exists
    if(shopping_cart)
    {
        

        shopping_cart.addEventListener('submit',event =>{
            
            //dont submit
            event.preventDefault();

            //get data
            const user = {
                name      : document.querySelector("#coffeename").value,
                price     : document.querySelector("#price").value,
                quantity  : document.querySelector("#quantity").value
            };

            ///fetch post call
            const fetchConfig = {
                method : 'POST',
                credentials : 'include',
                body : JSON.stringify(user),
                headers : {'Content-type' : 'application/json; charset=UTF-8'}
            };

            //Post data to api/users(POST route)
            fetch('api/Users', fetchConfig)
            .then(res => res.json())
            .then(data => console.log(data));
            

        })
    }


}