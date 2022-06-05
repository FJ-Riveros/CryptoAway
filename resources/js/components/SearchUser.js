import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import FriendCard from './parts/FriendCard';

function SearchUser({getFriends}) {

    const [resultUser, setResultUser] = useState("");
    const [userInput, setUserInput] = useState("");

    const searchUser = async () =>{
        if(userInput != ""){
            axios.get(`api/user/by_username/${userInput}`)
            .then(response => {
              let message = typeof response.data === 'string' ? 
              <div class="alert alert-danger mt-2">The user was not found!</div> :
              <div class="alert alert-success mt-2">A friend request has been sent to the user!</div> 

              if(typeof response.data === 'string'){
                message = <div class="alert alert-danger mt-2">The user was not found!</div>
              }else{
                axios.post('api/user/send_friend_request', {
                    userToAdd: response.data[0].id,
                    actualUser: currentUser,
                  })
                  .then(function (response) {
                    console.log(response);
                    message = <div class="alert alert-success mt-2">A friend request has been sent to the user!</div> 
                  })
                  .catch(function (error) {
                    message = <div class="alert alert-danger mt-2">There was an error.</div> 
                  });
              }

              setResultUser(
                message
              )

              getFriends();
            })
            .catch(function (error) {
              console.log(error);
            });
        }


    }

    return (
    <div class="row">
        <div class="col col-xl-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="addFriend">
                        <label for="friendToAdd">Add friend</label>
                        <input class="form-control" type="text" id="friendToAdd" name="friendToAdd" placeholder="Enter the username to add a friend!" value={userInput} onChange={(e)=> setUserInput(e.target.value)}></input>
                        <button class="btn btn-success mt-2" onClick={searchUser}>Add</button>
                        {resultUser}
                    </div>
                </div>
            </div>
        </div>
    </div>
    );
}

export default SearchUser;

if (document.getElementById('reactSearchUser')) {
    ReactDOM.render(<SearchUser />, document.getElementById('reactSearchUser'));
}
