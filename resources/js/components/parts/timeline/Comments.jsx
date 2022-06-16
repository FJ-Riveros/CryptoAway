import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import { getUserById, deleteComment } from '../APICalls';

function Comments({ commentData, currentUser, retrieveComments, getNumberComments }) {

    const[userData, setUserData] = useState("");
    const getCommentUser = async () =>{
        const response = await getUserById(commentData.user_idUser);
        setUserData(response);
    }

    const actionDeleteComment = async () =>{
        await deleteComment( commentData.id);
        getNumberComments();
        retrieveComments();
    }

    useEffect(() => {
        getCommentUser();
    },[])
    console.log("avatar");

    console.log(commentData.avatar);
    return (
            <>
                <div className="mt-25">
                    <div className="row">
                        <div className="col-md-12">
                            <div className="card">
                                <div className="card-body">
                                    <div className="comment-widgets m-b-20">
                                        <div className="d-flex flex-row comment-row">
                                                { commentData.user_idUser == currentUser.id &&
                                                    <span className="action__delete">
                                                        <a href="#" data-abc="true"><i className="bi bi-trash-fill main__color hover__cursor" onClick={() =>  actionDeleteComment() }></i></a>
                                                    </span>
                                                }

                                                <div className="col-4 d-flex justify-content-center">
                                                    <div className="commentImage" style={{backgroundImage: `url(${userData.avatar})`, backgroundSize: "cover", borderRadius: "50%", cursor: "pointer"}}
                                                     onClick={
                                                        ()=>{
                                                          window.location = `${location.origin}/timeline/${commentData.user_idUser}`
                                                        }}>
                                                    </div>
                                                </div>
                                                
                                                <div className="col-8">
                                                    <h5>{userData.name}</h5>
                                                    <span className="date">{commentData.created_at.split("T")[0]}</span>
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

