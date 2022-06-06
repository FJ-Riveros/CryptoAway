import axios from 'axios';
// import FriendCard from './FriendCard';

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
    const info = await 
    axios.get(`api/user/get_friend_requests/${currentUserId}`)
     .then(function (response) {
           console.log(response.data);
           return response.data 
     })
     .catch(function (error) {
           console.log(error);
     });

     return info;
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

export const getUserById = async ( userId ) =>{
  const info = await 
    axios.get(`api/user/${userId}`)
     .then(function (response) {
           console.log(response.data);
           return response.data 
     })
     .catch(function (error) {
           console.log(error);
     });

    return info;
}

export const getLastPost = async ( userId ) =>{
  const info = await 
    axios.get(`api/user/${userId}/last_post`)
     .then(function (response) {
          //  console.log(response.data);
           return response.data 
     })
     .catch(function (error) {
           console.log(error);
     });

    return info;
}

export const getPosts = async ( userId ) =>{
  const info = await 
    axios.get(`api/user/${userId}/posts`)
     .then(function (response) {
          //  console.log(response.data);
           return response.data 
     })
     .catch(function (error) {
           console.log(error);
     });

    return info;
}

export const getFriendSuggestions = async ( ) =>{
  const info = await 
    axios.get(`api/user/friends/suggest_friends`)
     .then(function (response) {
          //  console.log(response.data);
           return response.data 
     })
     .catch(function (error) {
           console.log(error);
     });

    return info;
}




