import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import ProfileName from './parts/timeline/ProfileName';
import PostsTimeline from './parts/timeline/PostsTimeline';
import { getLastPost, getPosts, getFriendSuggestions, logout} from './parts/APICalls';
import LastPhotos from './parts/timeline/LastPhotos';
import FriendSuggestions from './parts/timeline/FriendSuggestions';
import Header from './Header';
import Friends from './Friends';


function Trips() {
  
    return (
        <>
            <h2>Trips</h2>
        </>

    );
}

export default Trips;

if (document.getElementById('reactGetTrips')) {
    ReactDOM.render(<Trips />, document.getElementById('reactGetTrips'));
}
