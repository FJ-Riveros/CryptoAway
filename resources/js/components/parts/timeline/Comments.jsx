import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import { getUserById } from '../APICalls';

function Comments({ commentData }) {

    const[userData, setUserData] = useState("");
    const getCommentUser = async () =>{
        const response = await getUserById(commentData.user_idUser);
        setUserData(response);
    }

    useEffect(() => {
        getCommentUser();
    },[])

    return (
            <>
                <div class="container d-flex justify-content-center mt-100 mb-100">
                    <div class="row">
                        <div class="col-md-12">

                          <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Recent Comments</h4>
                                <h6 class="card-subtitle">Latest Comments section by users</h6> </div>

                            <div class="comment-widgets m-b-20">

                                <div class="d-flex flex-row comment-row">
                                    <div class="p-2"><span class="round"><img src="https://i.imgur.com/uIgDDDd.jpg" alt="user" width="50" /></span></div>
                                    <div class="comment-text w-100">
                                        <h5>Samso Nagaro</h5>
                                        <div class="comment-footer">
                                            <span class="date">April 14, 2019</span>
                                            <span class="label label-info">Pending</span> <span class="action-icons">
                                                    <a href="#" data-abc="true"><i class="fa fa-pencil"></i></a>
                                                    <a href="#" data-abc="true"><i class="fa fa-rotate-right"></i></a>
                                                    <a href="#" data-abc="true"><i class="fa fa-heart"></i></a>
                                                </span>
                                        </div>
                                        <p class="m-b-5 m-t-10">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it</p>
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

