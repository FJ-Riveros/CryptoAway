import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import {deleteFriend, acceptFriendRequest} from './APICalls';


function FriendRequestCard({userData, currentUserId, getFriends}) {
    return (
        <div class="row">
            <div class="col-md-8">
                <div class="people-nearby">
                    <div class="nearby-user">
                        <div class="row">
                            <div class="col-md-2 col-sm-2">
                                <img src={userData.avatar} alt="user" class="profile-photo-lg"
                                 />
                            </div>
                            <div class="col-md-5 col-sm-5">
                                <h5>{userData.username}</h5>
                                <p>{userData.description}</p>
                            </div>
                            <div class="col-md-5 col-sm-5 d-flex align-items-center">
                                <button onClick={()=>{
                                    acceptFriendRequest(currentUserId, userData.id)
                                    getFriends();
                                    }} 
                                    class="btn btn-success pull-right align-middle">Add Friend</button>
                                <button onClick={()=>{
                                    deleteFriend(currentUserId, userData.id);
                                    getFriends();
                                    }}
                                     class="btn btn-secondary pull-right align-middle ml-1">Decline</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default FriendRequestCard;
