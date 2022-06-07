import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import { getUserById, deleteComment } from '../APICalls';

function Comments({ commentData, currentUser }) {

    const[userData, setUserData] = useState("");
    const getCommentUser = async () =>{
        const response = await getUserById(commentData.user_idUser);
        setUserData(response);
    }

    const deleteComment = async () =>{
        const response = await deleteComment(currentUser.id, commentData.Post_idPost);
        console.log(response);
    }

    useEffect(() => {
        getCommentUser();
    },[])

    return (
            <>
                <div className="mt-25">
                    <div className="row">
                        <div className="col-md-12">
                            <div className="card">
                                <div className="card-body">
                                    <div className="comment-widgets m-b-20">
                                        <div className="d-flex flex-row comment-row">
                                            <div className="p-2">
                                                { commentData.user_idUser == currentUser.id &&
                                                    <span className="action__delete">
                                                        <a href="#" data-abc="true"><i className="fa fa-pencil" onClick={deleteComment}></i></a>
                                                    </span>
                                                }
                                                <span>
                                                    <img className="round" src="https://i.imgur.com/uIgDDDd.jpg" alt="user" width="50" />
                                                </span>
                                                </div>
                                                <div className="comment-text w-100">
                                                    <h5>{userData.name}</h5>
                                                    <div className="comment-footer">
                                                        <span className="date">{commentData.created_at.split("T")[0]}</span>
                                                    </div>
                                                    <p className="m-b-5 m-t-10">{commentData.Text}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </>
    );
}

export default Comments;

