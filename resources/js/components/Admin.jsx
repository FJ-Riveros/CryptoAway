import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import { getUsers } from './parts/APICalls';
import UserCell from './parts/admin/UserCell';

function Admin() {

    const[ usersInfo, setUsersInfo ] = useState("");
    const[ reloadCells, setReloadCells ] = useState(false);
   
    const getUserInfo = async () =>{
        const response = await getUsers();
        const usersData = await response.map(( user ) => {
            console.log(user);
            return <UserCell dataUser={user} reloadCells={reloadCells} setReloadCells={setReloadCells}/>
        })
        setUsersInfo(usersData);
    }

    useEffect(()=>{
        getUserInfo();
        console.log(currentDataUser.id)
    },[ reloadCells])
    return (
        <div class="container-lg">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8"><h2>User <b>Management</b></h2></div>
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Surname</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Description</th>
                                <th>Avatar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {usersInfo}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
            
    );
}

export default Admin;


if (document.getElementById('reactAdmin')) {
    ReactDOM.render(<Admin />, document.getElementById('reactAdmin'));
}
