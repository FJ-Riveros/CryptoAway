import React, {useState, useEffect} from 'react';
import {deleteFriend, acceptFriendRequest} from './APICalls';


function FriendRequestCard({userData, currentDataUserId, getFriends, getFriendRequests}) {
    return (
        // <div class="row">
        //     <div class="col-md-8">
        //         <div class="people-nearby">
        //             <div class="nearby-user">
        //                 <div class="row">
        //                     <div class="col-md-2 col-sm-2">
        //                         <img src={userData.avatar} alt="user" class="profile-photo-lg"
        //                          />
        //                     </div>
        //                     <div class="col-md-5 col-sm-5">
        //                         <h5>{userData.username}</h5>
        //                         <p>{userData.description}</p>
        //                     </div>
        //                     <div class="col-md-5 col-sm-5 d-flex align-items-center">
        //                         <button onClick={()=>{
        //                             acceptFriendRequest(currentDataUserId, userData.id)
        //                             getFriends();
        //                             getFriendRequests();
        //                             }} 
        //                             class="btn btn-success pull-right align-middle">Add Friend</button>
        //                         <button onClick={()=>{
        //                             deleteFriend(currentDataUserId, userData.id);
        //                             getFriends();
        //                             getFriendRequests();
        //                             }}
        //                              class="btn btn-secondary pull-right align-middle ml-1">Decline</button>
        //                     </div>
        //                 </div>
        //             </div>
        //         </div>
        //     </div>
        // </div>
        <div class="col-11 mt-4 ">
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
                        class="avatar avatar-xl mr-3"></div>
                </div>

                <div className="col-7 friend__text">
                    <div class=" overflow-hidden friendRequestText">
                        <h5 class="card-text mb-0">{userData.username}</h5>
                        <p class="card-text">
                            {userData.description}
                        </p>
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
