window.onload = function()
{
    //ref to form
    const loginForm = document.querySelector('#signup_form');

    //if login exists
    if(loginForm)
    {

        loginForm.addEventListener('input', event => {
            console.log(event.target.value);
        });

        loginForm.addEventListener('submit',event =>{


            console.log("Hello");
            //dont submit
            event.preventDefault();

            //get data
            const user = {
                email : document.querySelector("#email").value,
                password : document.querySelector("#password").value

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
                        console.log("Overall Success");
                    }
                    else if (data["message"]=="Fail")
                    {
                        console.log("Overall failure");
                    }
                    else
                    {
                        console.log("Overall failure");
                    }
            });

        })
    }


}