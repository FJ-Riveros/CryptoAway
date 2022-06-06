import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import {getUserById} from '../APICalls';

function PostsTimeline({post}) {

    const [userInfo, setUserInfo] = useState("");

    //Get the user that corresponds with the actual post to get the info.
    const getPostOwner = async () => {
        setUserInfo(await getUserById(post.user_idUser));
    }

    //Get the post info
    //Get the like/dislike
    //Comments

    useEffect(()=>{
        getPostOwner();
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
                    <i class="bi bi-suit-heart"></i>
                    <i class="bi bi-chat-left-text ml-4"></i>
                </div>
            </div>
        
    );
}

export default PostsTimeline;

