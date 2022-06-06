import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import {getUserById, userLikedPostCheck, giveLike, removeLike } from '../APICalls';

function PostsTimeline({post, currentUser, resetPosts}) {

    const [userInfo, setUserInfo] = useState("");
    const [userLikedPost, setUserLikedPost] = useState(false);
    

    //Get the user that corresponds with the actual post to get the info.
    const getPostOwner = async () => {
        setUserInfo(await getUserById(post.user_idUser));
    }

    const checkIfUserLikedPost = async () => {
        const response = await userLikedPostCheck(currentUser.id, post.id);
        setUserLikedPost(response == "" ? false : true);
    }

    const likePost = async () => {
        const response = giveLike(currentUser.id, post.id);
        resetPosts();
        console.log(response);

    }

    const dislikePost = async () => {
        const response = removeLike(currentUser.id, post.id);
        resetPosts();
        console.log(response);
    }

    //Comments

    useEffect(()=>{
        getPostOwner();
        checkIfUserLikedPost();
    },[])

    
    return (
        
            <div className="feed__card__post">
                <div className="feed__card__post__header">
                    <div className="row">
                        <div className="col-6 d-flex justify-content-start align-items-center">
                            <img src={userInfo.avatar} alt="" className="header__img" />
                            <div className="header__text ml-2">
                                <h4>{userInfo.username}</h4>
                                <p>3 hours ago</p>
                            </div>
                        </div>

                        <div className="col-6">
                            
                        </div>
                    </div>
                </div>
                <div className="body">
                    <div className="body__img" style={{backgroundImage: "url(" + post.imgPost + ")"}}>

                    </div>
                    <p class="body__text">{post.textPost}</p>

                </div>

                <div class="footer">
                    {userLikedPost ? <i class="bi bi-heart-fill red" onClick={dislikePost}></i> : <i class="bi bi-suit-heart" onClick={likePost}></i>}
                    <i class="bi bi-chat-left-text ml-4"></i>
                </div>
            </div>
        
    );
}

export default PostsTimeline;

