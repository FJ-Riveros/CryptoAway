import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import ProfileName from './parts/timeline/ProfileName';
import PostsTimeline from './parts/timeline/PostsTimeline';
import { getLastPost } from './parts/APICalls';

function Timeline() {
    const [friends, setFriends] = useState("Loading the friends...");
    const [friendsPosts, setFriendsPosts] = useState("Loading the friends posts...");

    //Displays the friends from the current user
    const getFriends = async () =>{
        const data = await fetch(`http://localhost:8000/api/user/get_friends/${currentDataUser.id}`, { 
            method: 'get', 
        })
        .then(data => data.json())

        .then(async data => {
            //Get the last post from the friends
            const friendsPostsInfo = data.map(async (friendData)=> {
                return await getLastPost(friendData.id);
            })

            //Resolves the promises generated in the loop
            let lastPost = await Promise.all(friendsPostsInfo);

            //Filters the posts from the users that had no post 
            let cleanPosts = lastPost.filter((post)=>post.length != 0)
            
            //Loops through the posts again to mount the info into the component
            let postComponents =  cleanPosts.map(async (post)=> {
                return await <PostsTimeline post={post} />
            })

            setFriendsPosts(
                //Resolves the component promises
                await Promise.all(postComponents)
            )
        })
    }

    useEffect(()=>{
        getFriends();
    },[])

    return (
        <>
            <div className="row">
                <div className="col-3">
                    <ProfileName currentUserData={currentDataUser}/>
                </div>

                <div className="col-6">
                    {friendsPosts}
                </div>
                
            </div>
        </>

    );
}

export default Timeline;

if (document.getElementById('reactGetTimeline')) {
    ReactDOM.render(<Timeline />, document.getElementById('reactGetTimeline'));
}
