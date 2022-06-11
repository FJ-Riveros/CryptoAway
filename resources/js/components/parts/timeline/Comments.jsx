import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import { getUserById, deleteComment } from '../APICalls';

function Comments({ commentData, currentUser, retrieveComments }) {

    const[userData, setUserData] = useState("");
    const getCommentUser = async () =>{
        const response = await getUserById(commentData.user_idUser);
        setUserData(response);
    }

    const actionDeleteComment = async () =>{
        await deleteComment( commentData.id);
        retrieveComments();
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
                                                        <a href="#" data-abc="true"><i className="bi bi-trash-fill main__color hover__cursor" onClick={() =>  actionDeleteComment() }></i></a>
                                                    </span>
                                                }
                                                <span>
                                                    <img className="round" src={commentData.avatar} alt="user" width="50" height="auto"/>
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

