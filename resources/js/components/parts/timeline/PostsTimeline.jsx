import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import {getUserById, userLikedPostCheck, giveLike, removeLike, createComment,
     getComments, deletePost } from '../APICalls';
import Comments from './Comments';

function PostsTimeline({ post, currentUser, setRefreshFriendsPosts, refreshFriendsPosts }) {

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
        await retrieveComments();
        setCreateCommentInput("Comment Something!");
        console.log(response);
    }

    const retrieveComments = async () => {
        let response = await getComments(post.id);
        const comments = await response.map((comment) => {
            return <Comments commentData={comment} currentUser={currentUser} retrieveComments={retrieveComments}/>
        })
        console.log(comments);
        setMountedComponents(comments);
    }   


    const removePost = async (postId) => {
        let response = await deletePost(postId);
        setRefreshFriendsPosts(!refreshFriendsPosts);
    }   

    useEffect(()=>{
        getPostOwner();
        checkIfUserLikedPost();
        retrieveComments();
    },[])

    
    return (
        
            <div className="feed__card__post mt-3">
                <div className="post__header">
                    <div className="row">
                        <div className="col-10 d-flex justify-content-start align-items-center">
                            <img src={userInfo.avatar} alt="" className="header__img" />
                            <div className="header__text ml-2">
                                <h4>{userInfo.username}</h4>
                                <p>3 hours ago</p>
                            </div>
                        </div>

                        <div className="col-2 d-flex justify-content-end align-items-center">
                            {post.user_idUser == currentUser.id && 
                            <i class="bi bi-trash-fill deletePost" onClick={()=> removePost(post.id)}></i>
                            }
                        </div>

                    </div>
                </div>
                <div className="body">
                    <div className="body__img" style={{backgroundImage: "url(" + post.imgPost + ")"}}>

                    </div>
                    <p class="body__text">{post.textPost}</p>

                </div>

                <div className="footer mt-2">
                    {userLikedPost ? <i class="bi bi-heart-fill orange hover__cursor" onClick={dislikePost}></i> : <i class="bi bi-suit-heart hover__cursor" onClick={likePost}></i>}
                    <i class="bi bi-chat-left-text ml-4 hover__cursor" data-toggle="collapse" data-target={`#collapse${post.id}`} aria-expanded="false" aria-controls={`collapse${post.id}`}></i>
                </div>
                <div className="comments">
                    <div class="collapse" id={`collapse${post.id}`}>
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

