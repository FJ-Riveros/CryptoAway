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


export const getFriendRequests = async ( currentUserId )=>{
    axios.get(`api/user/get_friend_requests/${currentUserId}`)
      .then(function (response) {
        console.log(response);
      })
      .catch(function (error) {
        console.log(error);
      });
}

export const acceptFriendRequest = async ( currentUserId, friendId)=>{
    axios.post('api/user/accept_friend_request', {
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



