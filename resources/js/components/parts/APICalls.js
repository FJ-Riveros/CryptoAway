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

export const createPost = async ( textPost, imgPost)=>{
      axios.post('api/posts/create_post', {
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
      axios.post('api/user/like_post', {
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
        axios.get(`api/user/already_liked_post/${userId}/${postId}`)
         .then(function (response) {
               return response.data 
         })
         .catch(function (error) {
               console.log(error);
         });
    
        return info;
}

export const removeLike = async ( userId, postId)=>{
      axios.post('api/user/remove_like', {
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
  axios.post('api/user/post/create_comment', {
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
  return await axios.get(`api/user/post/${postId}/comments`)
     .then(function (response) {
           return response.data 
     })
     .catch(function (error) {
           console.log(error);
     });

}

export const deleteComment = async ( userId, postId ) =>{
    await axios.post('api/user/post/delete_comment', {
      userId: userId,
      idPost: postId,
    })
    .then(function (response) {
      console.log(response);
    })
    .catch(function (error) {
      console.log(error);
    });
}


export const getUsers = async (  ) =>{
  return await axios.get(`api/user/get_users/all`)
     .then(function (response) {
           return response.data 
     })
     .catch(function (error) {
           console.log(error);
     });

}

export const updateProfile = async ( idUser, username, surname, name, email, description, avatar ) =>{
  await axios.post('api/user/update', {
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
  await axios.post('api/user/actions/deleteUser', {
    userId: idUser,
  })
  .then(function (response) {
    console.log(response);
  })
  .catch(function (error) {
    console.log(error);
  });
}



