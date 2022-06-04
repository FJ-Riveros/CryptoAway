import { data } from 'autoprefixer';
import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';

function GetFriends() {
    const [counter, setCounter] = useState(0);

    const [apiResponse, setApiResponse] = useState("Loading the data...");
    const [friends, setFriends] = useState("Loading the friends...");

    const getFriends = async () =>{
        const data = await fetch(`http://localhost:8000/api/user/get_friends/${currentUser}`, { 
            method: 'get', 
        })
        .then(data => data.json())

        .then(data => console.log(data))
    }

    useEffect(()=>{
        getFriends();
    },[])

    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">Example Component</div>

                        <div className="card-body">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    );
}

export default GetFriends;

if (document.getElementById('reactGetFriends')) {
    ReactDOM.render(<GetFriends />, document.getElementById('reactGetFriends'));
}
