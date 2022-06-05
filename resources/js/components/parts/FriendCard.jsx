import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import {deleteFriend} from './APICalls';



function FriendCard({username, name, email, avatar, friendId, currentUserId, getFriends}) {
    return (
        <div class="col-md-6 col-xl-4 mt-4">
            <div class="card">
                <i class="fas fa-times deleteIcon" onClick={()=>{
                    deleteFriend(currentUserId, friendId);
                    getFriends();
                }}></i>
                <div class="card-body">
                    <div class="media align-items-center">
                        <span style={{  
                                backgroundImage: "url(" + avatar + ")",  
                                backgroundPosition: "center",
                                backgroundSize: "cover",
                                width: "100px",
                                height: "100px"
                              }} 
                            class="avatar avatar-xl mr-3"></span>
                        <div class="media-body overflow-hidden">
                            <h5 class="card-text mb-0">{username}</h5>
                            <p class="card-text  text-muted">{name}</p>
                            <p class="card-text">
                                {email}
                            </p>
                        </div>
                    </div><a href="#" class="tile-link"></a>
                </div>
            </div>
        </div>
    );
}

export default FriendCard;