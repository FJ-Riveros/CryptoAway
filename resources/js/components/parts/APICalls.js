import axios from 'axios';
import FriendCard from './FriendCard';

export const deleteFriend = async ( currentUserId, friendId)=>{
    axios.post('api/user/remove_friend', {
        userAcceptRequestId: currentUserId,
        originalRequestSender: friendId,
      })
      .then(function (response) {
        console.log(response);
      })
      .catch(function (error) {
        console.log(error);
      });
}

// export const getFriends = async () =>{
//         let prueba;
//         const data = await fetch(`http://localhost:8000/api/user/get_friends/${currentUser}`, { 
//             method: 'get', 
//         })
//         .then(data => data.json())

//         .then(data => {
//                 prueba = data.map((friendData)=> {
//                     return <FriendCard username={friendData.username} name={friendData.name} email={friendData.email} avatar={friendData.avatar} key={friendData.id} friendId={friendData.id} currentUserId={currentUser} getFriends={getFriends}/>
//                 })
//         })
//         return prueba;
// }



