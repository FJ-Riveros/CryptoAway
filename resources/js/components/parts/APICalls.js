import axios from 'axios';
// import FriendCard from './FriendCard';

export const deleteFriend = async ( currentUserId, friendId)=>{
    axios.post(`${window.location.origin}/api/user/remove_friend`, {
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
    axios.get(`${window.location.origin}/api/user/get_friend_requests/${currentUserId}`)
     .then(function (response) {
           console.log(response.data);
           return response.data 
     })
     .catch(function (error) {
           console.log(error);
     });

     return info;
}

export const acceptFriendRequest = async ( currentUserId, friendId) =>{
    axios.post(`${window.location.origin}/api/user/accept_friend_request`, {
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
    axios.get(`${window.location.origin}/api/user/${userId}`)
     .then(function (response) {
           return response.data 
     })
     .catch(function (error) {
           console.log(error);
     });

    return info;
}

export const getLastPost = async ( userId ) =>{
  const info = await 
    axios.get(`${window.location.origin}/api/user/${userId}/last_post`)
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
    axios.get(`${window.location.origin}/api/user/${userId}/posts`)
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
    axios.get(`${window.location.origin}/api/user/friends/suggest_friends`)
     .then(function (response) {
          //  console.log(response.data);
           return response.data 
     })
     .catch(function (error) {
           console.log(error);
     });

    return info;
}

export const createPost = async ( textPost, imgPost)=>{
      axios.post(`${window.location.origin}/api/posts/create_post`, {
          imgPost: imgPost,
          textPost: textPost,
        })
        .then(function (response) {
          console.log(response);
        })
        .catch(function (error) {
          console.log(error);
        });
}

export const giveLike = async ( userId, postId)=>{
      axios.post(`${window.location.origin}/api/user/like_post`, {
          userId: userId,
          postId: postId,
        })
        .then(function (response) {
          console.log(response);
        })
        .catch(function (error) {
          console.log(error);
        });
}


export const userLikedPostCheck = async ( userId, postId) =>{
      const info = await 
        axios.get(`${window.location.origin}/api/user/already_liked_post/${userId}/${postId}`)
         .then(function (response) {
               return response.data 
         })
         .catch(function (error) {
               console.log(error);
         });
    
        return info;
}

export const removeLike = async ( userId, postId)=>{
      axios.post(`${window.location.origin}/api/user/remove_like`, {
          userId: userId,
          postId: postId,
        })
        .then(function (response) {
          console.log(response);
        })
        .catch(function (error) {
          console.log(error);
        });
}

export const createComment = async ( userId, postId, text)=>{
  axios.post(`${window.location.origin}/api/user/post/create_comment`, {
      userId: userId,
      postId: postId,
      text: text
    })
    .then(function (response) {
      console.log(response);
    })
    .catch(function (error) {
      console.log(error);
    });
}


export const getComments = async ( postId ) =>{
  return await axios.get(`${window.location.origin}/api/user/post/${postId}/comments`)
     .then(function (response) {
           return response.data 
     })
     .catch(function (error) {
           console.log(error);
     });

}

export const deleteComment = async ( commentId ) =>{
    await axios.post(`${window.location.origin}/api/user/post/delete_comment`, {
      commentId: commentId
    })
    .then(function (response) {
      console.log(response);
    })
    .catch(function (error) {
      console.log(error);
    });
}


export const getUsers = async (  ) =>{
  return await axios.get(`${window.location.origin}/api/user/get_users/all`)
     .then(function (response) {
           return response.data 
     })
     .catch(function (error) {
           console.log(error);
     });

}

export const updateProfileAdmin = async ( idUser, username, surname, name, email, description, avatar ) =>{
  await axios.post(`${window.location.origin}/api/user/update/admin`, {
    userId: idUser,
    username: username,
    surname: surname,
    name: name,
    email: email,
    description: description,
    avatar: avatar
    
  })
  .then(function (response) {
    console.log(response);
  })
  .catch(function (error) {
    console.log(error);
  });
}

export const deleteUser = async ( idUser ) =>{
  await axios.post(`${window.location.origin}/api/user/actions/deleteUser`, {
    userId: idUser,
  })
  .then(function (response) {
    console.log(response);
  })
  .catch(function (error) {
    console.log(error);
  });
}


export const logout = async (  ) =>{
  await axios.post(`${window.location.origin}/logout`)
  .then(function (response) {
    console.log(response);
    window.location.href = location.origin;
  })
  .catch(function (error) {
    console.log(error);
  });
}

export const getAllTrips = async () =>{
  const info = await 
    axios.get(`${window.location.origin}/api/trips/all`)
     .then(function (response) {
           return response.data 
     })
     .catch(function (error) {
           console.log(error);
     });

    return info;
}