import { data } from 'autoprefixer';
import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
// const Web3 = require("web3");
// import Web3 from 'web3';

function Example() {
    const [counter, setCounter] = useState(0);

    // let web3 = new Web3(Web3.givenProvider);
    // web3.eth.getAccounts().then(console.log);

    const [apiResponse, setApiResponse] = useState("Loading the data...");
    const [posts, setPosts] = useState("Loading the post data...");

                              
    // const getResponse = async () =>{
    //     const data = await fetch("https://arjs-cors-proxy.herokuapp.com/https://dog-facts-api.herokuapp.com/api/v1/resources/dogs?number=4")
    //     .then(data => data.json())
    //     .then(data => {
    //         const response = data.map((dogs)=>{
    //             return <p>{dogs.fact}</p>;
    //         })
    //         setApiResponse(response);
    //     })
    // }

    const getPosts = async () =>{
        const data = await fetch('http://localhost:8000/api/user/1/last_post', { 
            method: 'get', 
            // headers: {
            //     'Authorization': '291|1MfbPHYQrQtIO0uJEN6mwCXvKXB8ooiNVTh73qdk', 
            // } 
        })
        .then(data => data.json())

        .then(data => console.log(data))

        // .then(data => {
        //     // const postResponse = data.map((posts)=>{
        //     //     return <p>{posts}</p>;
        //     // })
        //     // setPosts(postResponse);
        //     console.log(data);
        // })
    }

    useEffect(()=>{
        // getResponse();
        getPosts();
    },[])

    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">Example Component</div>

                        <div className="card-body">

                            <button onClick={()=> setCounter(counter + 1)}>Click me</button>
                            <p>{counter}</p>        
                            {/* {apiResponse}        */}
                            {posts}

                        </div>

                    </div>
                </div>
            </div>
        </div>
    );
}

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
