import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import FriendCard from './parts/FriendCard.js';
function GetFriends() {
    const [counter, setCounter] = useState(0);

    const [apiResponse, setApiResponse] = useState("Loading the data...");
    const [friends, setFriends] = useState("Loading the friends...");

    const getFriends = async () =>{
        const data = await fetch(`http://localhost:8000/api/user/get_friends/${currentUser}`, { 
            method: 'get', 
        })
        .then(data => data.json())

        .then(data => {
            console.log(data[0].username)
            setFriends(
                data.map((friendData)=> {
                    return <FriendCard username={friendData.username} name={friendData.name} email={friendData.email} avatar={friendData.avatar} />
                })
            )
        })
    }

    useEffect(()=>{
        getFriends();
    },[])

    return (
    <div class="row">
        {friends}
    </div>

    );
}

export default GetFriends;

if (document.getElementById('reactGetFriends')) {
    ReactDOM.render(<GetFriends />, document.getElementById('reactGetFriends'));
}
