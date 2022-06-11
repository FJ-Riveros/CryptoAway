import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import FriendCard from './parts/FriendCard.jsx';
import SearchUser from './SearchUser';
import {getFriendRequests} from './parts/APICalls'
import FriendRequestCard from './parts/FriendRequestCard.jsx';
function Friends() {
    // const [apiResponse, setApiResponse] = useState("Loading the data...");
    const [friends, setFriends] = useState("Loading the friends...");
    const [friendRequests, setFriendRequests] = useState("Loading the friend requests...");


    const getFriends = async () =>{
        const data = await fetch(`http://localhost:8000/api/user/get_friends/${currentDataUser.id}`, { 
            method: 'get', 
        })
        .then(data => data.json())

        .then(data => {
            // console.log(data)
            setFriends(
                data.map((friendData)=> {
                    return <FriendCard username={friendData.username} name={friendData.name} email={friendData.email} avatar={friendData.avatar} key={friendData.id} friendId={friendData.id} currentDataUserId={currentDataUser.id} getFriends={getFriends}/>
                })
            )
        })
    }

    const mountFriendRequests = async () =>{

        let response = await getFriendRequests(currentDataUser.id);
        setFriendRequests(
            response.map((friendRequestsData)=> {
                return <FriendRequestCard currentDataUserId={currentDataUser.id} userData={friendRequestsData} getFriends={getFriends} getFriendRequests={mountFriendRequests}/>
            })
        )

    }

    useEffect(()=>{
        getFriends();
        mountFriendRequests();
    },[])

    return (
        <>
            <div class="row">
                <SearchUser getFriends={getFriends}/>
            </div>
            <div class="row row d-flex justify-content-center">
                {friends}
            </div>
            <div class="row">
                {friendRequests}
            </div>

        </>

    );
}

export default Friends;

// if (document.getElementById('reactGetFriends')) {
//     ReactDOM.render(<Friends />, document.getElementById('reactGetFriends'));
// }
