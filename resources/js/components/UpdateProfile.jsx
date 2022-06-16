

import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';


function UpdateProfile() {

    const[ username, setUsername ] = useState("");
    const[ name, setName ] = useState("");
    const[ surname, setSurname ] = useState("");
    const[ email, setEmail ] = useState("");
    const[ description, setDescription ] = useState("");
    const[ avatar, setAvatar ] = useState("");

    const getUserInfo = () =>{
        setUsername(currentDataUser.username);
        setName(currentDataUser.name);
        setSurname(currentDataUser.surname);
        setEmail(currentDataUser.email);
        setDescription(currentDataUser.description);
        setAvatar(currentDataUser.avatar);
    }   

    useEffect(()=>{
        getUserInfo();
        console.log(currentDataUser.id)
    },[])
    return (
    
            <div class="container bootstrap snippets bootdey mt-4">
                <h1 class="orange">Edit Profile</h1>
                  <hr />
            	<div class="row">
                  {/* <!-- left column --> */}
                  <div class="col-md-3">
                    <div class="text-center">
                      <img src={currentDataUser.avatar} class="avatar img-circle img-thumbnail" alt="avatar" />
                    </div>
                  </div>

                  {/* <!-- edit form column --> */}
                  <div class="col-md-9 personal-info">
                    <div class="alert alert-info alert-dismissable">
                      <a class="panel-close close" data-dismiss="alert">×</a> 
                      <i class="bi bi-exclamation-triangle-fill"></i>
                      Modify your data wisely.
                    </div>
                    <h3>Personal info</h3>

                  <form method="POST" action="api/user/update">
                      <input type="hidden" name="idUser" value={currentDataUser.id} />
                      <div class="form-group">
                        <label class="col-lg-3 control-label">First name:</label>
                        <div class="col-lg-8">
                          <input class="form-control mt-0" type="text" name="surname" value={surname} onChange={(e)=> setSurname(e.target.value)} required />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Last name:</label>
                        <div class="col-lg-8">
                          <input class="form-control mt-0" type="text" name="newName" value={name} onChange={(e)=> setName(e.target.value)} required />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Username:</label>
                        <div class="col-lg-8">
                          <input class="form-control mt-0" name="username" type="text" value={username} onChange={(e)=> setUsername(e.target.value)} required />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Email:</label>
                        <div class="col-lg-8">
                          <input class="form-control mt-0" type="email" name="email" value={email} onChange={(e)=> setEmail(e.target.value)} required/>
                        </div>
                      </div>                      
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Description:</label>
                        <div class="col-lg-8">
                          <textarea class="form-control mt-0" type="text" name="description" value={description} onChange={(e)=> setDescription(e.target.value)} required />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Avatar:</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control mt-0" name="avatar" value={avatar} onChange={(e)=> setAvatar(e.target.value)}/>
                        </div>
                      </div>
                      <div className="row">
                        <div className="col-6 col-md-4 d-flex justify-content-center">
                          <button class="updateButton">Update</button>
                        </div>
                        <div className="col-6  col-md-4 d-flex justify-content-center">
                          <button class="cancelButton" onClick={()=>{
                            window.location.href = `${location.origin}/timeline`;
                          }}>Cancel</button>
                        </div> 
                      </div>
                    </form>
                    </div>
                  </div>
            </div>
    );
}

export default UpdateProfile;


if (document.getElementById('reactUpdateProfile')) {
    ReactDOM.render(<UpdateProfile />, document.getElementById('reactUpdateProfile'));
}
