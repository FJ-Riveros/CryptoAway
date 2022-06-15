import React, {useState, useEffect} from 'react';
import {deleteFriend, acceptFriendRequest} from './APICalls';


function FriendRequestCard({userData, currentDataUserId, getFriends, getFriendRequests}) {
    return (
        <div class="col-11 d-flex justify-content-center mt-4 ">
            <div className="row friend__card__container">
                <div className="col-4 w-100 h-100 friend__img">    
                    <div style={{  
                            backgroundImage: "url(" + userData.avatar + ")",  
                            backgroundPosition: "center",
                            backgroundSize: "cover",
                            width: "100%",
                            height: "150px",
                            borderRadius: "0.3rem"
                          }} 
                        class="avatar avatar-xl mr-3"
                        onClick={
                            ()=>{
                              window.location = `${location.origin}/timeline/${userData.id}`
                            }}></div>
                </div>

                <div className="col-7 friend__text">
                    <div class=" overflow-hidden friendRequestText">
                        <h5 class="card-text mb-0">{userData.username}</h5>
                        
                        <span  style={{overflow: "hidden",display: "inline-block",textOverflow: "ellipsis", height: "70px"}}>
                            {userData.description}
                        </span>
                    </div>

                    <div className="row d-flex justify-content-around">
                    <span onClick={()=>{
                        acceptFriendRequest(currentDataUserId, userData.id)
                        getFriends();
                        getFriendRequests();
                        }} 
                        className="customButton addFriend text-center">Add Friend</span>
                    <span onClick={()=>{
                        deleteFriend(currentDataUserId, userData.id);
                        getFriends();
                        getFriendRequests();
                        }}
                        className="customButton declineFriend text-center">Decline</span>
                    </div> 
                </div>
            </div>
        </div>
    );
}

export default FriendRequestCard;
