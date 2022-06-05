import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

function SearchUser() {

    const [resultUser, setResultUser] = useState("Loading the friends...");
    const [userInput, setUserInput] = useState("");

    console.log("hola");
    const searchUser = async () =>{
        axios.get(`api/user/by_username/${userInput}`)
          .then(function (response) {
            console.log(response);
          })
          .catch(function (error) {
            console.log(error);
          });
    }

    // useEffect(()=>{
    //     getFriends();
    // },[])

    return (
    <div class="row">
        <div class="col col-xl-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    {/* <form action="Friends.php" method="post"> */}
                        <div class="addFriend">
                            <label for="friendToAdd">Add friend</label>
                            <input class="form-control" type="text" id="friendToAdd" name="friendToAdd" placeholder="Enter the username to add a friend!" value={userInput} onChange={(e)=> setUserInput(e.target.value)}></input>
                            <button class="btn btn-success mt-2" onClick={searchUser}>Add</button>
                        </div>
                    {/* </form> */}
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
