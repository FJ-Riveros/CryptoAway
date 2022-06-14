import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import {getUserById} from '../APICalls';

function LastPhotos({post}) {
    return (
        <div class="col-4">
            {/* <img src={post.imgPost} class="img-fluid" alt="" /> */}
            <div className="lastPhoto__img" style={{backgroundImage: `url(${post.imgPost})`}}></div>
        </div>
    );
}

export default LastPhotos;

