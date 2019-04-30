window.onload = function()
{
    //ref to form
    const signup_form = document.querySelector('#signup_form');

    //if login exists
    if(signup_form)
    {
        

        signup_form.addEventListener('submit',event =>{
            
            //dont submit
            event.preventDefault();

            //get data
            const user = {
                name      : document.querySelector("#username").value,
                email     : document.querySelector("#email").value,
                password1 : document.querySelector("#password").value,
                password2 : document.querySelector("#password2").value,
                supplier  : document.querySelector("#supplier_name").value
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
            //.then(data => console.log(data));
            
            .then(data => 
                {
                    if (data["message"]=="Success")
                    {
                        signup_form.submit();
                    }
                    else
                    {
                        console.log(data["message"]);
                    }
            });

        })
    }


}