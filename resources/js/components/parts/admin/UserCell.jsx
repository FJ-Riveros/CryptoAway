import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import { deleteUser, updateProfileAdmin } from '../APICalls';

function UserCell({dataUser, setReloadCells, reloadCells}) {

    const[ usersInfo, setUsersInfo ] = useState("");
    const[ username, setUsername ] = useState(dataUser.username);
    const[ name, setName ] = useState(dataUser.name);
    const[ surname, setSurname ] = useState(dataUser.surname);
    const[ email, setEmail ] = useState(dataUser.email);
    const[ description, setDescription ] = useState(dataUser.description);
    const[ avatar, setAvatar ] = useState(dataUser.avatar);
      
    const updateUser = async ( ) => {
        const response = await updateProfileAdmin(dataUser.id, username, surname, name, email, description, avatar);
        setReloadCells( !reloadCells);
        console.log("actualizado");
    }

    const removeUser = async ( idUser) => {
        const response = await deleteUser(idUser);
        setReloadCells( !reloadCells);
    }

    return (
            <tr>
                <td>{dataUser.id}</td>
                <td><input class="form-control" type="text" name="surname" value={surname} onChange={(e)=> setSurname(e.target.value)} required /></td>
                <td><input class="form-control" name="username" type="text" value={username} onChange={(e)=> setUsername(e.target.value)} required /></td>
                <td><input class="form-control" type="text" name="newName" value={name} onChange={(e)=> setName(e.target.value)} required /></td>

                <td><input class="form-control" type="email" name="email" value={email} onChange={(e)=> setEmail(e.target.value)} required/></td>
                <td><textarea class="form-control" type="text" name="description" value={description} onChange={(e)=> setDescription(e.target.value)} required /></td>
                <td><input type="text" class="form-control" name="avatar" value={avatar} onChange={(e)=> setAvatar(e.target.value)}/></td>
                <td>
                    <a class="add" title="Add" data-toggle="tooltip"><i class="bi bi-person-plus-fill"></i></a>
                    <a class="edit" title="Edit" data-toggle="tooltip" onClick={() => updateUser()}><i class="bi bi-pencil-fill"></i></a>
                    <a class="delete" title="Delete" data-toggle="tooltip" onClick={() => removeUser(dataUser.id)}><i class="bi bi-trash-fill"></i></a>
                </td>
            </tr>
    );
}

export default UserCell;

