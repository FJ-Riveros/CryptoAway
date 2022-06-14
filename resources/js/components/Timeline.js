import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import ProfileName from './parts/timeline/ProfileName';
import PostsTimeline from './parts/timeline/PostsTimeline';
import { getLastPost, getPosts, getFriendSuggestions, logout, getUserPosts} from './parts/APICalls';
import LastPhotos from './parts/timeline/LastPhotos';
import FriendSuggestions from './parts/timeline/FriendSuggestions';
import Header from './Header';
import Friends from './Friends';
import Trips from './Trips';


function Timeline() {
    const [friends, setFriends] = useState("Loading the friends...");
    const [friendsPosts, setFriendsPosts] = useState("Loading the friends posts...");
    const [lastPhotos, setLastPhotos] = useState("Loading the last photos...");
    const [userSuggestions, setUserSuggestions] = useState("Loading the last user suggestions...");
    const [commentInput, setCommentInput] = useState("Write Something!");
    const [refreshFriendsPosts, setRefreshFriendsPosts] = useState(false);
    //Get the posts from the current user
    const [currentUserPosts, setCurrentUserPosts] = useState([]);

    //Switches between the friends and the posts
    const [currentView, setCurrentView] = useState("Posts");



    //Displays the friends from the current user
    const getFriends = async () =>{
        const data = await fetch(`${window.location.origin}/api/user/get_friends/${currentDataUser.id}`, { 
            method: 'get', 
        })
        .then(data => data.json())

        .then(async data => {
            setFriends(data);
            console.log("friends");
            console.log(data);
            let friendsPostsInfo =  [];
            //Get the last post from the friends
            friendsPostsInfo = data.map(async (friendData)=> {
                return await getLastPost(friendData.id);
            })

            console.log(friendsPostsInfo)
            friendsPostsInfo.unshift(await getLastPost(currentDataUser.id));

            //Resolves the promises generated in the loop
            let lastPost = await Promise.all(friendsPostsInfo);

            //Filters the posts from the users that had no post 
            let cleanPosts = lastPost.filter((post)=>post.length != 0)
            
            //Loops through the posts again to mount the info into the component
            let postComponents =  cleanPosts.map(async (post)=> {
                return await <PostsTimeline post={post} currentUser={currentDataUser}/>
            })

            setFriendsPosts(
                //Resolves the component promises
                await Promise.all(postComponents)
            )
        })
    }


    const queryUserPosts = async ()=>{
        const userPosts = await getUserPosts(currentDataUser.id);
        console.log(userPosts);
        let postComponents =  userPosts.map(async (post)=> {
            return await <PostsTimeline post={post} currentUser={currentDataUser}/>
        })
        //Resolves the component promises
        setCurrentUserPosts(await Promise.all(postComponents));
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

    const redirection = () =>{
        if( window.location != `${location.origin}/timeline`){
            window.location = `${location.origin}/timeline`;
        } 
    } 

    const getUserSuggestions = async () =>{
        
        const suggestions = await getFriendSuggestions();

        const mountedSuggestions = suggestions.data.map((user)=>{
                return <FriendSuggestions user={user} currentUser={currentDataUser} getUserSuggestions={getUserSuggestions} />
        })
        setUserSuggestions(mountedSuggestions);
    }

    const closeSession = async () =>{
        await logout();
    }

    
    useEffect(()=>{
        getPhotos();
        getUserSuggestions();
    },[])

    
    useEffect(()=>{
        getFriends();
    },[refreshFriendsPosts])

    return (
        <>
            <Header setRefreshFriendsPosts={setRefreshFriendsPosts} refreshFriendsPosts={refreshFriendsPosts} />
            <div className="row">
                <div className="col-3 mt-3">
                    <ProfileName currentUserData={currentDataUser}/>

                    <div className="routes">
                        <div class={`children__routes first ${currentView === "Posts" && "activeTop"}`}>
                            <div class="home d-flex align-items-center">
                                <span  onClick={() => {
                                    redirection();
                                    setCurrentView("Posts")}}
                                 class="d-flex align-items-center">
                                    <i class="bi bi-house-fill"></i>
                                    <span className="ml-2">Home</span>
                                </span>
                            </div>
                        </div>

                        <div class={`children__routes ${currentView === "Friends" && "active"}`}>
                            <div class="friends d-flex align-items-center ">
                                <span   onClick={() => {
                                    redirection();
                                    setCurrentView("Friends")}}
                                class="d-flex align-items-center">
                                    <i class="bi bi-people-fill"></i>
                                    <span className="ml-2">Friends</span>
                                </span>

                            </div>
                        </div>

                        <div class={`children__routes ${currentView === "Trips" && "active"}`}>
                            <div class="friends d-flex align-items-center ">
                                <span  onClick={() =>{
                                    redirection();    
                                    setCurrentView("Trips")}}
                                 className="d-flex align-items-center">
                                    <i class="bi bi-map-fill"></i>                                
                                    <span className="ml-2">Trips</span>
                                </span>
                                    

                            </div>
                        </div>

                        <div class={`children__routes ${currentView === "UserPosts" && "active"}`}>
                            <div class="posts d-flex align-items-center">
                                <span onClick={async () => {
                                    redirection();
                                    await queryUserPosts();
                                    setCurrentView("UserPosts")   
                                }}class="d-flex align-items-center">
                                    <i class="bi bi-collection-fill"></i>
                                    <span className="ml-2">Your Posts</span>
                                </span>
                            </div>
                        </div>
                        {
                            isAdmin &&
                                <div class="children__routes">
                                    <div class="posts d-flex align-items-center">
                                        <a href={`${location.origin}/admin_dashboard`} className="d-flex align-items-center">
                                            <i class="bi bi-hammer" ></i>
                                            <span class="ml-2">Admin Dashboard</span>
                                        </a>
                                    </div>
                                </div>
                        }
                        

                        <div class="children__routes last">
                            <div class=" d-flex align-items-center">
                                <span onClick={() => closeSession()} className="logout d-flex align-items-center">
                                    <i class="bi bi-door-open-fill"></i>
                                    <span class="ml-2">Logout</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="col-6">
                            
                    {currentView === "Posts" && friendsPosts }
                    {currentView === "Friends" && <Friends/>}
                    {currentView === "Trips" && <Trips/>}
                    {currentView === "UserPosts" && currentUserPosts}


                </div>
                
                <div className="col-3 mt-3">
                    <div class="latest__photos__container">
                        <div class="header w-100">
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
