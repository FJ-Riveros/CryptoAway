import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';

function FriendSuggestions({ user, currentUser, getUserSuggestions }) {

    const addUser = async ()=> {
        axios.post(`${window.location.origin}/api/user/send_friend_request`, {
            userToAdd: user.id,
            actualUser: currentUser.id,
        })
          .then(function (response) {
            console.log(response);
            getUserSuggestions();
          })
          .catch(function (error) {
          });
    }

    return (
        <div className="row d-flex align-items-center">
            <div className="col-6 user__info">
                <img src={user.avatar} alt=""  height="100%" />
                <span className="username">{user.username}</span>
            </div>
            <div className="col-6 add__button__container"><i className="bi bi-person-plus-fill add" onClick={addUser} ></i></div>
        </div>
    );
}

export default FriendSuggestions;

