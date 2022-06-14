import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import {deleteFriend} from './APICalls';

function FriendCard({username, name, email, avatar, friendId, currentDataUserId, getFriends, description}) {
    console.log(currentDataUserId);
    return (
        <div class="col-11 mt-3 d-flex justify-content-center">
            <div className="row friend__card__container">
                <div className="col-4 w-100 h-100 friend__img">    
                    <div style={{  
                            backgroundImage: "url(" + avatar + ")",  
                            backgroundPosition: "center",
                            backgroundSize: "cover",
                            width: "100%",
                            height: "150px",
                            borderRadius: "0.3rem"
                          }} 
                            onClick={
                            ()=>{
                              console.log("hola")
                              window.location = `${location.origin}/timeline/${friendId}`
                            }}
                        class="avatar avatar-xl mr-3"></div>
                </div>

                <div className="col-7 friend__text">
                    <i class="fas fa-times deleteIcon" onClick={()=>{
                        deleteFriend(currentDataUserId, friendId);
                        getFriends();
                    }}></i>
                
                    <div class=" overflow-hidden">
                        <h5 class="card-text mb-0">{username}</h5>
                        <p class="card-text text-muted">{name}</p>
                        <p class="card-text">
                            {email}
                        </p>
                        <p class="card-text">
                            {description}
                        </p>
                    </div>
                </div>
            </div>
        </div>

    );
}

export default FriendCard;