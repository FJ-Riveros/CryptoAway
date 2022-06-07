import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import {getUserById, userLikedPostCheck, giveLike, removeLike, createComment, getComments } from '../APICalls';
import Comments from './Comments';

function PostsTimeline({ post, currentUser }) {

    const [userInfo, setUserInfo] = useState("");
    const [userLikedPost, setUserLikedPost] = useState(false);
    const [createCommentInput, setCreateCommentInput] = useState("Comment Something!");
    const [mountedComponents, setMountedComponents] = useState("");

    
    //Get the user that corresponds with the actual post to get the info.
    const getPostOwner = async () => {
        setUserInfo(await getUserById(post.user_idUser));
    }

    const checkIfUserLikedPost = async () => {
        const response = await userLikedPostCheck(currentUser.id, post.id);
        setUserLikedPost(response == "" ? false : true);
    }

    const likePost = async () => {
        const response = await giveLike(currentUser.id, post.id);
        //Checks if the user liked the actual post, updating the heart icon
        checkIfUserLikedPost();
        console.log(response);
    }

    const dislikePost = async () => {
        const response = await removeLike(currentUser.id, post.id);
        //Checks if the user liked the actual post, updating the heart icon
        checkIfUserLikedPost();
        console.log(response);
    }

    //Comments
    const sendComment = async () => {
        const response = await createComment(currentUser.id, post.id, createCommentInput);
        setCreateCommentInput("Comment Something!");
        console.log(response);
    }

    const getComments = async () => {
        const response = await getComments(post.id);

        const comments = response.map((comment) => {
            <Comments commentData={comment}/>
        })

        setMountedComponents(comments);
    }   


    useEffect(()=>{
        getPostOwner();
        checkIfUserLikedPost();
        getComments();
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

                <div className="footer">
                    {userLikedPost ? <i class="bi bi-heart-fill red" onClick={dislikePost}></i> : <i class="bi bi-suit-heart" onClick={likePost}></i>}
                    <i class="bi bi-chat-left-text ml-4" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"></i>
                </div>
                <div className="comments">
                    <div class="collapse" id="collapseExample">
                        <textarea class="form-control" id="message-text" value={createCommentInput} onChange={ (e) => setCreateCommentInput(e.target.value) }></textarea>
                        <div class="d-flex justify-content-end">
                            <button class="comment" onClick={sendComment}>Comment</button>
                        </div>

                        {mountedComponents}
                    </div>
                </div>
            </div>
        
    );
}

export default PostsTimeline;

