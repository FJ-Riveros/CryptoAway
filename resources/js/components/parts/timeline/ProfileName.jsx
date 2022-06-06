import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';

function ProfileName({currentUserData}) {
    return (
        <div class="profile__card">
                <div class="profile__card__img" style={{backgroundImage: "url(" + currentUserData.avatar + ")"}}></div>
                <div class="ml-2 mb-0 text text-left">
                    <h5>{currentUserData.name}</h5>
                    <p>@{currentUserData.username}</p>
                </div>
            </div>
    );
}

export default ProfileName;