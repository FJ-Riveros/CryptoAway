import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import ProfileName from './parts/timeline/ProfileName';
import PostsTimeline from './parts/timeline/PostsTimeline';
import { getLastPost, getPosts, getFriendSuggestions} from './parts/APICalls';
import LastPhotos from './parts/timeline/LastPhotos';
import FriendSuggestions from './parts/timeline/FriendSuggestions';
import CreatePost from './parts/timeline/CreatePost';

function Timeline() {
    const [friends, setFriends] = useState("Loading the friends...");
    const [friendsPosts, setFriendsPosts] = useState("Loading the friends posts...");
    const [lastPhotos, setLastPhotos] = useState("Loading the last photos...");
    const [userSuggestions, setUserSuggestions] = useState("Loading the last user suggestions...");
    const [commentInput, setCommentInput] = useState("Write Something!");
    const [createPostText, setCreatePostText] = useState("Write Something Cool!");
    const [createPostImage, setCreatePostImage] = useState("Insert a URL!");


    //Displays the friends from the current user
    const getFriends = async () =>{
        const data = await fetch(`http://localhost:8000/api/user/get_friends/${currentDataUser.id}`, { 
            method: 'get', 
        })
        .then(data => data.json())

        .then(async data => {
            setFriends(data);
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

    const getPhotos = async () =>{
        const post = await getPosts(currentDataUser.id);
        console.log(post);

        setLastPhotos(
            post.map((post)=>{
                return <LastPhotos post={post} />
            })
        )
    }

    const getUserSuggestions = async () =>{
        
        const suggestions = await getFriendSuggestions();

        const mountedSuggestions = suggestions.data.map((user)=>{
                return <FriendSuggestions user={user} currentUser={currentDataUser} getUserSuggestions={getUserSuggestions} />
        })
        setUserSuggestions(mountedSuggestions);
    }


    useEffect(()=>{
        // getFriends();
        getPhotos();
        getUserSuggestions();
    },[])

    useEffect(()=>{
        getFriends();
    },[createPostText])

    return (
        <>
            <div className="row">
                <div className="col-3">
                    <ProfileName currentUserData={currentDataUser}/>
                </div>

                <div className="col-6">
                    <CreatePost createPostText={createPostText} setCreatePostText={setCreatePostText} createPostImage={createPostImage} setCreatePostImage={setCreatePostImage} />
                    
                    {friendsPosts}
                </div>
                
                <div className="col-3">
                    <div class="latest__photos__container">
                        <div class="header">
                            <h3>Latest Photos</h3>
                            <hr/>
                        </div>
                        <div class="photos__grid row">
                            {lastPhotos}
                        </div>
                    </div>

                    <div class="friend__suggestion__container">
                        <h3>Add Friends!</h3>
                        <hr/>
                        {userSuggestions}
                    </div>
                </div>
            </div>
        </>

    );
}

export default Timeline;

if (document.getElementById('reactGetTimeline')) {
    ReactDOM.render(<Timeline />, document.getElementById('reactGetTimeline'));
}
