

import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
// import {deleteFriend} from './APICalls';


function UpdateProfile({}) {
    return (
    
            <div class="container bootstrap snippets bootdey mt-4">
                <h1 class="text-primary">Edit Profile</h1>
                  <hr />
            	<div class="row">
                  {/* <!-- left column --> */}
                  <div class="col-md-3">
                    <div class="text-center">
                      <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="avatar img-circle img-thumbnail" alt="avatar" />
                      <h6>Upload a different photo...</h6>

                      <input type="file" class="form-control" />
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

                    <form class="form-horizontal" role="form">
                      <div class="form-group">
                        <label class="col-lg-3 control-label">First name:</label>
                        <div class="col-lg-8">
                          <input class="form-control" type="text" value="dey-dey" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Last name:</label>
                        <div class="col-lg-8">
                          <input class="form-control" type="text" value="bootdey" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Company:</label>
                        <div class="col-lg-8">
                          <input class="form-control" type="text" value="" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Email:</label>
                        <div class="col-lg-8">
                          <input class="form-control" type="text" value="janesemail@gmail.com" />
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
