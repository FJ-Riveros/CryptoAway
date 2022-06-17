import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import FriendCard from './parts/FriendCard.jsx';
import SearchUser from './SearchUser';
import {getFriendRequests} from './parts/APICalls'
import FriendRequestCard from './parts/FriendRequestCard.jsx';
import axios from 'axios';
function Friends() {
    // const [apiResponse, setApiResponse] = useState("Loading the data...");
    const [friends, setFriends] = useState([]);
    const [friendRequests, setFriendRequests] = useState([]);

    const getFriends = async () =>{
         
        const data = await axios.get(`${window.location.origin}/api/user/get_friends/${currentDataUser.id}`)
        // .then(data => data.json())

        .then(response => {
            // console.log(data)
            setFriends(
                response.data.map((friendData)=> {
                    return <FriendCard username={friendData.username} name={friendData.name}
                     email={friendData.email} avatar={friendData.avatar} key={friendData.id} 
                     description={friendData.description} friendId={friendData.id} 
                     currentDataUserId={currentDataUser.id} getFriends={getFriends}/>
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
            <div class="row d-flex justify-content-center">
                
                    {friends.length != 0 &&
                        <div className="col-11">
                            <h3>Friends</h3>
                            <hr/>
                        </div>
                        }
                    {friends}
            </div>
            <div class="row d-flex justify-content-center">
                {friendRequests.length != 0 &&
                    <div className="col-11 mt-3">
                        <h3>Friend Requests</h3>
                        <hr/>
                    </div>
                }
                {friendRequests}
            </div>
        </>
    );
}

export default Friends;

