import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import AutoComplete from './AutoComplete';
import CreatePost from './parts/timeline/CreatePost';
function Header({setRefreshFriendsPosts, refreshFriendsPosts}) {
    
    const [createPostText, setCreatePostText] = useState("Write Something Cool!");
    const [createPostImage, setCreatePostImage] = useState("Insert a URL!");

    useEffect(()=>{
    },[])


    return (
        <>
            <div class="row d-flex align-items-center">
                <div className="col-3">
                    <h2>CryptoAway</h2>
                </div>

                <div className="col-6">
                    <AutoComplete/>
                </div>

                <div className="col-3">
                    <CreatePost 
                    createPostText={createPostText} 
                    setCreatePostText={setCreatePostText} 
                    createPostImage={createPostImage} 
                    setCreatePostImage={setCreatePostImage}
                    setRefreshFriendsPosts={setRefreshFriendsPosts}
                    refreshFriendsPosts={refreshFriendsPosts} />

                </div>

            </div>
            

        </>

    );
}

export default Header;

// if (document.getElementById('reactHeader')) {
//     ReactDOM.render(<Header />, document.getElementById('reactHeader'));
// }
